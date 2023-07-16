<?php
require 'koneksi.php';

// Mendapatkan ID barang yang akan dihapus dari parameter GET
$id_pelanggan = $_GET['id_pelanggan'];

// Query untuk menghapus data barang berdasarkan ID barang
$query = "DELETE FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";

// Eksekusi query
if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data pelanggan berhasil dihapus.');</script>";
    echo "<script>window.location.href = 'pelanggan.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data data: " . mysqli_error($koneksi) . "');</script>";
    echo "<script>window.history.back();</script>";
}

// Tutup koneksi setelah selesai
mysqli_close($koneksi);
?>
