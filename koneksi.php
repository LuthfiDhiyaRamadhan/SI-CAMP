<?php
$host = "localhost"; // Nama host database
$user = "root"; // Username database
$password = ""; // Password database
$database = "db_camping"; // Nama database

// Buat koneksi
$koneksi = mysqli_connect($host, $user, $password, $database);

// Periksa koneksi
if (mysqli_connect_errno()) {
   echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
   exit();
}?>
