<?php
include '../../koneksi.php';
$host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'kursus';

  $konek_db = mysqli_connect($host, $user, $password);
  $find_db = mysqli_select_db($konek_db, $database) ;


  $kode_mapel=$_POST['kode_mapel'];
  $nama_mapel=$_POST['nama_mapel'];
  $hari=$_POST['hari'];
  $jam=$_POST['jam'];
  $paket=$_POST['paket'];
  $id=$_POST['nomor_matpel'];


  if(empty($kode_mapel)||empty($nama_mapel)||empty($hari)||empty($jam)||empty($paket))
  {
    echo '<script language="javascript">';
    echo 'alert("Lengkapi Data!")';
    echo '</script>';
  }
  else{

    $query="UPDATE matpel SET kode_mapel='$kode_mapel', nama_mapel='$nama_mapel',hari='$hari',jam='$jam',
    paket='$paket' where nomor_matpel='$id'";
  	$hasil=mysqli_query($konek_db,$query);

  if(!$hasil){
    echo '<script language="javascript">';
    echo 'alert("Data Gagal Diupdate!")';
    echo '</script>';
  	echo mysqli_error($kon);
  	exit;
  }
  else{
    echo '<script language="javascript">';
    echo 'alert("Data Berhasil Diupdate!")';
    echo '</script>';
  }
  }
header("location:update_berhasil.php");

?>
