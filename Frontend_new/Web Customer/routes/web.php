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
Route::get('/pesan', 'WebCustomerController@getBarangPesan');
Route::get('/login', 'WebCustomerController@login');
Route::get('/search', 'WebCustomerController@getBarangSearch');
Route::get('/daftar', 'WebCustomerController@daftar');
Route::get('/daftar/toko', 'WebCustomerController@daftar2');
Route::get('/daftar/alamat', 'WebCustomerController@getProvince');




