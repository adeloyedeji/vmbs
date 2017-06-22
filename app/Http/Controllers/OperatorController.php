<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Csv\Reader;
use DB;
use Response;
use APP;

class OperatorController extends Controller
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

    // public function testssso() {
    //     return response()->json(DB::table('blocks as b')->select('b.blockname', 'f.field_name', 'o.name', 'cl.company_id')
    //        ->join('fields as f','f.block_id','=','b.id')
    //        ->join('company_leases as cl','b.id','=','cl.block_id')
    //        ->join('operators as o','o.id','=','cl.company_id')
    //        ->where('cl.company_id', 1)
    //        ->groupBy('f.field_name')
    //        ->get()->toArray());
    // }

    public function testssso() {

        $fdps = 

            \App\fdp::select('fdps.*','types.type','levels.level','terrains.name as terrain')
            ->join('types', 'fdps.type', '=', 'types.id')
            ->join('terrains', 'fdps.terrain', '=', 'terrains.id')
            ->join('levels', 'fdps.level', '=', 'levels.id')
            ->where('operator_id', 1)
            ->paginate(20);

        return view('fdp.list_fdp', compact('fdps'));

    }

    public function submit_fdp() {

        $data['terrains'] = \App\terrain::select('name','id')->distinct('name')->get();
        $data['types'] = \App\type::distinct('type')->get();
        $data['levels'] = \App\level::distinct('level')->get();

        return view('fdp.submit', compact('data'));

    }

    public function review($id) {

        $fdp = \App\fdp::where('operator_id', 1)->where('fdps.id', $id)->first();

        $data['terrains'] = \App\terrain::select('name','id')->distinct('name')->get();
        $data['types'] = \App\type::distinct('type')->get();
        $data['levels'] = \App\level::distinct('level')->get();

        return view('fdp.review', compact('data', 'fdp'));

    }

    public function review_fdp($id, Request $request) {

        $inputs = $request->all();

        $this->validate($request, [
            'level'=>'required|integer',
            'type'=>'required|integer',
            'terrain'=>'required|integer',
            'cost_template'=>'required',
            'fdp'=>'required|min:5',
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

        $fdp->save();

        return redirect('fdp/list');
    }

    public function submit(Request $request) {

        $inputs = $request->all();

        $this->validate($request, [
            'level'=>'required|integer',
            'type'=>'required|integer',
            'terrain'=>'required|integer',
            'cost_template'=>'required',
            'fdp'=>'required|min:5'
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

        $fdp->save();

        return redirect('fdp/list');

    }
}
