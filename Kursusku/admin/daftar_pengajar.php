<?php
	session_start();
	if($_SESSION['username']==""){
		header("Location: index.php");
	}
	include "koneksi.php";
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
    <h1>TAMBAH DATA PENGAJAR</h1>
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
    <input type="text" class="form-control" name='no_telp' placeholder="no telp. pengajar">
  </div>


  <hr>

	<?php
	$konek_db = mysqli_connect($host, $user, $pass);
  $find_db = mysqli_select_db($konek_db, $db) ;


	$queridrop="Select * From matpel ORDER BY paket asc" ;
	$hasildrop=MySQLi_query ($konek_db, $queridrop);
	?>

	<div class="form-group">
		 <select class="form-control" name='matpel'>
				<option hidden="" value="">Mata Pelajaran</option>
					<?php

				if(mysqli_num_rows($hasildrop) != 0){
					while ($datadrop = mysqli_fetch_array ($hasildrop)){
						echo '<option>'.$datadrop['nama_mapel'].'</option>';
					}
				}
				?>

		 </select>
	 </div>

   <br>

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


$nama_pengajar=$_POST['nama'];
$password_pengajar=$_POST['password'];
$email_pengajar=$_POST['email'];
$jenis_kelamin_pengajar=$_POST['optradio'];
$alamat_pengajar=$_POST['alamat'];
$tgl_lahir=$_POST['date'];
$no_telp_pengajar=$_POST['no_telp'];
$matpel=$_POST['matpel'];


function ubahTanggal($tanggal){
 $pisah = explode('/',$tanggal);
 $array = array($pisah[2],$pisah[0],$pisah[1]);
 $satukan = implode('-',$array);
 return $satukan;
}

$tgl_lahir_pengajar = ubahTanggal($tgl_lahir);

if(empty($nama_pengajar)||empty($password_pengajar)||empty($email_pengajar)||
empty($jenis_kelamin_pengajar)||empty($alamat_pengajar)||empty($tgl_lahir_pengajar)||
empty($no_telp_pengajar)||empty($matpel))
{

  echo '<script language="javascript">';
  echo 'alert("Lengkapi Data!")';
  echo '</script>';
}
else{

$sql="insert into pengajar(tgl_daftar,email_pengajar, nama_pengajar, password_pengajar,
jenis_kelamin_pengajar, alamat_pengajar, tgl_lahir_pengajar, no_telp_pengajar,
nama_mapel)
	value(NOW(),'$email_pengajar','$nama_pengajar','$password_pengajar','$jenis_kelamin_pengajar',
  '$alamat_pengajar','$tgl_lahir_pengajar','$no_telp_pengajar','$matpel')";
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
    <h1>DAFTAR PENGAJAR</h1>
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
        <th>Mpel</th>
        <th>*</th>
      </tr>
    </thead>


<?php
include "koneksi.php";

  $konek_db = mysqli_connect($host, $user, $pass);
  $find_db = mysqli_select_db($konek_db, $db) ;

$no=1;
$queri="Select * From pengajar" ;
$hasil=MySQLi_query ($konek_db, $queri);
$no=0;

while ($data = mysqli_fetch_array ($hasil)){

  $id = $data['email_pengajar'];
  $no++;
 echo "
 <tbody>
      <tr>
        <td>$no</td>
        <td>".$data['nama_pengajar']."</td>
        <td>".$data['email_pengajar']."</td>
        <td>".$data['nama_mapel']."</td>
        <td>

                <a href='rud/update/form-update_pengajar.php?tgl_daftar=".$data['tgl_daftar']."'>Edit</a>
                <a href='rud/delete/delete_pengajar.php?email_pengajar=".$id."'>Delete</a></td>
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
