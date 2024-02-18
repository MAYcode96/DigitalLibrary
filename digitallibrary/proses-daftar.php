<?php
include 'koneksi.php';

$nama = $_POST['user'];
$pass = $_POST['password'];
$mail = $_POST['mail'];
$nama_l = $_POST['nama_lengkap'];
$alamat = $_POST['alamat'];

$mdpas = md5($pass);
mysqli_query($con,"insert into user values('','$nama','$mdpas','$mail','$nama_l','$alamat','')");

header("location:index.php?pesan=info_daftar");
?>