<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Services\DataTable;
use App\Pesanan;
use App\Customer;
use App\Paket;
use App\StatusPesanan;
use App\StatusPembayaran;
use DB;
use PDF;

class Pesanan_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $title = 'Data Pesanan';
        $data = Pesanan::get();

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
                
                ->addColumn('action', function($pesanan){
                    $btn = '<a href="/pesanan/edit/'.$pesanan->id.'"
                            class="btn btn-warning btn-sm">
                            <i class="fas fa-pencil-alt"></i></a>';
                    $btn .= '&nbsp;&nbsp;';
                    $btn .= '<a href="/pesanan/info/'.$pesanan->id.'"
                            class="btn btn-info btn-sm">
                            <i class="fas fa-info"></i></a>';
                    $btn .= '&nbsp;&nbsp;';
                    $btn .= '<a href="/invoice/'.$pesanan->id.'"
                            class="btn btn-success btn-sm">
                            <i class="fas fa-print"></i></a>';
                    $btn .= '&nbsp;&nbsp;';
                    $btn .= '<button type="button" name="delete" id="'.$pesanan->id.'"
                            class="btn btn-danger btn-sm deletePesanan" ><i class="fas fa-trash"></i></button>';
                            
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
        return view('pesanan.index',compact('title','data'));
    }

    public function infoPesanan($id){
        $title = 'Detail Pesanan Laundry';
        $data = Pesanan::find($id);
        $customer = Pesanan::find($id)->customer;
        $paket = Pesanan::find($id)->paket;
        $statusPesanan = Pesanan::find($id)->statuspesanan;
        $statusPembayaran = Pesanan::find($id)->statuspembayaran;
        // $user = User::get();
  
        return view('pesanan.info', compact('title','data','customer','paket','statusPesanan','statusPembayaran'));
   }

    public function pdf(){
        $data = Pesanan::get();
        $customer = Customer::orderBy('nama')->get();
        $paket = Paket::orderBy('nama')->get();
        $pdf = PDF::loadView('pesanan.pdf', compact('data','customer','paket'));
        
        return $pdf->download('pesanan.pdf');
    }

    public function invoice($id){
        $data = Pesanan::find($id);
        $customer = Pesanan::find($id)->customer;
        $paket = Pesanan::find($id)->paket;
        $statusPesanan = Pesanan::find($id)->statuspesanan;
        $statusPembayaran = Pesanan::find($id)->statuspembayaran;
        // $user = User::get();
  
        $pdf = PDF::loadView('pesanan.invoice', compact('data','customer','paket','statusPesanan','statusPembayaran'));
        
        return $pdf->download('invoice.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add(){
        $title = 'Tambah Pesanan Laundry';
        $customer = Customer::orderBy('nama','asc')->get();
        $paket = Paket::orderBy('nama','asc')->get();
        $status_pesanan = StatusPesanan::orderBy('nama','asc')->get();
        $status_pembayaran = StatusPembayaran::orderBy('nama','asc')->get();


        return view('pesanan.add',compact('title','customer','paket','status_pesanan','status_pembayaran'));
    }

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
        $this->validate($request,[
            'berat'=>'required',
            'tanggal_diterima'=>'required',
            'tanggal_selesai'=>'required',
            'keterangan'=>'required',
        ]);

        $paket = Paket::find($request->paket_id);
        $total = $paket->harga * $request->berat;

        $data = Pesanan::create([
        'customer_id' => $request->customer_id,
        'paket_id' => $request->paket_id,
        'berat' => $request->berat,
        'tanggal_diterima'=>$request->tanggal_diterima,
        'tanggal_selesai'=>$request->tanggal_selesai,
        'total' => $total,
        'status_pembayaran_id' => $request->status_pembayaran_id,
        'status_pesanan_id' => $request->status_pesanan_id,
        'keterangan'=>$request->keterangan,
        ]);

        $data->save();
        return response()->json(['message' => 'Transaksi berhasil ditambahkan']);
 
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
        $title = 'Edit Pesanan Laundry';
        $data = Pesanan::find($id);
        $customer = Pesanan::find($id)->customer;
        $paket = Pesanan::find($id)->paket;
        $statusPesanan = Pesanan::find($id)->statuspesanan;
        $statusPembayaran = Pesanan::find($id)->statuspembayaran;

        $customers = Customer::orderBy('nama','asc')->get();
        $pakets = Paket::orderBy('nama','asc')->get();
        $status_pesanans = StatusPesanan::orderBy('nama','asc')->get();
        $status_pembayaran = StatusPembayaran::get();
    
        return view('pesanan.edit', compact('title','data','customer','paket','statusPesanan','statusPembayaran','customers','pakets','status_pesanans','status_pembayaran'));
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
        $this->validate($request,[
            'berat'=>'required',
            // 'tanggal_diterima'=>'required',
            // 'tanggal_selesai'=>'required',
            'keterangan'=>'required',
        ]);

        $paket = Paket::find($request->paket_id);
        $total = $paket->harga * $request->berat;

        $data = Pesanan::findOrFail($id);
        $data -> update([
        'customer_id' => $request->customer_id,
        'paket_id' => $request->paket_id,
        'berat' => $request->berat,
        'tanggal_diterima'=>$request->tanggal_diterima,
        'tanggal_selesai'=>$request->tanggal_selesai,
        'total' => $request->total,
        'keterangan'=>$request->keterangan,
        ]);

        $data->save();
        return response()->json(['message' => 'Transaksi berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pesanan::find($id);
        $data->delete();
        return response()->json(['message' => 'Data Pesanan berhasil dihapus']);
    }
}
