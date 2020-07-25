<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class Karyawan_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $title = 'Data Karyawan';
        $data = User::get();
        if(request()->ajax()){
            return datatables()->of($data)->addIndexColumn()
                ->addColumn('action', function($karyawan){
                    $btn = '<a href="/karyawan/edit/'.$karyawan->id.'"
                    class="btn btn-warning btn-sm">
                    <i class="fas fa-pencil-alt"></i></a>';
                    $btn .= '&nbsp;&nbsp;';
                    $btn .= '<button type="button" name="delete" id="'.$karyawan->id.'"
                    class="btn btn-danger btn-sm deleteKaryawan" ><i class="fa fa-trash"></i></button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('karyawan.index',compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add(){
        $title = 'Tambah Karyawan';

        return view('karyawan.add',compact('title'));
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
            'name' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'jeniskelamin',
            'email' => 'required',
            'password' => 'required',
            'role',
        ]);

        $karyawan = User::create([
            'name' => $request->name,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'jeniskelamin' => $request->jeniskelamin,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        $karyawan->save();
        return response()->json(['message' => 'Data Karyawan berhasil ditambahkan']);
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
        $title = 'Edit Data Karyawan';
        $data = User::find($id);

        //return response()->json($karyawan);
        return view('karyawan.edit',compact('title','data'));
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
            'nohp' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $karyawan = User::findOrFail($id);
        $karyawan -> update([
            'nama' => $request->nama,
            'nohp' => $request->nohp,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $karyawan->save();
        return response()->json(['message' => 'Data Karyawan berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return response()->json(['message' => 'Data Karyawan berhasil dihapus']);
    }
}
