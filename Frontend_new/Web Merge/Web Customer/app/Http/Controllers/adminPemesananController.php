<?php

namespace App\Http\Controllers;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->put('page','pemesanan');
        $request->session()->get('login_distrib');
        //nama
        $nama=$request->session()->get('nama');
        //user type
        $user_type=$request->session()->get('user_type');
            //isi tokennya
            $token = $request->session()->get('token_distrib');
            $headers = [
                'Authorization' => 'Bearer'.$token,
                'Accept'        => 'application/json'
            ];
            $client =  new Client();
            $promise = $client->requestAsync('GET','http://127.0.0.1:9090/api/admin/pemesanan',['headers' =>
            ['Authorization' => "Bearer {$token}"]])
            ->then(
                function ($response) {
                    return $response->getBody();
            }, function ($exception){
                return $exception->getMessage();
            }
            );

            $pemesananData = $promise->wait();
            $pemesananData = json_decode($pemesananData,true);
            
                $data = $pemesananData;
            $data['pemesanan']=$pemesananData;
            // dd($data);
            return view('adminpemesanan',['data'=> $data,'user_type' => $user_type, 'nama' => $nama]);
            
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
    public function update(Request $request)
    {
        //
        $input = $request->all();
        $id = $request->input('id');
        // dd($id);
        $client =  new Client();
        $token = $request->session()->get('token_distrib');

        $promise = $client->requestAsync('PUT','http://127.0.0.1:9090/api/admin/pemesanan/'.$id,['headers' =>
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
        return redirect()->route('Manajemen-Data-Pemesanan');
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
    }
}
