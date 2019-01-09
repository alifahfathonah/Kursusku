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
    <h1>TAMBAH DATA MATA PELAJARAN</h1>
  </div>
</div>

<div class="row">
  <div class="col-sm-4"></div>

<div class="col-sm-4">
  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
  <div class="form-group">
    <input type="text" class="form-control" name='kode_mapel' placeholder="kode">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name='nama_mapel' placeholder="nama mata pelajaran">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name='hari' placeholder="hari">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name='jam' placeholder="jam">
  </div>
  <div class="form-group">
     <select class="form-control" name='paket'>
        <option hidden="" value="">Paket</option>
       <option>A</option>
       <option>B</option>
     </select>
   </div>

   <brs>

  <div class="form-group">
    <button type="submit" name='simpan' class="btn btn-primary form-control">Tambah</button>
  </div>
</form>

  </div>
  <div class="col-sm-4">
  </div>
</div>

<?php
error_reporting(0);
$kode_mapel=$_POST['kode_mapel'];
$nama_mapel=$_POST['nama_mapel'];
$hari=$_POST['hari'];
$jam=$_POST['jam'];
$paket=$_POST['paket'];


if(empty($kode_mapel)||empty($nama_mapel)||empty($hari)||empty($jam)||empty($paket))
{
  echo '<script language="javascript">';
  echo 'alert("Lengkapi Data!")';
  echo '</script>';
}
else{ include "koneksi.php";

$sql="insert into matpel(kode_mapel, nama_mapel, hari, jam, paket)
	value('$kode_mapel','$nama_mapel','$hari','$jam','$paket')";
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
    <h1>DAFTAR MATA PELAJARAN</h1>
  </div>
</div>
<div class="container">
  <div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
				<th>No</th>
        <th>Kode</th>
        <th>Nama Mata Pelajaran</th>
        <th>Hari</th>
        <th>Jam</th>
				<th>Paket</th>
        <th>*</th>
      </tr>
    </thead>


<?php
include "koneksi.php";

  $konek_db = mysqli_connect($host, $user, $pass);
  $find_db = mysqli_select_db($konek_db, $db) ;

$no=1;
$queri="Select * From matpel ORDER BY kode_mapel asc" ;
$hasil=MySQLi_query ($konek_db, $queri);
$no=0;

while ($data = mysqli_fetch_array ($hasil)){

  $id = $data['kode_mapel'];
  $no++;
 echo "
 <tbody>
      <tr>
        <td>$no</td>
        <td>".$data['kode_mapel']."</td>
        <td>".$data['nama_mapel']."</td>
				<td>".$data['hari']."</td>
				<td>".$data['jam']."</td>
        <td>".$data['paket']."</td>
        <td>

                <a href='rud/update/form-update_paket.php?nomor_matpel=".$data['nomor_matpel']."'>Edit</a>
                <a href='rud/delete/delete_paket.php?kode_mapel=".$id."'>Delete</a></td>
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

</body>
</html>
