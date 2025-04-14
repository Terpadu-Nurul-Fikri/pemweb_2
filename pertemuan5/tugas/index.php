<?php
require_once 'dbkoneksi.php';

// Ambil total masing-masing entitas
$totalPasien = $dbh->query("SELECT COUNT(*) as total FROM pasien")->fetch()['total'];
$totalParamedik = $dbh->query("SELECT COUNT(*) as total FROM paramedik")->fetch()['total'];
$totalPeriksa = $dbh->query("SELECT COUNT(*) as total FROM periksa")->fetch()['total'];
$totalKelurahan = $dbh->query("SELECT COUNT(*) as total FROM kelurahan")->fetch()['total'];
$totalUnitKerja = $dbh->query("SELECT COUNT(*) as total FROM unit_kerja")->fetch()['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <!-- CSS -->
  <link rel="stylesheet" href="assets/adminlte/css/adminlte.min.css">
  <link rel="stylesheet" href="assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/adminlte/plugins/bootstrap/css/bootstrap.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a></li>
      <li class="nav-item d-none d-sm-inline-block"><a href="index.php" class="nav-link">Home</a></li>
    </ul>
  </nav>

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Admin Puskesmas Haza</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">
          <li class="nav-item"><a href="index.php" class="nav-link active"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a></li>
          <li class="nav-item"><a href="pasien/data_pasien.php" class="nav-link"><i class="nav-icon fas fa-user-injured"></i><p>Data Pasien</p></a></li>
          <li class="nav-item"><a href="paramedik/data_paramedik.php" class="nav-link"><i class="nav-icon fas fa-user-md"></i><p>Data Paramedik</p></a></li>
          <li class="nav-item"><a href="periksa/data_periksa.php" class="nav-link"><i class="nav-icon fas fa-notes-medical"></i><p>Data Periksa</p></a></li>
          <li class="nav-item"><a href="kelurahan/data_kelurahan.php" class="nav-link"><i class="nav-icon fas fa-city"></i><p>Data Kelurahan</p></a></li>
          <li class="nav-item"><a href="unit_kerja/data_unit_kerja.php" class="nav-link"><i class="nav-icon fas fa-building"></i><p>Data Unit Kerja</p></a></li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid"><h1>Dashboard</h1></div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <!-- Box Pasien -->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $totalPasien; ?></h3>
                <p>Jumlah Pasien</p>
              </div>
              <div class="icon"><i class="fas fa-users"></i></div>
              <a href="pasien/data_pasien.php" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- Box Paramedik -->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $totalParamedik; ?></h3>
                <p>Jumlah Paramedik</p>
              </div>
              <div class="icon"><i class="fas fa-user-md"></i></div>
              <a href="paramedik/data_paramedik.php" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- Box Periksa -->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $totalPeriksa; ?></h3>
                <p>Total Pemeriksaan</p>
              </div>
              <div class="icon"><i class="fas fa-notes-medical"></i></div>
              <a href="periksa/data_periksa.php" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- Box Kelurahan -->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $totalKelurahan; ?></h3>
                <p>Kelurahan Terdaftar</p>
              </div>
              <div class="icon"><i class="fas fa-city"></i></div>
              <a href="kelurahan/data_kelurahan.php" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- Box Unit Kerja -->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?= $totalUnitKerja; ?></h3>
                <p>Unit Kerja</p>
              </div>
              <div class="icon"><i class="fas fa-building"></i></div>
              <a href="unit_kerja/data_unit_kerja.php" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>

  <!-- Footer -->
  <footer class="main-footer text-center">
    <strong>&copy; <?= date('Y'); ?> Puskesmas Haza.</strong> All rights reserved.
  </footer>

</div>

<!-- Scripts -->
<script src="assets/adminlte/plugins/jquery/jquery.min.js"></script>
<script src="assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/adminlte/js/adminlte.min.js"></script>
</body>
</html>
