<!-- page content -->
<div class="right_col" role="main">
    <div class="">


        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Halaman Tambah Pemeriksaan</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_panel">

                        <div class="x_content">

                            <div class="row">

                                <div class="col-md-6 col-sm-12  form-group">
                                    <label>Kode Rekam Medis</label>
                                    <input class="form-control" value="<?php echo $pasien->kd_rm; ?>" required="required" type="text" disabled />
                                    <input class="form-control" value="<?php echo $pasien->kd_rm; ?>" name="kd_rm" required="required" type="text" hidden />
                                </div>
                                <div class="col-md-6 col-sm-12  form-group">
                                    <input class="form-control" value="0" required="required" type="text" hidden />
                                </div>
                                <div class="col-md-6 col-sm-12  form-group">
                                    <label>Nama Pasien</label>
                                    <input class="form-control" value="<?php echo $pasien->nama_pasien; ?>" required="required" type="text" disabled />
                                    <input class="form-control" value="<?php echo $pasien->nama_pasien; ?>" name="kd_rm" required="required" type="text" hidden />
                                </div>
                                <div class="col-md-6 col-sm-12  form-group">
                                    <input class="form-control" value="0" required="required" type="text" hidden />
                                </div>
                                <div class="col-md-6 col-sm-12  form-group">
                                    <label>Kode Pemeriksaan</label>
                                    <input class="form-control" value="<?php echo $pasien->id_periksa; ?>" required="required" type="text" disabled />
                                    <input class="form-control" value="<?php echo $pasien->id_periksa; ?>" name="kd_rm" required="required" type="text" hidden />
                                </div>

                            </div>


                        </div>
                    </div>

                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Bayar</th>
                                                <th>Total Bayar</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($detail_bayar as $item) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $item->kd_bayar; ?></td>
                                                    <td><?php echo $item->totalbayar; ?></td>


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