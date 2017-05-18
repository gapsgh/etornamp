<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    //
    public function company(){
    	return $this->belongsTo('App\Company');
    }
}
