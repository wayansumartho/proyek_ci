<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Halaman Edit Pasien</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php if (!empty($this->session->flashdata('pesan2'))) {; ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <span class="alert-text"> <?php echo $this->session->flashdata('pesan2'); ?></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php } ?>
                        <form method="POST" action="<?php echo site_url('Pasien/aksi_update'); ?>">


                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Kode Pasien<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" value="<?php echo $pasien->id_pasien; ?>" required="required" type="text" disabled />
                                    <input class="form-control" value="<?php echo $pasien->id_pasien; ?>" name="id_pasien" required="required" type="text" hidden />
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Pasien<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='optional' value="<?php echo $pasien->nama_pasien; ?>" name="nama" placeholder="Masukan Nama Pasien" type="text" />
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                        <?php if ($pasien->jenkel == 'Laki-Laki') { ?>
                                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" value="Laki-laki" name="jenkel" class="join-btn">
                                                &nbsp; Laki-laki &nbsp;
                                            </label>
                                            <label class="btn btn-secondary" data-toggle-class="btn-secondary" data-toggle-passive-class="btn-default">
                                                <input type="radio" value="Perempuan" name="jenkel" class="join-btn">
                                                &nbsp; Perempuan &nbsp;
                                            </label>


                                        <?php } else { ?>
                                            <label class="btn btn-secondary" data-toggle-class="btn-secondary" data-toggle-passive-class="btn-default">
                                                <input type="radio" value="Perempuan" name="jenkel" class="join-btn">
                                                &nbsp; Perempuan &nbsp;
                                            </label>
                                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" value="Laki-laki" name="jenkel" class="join-btn">
                                                &nbsp; Laki-laki &nbsp;
                                            </label>

                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Tempat Lahir<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" class='optional' value="<?php echo $pasien->tempat_lahir; ?>" name="tempat_lahir" placeholder="Masukan Tempat Lahir" required='required' />
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal Lahir<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='date' type="date" value="<?php echo $pasien->tanggal_lahir; ?>" name="tanggal_lahir" required='required'>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea class="resizable_textarea form-control" name="alamat" placeholder="Alamat"><?php echo $pasien->alamat; ?></textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Pengobatan*</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div id="pngobatan" class="btn-group" data-toggle="buttons">
                                        <?php if ($pasien->jenkel == 'Umum') { ?>
                                            <label class="btn btn-secondary" data-toggle-class="btn-secondary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="pengobatan" value="Umum" class="join-btn">
                                                &nbsp; Umum &nbsp;
                                            </label>
                                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="pengobatan" value="BPJS" class="join-btn"> BPJS
                                            </label>


                                        <?php } else { ?>
                                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="pengobatan" value="Umum" class="join-btn">
                                                &nbsp; Umum &nbsp;
                                            </label>
                                            <label class="btn btn-secondary" data-toggle-class="btn-secondary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="pengobatan" value="BPJS" class="join-btn"> BPJS
                                            </label>

                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">No. BPJS<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='optional' value="<?php echo $pasien->no_bpjs; ?>" name="no_bpjs" placeholder="Masukan Nomor BPJS" type="text" />
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Telepon<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='optional' name="telp" value="<?php echo $pasien->telp; ?>" placeholder="Masukan Nomor Telepon" type="text" />
                                </div>
                            </div>


                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <br>
                                        <button type='submit' class="btn btn-primary">Submit</button>
                                        <button type='reset' class="btn btn-success">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->