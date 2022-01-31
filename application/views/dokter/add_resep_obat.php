<!-- page content -->
<div class="right_col" role="main">
    <div class="">


        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">

                        <h2>Halaman Tambah Resep Pasien</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_title">

                        <h2>Informasi Pasien</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_panel">

                        <div class="x_content">
                            <form method="POST" action="<?php echo site_url('Dokter/aksi_resep'); ?>">
                                <div class="row">


                                    <div class="col-md-6 col-sm-12  form-group">
                                        <label>Kode Rekam Medis</label>
                                        <input class="form-control" value="<?php echo $resep->kd_rm; ?>" required="required" type="text" disabled />
                                        <input class="form-control" value="<?php echo $resep->kd_rm; ?>" name="kd_rm" required="required" type="text" hidden />

                                    </div>

                                    <div class="col-md-6 col-sm-12  form-group">
                                        <label>Kode Pemeriksaan</label>
                                        <input class="form-control" value="<?php echo $resep->id_periksa; ?>" required="required" type="text" disabled />
                                        <input class="form-control" value="<?php echo $resep->id_periksa; ?>" name="id_periksa" required="required" type="text" hidden />
                                    </div>
                                    <div class="col-md-6 col-sm-12  form-group">
                                        <label>Nama Pasien</label>
                                        <input class="form-control" value="<?php echo $resep->nama_pasien; ?>" required="required" type="text" disabled />
                                    </div>

                                    <div class="col-md-6 col-sm-12  form-group">
                                        <label>Pengobatan</label>
                                        <input class="form-control" value="<?php echo $resep->pengobatan; ?>" required="required" type="text" disabled />
                                        <input class="form-control" value="<?php echo $resep->pengobatan ?>" name="pengobatan" required="required" type="text" hidden />
                                    </div>

                                    <div class="col-md-6 col-sm-12  form-group">
                                        <label>Tanggal Resep</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d') ?>" hidden>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d') ?>" disabled>
                                    </div>

                                    <div class="col-md-6 col-sm-12  form-group">
                                        <label>Kode Resep</label>
                                        <input class="form-control" value="<?php echo $kode_resep; ?>" required="required" type="text" disabled />
                                        <input class="form-control" value="<?php echo $kode_resep; ?>" name="kd_resep" required="required" type="text" hidden />
                                    </div>
                                    <div class="col-md-3 col-sm-12  form-group">
                                        <label>Nama Obat</label>
                                        <select class="select2_single form-control" name="obat" tabindex="-1">
                                            <option value="0">Pilih Obat</option>
                                            <?php foreach ($obat as $val) { ?>
                                                <option value="<?php echo $val->kd_obat; ?><?= set_value('kd_obat'); ?>"><?= form_error('kd_obat', '<div class="text-danger small">', '</div>'); ?><?php echo $val->nama_obat; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-md-3 col-sm-12  form-group">
                                        <label>Harga</label>
                                        <select class="select2_single form-control" name="harga" tabindex="-1">
                                            <option value="0">Pilih Harga Obat</option>
                                            <?php foreach ($obat as $val) { ?>
                                                <option value="<?php echo $val->harga; ?><?= set_value('harga'); ?>"><?= form_error('harga', '<div class="text-danger small">', '</div>'); ?><?php echo $val->harga; ?> - <?php echo $val->nama_obat; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-md-3 col-sm-12  form-group">
                                        <label>Stok Obat</label>
                                        <select class="select2_single form-control" name="stok" tabindex="-1">
                                            <option value="0">Pilih Stok Obat</option>
                                            <?php foreach ($obat as $val) { ?>
                                                <option value="<?php echo $val->stok; ?><?= set_value('stok'); ?>"><?= form_error('stok', '<div class="text-danger small">', '</div>'); ?><?php echo $val->stok; ?> - <?php echo $val->nama_obat; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-md-3 col-sm-12  form-group">
                                        <label>Stok Keluar</label>
                                        <input name="stok_out" type="number" class="form-control">
                                    </div>
                                    <div class="col-md-12 col-sm-12  form-group">
                                        <label>Aturan Pakai</label>
                                        <select class="select2_single form-control" name="aturan" tabindex="-1">
                                            <option value="0">Pilih Aturan / Cari</option>
                                            <?php foreach ($aturan as $val) { ?>
                                                <option value="<?php echo $val->id; ?><?= set_value('id'); ?>"><?= form_error('id', '<div class="text-danger small">', '</div>'); ?><?php echo $val->id ?> - <?php echo $val->nama_aturan; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <br>
                                            <button type='submit' class="btn btn-primary">Submit</button>
                                            <button type='reset' class="btn btn-success">Reset</button>
                                            <a href="<?php echo site_url('Dokter/resep_obat'); ?>" class="btn btn-primary">Kembali</a>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="x_title">
                        <h2>Data Resep Obat</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Obat</th>
                                                <th>Aturan Pakai</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Stok Keluar</th>
                                                <th>Total Stok</th>
                                                <th>Total Bayar</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($data_resep as $item) { ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $item->nama_obat; ?></td>
                                                    <td><?php echo $item->nama_aturan; ?></td>
                                                    <td><?php echo $item->subtotal; ?></td>
                                                    <td><?php echo $item->stok; ?></td>
                                                    <td><?php echo $item->stok_out; ?></td>
                                                    <td><?php echo $item->stok_out; ?></td>
                                                    <td><?php echo $item->total; ?></td>

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