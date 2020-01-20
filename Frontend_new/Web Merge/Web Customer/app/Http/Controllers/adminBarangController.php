<?php

namespace App\Http\Controllers;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class adminBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        
        $request->session()->put('page','barang');
            //nama
            $nama = $request->session()->get('nama');
            //user type
            $user_type = $request->session()->get('user_type');
            //user
            $user = $request->session()->get('user');
            
            //isi tokennya
            $token = $request->session()->get('token_distrib');

            $headers = [
                'Authorization' => 'Bearer'.$token,
                'Accept'        => 'application/json'
            ];
            $client =  new Client();
            $promise = $client->requestAsync('GET','http://127.0.0.1:9090/api/admin/barang',['headers' =>
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
            
            $promise = $client->requestAsync('GET','http://127.0.0.1:9090/api/kategori')->then(
                function ($response) {
                    return $response->getBody();
            }, function ($exception){
                return $exception->getMessage();
            });

            $daftarKategori = $promise->wait();
            $daftarKategori = json_decode($daftarKategori,true);

            $kategori = $daftarKategori;
            $userable_id = $request->session()->get('userable_id');
// dd($userable_id);
            // dd($data['data']);
            // dd($kategori);


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
                $dataWilayah = $promise->wait();
                $dataWilayah = json_decode($dataWilayah, true);
                $wilayah = $dataWilayah;
                // dd($wilayah);

            return view('adminbarang',['data'=> $data,'kategori' => $kategori,'wilayah' => $wilayah]);
            // return view('barang',['nama' => $nama]);

      
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

        
        $userable_id = $request->session()->get('userable_id');

        $input = $request->all();
        if(preg_match("/^[0-9,]+$/", $input['harga_barang'])) $input['harga_barang'] = str_replace(',', '', $input['harga_barang']);
        // dd($input);
        $item_image = 'item_' . $input['nama_barang'] . '.' . request()->item_image->getClientOriginalExtension();
        $request['item_image']->storeAs($userable_id, $item_image);
        $input['item_image'] = $item_image;
        // dd($input);
        $client =  new Client();
        $token = $request->session()->get('token_distrib');

        $promise = $client->requestAsync('POST','http://127.0.0.1:9090/api/admin/barang',['headers' =>
            ['Authorization' => "Bearer {$token}"],'form_params' =>$input])
            ->then(
                function ($response) {
                    return $response->getBody();
            }, function ($exception){
                return $exception->getMessage();
            }
        );

        $success=$promise->wait();
        $success = json_decode($success,true);
    //    dd($success);
        return redirect('/Manajemen-Data-Barang');
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
    public function update(Request $request)
    {

        //
        $input = $request->all();
        $id = $request->input('id');

        if(preg_match("/^[0-9,]+$/", $input['harga_barang'])) $input['harga_barang'] = str_replace(',', '', $input['harga_barang']);
        // dd($id);
        $client =  new Client();
        $token = $request->session()->get('token_distrib');

        $promise = $client->requestAsync('PUT','http://127.0.0.1:9090/api/admin/barang/'.$id,['headers' =>
            ['Authorization' => "Bearer {$token}"],'form_params' =>$input])
            ->then(
                function ($response) {
                    return $response->getBody();
            }, function ($exception){
                return $exception->getMessage();
            }
        );
        $success=$promise->wait();
        $success = json_decode($success,true);
        // dd($success);
        return redirect()->route('Manajemen-Data-Barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request)
    {
        //
        $id = $request->input('id');
        // dd($input);
        $client =  new Client();
        $token = $request->session()->get('token_distrib');

        $promise = $client->requestAsync('DELETE','http://127.0.0.1:9090/api/admin/barang/'.$id,['headers' =>
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
        return redirect()->route('Manajemen-Data-Barang');
    }
}
