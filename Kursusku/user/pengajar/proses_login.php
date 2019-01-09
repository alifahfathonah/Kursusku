<?php
session_start();
 require('../koneksi.php');
if (isset($_POST['username']) and isset($_POST['password'])){
$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM pengajar WHERE email_pengajar='$username' and password_pengajar='$password'";

$result = mysqli_query($kon, $query) or die(mysqli_error($kon));
$count = mysqli_num_rows($result);
if ($count == 1){
$_SESSION['username'] = $username;
}else{
echo "Invalid Login Credentials.";
}
}
echo "Loading. . .";
if (isset($_SESSION['username'])){
$username = $_SESSION['username'];
echo "Hai " . $username . "";
echo "This is the Members Area";
 header('location:biodata.php');

}
?>
