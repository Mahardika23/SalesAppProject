<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
class TestController extends Controller
{
    public function getProvince(){
        $client =  new Client();
        $response = $client->request('GET', 'http://192.168.1.95:8000/api/province');
        echo $response->getBody();
        $provinces = $response->getBody();
        return view('beranda',compact('provinces'));
    }
}
