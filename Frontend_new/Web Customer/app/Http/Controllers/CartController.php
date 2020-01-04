<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function cart(){
        $data = Cart::getContent();
         
        $j=0;
        $cart=NULL;
        $jmldistri=0;
        $tambah=TRUE;
        foreach($data as $barang){
            if($cart==NULL){
                $cart[0][0]=$barang;
                $jmldistri++;
            }
            else{
                for($check=0;$check<$jmldistri;$check++){
                    $tambah=FALSE;
                   if($cart[$check][0]['attributes']['id_distributor']==$barang['attributes']['id_distributor']){
                        $j++;
                        $cart[$check][$j]=$barang;
                        $tambah=TRUE;
                    break;
                    }
                }
                if($tambah==FALSE){
                    $cart[$check][0]=$barang;
                    $jmldistri++;
                } 
            }
        }
        //dd($cart);
    
       return view('cart',compact('cart'));
    }

    public function remove(Request $request){
        // dd($request);
        Cart::remove($request->id);
        return redirect()->back();
    }

    public function add(Request $request){
        $input['distributor_id']=$request->id_distributor;
        //dd($input);
        $client =  new Client();
        $token = $request->session()->get('token');
        $promise = $client->getAsync('http://127.0.0.1:9090/api/getstatusdistributor', ['headers' => ['Authorization' => "Bearer {$token}"],'query' => $input])->then(
            function ($response) {
                return $response->getBody();
        }, function ($exception){
            return $exception->getMessage();
        }
    );
        $data = $promise->wait();
        $data = json_decode($data,true);
        //dd($data);
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
