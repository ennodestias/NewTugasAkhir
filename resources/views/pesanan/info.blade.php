@extends('master')
 
@section('content')
 

<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h5>{{ $title }}</h5>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
        <form role="form">
        @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6>Nama Pelanggan</h6>
                                <h6>Nomor Pelanggan</h6>
                                <h6>Alamat</h6>
                            </div>
                            <div class="col-sm-5">
                                <h6>: {{ $customer->nama }}</h6>
                                <h6>: {{ $customer->nohp }}</h6>
                                <h6>: {{ $customer->alamat }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <h6><b>Keterangan</b></h6>
                            </div>
                            <div class="col-sm-6">
                                <h6>Dikerjakan Oleh</h6>
                                <h6>Diterima Tanggal</h6>
                                <h6>Selesai Tanggal</h6>
                                <h6>Keterangan Tambahan</h6>
                            </div>
                            <div class="col-6">
                                <h6>: {{ $pekerja_id -> name }}</h6>
                                <h6>: {{ $data -> tanggal_diterima }}</h6>
                                <h6>: {{ $data -> tanggal_selesai }}</h6>
                                <h6>: {{ $data -> keterangan }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">    
                        <hr>
                        <div class="row-sm-12">
                            <div class="col-sm-12">
                                <h6><b>Rincian Biaya</b></h6>
                                <table class="table table-hover responsive">
                                    <thead>
                                        <tr>
                                            <th>Berat / Pcs</th>
                                            <th>Paket</th>
                                            <th>Harga Paket</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>{{ $data->berat }}</th>
                                        <th>{{ $paket->nama }}</th>
                                        <th>{{"Rp " . number_format($paket->harga, 0, ",", ".")  }}</th>
                                        <th>{{"Rp " . number_format($data->total, 0, ",", ".")  }}</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row-sm-6">
                        <a href="{{ url('/invoice/{$id}') }}" class="btn btn-sm btn-flat btn-success"><i class="fa fa-download"></i> Print</a>
                        <a href="{{ url('pesanan') }}" type="button" class="btn btn-default float-right">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        </form>    
        </div>
    </div>
</div>

</section>

@endsection