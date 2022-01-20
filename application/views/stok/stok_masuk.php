<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Add New Stok</a>
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Obat</th>
                            <th scope="col">Stok Masuk</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($stok_masuk as $r) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?> </th>
                                <td><?= $r['nama_obat']; ?></td>
                                <td><?= $r['stok_masuk']; ?></td>
                                <td><?= $r['tanggal_masuk']; ?></td>
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
                <h5 class="modal-title" id="newRoleModalLabel">Add New Stok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('stok/add_stok'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="obat">Nama Obat</label>
                        <select class="form-control" name="obat" id="obat">
                            <option value="">Pilih Obat</option>
                            <?php foreach ($obat as $r) : ?>
                                <option value="<?= $r['id_obat']; ?>"><?= $r['nama_obat']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control" id="stok" name='stok' placeholder="Stok obat" min="0" required>
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

<?php foreach ($stok_masuk as $o) : ?>
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
                            <select class="form-control" name="obat" id="obat">
                                <option value="">Pilih Obat</option>
                                <?php foreach ($obat as $r) : ?>
                                    <option value="<?= $r['id_obat']; ?>"><?= $r['nama_obat']; ?></option>
                                <?php endforeach ?>
                            </select>
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