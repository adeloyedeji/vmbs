<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\costbenchmarkRepo;

class costbenchmarkController extends Controller
{

    protected $cost;
    public function __construct(costbenchmarkRepo $cost)
    {
        $this->middleware('auth');
        $this->cost = $cost;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        //
        if($id == 'benchmarking')
        {
            $terrain_id = $request->terrain_id;
            $level_id = $request->level_id; 
            $template_id = $request->template_id;
            $lease_id = $request->leasename;
            $year = $request->year;
            $month = $request->month;
            $esttotal = $request->esttotal; 
            $actualtotal = $request->actualtotal;
            session(['terrain_id' => $terrain_id, 'level_id' => $level_id, 'template_id' => $template_id, 'lease_id' => $lease_id, 'year' => $year, 'month' => $month, 'esttotal' => $esttotal, 'actualtotal' => $actualtotal]);
            $finalData = $this->benchMarkData($terrain_id, $level_id, $template_id, $lease_id, $year, $month, $esttotal, $actualtotal);
            return view('companies.benchmarking', ['plotData' => $finalData]);
        }
        if($id == 'getBenchMarkData')
        {
            $terrain_id = $request->terrain_id;
            $level_id = $request->level_id; 
            $template_id = $request->template_id;
            $lease_id = $request->lease_id;
            $year = $request->year;
            $month = $request->month;
            $esttotal = $request->esttotal; 
            $actualtotal = $request->actualtotal;

            $data = $this->benchMarkData($terrain_id, $level_id, $template_id, $lease_id, $year, $month, $esttotal, $actualtotal);
            return response()->json($data);
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
        //
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
        //
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

    public function benchMarkData($terrain_id, $level_id, $template_id, $lease_id,$year, $month, $esttotal, $actualtotal)
    {
        $finaldata=[];    
        $begin = new \DateTime($year.'-1-1');
        $end   = new \DateTime($year.'-'.$month.'-1');

        for($i = $begin; $i <= $end; $i->modify('+1 month'))
        {
            $analysis = app('App\Http\Controllers\FdpController')
            ->benchmark($terrain_id,$level_id,$template_id,$lease_id,$year,$i->format("m"));
            $analysis['currentest']=$esttotal;
            $analysis['currentactual']=$actualtotal;
            $analysis['month']=date('M',strtotime($i->format("Y-m").'-1'));           
            $finaldata[]=$analysis;
        } 
        return $finaldata;
    }


}
