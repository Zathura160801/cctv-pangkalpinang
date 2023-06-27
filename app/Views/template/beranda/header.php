<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">

   <title>CCTV | Pangkalpinang</title>
   <meta content="" name="description">
   <meta content="" name="keywords">

   <!-- Favicons -->
   <link rel="icon" type="image/png" href="<?php echo base_url() ?>/public/berkas/uploads/logo/CCTV PGK.png">

   <!-- Google Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Orbitron">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

   <!-- Vendor CSS Files -->
   <link href="<?php echo base_url() ?>/public/Assets/Beranda/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="<?php echo base_url() ?>/public/Assets/Beranda/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
   <link href="<?php echo base_url() ?>/public/Assets/Beranda/vendor/aos/aos.css" rel="stylesheet">
   <link href="<?php echo base_url() ?>/public/Assets/Beranda/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
   <link href="<?php echo base_url() ?>/public/Assets/Beranda/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

   <!-- Template Main CSS File -->
   <link href="<?php echo base_url() ?>/public/Assets/Beranda/css/main.css" rel="stylesheet">

   <!---------------------------- LEAFLET -------------------------------->
   <link href="<?php echo base_url() ?>/public/Assets/Leaflet/leaflet.css" rel="stylesheet">
   <link href="<?php echo base_url() ?>/public/Assets/Leaflet/leaflet.fullscreen.css" rel="stylesheet">
   <script src="<?php echo base_url() ?>/public/Assets/Leaflet/leaflet.js"></script>
   <script src="<?php echo base_url() ?>/public/Assets/Leaflet/leaflet.fullscreen.min.js"></script>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.css" />
   <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>

   <!-- =======================================================
  * Template Name: Yummy - v1.3.0
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

   <script>
      function startTime() {
         var today = new Date();
         var h = today.getHours();
         var m = today.getMinutes();
         var s = today.getSeconds();
         h = checkTime(h);
         m = checkTime(m);
         s = checkTime(s);
         document.getElementById('clock').innerHTML =
            h + ":" + m + ":" + s;
         var t = setTimeout(startTime, 500);
      }

      function checkTime(i) {
         if (i < 10) {
            i = "0" + i
         };
         return i;
      }
   </script>

   <style>
      #clock {
         /* position: absolute; */
         /* top: 50%; */
         /* left: 50%; */
         /* transform: translate(-50%, -50%); */
         color: red;
         font-family: Orbitron;
         letter-spacing: 7px;
         font-weight: bold;
         font-size: 18px;
      }
   </style>

</head>

<body onload="startTime()">

   <?php
   $db = db_connect();
   $get_konfigurasi = $db->query('select * from konfigurasi')->getFirstRow('array');
   ?>

   <!-- ======= Header ======= -->
   <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="container d-flex align-items-center justify-content-between">

         <a href="<?= base_url(); ?>" class="logo d-flex align-items-center me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="<?php echo base_url() ?>/public/Assets/Beranda/img/logo.png" alt=""> -->
            <h1>
               <img src="<?php echo base_url() ?>/public/berkas/uploads/logo/CCTV PGK.png" class="img-fluid testimonial-img" alt="">
               CCTV <b style="color:red">PANGKALPINANG</b><span></span>
            </h1>
         </a>

         <nav id="navbar" class="navbar">
            <ul>
               <li><a href="<?= base_url(); ?>">Beranda</a></li>
               <li><a href="<?= base_url(); ?>/Cctv">CCTV</a></li>
               <li><a href="<?= base_url(); ?>/Cctv/tampil_peta">Denah/PETA</a></li>
               <li><a href="<?= base_url(); ?>/Cctv/tampil_kontak">Tentang Kami</a></li>
            </ul>
         </nav><!-- .navbar -->

         <a class="btn-book-a-table" href="<?= base_url(); ?>/login">
            <?php if (!session()->get('level_users')) : ?>
               <b>Login</b>
            <?php else : ?>
               Hi, <b><?= session()->get('level_users')['nama_u'] ?></b>
            <?php endif ?>
         </a>
         <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
         <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      </div>
   </header><!-- End Header -->