<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     // return $request->user();  
//     return auth('api')->user();

// });
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'UserController@getAuthenticatedUser');
    // Route::get('/test','TestController@index');
    Route::post('refresh','UserController@refresh');
    //CRUD Pemesanan
    //Show    
    Route::get('/admin/showdatapesanan','Api\PemesananController@index'); 
    // Insert
    Route::post('/admin/pemesanan','Api\PemesananController@store');
    // Update
    Route::put('/admin/pemesanan/{id}','Api\PemesananController@update');
    // Delete
    Route::delete('/admin/pemesanan/{id}','Api\PemesananController@delete');


    //CRUD Sales
    //get All
    Route::get('/admin/sales','Api\SalesController@index'); 
    //get by id
    Route::get('/admin/sales/{id}','Api\SalesController@show'); 
    // Insert
    Route::post('/admin/sales','Api\SalesController@store');
    // Update
    Route::put('/admin/sales/{id}','Api\SalesController@update');
    // Delete
    Route::delete('/admin/sales/{id}','Api\SalesController@delete');

    
    Route::get('/admin/barang','Api\PemesananController@index'); 
    // Insert
    Route::post('/admin/barang','Api\BarangController@store');
    // Update
    Route::put('/admin/barang/{id}','Api\BarangController@update');
    // Delete
    Route::delete('/admin/barang/{id}','Api\BarangController@delete');

    

    Route::get('/admin/showdatabarang','Api\BarangController@index'); 
    Route::get('/showcatalogbyuser','Api\CatalogController@showByUser');
    Route::post('logout','UserController@logout');  
});
Route::post('/login','UserController@authenticate');
Route::post('/register','UserController@register');

//Showing Catalog Before login
Route::get('/showcatalogbyfilter','Api\CatalogController@showByFilter');
Route::get('/showallcatalog','Api\CatalogController@showall');
Route::get('/showallcatalogweb','Api\CatalogController@showalltoWeb');
Route::get('/search','Api\CatalogController@searchBy');
//Get Data Wilayah
Route::get('/province','Api\WilayahController@province');
Route::get('/regency','Api\WilayahController@regency');
Route::get('/district','Api\WilayahController@district');
Route::get('/village','Api\WilayahController@village');


