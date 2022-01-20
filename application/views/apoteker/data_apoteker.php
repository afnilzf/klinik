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
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newDokterModal">Add New Data Apoteker</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($apoteker as $dk) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?> </th>
                                <td><?= $dk['nama']; ?></td>
                                <td><?= $dk['alamat']; ?></td>
                                <td>
                                    <a href="" class="badge badge-success" data-toggle="modal" data-target="#modal-edit<?= $dk['id_apoteker']; ?>">Edit</a>
                                    <a href="<?= base_url(); ?>apoteker/hapus_apoteker/<?= $dk['id_apoteker']; ?>" class="badge badge-danger" onclick="return confirm('yakin?');">delete</a>
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
            <form action="<?= base_url('apoteker/add_apoteker'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name='nama' placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name='alamat' placeholder="Alamat" required>
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
<?php foreach ($apoteker as $dk) : ?>
    <div class="modal fade" id="modal-edit<?= $dk['id_apoteker']; ?>" tabindex="-1" aria-labelledby="newDokterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newDokterModalLabel">Edit Apoteker</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('apoteker/update_apoteker'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="<?= $dk['id_apoteker'] ?>">
                            <input type="text" class="form-control" id="nama" name='nama' value="<?= $dk['nama'] ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="alamat" name='alamat' value="<?= $dk['alamat'] ?>" required>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>