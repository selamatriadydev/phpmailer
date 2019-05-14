 <!DOCTYPE html>
<html>
<head>
<style>


table {
  /*border-collapse: collapse;
  width: 100%;
  border-style: solid solid none;*/
      width: 100%;
    box-shadow: 0 1px 5px 0 #afafaf;
    /*margin: 0 10px 10px 10px !important;*/
    background: #FFFFFF;
    margin-bottom: 10px;
}

div {
  padding: 0px 5% 0 5%!important;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #243f1f;
  color: white;
}

#th {
  background-color: grey;
  color: white;
}

td, h4, h5 {
    color: black;
}
.kode {
    border-bottom: 1px solid black;
    font-weight: bold;
    width: 100%;
}

h3 {
    font-size: 12pt;
}
h5 {
    font-size: 10pt;
    font-weight : bold;
}
.h3center {
    text-align: center;
        margin: 9px;
}
#button {
      background: #193316;
    border: none;
    color: white;
    border-radius: 0px;
    margin-top: 0px;
    padding: 8px 20px;
    text-decoration: none;
}
#footer {
  text-align: center;
  width: 100%;
}
</style>
</head>
<body>
<div>
<h3>Kode Permohonan   : <b class="kode">'.$kodepermohonan.'</b></h3>
<h3>Status Permohonan : <b class="kode">'.$status.'</b></h3>
<h5>Anda dapat mengecek status permohonan anda dengan cara menekan <a href="#" target="_blank">tombol berikut</a> dan masukkan <b class="kode">Kode Permohonan</b> anda.
</h5>
<hr>
<table>
  <tr>
    <th colspan="2">Detail Rincian Informasi</th>
  </tr>
  <tr>
    <td>Rincian</td>
    <td>'.$rincianinformasi.'</td>
  </tr>
   <tr>
    <td>Tujuan</td>
    <td>'.$tujuanpenggunaan.'</td>
  </tr>
  <tr>
    <td>Cara Memperoleh</td>
    <td>'.$nmcaraperoleh.'</td>
  </tr>
  <tr>
    <td>Jenis Salinan</td>
    <td>'.$nmsalinan.'</td>
  </tr>
</table>
<br>
<table>
  <tr>
    <th colspan="2">Tanggapan Petugas PPID</th>
  </tr>
  <tr>
    <td colspan="2">
      <p>'.$isi.'</p>
    </td>
  </tr>
</table>
<hr>
<table>
  <tr>
    <th colspan="2" id="footer">Copyright©2019 Dinas Komunikasi dan Informatika .</th>
  </tr>
</table>
</div>
</body>
</html>