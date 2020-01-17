<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public $guarded=[];
    public function distributor(){
        return $this->belongsTo('App\Distributor');
    }
    public function kategori(){
        return $this->belongsTo('App\KategoriBarang','kategori_id');
    }
    public function pemesanan(){
        return $this->belongsToMany('App\Pemesanan','barang_pemesanans')->withPivot('kuantitas_barang');
    }
    public function provinsi(){
        return $this->belongsToMany('App\Provinces','wilayah_produks')->withPivot('global');
    }


    public function scopeAllowFilter($query){
        $query = $query->join('distributors','barangs.distributor_id','=','distributors.id')->select('barangs.*','distributors.nama_distributor');

        if($regencyId = request('regency_id')){
            $query = $query->where('distributors.regency_id',$regencyId);            
        }

        return $query;
    }
}
