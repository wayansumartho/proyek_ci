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
                            <?php if (!empty($this->session->flashdata('pesan1'))) {; ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span class="alert-text"> <?php echo $this->session->flashdata('pesan1'); ?></span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>
                            <?php if (!empty($this->session->flashdata('pesan2'))) {; ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <span class="alert-text"> <?php echo $this->session->flashdata('pesan2'); ?></span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>
                            <?php if (!empty($this->session->flashdata('pesan3'))) {; ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="alert-text"> <?php echo $this->session->flashdata('pesan3'); ?></span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>
                            <form method="POST" action="<?php echo site_url('Dokter/aksi_periksa'); ?>">
                                <div class="row">


                                    <div class="col-md-6 col-sm-12  form-group">
                                        <label>Kode Rekam Medis</label>
                                        <input class="form-control" value="<?php echo $pasien->kd_rm; ?>" required="required" type="text" disabled />
                                        <input class="form-control" value="<?php echo $pasien->kd_rm; ?>" name="kd_rm" required="required" type="text" hidden />
                                    </div>

                                    <div class="col-md-6 col-sm-12  form-group">
                                        <label>Nama Pasien</label>
                                        <input class="form-control" value="<?php echo $pasien->nama_pasien; ?>" required="required" type="text" disabled />
                                    </div>
                                    <div class="col-md-6 col-sm-12  form-group">
                                        <label>Tempat Tanggal Lahir</label>
                                        <input class="form-control" value="<?php echo $pasien->tempat_lahir; ?>, <?php echo $pasien->tanggal_lahir ?>" required="required" type="text" disabled />
                                    </div>

                                    <div class="col-md-6 col-sm-12  form-group">
                                        <label>Jenis Kelamin</label>
                                        <input class="form-control" value="<?php echo $pasien->jenkel; ?>" required="required" type="text" disabled />
                                    </div>
                                    <div class="col-md-6 col-sm-12  form-group">
                                        <label>Alamat</label>
                                        <input class="form-control" value="<?php echo $pasien->alamat; ?>" required="required" type="text" disabled />
                                    </div>

                                    <div class="col-md-6 col-sm-12  form-group">
                                        <label>Telepon</label>
                                        <input class="form-control" value="<?php echo $pasien->telp; ?>" required="required" type="text" disabled />
                                    </div>
                                    <div class="col-md-6 col-sm-12  form-group">
                                        <label>Tanggal Periksa</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d') ?>" hidden>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d') ?>" disabled>
                                    </div>

                                    <div class="col-md-6 col-sm-12  form-group">
                                        <label>Kode Pemeriksaan</label>
                                        <input class="form-control" value="<?php echo $kode_periksa; ?>" required="required" type="text" disabled />
                                        <input class="form-control" value="<?php echo $kode_periksa; ?>" name="id_periksa" required="required" type="text" hidden />
                                    </div>
                                    <div class="col-md-6 col-sm-12  form-group">
                                        <label>Keluhan</label>
                                        <textarea class="resizable_textarea form-control" required="required" name='keluhan'></textarea>
                                    </div>

                                    <div class="col-md-6 col-sm-12  form-group">
                                        <label>Diagnosa</label>
                                        <textarea class="resizable_textarea form-control" required="required" name='diagnosa'></textarea>
                                    </div>
                                    <div class="col-md-6 col-sm-12  form-group">
                                        <select class="form-control" name="tindakan" required>
                                            <option value="0">
                                                <p style="color: gray;">Pilih Tindakan</p>
                                                <?php foreach ($tindakan as $val) { ?>
                                            <option value="<?php echo $val->nama_pel; ?><?= set_value('nama_pel'); ?>"><?= form_error('nama_pel', '<div class="text-danger small">', '</div>'); ?><?php echo $val->nama_pel; ?></option>
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
                                            <a href="<?php echo site_url('Dokter/pemeriksaan'); ?>" class="btn btn-primary">Kembali</a>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="x_title">
                                    <h2>Hasil Data Pemeriksaan</h2>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Kode Pemeriksaan</th>
                                                <th>Diagnosa</th>
                                                <th>Keluhan</th>
                                                <th>Tindakan</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($periksa as $item) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $item->tanggal; ?></td>
                                                    <td><?php echo $item->id_periksa; ?></td>
                                                    <td><?php echo $item->diagnosa; ?></td>
                                                    <td><?php echo $item->keluhan;  ?></td>
                                                    <td><?php echo $item->tindakan;  ?></td>
                                                    <td>
                                                        <a href="<?php echo site_url('Dokter/delete_periksa/' . $item->id_periksa . '/' . $item->kd_rm . '" class="btn btn-danger btn-sm" '); ?>" class="btn btn-danger">Hapus</a>

                                                    </td>
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