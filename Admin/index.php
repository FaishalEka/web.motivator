<?php
// menghubungkan dengan koneksi database
include 'library.php';

// mengambil data barang
$data_undangan = mysqli_query($mysqli,"SELECT * FROM form");
// mengambil data barang
$data_terkonfirmasi = mysqli_query($mysqli,"SELECT * FROM terkonfirmasi");

// menghitung data barang
$jumlah_undangan = mysqli_num_rows($data_undangan);
// menghitung data barang
$jumlah_terkonfirmasi = mysqli_num_rows($data_terkonfirmasi);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
            <!-- navbar sebelah kanan -->
            <ul class="navbar-nav ml-auto">
                <!-- Search -->
                <li class="nav-item">
                    <!-- logo kaca pembesar -->
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <!-- kolom search -->
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <!-- buat fullscreen -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Logo -->
            <a href="index.php" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Asep Grenade</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Gambar/Profil Admin -->
                <!-- Gambar/Profil Admin -->
                <ul class="nav nav-pills nav-sidebar flex-column mt-2" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <img src="dist/img/user2-160x160.jpg" class="nav-icon far img-circle">
                            <p>
                                Agus Phoenix
                                <i class="fas fa-angle-right right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="../pages/mailbox/mailbox.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Log Out</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                        <!-- Tombol Dashboard -->
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
                            <a href="pages/calendar/" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Calendar
                                    <span class="badge badge-info right">20</span>
                                </p>
                            </a>
                        </li>
                        <!-- Tombol Mailbox -->
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.php" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    History
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
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1">
                                    <img src="../images/invite.png" width="70px" height="64px" border-radius="20px" alt="">
                                </span>
                                <div class="info-box-content">
                                <a href="pages/mailbox/mailbox.php" style="color:white;">
                                    <span class="info-box-text">Event</span>
                                    <span class="info-box-number"><?= $jumlah_terkonfirmasi ?></span>
                                </a>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1">
                                    <i class="fas fa-users"></i>
                                </span>
                                <div class="info-box-content">
                                    <a href="pages/mailbox/mailbox.php" style="color:white;">
                                    <span class="info-box-text">Invitation</span>
                                    <span class="info-box-number"><?= $jumlah_undangan ?></span>
                                    </a>                                    
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
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
                <b>Version</b> 0.0.1
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