<?php
require 'koneksi.php';

// Periksa apakah parameter id_pelanggan ada
if (isset($_GET['id_pelanggan'])) {
    $id_pelanggan = $_GET['id_pelanggan'];

    // Query untuk menghapus data barang berdasarkan id_pelanggan
    $query = "DELETE FROM pelanggan WHERE id_admin = '$id_pelanggan'";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data pelanggan berhasil dihapus.');window.location.href='admin.php';</script>";
        exit;
    } else {
        echo "Gagal menghapus data pelanggan: " . mysqli_error($koneksi);
    }
} else {
    echo "Parameter id_pelanggan tidak ditemukan.";
    exit;
}
?>
