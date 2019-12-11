<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sales extends Model
{
    //
    use SoftDeletes;
    public function users(){
        return $this->morphMany('App\User','userable');
    }

    public function tokos(){
        return $this->hasMany('App\toko');
    }
    public function pemesanan(){
        return $this->hasMany('App\Pemesanan');
    }
    
}
