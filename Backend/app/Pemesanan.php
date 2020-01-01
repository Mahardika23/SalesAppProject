<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Pemesanan extends Model
{
    //
    use SoftDeletes;
    protected $guarded=['id'];    
    public $timestamps=true;
    public function distributor(){
        return $this->belongsTo('App\Distributor');
    }
    public function toko(){
        return $this->belongsTo('App\Toko');
    }
    public function sales(){
        return $this->belongsTo('App\Sales');

    }
    public function barang(){
        return $this->belongsToMany('App\Barang','barang_pemesanans')->withPivot('kuantitas_barang');;
    }

}
