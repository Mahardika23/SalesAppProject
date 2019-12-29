<?php

namespace App;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    //
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    protected $guarded = [];
    public function barang()
    {
        return $this->hasMany('App\Barang');
    }
    public function pemesanan()
    {
        return $this->hasMany('App\Pemesanan');
    }
    public function sales()
    {
        return $this->hasMany('App\Sales');
    }
}
