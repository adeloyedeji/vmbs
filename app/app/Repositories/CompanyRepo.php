<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

use App\Repositories\Interfaces\CompanyInterface;

class CompanyRepo implements CompanyInterface 
{
	
	public function getCompany($id)
	{
		$company;
		try {
			if($id == 'all')
			{
				$company = \App\Company::paginate(10);
			}
			else
			{
				$company = \App\Company::where('id', $id)->first();
			}
		} catch(\Exception $ex) {
			return $ex;
		}
		return  $company;
	}

	public function getCompanyBlock($id)
	{
		$companyBlock = 0;
		try {
			if($id == 'all')
			{
				$companyBlock = \App\block::paginate(10);
			}
			else
			{
				$companyBlock = \App\block::where('company_id', $id)->paginate(10);
			}
		} catch(\Exception $ex) {
			return $ex;
		}
		return $companyBlock;
	}

	public function getCompanyField($id)
	{
		$companyField = 0;
		try {
			if($id == 'all')
			{
				$companyField = \App\field::paginate(10);
			}
			else
			{
				$companyField = \App\field::where('company_id', $id)->paginate(10);
			}
		} catch(\Exception $ex) {
			return $ex;
		}
		return $companyField;
	}

	public function getCompanyWell($id)
	{
		$companyWell = 0;
		try {
			if($id == 'all')
			{
				$companyWell = \App\well::paginate(10);
			}
			else
			{
				$companyWell = \App\well::where('company_id', $id)->paginate(10);
			}
		} catch(\Exception $ex) {
			return $ex;
		}
		return $companyWell;
	}

	public function getCompanyFieldBlock($block_id)
	{
		$fieldBlock;
		try {
			$fieldBlock = \App\block::where('id', $block_id)->first();
		} catch(\Exception $ex) {
			return $ex;
		}
		return  $fieldBlock;
	}

	public function getCompanyWellField($field_id)
	{
		$wellField;
		try {
			$wellField = \App\field::where('id', $field_id)->first();
		} catch(\Exception $ex) {
			return $ex;
		}
		return $wellField;
	}
	public function getTemplate($comp_id){

			$getcosttemplate=\DB::table('cost_templates as ct')
								  ->leftJoin('levels as l','ct.level','=','l.id')
								  ->select('name','field_id','operator_id','production','l.level','ct.level as level_id','status','review','license','ct.created_at','ct.id')
								  ->where('operator_id',$comp_id)
								  ->orderBy('ct.created_at','desc')
								  ->paginate(10);

			return $getcosttemplate;




	}
}
