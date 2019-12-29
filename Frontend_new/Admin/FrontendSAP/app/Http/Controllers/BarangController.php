<?php

namespace App\Http\Controllers;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $request->session()->get('login');
        if ($request->session()->has('login')) {
            //nama
            $nama = $request->session()->get('nama');
            //user type
            $user_type = $request->session()->get('user_type');
            //user
            $user = $request->session()->get('user');
            
            //isi tokennya
            $token = $request->session()->get('token');

            $headers = [
                'Authorization' => 'Bearer'.$token,
                'Accept'        => 'application/json'
            ];
            $client =  new Client();
            $promise = $client->requestAsync('GET','http://127.0.0.1:8001/api/admin/barang',['headers' =>
            ['Authorization' => "Bearer {$token}"]])
            ->then(
                function ($response) {
                    return $response->getBody();
            }, function ($exception){
                return $exception->getMessage();
            }
            );
    
            $itemData = $promise->wait();
            $itemData = json_decode($itemData,true);
            
                $data = $itemData;
            
            $promise = $client->requestAsync('GET','http://127.0.0.1:8001/api/kategori')->then(
                function ($response) {
                    return $response->getBody();
            }, function ($exception){
                return $exception->getMessage();
            });

            $daftarKategori = $promise->wait();
            $daftarKategori = json_decode($daftarKategori,true);

            $kategori = $daftarKategori;

            // dd($data);
            return view('barang',['data'=> $data,'kategori' => $kategori]);
            // return view('barang',['nama' => $nama]);

        }else{
            return Redirect::route('login');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $id = $request->input('id');
        // dd($input);
        $client =  new Client();
        $token = $request->session()->get('token');

        $promise = $client->requestAsync('DELETE','http://127.0.0.1:8001/api/admin/barang/'.$id,['headers' =>
            ['Authorization' => "Bearer {$token}"]])
            ->then(
                function ($response) {
                    return $response->getBody();
            }, function ($exception){
                return $exception->getMessage();
            }
        );
        $success=$promise->wait();
        $success = json_decode($success,true);
        $nama=$request->session()->get('nama');
        return redirect()->route('Manajemen-Data-Barang');
    }
}
