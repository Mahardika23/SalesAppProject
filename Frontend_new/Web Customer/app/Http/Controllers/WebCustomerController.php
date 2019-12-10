<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WebCustomerController extends Controller
{
    //
    public function cart(Request $request)
    {
        session()->put('stok_barang',$request->get('stok_barang'));
        session()->put('quantity',$request->get('quantity'));
        session()->put('harga_barang',$request->get('harga_barang'));
        session()->put('nama_barang',$request->get('nama_barang'));
        session()->put('nama_distributor',$request->get('nama_distributor'));
        return redirect()->back();
    }

    public function beranda()
    {
        return view('beranda');
    }

    public function aktivitas()
    {  
        return view('aktivitas');
    }

    public function distributor()
    {
        return view('distributor');
    }

    public function getBarangPesan()
    {
        $client =  new Client();
        $promise = $client->getAsync('http://127.0.0.1:9090/api/showallcatalogweb')->then(
            function ($response) {
                return $response->getBody();
            },
            function ($exception) {
                return $exception->getMessage();
            }
        );

        $data = $promise->wait();
        $data = json_decode($data, true);

        // $data = $data['data'];

        // dd($data);
        return view('pesan', compact('data'));
    }

    public function getBarangSearch(Request $request)
    {
        $input = $request->all();
        $client =  new Client();
        $promise = $client->getAsync('http://127.0.0.1:9090/api/search', ['query' => $input])->then(
            function ($response) {
                return $response->getBody();
            },
            function ($exception) {
                return $exception->getMessage();
            }
        );

        $data = $promise->wait();
        $data = json_decode($data, true);

        // $data = $data['data'];

        // dd($input);
        return view('search', compact('data'));
    }

    public function login()
    {
        return view('login');
    }

    public function daftar()
    {
        return view('daftar');
    }

    public function daftar2(Request $request)
    {
        $input = $request->all();
        //  dd($input);
        return view('daftar2', compact('input'));
    }

    public function getProvince(Request $request)
    {
        $input = $request->all();
        $client =  new Client();
        $promise = $client->getAsync('http://127.0.0.1:9090/api/province')->then(
            function ($response) {
                return $response->getBody();
            },
            function ($exception) {
                return $exception->getMessage();
            }
        );
        $alamat = $request->all();
        //dd ($alamat);
        $data = $promise->wait();
        $data = json_decode($data, true);

        //  $data = $data['data'];
        // dd($data);
        return view('daftar3', compact('data'), compact('input'));
    }

    public function getBarang()
    {
        $client =  new Client();
        $promise = $client->getAsync('http://127.0.0.1:9090/api/showallcatalogweb')->then(
            function ($response) {
                return $response->getBody();
            },
            function ($exception) {
                return $exception->getMessage();
            }
        );

        $data = $promise->wait();
        $data = json_decode($data, true);

        // $data = $data['data'];

        // dd($data);
        return view('beranda', compact('data'));
    }
}
