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
                            <form method="POST" action="<?php echo site_url('Pembayaran/simpan'); ?>">
                                <div class="row">

                                    <div class="col-md-6 col-sm-12  form-group">
                                        <label>Kode Pembayaran</label>
                                        <input class="form-control" value="<?php echo $kode_bayar; ?>" required="required" type="text" disabled />
                                        <input class="form-control" value="<?php echo $kode_bayar; ?>" name="kd_bayar" required="required" type="text" hidden />
                                    </div>

                                    <div class="col-md-6 col-sm-12  form-group">
                                        <label>Kode Rekam Medis</label>
                                        <input class="form-control" value="<?php echo $pasien->kd_rm; ?>" required="required" type="text" disabled />
                                        <input class="form-control" value="<?php echo $pasien->kd_rm; ?>" name="kd_rm" required="required" type="text" hidden />
                                    </div>

                                    <div class="col-md-6 col-sm-12  form-group">
                                        <label>Id Pemeriksaan</label>
                                        <input class="form-control" value="<?php echo $pasien->id_periksa; ?>" required="required" type="text" disabled />
                                        <input class="form-control" value="<?php echo $pasien->id_periksa; ?>" name="id_periksa" required="required" type="text" hidden />
                                    </div>

                                    <div class="col-md-6 col-sm-12  form-group">
                                        <label>Kode Resep</label>
                                        <input class="form-control" value="<?php echo $pasien->kd_resep; ?>" required="required" type="text" disabled />
                                        <input class="form-control" value="<?php echo $pasien->kd_resep; ?>" name="kd_resep" required="required" type="text" hidden />
                                    </div>

                                    <div class="col-md-6 col-sm-12  form-group">
                                        <label>Pengobatan</label>
                                        <input class="form-control" value="<?php echo $pasien->pengobatan; ?>" required="required" type="text" disabled />
                                    </div>
                                    <div class="col-md-6 col-sm-12  form-group">
                                        <label>Tanggal Pembayaran</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d') ?>">
                                    </div>
                                    <div class="col-md-6 col-sm-12  form-group">
                                        <select class="form-control" name="id_pel" required>
                                            <option value="0">
                                                <p style="color: gray;">Pilih Pelayanan</p>
                                                <?php foreach ($pel as $val) { ?>
                                            <option value="<?php echo $val->id_pel; ?><?= set_value('id_pel'); ?>"><?= form_error('id_pel', '<div class="text-danger small">', '</div>'); ?><?php echo $val->id_pel; ?> - <?php echo $val->nama_pel; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label>Tindakan</label>
                                        <textarea class="resizable_textarea form-control" name="tindakan" disabled><?php echo $pasien->tindakan; ?></textarea>
                                    </div>

                                    <div class="col-md-6 col-sm-12  form-group">
                                        <select class="form-control" name="harga" required>
                                            <option value="0">
                                                <p style="color: gray;">Pilih harga</p>
                                                <?php foreach ($pel as $val) { ?>
                                            <option value="<?php echo $val->harga; ?><?= set_value('harga'); ?>"><?= form_error('harga', '<div class="text-danger small">', '</div>'); ?><?php echo $val->nama_pel; ?> - <?php echo $val->harga; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>


                                </div>
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <br>
                                            <button type='submit' class="btn btn-primary">Tambah</button>
                                            <button type='reset' class="btn btn-success">Reset</button>
                                            <a href="<?php echo site_url('Pembayaran'); ?>" class="btn btn-primary">Kembali</a>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="x_title">
                                    <h2>Data Pembayaran</h2>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jasa</th>
                                                <th>Harga</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($bayar as $item) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $item->nama_pel; ?></td>
                                                    <td><?php echo $item->total; ?></td>

                                                </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
</div>