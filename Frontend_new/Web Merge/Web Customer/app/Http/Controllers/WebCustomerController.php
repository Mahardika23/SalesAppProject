<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Cart;

class WebCustomerController extends Controller
{
    //

    public function login(Request $request)
    {
        if ($request->session()->has('login')) {
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

        $token = $request->session()->get('token');
        $client =  new Client();
        $promise = $client->getAsync('http://127.0.0.1:9090/api/admin/pemesanan', ['headers' => ['Authorization' => "Bearer {$token}"]])->then(
            function ($response) {
                return $response->getBody();
            },
            function ($exception) {
                return $exception->getMessage();
            }
        );

        $data = $promise->wait();
        $data = json_decode($data, true);
        //  dd($data);

        $i = 0;
        $pesanan = null;
        $riwayat = null;
        foreach ($data as $pemesanan) {
            foreach ($pemesanan as $barang) {
                if ($barang['status_pemesanan'] == 'selesai' || $barang['status_pemesanan'] == 'ditolak') {
                    $riwayat[$i] = $barang;
                } else {
                    $pesanan[$i] = $barang;
                }
                $i++;
            }
        }
        // dd($pesanan);
        // dd($riwayat);
        // $data = $data['data'];

        return view('aktivitas', compact('pesanan', 'riwayat'));
    }

    public function getDistributor(Request $request, $id)
    {
        $token = $request->session()->get('token');
        $input = $request->all();
        $input['distributor_id'] = $id;
        $input['id'] = $id;

        $client =  new Client();

        if ($request->session()->has('token')) {
            $promise = $client->getAsync('http://127.0.0.1:9090/api/getstatusdistributor', ['headers' => ['Authorization' => "Bearer {$token}"], 'query' => $input])->then(
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
            $promise = $client->getAsync('http://127.0.0.1:9090/api/distributor/barang/' . $id)->then(
                function ($response) {
                    return $response->getBody();
                },
                function ($exception) {
                    return $exception->getMessage();
                }
            );

            $data = $promise->wait();
            $data = json_decode($data, true);
        }
        //  dd($input);

        $promise = $client->getAsync('http://127.0.0.1:9090/api/distributor/searchbarang', ['query' => $input])->then(
            function ($response) {
                return $response->getBody();
            },
            function ($exception) {
                return $exception->getMessage();
            }
        );

        $barang = $promise->wait();
        $barang = json_decode($barang, true);

        if (!empty($data[0])) {
            $data = $data[0];
        }
        //$data = $data['data'];
        // dd($data);
        // dd($barang);
        return view('distributor', compact('data', 'barang'));
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

    public function getMitra(Request $request)
    {
        $input = $request->all();
        $token = $request->session()->get('token');
        // $input['id_toko'] = $request->session()->get('id_toko');
        // dd($input);
        $client =  new Client();
        $promise = $client->requestAsync('POST', 'http://127.0.0.1:9090/api/ajukanmitra', ['headers' => ['Authorization' => "Bearer {$token}"], 'query' => $input])->then(
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
        return redirect()->route('distributor', $input['distributor_id']);
    }

    public function batalMitra(Request $request)
    {
        $input = $request->all();
        $token = $request->session()->get('token');
        // dd($input);
        $client =  new Client();
        $promise = $client->requestAsync('POST', 'http://127.0.0.1:9090/api/cancelmitra', ['headers' => ['Authorization' => "Bearer {$token}"], 'query' => $input])->then(
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
        return redirect()->route('distributor', $input['distributor_id']);
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

        // dd($data);
        
        return view('search', compact('data'));
    }

    public function getKategoriSearch(Request $request, $id)
    {
        $input = $request->all();
        //dd($input);
        $input['id'] = $id;
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

        $nama=$kategori[$id-1]['kategori'];
   

        $data = $data['data'];
                // dd($data);

        return view('search', compact('data','nama'));
    }

    public function daftar(Request $request)
    {
        if ($request->session()->has('login')) {
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
            $data = $promise->wait();
            $data = json_decode($data, true);
            // dd ($data);
            return view('daftar', compact('data'));
        }
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
            //dd($token);
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
            //dd($data);
            $promise = $client->getAsync($data['next_page_url'], ['headers' => ['Authorization' => "Bearer {$token}"]])->then(
                function ($response) {
                    return $response->getBody();
                },
                function ($exception) {
                    return $exception->getMessage();
                }
            );

            $page2 = $promise->wait();
            $page2 = json_decode($page2, true);
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
            // dd($data);
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
            $page2 = json_decode($page2, true);
        }

        // $data = $data['data'];
        //  dd($data);
        // dd($page2);
        return view('beranda', compact('data', 'page2', 'kategori'));
    }

    public function checkout(Request $request)
    {

        //  dd($request);
        $input = $request->all();
        //  dd($input);
        $token = $request->session()->get('token');
        //    dd($input['barang']);
        $client =  new Client();
        $promise = $client->getAsync('http://127.0.0.1:9090/api/getstatusdistributor', ['headers' => ['Authorization' => "Bearer {$token}"], 'query' => $input])->then(
            function ($response) {
                return $response->getBody();
            },
            function ($exception) {
                return $exception->getMessage();
            }
        );
        $status = $promise->wait();
        $status = json_decode($status, true);
        // dd($status);

        if (isset($status[0]['pivot']) && $status[0]['pivot']['status'] == 'Diterima') {
            $grandtotal = 0;
            for ($i = 0; $i < $input['kuantitas_pesanan']; $i++) {
                $total = $input['barang']['harga_barang'][$i] * $input['barang']['kuantitas_barang'][$i];
                $grandtotal = $grandtotal + $total;
            }
            // dd($grandtotal);
            $input['kuantitas_pesanan'] = intval($input['kuantitas_pesanan']);
            // dd($input['kuantitas_pesanan']);
            $input['total_harga'] = $grandtotal;
            $input['barang']['id'] = $input['barang']['barang_id'];
            // dd($input); 
            $promise = $client->requestAsync('POST', 'http://127.0.0.1:9090/api/admin/pemesanan', ['headers' => ['Authorization' => "Bearer {$token}"], 'form_params' => $input])->then(
                function ($response) {
                    return $response->getBody();
                },
                function ($exception) {
                    return $exception->getMessage();
                }
            );
            $data = $promise->wait();
            $data = json_decode($data, true);
            //  dd($data);
            // Destroy
            foreach ($input['barang']['barang_id'] as $id) {
                Cart::remove($id);
            }
        } else {
            $request->session()->flash('gagal', $input['distributor_id']);
            // return request()->session()->get('gagal');
            return redirect()->back();
        }
        //dd($token);
        $request->session()->flash('notif', 'Pesanan Telah Berhasil Dibuat');
        return redirect()->back();
    }
}
