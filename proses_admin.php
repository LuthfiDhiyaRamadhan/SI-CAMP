<?php

// Ambil aksi yang dikirim melalui metode GET atau POST
$aksi = $_REQUEST['aksi'];

// Proses aksi sesuai permintaan
if ($aksi == 'tambah') {
    // Ambil data yang dikirim melalui metode POST
    $nama_admin = $_POST['nama_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk menyimpan data admin ke dalam database
    $query = "INSERT INTO admin (nama_admin, username, password) VALUES ('$nama_admin', '$username', '$password')";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        echo "Data admin berhasil disimpan.";
    } else {
        echo "Gagal menyimpan data admin: " . mysqli_error($koneksi);
    }
} elseif ($aksi == 'edit') {
    // Ambil data yang dikirim melalui metode POST
    $id_admin = $_POST['id_admin'];
    $nama_admin = $_POST['nama_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mengupdate data admin
    $query = "UPDATE admin SET nama_admin='$nama_admin', username='$username', password='$password' WHERE id_admin='$id_admin'";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        echo "Data admin berhasil diupdate.";
    } else {
        echo "Gagal mengupdate data admin: " . mysqli_error($koneksi);
    }
} elseif ($aksi == 'hapus') {
    // Ambil data yang dikirim melalui metode GET
    $id_admin = $_GET['id_admin'];

    // Query untuk menghapus data admin
    $query = "DELETE FROM admin WHERE id_admin='$id_admin'";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        echo "Data admin berhasil dihapus.";
    } else {
        echo "Gagal menghapus data admin: " . mysqli_error($koneksi);
    }
}

// Tutup koneksi setelah selesai
mysqli_close($koneksi);
?>
