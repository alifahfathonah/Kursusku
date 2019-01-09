<?php
error_reporting(E_ALL^E_DEPRECATED);
$host="localhost";
$user="root";
$pass="";
$db="kursus";

$kon=mysqli_connect($host, $user, $pass);
if(!$kon)
	die("Koneksi Gagal... ");

$hasil=mysqli_select_db($kon,$db);
if(!$hasil){
	$hasil=mysqli_query($kon, "CREATE DATABASE $db");
	if($hasil)
		die("Gagal Pembuatan");
	else
		$hasil=mysqli_select_db($kon,$db);
		if(!$hasil)
			die("Gagal konek database");
			}


$tabelSiswa="CREATE TABLE if not exists siswa(
	tgl_daftar datetime,
  email_siswa varchar(30) primary key,
  nama_siswa varchar(30) not null,
  password_siswa varchar(8),
  jenis_kelamin_siswa varchar(1),
  alamat_siswa text,
  tgl_lahir_siswa date,
  no_telp_siswa varchar(13),
  asal_sekolah varchar(20),
  nama_wali varchar(30),
  paket varchar(1)
)";
mysqli_query($kon, $tabelSiswa) or die("Gagal membuat tabel siswa");

$tabelPengajar="CREATE TABLE if not exists pengajar(
	tgl_daftar datetime,
  email_pengajar varchar(30) primary key,
  nama_pengajar varchar(30) not null,
  password_pengajar varchar(8),
  jenis_kelamin_pengajar varchar(1),
  alamat_pengajar text,
  tgl_lahir_pengajar date,
  no_telp_pengajar varchar(13),
  nama_mapel varchar(25)
)";
mysqli_query($kon, $tabelPengajar) or die("Gagal membuat tabel pengajar");

$tabelMatpel="CREATE TABLE if not exists matpel(
  kode_mapel varchar(5) primary key,
  nama_mapel varchar(25),
  hari varchar(10),
  jam varchar(5),
	paket varchar(1),
	nomor_matpel int(3) not null auto_increment,
	KEY (nomor_matpel)
)";
mysqli_query($kon, $tabelMatpel) or die("Gagal membuat tabel matpel");
?>
