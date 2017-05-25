<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'code',
        'single_price',
        'bulk_price',
        'bonus_percentage_single',
        'bonus_percentage_bulk',
        'active_status',
        'approval_status',
        'category_id',
        'company_id',
        'certification_status',
        'premiun_status',
        'location_city'
    ];

    public function company(){
    	return $this->belongsTo('App\Company');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function producr_location_city(){
    	return $this->hasOne('App\Location','id','location_city');
    }


    public function image(){
    	return $this->hasMany('App\ProductImage');
    }

    public function rating(){
        return $this->hasMany('App\ProductRating');
    }

    public function visitors(){
    	return $this->hasMany('App\ProductVisitors');
    }




}
