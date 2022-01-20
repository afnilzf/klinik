<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Medicare</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets/Medicio/'); ?>assets/img/favicon2.png" rel="icon">
    <link href="<?= base_url('assets/Medicio/'); ?>assets/img/touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/Medicio/'); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/Medicio/'); ?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/Medicio/'); ?>assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('assets/Medicio/'); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/Medicio/'); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets/Medicio/'); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/Medicio/'); ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/Medicio/'); ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('assets/Medicio/'); ?>assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" src="<?= base_url('assets/Medicio/'); ?>assets/vendor/sweetalert2/sweetalert2.min.css">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/Medicio/'); ?>assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Medicio/ - v4.7.0
  * Template URL: https://bootstrapmade.com/Medicio/-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
            <div class="align-items-center d-none d-md-flex">
                <i class="bi bi-clock"></i> Monday - Saturday, 8AM to 10PM
            </div>
            <div class="d-flex align-items-center">
                <i class="bi bi-phone"></i> Call us now +1 5589 55488 55
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <?php if ($this->uri->segment(2) == 'ubah_jadwal') : ?>
            <div class="container d-flex align-items-center">

                <a href="<?= base_url('Auth'); ?>" class="logo me-auto"><img src="<?= base_url('assets/Medicio/'); ?>assets/img/logo2.png" alt=""></a>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

                <nav id="navbar" class="navbar order-last order-lg-0">
                    <ul>
                        <li><a class="nav-link scrollto " href="<?= base_url('home'); ?>">Home</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->
            </div>
        <?php else : ?>
            <div class="container d-flex align-items-center">

                <a href="<?= base_url('Auth'); ?>" class="logo me-auto"><img src="<?= base_url('assets/Medicio/'); ?>assets/img/logo2.png" alt=""></a>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

                <nav id="navbar" class="navbar order-last order-lg-0">
                    <ul>
                        <li><a class="nav-link scrollto " href="#hero">Home</a></li>
                        <li><a class="nav-link scrollto" href="#daftar">Services</a></li>
                        <li><a class="nav-link scrollto" href="#featured-services">Departments</a></li>
                        <li><a class="nav-link scrollto" href="#about">About</a></li>
                        <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
                        <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->
            </div>
        <?php endif ?>
    </header><!-- End Header -->