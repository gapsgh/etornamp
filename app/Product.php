<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function company(){
    	return $this->belongsTo('App\Company');
    }

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function image(){
    	return $this->hasMany('App\ProductImage');
    }

    public function rating(){
    	return $this->hasMany('App\ProductRating');
    }


}
