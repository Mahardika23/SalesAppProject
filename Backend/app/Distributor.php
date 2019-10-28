<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    //
    public function barang(){
        return $this->hasMany('App\Barang');
    }
}
