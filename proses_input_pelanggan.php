<?php
require 'koneksi.php';

// Tangkap data dari form input barang
$id_pelanggan = $_POST['id_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];

// Query untuk menyimpan data admin ke dalam database
$query = "INSERT into  pelanggan (id_pelanggan, nama_pelanggan, no_hp, alamat) VALUES ('$id_pelanggan', '$nama_pelanggan', '$no_hp', '$alamat')";

// Eksekusi query
if(mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data pelanggan berhasil disimpan.'); window.location='pelanggan.php';</script>";
} else {
    echo "<div class='alert alert-danger'>Gagal menyimpan data pelanggan: " . mysqli_error($koneksi) . "</div>";
}

// Tutup koneksi setelah selesai
mysqli_close($koneksi);
?>
?>