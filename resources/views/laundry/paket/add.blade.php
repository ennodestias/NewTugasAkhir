@extends('master')
@section('title')
<title>{{$title}} - Poscu</title>
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection
@section('content')
 
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5>{{ $title }}</h5>
            </div>
        </div>
    </div>

        <div class="card">
                   <!-- form start -->
            <form role="form" id="tambahpaket">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama paket" required >
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukkan harga paket" required value="Rp. ">
                  </div>
                  <div class="form-group">
                    <label for="satuan">Satuan Paket</label>
                    <input type="name" class="form-control" name="satuan" id="satuan" placeholder="Masukkan satuan paket" required>
                  </div>
                  <div class="form-group">
                    <label for="durasi">Durasi</label>
                    <input type="text" class="form-control" name="durasi" id="durasi" placeholder="Masukkan durasi pengerjaan" required>
                  </div>
                </div>
                
                <!-- <input type="hidden" class="form-control" id="id_paket" name="id_paket" value="id_paket"> -->
                
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                  <a href="{{ url('laundry/paket/') }}" type="button" class="btn btn-default float-right">Cancel</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>

</section>
 
@endsection

@section('scripts')

<!-- DataTables -->
<script src="{{ asset('lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<!-- page script -->


<script>
$(document).ready(function(){   
    $("#tambahpaket").on('submit', function(e){
        e.preventDefault();

        var nama = $('#nama').val();
        var harga = $('#harga').val();
        var satuan = $('#satuan').val();
        var durasi = $('#durasi').val();

        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            url: "/api/laundry/paket/add",
            cache:false,
            dataType: "json",
            data: $('#tambahpaket').serialize(),
            success: function(data){
                window.location = "/laundry/paket";
                toastr.options.closeButton = true;
                toastr.options.closeMethod = 'fadeOut';
                toastr.options.closeDuration = 100;
                toastr.success(data.message);
            },
            error: function(error){
            console.log(error);
            }
        });
    });
});

</script>

@endsection