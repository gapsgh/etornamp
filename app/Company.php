<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    
    public function email(){
    	return $this->hasMany('App\Email');
    }


    public function phone_number(){
    	return $this->hasMany('App\PhoneNumber');
    }


    public function location(){
    	return $this->hasMany('App\MapLocation');
    }

    public function product(){
    	return $this->hasMany('App\Product');
    }


}
