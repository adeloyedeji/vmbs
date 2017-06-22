<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class well extends Model
{
    //
    protected $fillable=['well_name','type','depth','remark','field_id','capacity','prod_date','prod_complete_date','wellclass_id'];

    

}
