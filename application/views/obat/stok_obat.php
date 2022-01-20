<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Add New Obat</a>
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Obat</th>
                            <th scope="col">Stok Obat</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($obat as $r) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?> </th>
                                <td><?= $r['nama_obat']; ?></td>
                                <td><?= $r['stok_obat']; ?></td>
                                <td><?= $r['satuan']; ?></td>
                                <td><?= $r['keterangan']; ?></td>
                                <td>
                                    <a href="" class="badge badge-warning" data-toggle="modal" data-target="#modal-edit<?= $r['id_obat']; ?>">Edit</a>
                                    <a href="<?= base_url(); ?>obat/hapus/<?= $r['id_obat']; ?>" class="badge badge-danger" onclick="return confirm('yakin?');">delete</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Add New Poli</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('obat/add_obat'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="obat">Nama Obat</label>
                        <input type="text" class="form-control" id="obat" name='obat' placeholder="Nama obat" required>
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control" id="stok" name='stok' placeholder="Stok obat" min="0" required>
                        <label for="satuan">Satuan</label>
                        <select class="form-control" name="satuan" id="satuan">
                            <option value="">Pilih Satuan</option>
                            <option value="Tablet">Tablet</option>
                            <option value="Strip">Strip</option>
                            <option value="Botol">Botol</option>
                            <option value="Lembar">Lembar</option>
                        </select>
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="3" required></textarea>
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

<?php foreach ($obat as $o) : ?>
    <div class="modal fade" id="modal-edit<?= $o['id_obat']; ?>" tabindex="-1" aria-labelledby="modal-edit<?= $o['id_obat'] ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newMenuModalLabel">Edit Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('obat/update_obat'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id_obat" value="<?= $o['id_obat']; ?>">
                        <div class="form-group">
                            <label for="obat">Nama Obat</label>
                            <input type="text" class="form-control" id="obat" name='obat' placeholder="Nama obat" value="<?= $o['nama_obat']; ?>"">
                            <label for=" stok">Stok</label>
                            <input type="number" class="form-control" id="stok" name='stok' placeholder="Stok obat" min="0" value="<?= $o['stok_obat']; ?>">
                            <label for=" satuan">Satuan</label>
                            <select class="form-control" name="satuan" id="satuan">
                                <?php if ($o['satuan'] == 'Tablet') : ?>
                                    <option value="Tablet" selected>Tablet</option>
                                    <option value="Strip">Strip</option>
                                    <option value="Botol">Botol</option>
                                    <option value="Lembar">Lembar</option>
                                <?php elseif ($o['satuan'] == 'Strip') : ?>
                                    <option value="Tablet">Tablet</option>
                                    <option value="Strip" selected>Strip</option>
                                    <option value="Botol">Botol</option>
                                    <option value="Lembar">Lembar</option>
                                <?php elseif ($o['satuan'] == 'Botol') : ?>
                                    <option value="Tablet">Tablet</option>
                                    <option value="Strip">Strip</option>
                                    <option value="Botol" selected>Botol</option>
                                    <option value="Lembar">Lembar</option>
                                <?php elseif ($o['satuan'] == 'Lembar') : ?>
                                    <option value="Tablet">Tablet</option>
                                    <option value="Strip">Strip</option>
                                    <option value="Botol">Botol</option>
                                    <option value="Lembar" selected>Lembar</option>
                                <?php endif ?>
                            </select>
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="3"><?= $o['keterangan'] ?></textarea>
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
<?php endforeach ?>