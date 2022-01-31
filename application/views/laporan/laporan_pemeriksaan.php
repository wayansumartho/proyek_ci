<!-- page content -->
<div class="right_col" role="main">
    <div class="">


        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Halaman Data Rekam Medis</h2>

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
                                                <th>Tanggal Pemeriksaan</th>
                                                <th>Kode Rekam Medis</th>
                                                <th>Kode Pemeriksaan</th>
                                                <th>Nama</th>
                                                <th>Keluhan</th>
                                                <th>Diagnosis</th>
                                                <th>Tindakan</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($periksa as $item) {
                                            ?>

                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($item->tanggal)); ?></td>
                                                    <td><?php echo $item->kd_rm; ?></td>
                                                    <td><?php echo $item->id_periksa; ?></td>
                                                    <td><?php echo $item->nama_pasien; ?></td>
                                                    <td><?php echo $item->keluhan; ?></td>
                                                    <td><?php echo $item->diagnosa;  ?></td>
                                                    <td><?php echo $item->tindakan; ?></td>


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