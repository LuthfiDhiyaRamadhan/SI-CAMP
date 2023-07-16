<?php
require 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Proses Input Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Proses Input Kategori</h1>
        <?php
       
        // Tangkap data dari form input barang
        $id_kategori = $_POST['id_kategori'];
        $nama_kategori = $_POST['nama_kategori'];
        
        // Query untuk menyimpan data barang ke dalam database
        $query = "INSERT INTO kategori (id_kategori,nama_kategori) 
                  VALUES ('$id_kategori','$nama_kategori')";

        // Eksekusi query
        if (mysqli_query($koneksi, $query)) {
            echo "<div class='alert alert-success'>Data Kategori berhasil disimpan.</div>";
        } else {
            echo "<div class='alert alert-danger'>Gagal menyimpan data kategori: " . mysqli_error($koneksi) . "</div>";
        }

        // Tutup koneksi setelah selesai
        mysqli_close($koneksi);
        ?>
        <a href="kategori.php" class="btn btn-primary">Kembali ke Form Input Kategori</a>
    </div>
</body>
</html>
