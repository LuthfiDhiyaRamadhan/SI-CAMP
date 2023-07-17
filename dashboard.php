<?php
require 'koneksi.php';

// Menghitung Jumlah Transaksi
$queryTransaksi = "SELECT COUNT(*) AS jumlah_transaksi FROM penyewaan";
$resultTransaksi = mysqli_query($koneksi, $queryTransaksi);
$rowTransaksi = mysqli_fetch_assoc($resultTransaksi);
$jumlahTransaksi = $rowTransaksi['jumlah_transaksi'];

// Menghitung Status Dipinjam
$queryDipinjam = "SELECT COUNT(*) AS status_dipinjam FROM penyewaan WHERE status = 'Dipinjam'";
$resultDipinjam = mysqli_query($koneksi, $queryDipinjam);
$rowDipinjam = mysqli_fetch_assoc($resultDipinjam);
$statusDipinjam = $rowDipinjam['status_dipinjam'];

// Menghitung Status Kembali
$queryKembali = "SELECT COUNT(*) AS status_kembali FROM penyewaan WHERE status = 'Kembali'";
$resultKembali = mysqli_query($koneksi, $queryKembali);
$rowKembali = mysqli_fetch_assoc($resultKembali);
$statusKembali = $rowKembali['status_kembali'];

// Menghitung Jumlah Barang
$queryJumlahBarang = "SELECT COUNT(*) AS jumlah_barang FROM barang";
$resultJumlahBarang = mysqli_query($koneksi, $queryJumlahBarang);
$rowJumlahBarang = mysqli_fetch_assoc($resultJumlahBarang);
$jumlahBarang = $rowJumlahBarang['jumlah_barang'];
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
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="login.php">Logout</a></li>
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
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Master Data</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Form
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="admin.php">Data Admin</a>
                                    <a class="nav-link" href="pelanggan.php">Data Pelanggan</a>
                                    <a class="nav-link" href="barang.php">Data Barang</a>
                                    <a class="nav-link" href="kategori.php">Data Kategori</a>
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
                        <h1 class="mt-4">Dashboard Admin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah Transaksi</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <h3><?php echo $jumlahTransaksi; ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Status Kembali</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <h3><?php echo $statusKembali; ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Status Dipinjam</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <h3><?php echo $statusDipinjam; ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Jumlah Barang</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <h3><?php echo $jumlahBarang; ?></h3>
                                 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
