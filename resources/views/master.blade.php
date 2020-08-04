<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">


  @yield('title')


  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Toast -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- Ionicons -->
  <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
      <!-- Sidebar user panel (optional) -->
        <a href="#" class="nav-link">Hai, {{\Auth::user()->name}}!</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar" style="background-color:#199BEE;">
    <!-- Brand Logo -->
    <a href="/" class="brand-link" style="background-color:#147CBE;">
      <img src="{{asset('lte/dist/img/poscu.png')}}" alt="poscu" class="brand-image img-circle">
      <span class="brand-text font-weight-light"  style="color:#FFFFFF;">POSCU</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-2 d-flex">
        <div class="image">
          <img src="{{asset('lte/dist/img/dashboard.png')}}" alt="poscu" class="brand-image img-circle">
        </div>
        <div class="info">
          <a href="/dashboard" class="d-block" style="color:#FFFFFF;">Dashboard</a>
        </div>
      </div>
      <div class="user-panel mt-2 d-flex">
        <div class="image">
          <img src="{{asset('lte/dist/img/pesanan.png')}}" alt="poscu" class="brand-image img-circle"> 
        </div>
        <div class="info">
          <a href="/pesanan" class="d-block" style="color:#FFFFFF;">Pesanan Laundry</a>
        </div>
      </div>
      <div class="user-panel mt-2 d-flex">
        <div class="image">
          <img src="{{asset('lte/dist/img/riwayat.png')}}" alt="poscu" class="brand-image img-circle">
        </div>
        <div class="info">
          <a href="/riwayat" class="d-block" style="color:#FFFFFF;">Riwayat Laundry</a>
        </div>
      </div>
      <div class="user-panel mt-2 d-flex">
        <div class="image">
          <img src="{{asset('lte/dist/img/pelanggan.png')}}" alt="poscu" class="brand-image img-circle">
        </div>
        <div class="info">
          <a href="{{ url('/customer') }}" class="d-block" style="color:#FFFFFF;">Data Pelanggan</a>
        </div>
      </div>
      @if(\Auth::user()->role == 'admin')
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link" style="color:#FFFFFF;">
            <i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;&nbsp;&nbsp; Kelola Laundry<i class="right fas fa-angle-left"></i>
          </a>
        <ul class="nav nav-treeview">
          <div class="user-panel d-flex">
            <div class="image">
              <img src="{{asset('lte/dist/img/paket.png')}}" alt="poscu" class="brand-image img-circle">
            </div>
            <div class="info">
              <a href="{{ url('/laundry/paket') }}" class="d-block" style="color:#FFFFFF;">Paket Laundry</a>
            </div>
          </div>
          <div class="user-panel mt-2 d-flex">
            <div class="image">
              <img src="{{asset('lte/dist/img/paket.png')}}" alt="poscu" class="brand-image img-circle">
            </div>
            <div class="info">
              <a href="{{ url('/laundry/status_pesanan') }}" class="d-block" style="color:#FFFFFF;">Status Pesanan</a>
            </div>
          </div>
          <div class="user-panel mt-2 d-flex">
            <div class="image">
              <img src="{{asset('lte/dist/img/paket.png')}}" alt="poscu" class="brand-image img-circle">
            </div>
            <div class="info">
              <a href="{{ url('/laundry/status_pembayaran') }}" class="d-block" style="color:#FFFFFF;">Status Pembayaran</a>
            </div>
          </div>
      </ul>
      
      <div class="user-panel  d-flex">
        <div class="image">
          <img src="{{asset('lte/dist/img/karyawan.png')}}" alt="poscu" class="brand-image img-circle">
        </div>
        <div class="info">
          <a href="{{ url('/karyawan') }}" class="d-block" style="color:#FFFFFF;">Kelola Karyawan</a>
        </div>
      </div>
      @endif
      <!-- <div class="user-panel mt-2 d-flex">
        <div class="image">
          <img src="{{asset('lte/dist/img/kelola.png')}}" alt="poscu" class="brand-image img-circle">
        </div>
        <div class="info">
          <a href="#" class="d-block" style="color:#FFFFFF;">Pengaturan</a>
        </div>
      </div> -->
      <div class="user-panel mt-2 d-flex">
        <div class="image">
          <img src="{{asset('lte/dist/img/logout.png')}}" alt="poscu" class="brand-image img-circle">
        </div>
        <div class="info">
          <a href="{{ url('keluar') }}" class="d-block" style="color:#FFFFFF;">Logout</a>
        </div>
      </div>
    </div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      
      @yield('content')

    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  </div>


<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
<!-- Toast -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@yield('scripts')
</body>
</html>
