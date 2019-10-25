<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class districts extends Model
{
    //
    protected $table = 'districts';
    protected $primaryKey = 'id';
    public function villages(){
        return $this->hasMany('App\Villages');
        
    }
    public function transactions(){
        return $this->hasMany(Transaction::class)->setEagerLoads([]);
    }
    public function validTransactions(){
        return $this->hasMany(Transaction::class)->whereNotNull('verified_at')->setEagerLoads([]);
    }

}
