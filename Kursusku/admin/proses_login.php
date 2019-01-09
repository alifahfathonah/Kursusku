<?php
	session_start();
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if(($user=="admin") && ($pass=="adminkursus")){
		$_SESSION['username'] = "admin";
    echo "Loading. . .";
		header("Location: daftar_siswa.php");
	}else{
		header("Location: index.php");
	}
