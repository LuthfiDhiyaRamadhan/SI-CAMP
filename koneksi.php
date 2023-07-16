<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "db_camping";

    // Buat koneksi
    $koneksi = mysqli_connect($host, $user, $password, $database);

    // Periksa koneksi
    if (mysqli_connect_errno()) {
    echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
    exit();
    }
?>

