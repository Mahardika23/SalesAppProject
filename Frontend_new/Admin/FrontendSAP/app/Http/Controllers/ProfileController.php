<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index(Request $request){

        $request->session()->put('page','profile');
        
            //isi tokennya
            $token = $request->session()->get('token');

            $headers = [
                'Authorization' => 'Bearer'.$token,
                'Accept'        => 'application/json'
            ];
            $client =  new Client();
            $promise = $client->requestAsync('GET','http://127.0.0.1:8001/api/profildistributor',['headers' =>
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
                // dd($data);
        //user type
        $user_type = $request->session()->get('user_type');
        return view('profile',['data' => $data]);
    }
}
