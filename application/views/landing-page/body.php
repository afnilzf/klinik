 <!-- ======= Hero Section ======= -->
 <section id="hero">
     <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

         <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

         <div class="carousel-inner" role="listbox">

             <!-- Slide 1 -->
             <div class="carousel-item active" style="background-image: url(<?= base_url('assets/Medicio/'); ?>assets/img/slide/slide-1.jpg)">
                 <div class="container">
                     <h2>Welcome to <span>Medicio</span></h2>
                     <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel.</p>
                     <a href="#about" class="btn-get-started scrollto">Read More</a>
                 </div>
             </div>

             <!-- Slide 2 -->
             <div class="carousel-item" style="background-image: url(<?= base_url('assets/Medicio/'); ?>assets/img/slide/slide-2.jpg)">
                 <div class="container">
                     <h2>Lorem Ipsum Dolor</h2>
                     <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel.</p>
                     <a href="#about" class="btn-get-started scrollto">Read More</a>
                 </div>
             </div>

             <!-- Slide 3 -->
             <div class="carousel-item" style="background-image: url(<?= base_url('assets/Medicio/'); ?>assets/img/slide/slide-3.jpg)">
                 <div class="container">
                     <h2>Sequi ea ut et est quaerat</h2>
                     <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel.</p>
                     <a href="#about" class="btn-get-started scrollto">Read More</a>
                 </div>
             </div>

         </div>

         <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
             <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
         </a>

         <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
             <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
         </a>

     </div>
 </section><!-- End Hero -->

 <main id="main">

     <!-- ======= Appointment Section ======= -->
     <?php
        $kode_pendaftar = "KDB-" . rand(10000, 100000);
        ?>
     <section id="daftar" class="appointment section-bg">
         <div class="container" data-aos="fade-up">

             <div class="section-title">
                 <h2>Daftar Berobat</h2>
                 <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
             </div>

             <form action="<?= base_url('home/pendaftaran'); ?>" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
                 <input type="hidden" name="no_berobat" value="<?= $kode_pendaftar; ?>">
                 <div class="row">
                     <div class="col-md-4 form-group">
                         <label for="name"> Nama</label>
                         <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                     </div>
                     <div class="col-md-4 form-group mt-3 mt-md-0">
                         <label for="address"> Alamat</label>
                         <input type="text" class="form-control" name="address" id="address" placeholder="Your address" required>
                     </div>
                     <div class="col-md-4 form-group mt-3 mt-md-0">
                         <label for="bpjs">Status BPJS</label>
                         <select name="bpjs" id="bpjs" class="form-select">
                             <option value="">Status BPJS</option>
                             <option value="Ada">Ada</option>
                             <option value="Tidak">Tidak</option>
                         </select>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-4 form-group mt-3">
                         <label for="no_berobat">No Berobat</label>
                         <input type="text" name="no_berobat" class="form-control" id="no_berobat" value="<?= $kode_pendaftar; ?>" disabled>
                     </div>
                     <div class="col-md-4 form-group mt-3">
                         <label for="date">Tanggal Berobat</label>
                         <input type="date" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" required>
                     </div>
                     <div class="col-md-4 form-group mt-3">
                         <label for="poli">Pilih Polikklinik</label>
                         <select name="poli" id="poli" class="form-select">
                             <option value="">Select Poliklinik</option>
                             <?php foreach ($poli as $pl) : ?>
                                 <option value="<?= $pl['id_poli'] ?>"><?= $pl['nama_poli'] ?></option>
                             <?php endforeach ?>
                         </select>
                     </div>
                 </div>

                 <div class="form-group mt-3">
                     <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
                 </div>
                 <div class="my-3">
                     <div class="loading">Loading</div>
                     <div class="error-message"></div>
                     <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
                 </div>
                 <?= $this->session->flashdata('message'); ?>
                 <div class="text-center"><button type="submit" class="swalDefaultSuccess">Buat Pendaftaran</button></div>
             </form>

         </div>
     </section><!-- End Appointment Section -->
     <section id="search" class="contact">
         <div class="container">

             <div class="section-title">
                 <h2>Data Berobat</h2>
                 <p>Silahkan masukan dan cari no pendaftaran tadi!.</p>
             </div>

         </div>
         <?php if ($cari == 0) : ?>
             <div class="container">
                 <div class="row mt-5">
                     <div class="col-lg-12">
                         <form action="<?= base_url('home/cari'); ?>" method="post" role="form" class="php-email-form">
                             <div class="row">
                                 <div class="col-lg-9 form-group mt-3">
                                     <input type="text" name="keyword" class="form-control" id="keyword" placeholder="No Pendaftaran" required>
                                 </div>
                                 <div class="col-lg-3 form-group mt-3">
                                     <div class="text-center"><button type="submit">Search</button></div>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
                 <div class="row mt-5">
                     <div class="col-lg-6">
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="info-box">
                                     <i class="bx bx-user-circle"></i>
                                     <h3>Nama</h3>
                                     <p></p>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="info-box">
                                     <i class="bx bx-map"></i>
                                     <h3>Alamat</h3>
                                     <p></p>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="info-box mt-2">
                                     <i class="bx bx-id-card"></i>
                                     <h3>BPJS</h3>
                                     <p></p>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="info-box mt-2">
                                     <i class="fas fa-pager"></i>
                                     <h3>NO.Berobat</h3>
                                     <p></p>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="info-box mt-2">
                                     <i class="fas fa-hand-holding-medical"></i>
                                     <h3>Poliklinik</h3>
                                     <p></p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-6">
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="info-box">
                                     <i class="fas fa-sticky-note"></i>
                                     <h3>Keluhan</h3>
                                     <p></p>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="info-box mt-4">
                                     <i class="bx bx-calendar"></i>
                                     <h3>Tanggal Berobat</h3>
                                     <p></p>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="info-box mt-4">
                                     <i class="fas fa-sort-amount-down"></i>
                                     <h3>No.Antrian</h3>
                                     <p></p>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>
         <?php else : ?>
             <div class="container">
                 <div class="row mt-5">
                     <div class="col-lg-12">
                         <form action="<?= base_url('home/cari'); ?>" method="post" role="form" class="php-email-form">
                             <div class="row">
                                 <div class="col-lg-9 form-group mt-3">
                                     <input type="text" name="keyword" class="form-control" id="keyword" placeholder="No Pendaftaran" required>
                                 </div>
                                 <div class="col-lg-3 form-group mt-3">
                                     <div class="text-center"><button type="submit">Search</button></div>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
                 <?php foreach ($cari as $cr) : ?>
                     <div class="row mt-5">
                         <div class="col-lg-6">
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="info-box">
                                         <i class="bx bx-user-circle"></i>
                                         <h3>Nama</h3>
                                         <p><?= $cr['nama_pasien']; ?></p>
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="info-box">
                                         <i class="bx bx-map"></i>
                                         <h3>Alamat</h3>
                                         <p><?= $cr['alamat_pasien']; ?></p>
                                     </div>
                                 </div>
                                 <div class="col-md-4">
                                     <div class="info-box mt-2">
                                         <i class="bx bx-id-card"></i>
                                         <h3>BPJS</h3>
                                         <p><?= $cr['status_bpjs']; ?></p>
                                     </div>
                                 </div>
                                 <div class="col-md-4">
                                     <div class="info-box mt-2">
                                         <i class="fas fa-pager"></i>
                                         <h3>NO.Berobat</h3>
                                         <p><?= $cr['no_berobat']; ?></p>
                                     </div>
                                 </div>
                                 <div class="col-md-4">
                                     <div class="info-box mt-2">
                                         <i class="fas fa-hand-holding-medical"></i>
                                         <h3>Poliklinik</h3>
                                         <p><?= $cr['nama_poli']; ?></p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-6">
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="info-box">
                                         <i class="fas fa-sticky-note"></i>
                                         <h3>Keluhan</h3>
                                         <p><?= $cr['keluhan']; ?></p>
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="info-box mt-4">
                                         <i class="bx bx-calendar"></i>
                                         <h3>Tanggal Berobat</h3>
                                         <p><?= $cr['tanggal_berobat']; ?></p>
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="info-box mt-4">
                                         <i class="fas fa-sort-amount-down"></i>
                                         <h3>No.Antrian</h3>
                                         <p><?= $cr['antrian']; ?></p>
                                     </div>
                                 </div>
                                 <div class="col-md-12 mt-4">
                                     <!-- Button trigger modal -->
                                     <a href="<?= base_url('home/ubah_jadwal/') . $cr['id_berobat'] ?>" class="btn btn-info">Reschedule</a>
                                 </div>
                             </div>
                         <?php endforeach ?>
                         </div>
                     </div>
             </div>
             <?php foreach ($cari as $cr) : ?>
                 <!-- Modal -->
                 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body">
                                 ...
                             </div>
                             <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="button" class="btn btn-primary">Save changes</button>
                             </div>
                         </div>
                     </div>
                 </div>
             <?php endforeach ?>
         <?php endif ?>
     </section><!-- End Contact Section -->
     <!-- ======= Cta Section ======= -->


     <!-- <section id="cta" class="cta">
         <div class="container" data-aos="zoom-in">

             <div class="text-center">
                 <h3>In an emergency? Need help now?</h3>
                 <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                 <a class="cta-btn scrollto" href="#appointment">Make an Make an Appointment</a>
             </div>

         </div>
     </section>End Cta Section -->
     <!-- ======= Featured Services Section ======= -->

     <section id="featured-services" class="featured-services">
         <div class="container" data-aos="fade-up">

             <div class="row">
                 <?php foreach ($info as $in) : ?>
                     <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                         <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                             <img src="<?= base_url('assets/upload/gambar-info/') . $in['gambar_info']; ?>" class="img-fluid" alt="">
                             <h4 class="title"><a href=""><?= $in['judul_info']; ?></a></h4>
                             <p class="description"><?= substr($in['isi_info'], 0, 20) ?>... <a href="<?= base_url() ?>/home/tampil_detail_info/<?= $in['id_info'] ?>">baca selengkapnya</a></p>
                         </div>
                     </div>
                 <?php endforeach ?>

             </div>

         </div>
     </section>
     <!-- End Featured Services Section -->
     <!-- ======= About Us Section ======= -->
     <section id="about" class="about">
         <div class="container" data-aos="fade-up">

             <div class="section-title">
                 <h2>About Us</h2>
                 <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
             </div>

             <div class="row">
                 <div class="col-lg-6" data-aos="fade-right">
                     <img src="<?= base_url('assets/Medicio/'); ?>assets/img/about.jpg" class="img-fluid" alt="">
                 </div>
                 <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
                     <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                     <p class="fst-italic">
                         Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                         magna aliqua.
                     </p>
                     <ul>
                         <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                         <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                         <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                     </ul>
                     <p>
                         Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                         velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                         culpa qui officia deserunt mollit anim id est laborum
                     </p>
                 </div>
             </div>

         </div>
     </section><!-- End About Us Section -->

     <!-- ======= Counts Section ======= -->
     <!-- <section id="counts" class="counts">
         <div class="container" data-aos="fade-up">

             <div class="row no-gutters">

                 <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                     <div class="count-box">
                         <i class="fas fa-user-md"></i>
                         <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1" class="purecounter"></span>

                         <p><strong>Doctors</strong> consequuntur quae qui deca rode</p>
                         <a href="#">Find out more &raquo;</a>
                     </div>
                 </div>

                 <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                     <div class="count-box">
                         <i class="far fa-hospital"></i>
                         <span data-purecounter-start="0" data-purecounter-end="26" data-purecounter-duration="1" class="purecounter"></span>
                         <p><strong>Departments</strong> adipisci atque cum quia aut numquam delectus</p>
                         <a href="#">Find out more &raquo;</a>
                     </div>
                 </div>

                 <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                     <div class="count-box">
                         <i class="fas fa-flask"></i>
                         <span data-purecounter-start="0" data-purecounter-end="14" data-purecounter-duration="1" class="purecounter"></span>
                         <p><strong>Research Lab</strong> aut commodi quaerat. Aliquam ratione</p>
                         <a href="#">Find out more &raquo;</a>
                     </div>
                 </div>

                 <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                     <div class="count-box">
                         <i class="fas fa-award"></i>
                         <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1" class="purecounter"></span>
                         <p><strong>Awards</strong> rerum asperiores dolor molestiae doloribu</p>
                         <a href="#">Find out more &raquo;</a>
                     </div>
                 </div>

             </div>

         </div>
     </section> -->
     <!-- End Counts Section -->

     <!-- ======= Features Section ======= -->
     <!-- <section id="features" class="features">
         <div class="container" data-aos="fade-up">

             <div class="row">
                 <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right">
                     <div class="icon-box mt-5 mt-lg-0">
                         <i class="bx bx-receipt"></i>
                         <h4>Est labore ad</h4>
                         <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                     </div>
                     <div class="icon-box mt-5">
                         <i class="bx bx-cube-alt"></i>
                         <h4>Harum esse qui</h4>
                         <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                     </div>
                     <div class="icon-box mt-5">
                         <i class="bx bx-images"></i>
                         <h4>Aut occaecati</h4>
                         <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                     </div>
                     <div class="icon-box mt-5">
                         <i class="bx bx-shield"></i>
                         <h4>Beatae veritatis</h4>
                         <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
                     </div>
                 </div>
                 <div class="image col-lg-6 order-1 order-lg-2" style='background-image: url("<?= base_url('assets/Medicio/'); ?>assets/img/features.jpg");' data-aos="zoom-in"></div>
             </div>

         </div>
     </section> -->
     <!-- End Features Section -->

     <!-- ======= Services Section ======= -->
     <!-- <section id="services" class="services services">
         <div class="container" data-aos="fade-up">

             <div class="section-title">
                 <h2>Services</h2>
                 <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
             </div>

             <div class="row">
                 <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                     <div class="icon"><i class="fas fa-heartbeat"></i></div>
                     <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                     <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                 </div>
                 <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
                     <div class="icon"><i class="fas fa-pills"></i></div>
                     <h4 class="title"><a href="">Dolor Sitema</a></h4>
                     <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
                 </div>
                 <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
                     <div class="icon"><i class="fas fa-hospital-user"></i></div>
                     <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                     <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                 </div>
                 <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                     <div class="icon"><i class="fas fa-dna"></i></div>
                     <h4 class="title"><a href="">Magni Dolores</a></h4>
                     <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                 </div>
                 <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
                     <div class="icon"><i class="fas fa-wheelchair"></i></div>
                     <h4 class="title"><a href="">Nemo Enim</a></h4>
                     <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
                 </div>
                 <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
                     <div class="icon"><i class="fas fa-notes-medical"></i></div>
                     <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
                     <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
                 </div>
             </div>

         </div>
     </section> -->
     <!-- End Services Section -->

     <!-- ======= Doctors Section ======= -->
     <section id="doctors" class="doctors section-bg">
         <div class="container" data-aos="fade-up">

             <div class="section-title">
                 <h2>Doctors</h2>
                 <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
             </div>

             <div class="row">
                 <?php foreach ($dokter as $dk) : ?>
                     <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                         <div class="member" data-aos="fade-up" data-aos-delay="100">
                             <div class="member-img">
                                 <img src="<?= base_url('assets/img/profile/') . $dk['img']; ?>" class="img-fluid" alt="">
                                 <div class="social">
                                     <a href=""><i class="bi bi-twitter"></i></a>
                                     <a href=""><i class="bi bi-facebook"></i></a>
                                     <a href=""><i class="bi bi-instagram"></i></a>
                                     <a href=""><i class="bi bi-linkedin"></i></a>
                                 </div>
                             </div>
                             <div class="member-info">
                                 <h4><?= $dk['nama'] ?></h4>
                                 <span><?= $dk['nama_poli'] ?></span>
                             </div>
                         </div>
                     </div>
                 <?php endforeach ?>

                 <!-- <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                     <div class="member" data-aos="fade-up" data-aos-delay="200">
                         <div class="member-img">
                             <img src="<?= base_url('assets/Medicio/'); ?>assets/img/doctors/doctors-2.jpg" class="img-fluid" alt="">
                             <div class="social">
                                 <a href=""><i class="bi bi-twitter"></i></a>
                                 <a href=""><i class="bi bi-facebook"></i></a>
                                 <a href=""><i class="bi bi-instagram"></i></a>
                                 <a href=""><i class="bi bi-linkedin"></i></a>
                             </div>
                         </div>
                         <div class="member-info">
                             <h4>Sarah Jhonson</h4>
                             <span>Anesthesiologist</span>
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                     <div class="member" data-aos="fade-up" data-aos-delay="300">
                         <div class="member-img">
                             <img src="<?= base_url('assets/Medicio/'); ?>assets/img/doctors/doctors-3.jpg" class="img-fluid" alt="">
                             <div class="social">
                                 <a href=""><i class="bi bi-twitter"></i></a>
                                 <a href=""><i class="bi bi-facebook"></i></a>
                                 <a href=""><i class="bi bi-instagram"></i></a>
                                 <a href=""><i class="bi bi-linkedin"></i></a>
                             </div>
                         </div>
                         <div class="member-info">
                             <h4>William Anderson</h4>
                             <span>Cardiology</span>
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                     <div class="member" data-aos="fade-up" data-aos-delay="400">
                         <div class="member-img">
                             <img src="<?= base_url('assets/Medicio/'); ?>assets/img/doctors/doctors-4.jpg" class="img-fluid" alt="">
                             <div class="social">
                                 <a href=""><i class="bi bi-twitter"></i></a>
                                 <a href=""><i class="bi bi-facebook"></i></a>
                                 <a href=""><i class="bi bi-instagram"></i></a>
                                 <a href=""><i class="bi bi-linkedin"></i></a>
                             </div>
                         </div>
                         <div class="member-info">
                             <h4>Amanda Jepson</h4>
                             <span>Neurosurgeon</span>
                         </div>
                     </div>
                 </div> -->

             </div>

         </div>
     </section><!-- End Doctors Section -->

     <!-- ======= Departments Section ======= -->
     <!-- <section id="departments" class="departments">
         <div class="container" data-aos="fade-up">

             <div class="section-title">
                 <h2>Departments</h2>
                 <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
             </div>

             <div class="row" data-aos="fade-up" data-aos-delay="100">
                 <div class="col-lg-4 mb-5 mb-lg-0">
                     <ul class="nav nav-tabs flex-column">
                         <li class="nav-item">
                             <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                                 <h4>Cardiology</h4>
                                 <p>Quis excepturi porro totam sint earum quo nulla perspiciatis eius.</p>
                             </a>
                         </li>
                         <li class="nav-item mt-2">
                             <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                                 <h4>Neurology</h4>
                                 <p>Voluptas vel esse repudiandae quo excepturi.</p>
                             </a>
                         </li>
                         <li class="nav-item mt-2">
                             <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                                 <h4>Hepatology</h4>
                                 <p>Velit veniam ipsa sit nihil blanditiis mollitia natus.</p>
                             </a>
                         </li>
                         <li class="nav-item mt-2">
                             <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                                 <h4>Pediatrics</h4>
                                 <p>Ratione hic sapiente nostrum doloremque illum nulla praesentium id</p>
                             </a>
                         </li>
                     </ul>
                 </div>
                 <div class="col-lg-8">
                     <div class="tab-content">
                         <div class="tab-pane active show" id="tab-1">
                             <h3>Cardiology</h3>
                             <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                             <img src="<?= base_url('assets/Medicio/'); ?>assets/img/departments-1.jpg" alt="" class="img-fluid">
                             <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
                         </div>
                         <div class="tab-pane" id="tab-2">
                             <h3>Neurology</h3>
                             <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                             <img src="<?= base_url('assets/Medicio/'); ?>assets/img/departments-2.jpg" alt="" class="img-fluid">
                             <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
                         </div>
                         <div class="tab-pane" id="tab-3">
                             <h3>Hepatology</h3>
                             <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                             <img src="<?= base_url('assets/Medicio/'); ?>assets/img/departments-3.jpg" alt="" class="img-fluid">
                             <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
                         </div>
                         <div class="tab-pane" id="tab-4">
                             <h3>Pediatrics</h3>
                             <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                             <img src="<?= base_url('assets/Medicio/'); ?>assets/img/departments-4.jpg" alt="" class="img-fluid">
                             <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
                         </div>
                     </div>
                 </div>
             </div>

         </div>
     </section> -->
     <!-- End Departments Section -->

     <!-- ======= Pricing Section ======= -->
     <!-- <section id="pricing" class="pricing">
         <div class="container" data-aos="fade-up">

             <div class="section-title">
                 <h2>Pricing</h2>
                 <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
             </div>

             <div class="row">

                 <div class="col-lg-3 col-md-6">
                     <div class="box" data-aos="fade-up" data-aos-delay="100">
                         <h3>Free</h3>
                         <h4><sup>$</sup>0<span> / month</span></h4>
                         <ul>
                             <li>Aida dere</li>
                             <li>Nec feugiat nisl</li>
                             <li>Nulla at volutpat dola</li>
                             <li class="na">Pharetra massa</li>
                             <li class="na">Massa ultricies mi</li>
                         </ul>
                         <div class="btn-wrap">
                             <a href="#" class="btn-buy">Buy Now</a>
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                     <div class="box featured" data-aos="fade-up" data-aos-delay="200">
                         <h3>Business</h3>
                         <h4><sup>$</sup>19<span> / month</span></h4>
                         <ul>
                             <li>Aida dere</li>
                             <li>Nec feugiat nisl</li>
                             <li>Nulla at volutpat dola</li>
                             <li>Pharetra massa</li>
                             <li class="na">Massa ultricies mi</li>
                         </ul>
                         <div class="btn-wrap">
                             <a href="#" class="btn-buy">Buy Now</a>
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                     <div class="box" data-aos="fade-up" data-aos-delay="300">
                         <h3>Developer</h3>
                         <h4><sup>$</sup>29<span> / month</span></h4>
                         <ul>
                             <li>Aida dere</li>
                             <li>Nec feugiat nisl</li>
                             <li>Nulla at volutpat dola</li>
                             <li>Pharetra massa</li>
                             <li>Massa ultricies mi</li>
                         </ul>
                         <div class="btn-wrap">
                             <a href="#" class="btn-buy">Buy Now</a>
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                     <div class="box" data-aos="fade-up" data-aos-delay="400">
                         <span class="advanced">Advanced</span>
                         <h3>Ultimate</h3>
                         <h4><sup>$</sup>49<span> / month</span></h4>
                         <ul>
                             <li>Aida dere</li>
                             <li>Nec feugiat nisl</li>
                             <li>Nulla at volutpat dola</li>
                             <li>Pharetra massa</li>
                             <li>Massa ultricies mi</li>
                         </ul>
                         <div class="btn-wrap">
                             <a href="#" class="btn-buy">Buy Now</a>
                         </div>
                     </div>
                 </div>

             </div>

         </div>
     </section> -->
     <!-- End Pricing Section -->

     <!-- ======= Frequently Asked Questioins Section ======= -->
     <!-- <section id="faq" class="faq section-bg">
         <div class="container" data-aos="fade-up">

             <div class="section-title">
                 <h2>Frequently Asked Questioins</h2>
                 <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
             </div>

             <ul class="faq-list">

                 <li>
                     <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                     <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                         <p>
                             Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                         </p>
                     </div>
                 </li>

                 <li>
                     <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                     <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                         <p>
                             Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                         </p>
                     </div>
                 </li>

                 <li>
                     <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                     <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                         <p>
                             Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                         </p>
                     </div>
                 </li>

                 <li>
                     <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                     <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                         <p>
                             Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                         </p>
                     </div>
                 </li>

                 <li>
                     <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                     <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                         <p>
                             Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                         </p>
                     </div>
                 </li>

                 <li>
                     <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                     <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                         <p>
                             Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                         </p>
                     </div>
                 </li>

             </ul>

         </div>
     </section> -->
     <!-- End Frequently Asked Questioins Section -->

     <!-- ======= Contact Section ======= -->
     <section id="contact" class="contact">
         <div class="container">

             <div class="section-title">
                 <h2>Contact</h2>
                 <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
             </div>

         </div>

         <div>
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d860.6151079213859!2d106.11238659932202!3d-1.8905816154706359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e22f281c0aad453%3A0xfd11e8456dbcdec2!2sKlinik%20Medicare%20Bangka!5e1!3m2!1sid!2sid!4v1639092632003!5m2!1sid!2sid" style="border:0; width: 100%; height: 350px;" frameborder="0" allowfullscreen="" loading="lazy"></iframe>
         </div>

         <div class="container">

             <div class="row mt-5">

                 <div class="col-lg-6">

                     <div class="row">
                         <div class="col-md-12">
                             <div class="info-box">
                                 <i class="bx bx-map"></i>
                                 <h3>Our Address</h3>
                                 <p>A108 Adam Street, New York, NY 535022</p>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="info-box mt-4">
                                 <i class="bx bx-envelope"></i>
                                 <h3>Email Us</h3>
                                 <p>info@example.com<br>contact@example.com</p>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="info-box mt-4">
                                 <i class="bx bx-phone-call"></i>
                                 <h3>Call Us</h3>
                                 <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                             </div>
                         </div>
                     </div>

                 </div>

                 <div class="col-lg-6">
                     <form action="<?= base_url('assets/Medicio/'); ?>forms/contact.php" method="post" role="form" class="php-email-form">
                         <div class="row">
                             <div class="col form-group">
                                 <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                             </div>
                             <div class="col form-group mt-3">
                                 <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                             </div>
                         </div>
                         <div class="form-group mt-3">
                             <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                         </div>
                         <div class="form-group mt-3">
                             <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                         </div>
                         <div class="my-3">
                             <div class="loading">Loading</div>
                             <div class="error-message"></div>
                             <div class="sent-message">Your message has been sent. Thank you!</div>
                         </div>
                         <div class="text-center"><button type="submit">Send Message</button></div>
                     </form>
                 </div>

             </div>

         </div>
     </section><!-- End Contact Section -->

 </main><!-- End #main -->