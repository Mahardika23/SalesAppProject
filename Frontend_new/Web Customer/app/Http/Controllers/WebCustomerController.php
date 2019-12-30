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
        session()->put('stok_barang', $request->get('stok_barang'));
        session()->put('quantity', $request->get('quantity'));
        session()->put('harga_barang', $request->get('harga_barang'));
        session()->put('nama_barang', $request->get('nama_barang'));
        session()->put('nama_distributor', $request->get('nama_distributor'));
        return redirect()->back();
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

    public function beranda()
    {
        return view('beranda');
    }

    public function aktivitas(Request $request)
    {
        return view('aktivitas');
    }

    public function distributor(Request $request)
    {
        $client =  new Client();
        $promise = $client->getAsync('http://127.0.0.1:9090/api/dsitributor')->then(
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

        //dd($data);
        // dd($data);
        return view('distributor', compact('data'));
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
        return view('pesan', compact('data'));
    }

    public function getBarangSearch(Request $request){
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
                //dd($data);
            return view('search', compact('data'));
    }

    public function getKategoriSearch(Request $request, $id)
    {
        $input = $request->all();
        $input['id']=$id;
        // dd($id);
            $client =  new Client();
            $promise = $client->getAsync('http://127.0.0.1:9090/api/barangbykategori', ['query' => $input])->then(
                function ($response) {
                    return $response->getBody();
                },
                function ($exception) {
                    return $exception->getMessage();
                }
            );
    
            $data = $promise->wait();
            $data = json_decode($data, true);
        //dd($data);
        // $data = $data['data'];
        return view('search', compact('data'));
    }

    public function daftar(Request $request)
    {
        if ($request->session()->has('login'))
        {
            return redirect()->route('beranda');
        } else {
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
            return view('daftar',compact('data'));
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

    public function getBarang(Request $request)
    {
        $client =  new Client();
        $promise = $client->getAsync('http://127.0.0.1:9090/api/kategori')->then(
            function ($response) {
                return $response->getBody();
            },
            function ($exception) {
                return $exception->getMessage();
            }
        );
        $kategori = $promise->wait();
        $kategori = json_decode($kategori, true);

        if ($request->session()->has('token')) {
            # code...
            $token = $request->session()->get('token');
            // $promise = $client->requestAsync('POST','http://127.0.0.1:9090/api/logout', ['headers' => ['Authorization' => "Bearer {$token}"]])->then(
            $client =  new Client();
            $promise = $client->getAsync('http://127.0.0.1:9090/api/showcatalogbyuser', ['headers' => ['Authorization' => "Bearer {$token}"]])->then(
                function ($response) {
                    return $response->getBody();
                },
                function ($exception) {
                    return $exception->getMessage();
                }
            );

            $data = $promise->wait();
            $data = json_decode($data, true);
        } else {
            # code...
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
            $promise = $client->getAsync($data['next_page_url'])->then(
                function ($response) {
                    return $response->getBody();
                },
                function ($exception) {
                    return $exception->getMessage();
                }
            );

            $page2 = $promise->wait();
            $page2= json_decode($page2, true);
        }

        // $data = $data['data'];
        //dd($data);
        //  dd($page2);
        return view('beranda', compact('data','page2','kategori'));
    }
}
