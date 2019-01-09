<?php
include '../../koneksi.php';
$host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'kursus';

  $konek_db = mysqli_connect($host, $user, $password);
  $find_db = mysqli_select_db($konek_db, $database) ;




  $nama_pengajar=$_POST['nama'];
  $password_pengajar=$_POST['password'];
  $email_pengajar=$_POST['email'];
  $jenis_kelamin_pengajar=$_POST['optradio'];
  $alamat_pengajar=$_POST['alamat'];
  $tgl_lahir=$_POST['date'];
  $no_telp_pengajar=$_POST['no_telp'];
  $matpel=$_POST['matpel'];
  $id = $_POST['tgl_daftar'];

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

    $query="UPDATE pengajar SET nama_pengajar='$nama_pengajar', password_pengajar='$password_pengajar',email_pengajar='$email_pengajar',jenis_kelamin_pengajar='$jenis_kelamin_pengajar',
    alamat_pengajar='$alamat_pengajar', tgl_lahir_pengajar='$tgl_lahir_pengajar', no_telp_pengajar='$no_telp_pengajar', nama_mapel='$matpel'
    where tgl_daftar='$id'";
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
