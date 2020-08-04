<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Customer;
use\App\Pesanan;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;
use DateTime;
use Carbon\Carbon;
use DB;

class Dashboard extends Controller
{
    public function index(Request $request){
    // $title = 'Dashboard';
    $title = 'Dashboard';
    $date = now()->format('Y-m-d');
    $count = Customer::count();
    $countPesanan = Pesanan::whereDate('created_at', Carbon::today())->count();
    $countPendapatan = Pesanan::select('total')->whereDate('created_at', Carbon::today())->sum('total');
    // $count = Customer::count();ini
    // $countPesanan = Pesanan::count();ini
    // $date = now();
    // var_dump($date);
    // die;
    //$countPesanan = Pesanan::where('created_at','date')->count();
    // $date = now();
    // $date->toDateTimeString();
    // 'SELECT id_pelanggan, id_produk, SUM(jml_byr) AS total 
	// 	FROM `sales` 
    // 	GROUP BY id_pelanggan, id_produk';
   
    //$end = now()->format('Y-m-d') . ' 23:59:00';
    // $countPendapatan = Pesanan::sum('total');ini
    // ->where('created_at'.$end);
    // $countPesanan = Pesanan::now()->count();

    return view('home',compact('title','count','countPesanan','countPendapatan'));    
    }
}
