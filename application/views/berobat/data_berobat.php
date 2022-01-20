<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <?php if ($this->session->userdata('role_id') == 3) : ?>
            <div class="col-lg-6">
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                <?= $this->session->flashdata('message'); ?>

                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Add New Resep</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">No.Berobat</th>
                            <th scope="col">Nama obat</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($resep as $r) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?> </th>
                                <td><?= $r['no_berobat']; ?></td>
                                <td><?= $r['nama_obat']; ?></td>
                                <td><?= $r['keterangan_pakai']; ?></td>
                                <td>
                                    <a href="" class="badge badge-warning" data-toggle="modal" data-target="#modal-edit<?= $r['id_resep']; ?>">Edit</a>
                                    <a href="<?= base_url(); ?>obat/hapus/<?= $r['id_resep']; ?>" class="badge badge-danger" onclick="return confirm('yakin?');">delete</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <form action="<?= base_url('berobat/simpan_resep'); ?>" method="post">
                    <input type="hidden" name="id_berobat" id="id_berobat" value="<?= $this->uri->segment(3); ?>">
                    <button type="submit" class="btn btn-success float-right">Simpan Resep</button>
                </form>

            </div>
            <div class="col-lg-6">
                <h1>Data Obat</h1>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Obat</th>
                            <th scope="col">Stok Obat</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Keterangan</th>
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
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        <?php elseif ($this->session->userdata('role_id') == 4) : ?>
            <div class="col-lg-12">
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                <?= $this->session->flashdata('message'); ?>
                <?php if ($transaksi == null) : ?>
                    <form action="<?= base_url('berobat/simpan_transaksi'); ?>" method="post">
                        <input type="hidden" name="id_berobat" id="id_berobat" value="<?= $this->uri->segment(3); ?>">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">No.Berobat</th>
                                    <th scope="col">Nama obat</th>
                                    <th scope="col">Keterangan</th>
                                    <th width="5%" scope="col">Banyak</th>
                                    <th width="20%" scope="col">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($resep as $r) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?> </th>
                                        <td><?= $r['no_berobat']; ?></td>
                                        <td><?= $r['nama_obat']; ?></td>
                                        <td><?= $r['keterangan_pakai']; ?></td>
                                        <td><input type="number" min="0" name="jumlah<?= $i ?>" id="jumlah<? $i ?>" class="form-control" width="5%"></td>
                                        <td><?= "Rp." . number_format($r['harga_jual'], 2, ",", ".") ?></td>

                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="4">Total</td>
                                    <td class="text-center">=</td>
                                    <td widh="5%"> <input type="number" disabled id="total" name="total" class="form-control" width="5%"></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php if ($berobat['status_bpjs'] == 'Ada') : ?>
                            <span class="badge badge-success">BPJS: &nbsp;&nbsp;Ada<i class="fas fa-check-square"></i></span>
                        <?php elseif ($berobat['status_bpjs'] == 'Tidak') : ?>
                            <span class="badge badge-danger">BPJS: &nbsp;&nbsp;Tidak Ada<i class="fas fa-times-circle"></i></span>
                        <?php endif ?>


                        <button type="submit" class="btn btn-success float-right">Simpan Transaksi</button>
                    </form>
                <?php else : ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No.Berobat</th>
                                <th scope="col">Nama obat</th>
                                <th scope="col">Keterangan</th>
                                <th width="5%" scope="col">Banyak</th>
                                <th width="20%" scope="col">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($transaksi as $r) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?> </th>
                                    <td><?= $r['no_berobat']; ?></td>
                                    <td><?= $r['nama_obat']; ?></td>
                                    <td><?= $r['keterangan_pakai']; ?></td>
                                    <td><?= $r['qty']; ?></td>
                                    <td><?= "Rp." . number_format($r['harga_jual'], 2, ",", ".") ?></td>

                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4">Total</td>
                                <td class="text-center">=</td>
                                <td widh="5%"><?= "Rp." . number_format($jumlah['total'], 2, ",", ".") ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php if ($berobat['status_bpjs'] == 'Ada') : ?>
                        <span class="badge badge-success">BPJS: &nbsp;&nbsp;Ada&nbsp;<i class="fas fa-check-square"></i></span>
                    <?php elseif ($berobat['status_bpjs'] == 'Tidak') : ?>
                        <span class="badge badge-danger">BPJS: &nbsp;&nbsp;Tidak Ada<i class="fas fa-times-circle"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </div>
        <?php endif ?>
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
                <h5 class="modal-title" id="newRoleModalLabel">Add Resep</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('berobat/add_resep'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id_berobat" id="id_berobat" value="<?= $this->uri->segment(3); ?>">
                        <label for="obat">Nama Obat</label>
                        <select class="form-control" name="obat" id="obat">
                            <option value="">Pilih Obat</option>
                            <?php foreach ($obat as $r) : ?>
                                <option value="<?= $r['id_obat']; ?>"><?= $r['nama_obat']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <label for="keterangan">Keterangan Pakai</label>
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

<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var jum = 0;
        <?php $i = 1;
        foreach ($resep as $r) : ?>
            $("#jumlah<?= $i ?>").keyup(function() {
                total = $("#jumlah<?= $i ?>").val() * $("<?= $r['harga_jual'] ?>").val();
                hasil = total;
                console.log(total);
                $("#total<?php echo $i ?>").val(hasil);
                //Total Seluruh
                jum += parseInt(hasil);
                sum_total = jum;
                $("#total").val(sum_total);
            });
            <?php $i++ ?>
        <?php endforeach ?>
    });
</script>

<script>
    $(document).ready(function() {
        var jumlah = 0;
        <?php $j = 1;
        foreach ($tampil_kriteria as $baris) : ?>
            $("#hitung").on("click", function() {
                jumlah += parseFloat($("#total_penilaian<?php echo $j ?>").val());
                $("#total_seluruh").val(jumlah);
            });
            <?php $j++ ?>
        <?php endforeach ?>
    });
</script>