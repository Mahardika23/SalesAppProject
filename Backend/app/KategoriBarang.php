<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriBarang extends Model
{
    //
    public function barang()
    {
        return $this->hasMany('App\Barang','kategori_id');
    }
}
