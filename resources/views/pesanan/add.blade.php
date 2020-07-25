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
        <form role="form" id="tambah_pesanan">
        @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row-sm-6">
                            <div class="form-group">
                                <label>Nama Pelanggan</label>
                                <select name="customer_id" class="form-control select2">
                                    <option value=""> --Pilih Nama Pelanggan-- </option>
                                    @foreach($customer as $customers)
                                    <option value="{{ $customers -> id }}">{{ $customers->nama }}</option>
                                    @endforeach
                                </select >
                            </div>
                        </div>
                        <div class="row-sm-6">
                            <div class="form-group">
                                <label>Paket *</label>
                                <select name="paket_id" class="form-control select2" style="width: 100%;">
                                <option value=""> --Pilih Paket-- </option>
                                    @foreach($paket as $pakets)
                                    <option value="{{ $pakets->id }}">{{ $pakets->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row-sm-6">
                            <div class="form-group">
                                <label>Berat</label>
                                <input type="text" name="berat" class="form-control" id="berat" placeholder="Contoh: 1">
                            </div>
                        </div>
                        <div class="row-sm-6">
                            <div class="form-group">
                                <label>Tanggal Diterima</label>
                                <input type="date" name="tanggal_diterima" class="form-control" id="tanggal_diterima">
                            </div>
                        </div>
                        <div class="row-sm-6">
                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" class="form-control" id="tanggal_selesai">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status Pesanan</label>
                                <select class="form-control select2" name="status_pesanan_id">
                                <option value=""> --Pilih Status Pesanan-- </option>
                                @foreach($status_pesanan as $sp)
                                <option value="{{ $sp->id }}">{{ $sp->nama }}</option>
                                @endforeach
                            </select>
                        </div>
 
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status Pembayaran</label>
                            <select class="form-control select2" name="status_pembayaran_id">
                            <option value=""> --Pilih Status Pembayaran-- </option>
                                @foreach($status_pembayaran as $sb)
                                <option value="{{ $sb->id }}">{{ $sb->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row-sm-6">
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Contoh: Baju Luntur">
                            </div>
                        </div>
                        <div class="row-sm-6">
                            <button type="submit" class="btn btn-primary" id="simpan">Tambah Ke Keranjang</button>
                            <a href="{{ url('pesanan') }}" type="button" class="btn btn-default float-right">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        </form>    
        </div>
    </div>

@endsection

@section('scripts')
<script >
$(document).ready(function(){   
    $('#tambah_pesanan').on('submit', function(e){
        e.preventDefault();

        var customer_id = $('#customer_id').val();
        var paket = $('#paket').val();
        var berat = $('#berat').val();
        var tanggal_diterima = $('#tanggal_diterima').val();
        var tanggal_selesai = $('#tanggal_selesai').val();
        var status_pesanan_id = $('#status_pesanan_id').val();
        var status_pembayaran_id = $('#status_pembayaran_id').val();
        var keterangan = $('#keterangan').val();

        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            url: "/api/pesanan/add/",
            cache:false,
            dataType: "json",
            data: $('#tambah_pesanan').serialize(),
            success: function(data){
                window.location = "/pesanan";
                toastr.options.closeButton = true;
                toastr.options.closeMethod = 'fadeOut';
                toastr.options.closeDuration = 100;
                toastr.success(data.message);
            },
            error: function(xhr, status, error) 
            {

              $.each(xhr.responseJSON.errors, function (key, item) 
              {
                // $("#errors").append("<li class='alert alert-danger'>"+item+"</li>")
                toastr.options.closeButton = true;
                toastr.options.closeMethod = 'fadeOut';
                toastr.options.closeDuration = 200;
                toastr.error(item);
              });

            }
        });
    });
});
</script>

@endsection