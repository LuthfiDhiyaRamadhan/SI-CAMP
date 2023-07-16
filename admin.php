<?php
require 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Potong kompas II</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Potong Kompas II</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Dash</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard Admin
                            </a>
                            <div class="sb-sidenav-menu-heading">Master Data</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Form
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Data Admin</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Data Pelanggan</a>
                                    <a class="nav-link" href="layout-static.html">Data Barang</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Data Kategori</a>
                                </nav>
                            </div>
                            
                            <div class="sb-sidenav-menu-heading">Transaksi</div>
                            <a class="nav-link" href="penyewaan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Penyewaan
                            </a>
                            <a class="nav-link" href="tabel_penyewaan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Laporan 
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Barang</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">List Data Admin</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Form Input Data Admin
                                <form action="proses_input_admin.php" method="POST">
                                    <div class="form-group">
                                        <label for="id_barang">ID Admin</label>
                                        <input type="text" class="form-control" id="id_admin" name="id_admin" required>
                                    </div>
                                        <div class="form-group">
                                            <label for="nama_admin">Nama Admin</label>
                                            <input type="text" class="form-control" id="nama_admin" name="nama_admin" required>
                                        </div>
                                         <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" required>
                                         </div>
                                         <div class="form-group">
                                            <label for="password">Password</label>
                                           <input type="password" class="form-control" id="password" name="password" required>
                                         </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                                <div class="card mb-4">
                                    <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                     DataTable Example
                                    </div>
                                        <div class="card-body">
                                            <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID Admin</th>
                                                    <th>Nama Admin</th>
                                                    <th>Username</th>
                                                    <th>Password</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                 $query = "SELECT * FROM admin";
                                                 $result = mysqli_query($koneksi, $query);
                                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                                        <tr>
                                                         <td><?php echo $row['id_admin']; ?></td>
                                                         <td><?php echo $row['nama_admin']; ?></td>
                                                         <td><?php echo $row['username']; ?></td>
                                                         <td><?php echo $row['password']; ?></td>
                                                            <td>
                                                                <a href="edit_admin.php?id_admin=<?php echo $row['id_admin']; ?>" class="btn btn-primary">Edit</a>
                                                                <a href="hapus_admin.php?id_admin=<?php echo $row['id_admin']; ?>" class="btn btn-danger">Hapus</a>
                                                            </td>
                                                        </tr>
                                                <?php } ?>
                                            </tbody>
                                            </table>
                                        </div>
                                </div>
                        </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script>
            function setHargaBarang() {
                var selectedBarang = document.getElementById("nama_barang").value.split("|");
                var hargaBarang = parseFloat(selectedBarang[1]);
                document.getElementById("harga_barang").value = hargaBarang.toFixed(2);
                hitungTotalBayar();
            }
            function hitungTotalBayar() {
                var hargaBarang = parseFloat(document.getElementById("harga_barang").value);
                var jumlah = parseFloat(document.getElementById("jumlah").value);
                var durasi = parseFloat(document.getElementById("durasi").value);
                var totalBayar = hargaBarang * jumlah * durasi;
                document.getElementById("total_bayar").value = totalBayar.toFixed(2);
            }
        </script>
    </body>
</html>
