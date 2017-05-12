<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MapLocation extends Model
{
    protected $fillable = [
        'company_id',
        'lng',
        'lat'
    ];
    
    public function company(){
    	return $this->belongsTo('App\Company');
    }
}
