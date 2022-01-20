<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">

            <?= $this->session->flashdata('message'); ?>

            <?php if ($this->session->userdata('role_id') == 1) : ?>
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No Berobat</th>
                                <th scope="col">Tanggal Berobat</th>
                                <th scope="col">Antrian</th>
                                <th scope="col">Poliklinik</th>
                                <th scope="col">Nama Pasien</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">BPJS</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($berobat as $dk) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?> </th>
                                    <td><?= $dk['no_berobat']; ?></td>
                                    <td><?= $dk['tanggal_berobat']; ?></td>
                                    <td><?= $dk['antrian']; ?></td>
                                    <td><?= $dk['nama_poli']; ?></td>
                                    <td><?= $dk['nama_pasien']; ?></td>
                                    <td><?= $dk['alamat_pasien']; ?></td>
                                    <td><?= $dk['status_bpjs']; ?></td>
                                    <td>
                                        <!-- <a href="<?= base_url('dokter/edit'); ?>" class="badge badge-success">edit</a> -->
                                        <a href="<?= base_url(); ?>dokter/hapus/<?= $dk['id_berobat']; ?>" class="badge badge-danger" onclick="return confirm('yakin?');">delete</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php elseif ($this->session->userdata('role_id') == 3) : ?>
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No Berobat</th>
                                <th scope="col">Tanggal Berobat</th>
                                <th scope="col">Antrian</th>
                                <th scope="col">Poliklinik</th>
                                <th scope="col">Nama Pasien</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">BPJS</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($berobat as $dk) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?> </th>
                                    <td><?= $dk['no_berobat']; ?></td>
                                    <td><?= $dk['tanggal_berobat']; ?></td>
                                    <td><?= $dk['antrian']; ?></td>
                                    <td><?= $dk['nama_poli']; ?></td>
                                    <td><?= $dk['nama_pasien']; ?></td>
                                    <td><?= $dk['alamat_pasien']; ?></td>
                                    <td><?= $dk['status_bpjs']; ?></td>
                                    <td>
                                        <a href="<?= base_url('berobat/resep') . "/" . $dk['id_berobat']; ?>" class="badge badge-success"> Beri Resep</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php elseif ($this->session->userdata('role_id') == 4) : ?>
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No Berobat</th>
                                <th scope="col">Tanggal Berobat</th>
                                <th scope="col">Antrian</th>
                                <th scope="col">Poliklinik</th>
                                <th scope="col">Nama Pasien</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">BPJS</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($berobat as $dk) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?> </th>
                                    <td><?= $dk['no_berobat']; ?></td>
                                    <td><?= $dk['tanggal_berobat']; ?></td>
                                    <td><?= $dk['antrian']; ?></td>
                                    <td><?= $dk['nama_poli']; ?></td>
                                    <td><?= $dk['nama_pasien']; ?></td>
                                    <td><?= $dk['alamat_pasien']; ?></td>
                                    <td><?= $dk['status_bpjs']; ?></td>
                                    <td>
                                        <a href="<?= base_url('berobat/resep') . "/" . $dk['id_berobat']; ?>" class="badge badge-success"> Transaksi</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="newDokterModal" tabindex="-1" aria-labelledby="newDokterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDokterModalLabel">Add New Data Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('dokter/add_dokter'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name='nama' placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name='alamat' placeholder="Alamat" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tempat_lahir" name='tempat_lahir' placeholder="Tempat Lahir" required>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="tgl_lahir" name='tgl_lahir' required>
                    </div>
                    <div class="form-check">
                        <div class="row">
                            <div class="col-3">
                                <input type="radio" class="form-check-input" id="laki-laki" name='jenkel' value="laki-laki">
                                <label class="form-check-label" for="laki-laki">
                                    Laki-Laki
                                </label>
                            </div>
                            <div class="col-3">
                                <input type="radio" class="form-check-input" id="perempuan" name='jenkel' value="perempuan">
                                <label class="form-check-label" for="perempuan">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control" id="spesialisasi" name='spesialisasi' placeholder="Spesialisasi" required>
                    </div>
                    <div class="form-group">
                        <select id="inputState" class="form-control" name="poli">
                            <option>Choose Poliklinik</option>
                            <?php foreach ($poli as $pl) : ?>
                                <option value="<?= $pl['id_poli'] ?>"><?= $pl['nama_poli'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <br>
                    <h5>Data Login</h5>
                    <hr>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name='email' placeholder="email" required>
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name='password' placeholder="password" required>
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>