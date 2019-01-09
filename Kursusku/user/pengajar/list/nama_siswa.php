<?php
	session_start();
	$username=$_SESSION['username'];
	if($_SESSION['username']==""){
		header("Location: ../index.php");
	}
  $kodemapel=$_GET['kode_mapel'];
  include "../../koneksi.php";

  $konek_db = mysqli_connect($host, $user, $pass);
  $find_db = mysqli_select_db($konek_db, $db) ;

    $no=1;
    $queriA="Select * From matpel where kode_mapel='$kodemapel'" ;
    $hasilA=MySQLi_query ($konek_db, $queriA);
    $row=mysqli_fetch_array ($hasilA);
    $paket=$row['paket'];

    $queriB="Select * From siswa where paket='$paket'" ;
    $hasilB=MySQLi_query ($konek_db, $queriB);
    $no=0;

?>
<html>
<head>
  <title>Kursus</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../../css/bootstrap.min.css">
  <script src="../../../js/jquery-3.3.1.min.js"></script>
  <script src="../../../js/bootstrap.min.js"></script>
  <script src="../../../js/bootstrap-datepicker.js"></script>
  <link href="../../../font/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../../css/bootstrap-datepicker.css" rel="stylesheet">
	<link rel="icon" href="../../../img/favico.ico" type="image/ico">
  <style type="text/css">
  @font-face{
    font-family: 'Monte Cristok';
    src : url('../../../font/Honeyguide.otf');
  }
  @font-face{
    font-family: 'Merriweather';
    src : url('../../../font/Merriweather.ttf');
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
        <a class="navbar-brand" href="#">KURSUS</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href=../biodata.php><span>Biodata</span></a></li>
          <li><a href=../akademik.php><span>Akademik</span></a></li>
        </ul>
      </div>
    </div>
  </nav>


<div class="container">
  <div class="page-header text-center" style="margin-top: 70px">
    <h1>LIST NAMA SISWA</h1>
    <h3><?php echo $row['kode_mapel']; ?> : <?php echo $row['nama_mapel']; ?></h3>
  </div>
</div>
<div class="container">
  <div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
				<th>No</th>
        <th>Nama Siswa</th>
      </tr>
    </thead>
    <?php
    while ($data = mysqli_fetch_array ($hasilB)){
			$emailsiswa=$data['email_siswa'];
			$queriC="Select * From nilai where email_siswa='$emailsiswa'";
	    $hasilC=MySQLi_query ($konek_db, $queriC);
			$datanilai=mysqli_fetch_array ($hasilC);
      $no++;
     echo "
     <tbody>
          <tr>
            <td>$no</td>
            <td>".$data['nama_siswa']."</td>
          </tr>
            </tbody>
						  ";
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
