<?php
	session_start();
	if($_SESSION['username']==""){
		header("Location: index.php");
	}
?>
<html>
<head>
<title>Kursus</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  <link href="../font/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../css/bootstrap-datepicker.css" rel="stylesheet">

<style type="text/css">
@font-face{
  font-family: 'Monte Cristok';
  src : url('../font/Honeyguide.otf');
}
@font-face{
  font-family: 'Merriweather';
  src : url('../font/Merriweather.ttf');
}
  h1, p {
    font-family: 'Monte Cristok' !important;
  }

 h3,th,td,footer,a,li  {
    font-family: 'Merriweather' !important;
  }

</style>
</head>
<body style="overflow-x: hidden;">

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../index.php">KURSUS</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href=daftar_paket.php><span>Paket</span></a></li>
          <li><a href=daftar_siswa.php><span>Daftar Siswa</span></a></li>
          <li><a href=daftar_pengajar.php><span>Daftar Pengajar</span></a></li>
          <li><a href=logout.php><span>Logout</span></a></li>
        </ul>
      </div>
    </div>
  </nav>

<div class="container">
  <div class="page-header text-center" style="margin-top: 70px">
    <h1>TAMBAH DATA SISWA</h1>
  </div>
</div>

<div class="row">
  <div class="col-sm-4"></div>

<div class="col-sm-4">
  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
  <div class="form-group">
    <input type="text" class="form-control" name='nama' placeholder="nama">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name='email' placeholder="email">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name='password' placeholder="password">
  </div>
  <div class="form-group">Jenis Kelamin<br>
    <div class="radio-inline">
      <input type="radio" name="optradio" checked value="L">Laki</input>
    </div>
    <div class="radio-inline">
      <input type="radio" name="optradio" value="P">Perempuan</input>
    </div>
  </div>

  <div class="form-group">
    <input type="text" class="form-control" name='alamat' placeholder="alamat">
  </div>

  <div class="form-group">
  <div class="input-group date" data-provide="datepicker" placeholder="tanggal lahir">
      <input type="text" class="form-control" name="date">
      <div class="input-group-addon">
          <span class="fa fa-calendar"></span>
      </div>
  </div>
</div>

  <div class="form-group">
    <input type="text" class="form-control" name='telp_siswa' placeholder="no telp. siswa">
  </div>


  <hr>

  <div class="form-group">
    <input type="text" class="form-control" name='asal_sekolah' placeholder="asal sekolah">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name='wali' placeholder="nama wali">
  </div>

  <div class="form-group">
     <select class="form-control" name='kode'>
        <option hidden="" value="">Paket</option>
       <option>A</option>
       <option>B</option>
     </select>
   </div>

   <brs>

  <div class="form-group">
    <button type="submit" name='simpan' class="btn btn-primary form-control">Sign Up</button>
  </div>
</form>

  </div>
  <div class="col-sm-4">
  </div>
</div>

<?php
error_reporting(0);
$nama_siswa=$_POST['nama'];
$password_siswa=$_POST['password'];
$email_siswa=$_POST['email'];
$jenis_kelamin_siswa=$_POST['optradio'];
$alamat_siswa=$_POST['alamat'];
$tgl_lahir=$_POST['date'];
$no_telp_siswa=$_POST['telp_siswa'];
$asal_sekolah=$_POST['asal_sekolah'];
$nama_wali=$_POST['wali'];
$paket=$_POST['kode'];

function ubahTanggal($tanggal){
 $pisah = explode('/',$tanggal);
 $array = array($pisah[2],$pisah[0],$pisah[1]);
 $satukan = implode('-',$array);
 return $satukan;
}

$tgl_lahir_siswa = ubahTanggal($tgl_lahir);

if(empty($nama_siswa)||empty($password_siswa)||empty($email_siswa)||
empty($jenis_kelamin_siswa)||empty($alamat_siswa)||empty($tgl_lahir_siswa)||
empty($no_telp_siswa)||empty($asal_sekolah)||empty($nama_wali)||empty($paket))
{

  echo '<script language="javascript">';
  echo 'alert("Lengkapi Data!")';
  echo '</script>';
}
else{ include "koneksi.php";

$sql="insert into siswa(tgl_daftar, email_siswa, nama_siswa, password_siswa,
jenis_kelamin_siswa, alamat_siswa, tgl_lahir_siswa, no_telp_siswa,
asal_sekolah, nama_wali, paket)
	value(NOW(),'$email_siswa','$nama_siswa','$password_siswa','$jenis_kelamin_siswa',
  '$alamat_siswa','$tgl_lahir_siswa','$no_telp_siswa','$asal_sekolah','$nama_wali','$paket')";
	$hasil=mysqli_query($kon,$sql);

if(!$hasil){
  echo '<script language="javascript">';
  echo 'alert("Data Gagal Disimpan!")';
  echo '</script>';
	echo mysqli_error($kon);
	exit;
}
else{
  echo '<script language="javascript">';
  echo 'alert("Data Berhasil Disimpan!")';
  echo '</script>';
}
}

?>
<hr>
<div class="container">
  <div class="page-header text-center">
    <h1>DAFTAR SISWA</h1>
  </div>
</div>
<div class="container">
  <div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Paket</th>
        <th>*</th>
      </tr>
    </thead>


<?php
include "koneksi.php";

  $konek_db = mysqli_connect($host, $user, $pass);
  $find_db = mysqli_select_db($konek_db, $db) ;

$no=1;
$queri="Select * From siswa" ;
$hasil=MySQLi_query ($konek_db, $queri);
$no=0;

while ($data = mysqli_fetch_array ($hasil)){

  $id = $data['email_siswa'];
  $no++;
 echo "
 <tbody>
      <tr>
        <td>$no</td>
        <td>".$data['nama_siswa']."</td>
        <td>".$data['email_siswa']."</td>
        <td>".$data['paket']."</td>
        <td>

                <a href='rud/update/form-update_siswa.php?tgl_daftar=".$data['tgl_daftar']."'>Edit</a>
                <a href='rud/delete/delete_siswa.php?email_siswa=".$id."'>Delete</a></td>
      </tr>
        </tbody>";
}

?>


  </table>
</div>
</div>
<footer class="footer" style="background: white; border-color: black;">
  <div class="container">
    <div class="row text-center text-muted">
      <h5>.:Kursus:.</h5>
      <h6>Project. <b>Powered by Bootstrap</b>.</h6>
</footer>


<script>
$('#datepicker').datepicker();
</script>

</body>
</html>
