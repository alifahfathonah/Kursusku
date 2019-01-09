<?php
session_start();
if($_SESSION['username']==""){
  header("Location: index.php");
}
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'kursus';

  $konek_db = mysqli_connect($host, $user, $password);
  $find_db = mysqli_select_db($konek_db, $database) ;

 $id = $_GET['email_pengajar'];

$query="DELETE from pengajar where email_pengajar='$id'";
$hasil=MySQLi_query ($konek_db, $queri);


mysqli_query($konek_db, $query);
header("location:../../daftar_pengajar.php");
?>
