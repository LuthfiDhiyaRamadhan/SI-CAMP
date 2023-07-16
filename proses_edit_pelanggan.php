<?php
require 'koneksi.php';

// Mendapatkan data yang dikirim melalui form
$id_pelanggan = $_POST['id_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];

// Query untuk melakukan pembaruan data admin
$query = "UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', no_hp='$no_hp', alamat='$alamat' WHERE id_pelanggan='$id_pelanggan'";
    
// Eksekusi query
if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data Pelanggan berhasil diperbarui.');</script>";
    echo "<script>window.location.href = 'pelanggan.php';</script>";
} else {
    echo "<script>alert('Gagal memperbarui data Pelanggan: " . mysqli_error($koneksi) . "');</script>";
    echo "<script>window.history.back();</script>";
}

// Tutup koneksi setelah selesai
mysqli_close($koneksi);
?>
