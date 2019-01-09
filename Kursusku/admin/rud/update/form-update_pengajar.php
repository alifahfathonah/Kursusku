<html>
<head>
<title>Kursus</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../../css/bootstrap.css">
  <script src="../../../js/jquery-3.3.1.min.js"></script>
  <script src="../../../js/bootstrap.min.js"></script>
  <script src="../../../js/bootstrap-datepicker.js"></script>
  <link href="../../../font/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../../css/bootstrap-datepicker.css" rel="stylesheet">

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
          <li><a href=../../daftar_pengajar.php><span>Kembali</span></a></li>
        </ul>
      </div>
    </div>
  </nav>

<div class="container">
  <div class="page-header text-center" style="margin-top: 70px">
    <h1>UPDATE PENGAJAR</h1>
  </div>
</div>

<?php
error_reporting(0);
include "../koneksi.php";
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'kursus';

  $konek_db = mysqli_connect($host, $user, $password);
  $find_db = mysqli_select_db($konek_db, $database) ;

$id = $_GET['tgl_daftar'];
$queri="Select * From pengajar where tgl_daftar='$id'";
$hasil=MySQLi_query ($konek_db, $queri);

$row = mysqli_fetch_array ($hasil);
?>

<div class="row">
  <div class="col-sm-4"></div>

<div class="col-sm-4">
  <form action="update_pengajar.php" method="post">
    <input type="hidden" value="<?php echo $row['tgl_daftar'];?>" name="tgl_daftar">
  <div class="form-group">
    <input type="text" class="form-control" name='nama' value="<?php echo $row['nama_pengajar'];?>">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name='email' value="<?php echo $row['email_pengajar'];?>">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name='password'><b class="text-muted">*cek lagi</b>
  </div>
  <div class="form-group">Jenis Kelamin <b class="text-muted">*cek lagi</b><br>
    <div class="radio-inline">
      <input type="radio" name="optradio" checked value="L">Laki</input>
    </div>
    <div class="radio-inline">
      <input type="radio" name="optradio" value="P">Perempuan</input>
    </div>
  </div>

  <div class="form-group">
    <input type="text" class="form-control" name='alamat' value="<?php echo $row['alamat_pengajar'];?>">
  </div>

  <div class="form-group">
  <div class="input-group date" data-provide="datepicker" placeholder="tanggal lahir">
      <input type="text" class="form-control" name="date">
      <div class="input-group-addon">
          <span class="fa fa-calendar"></span>
      </div>
  </div>
  <b class="text-muted">*cek lagi</b>
</div>

  <div class="form-group">
    <input type="text" class="form-control" name='no_telp' value="<?php echo $row['no_telp_pengajar'];?>">
  </div>


  <hr>

	<?php
  $konek_dba = mysqli_connect($host, $user, $password);
  $find_dba = mysqli_select_db($konek_dba, $database) ;

	$queridrop="Select * From matpel ORDER BY paket asc" ;
	$hasildrop=MySQLi_query ($konek_dba, $queridrop);
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
     <b class="text-muted">*cek lagi</b>
	 </div>

   <br>

  <div class="form-group">
    <button type="submit" name='simpan' class="btn btn-primary form-control">Update</button>
  </div>
</form>

  </div>
  <div class="col-sm-4">
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
