<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    //
    public function company(){
    	return $this->belongsTo('App\Company');
    }
}
