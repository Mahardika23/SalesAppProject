<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    //
    protected $table = 'provinces';
    protected $primaryKey = 'id';
    
    public function regencies(){
        return $this->hasMany('App\Regency');
        
    }
}
