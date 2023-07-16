<?php
<<<<<<< HEAD
$host = "localhost"; // Nama host database
$user = "root"; // Username database
$password = ""; // Password database
$database = "db_camping"; // Nama database
=======
$host = "localhost";
$user = "root";
$password = "";
$database = "db_camping";
>>>>>>> 5ca066ff9820d71d1cd120d16e702848dd1894c8

// Buat koneksi
$koneksi = mysqli_connect($host, $user, $password, $database);

// Periksa koneksi
if (mysqli_connect_errno()) {
   echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
   exit();
<<<<<<< HEAD
}?>
=======
}
?>
>>>>>>> 5ca066ff9820d71d1cd120d16e702848dd1894c8
