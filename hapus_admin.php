<?php
require 'koneksi.php';

// Mendapatkan ID barang yang akan dihapus dari parameter GET
$id_admin = $_GET['id_admin'];

// Query untuk menghapus data barang berdasarkan ID barang
$query = "DELETE FROM admin WHERE id_admin = '$id_admin'";

// Eksekusi query
if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data Admin berhasil dihapus.');</script>";
    echo "<script>window.location.href = 'admin.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data data: " . mysqli_error($koneksi) . "');</script>";
    echo "<script>window.history.back();</script>";
}

// Tutup koneksi setelah selesai
mysqli_close($koneksi);
?>
