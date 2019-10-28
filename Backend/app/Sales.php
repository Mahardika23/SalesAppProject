<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    //
    public function users(){
        return $this->morphMany('App\User','userable');
    }
}
