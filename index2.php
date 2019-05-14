 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ppidv1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

require('fungsi.php');

//$iduser = '990';
// $count = mysqli_num_rows($sql);

// menampilkan semua error kecuali deprecated dan notice



if(isset($_POST['tambahpermohonan'])) {
    $nmuser = $_POST['nmuser'];
    $alamat = $_POST['alamat'];
    $pekerjaan = $_POST['pekerjaan'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];
    $rincianinformasi = $_POST['rincianinformasi'];
    $tujuanpenggunaan = $_POST['tujuanpenggunaan'];
    $idcaraperoleh = $_POST['idcaraperoleh'];
    $idsalinan = $_POST['idsalinan'];

    $sqlcaraperoleh = mysqli_query($conn, "select nmcaraperoleh from cara_peroleh where idcaraperoleh='$idcaraperoleh'");
    $rowcaraperoleh = mysqli_fetch_array($sqlcaraperoleh);
    $nmcaraperoleh=$rowcaraperoleh['nmcaraperoleh'];

    $sqlsalinan = mysqli_query($conn, "select nmsalinan from salinan where  idsalinan='$idsalinan'");
    $rowsalinan = mysqli_fetch_array($sqlsalinan);
    $nmsalinan = $rowsalinan['nmsalinan'];

    $querycekmaxiduser = mysqli_query($conn,"SELECT MAX(iduser) as maxiduser FROM user");
    $cekmaxiduser = mysqli_fetch_array($querycekmaxiduser);
    $maxiduser = $cekmaxiduser['maxiduser'] + 1;

    $kodepermohonan = $_POST['kodepermohonan'];

    function generateRandomString3($length = 6) {//generate rancode 
            $characters = '0123456789poiuytrewqasdfghjklmnbvcxzQWERTYUIOPLKJHGFDSAZXCVBNM';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
            }

            $password = generateRandomString3();
            $pass = $password;

    function generateRandomString1($length = 5) { //generate rancode 
$characters = '0123456789poiuytrewqasdfghjklmnbvcxzQWERTYUIOPLKJHGFDSAZXCVBNM';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < $length; $i++) {
  $randomString .= $characters[rand(0, $charactersLength - 1)];
}
return $randomString;
}
$kodeunik = generateRandomString1();

$curmonth = date('m');
    $sqlcekurutan = mysqli_query($conn, "select * from permohonan_informasi where MONTH(waktupermohonan) = '$curmonth'");
    $counturutan = mysqli_num_rows($sqlcekurutan);
    $urutan = $counturutan + 1;

                              // Passing `true` enables exceptions
try {
    //$mail->addAddress('bangreymedia@gmail.com', 'Joe User');     // Add a recipient
    $mail->addAddress($email, $nmuser);
    $mail->CharSet="utf-8";
    $body = '
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
    margin: 0 10px 10px 10px !important;
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
}

h3 {
    font-size:20pt;
}
h5 {
    font-size: 14pt;
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
}
</style>
</head>
<body>
<div>
<h3>Kode Permohonan : <b>'.$kodepermohonan.'</b></h3>
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
  <td><h3 class="h3center">System kami secara otomatis membuatkan anda <b class="kode">Akun login</b> , anda dapat <a href="#" target="_blank">Login</a> menggunakan akun tersebut</h3></td>
</tr>
</table>
<br>
<table>
  <tr>
    <th colspan="2">Detail Pemohon</th>
  </tr>
  <tr>
    <td>Nama</td>
    <td>'.$nmuser.'</td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>'.$alamat.'</td>
  </tr>
  <tr>
    <td>Pekerjaan</td>
    <td>'.$pekerjaan.'</td>
  </tr>
  <tr>
    <td>No. Telepon</td>
    <td>'.$telp.'</td>
  </tr>
</table>
<br>
<table>
  <tr>
    <th colspan="2">Akun PPID</th>
  </tr>
  <tr>
    <td>Username</td>
    <td>'.$email.'</td>
  </tr>
  <tr>
    <td>Password</td>
    <td>'.$pass.'</td>
  </tr>
</table>
<h5>
</h5>


<hr>
<table>
  <tr>
    <th colspan="2" id="footer">Copyright©2019 Dinas Komunikasi dan Informatika - Dev By Mascoding.</th>
  </tr>
</table>
</div>
</body>
</html>
';
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Bukti Permohonan Informasi Publik';
    $mail->MsgHTML($body);

    $mail->send();
    echo 'Message has been sent to email '.$email;
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


//echo "Password sudah dikirim ke email ".$email.", silakan cek email anda";
    }
?>

 <form role="form" method="post" enctype="multipart/form-data" action="">
                    <div class="col-xs-12 col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-2 align-left">
                        <h2>Identitas Pemohon</h2>
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" required="required" name="nmuser" value="">
                            <input name="kodepermohonan" value="<?php echo date('Y')?><?php echo date('m') ?><?php echo printf("%04d", $urutan) ?><?php echo $kodeunik ?>" type="hidden">
                                                    </div>
                        <div class="pilihan_kategori">
                            
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea rows="3" class="form-control" required="required" name="alamat"></textarea>
                                                    </div>
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <input class="form-control" required="required" name="pekerjaan" value="">
                                                    </div>
                        <div class="form-group">
                            <label>No Telepon</label>
                            <input class="form-control" required="required" name="telp" value="">
                                                    </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" required="required" name="email" value="">
                                                    </div>
                        <div class="form-group">
                            <label>Upload KTP</label>
                            <input type="file" class="form-control" required="required" name="fotoktp" value="">
                                                    </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-4 col-md-4 align-left">
                        <h2>Data Permohonan</h2>
                        <div class="form-group">
                            <label>Rincian Informasi</label>
                            <textarea rows="3" required="required" class="form-control" name="rincianinformasi"></textarea>
                                                    </div>
                        <div class="form-group">
                            <label>Tujuan Penggunaan Informasi</label>
                            <textarea rows="3" required="required" class="form-control" name="tujuanpenggunaan"></textarea>
                                                    </div>
                        <div class="form-group">
                            <label>Cara Memperoleh Informasi</label><br>

                            <?php
                            $sqlcaraperoleh = mysqli_query($conn, "select * from cara_peroleh where publish = 'T'");
                            while($rowcaraperoleh = mysqli_fetch_array($sqlcaraperoleh)) { ?>
                            <label class="radio-inline">
                                <input type="radio" required="required" value="<?php echo $rowcaraperoleh['idcaraperoleh']?>" name="idcaraperoleh"><?php echo $rowcaraperoleh['nmcaraperoleh']?>
                            </label><br>
                            <?php } ?>
                            
                            
                                                    </div>
               
                        <div class="form-group">
                            <label>Cara Mendapatkan Salinan Informasi</label>

                            <?php
                            $sqlsalinan = mysqli_query($conn, "select * from salinan where publish = 'T'");
                            while($rowsalinan = mysqli_fetch_array($sqlsalinan)) { ?>
                            <div class="radio">
                                <label>
                                    <input type="radio" required="required" value="<?php echo $rowsalinan['idsalinan']?>" name="idsalinan"><?php echo $rowsalinan['nmsalinan']?>
                                </label>
                            </div>
                            <?php } ?>
                                                    </div>
                        <button class="btn btn-primary" type="submit" name="tambahpermohonan">Simpan</button>
                    </div>
                </form>