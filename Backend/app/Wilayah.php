<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    //
  
    public function produk(){
        return $this->belongsToMany('App\Barang','wilayah_produks');
    }
}
