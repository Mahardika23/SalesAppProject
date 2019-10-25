<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class regencies extends Model
{
    //
    protected $table = 'regencies';
	protected $primaryKey = 'id';
	public function districts(){
        return $this->hasMany('App\districts');
            
    }
    public function provinces(){
        return $this->belongsTo('App\provinces');
    }
}
