<?php
require 'koneksi.php';

// Memeriksa apakah parameter id_barang telah diberikan
if (isset($_POST['id_barang'])) {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $id_kategori = $_POST['id_kategori'];
    $harga_sewa = $_POST['harga_sewa'];
    $stok = $_POST['stok'];
    $spesifikasi = $_POST['spesifikasi'];

    // Query untuk mengupdate data barang
    $queryUpdate = "UPDATE barang SET nama_barang = '$nama_barang', id_kategori = '$id_kategori', harga_sewa = '$harga_sewa', stok = '$stok', spesifikasi = '$spesifikasi' WHERE id_barang = '$id_barang'";

    // Eksekusi query update
    if (mysqli_query($koneksi, $queryUpdate)) {
        echo "<script>alert('Data barang berhasil diperbarui.'); window.location='barang.php';</script>";
    } else {
        echo "<div class='alert alert-danger'>Gagal memperbarui data barang: " . mysqli_error($koneksi) . "</div>";
    }
} else {
    // Redirect jika parameter id_barang tidak ditemukan
    header("Location: barang.php");
    exit();
}

// Tutup koneksi setelah selesai
mysqli_close($koneksi);
?>
