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
            
            $finaldata=[];    
            $begin = new \DateTime($request->year.'-1-1');
            $end   = new \DateTime($request->year.'-'.$request->month.'-1');

          for($i = $begin; $i <=$end; $i->modify('+1 month')){
 
            $analysis=app('App\Http\Controllers\FdpController')->benchmark($request->terrain_id,$request->level_id,$request->template_id,$request->lease_id,$request->year,$i->format("m"));
            $analysis['currentest']=$request->esttotal;
            $analysis['currentactual']=$request->actualtotal;
            $analysis['month']=date('M',strtotime($i->format("Y-m").'-1'));           

           $finaldata[]=$analysis;

            }             
            return $finaldata;

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
