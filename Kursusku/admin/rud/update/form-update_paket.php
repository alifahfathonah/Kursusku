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
          <li><a href=../../daftar_siswa.php><span>Kembali</span></a></li>
        </ul>
      </div>
    </div>
  </nav>

<div class="container">
  <div class="page-header text-center" style="margin-top: 70px">
    <h1>UPDATE MATAPELAJARAN</h1>
  </div>
</div>

<?php
error_reporting(0);

  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'kursus';

  $konek_db = mysqli_connect($host, $user, $password);
  $find_db = mysqli_select_db($konek_db, $database) ;

$id = $_GET['nomor_matpel'];
$queri="Select * From matpel where nomor_matpel='$id'";
$hasil=MySQLi_query ($konek_db, $queri);

$row = mysqli_fetch_array ($hasil);
?>

<div class="row">
  <div class="col-sm-4"></div>

<div class="col-sm-4">
  <form action="update_paket.php" method="post">
    <input type="hidden" value="<?php echo $row['nomor_matpel'];?>" name="nomor_matpel">
  <div class="form-group">
    <input type="text" class="form-control" name='kode_mapel' value="<?php echo $row['kode_mapel'];?>">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name='nama_mapel' value="<?php echo $row['nama_mapel'];?>">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name='hari' value="<?php echo $row['hari'];?>">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name='jam' value="<?php echo $row['jam'];?>">
  </div>
  <div class="form-group">
     <select class="form-control" name='paket'>
        <option hidden="" value="">Paket</option>
       <option>A</option>
       <option>B</option>
     </select>
     <b class="text-muted">*cek lagi</b><br>
   </div>

   <brs>

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
