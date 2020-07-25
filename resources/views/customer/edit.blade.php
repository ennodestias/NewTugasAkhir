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
            <form role="form" id="editcustomer">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="nama" class="form-control" name="nama" id="nama" placeholder="Masukkan nama pelanggan" value = "{{ $data -> nama }}" required>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat pelanggan" value = "{{ $data -> alamat }}" required>
                  </div>
                  <div class="form-group">
                    <label for="nohp">No HP</label>
                    <input type="satuan" class="form-control" name="nohp" id="nohp" placeholder="Masukkan no hp pelanggan" value = "{{ $data -> nohp }}" required >
                  </div>
                </div>
                
                <input type="hidden" class="form-control" id="id" name="id" value="{{ $data -> id }}">
                
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                  <a href="{{ url('customer/') }}" type="button" class="btn btn-default float-right">Cancel</a>
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
    $('#editcustomer').on('submit', function(e){
        e.preventDefault();

        //var id = $(this).data('data-id');
        var id = $('#id').val();
        var nama = $('#nama').val();
        var harga = $('#alamat').val();
        var satuan = $('#nohp').val();

        $.ajax({
            type: "PUT",
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            url: "/api/customer/edit/"+id,
            cache:false,
            dataType: "json",
            data: $('#editcustomer').serialize(),
            success: function(data){
                window.location = "/customer";
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