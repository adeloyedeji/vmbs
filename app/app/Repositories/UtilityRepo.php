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
}
