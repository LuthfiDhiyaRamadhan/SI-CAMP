<?php
       require 'koneksi.php';
        // Tangkap data dari form input barang
        $id_kategori = $_POST['id_kategori'];
        $nama_kategori = $_POST['nama_kategori'];
        
        // Query untuk menyimpan data barang ke dalam database
        $query = "INSERT INTO kategori (id_kategori,nama_kategori) 
                  VALUES ('$id_kategori','$nama_kategori')";

        // Eksekusi query
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Data kategori berhasil disimpan.'); window.location='kategori.php';</script>";
        } else {
            echo "<div class='alert alert-danger'>Gagal menyimpan Data Kategori: " . mysqli_error($koneksi) . "</div>";
        }

        // Tutup koneksi setelah selesai
        mysqli_close($koneksi);
        ?>
        