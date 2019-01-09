<?php
include '../../koneksi.php';
$host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'kursus';

  $konek_db = mysqli_connect($host, $user, $password);
  $find_db = mysqli_select_db($konek_db, $database) ;



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
$id = $_POST['tgl_daftar'];

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
else{

  $query="UPDATE siswa SET nama_siswa='$nama_siswa', password_siswa='$password_siswa',email_siswa='$email_siswa',jenis_kelamin_siswa='$jenis_kelamin_siswa',
  alamat_siswa='$alamat_siswa', tgl_lahir_siswa='$tgl_lahir_siswa', no_telp_siswa='$no_telp_siswa', asal_sekolah='$asal_sekolah',nama_wali='$nama_wali',
  paket='$paket' where tgl_daftar='$id'";
	$hasil=mysqli_query($konek_db,$query);

if(!$hasil){
  echo '<script language="javascript">';
  echo 'alert("Data Gagal Diupdate!")';
  echo '</script>';
	echo mysqli_error($konek_db);
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
