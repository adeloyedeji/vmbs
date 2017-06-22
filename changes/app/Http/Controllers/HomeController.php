<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AssetRepo;
use League\Csv\Reader;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $asset;
    public function __construct(AssetRepo $asset)
    {
        $this->middleware('auth');
        $this->asset=$asset;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
  

    public function index()
    {
       $getblock=$this->asset->getasset();
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
