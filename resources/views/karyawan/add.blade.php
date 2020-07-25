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
            <form role="form" id="tambahkaryawan">
            {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="name" class="form-control" name="name" id="name" placeholder="Masukkan nama karyawan" required>
                  </div>
                  <div class="form-group">
                    <label for="no_telp">No HP</label>
                    <input type="number" class="form-control" name="no_telp" id="no_telp" placeholder="Masukkan no hp karyawan" required>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan no hp karyawan" required>
                  </div>
                  <div class="form-group">
                    <label for="jeniskelamin">Jenis Kelamin</label>
                    <select name="jeniskelamin" class="form-control select2" style="width: 100%;">
                      <option value="wanita"> wanita </option>
                      <option value="pria">pria</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email karyawan" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" id="password" placeholder="Masukkan password karyawan" required>
                  </div>
                  <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" class="form-control select2" style="width: 100%;">
                      <option value="admin"> Admin </option>
                      <option value="karyawan">Karyawan</option>
                    </select>
                  </div>
                </div>
                
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
$(document).ready(function(){   
    $('#tambahkaryawan').on('submit', function(e){
        e.preventDefault();
        
        var name = $('#name').val();
        var no_telp = $('#no_telp').val();
        var alamat = $('#alamat').val();
        var jeniskelamin = $('#jeniskelamin').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var role = $('#role').val();

        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            url: "/api/karyawan/add",
            cache:false,
            dataType: "json",
            data: $(this).serialize(),
            success: function(data){
                window.location = "/karyawan";
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