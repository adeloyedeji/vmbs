<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use PHPExcel;
use PHPExcel_IOFactory;
use Carbon\Carbon;
use PDF;
use APP;

class FdpController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $fdps = 
            \App\cost_template::select('cost_templates.*','levels.level')
            ->join('levels', 'cost_templates.level', '=', 'levels.id')
            ->where('operator_id', 3)
            ->paginate(20);

        return view('fdp.list_fdp', compact('fdps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $data['field'] = \App\field::select('fields.field_name', 'blocks.blockname', 'fields.id')
            ->leftjoin('blocks', 'blocks.id', '=', 'fields.block_id')
            ->where('blocks.company_id', 3)
            ->where('fields.id', $id)
            ->first();

        $data['levels'] = \App\level::distinct('level')->get();

        $data['type'] = substr($data['field']->blockname, 0, 3);

        $data['lease'] = $data['type'] == 'OML' ?
        'Oil Mining Lease (OML)' : 'Oil Prospecting Licence (OPL)';
        // dd($data);

        return view('fdp.submit', compact('data'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $inputs = $request->all();

        $this->validate($request, [
            'level'=>'required|integer',
            // 'bopd'=>'required',
            'name'=>'required|min:5',
            'lease'=>'required',
            'cost_template'=>'required',
            'field_id'=>'required'
        ]);

        $ranges = [
            1 => [7, 82],
            2 => [9, 89],
            3 => [7, 222],
            4 =>[ 10, 131],
            5 => [9, 17]
        ];

        if ($request->hasFile('cost_template') && $request->file('cost_template')->isValid()) {

            $codes = $this->cost_codes($request->level);

            $ob = \PHPExcel_IOFactory::load($request->cost_template);
            $ob = $ob->getActiveSheet()->toArray(null,true,true,true);

            foreach ($ob as $key => $row) {
                if ($key >= $ranges[$request->level][0] && $key <= $ranges[$request->level][1]) {
                    $my_codes[] = $row['B'];
                    $costs[] = $this->get_cost_value($id, $row, $codes, $request->level);
                    $costs[] = $this->get_cost_value($id, $row, $codes, $request->level, 2);
                }
            }
        }

        $cost_template = new \App\cost_template;

        $cost_template->operator_id = 3;
        $cost_template->license = $request->lease;
        $cost_template->field_id = $request->field_id;
        $cost_template->production = $request->bopd;
        $cost_template->level = $request->level;
        $cost_template->name = $request->name;

        if ($error = $this->check_cost_codes($costs, $codes, $my_codes)) {
            $request->session()->flash('error', $error);
            return $error;
        } else {
            if ($cost_template->save()) {
                $id = \DB::getPdo()->lastInsertId();;
                if ($this->save_cost_template($costs, $id)) {
                    return redirect('fdp');
                } else {
                    $request->session()->flash('error', '$error');
                }
            } else {
                $request->session()->flash('error', '$error');
            }
        }

    }

    private function check_cost_codes(&$costs, &$codes, &$my_codes) {

        $keys = array_keys($codes);

        foreach ($keys as $key => $value) {
            if (!in_array($value, $my_codes)) {
                return "Cost data is invalid, missing cost code $value.";
            }
        }

        foreach ($my_codes as $key => $value) {
            if (!in_array($value, $keys)) {
                return "Cost data is invalid, unrecognized cost code $value.";
            }
        }

    }

    private function save_cost_template(&$costs, &$id) {
        foreach ($costs as $key => $cost) {
            $costs[$key]['cost_template_id'] = $id;
        }
        return \DB::table('cost_data')->insert($costs);
    }

    private function get_cost_value(&$id, &$row, &$codes, $level, $type=1) {

        $cells = $type == 1 ?
            ($level != 4 ? [NULL,'E','F','G'] : ['E','F','G','H']) : 
            ($level != 4 ? [NULL,'H','I','J'] : [NULL,'I','J','K']);

        return [
            'cost_code_id' => !empty($codes[$row['B']]) ? $codes[$row['B']] : NULL,
            'cost_template_id' => NULL,
            'basis' => $cells[0] == NULL ? NULL : $row[$cells[0]],
            'qty_days' => $row[$cells[1]],
            'unit_price' => $row[$cells[2]],
            'total_price' => $row[$cells[3]],
            'cost_type' => $type
        ];
    }

    private function cost_codes($level) {
        $codes = \App\cost_code::select('id', 'code')->where('level_id', $level)->get();

        foreach ($codes as $key => $code) {
            $new[$code->code] = $code->id;
        }

        return $new;
    }

    public function getlicense(){

     
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {

        switch ($id) {

            case 'excel': return $this->read_excel();

            case 'cost': return $this->costs($request);

            case 'find_field': return $this->find_field($request);
            
            default:
                # code...
                break;
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $fdp = \App\fdp::where('operator_id', 1)->where('id', $id)->first();

        $data['terrains'] = \App\terrain::select('name','id')->distinct('name')->get();
        $data['types'] = \App\type::distinct('type')->get();
        $data['levels'] = \App\level::distinct('level')->get();

        foreach ($data['levels'] as $level) {
            if ($level->id == $fdp->level) {
                $link = $level->level;
                break;
            }
        }

        return view('fdp.review', compact('data', 'fdp', 'link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // add new review

        $inputs = $request->all();

        $this->validate($request, [
            'level'=>'required|integer',
            'type'=>'required|integer',
            'terrain'=>'required|integer',
            'cost_template'=>'required',
            'fdp'=>'required',
            'name'=>'required|min:5',
            'bopd'=>'required',
            'license_due'=>'required',
            'lease'=>'required'
        ]);

        if ($request->hasFile('cost_template') && $request->file('cost_template')->isValid()) {
            $request->photo->storeAs(public_path('sample_files'), 'fdp_cost.xlsx');
        }

        if ($request->hasFile('fdp') && $request->file('fdp')->isValid()) {
            $request->photo->storeAs(public_path('sample_files'), 'fdp_fdp.xlsx');
        }

        $fdp = new \App\fdp;

        $fdp->operator_id = 1;
        $fdp->type = $request->type;
        $fdp->level = $request->level;
        $fdp->terrain = $request->terrain;
        $fdp->name = $request->name;
        $fdp->review = $id;
        $fdp->license = $request->lease;
        $fdp->production = $request->bopd;
        $fdp->license_due = $request->license_due;

        $fdp->save();

        return redirect('fdp');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function costs($request) {

        $levels = \App\level::distinct('level')->get();
        return view('costs.costs', compact('levels'));

    }

    public function view_cost_template($id,$type=1) {
            
                $userid=\Auth::user()->id;
           
        $template = \DB::table('cost_templates as c')
            ->select('c.*', 'f.field_name', 'l.level as levels')
            ->leftjoin('levels as l', 'c.level', '=', 'l.id')
            ->leftjoin('fields as f', 'c.field_id', '=', 'f.id')
            ->where('c.operator_id', $userid)
            ->where('c.id', $id)
            ->first();

        $cost_data = $this->get_cost_data($id);
        if($type==1){
           return view('fdp.view', compact('template', 'cost_data'));
        }
       else{
        return $template;
       }

    }

    public function get_cost_data($id) {


        $cost_data['estimated'] = \DB::table('cost_data as cd')
            ->select('cd.*', 'cc.*')
            ->leftjoin('cost_codes as cc', 'cc.id', '=', 'cd.cost_code_id')
            ->where('cd.cost_template_id', $id)
            ->where('cd.cost_type', 1)
            ->orderBy('cost_code_id', 'ASC')
            ->get();

        $cost_data['actual'] = \DB::table('cost_data as cd')
            ->select('cd.*', 'cc.*')
            ->leftjoin('cost_codes as cc', 'cc.id', '=', 'cd.cost_code_id')
            ->where('cd.cost_template_id', $id)
            ->where('cd.cost_type', 2)
            ->orderBy('cost_code_id', 'ASC')
            ->get();

        return $cost_data;
    }


   private function read_excel($path = 'assets/Abandonment.xlsx') { // $request->excel->path()

            $alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

            $core_costs = $sub_costs = [];

            $ob = \PHPExcel_IOFactory::load( $path );
            $sob = $ob->getActiveSheet()->toArray(null,true,true,true);

            foreach ($sob as $key => $row) {

                dd($row);
                if ($key >= 9 && $key <= 17) {
                    $costs[] = ['code'=>$row['B'], 'description'=>$row['C'], 'level_id'=>5];
                }
            }

            \App\cost_code::insert($costs);

            dd($costs);

            foreach ($sob as $key => $row) {
                foreach ($row as $cell => $value) {

                    if ($cell != 'A') {

                        if (($key % 2)) {

                            $key < 2 ? $core_costs[$cell]['code'] = $value : $sub_costs[$cell][$key]['code'] = $value;

                        } else {

                            $key < 2 ? $core_costs[$cell][]['description'] = $value : $sub_costs[$cell][$key]['description'] = $value;

                        }

                    }

                }
                dd($core_costs, $sub_costs);
            }

    }

    public function find_field($request) {

        if (strlen($request->q) > 2) {

            $block = \App\block::selectRaw("CONCAT(fields.field_name, ' (', blocks.blockname, ')') as text, blocks.id as id")
                ->leftjoin('fields', 'blocks.id', '=', 'fields.block_id')
                ->where('fields.field_name', 'like', "$request->q%")
                ->where('blocks.company_id', 3)
                ->get()
                ->toArray();

            // $type = $block ? substr($block->blockname, 0, 3) : '';

            return response()->json($block);
        }

        return '';

    }


    public function benchmark($terrain_id, $level_id, $template_id, $lease_id, $year, $month) {

        $avg['estimated'] = $this->get_total($terrain_id, $level_id, $template_id, $lease_id, $year, $month);
        $avg['actual'] = $this->get_total($terrain_id, $level_id, $template_id, $lease_id, $year, $month, 2);

        return $avg;

    }

    private function get_total($terrain_id, $level_id, $template_id, $lease_id, $year, $month, $cost_type=1) {
 
        $totals = \DB::table('cost_templates as c')
            ->select('cd.total_price', 'b.lease_id')
            ->leftjoin('fields as f', 'c.field_id', '=', 'f.id')
            ->leftjoin('blocks as b', 'f.block_id', '=', 'b.id')
            ->leftjoin('cost_data as cd', 'c.id', '=', 'cd.cost_template_id')
            ->where('c.id', '!=', $template_id)
            ->where('c.level', $level_id)
            ->where('b.lease_id', $lease_id)
            ->where('f.terrain_id', $terrain_id)
            ->where('cd.cost_type', $cost_type)
            ->whereYear('c.created_at', $year)
            ->whereMonth('c.created_at', $month)
            ->get();
            
          
        return  round(collect($totals)->avg('total_price'),2);

    }


    /**
     * My Own Functions
     */



}
