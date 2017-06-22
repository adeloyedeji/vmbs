<?php

namespace App\Helpers;

class helper {

    public static  function compname($id){

        $get_lease=\App\operator::where('id',$id)->value('company');

        if($get_lease){

            return $get_lease;
        }
        return 'Not Assigned';

    }

    public static function resolvestatus($status){

        if($status==0){
            return "<span class='tag tag-warning'>awaiting review</span>";
        }
        elseif($status==1){
            return "<span class='tag tag-success'>Approved</span>";
        }
        elseif($status==3){
            return "<span class='tag tag-danger'>Rejected</span>";  
        }
        else{
            return "<span class='tag tag-danger'>Rejected</span>";  
        } 

    }
    public static function get_terrain($terrainid){

        $terrainname=\App\terrain::where('id',$terrainid)
        ->select('name')
        ->value('name');
        return $terrainname;



    }

    public static function resolve_name($id,$type){

        if($type==1){

            $fieldname=\App\Field::where('id',$id)
            ->select('field_name')
            ->value('field_name');
            return $fieldname;
        }
        if($type==2){
              $terrainid=\App\Field::where('id',$id)
            ->select('terrain_id')
            ->value('terrain_id');
            return $terrainid; 
        }


    }

    public static function resolve_status($status,$type){

        if($status==0) return '<span class="tag tag-warning">Pending</span>';
        if($status==1) return '<span class="tag tag-success">Approved</span>';
        if($status==2) return '<span class="tag tag-danger">Rejected</span>';


    }

    public static function resolve_date($date){

        $dates=new \Carbon\Carbon($date);
        return $dates->diffForHumans();

    }

    public static function resolve_terrain($fieldid,$type){

        if($type==1){

            return \App\field::where('id',$fieldid)->select('terrain_id')->value('terrain_id');
        }
       
        if($type==3){

            $biz_arrange= \App\block::where('id',$fieldid)->select('lease_id')->value('lease_id');
            
            return $biz_arrange;

        }


    }

    public static function get_Total($tempid,$type){

      
            $get_Total=\DB::table('cost_data')->selectRaw('SUM(total_price) as total')->where([['cost_type',$type],['cost_template_id',$tempid]])->value('total');

            return $get_Total;
    
    }


}

