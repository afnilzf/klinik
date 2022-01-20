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
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newDokterModal">Add New Info</a>
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal Buat</th>
                                <th scope="col">Judul Info</th>
                                <th scope="col">Isi</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($info as $dk) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?> </th>
                                    <td><?= $dk['tanggal_info']; ?></td>
                                    <td><?= $dk['judul_info']; ?></td>
                                    <td><?= $dk['isi_info']; ?></td>
                                    <td><a href="<?= base_url('assets/upload/gambar-info/') . $dk['gambar_info']; ?>" target="_blank"><img src="<?= base_url('assets/upload/gambar-info/') . $dk['gambar_info']; ?>" style="width: 130px; height:100px"></a>
                                    </td>
                                    <td>

                                        <a href="<?= base_url(); ?>info/hapus/<?= $dk['id_info']; ?>" class="badge badge-danger" onclick="return confirm('yakin?');">delete</a>
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
                <h5 class="modal-title" id="newDokterModalLabel">Add New Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" <?php echo form_open_multipart("info/add_info") ?>>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="judul" name='judul' placeholder="Judul" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="isi" id="isi" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile02">
                                <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                            </div>
                        </div>
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