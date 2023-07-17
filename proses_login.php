<?php
require 'koneksi.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa kecocokan username dan password
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);
    $admin = mysqli_fetch_assoc($result);

    // Memeriksa hasil query
    if ($admin) {
        // Jika username dan password cocok, simpan data admin ke session
        session_start();
        $_SESSION['id_admin'] = $admin['id_admin'];
        $_SESSION['nama_admin'] = $admin['nama_admin'];

        // Redirect ke halaman dashboard atau halaman lain yang diinginkan
        header("Location: dashboard.php");
        exit();
    } else {
        // Jika username dan password tidak cocok, tampilkan pesan error
        echo "<div class='alert alert-danger'>Username atau password salah.</div>";
    }
}

// Tutup koneksi setelah selesai
mysqli_close($koneksi);
?>
