<?php
// menghubungkan dengan koneksi database
include '../library.php';

cekLogin();

// mengambil data undangan
$data_undangan = mysqli_query($mysqli, "SELECT * FROM form");
// mengambil data terkonfirmasi
$data_terkonfirmasi = mysqli_query($mysqli, "SELECT * FROM terkonfirmasi");
// mengambil data riwayat
$data_riwayat = mysqli_query($mysqli, "SELECT * FROM riwayat");

// menghitung data undangan
$jumlah_undangan = mysqli_num_rows($data_undangan);
// menghitung data terkonfirmasi
$jumlah_terkonfirmasi = mysqli_num_rows($data_terkonfirmasi);
// menghitung data riwayat
$jumlah_riwayat = mysqli_num_rows($data_riwayat);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" type="image/gif" href="../images/logo.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Loading Animasi -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Lambang Garis 3/Navbar -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link navbar-nav nav-item" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Logo -->
            <a href="index.php" class="brand-link">
                <img src="../images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <!-- Untuk menampilkan nama email yang login -->
                <?php
                if (@$_SESSION['email']) {
                    $admin_login = @$_SESSION['email'];
                }
                ?>
                <span class="brand-text font-weight-light"><?= $admin_login; ?></span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                        <!-- Tombol Dashboard -->
                        <li class="nav-item user-panel mt-1 pb-1 mb-1 d-flex">
                            <a href="../logout.php" class="nav-link d-block">
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="./index.php" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <!-- Tombol Calendar -->
                        <li class="nav-item">
                            <a href="pages/calendar" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Kalender
                                </p>
                            </a>
                        </li>
                        <!-- Tombol Mailbox -->
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.php" class="nav-link">
                                <i class="nav-icon far fa-copy"></i>
                                <p>
                                    Data
                                </p>
                            </a>
                        </li>
                        <!-- Tombol Edit -->
                        <li class="nav-item">
                            <a href="pages/edit/" class="nav-link">
                                <i class="nav-icon fas fa-pencil-alt"></i>
                                <p>
                                    Edit
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-left">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <a href="pages/mailbox/terkonfirmasi.php" style="color:white;">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-danger elevation-1">
                                        <i class="fas fa-calendar"></i>
                                    </span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Acara</span>
                                        <span class="info-box-number"><?= $jumlah_terkonfirmasi ?></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </a>
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <a href="pages/mailbox/mailbox.php" style="color:white;">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-warning elevation-1">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Undangan</span>
                                        <span class="info-box-number"><?= $jumlah_undangan ?></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </a>
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <a href="pages/mailbox/overdue.php" style="color:white;">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-success elevation-1">
                                        <i class="fas fa-clock"></i>
                                    </span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Riwayat</span>
                                        <span class="info-box-number"><?= $jumlah_riwayat ?></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>&copy; 2021 <a href="https://inovindo.co.id/">PT INOVINDO DIGITAL MEDIA</a>.</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Versi</b> 0.0.1
            </div>
        </footer>
    </div>

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
</body>

</html>