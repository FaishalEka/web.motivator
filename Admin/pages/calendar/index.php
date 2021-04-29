<?php
// menghubungkan dengan koneksi database
include '../../../library.php';
cekLogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calendar</title>
    <link rel="icon" type="image/gif" href="../../../images/logo.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="../assets/fullcalendar.css">
    <link rel="stylesheet" href="../assets/bootstrap.css">
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
                        <li class="nav-item menu-open">
                            <a href="../../pages/calendar.php" class="nav-link active">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Kalender
                                </p>
                            </a>
                        </li>
                        <!-- Tombol Mailbox -->
                        <li class="nav-item">
                            <a href="../../pages/mailbox/mailbox.php" class="nav-link">
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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-left">
                                <li class="breadcrumb-item active">Kalender</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-7" style="margin: 0 auto;">
                            <div class="card card-primary">
                                <!-- THE CALENDAR -->
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
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
    <!-- FULLCALENDAR -->
    <script src="../assets/jquery.min.js"></script>
    <script src="../assets/jquery-ui.min.js"></script>
    <script src="../assets/moment.min.js"></script>
    <script src="../assets/fullcalendar.min.js"></script>




    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(document).ready(function() {
            var calendar = $('#calendar').fullCalendar({
                // izinkan tabel bisa diedit
                editable: true,
                // atur header kalender
                header: {
                    left: 'prev, next, today',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay'
                },
                // tampilkan data dari database
                events: 'tampil.php',
                // izinkan tabel/kalender bisa dipilih/edit
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {
                    // tampilkan pesan input
                    var title = prompt("Masukkan Nama Event: ");
                    if (title) {
                        // tampung tanggal yang dipilih ke dalam variabel start dan end
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                        // perintah ajax untuk simpan data
                        $.ajax({
                            url: "simpan.php",
                            type: "POST",
                            data: {
                                title: title,
                                start: start,
                                end: end
                            },
                            success: function() {
                                // jika simpan sukses, kalender akan direfresh dan menampilkan pesan sukses
                                calendar.fullCalendar('refetchEvents');
                                alert('Jadwal sukses disimpan!');
                            }
                        });
                    }
                },
                // event ketika judul kegiatan diseret
                eventDrop: function(event) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    // perintah ajax untuk simpan data
                    $.ajax({
                        url: "ubah.php",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id
                        },
                        success: function() {
                            // jika simpan sukses, kalender akan direfresh dan menampilkan pesan sukses
                            calendar.fullCalendar('refetchEvents');
                            alert('Jadwal sukses dirubah!');
                        }
                    });
                },
                // event ketika judul kegiatan diklik
                eventClick: function(event) {
                    if (confirm("Apakah anda yakin akan menghapus jadwal ini?")) {
                        var id = event.id;
                        // perintah ajax untuk simpan data
                        $.ajax({
                            url: "hapus.php",
                            type: "POST",
                            data: {
                                id: id
                            },
                            success: function() {
                                // jika simpan sukses, kalender akan direfresh dan menampilkan pesan sukses
                                calendar.fullCalendar('refetchEvents');
                                alert('Jadwal berhasil dihapus!');
                            }
                        });
                    }
                }
            });
        });
    </script>


</body>

</html>