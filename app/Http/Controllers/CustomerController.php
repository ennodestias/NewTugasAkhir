<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Data Pelanggan';
        $data = Customer::get();
        if(request()->ajax()){
            return datatables()->of($data)->addIndexColumn()
                ->addColumn('action', function($customer){
                    $btn = '<a href="/customer/edit/'.$customer->id.'"
                            class="btn btn-warning btn-sm">
                            <i class="fas fa-pencil-alt"></i></a>';
                    $btn .= '&nbsp;&nbsp;';
                    $btn .= '<button type="button" name="delete" id="'.$customer->id.'"
                    class="btn btn-danger btn-sm deleteCustomer" ><i class="fa fa-trash"></i></button>';
                    return $btn;
                })
                
                ->rawColumns(['action'])
                ->make(true);
            }
        return view('customer.index',compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(){
        $title = 'Tambah Pelanggan';
        $customer = Customer::get();
        return view('customer.add',compact('title','customer'));
    }

    public function create()
    {
        
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
            'alamat' => 'required',
            'nohp' => 'required',
        ]);

        $customer = Customer::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
        ]);

        $customer->save();
        return response()->json(['message' => 'Data Pelanggan berhasil ditambahkan']);
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
        $title = 'Edit Data Pelanggan';
        $data = Customer::find($id);

        //return response()->json($customer);
        return view('customer.edit',compact('title','data'));
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
            'alamat' => 'required',
            'nohp' => 'required',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
        ]);

        $customer->save();
        return response()->json(['message' => 'Data Pelanggan berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Customer::findOrFail($id);
        $data->delete();
        return response()->json(['message' => 'Data Pelanggan berhasil dihapus']);
    }
}
