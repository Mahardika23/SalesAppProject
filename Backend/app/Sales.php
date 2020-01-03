<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sales extends Model
{
    //
    use SoftDeletes;
    public $guarded = ['id'];
    public function users(){
        return $this->morphMany('App\User','userable');
    }

    public function pemesanan(){
        return $this->hasManyThrough('App\Pemesanan','App\toko','sales_id','toko_id');
    }
    // public function toko(){
    //     return $this->hasMany('App\toko');
    // }
    
    public function distributor(){
        return $this->belongsTo('App\Distributor');
    }
}
