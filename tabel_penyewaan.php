<?php
require_once 'koneksi.php';

$sql_admin = "SELECT id_admin, nama_admin FROM admin";
$result_admin = mysqli_query($koneksi, $sql_admin);

$sql_pelanggan = "SELECT id_pelanggan, nama_pelanggan FROM pelanggan";
$result_pelanggan = mysqli_query($koneksi, $sql_pelanggan);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Potong Kompas II</title>
    <link href="css/styles.css" rel="stylesheet">
    <!-- Add these lines to handle possible conflicts -->
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/searchbuilder/1.2.0/css/searchBuilder.bootstrap5.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <!-- The rest of your code -->
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
                        <h1 class="mt-4">Laporan Penyewaan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Status Penyewaan</li>
                        </ol>
    <div class="card-body">
        <table id="datatablesSimple" >
            <thead>
                <tr>
                    <th>ID Penyewaan</th>
                    <th>Nama Admin</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Sewa</th>
                    <th>Tanggal Kembali</th>
                    <th>Durasi</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID Penyewaan</th>
                    <th>Nama Admin</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Sewa</th>
                    <th>Tanggal Kembali</th>
                    <th>Durasi</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
            <?php
                                $queryTabelPenyewaan = "SELECT p.id_penyewaann, a.nama_admin, pl.nama_pelanggan, b.nama_barang, p.harga_barang, p.jumlah, p.tanggal_sewa, p.tanggal_kembali, p.durasi, p.total_bayar, p.status
                                FROM penyewaan2 p
                                JOIN admin a ON p.id_admin = a.id_admin
                                JOIN pelanggan pl ON p.id_pelanggan = pl.id_pelanggan
                                JOIN barang b ON p.id_barang = b.id_barang";
                                $resultTabelPenyewaan = mysqli_query($koneksi, $queryTabelPenyewaan);

                                while ($rowPenyewaan = mysqli_fetch_assoc($resultTabelPenyewaan)) {
                                    echo "<tr>";
                                    echo "<td>" . $rowPenyewaan['id_penyewaann'] . "</td>";
                                    echo "<td>" . $rowPenyewaan['nama_admin'] . "</td>";
                                    echo "<td>" . $rowPenyewaan['nama_pelanggan'] . "</td>";
                                    echo "<td>" . $rowPenyewaan['nama_barang'] . "</td>";
                                    echo "<td>" . $rowPenyewaan['harga_barang'] . "</td>";
                                    echo "<td>" . $rowPenyewaan['jumlah'] . "</td>";
                                    echo "<td>" . $rowPenyewaan['tanggal_sewa'] . "</td>";
                                    echo "<td>" . $rowPenyewaan['tanggal_kembali'] . "</td>";
                                    echo "<td>" . $rowPenyewaan['durasi'] . "</td>";
                                    echo "<td>" . $rowPenyewaan['total_bayar'] . "</td>";
                                    echo "<td>";
                                    if ($rowPenyewaan['status'] === 'dipinjam') {
                                        echo "<span class='badge bg-danger'>Dipinjam</span>";
                                    } else {
                                        echo "<span class='badge bg-success'>Kembali</span>";
                                    }
                                    echo "</td>";
                                    echo "<td>";
                                    if ($rowPenyewaan['status'] === 'dipinjam') {
                                        echo "<a href='proses_selesai_penyewaan.php?selesai_id=" . $rowPenyewaan['id_penyewaann'] . "' class='btn btn-primary'>Selesai</a>";
                                    } else {
                                        echo "<button class='btn btn-success' disabled>Sudah Selesai</button>";
                                    }
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
            </tbody>
        </table>
    </div>
                    </div>
            </main>
    <!-- Add these lines for datatable and search scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatablesSimple').DataTable({
                searchBuilder: true // Add this option to enable SearchBuilder
            });
        });
    </script>
</body>
</html>
