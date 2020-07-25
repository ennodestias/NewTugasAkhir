<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StatusPembayaran;

class StatusPembayaran_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Status Pembayaran Laundry';
        $data = StatusPembayaran::get();
            if(request()->ajax()){
            return datatables()->of($data)->addIndexColumn()
                ->addColumn('action', function($statuspembayaran){

                    $btn = '<a href="/laundry/status_pembayaran/edit/'.$statuspembayaran->id.'"
                            class="btn btn-warning btn-sm">
                            <i class="fas fa-pencil-alt"></i></a>';
                    $btn .= '&nbsp;&nbsp;';
                    $btn .= '<button type="button" name="delete" id="'.$statuspembayaran->id.'"
                            class="btn btn-danger btn-sm deleteStatusPembayaran" ><i class="fas fa-trash"></i></button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
            }
        return view('laundry.status_pembayaran.index',compact('title','data'));
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
        $title = 'Tambah Status Pembayaran Laundry';
        $statuspembayaran = StatusPembayaran::get();

        return view('laundry.status_pembayaran.add',compact('title','statuspembayaran'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama'=>'required'
        ]);
 
        $statuspembayaran = StatusPembayaran::create([
            'nama' => $request->nama,
        ]);

        $statuspembayaran->save();
        return response()->json(['message' => 'Status Pembayaran berhasil ditambahkan']);
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
        $title = 'Edit Status Pembayaran Laundry';
        $data = StatusPembayaran::find($id);

        return view('laundry.status_pembayaran.edit',compact('title','data'));
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

        $statuspembayaran = StatusPembayaran::findOrFail($id);
        $statuspembayaran -> update([
            'nama' => $request->nama,
        ]);

        $statuspembayaran->save();
        return response()->json(['message' => 'Status Pembayaran berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = StatusPembayaran::findOrFail($id);
        $data->delete();
        return response()->json(['message' => 'Status Pembayaran berhasil dihapus']);
    }
}
