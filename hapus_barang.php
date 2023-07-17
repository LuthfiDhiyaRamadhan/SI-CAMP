<?php
require 'koneksi.php';

// Mendapatkan ID barang yang akan dihapus dari parameter GET
$id_barang = $_GET['id_barang'];

// Query untuk menghapus data barang berdasarkan ID barang
$query = "DELETE FROM barang WHERE id_barang = '$id_barang'";

// Eksekusi query
if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data barang berhasil dihapus.');</script>";
    echo "<script>window.location.href = 'barang.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data barang: " . mysqli_error($koneksi) . "');</script>";
    echo "<script>window.history.back();</script>";
}

// Tutup koneksi setelah selesai
mysqli_close($koneksi);
?>

