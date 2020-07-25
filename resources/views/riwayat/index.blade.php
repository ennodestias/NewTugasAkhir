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
            <div class="col-6">
                <ol class="breadcrumb float-sm-right">
                    <a href="{{ url('/pdf/{$id}') }}" class="btn btn-sm btn-flat btn-success"><i class="fa fa-download"></i> Download PDF </a>
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
                                    <th>Berat</th>
                                    <th>Total</th>
                                    <th>Tanggal Pesanan</th>
                                    <th>Status Pesanan</th>
                                    <th>Status Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>

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
                        name: 'total'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'status_pesanan_id',
                        name: 'status_pesanan_id'
                    },
                    {
                        data: 'status_pembayaran_id',
                        name: 'status_pembayaran_id'
                    },
                ]

            });
        }
    });

</script>

@endsection