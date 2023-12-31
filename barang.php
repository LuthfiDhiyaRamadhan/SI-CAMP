<?php
require 'koneksi.php';

// Mengambil daftar kategori
$queryKategori = "SELECT * FROM kategori";
$resultKategori = mysqli_query($koneksi, $queryKategori);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
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
                        <h1 class="mt-4">Data Barang</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">List Data Barang</li>
                        </ol>
                                <div class="card mb-4">
                                <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Form Input Data Barang
                                <form method="POST" action="proses_input_barang.php">
                                <div class="form-group">
                <label for="id_barang">ID Barang</label>
                <input type="text" class="form-control" id="id_barang" name="id_barang" required>
            </div>
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
            </div>
            <div class="form-group">
                <label for="id_kategori">Kategori</label>
                <select class="form-control" id="id_kategori" name="id_kategori" required>
                <option value="">Pilih Barang</option>
                    <?php while ($rowKategori = mysqli_fetch_assoc($resultKategori)) { ?>
                        <option value="<?php echo $rowKategori['id_kategori']; ?>">
                            <?php echo $rowKategori['nama_kategori']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="harga_sewa">Harga Sewa</label>
                <input type="text" class="form-control" id="harga_sewa" name="harga_sewa" required>
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" required>
            </div>
            <div class="form-group">
                <label for="spesifikasi">Spesifikasi</label>
                <textarea class="form-control" id="spesifikasi" name="spesifikasi" required></textarea>
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
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Sewa</th>
                    <th>Stok</th>
                    <th>Spesifikasi</th>
                    <th>Aksi</th>
                </tr>
            </thead> 
            <tbody>
                <?php 
                $query = "SELECT barang.id_barang, barang.nama_barang, kategori.nama_kategori, barang.harga_sewa, barang.stok, barang.spesifikasi 
                FROM barang
                INNER JOIN kategori ON barang.id_kategori = kategori.id_kategori";
                $result = mysqli_query($koneksi, $query);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id_barang']; ?></td>
                        <td><?php echo $row['nama_barang']; ?></td>
                        <td><?php echo $row['nama_kategori']; ?></td>
                        <td><?php echo $row['harga_sewa']; ?></td>
                        <td><?php echo $row['stok']; ?></td>
                        <td><?php echo $row['spesifikasi']; ?></td>
                        <td>
                            <a href="edit_barang.php?id_barang=<?php echo $row['id_barang']; ?>" class="btn btn-primary">Edit</a>
                            <a href="hapus_barang.php?id_barang=<?php echo $row['id_barang']; ?>" class="btn btn-danger">Hapus</a>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>