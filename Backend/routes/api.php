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
    Route::get('/admin/pemesanan','Api\PemesananController@index'); 
    // Insert
    Route::post('/admin/pemesanan','Api\PemesananController@store');
    // Update
    Route::put('/admin/pemesanan/{id}','Api\PemesananController@update');
    // Delete
    Route::delete('/admin/pemesanan/{id}','Api\PemesananController@delete');

    Route::get('/admin','Api\DashboardController@index');

    //CRUD Sales
    //get All
    Route::get('/admin/sales','Api\SalesController@index'); 
    //get by id
    Route::get('/admin/sales/{id}','Api\SalesController@show'); 
    Route::get('/admin/sales/toko/{id}','Api\SalesController@toko'); 

    Route::get('/admin/sales/pesanan/{id}','Api\SalesController@pesanan');
    // Insert
    Route::post('/admin/sales','Api\SalesController@store');
    // Update
    Route::put('/admin/sales/{id}','Api\SalesController@update');
    // Delete
    Route::delete('/admin/sales/{id}','Api\SalesController@delete');

    Route::get('/admin/toko','Api\TokoController@tokoByUser');
    Route::put('/admin/toko/{id}','Api\DistributorController@updateStatusMitra');
    Route::get('/sales/toko','Api\TokoController@tokoSales');

    Route::get('/admin/barang','Api\BarangController@index'); 
    // Insert
    Route::post('/admin/barang','Api\BarangController@store');
    // Update
    Route::put('/admin/barang/{id}','Api\BarangController@update');
    // Delete
    Route::delete('/admin/barang/{id}','Api\BarangController@delete');

    // Route::get('/toko','Api\TokoController@pesananToko'); 
    Route::get('/profiltoko','Api\TokoController@getProfil');

    Route::put('/profiltoko','Api\TokoController@updateProfil');
    Route::get('/profildistributor','Api\DistributorController@getProfil');

    Route::put('/profildistributor','Api\DistributorController@updateProfil');

    // Route::get('/admin/showdatabarang','Api\BarangController@index'); 
    Route::get('/showcatalogbyuser','Api\CatalogController@showByUser');
    Route::post('logout','UserController@logout');  

    Route::post('/ajukandistributor','Api\TokoController@ajukanDistributor');
    Route::get('/getstatusdistributor','Api\TokoController@distributorByToko');

    // Insert
    Route::post('/distributor','Api\DistributorController@store');
    // Update
    Route::put('/distributor/{id}','Api\DistributorController@update');
    // Delete
    Route::delete('/distributor/{id}','Api\DistributorController@delete');
    Route::put('/ubahpassword', 'UserController@changePassword');
    Route::put('/konfirmasidistributor/{id}','Api\DistributorController@konfirmasiDistributor');
});

Route::post('/forgotpassword','UserController@forgotPassword');
Route::post('/login','UserController@authenticate');
Route::post('/register','UserController@register');

Route::get('/distributor','Api\PemesananController@index'); 
Route::get('/distributor/barang/{id}','Api\DistributorController@show'); 
Route::get('/distributor/searchbarang','Api\DistributorController@searchBarang'); 
Route::get('/getstatusdistributor','Api\TokoController@distributorByToko');


Route::get('/kategori','Api\CatalogController@showCategory');
Route::get('/barangbykategori','Api\CatalogController@showByCategory');



//Showing Catalog Before login
Route::get('/showcatalogbyfilter','Api\CatalogController@showByFilter');
// Route::get('/showallcatalog','Api\CatalogController@showall');
Route::get('/showallcatalogweb','Api\CatalogController@showalltoWeb');
Route::get('/search','Api\CatalogController@searchBy');
//Get Data Wilayah
Route::get('/province','Api\WilayahController@province');
Route::get('/regency','Api\WilayahController@regency');
Route::get('/district','Api\WilayahController@district');
Route::get('/village','Api\WilayahController@village');


