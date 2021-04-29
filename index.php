<?php
include 'library.php';

$sql = 'SELECT * FROM edit';
$listEdit = $mysqli->query($sql);
$edit = $listEdit->fetch_array();

$sql_gambar = "SELECT * FROM edit_gambar";
$dataEditGambar = $mysqli->query($sql_gambar);
?>
<!DOCTYPE html>
<html lang="en">

<head>

     <title>Reservasi Motivator &dash; Motivator Bisnis</title>
     <!--

DIGITAL TREND

https://templatemo.com/tm-538-digital-trend

-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/aos.css">
     <link rel="stylesheet" href="css/owl.carousel.min.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/templatemo-digital-trend.css">

</head>

<body>

     <!-- MENU BAR -->
     <nav class="navbar navbar-expand-lg">
          <div class="container">
               <a class="navbar-brand" href="index.html">
                    <i class="fa fa-line-chart"></i>
                    Motivator Bisnis
               </a>

               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>

               <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">

                         <li class="nav-btn">
                              <a href="https://www.instagram.com/motivatorbisnis/" class="nav-link">Instagram</a>
                         </li>

                         <li class="nav-btn">
                              <a href="https://novisetianurviat.com/?i" class="nav-link">Tentang Saya</a>
                         </li>

                    </ul>
               </div>
          </div>
     </nav>


     <!-- HERO -->
     <section class="hero hero-bg d-flex justify-content-center align-items-center">
          <div class="container">
               <div class="row">

                    <div class="col-lg-6 col-md-10 col-12 d-flex flex-column justify-content-center align-items-center">
                         <div class="hero-text">

                              <h1 class="text-white" data-aos="fade-up">Motivator Bisnis Indonesia</h1>

                              <a href="form/form.php" class="custom-btn btn-bg btn mt-3" data-aos="fade-up" data-aos-delay="100">Undang sekarang!</a>
                         </div>
                    </div>

                    <div class="col-lg-6 col-12">
                         <div class="hero-image" data-aos="fade-up" data-aos-delay="300">

                              <img src="images/hero.png" class="img-fluid" alt="main">
                         </div>
                    </div>

               </div>
          </div>
     </section>

     <!-- PROJECT -->
     <section class="project section-padding" id="project">
          <div class="container-fluid">
               <div class="row">

                    <div class="col-lg-12 col-12">

                         <h2 class="mb-5 text-center" data-aos="fade-up">
                              Dokumentasi Event
                         </h2>

                         <div class="owl-carousel owl-theme" id="project-slide">

                              <?php
                              $i = 1;
                              while ($edit_gambar = $dataEditGambar->fetch_array()) {
                              ?>
                                   <div class="item project-wrapper" data-aos="fade-up" data-aos-delay="100">
                                        <img src="images/project/<?= $edit_gambar['file']; ?>" style="max-width: 999px; max-height:527px;" class="img-fluid" alt="project image">

                                        <div class="project-info">
                                             <small><?= $edit_gambar['tempat']; ?></small>

                                             <h3>
                                                  <a href="project-detail.html">
                                                       <span><?= $edit_gambar['judul']; ?></span>
                                                  </a>
                                             </h3>
                                        </div>
                                   </div>
                              <?php } ?>
                         </div>
                    </div>
               </div>
          </div>
     </section>

     <footer class="site-footer">
          <div class="container">
               <div class="row">

                    <div class="col-lg-5 mx-lg-auto col-md-8 col-10">
                         <h1 class="text-white" data-aos="fade-up" data-aos-delay="100">Bisnis Sebagai Media<strong>Dakwah</strong></h1>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="200">
                         <h4 class="my-4">Info Kontak</h4>

                         <p class="mb-1">
                              <i class="fa fa-phone mr-2 footer-icon"></i>
                              <?= $edit['no_telepon']; ?>
                         </p>

                         <p>
                              <a href=<?= $edit['url_email']; ?>>
                                   <i class="fa fa-envelope mr-2 footer-icon"></i>
                                   <?= $edit['email']; ?>
                              </a>
                         </p>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="300">
                         <h4 class="my-4">Alamat</h4>

                         <p class="mb-1"><i class="fa fa-home mr-2 footer-icon"></i><a href=<?= $edit['url_alamat']; ?>><?= $edit['alamat']; ?></a></p>
                    </div>

                    <div class="col-lg-4 mx-lg-auto col-md-6 col-12" data-aos="fade-up" data-aos-delay="500">

                    </div>
               </div>
          </div>
     </footer>


     <!-- SCRIPTS -->
     <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/aos.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

</body>

</html>