<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

use App\Repositories\Interfaces\UtilityInterface;

class UtilityRepo implements UtilityInterface 
{
	
	public function getCountry($id)
	{
		$country;
		try {
			if($id == 'all')
			{
				$country = \App\Country::paginate(10);
			}
			else
			{
				$country = \App\Country::where('id', $id)->first();
			}
		} catch(\Exception $ex) {
			return $ex;
		}
		return $country;
	}

	public function getLeaseType($id)
	{
		$lease;
		try {
			if($id == 'all')
			{
				$lease = \App\Lease::all();
			}
			else
			{
				$lease = \App\Lease::where('id', $id)->first();
			}
		} catch(\Exception $ex) {
			return $ex;
		}
		return $lease;
	}

	public function getTerrains($id)
	{
		$terrains;
		try {
			if($id == 'all')
			{
				$terrains = \App\terrain::all();
			}
			else
			{
				$terrains = \App\terrain::where('id', $id)->first();
			}
		} catch(\Exception $ex) {
			return $ex;
		}
		return $terrains;
	}

	public function getStages($id)
	{
		$stages;
		try {
			if($id == 'all')
			{	
				$stages = \App\level::all();
			}
			else
			{
				$stages = \App\level::where('id', $id)->first();
			}
		} catch(\Exception $ex) {
			return $ex;
		}
		return $stages;
	}

	public function getBusinessArrangements($id)
	{
		$bizArrangements;
		try {
			if($id == 'all')
			{
				$bizArrangements = \App\Lease::all();
			}
			else
			{
				$bizArrangements = \App\Lease::where('id', $id)->first();
			}
		} catch(\Exception $ex) {
			return $ex;
		}
		return $bizArrangements;
	}

	public function getProjectData($projectid)
    {
        $projectData;
        try {
            $projectData = \App\Project::where('id', $projectid)->first();
        } catch(\Exception $ex) {
            return $ex;
        }
        return $projectData;
    }

    public function getFieldID($templateId)
    {
    	$fieldID;
    	try {
    		$fieldID = \App\cost_template::where('id', $templateId)->select('field_id')->first();
    	} catch(\Exception $ex) {
    		return $ex;
    	}
    	return $fieldID;
    }
}
