<?php
# mailbox.php
include '../../../library.php';

$sql = 'SELECT * FROM form';
$listForm = $mysqli->query($sql);
if(isset($_POST['btn_delete'])){
    if(isset($_POST['selected'])){
      foreach($_POST['selected'] as $selectedid){

        $deleteData = "DELETE from nama_table WHERE id=".$selectedid;
        mysqli_query($mysqli, $deleteData);
      }
    }
}
?>
<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mailbox</title>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link navbar-nav nav-item" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">

                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>

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



        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="../../index.php" class="brand-link">
                <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Asep Grenade</span>
            </a>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Agus Phoenix</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                        <li class="nav-item">
                            <a href="../../index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../../pages/calendar.php" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Calendar
                                    <span class="badge badge-info right">Ubah Disini</span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../../pages/mailbox/mailbox.php" class="nav-link">
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

        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-left">
                                <li class="breadcrumb-item active">Inbox</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>


            <section class="content">
                <div class="row">
                    <div class="col-md-3">
                        <a href="../../index.php" class="btn btn-primary btn-block mb-3">Back To Dashboard</a>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Folders</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item active">
                                        <a href="#" class="nav-link">
                                            <i class="fas fa-inbox"></i> Inbox
                                            <span class="badge bg-primary float-right">12</span>
                                        </a>
                                        <tr>
                                            <td>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" value="" id="check4">
                                                    <label for="check4"></label>
                                                </div>
                                            </td>
                                            <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                                            <td class="mailbox-name"><a href="read-mail.php">nama penanggung jawab</a></td>
                                            <td class="mailbox-subject"><b>nama instansi</b> nama event
                                            </td>
                                            <td class="mailbox-attachment"></td>
                                            <td class="mailbox-date">dari kapan - sampai kapan</td>
                                        </tr>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link">
                                            <i class="far fa-envelope"></i> Sent
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <div class="card">


                        </div>

                    </div>

                    <div class="col-md-9">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Inbox</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" placeholder="Search Mail">
                                        <div class="input-group-append">
                                            <div class="btn btn-primary">
                                                <i class="fas fa-search"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-body p-0">
                            <form method='post' action=''>
                                <div class="mailbox-controls">

                                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                                    </button>
                                    <div class="btn-group">
                                        <button type="submit" name="btn_delete" class="btn btn-default btn-sm">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-reply"></i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-share"></i>
                                        </button>
                                    </div>

                                    <button type="button" class="btn btn-default btn-sm">
                                        <i class="fas fa-sync-alt"></i>
                                    </button>
                                    <div class="float-right">
                                        1-50/200
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm">
                                                <i class="fas fa-chevron-left"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm">
                                                <i class="fas fa-chevron-right"></i>
                                            </button>
                                        </div>

                                    </div>

                                </div>
                                <div class="table-responsive mailbox-messages">
                                    <table class="table table-hover table-striped">
                                        <tbody>
                                            <?php
                                            while ($form = $listForm->fetch_array()) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" name="selected[]" value="<?= $form['id'] ?>">
                                                            <label for="check1"></label>
                                                        </div>
                                                    </td>
                                                    <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                                                    <td class="mailbox-name"><a href="read-mail.php"><?= $form['nama_pj'] ?></a></td>
                                                    <td class="mailbox-subject"><b><?= $form['nama_instansi'] ?></b> - <?= $form['nama_event'] ?>
                                                    </td>
                                                    <td class="mailbox-attachment"></td>
                                                    <td class="mailbox-date"><?= $form['start_event'] ?> - <?= $form['end_event'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                            </div>
                        </div>

                    </div>

                </div>

            </section>

        </div>

        <footer class="main-footer">
            <strong>&copy; 2021 <a href="https://inovindo.co.id/">PT INOVINDO DIGITAL MEDIA</a>.</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 0.0.1
            </div>
        </footer>


        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>



    <script src="../../plugins/jquery/jquery.min.js"></script>

    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../../dist/js/adminlte.min.js"></script>

    <script src="../../dist/js/demo.js"></script>

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