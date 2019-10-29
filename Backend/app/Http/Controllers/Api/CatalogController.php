<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Distributor;
use App\Barang;
class CatalogController extends Controller
{
    public function showall(){
        // $distributor = 
        return $barang = Barang::all();
    }
}
