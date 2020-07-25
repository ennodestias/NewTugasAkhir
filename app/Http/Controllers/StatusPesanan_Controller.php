<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StatusPesanan;

class StatusPesanan_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Status Pesanan Laundry';
        $data = StatusPesanan::get();
            if(request()->ajax()){
            return datatables()->of($data)->addIndexColumn()
                ->addColumn('action', function($statuspesanan){

                    $btn = '<a href="/laundry/status_pesanan/edit/'.$statuspesanan->id.'"
                            class="btn btn-warning btn-sm">
                            <i class="fas fa-pencil-alt"></i></a>';
                    $btn .= '&nbsp;&nbsp;';
                    $btn .= '<button type="button" name="delete" id="'.$statuspesanan->id.'"
                            class="btn btn-danger btn-sm deleteStatusPesanan" ><i class="fas fa-trash"></i></button>';
                    return $btn;
                })
                
                ->rawColumns(['action'])
                ->make(true);
            }
        return view('laundry.status_pesanan.index',compact('title','data'));
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
    public function add(){
        $title = 'Tambah Status Pesanan Laundry';
        $statuspesanan = StatusPesanan::get();

        return view('laundry.status_pesanan.add',compact('title','statuspesanan'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama'=>'required'
        ]);
 
        $statuspesanan = StatusPesanan::create([
            'nama' => $request->nama,
        ]);

        $statuspesanan->save();
        return response()->json(['message' => 'Status Pesanan berhasil ditambahkan']);
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
        $title = 'Edit Status Pesanan Laundry';
        $data = StatusPesanan::find($id);

        return view('laundry.status_pesanan.edit',compact('title','data'));
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
        $this->validate($request, [
            'nama' => 'required',
        ]);

        $statuspesanan = StatusPesanan::findOrFail($id);
        $statuspesanan -> update([
            'nama' => $request->nama,
        ]);

        $statuspesanan->save();
        return response()->json(['message' => 'Status Pesanan berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = StatusPesanan::findOrFail($id);
        $data->delete();
        return response()->json(['message' => 'Status Pesanan berhasil dihapus']);
    }
}
