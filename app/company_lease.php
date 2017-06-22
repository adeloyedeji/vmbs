<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company_lease extends Model
{
    //
    protected $fillable=  ['block_id','company_id','lease_type','date_awarded'];
}
