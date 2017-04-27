<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
	protected $fillable = [
        'email',
        'priority',
        'company_id'
    ];
    //
    public function company(){
    	return $this->belongsTo('App\Company');
    }
}
