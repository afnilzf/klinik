<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-8">
            <!-- <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?> -->

            <?= $this->session->flashdata('message'); ?>

            <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 4) : ?>
                <div class="table-responsive">
                    <table class="table table-hover" id="example" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No.Transaksi</th>
                                <th scope="col">No.Berobat</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($transaksi as $dk) : ?>
                                <?php $stok_awal = (int)$dk['stok_obat'] + (int)$dk['qty']; ?>
                                <tr>
                                    <th scope="row"><?= $i; ?> </th>
                                    <td><?= $dk['id']; ?></td>
                                    <td><?= $dk['no_berobat']; ?></td>
                                    <td><?= $dk['tanggal_berobat']; ?></td>
                                    <td><?= "Rp." . number_format($dk['total'], 2, ",", ".") ?></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif ?>
        </div>
        <div class="col-4">

            <?= $this->session->flashdata('message'); ?>

            <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 4) : ?>
                <form action="<?= base_url('Transaksi/rekapHarian'); ?>" method="post" role="form">
                    <label for="date">Rekap Harian</label>
                    <input type="date" name="date" class="form-control datepicker" id="date" placeholder="Pilih tanggal"><br>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
                <hr>
                <form action="<?= base_url('Transaksi/rekapBulanan'); ?>" method="post" role="form" c>
                    <label for="date">Rekap Bulanan</label>
                    <select class="form-control" name="bulan" id="bulan">
                        <option value="">-Pilih Bulan-</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select><br>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            <?php endif ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->