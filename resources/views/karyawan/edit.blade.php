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
            <form role="form" id="editkaryawan">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan nama karyawan" value = "{{ $data -> name }}" required>
                  </div>
                  <div class="form-group">
                    <label for="nohp">No HP</label>
                    <input type="number" class="form-control" name="no_telp" id="no_telp" placeholder="Masukkan no hp karyawan" value = "{{ $data -> no_telp }}" required >
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email" value = "{{ $data -> email }}" required>
                  </div>
                  <div class="form-group">
                    <label for="password">New Password</label>
                    <!-- <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" required > -->
                    <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    {!! $errors->first('password', '<p class="text-danger errorBag" id="showerror">:message</p>') !!}
                  </div>
                  <div class="form-group">
                    <label for="password">Confirm New Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                    {!! $errors->first('password-confirm', '<p class="text-danger errorBag" id="showerror1">:message</p>') !!}
                  </div>
                </div>
                
                <input type="hidden" class="form-control" id="id" name="id" value="{{ $data -> id }}">
                
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                  <a href="{{ url('karyawan/') }}" type="button" class="btn btn-default float-right">Cancel</a>
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
console.log($('#editkaryawan').serialize());
$(document).ready(function(){   
    $('#editkaryawan').on('submit', function(e){
        e.preventDefault();

        //var id = $(this).data('data-id');
        var id = $('#id').val();
        var name = $('#name').val();
        var no_telp = $('#no_telp').val();
        var email = $('#email').val();
        var password = $('#password').val();

        $.ajax({
            type: "PUT",
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            url: "/api/karyawan/edit/"+id,
            cache:false,
            dataType: "json",
            data: $('#editkaryawan').serialize(),
            success: function(data){
                window.location = "/karyawan";
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