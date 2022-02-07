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

            <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 4) : ?>
                <div class="table-responsive">
                    <table class="table table-hover" id="example" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No.Transaksi</th>
                                <th scope="col">No.Berobat</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($transaksi as $dk) : ?>
                                <tr>
                                    <td><?= $i; ?> </td>
                                    <td><?= $dk['id']; ?></td>
                                    <td><?= $dk['no_berobat']; ?></td>
                                    <td><?= $dk['tanggal_berobat']; ?></td>
                                    <td><?= "Rp." . number_format($dk['total'], 2, ",", ".") ?></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                            <tr>
                                <td class="text-center">TOTAL</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>=</td>
                                <td><?= "Rp." . number_format((int)$total['hasil'], 2, ",", "."); ?></td>
                            </tr>
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->