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
        <form role="form" id="edit_pesanan">
        @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row-sm-6">
                            <div class="form-group">
                                <label>Nama Pelanggan</label>
                                <select name="customer_id" id="customer_id" class="form-control select2" style="width: 100%;">
                                    <option value="">{{ $customer->nama }}</option>
                                @foreach($customers as $cus)
                                    <option value="{{ $cus->id }}">{{ $cus->nama }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row-sm-6">
                            <div class="form-group">
                                <label>Paket *</label>
                                <select name="paket_id" id="paket_id" class="form-control select2" style="width: 100%;">
                                    <option value="">{{ $paket->nama }}</option>
                                    @foreach($pakets as $pkt)
                                    <option value="{{ $pkt->id }}">{{ $pkt->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row-sm-6">
                            <div class="form-group">
                                <label>Berat</label>
                                <input type="text" name="berat" class="form-control" id="berat" placeholder="Contoh: 1" value="{{ $data->berat }}">
                            </div>
                        </div>
                        <div class="row-sm-6">
                            <div class="form-group">
                                <label>Tanggal Diterima</label>
                                <input type="date" name="keterangan" class="form-control" id="tgl_diterima" value="{{ $data->tanggal_diterima }}">
                            </div>
                        </div>
                        <div class="row-sm-6">
                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <input type="date" name="keterangan" class="form-control" id="tgl_selesai" value="{{ $data->tanggal_selesai }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status Pesanan</label>
                                <select class="form-control select2" id="status_pesanan_id" name="status_pesanan_id">
                                <option value=""></option>
                                @foreach($status_pesanans as $sp)
                                <option value="{{ $data->status_pesanan_id }}">{{ $sp->nama }}</option>
                                @endforeach
                            </select>
                        </div>
 
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status Pembayaran</label>
                            <select class="form-control select2" id="status_pembayaran_id" name="status_pembayaran_id">
                                <option value=""></option>
                                @foreach($status_pembayaran as $sb)
                                <option value="{{ $sb->id }}">{{ $sb->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row-sm-6">
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Contoh: Baju Luntur" value="{{ $data->keterangan }}">
                            </div>
                        </div>
                        <div class="row-sm-6">
                            <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                            <a href="{{ url('pesanan') }}" type="button" class="btn btn-default float-right">Cancel</a>
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

@section('scripts')
<script >
$(document).ready(function(){   
    $('#edit_pesanan').on('submit', function(e){
        e.preventDefault();

        var id = $('#id').val();
        var customer_id = $('#customer_id').val();
        var paket = $('#paket').val();
        var berat = $('#berat').val();
        var tanggal_diterima = $('#tanggal_diterima').val();
        var tanggal_selesai = $('#tanggal_selesai').val();
        var status_pesanan_id = $('#status_pesanan_id').val();
        var status_pembayaran_id = $('#status_pembayaran_id').val();
        var keterangan = $('#keterangan').val();


        $.ajax({
            type: "PUT",
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            url: "/api/pesanan/edit/"+id,
            cache:false,
            dataType: "json",
            data: $('#edit_pesanan').serialize(),
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