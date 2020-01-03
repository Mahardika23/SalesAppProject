<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function cart(){
        $data = Cart::getContent();
        // dd($data);
        return view('pesan',compact('data'));
        
    }

    public function remove(Request $request){
        // dd($request);
        Cart::remove($request->id);
        return redirect()->back();
    }

    public function add(Request $request){
        $add = Cart::add([
            'id' => $request->id,
            'name' => $request->nama_barang,
            'price'=> $request->harga_barang,
            'quantity'=> $request->quantity,
            
            'attributes' => [
                'id_distributor' => $request->id_distributor,
                'nama_distributor' => $request->nama_distributor,
                'stok_barang' => $request->stok_barang
            ]
        ]);
        
        return redirect()->back();
    }
}
