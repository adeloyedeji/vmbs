<?php
namespace App\Repositories;


class AssetRepo 
{

	//getasset
	public function getasset(){

		$assets=\DB::table('blocks as b')
                       ->join('fields as f','f.block_id','=','b.id')
                       ->join('wells as w','f.id','=','w.field_id') 
                       ->select('b.area','b.water_depth','f.field_name','b.company_id','b.blockname')
                       ->groupBy('f.field_name')
                       ->paginate(20);
        return $assets;
	}


	//search asset
	public function searchasset(array $request){


		              $biz_arrange=$request['biz_arrange'];
                  $well_type=$request['well_type'];
                  $well_class=$request['well_class'];
                  $award_year=$request['award_year'];
                  $terrain=$request['terrain'];
                  $license_type=$request['license_type'];



                  if($biz_arrange==0){
                    $operand1="!=";
                  }
                   else{
                    $operand1="=";
                  }

                  if($well_class==0){
                      $operand2="!=";
                  } 
                  else{
                    $operand2="=";
                  }

                  if($well_type==0){
                      $operand3="!=";
                  }
                  else{
                    $operand3="=";
                  }

                  if($award_year==0){
                      $operand4="!=";
                  }
                  else{
                    $operand4="=";
                  }


                  if($terrain==0){
                      $operand5="!=";
                  }
                  else{
                    $operand5="=";
                  }

                   if($license_type==0){
                      $license_type="";
                  } 
                  else{
                    $license_type=$license_type;
                  }


        //get distinct asset(block,field,well)
        $getblock=\DB::table('blocks as b')
                       ->join('fields as f','f.block_id','=','b.id')
                       ->join('wells as w','f.id','=','w.field_id')
                       ->join('well_classes as c','w.wellclass_id','=','c.id')
                       ->join('company_leases as cl','b.id','=','cl.block_id') 
                       ->where('cl.lease_type',$operand1,$biz_arrange)
                       ->where('w.type',$operand2,$well_type)
                       ->where('c.classname',$operand3,$well_class)
                       ->where('cl.date_awarded',$operand4,$award_year)
                       ->where('f.terrain_id',$operand5,$terrain)
                       ->where('b.blockname','LIKE',"%$license_type%")
                       ->groupBy('f.field_name')
                       ->paginate(20);

         return $getblock;


	}
	 
}
