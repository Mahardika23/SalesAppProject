<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provinces extends Model
{
    //
    protected $table = 'provinces';
    protected $primaryKey = 'id';
    
    public function regencies(){
        return $this->hasMany('App\Regencies');
            
    }
}
