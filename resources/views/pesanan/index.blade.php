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
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <a href="{{ url('pesanan/add') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Pesanan</a>
                </ol>
            </div>
        </div>
        
    </div>
                <div class="card">
                    <div class="card-body">
                        <table id="data_pesanan" class="table table-bordered table-hover responsive">
                            <thead>
                                <tr>
                                    <th>Nama Pelanggan</th>
                                    <th>Paket</th>
                                    <th>Berat / Pcs</th>
                                    <th>Total</th>
                                    <th>Tanggal Pesanan</th>
                                    <th>Status Pesanan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>

        <!-- Modal untuk menghapus data -->
            <div id="confirmModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h6 align="center">Apakah Anda yakin ingin menghapus data ini?</h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
<!--             
            <div id="infoModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail Pesanan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <div class="row">
                                <div class="col-sm-4">
                                    <h6>Nama Pelanggan</h6>
                                    <h6>Nomor Pelanggan</h6>
                                </div>
                                @csrf
                                <div class="col-sm-5">
                                @foreach($data as $datas)
                                    <h6>: {{ $datas->customer_id }}</h6>
                                @endforeach
                                    <h6>: 08123456789</h6>
                                
                                </div>
                            </div>
                            <p align="right">
                                <button type="submit" class="btn btn-warning" id="submit">Print</button>
                            </p>
                            <br>
                            <p class="modal-title">Rincian Biaya</p>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 style="color:#199BEE">2x</h6>
                                </div>
                                <div class="col-sm-12">
                                    <h6> Kg @ Reguler 3 hari</h6>
                                </div>
                                <div class="col-sm-12">
                                    <h6></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <p>Total Harga</p>
                                </div>
                                <div class="col-sm-4">
                                    <p></p>
                                </div>
                            </div>
                            
                            <br>

                            <p class="modal-title">Keterangan</p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h6>Dikerjakan Oleh</h6>
                                    <h6>Diterima Tanggal</h6>
                                    <h6>Selesai Tanggal</h6>
                                    <h6>Keterangan Tambahan</h6>
                                </div>
                                <div class="col-6">
                                    <h6>: Alugoro Gandhi Mukti</h6>
                                    <h6>: 02 Februari 2020</h6>
                                    <h6>: 05 Februari 2020</h6>
                                    <h6>: Warna baju luntur</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

        </div>
    </div>
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
    fill_datatable();
        function fill_datatable(){
            var dataTable = $('#data_pesanan').DataTable({
                processing: true,
                serverSide: true,
                ajax:{
                    url: "/pesanan",
                },
                columns: [
                    {
                        data: 'customer_id',
                        name: 'customer_id'
                    },
                    {
                        data: 'paket_id',
                        name: 'paket_id'
                    },
                    {
                        data: 'berat',
                        name: 'berat'
                    },
                    {
                        data: 'total',
                        render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' ),
                        name: 'total'
                    },{
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'status_pesanan_id',
                        name: 'status_pesanan_id'
                    },
                    {   data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false},
                ]

            });
        }
    });

    // $(document).on('click', '.infoPesanan', function(){
    //  id = $(this).attr('id');
    //      $('#infoModal').modal('show');
    // });
    //     $.ajax({
    //         url:'/api/pesanan'+id,
    //         type: 'GET',
    //         dataType: 'JSON',
    //         data: { id:id.getAttribute('data-id') },
    //         success: function(data){
    //             if(data.success)
    //             {
    //                 $('#customer').html(data.data.customer_id);
    //                 $('#berat').html(data.data.berat);
    //                 $('#corp').html(data.data.name);
    //                 $('#cp').html(data.data.contact_person);
    //                 $('#email').html(data.data.email);
    //                 $('#phone').html(data.data.phone_number);
    //                 $('#link').attr('href', 'dashboard/xlsx/' + data.data.id);
    //                 $('#link2').attr('href', 'dashboard/edit/' + data.data.id);
    //             }
    //         }
    //     });


$(document).on('click', '.deletePesanan', function(){
    id = $(this).attr('id');
    $('#confirmModal').modal('show');
});

  $('#ok_button').click(function(){
    $.ajax({
        type: "DELETE",
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        dataType: "json",
        url: '/api/pesanan/'+id,
        success: function (data) {
          $('#confirmModal').modal('hide');
          $('#data_pesanan').DataTable().ajax.reload();
            toastr.options.closeButton = true;
            toastr.options.closeMethod = 'fadeOut';
            toastr.options.closeDuration = 100;
            toastr.success(data.message);
        }
    });
});

</script>

@endsection