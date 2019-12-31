<?php
    
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class toko extends Model
{
    use SoftDeletes;
    protected $table = 'tokos';
    protected $primary_key='id';
    protected $fillable = ['nama_toko','nama_pemilik','alamat_toko','no_telp','alamat_toko','email_pemilik','province_id','regency_id','district_id','village_id'];
    
    public function user(){
        return $this->morphMany('App\User','userable');
    }
    public function sales(){
        return $this->belongsTo('App\Sales','sales_id');
    }   

    public function pemesanan(){    
        return $this->hasMany('App\Pemesanan','toko_id');
    }
        
    public function distributor(){    
        return $this->belongsToMany('App\Distributor','mitras','toko_id','distributor_id')->withPivot('status','sales_id');
    }
}
