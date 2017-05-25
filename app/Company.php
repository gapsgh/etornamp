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
        'account_type',
        'user_id',
        'logo',
        'working_hours',
        'location_city',
        'other_description'
    ];
    
    public function email(){
    	return $this->hasMany('App\Email');
    }


    public function phone_number(){
    	return $this->hasMany('App\PhoneNumber');
    }


    public function location(){
    	return $this->hasOne('App\MapLocation');
    }

    public function company_location_city(){
        return $this->hasOne('App\Location','id','location_city');
    }
    public function location_city(){
        return $this->hasOne('App\Location','id','location_city');
    }

    public function product(){
        return $this->hasMany('App\Product');
    }

    public function company_account_type(){
        return $this->hasOne('App\AccountType','id','account_type');
    }


}
