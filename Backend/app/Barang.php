<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public function distributor(){
        return $this->belongsTo('App\Distributor');
    }
}
