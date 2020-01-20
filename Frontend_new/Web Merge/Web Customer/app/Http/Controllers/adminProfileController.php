<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class adminProfileController extends Controller
{
    //
    public function index(Request $request){

        $request->session()->put('page','profile');
        
            //isi tokennya
            $token = $request->session()->get('token_distrib');

            $headers = [
                'Authorization' => 'Bearer'.$token,
                'Accept'        => 'application/json'
            ];
            $client =  new Client();
            $promise = $client->requestAsync('GET','http://127.0.0.1:9090/api/profildistributor',['headers' =>
            ['Authorization' => "Bearer {$token}"]])
            ->then(
                function ($response) {
                    return $response->getBody();
            }, function ($exception){
                return $exception->getMessage();
            }
            );
    
            $distributorData = $promise->wait();
            $distributorData = json_decode($distributorData,true);
                $data['distributor'] = $distributorData;
                dd($data);
        //user type
        $user_type = $request->session()->get('user_type');
        return view('adminprofile',['data' => $data]);
    }

    public function ubahpassword(Request $request){

            $input = $request->all();
            // dd($input);
            $client =  new Client();
            $token = $request->session()->get('token_distrib');
    
            $promise = $client->requestAsync('PUT','http://127.0.0.1:9090/api/ubahpassword',['headers' =>
                ['Authorization' => "Bearer {$token}",'Accept' => 'application/json'],'form_params' =>$input])
                ->then(
                    function ($response) {
                        return $response->getBody();
                }, function ($exception){
                    return $exception->getMessage();
                }
            );
    
            $distributorData = $promise->wait();
            $distributorData = json_decode($distributorData,true);
                $data['distributor'] = $distributorData;


            $request->session()->flash('password','berhasil');
            return redirect()->route('dashboard');
                // dd($data);
        //user type
    }
}
