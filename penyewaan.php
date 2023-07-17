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
                        <h1 class="mt-4">Form Penyewaan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Input Penyewaaan</li>
                        </ol>
                        <div class="card mb-4">
                        <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                <form method="POST" action="proses_input_penyewaan.php">
                                    <div class="form-group">
                                        <label for="id_admin">ID Admin:</label>
                                        <select class="form-control" id="id_admin" name="id_admin" required>
                                            <?php while ($row_admin = mysqli_fetch_assoc($result_admin)) { ?>
                                            <option value="<?php echo $row_admin['id_admin']; ?>"><?php echo $row_admin['nama_admin']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_pelanggan">Nama Pelanggan:</label>
                                        <select class="form-control" id="id_pelanggan" name="id_pelanggan" required>
                                            <?php while ($row_pelanggan = mysqli_fetch_assoc($result_pelanggan)) { ?>
                                            <option value="<?php echo $row_pelanggan['id_pelanggan']; ?>"><?php echo $row_pelanggan['nama_pelanggan']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_barang">Nama Barang</label>
                                        <select class="form-control" id="nama_barang" name="nama_barang" required onchange="setHargaBarang()">
                                        <option value="">Pilih Barang</option>
                                        <?php
                                        $queryBarang = "SELECT id_barang, nama_barang, harga_sewa FROM barang";
                                        $resultBarang = mysqli_query($koneksi, $queryBarang);
                                        while ($row = mysqli_fetch_assoc($resultBarang)) {
                                            echo "<option value='" . $row['id_barang'] . "|" . $row['harga_sewa'] . "'>" . $row['nama_barang'] . "</option>";
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_barang">Harga Barang</label>
                                        <input type="text" class="form-control" id="harga_barang" name="harga_barang" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah</label>
                                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_sewa">Tanggal Sewa</label>
                                        <input type="date" class="form-control" id="tanggal_sewa" name="tanggal_sewa" required onchange="hitungTotalBayar()" />
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_kembali">Tanggal Kembali</label>
                                        <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required onchange="hitungTotalBayar()" />
                                    </div>
                                    <div class="form-group">
                                        <label for="durasi">Durasi (hari)</label>
                                        <input type="number" class="form-control" id="durasi" name="durasi" required onchange="hitungTotalBayar()" />
                                    </div>
                                    <div class="form-group">
                                        <label for="total_bayar">Total Bayar</label>
                                        <input type="text" class="form-control" id="total_bayar" name="total_bayar" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <input type="text" class="form-control" id="status" name="status" value="Dipinjam" readonly>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
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
                var tanggalSewa = new Date(document.getElementById("tanggal_sewa").value);
                var tanggalKembali = new Date(document.getElementById("tanggal_kembali").value);
                var durasi = (tanggalKembali - tanggalSewa) / (1000 * 60 * 60 * 24); // Convert milliseconds to days
                var totalBayar = hargaBarang * jumlah * durasi;
                document.getElementById("durasi").value = durasi;
                document.getElementById("total_bayar").value = totalBayar.toFixed(2);
            }
        </script>
    </body>
</html>
