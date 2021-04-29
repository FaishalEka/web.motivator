<?php
include '../../../library.php';

cekLogin();

$id = 1;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $url_email = $_POST['url_email'];
    $no_telepon = $_POST['no_telepon'];
    $alamat = $_POST['alamat'];
    $url_alamat = $_POST['url_alamat'];
    $url_ig = $_POST['url_ig'];

    $sql = "UPDATE edit SET
                email = '$email',
                url_email = '$url_email',
                no_telepon = '$no_telepon',
                alamat = '$alamat',
                url_alamat = '$url_alamat',
                url_ig = '$url_ig'
            WHERE id = 1
            ";

    $mysqli->query($sql) or die($mysqli->error);

    echo "<script>alert('Data Berhasil Diubah')</script>";
}

$sql = "SELECT * FROM edit";
$dataEdit = $mysqli->query($sql) or die($mysqli->error);

if (empty($id)) echo "alert('Id tidak ditemukan')";

$sql = "SELECT * FROM edit WHERE id = 1";
$query = $mysqli->query($sql);
$edit = $query->fetch_array();

if (empty($edit)) echo "alert('tabel tidak ditemukan')";

$sql_gambar = "SELECT * FROM edit_gambar";
$dataEditGambar = $mysqli->query($sql_gambar);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit</title>
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
                        <li class="nav-item">
                            <a href="../../pages/mailbox/mailbox.php" class="nav-link">
                                <i class="nav-icon far fa-copy"></i>
                                <p>
                                    Data
                                </p>
                            </a>
                        </li>
                        <!-- Tombol Edit -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
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
                                <li class="breadcrumb-item active">Edit Halaman Awal</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Edit Data</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="mailbox-controls">
                                    <div class="table-responsive mailbox-messages">
                                        <form method="POST" enctype="multipart/form-data" action="">
                                            <div class="form-group">
                                                <label for="email">Email: </label>
                                                <input type="text" class="form-control" id="email" name="email" aria-describedby="email" placeholder="" value="<?= @$edit['email']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="url_email">Link Email: </label>
                                                <input type="text" class="form-control" id="url_email" name="url_email" aria-describedby="url_email" placeholder="" value="<?= @$edit['url_email']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="no_telepon">No. Telepon: </label>
                                                <input type="number" class="form-control" id="no_telepon" name="no_telepon" aria-describedby="no_telepon" placeholder="" value="<?= @$edit['no_telepon']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat: </label>
                                                <input type="text" class="form-control" id="alamat" name="alamat" aria-describedby="alamat" placeholder="" value="<?= @$edit['alamat']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="url_alamat">Link Alamat (Google Maps): </label>
                                                <input type="text" class="form-control" id="url_alamat" name="url_alamat" aria-describedby="url_alamat" placeholder="" value="<?= @$edit['url_alamat']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="url_ig">Link Instagram: </label>
                                                <input type="text" class="form-control" id="url_ig" name="url_ig" aria-describedby="url_ig" placeholder="" value="<?= @$edit['url_ig']; ?>">
                                            </div>
                                            <button class="btn btn-primary submit" type="submit" value="Simpan" style="float: right;">Simpan</button>
                                        </form>
                                    </div>
                                    <!-- /.mail-box-messages -->
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Dokumentasi</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="mailbox-controls">
                                    <div class="table-responsive mailbox-messages">
                                        <form action="tambah.php" enctype="multipart/form-data" method="post">
                                            <div class="form-group">
                                                <label for="file">Upload Foto Acara:</label><br>
                                                <input type="file" name="foto" class="border" autocomplete="off" onchange="loadFile(event)">
                                            </div>
                                            <div class="form-group">
                                                <label for="judul">Judul Acara: </label>
                                                <input type="text" class="form-control" id="judul" name="judul" aria-describedby="judul" placeholder="" value="<?= @$edit_gambar['judul'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tempat">Lokasi Acara: </label>
                                                <input type="text" class="form-control" id="tempat" name="tempat" aria-describedby="tempat" placeholder="" value="<?= @$edit_gambar['tempat'] ?>" required>
                                            </div>
                                            <button class="btn btn-primary submit" type="submit" value="Simpan" onclick="return alert('Dokumentasi Berhasil Ditambah')" style="float: right;">Tambah</button>
                                            <!-- /.mail-box-messages -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Edit Dokumentasi</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="mailbox-controls">
                                    <div class="table-responsive mailbox-messages">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Foto</th>
                                                    <th>Lokasi Acara</th>
                                                    <th>Judul Acara</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $batas = 10;
                                                $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                                $previous = $halaman - 1;
                                                $next = $halaman + 1;

                                                $jumlah_data = mysqli_num_rows($dataEditGambar);
                                                $total_halaman = ceil($jumlah_data / $batas);

                                                $data = mysqli_query($mysqli, $sql_gambar . " limit $halaman_awal, $batas");
                                                $nomor = $halaman_awal + 1;
                                                $no = 0;
                                                $i = 1;
                                                while ($edit_gambar = $dataEditGambar->fetch_array()) {
                                                ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td>
                                                            <img width="91" height="65" src="<?php echo base_url() ?>images/project/<?php echo $edit_gambar['file'] ?>">
                                                        </td>
                                                        <td><?= $edit_gambar['tempat']; ?></td>
                                                        <td><?= $edit_gambar['judul']; ?></td>
                                                        <td>
                                                            <a class="btn btn-primary btn-danger" href="delete.php?id=<?= $edit_gambar["id"]; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
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

    <script>
        const del = document.querySelector(".del");
        const overwrite = document.createElement("input");
        const inp = document.querySelector(".inp");
        if (del.value != '') {
            del.setAttribute("type", "hidden");
            overwrite.setAttribute("type", "text");
            overwrite.setAttribute("class", "form-control");
            overwrite.setAttribute("value", "<?= $edit["id"]; ?>");
            overwrite.setAttribute("disabled", "");
            inp.appendChild(overwrite);
        }
    </script>
</body>

</html>