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

Route::get('/', function () {
    return view
    ('home');
});

// Route::group(['middleware' => ['web', 'auth', 'role:admin']],function(){
//   Route::group(['users'=>'Admin'],function(){
//    Route::resource('site', 'SiteController');
//   });
  
//   Route::group(['users'=>'Karyawan'],function(){
//    Route::resource('user', 'UserController');
//   });
//  });

Route::group(['middleware'=>'auth'],function(){    
    Route::get("home",'Dashboard@index');
    Route::get("/",'Dashboard@index');

    Route::get("laundry/paket", 'PaketController@index');
    Route::get("laundry/paket/add", 'PaketController@add');
    Route::get("laundry/paket/edit/{id}", ['as' => 'laundry.paket.edit', 'uses' => 'PaketController@edit']);

    Route::get("laundry/status_pesanan", 'StatusPesanan_Controller@index');
    Route::get("laundry/status_pesanan/add", 'StatusPesanan_Controller@add');
    Route::get("laundry/status_pesanan/edit/{id}", ['as' => 'laundry.status_pesanan.edit', 'uses' => 'StatusPesanan_Controller@edit']);

    Route::get("laundry/status_pembayaran", 'StatusPembayaran_Controller@index');
    Route::get("laundry/status_pembayaran/add", 'StatusPembayaran_Controller@add');
    Route::get("laundry/status_pembayaran/edit/{id}", ['as' => 'laundry.status_pembayaran.edit', 'uses' => 'StatusPembayaran_Controller@edit']);

    Route::get("customer", 'CustomerController@index');
    Route::get("customer/add", 'CustomerController@add');
    Route::get("customer/edit/{id}", ['as' => 'customer.edit', 'uses' => 'CustomerController@edit']);
    Route::group(['middleware'=>['role:admin']],function(){
      Route::get("karyawan", 'Karyawan_controller@index');
      Route::get("karyawan/add", 'Karyawan_controller@add');
      Route::get("karyawan/edit/{id}", ['as' => 'karyawan.edit', 'uses' => 'Karyawan_controller@edit']);
    });

    Route::get("pesanan", 'Pesanan_controller@index');
    Route::get("pesanan/add", 'Pesanan_controller@add');
    Route::get("pesanan/edit/{id}", ['as' => 'pesanan.edit', 'uses' => 'Pesanan_controller@edit']);
    Route::get("pesanan/info/{id}", ['as' => 'pesanan.info', 'uses' => 'Pesanan_controller@infoPesanan']);
    Route::get("/pdf/{id}", 'Pesanan_controller@pdf');
    Route::get("/invoice/{id}", 'Pesanan_controller@invoice');

    Route::get("riwayat", 'Riwayat@index');
  

  //  Route::get("riwayat", 'Riwayat_controller@index');
});

  //mengarah ke halaman login
Route::get('keluar',function(){
    \Auth::logout();
    return redirect('login');
});
Auth::routes();

Route::get('/dashboard', 'Dashboard@index')->name('dashboard');
