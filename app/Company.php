<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = [
        'name',
        'registration_number',
        'address',
        'user_id',
        'logo',
        'working_hours',
        'other_description'
    ];
    
    public function email(){
    	return $this->hasMany('App\Email');
    }


    public function phone_number(){
    	return $this->hasMany('App\PhoneNumber');
    }


    public function location(){
    	return $this->hasMany('App\MapLocation');
    }

    public function location_city(){
        return $this->belongsTo('App\Location');
    }

    public function product(){
    	return $this->hasMany('App\Product');
    }


}
