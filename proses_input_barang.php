<?php
require 'koneksi.php';

// Tangkap data dari form input barang
$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$id_kategori = $_POST['id_kategori'];
$harga_sewa = $_POST['harga_sewa'];
$stok = $_POST['stok'];
$spesifikasi = $_POST['spesifikasi'];

// Ambil nama kategori berdasarkan id_kategori
$queryKategori = "SELECT nama_kategori FROM kategori WHERE id_kategori = '$id_kategori'";
$resultKategori = mysqli_query($koneksi, $queryKategori);
$kategori = mysqli_fetch_assoc($resultKategori);
$nama_kategori = $kategori['nama_kategori'];

// Query untuk menyimpan data barang ke dalam database
$query = "INSERT INTO barang (id_barang, nama_barang, id_kategori, harga_sewa, stok, spesifikasi) 
          VALUES ('$id_barang', '$nama_barang', '$id_kategori', '$harga_sewa', '$stok', '$spesifikasi')";

// Eksekusi query
if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data barang berhasil disimpan.'); window.location='barang.php';</script>";
} else {
    echo "<div class='alert alert-danger'>Gagal menyimpan data barang: " . mysqli_error($koneksi) . "</div>";
}

// Tutup koneksi setelah selesai
mysqli_close($koneksi);
?>
