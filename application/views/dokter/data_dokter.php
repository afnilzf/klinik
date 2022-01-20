<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <!-- <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?> -->

            <?= $this->session->flashdata('message'); ?>

            <?php if ($this->session->userdata('role_id') == 1) : ?>
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newDokterModal">Add New Data Dokter</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Tempat Tanggal Lahir</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Spesialisasi</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($dokter as $dk) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?> </th>
                                <td><?= $dk['nama']; ?></td>
                                <td><?= $dk['alamat']; ?></td>
                                <td><?= $dk['tempat_lahir']; ?></td>
                                <td><?= $dk['jenis_kel']; ?></td>
                                <td><?= $dk['spesialisasi']; ?></td>
                                <td>
                                    <a href="" class="badge badge-success" data-toggle="modal" data-target="#modal-edit<?= $dk['id_dokter']; ?>">Edit</a>
                                    <a href="<?= base_url(); ?>dokter/hapus_dokter/<?= $dk['id_dokter']; ?>" class="badge badge-danger" onclick="return confirm('yakin?');">delete</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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

<!-- Modal -->
<?php foreach ($dokter as $dk) : ?>
    <div class="modal fade" id="modal-edit<?= $dk['id_dokter']; ?>" tabindex="-1" aria-labelledby="newDokterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newDokterModalLabel">Edit Data Dokter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('dokter/update_dokter'); ?>" method="post">
                    <input type="hidden" name="id_dokter" id="id_dokter" value="<?= $dk['id_dokter'] ?>">
                    <input type="hidden" name="id_user" id="id_user" value="<?= $dk['id_user'] ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name='nama' value="<?= $dk['nama'] ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="alamat" name='alamat' value="<?= $dk['alamat'] ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="tempat_lahir" name='tempat_lahir' value="<?= $dk['tempat_lahir'] ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" id="tgl_lahir" name='tgl_lahir' value="<?= $dk['tgl_lahir'] ?>" required>
                        </div>
                        <div class="form-check">
                            <div class="row">
                                <?php if ($dk['jenis_kel'] == 'laki-laki') : ?>
                                    <div class="col-3">
                                        <input type="radio" class="form-check-input" id="laki-laki" name='jenkel' value="laki-laki" checked>
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
                                <?php else : ?>
                                    <div class="col-3">
                                        <input type="radio" class="form-check-input" id="laki-laki" name='jenkel' value="laki-laki">
                                        <label class="form-check-label" for="laki-laki">
                                            Laki-Laki
                                        </label>
                                    </div>
                                    <div class="col-3">
                                        <input type="radio" class="form-check-input" id="perempuan" name='jenkel' value="perempuan" checked>
                                        <label class="form-check-label" for="perempuan">
                                            Perempuan
                                        </label>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" class="form-control" id="spesialisasi" name='spesialisasi' value="<?= $dk['spesialisasi'] ?>" required>
                        </div>
                        <div class="form-group">
                            <select id="inputState" class="form-control" name="poli">
                                <option>Choose Poliklinik</option>
                                <?php foreach ($poli as $pl) : ?>
                                    <?php if ($pl['id_poli'] == $dk['id_poli']) : ?>
                                        <option value="<?= $pl['id_poli'] ?>" selected><?= $pl['nama_poli'] ?></option>
                                    <?php else : ?>
                                        <option value="<?= $pl['id_poli'] ?>"><?= $pl['nama_poli'] ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>