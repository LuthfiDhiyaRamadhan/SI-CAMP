<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from the form
    $id_admin = $_POST['id_admin'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_barang = explode("|", $_POST['nama_barang'])[0]; // Extracting the id_barang from the select option value
    $harga_barang = $_POST['harga_barang'];
    $jumlah = $_POST['jumlah'];
    $tanggal_sewa = $_POST['tanggal_sewa'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $durasi = $_POST['durasi'];
    $total_bayar = $_POST['total_bayar'];

    // Check if the selected item is available in sufficient stock
    $queryCheckStock = "SELECT stok FROM barang WHERE id_barang = '$id_barang'";
    $resultCheckStock = mysqli_query($koneksi, $queryCheckStock);
    $rowStock = mysqli_fetch_assoc($resultCheckStock);
    $stokBarang = $rowStock['stok'];

    if ($stokBarang >= $jumlah) {
        // Insert data into the database
        $sql = "INSERT INTO penyewaan2 (id_admin, id_pelanggan, id_barang, harga_barang, jumlah, tanggal_sewa, tanggal_kembali, durasi, total_bayar, status)
                VALUES ('$id_admin', '$id_pelanggan', '$id_barang', '$harga_barang', '$jumlah', '$tanggal_sewa', '$tanggal_kembali', '$durasi', '$total_bayar', 'dipinjam')";

        if (mysqli_query($koneksi, $sql)) {
            // Update stock of the rented item
            $newStock = $stokBarang - $jumlah;
            $updateQuery = "UPDATE barang SET stok = '$newStock' WHERE id_barang = '$id_barang'";
            mysqli_query($koneksi, $updateQuery);

            // Data inserted and stock updated successfully
            echo "<script>alert('Data penyewaan berhasil disimpan.'); window.location='index.html';</script>";
        } else {
            // Error in inserting data
            echo "<script>alert('Gagal menyimpan data penyewaan. Silakan coba lagi.'); window.location='index.html';</script>";
        }
    } else {
        // Insufficient stock for the selected item
        echo "<script>alert('Stok barang tidak mencukupi. Silakan pilih jumlah yang lebih kecil.'); window.location='index.html';</script>";
    }
} else {
    // If the form is not submitted, redirect back to the form page
    header("Location: index.html");
}
?>
