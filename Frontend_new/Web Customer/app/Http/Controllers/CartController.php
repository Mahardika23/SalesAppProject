<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function cart(){
        $data = Cart::getContent();
        $subtotal = Cart::getSubTotal();
        // dd($data);
        $cart = Cart::getContent()->groupBy(function ($item, $key) {
             
            return $item->attributes->id_distributor;
        });
        
        // $groupedCartItems = [];
        // foreach ($data as $item) {
        //     // echo($item)->attributes->id_distributor;
        //     $groupedCartItems["{$item->attributes->id_distributor}"][] = $item->toArray();
        // }
        // dd($grouped);
        // dd($subtotal);
        // $j=0;
        // $cart=NULL;
        // $jmldistri=0;
        // $tambah=TRUE;
        // foreach($data as $barang){
        //     if($cart==NULL){
        //         $cart[0][0]=$barang;
        //         $jmldistri++;
        //     }
        //     else{
        //         for($check=0;$check<$jmldistri;$check++){
        //             $tambah=FALSE;
        //            if($cart[$check][0]['attributes']['id_distributor']==$barang['attributes']['id_distributor']){
        //                 $j++;
        //                 $cart[$check][$j]=$barang;
        //                 $tambah=TRUE;
        //             break;
        //             }
        //         }
        //         if($tambah==FALSE){
        //             $cart[$check][0]=$barang;
        //             $jmldistri++;
        //         } 
        //     }
        // }
        //  dd($cart);
    
       return view('cart',compact('cart'));
    }

    public function remove(Request $request){
        //dd($request);
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
