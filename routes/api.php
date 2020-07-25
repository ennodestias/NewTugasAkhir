<?php

use Illuminate\Http\Request;
use App\Paket;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//paket

Route::get('/pesanan', 'Pesanan_controller@index');
Route::post('/pesanan/add', 'Pesanan_controller@store');
Route::put('/pesanan/edit/{id}', 'Pesanan_controller@update');
Route::delete('/pesanan/{id}', 'Pesanan_controller@destroy');
Route::get('/pesanan/info/{id}', 'Pesanan_controller@infoPesanan');

Route::get('/laundry/paket/{id}', 'PaketController@getData');
Route::post('/laundry/paket/add', 'PaketController@store');
Route::put('/laundry/paket/edit/{id}', 'PaketController@update');
Route::delete('/laundry/paket/{id}', 'PaketController@destroy');

Route::get('/laundry/status_pesanan/{id}', 'StatusPesanan_Controller@index');
Route::post('/laundry/status_pesanan/add', 'StatusPesanan_Controller@store');
Route::put('/laundry/status_pesanan/edit/{id}', 'StatusPesanan_Controller@update');
Route::delete('/laundry/status_pesanan/{id}', 'StatusPesanan_Controller@destroy');

Route::get('/laundry/status_pembayaran/{id}', 'StatusPembayaran_Controller@index');
Route::post('/laundry/status_pembayaran/add', 'StatusPembayaran_Controller@store');
Route::put('/laundry/status_pembayaran/edit/{id}', 'StatusPembayaran_Controller@update');
Route::delete('/laundry/status_pembayaran/{id}', 'StatusPembayaran_Controller@destroy');

//customer
Route::get('customer/', 'CustomerController@index');
Route::post('customer/add', 'CustomerController@store');
Route::put('/customer/edit/{id}', 'CustomerController@update');
Route::delete('/customer/{id}', 'CustomerController@destroy');

//karyawan
Route::get('karyawan/', 'Karyawan_controller@index');
Route::post('/karyawan/add', 'Karyawan_controller@store');
Route::put('/karyawan/edit/{id}', 'Karyawan_controller@update');
Route::delete('/karyawan/{id}', 'Karyawan_controller@destroy');

Route::get('/riwayat', 'Riwayat@index');