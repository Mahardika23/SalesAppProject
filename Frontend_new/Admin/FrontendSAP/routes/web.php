<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('beranda');
});

Route::get('/login', function(){
    return view('login');
});

Route::get('/sidebar', function () {
    return view('sidebar');
});

Route::get('/Manajemen-Data-Barang','BarangController@index');

Route::get('/Manajemen-Data-Toko', function () {
    return view('toko');
});

Route::get('/Manajemen-Data-Sales', function () {
    return view('sales');
});

Route::get('/Manajemen-Data-Pemesanan','PemesananController@index');

Route::get('/guzzle', 'TestController@getProvince');

// Route::get('/login', 'jalanController@login');
