<!-- page content -->
<div class="right_col" role="main">
    <div class="">


        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Halaman Laporan Obat</h2>

                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Kode Obat</th>
                                                <th>Nama Obat</th>
                                                <th>Stok</th>
                                                <th>Harga</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            foreach ($obat as $item) { ?>

                                                <tr>
                                                    <td><?php echo $item->kd_obat; ?></td>
                                                    <td><?php echo $item->nama_obat; ?></td>
                                                    <td><?php echo $item->stok; ?></td>
                                                    <td><?php echo $item->harga; ?></td>

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