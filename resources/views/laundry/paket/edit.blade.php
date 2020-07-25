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
            <form role="form" id="editpaket">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="nama" class="form-control" name="nama" id="nama" placeholder="Masukkan nama paket" value = "{{ $data -> nama }}" required>
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukkan harga paket" value = "{{ $data -> harga }}" required>
                  </div>
                  <div class="form-group">
                    <label for="satuan">Satuan Paket</label>
                    <input type="satuan" class="form-control" name="satuan" id="satuan" placeholder="Masukkan satuan paket" value = "{{ $data -> satuan }}" required >
                  </div>
                  <div class="form-group">
                    <label for="durasi">Durasi</label>
                    <input type="durasi" class="form-control" name="durasi" id="durasi" placeholder="Masukkan durasi pengerjaan" value = "{{ $data -> durasi }}" required >
                  </div>
                </div>
                
                <input type="hidden" class="form-control" id="id" name="id" value="{{ $data -> id }}">
                
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
    $('#editpaket').on('submit', function(e){
        e.preventDefault();

        //var id = $(this).data('data-id');
        var id = $('#id').val();
        var nama = $('#nama').val();
        var harga = $('#harga').val();
        var satuan = $('#satuan').val();
        var durasi = $('#durasi').val();

        $.ajax({
            type: "PUT",
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            url: "/api/laundry/paket/edit/"+id,
            cache:false,
            dataType: "json",
            data: $('#editpaket').serialize(),
            success: function(data){
                window.location = "/laundry/paket";
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