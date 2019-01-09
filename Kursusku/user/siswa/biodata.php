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
    <h1>Biodata Siswa</h1>

  </div>
</div>
	<div class="container">

		<?php
		include "../koneksi.php";

		  $konek_db = mysqli_connect($host, $user, $pass);
		  $find_db = mysqli_select_db($konek_db, $db) ;


		$queri="Select * From siswa where email_siswa='$username'" ;
		$hasil=MySQLi_query ($konek_db, $queri);
		$row=mysqli_fetch_array ($hasil);

		?>

	<div class="col-sm-2">
  </div>

	<div class="col-sm-8">
		<table class="table">
			<tr>
				<td>Nama</td><td>:</td><td><?php echo $row['nama_siswa'] ?></td>
			</tr>
			<tr>
				<td>Email</td><td>:</td><td><?php echo $row['email_siswa'] ?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td><td>:</td><td><?php echo $row['jenis_kelamin_siswa'] ?></td>
			</tr>
			<tr>
				<td>Alamat</td><td>:</td><td><?php echo $row['alamat_siswa'] ?></td>
			</tr>
			<tr>
				<td>Tangal Lahir</td><td>:</td><td><?php echo $row['tgl_lahir_siswa'] ?></td>
			</tr>
			<tr>
				<td>No. Telp</td><td>:</td><td><?php echo $row['no_telp_siswa'] ?></td>
			</tr>
			<tr>
				<td>Asal Sekolah</td><td>:</td><td><?php echo $row['asal_sekolah'] ?></td>
			</tr>
			<tr>
				<td>Nama Wali</td><td>:</td><td><?php echo $row['nama_wali'] ?></td>
			</tr>
			<tr>
				<td>Paket</td><td>:</td><td><?php echo $row['paket'] ?></td>
			</tr>
			</table>
</div>

<div class="col-sm-2">
</div>
		</div>
</body>

<footer class="footer" style="background: white; border-color: black;">
	<div class="container">
		<div class="row text-center text-muted">
			<h5>.:Kursus:.</h5>
			<h6>Project. <b>Powered by Bootstrap</b>.</h6>
</footer>
</html>
