<?php
require 'koneksi.php';

// Mendapatkan data yang dikirim melalui form
$id_kategori = $_POST['id_kategori'];
$nama_kategori = $_POST['nama_kategori'];

// Query untuk mengupdate data admin
$query = "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'";

// Eksekusi query
if (mysqli_query($koneksi, $query)) {
    echo "Data kategori berhasil diupdate.";
} else {
    echo "Gagal mengupdate data kategori: " . mysqli_error($koneksi);
}

// Tutup koneksi setelah selesai
mysqli_close($koneksi);
?>
