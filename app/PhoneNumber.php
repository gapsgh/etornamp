<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
	protected $fillable = [
        'number',
        'priority',
        'company_id'
    ];
    //
    public function company(){
    	return $this->belongsTo('App\Company');
    }
}
