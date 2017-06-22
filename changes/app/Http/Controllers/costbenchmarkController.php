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
        if($id=='benchmarking'){
            
            $analysis=app('App\Http\Controllers\FdpController')->benchmark($request->terrain_id,$request->level_id,$request->template_id,$request->lease_id,$request->year,$request->month);
            $analysis['currentest']=$request->esttotal;
            $analysis['currentactual']=$request->actualtotal;

           return $analysis;

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

  

  
}
