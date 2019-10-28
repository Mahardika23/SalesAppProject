<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class toko extends Model
{
    protected $table = 'tokos';
    protected $primary_key='id';
    protected $fillable = ['nama_toko','nama_pemilik','alamat_toko','no_telp','alamat_toko','email_pemilik','province_id','regency_id','district_id','village_id'];
    
    public function user(){
        return $this->morphMany('App\User','userable');
    }
        
}
