<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Repositories\AssetRepo;
class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $asset;

    public function __construct(AssetRepo $asset){

          $this->asset=$asset;
    }

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
        //
        if($id=="searchresult"){

        //get blocks
        $getblock=$this->asset->searchasset((array) $request->input());             
        //get terrain
        $terrains=\App\terrain::select('name','id')->distinct('name')->get();
        //get distinct biz arrangement
        $getbizrrange=\App\company_lease::select('lease_type')->distinct('lease_type')->get();
        //get distinct well type
        $welltype=\App\well::select('type')->distinct('type')->get();

        //getclassname

        $wellclass=\App\well_class::select('id','classname')->get();


        return view('home',compact('getbizrrange','welltype','wellclass','getblock','terrains'));

        
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
