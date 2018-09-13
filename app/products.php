<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    //
    protected $fillable=['pro_name','pro_code','pro_price','image','pro_info','spl_price','category_id','stock'];
}
