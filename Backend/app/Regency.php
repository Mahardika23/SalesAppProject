<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    //

	public function districts(){
        return $this->hasMany('App\District');
            
    }
    public function provinces(){
        return $this->belongsTo('App\Provinces');
    }
}
