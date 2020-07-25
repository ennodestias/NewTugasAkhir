<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Customer;
use\App\Pesanan;
use DateTime;
use Carbon;
use DB;

class Dashboard extends Controller
{
    public function index(Request $request){
    $title = 'Dashboard';
    $count = Customer::count();
    $countPesanan = Pesanan::count();
    // $date = now();
    // var_dump($date);
    // die;
    //$countPesanan = Pesanan::where('created_at','date')->count();
    // $date = Carbon\Carbon::now();
    // $date->toDateTimeString();
    // 'SELECT id_pelanggan, id_produk, SUM(jml_byr) AS total 
	// 	FROM `sales` 
    // 	GROUP BY id_pelanggan, id_produk';
   
    //$end = Carbon\Carbon::now()->format('Y-m-d') . ' 23:59:00';
    $countPendapatan = Pesanan::sum('total');
    // ->where('created_at'.$end);
    // $countPesanan = Pesanan::now()->count();

    return view('home',compact('title','count','countPesanan','countPendapatan'));    
    }
}
