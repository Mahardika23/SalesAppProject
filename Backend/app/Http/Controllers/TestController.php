<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;;
class TestController extends Controller
{
    public function index(){
        $user = JWTAuth::parseToken()->authenticate();
        return $user['id'];
    }
}
