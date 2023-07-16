<?php
require 'koneksi.php';

// Mendapatkan ID barang yang akan dihapus dari parameter GET
$id_kategori = $_GET['id_kategori'];

// Query untuk menghapus data barang berdasarkan ID barang
$query = "DELETE FROM kategori WHERE id_kategori = '$id_kategori'";

// Eksekusi query
if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data Kategori berhasil dihapus.');</script>";
    echo "<script>window.location.href = 'kategori.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data kategori: " . mysqli_error($koneksi) . "');</script>";
    echo "<script>window.history.back();</script>";
}

// Tutup koneksi setelah selesai
mysqli_close($koneksi);
?>
