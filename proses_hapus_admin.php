<?php
require 'koneksi.php';

// Periksa apakah parameter id_barang ada
if (isset($_GET['id_admin'])) {
    $id_admin = $_GET['id_admin'];

    // Query untuk menghapus data barang berdasarkan id_barang
    $query = "DELETE FROM admin WHERE id_admin = '$id_admin'";

if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data admin berhasil dihapus.');window.location.href='admin.php';</script>";
        exit;
    } else {
        echo "Gagal menghapus data admin: " . mysqli_error($koneksi);
    }
} else {
    echo "Parameter id_kategori tidak ditemukan.";
    exit;
}
?>
