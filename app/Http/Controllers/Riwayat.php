<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesanan;
use App\Customer;
use App\Paket;
use App\StatusPesanan;
use App\StatusPembayaran;
use App\User;

class Riwayat extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $title = 'Riwayat Pesanan';
            $selesaiStatus = StatusPesanan::where('nama','=','Selesai')->firstOrFail();
            $data = Pesanan::where('status_pesanan_id','=',$selesaiStatus->id)->get();
            
            if(request()->ajax()){
    
                    return datatables()->of($data)->addIndexColumn()
                    ->addColumn('customer_id', function($data){
                            return Customer::find($data->customer_id)->nama;
                    })    
                    ->addColumn('paket_id', function($data){
                            return Paket::find($data->paket_id)->nama;
                    })
                    ->addColumn('status_pembayaran_id', function($data){
                            return StatusPembayaran::find($data->status_pembayaran_id)->nama;
                    })
                    ->addColumn('status_pesanan_id', function($data){
    
                        return StatusPesanan::find($data->status_pesanan_id)->nama;
                    })
                    ->make(true);
        }
            return view('riwayat.index',compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
