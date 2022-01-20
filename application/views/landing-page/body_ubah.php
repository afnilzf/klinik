<main id="main">


    <section id="search" class="contact">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-12">

                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url('home/update/') . $berobat['id_berobat'] ?>" method="post" role="form" class="php-email-form">


                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bx bx-user-circle"></i>
                                <h3>Nama</h3>
                                <p><?= $berobat['nama_pasien']; ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <h3>Alamat</h3>
                                <p><?= $berobat['alamat_pasien']; ?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box mt-2">
                                <i class="bx bx-id-card"></i>
                                <h3>BPJS</h3>
                                <p><?= $berobat['status_bpjs']; ?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box mt-2">
                                <i class="fas fa-pager"></i>
                                <h3>NO.Berobat</h3>
                                <p><?= $berobat['no_berobat']; ?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box mt-2">
                                <i class="fas fa-hand-holding-medical"></i>
                                <h3>Poliklinik</h3>
                                <p><?= $berobat['nama_poli']; ?></p>
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
                                <p><?= $berobat['keluhan']; ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="info-box mt-4">
                                <i class="bx bx-calendar "></i>
                                <h3>Tanggal Berobat</h3>
                                <input type="date" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" value="<?= $berobat['tanggal_berobat']; ?>">
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="fas fa-sort-amount-down"></i>
                                <h3>No.Antrian</h3>
                                <p><?= $berobat['antrian']; ?></p>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <!-- Button trigger modal -->
                            <div>
                                <button type="submit" class="btn btn-info float-end swalDefaultSuccess">Rechedule</button>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->