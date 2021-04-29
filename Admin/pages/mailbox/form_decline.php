<?php
# mailbox.php
include '../../../library.php';
cekLogin();

$sql = 'SELECT * FROM tertolak';

// Searching
$search = @$_GET['search'];
if (!empty($search)) $sql .= " WHERE nama_instansi LIKE '%$search%' 
                                OR nama_pj LIKE '%$search%' 
                                OR nama_event LIKE '%$search%' 
                                OR tema LIKE '%$search%' 
                                OR email LIKE '%$search%' 
                                OR no_telepon LIKE '%$search%' 
                                OR start_event LIKE '%$search%' 
                                OR end_event LIKE '%$search%'
                                OR rentang_usia LIKE '%$search%'
                                OR jumlah_audiens LIKE '%$search%'";

// mengambil data undangan
$data_undangan = mysqli_query($mysqli, "SELECT * FROM form");
// menghitung data undangan
$jumlah_undangan = mysqli_num_rows($data_undangan);

// mengambil data undangan
$data_tertolak = mysqli_query($mysqli, $sql);
// menghitung data undangan
$jumlah_tertolak = mysqli_num_rows($data_tertolak);

$listTertolak = $mysqli->query($sql);
if (isset($_POST['btn_delete'])) {
    if (isset($_POST['selected'])) {
        foreach ($_POST['selected'] as $selectedid) {

            $deleteData = "DELETE from nama_table WHERE id=" . $selectedid;
            mysqli_query($mysqli, $deleteData);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mailbox</title>
    <link rel="icon" type="image/gif" href="../../../images/logo.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
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
                <div class="row">
                    <div class="col-md-3">
                        <a href="../../index.php" class="btn btn-primary btn-block mb-3">Kembali ke Dashboard</a>

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
                                    <li class="nav-item active">
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
                                        <a href="#" class="nav-link" style="color: dodgerblue;">
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
                        <div class="card">

                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Ditolak</h3>

                                <div class="card-tools">
                                    <form action="form_decline.php" method="get">
                                        <div class="input-group input-group-sm">
                                            <!-- /.btn-group -->
                                            <button type="submit" value="Refresh Page" class="btn btn-default btn-sm" onClick="document.location.reload(true)">
                                                <i class="fas fa-sync-alt"></i>
                                            </button>
                                            <input type="text" class="form-control" name="search" value="<?= @$search ?>" placeholder="Cari Ditolak">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="mailbox-controls">
                                    <div class="table-responsive mailbox-messages">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <th></th>
                                                <th>Nama Instansi - Penanggungjawab</th>
                                                <th>Nama Event</th>
                                                <th>Mulai Acara</th>
                                                <th>Akhir Acara</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $batas = 10;
                                                $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                                $previous = $halaman - 1;
                                                $next = $halaman + 1;

                                                $jumlah_data = mysqli_num_rows($data_tertolak);
                                                $total_halaman = ceil($jumlah_data / $batas);

                                                $data = mysqli_query($mysqli, $sql . " ORDER BY start_event DESC limit $halaman_awal, $batas");
                                                $nomor = $halaman_awal + 1;
                                                $no = 0;
                                                while ($tertolak = mysqli_fetch_array($data)) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <a href="deletedecline.php?id=<?php echo $tertolak['id']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="link">
                                                                <i class="far fa-trash-alt"></i>
                                                            </a>
                                                        </td>
                                                        <td class="mailbox-subject"><b><?= $tertolak['nama_instansi'] ?></b> - <?= $tertolak['nama_pj'] ?>
                                                        <td class="mailbox-name">
                                                            <a href="readdecline.php?id=<?= $tertolak['id']; ?>">
                                                                <?= $tertolak['nama_event'] ?>
                                                            </a>
                                                        </td>
                                                        <td class="mailbox-date"><?= $tertolak['start_event'] ?></td>
                                                        <td class="mailbox-date"><?= $tertolak['end_event'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <!-- /.table -->
                                        <br>
                                        <nav>
                                            <ul class="pagination justify-content-center">
                                                <li class="page-item">
                                                    <a class="page-link" <?php if ($halaman > 1) {
                                                                                echo "href='?halaman=$previous'";
                                                                            } ?>>Sebelumnya</a>
                                                </li>
                                                <?php
                                                for ($x = 1; $x <= $total_halaman; $x++) {
                                                ?>
                                                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                                <?php
                                                }
                                                ?>
                                                <li class="page-item">
                                                    <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                                                echo "href='?halaman=$next'";
                                                                            } ?>>Berikutnya</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- /.mail-box-messages -->
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
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