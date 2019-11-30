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

// Route::get('/', function () {
//     return view('');
// });

Route::get('/', 'WebCustomerController@getBarang');
Route::get('/aktivitas', 'WebCustomerController@aktivitas');
Route::get('/distributor', 'WebCustomerController@distributor');
Route::get('/pesan', 'WebCustomerController@getBarangPesan');
Route::get('/login', 'WebCustomerController@login');
Route::post('/loginUser', 'UserController@login');
Route::get('/search', 'WebCustomerController@getBarangSearch');
Route::get('/daftar', 'WebCustomerController@daftar');
Route::any('/daftar/toko', 'UserController@register');
Route::any('/daftar/alamat', 'UserController@register2');
Route::any('/daftar/akun', 'UserController@register3');
Route::post('get_province', [
    'uses' => 'WebCustomerController@getProvince'
]);
Route::post('get_barang', [
    'uses' => 'WebCustomerController@getBarang'
]);



