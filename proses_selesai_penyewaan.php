<?php
require_once 'koneksi.php';

// Proses saat tombol "Selesai" ditekan
if (isset($_GET['selesai_id'])) {
    $selesai_id = $_GET['selesai_id'];

    // Update status penyewaan menjadi "Kembali"
    $querySelesai = "UPDATE penyewaan SET status = 'Kembali' WHERE id_penyewaan = '$selesai_id'";
    if (mysqli_query($koneksi, $querySelesai)) {
        // Mengembalikan stok barang
        $queryPenyewaan = "SELECT id_barang, jumlah FROM penyewaan WHERE id_penyewaan = '$selesai_id'";
        $resultPenyewaan = mysqli_query($koneksi, $queryPenyewaan);
        $rowPenyewaan = mysqli_fetch_assoc($resultPenyewaan);

        $id_barang = $rowPenyewaan['id_barang'];
        $jumlah_dikembalikan = $rowPenyewaan['jumlah'];

        $queryUpdateStok = "UPDATE barang SET stok = stok + '$jumlah_dikembalikan' WHERE id_barang = '$id_barang'";
        mysqli_query($koneksi, $queryUpdateStok);

        echo "<script>alert('Penyewaan telah selesai.'); window.location='tabel_penyewaan.php';</script>";
    } else {
        echo "<script>alert('Gagal menyelesaikan penyewaan. Silakan coba lagi.'); window.location='tabel_penyewaan.php';</script>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
} else {

    header("Location: tabel_penyewaan.php");
}
?>
