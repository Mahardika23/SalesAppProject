<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
	protected $primaryKey = 'id';
	public function village(){
        return $this->hasMany('App\Villages');
            
    }
    public function regencies(){
        return $this->belongsTo('App\Regency');
    }
}
