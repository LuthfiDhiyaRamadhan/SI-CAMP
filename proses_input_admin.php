<?php
require 'koneksi.php';
// Ambil data yang dikirim melalui metode POST
$id_admin = $_POST['id_admin'];
$nama_admin = $_POST['nama_admin'];
$username = $_POST['username'];
$password = $_POST['password'];


// Query untuk menyimpan data admin ke dalam database
$query = "INSERT INTO admin (id_admin,nama_admin, username, password) VALUES ('$id_admin','$nama_admin', '$username', '$password')";

// Eksekusi query
if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data admin berhasil disimpan.'); window.location='admin.php';</script>";
} else {
    echo "<div class='alert alert-danger'>Gagal menyimpan data admin: " . mysqli_error($koneksi) . "</div>";
}

// Tutup koneksi setelah selesai
mysqli_close($koneksi);
?>
