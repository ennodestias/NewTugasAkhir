<html>
<head>
<style>
body{
    font-family:cambria;
    font-size: 12px;
}
table {
  width:100%;
  font-size: 12px;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th{
  padding: 5px;
  text-align: center;
}
td {
  padding: 5px;
  text-align: left;
}
.header{
  text-align: center;
  float:left;
  color: black;
  width:100%;
  border-bottom: double;
  margin-top: 5px;
  }
.content{
  text-align: center;
  float:left;
  color: black;
  width:100%;
  }
.title{
    padding-top:20px;
    padding-bottom:20px;
    align:center;
    }

</style>
</head>
<body>
    <header>
        <img src="lte/dist/img/logo.png" height="70px;" width="70px;" style="padding-right:20px; clear:both;float:left">
        <div style="height:70px;padding: 20px;">
          <b>LAPORAN TRANSAKSI LAUNDRY</b><br>
          <b>GANDHY LAUNDRY</b><br>
        </div>
    </header>
    <div class="content">
        <div class="title">
            <b>RIWAYAT PESANAN</b><br>
        </div>
        <div align="left" style="padding-bottom: 10px;">
          Tanggal : {{date('d-m-Y')}}
        </div>
        <table>
            <thead>
                <tr>
                    <th style="text-align: center;">NO</th>
                    <th>Nama Pelanggan</th>
                    <th>Paket</th>
                    <th>Berat</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody> 
                  <tr> 
                    <th style="text-align: center;">NO</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
            </tbody>
        </table>
    </div>
</body>
</html>