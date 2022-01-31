<!-- page content -->
<div class="right_col" role="main">
    <div class="">


        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Halaman Laporan Resep Obat</h2>

                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Kode Rekam Medis</th>
                                                <th>Kode Resep</th>
                                                <th>Nama</th>
                                                <th>Keluhan</th>
                                                <th>Total Bayar Resep</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($resep_obat as $item) { ?>

                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $item->tanggal_resep; ?></td>
                                                    <td><?php echo $item->kd_rm; ?></td>
                                                    <td><?php echo $item->kd_resep; ?></td>
                                                    <td><?php echo $item->nama_pasien; ?></td>
                                                    <td><?php echo $item->keluhan; ?></td>
                                                    <td><?php echo $item->subtotal; ?></td>

                                                </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
</div>