<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    //
    protected $guarded=['id'];    
    public $timestamps=true;
    public function distributor(){
        return $this->belongsTo('App\Distributor');
    }
    public function toko(){
        return $this->belongsTo('App\Toko');
    }
}
