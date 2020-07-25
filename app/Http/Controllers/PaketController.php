<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        $title = 'Paket Laundry';
        $data = Paket::get();
            if(request()->ajax()){
            return datatables()->of($data)->addIndexColumn()
                ->addColumn('action', function($paket){

                    $btn = '<a href="/laundry/paket/edit/'.$paket->id.'"
                            class="btn btn-warning btn-sm">
                            <i class="fas fa-pencil-alt"></i></a>';
                    $btn .= '&nbsp;&nbsp;';
                    $btn .= '<button type="button" name="delete" id="'.$paket->id.'"
                            class="btn btn-danger btn-sm deletePaket" ><i class="fas fa-trash"></i></button>';
                    return $btn;
                })
                
                ->rawColumns(['action'])
                ->make(true);
            }
        return view('laundry.paket.index',compact('title','data'));
    }
     
    // public function getData($id)
    // {
    //     $title = 'Paket Laundry';
    //     $data = Paket::where('id',$id)->get();
    //         return datatables()->of($data)
    //             ->addColumn('action', function($paket){

    //                 $btn = '<button type="button" href="/paket/edit/"
    //                         class="edit btn btn-warning btn-sm" data-id="'.$paket->id.'">
    //                         <i class="fas fa-pencil-alt"></i></button>';
    //                 $btn .= '&nbsp;&nbsp;';
    //                 $btn .= '<button type="button" name="delete" data-id="'.$paket->id.'"
    //                         class="btn btn-danger btn-sm deletePaket" ><i class="fas fa-trash"></i></button>';
    //                 return $btn;
    //             })
    //             ->addIndexColumn()
    //             ->rawColumns(['action'])
    //             ->make(true);

    //     return view('paket.index',compact('title','data'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(){
        $title = 'Tambah Paket Laundry';
        $paket = Paket::get();
        return view('laundry.paket.add',compact('title','paket'));
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
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'satuan' => 'required',
            'durasi' => 'required',
        ]);

        $paket = Paket::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
            'durasi' => $request->durasi,
        ]);
        $paket->save();
        return response()->json(['message' => 'Data Paket berhasil ditambahkan']);
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
        $title = 'Edit Paket Laundry';
        $data = Paket::find($id);
        
    
        return view('laundry.paket.edit', compact('title','data'));
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
            'harga' => 'required',
            'satuan' => 'required',
            'durasi' => 'required',
        ]);

        $paket = Paket::findOrFail($id);
        $paket -> update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
            'durasi' => $request->durasi,
        ]);

        $paket->save();
        return response()->json(['message' => 'Data Paket berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paket = Paket::find($id);
        $paket->delete();
        return response()->json(['message' => 'Data Paket berhasil dihapus']);
    }
}
