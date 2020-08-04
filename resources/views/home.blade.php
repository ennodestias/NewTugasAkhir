@extends('master')

@section('content')        
    
<section class="content-header">
        <div class="row">
          <div class="col-lg-12">
            <!-- small box -->
            <div class="small-box bg-white">
              <div class="inner" align="center">
                  <h5>Dashboard</h5>
                  <h5>Sistem POS dan Manajemen Laundry</h5>
              </div>

            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $count }}</h3>
                <p>Jumlah Pelanggan</p>
              </div>
              <!-- <div class="icon">
                <i class="ion ion-person"></i>
              </div> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{"Rp " . number_format($countPendapatan, 0, ",", ".")  }}</h3>
                <p>Total Pendapatan Hari Ini</p>
              </div>
              <!-- <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $countPesanan }}</h3>
                <p>Total Pesanan</p>
              </div>
              <!-- <div class="icon">
                <i class="ion ion-bag"></i>
              </div> -->
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <i class="fas fa-plus"></i><a align="center" href="customer/add" class="small-box-footer" style="color:#FFFFFF"> <h5>Tambah Data Pelanggan</h5></a>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <i class="fas fa-plus"></i><a align="center" href="pesanan/add" class="small-box-footer" style="color:#FFFFFF"> <h5>Tambah Pesanan</h5></a>
              </div>
            </div>
          </div>
        </div>
              <!-- /.card-footer -->                  
          </section>
          <!-- /.Left col -->
</section>
 
 @endsection