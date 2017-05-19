<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    public function product(){
    	return $this->hasMany('App\Product','id','location_city');
    }

    public function company(){
    	return $this->hasMany('App\Company');
    }

}
