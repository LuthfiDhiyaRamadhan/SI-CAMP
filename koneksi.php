<?php
<<<<<<< HEAD

//Buat koneksi ke database
$koneksi = mysqli_connect('localhost', 'root', '', 'db_camping');

?>
=======
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
>>>>>>> a7914d9a4cfd9fb88d060b3d6d937d9c479195d4
