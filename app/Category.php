<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function product(){
    	return $this->hasMany('App\Product');
    }

    public function level2s()
    {
    	return $this->hasMany('App\Category','id','parent_id');
    }

}
