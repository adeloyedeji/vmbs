<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Interfaces\UtilityInterface;

class UtilityController extends Controller
{

    protected $utility;
    public function __construct(UtilityInterface $utility)
    {
        $this->middleware('auth');
        $this->utility = $utility;
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
    public function show(Request $request, $id)
    {
        //
        if($id == 'getTerrains')
        {
            $id = $request->id;
            $terrains = $this->utility->getTerrains($id);

            return response()->json($terrains);
        }
        if($id == 'getStages')
        {
            $id = $request->id;
            $stages = $this->utility->getStages($id);

            return response()->json($stages);
        }
        if($id == 'getBusinessArrangements')
        {
            $id = $request->id;
            $bizArrangements = $this->utility->getBusinessArrangements($id);

            return response()->json($bizArrangements);
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

    public function getCountry($id)
    {
        $country = 0;
        
        $country = $this->utility->getCountry($id);

        return $country;
    }

    public function getLeaseType($id)
    {
        $lease;

        $lease = $this->utility->getLeaseType($id);

        return  $lease;
    }

    public function getProjectData($projectid)
    {
        $projectData = $this->utility->getProjectData($projectid);

        if(!$projectData || $projectData == NULL)
        {
            $projectData['name'] = "No Match Found";
            $projectData['operator_id'] = "N/A";
            $projectData['effective_date'] = "N/A";
            $projectData['tenure'] = "N/A";
            $projectData['terrain_id'] = "N/A";
            $projectData['quantum'] = "N/A";
        }

        return $projectData;
    }

    public function getFieldID($templateId)
    {
        $fieldID = $this->utility->getFieldID($templateId);
        if(!$fieldID || $fieldID == NULL)
        {
            $fieldID = 0;
        }
        return $fieldID;
    }
}
