<?php
	session_start();
	$username=$_SESSION['username'];
	if($_SESSION['username']==""){
		header("Location: index.php");
	}
?>
<html>
<head>
<title>Kursus</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <script src="../../js/jquery-3.3.1.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/bootstrap-datepicker.js"></script>
  <link href="../../font/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../css/bootstrap-datepicker.css" rel="stylesheet">
	<link rel="icon" href="../../img/favico.ico" type="image/ico">
<style type="text/css">
@font-face{
  font-family: 'Monte Cristok';
  src : url('../../font/Honeyguide.otf');
}
@font-face{
  font-family: 'Merriweather';
  src : url('../../font/Merriweather.ttf');
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
          <li><a href=biodata.php><span>Biodata</span></a></li>
          <li><a href=akademik.php><span>Akademik</span></a></li>
          <li><a href=logout.php><span>Logout</span></a></li>
        </ul>
      </div>
    </div>
  </nav>

<div class="container">
  <div class="page-header text-center" style="margin-top: 70px">
    <h1>Akademik</h1>
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
      </tr>
    </thead>


<?php
include "../koneksi.php";

  $konek_db = mysqli_connect($host, $user, $pass);
  $find_db = mysqli_select_db($konek_db, $db) ;

$no=1;
$queriA="Select * From siswa where email_siswa='$username'" ;
$hasilA=MySQLi_query ($konek_db, $queriA);
$row=mysqli_fetch_array ($hasilA);
$paket=$row['paket'];

$queriB="Select * From matpel where paket='$paket'" ;
$hasilB=MySQLi_query ($konek_db, $queriB);
$no=0;

while ($data = mysqli_fetch_array ($hasilB)){

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
