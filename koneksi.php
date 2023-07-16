<?php
//Buat koneksi ke database
$koneksi = mysqli_connect('localhost', 'root', '', 'db_camping');

$host = "localhost";
$user = "root";
$password = "";
$database = "db_camping";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno()) {
   echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
   exit();
}
?>
