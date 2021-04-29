<?php
# readmail.php
include '../../../library.php';
cekLogin();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tertolak WHERE id = " . $id;
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        $tertolak = $result->fetch_array();
    } else {
        exit("ID Tidak ditemukan.");
    }
} else {
    exit("ID Tidak ditemukan");
}

// mengambil data undangan
$data_undangan = mysqli_query($mysqli, 'SELECT * FROM form');
// menghitung data undangan
$jumlah_undangan = mysqli_num_rows($data_undangan);

$url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Read Declined Mail</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Lambang Garis 3/Navbar -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link navbar-nav nav-item" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Logo -->
            <a href="index.php" class="brand-link">
                <img src="../../../images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
                            <a href="../../../logout.php" class="nav-link d-block">
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <!-- Tombol Calendar -->
                        <li class="nav-item">
                            <a href="../../pages/calendar" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Kalender
                                </p>
                            </a>
                        </li>
                        <!-- Tombol Mailbox -->
                        <li class="nav-item menu-open">
                            <a href="../../pages/mailbox/mailbox.php" class="nav-link active">
                                <i class="nav-icon far fa-copy"></i>
                                <p>
                                    Data
                                </p>
                            </a>
                        </li>
                        <!-- Tombol Edit -->
                        <li class="nav-item">
                            <a href="../edit/" class="nav-link">
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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-left">
                                <li class="breadcrumb-item active">Data</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="<?= $url ?>" class="btn btn-primary btn-block mb-3">Kembali</a>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Pilihan</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <ul class="nav nav-pills flex-column">
                                        <li class="nav-item">
                                            <a href="mailbox.php" class="nav-link">
                                                <i class="fas fa-envelope"></i> Undangan
                                                <span class="badge bg-primary float-right"><?= $jumlah_undangan ?></span>
                                            </a>
                                        <li class="nav-item">
                                            <a href="terkonfirmasi.php" class="nav-link">
                                                <i class="fa fa-calendar-check"></i> Disetujui
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="form_decline.php" class="nav-link" style="color: dodgerblue;">
                                                <i class="fa fa-calendar-times"></i> Ditolak
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="overdue.php" class="nav-link">
                                                <i class="fa fa-clock"></i> Riwayat
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Rincian Data</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="mailbox-read-message">
                                        <p>
                                        <h3>
                                            <td class="mailbox-subject"><b><?= $tertolak['nama_event'] ?> | <b><?= $tertolak['tema'] ?>
                                        </h3>
                                        <h5>
                                            <td class="mailbox-subject">From: <?= $tertolak['nama_instansi'] ?>
                                        </h5>
                                        </p>
                                        <table>
                                            <tr>
                                                <td class="mailbox-subject">PIC</td>
                                                <td>:</td>
                                                <td><?= $tertolak['nama_pj'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="mailbox-subject">Email</td>
                                                <td>:</td>
                                                <td><?= $tertolak['email'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="mailbox-subject">No. Telepon</td>
                                                <td>:</td>
                                                <td><?= $tertolak['no_telepon'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="mailbox-subject">Rentang Usia</td>
                                                <td>:</td>
                                                <td><?= $tertolak['rentang_usia'] ?> Tahun</td>
                                            </tr>
                                            <tr>
                                                <td class="mailbox-subject">Jumlah Audiens</td>
                                                <td>:</td>
                                                <td><?= $tertolak['jumlah_audiens'] ?> Orang</td>
                                            </tr>
                                            <tr>
                                                <td class="mailbox-subject">Tanggal Pelaksanaan</td>
                                                <td>:</td>
                                                <td><?= $tertolak['start_event'] ?> - <?= $tertolak['end_event'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="../../pdf/<?= $tertolak['file'] ?>" target="_blank">Lihat Surat Undangan</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- /.mailbox-read-message -->
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>&copy; 2021 <a href="https://inovindo.co.id/">PT INOVINDO DIGITAL MEDIA</a>.</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Versi</b> 0.0.1
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            //Enable check and uncheck all functionality
            $('.checkbox-toggle').click(function() {
                var clicks = $(this).data('clicks')
                if (clicks) {
                    //Uncheck all checkboxes
                    $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
                    $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
                } else {
                    //Check all checkboxes
                    $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
                    $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
                }
                $(this).data('clicks', !clicks)
            })

            //Handle starring for font awesome
            $('.mailbox-star').click(function(e) {
                e.preventDefault()
                //detect type
                var $this = $(this).find('a > i')
                var fa = $this.hasClass('fa')

                //Switch states
                if (fa) {
                    $this.toggleClass('fa-star')
                    $this.toggleClass('fa-star-o')
                }
            })
        })
    </script>
</body>

</html>