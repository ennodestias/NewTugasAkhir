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
    <div class="content">
        <div class="title">
            <img src="lte/dist/img/logo.png" height="70px;" width="70px;" style="padding-right:20px; clear:both;float:left">
            <div style="height:70px;padding: 20px;">
            <b>RUMAH LAUNDRY GANDHI</b>
            </div>
        </div>
        <div align="left" style="padding-bottom: 10px;">
          <p>Nama Pelanggan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $customer->nama }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dikerjakan Oleh &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:{{$pekerja->name}}</p> 
          <p>Nomor Pelanggan &nbsp;&nbsp;&nbsp;: {{ $customer->nohp }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Diterima Tanggal    &nbsp;&nbsp;&nbsp;&nbsp;: {{ $data -> tanggal_diterima }} </p>             
          <p>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $customer->alamat }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Selesai Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $data -> tanggal_selesai }}</p>
          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Keterangan Tambahan : {{ $data -> keterangan }}</p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Berat / Pcs</th>
                    <th>Paket</th>
                    <th>Harga Paket</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody> 
                <tr> 
                    <th>{{ $data->berat }}</th>
                    <th>{{ $paket->nama }}</th>
                    <th>{{"Rp " . number_format($paket->harga, 0, ",", ".")  }}</th>
                    <th>{{"Rp " . number_format($data->total, 0, ",", ".")  }}</th>       
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>