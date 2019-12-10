<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Contracts\Session\Session;
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

    public function aktivitas(Request $request)
    {
        $request->session()->get('login', 'true');
        if ($request->session()->has('login')) {
            return view('aktivitas');
        } else {
            return redirect()->route('login');
        }
    }

    public function distributor(Request $request)
    {
        if ($request->session()->has('login'))
        {
            return view('distributor');
        } else {
            return redirect()->route('login');
        }
    }

    public function getBarangPesan(Request $request)
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
        $request->session()->get('login', 'true');
        if ($request->session()->has('login')) {
            return view('pesan', compact('data'));
        } else {
            return redirect()->route('login');
        }
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
        if ($request->session()->has('login'))
        {
            return view('search', compact('data'),);
        } else {
            return redirect()->route('login');
        }
        
    }

    public function login(Request $request)
    {
        if ($request->session()->has('login'))
        {
            return redirect()->route('beranda');
        } else {
            return view('login');
        }
    }

    public function daftar(Request $request)
    {
        if ($request->session()->has('login'))
        {
            return redirect()->route('beranda');
        } else {
            return view('daftar');
        }
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
