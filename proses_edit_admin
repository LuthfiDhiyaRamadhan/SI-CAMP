<?php
require 'koneksi.php';

// Mendapatkan data yang dikirim melalui form
$id_admin = $_POST['id_admin'];
$nama_admin = $_POST['nama_admin'];
$username = $_POST['username'];
$password = $_POST['password'];
// Query untuk melakukan pembaruan data admin
$query = "UPDATE admin SET nama_admin='$nama_admin',
 username='$username', password='$password' WHERE id_admin='$id_admin'";

// Eksekusi query
if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data admin berhasil diperbarui.');</script>";
    echo "<script>window.location.href = 'admin.php';</script>";
} else {
    echo "<script>alert('Gagal memperbarui data admin: " . mysqli_error($koneksi) . "');</script>";
    echo "<script>window.history.back();</script>";
}

// Tutup koneksi setelah selesai
mysqli_close($koneksi);
?>
