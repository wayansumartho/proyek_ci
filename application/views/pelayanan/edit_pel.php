			<!-- page content -->
			<div class="right_col" role="main">
			    <div class="">

			        <div class="clearfix"></div>
			        <div class="row">
			            <div class="col-md-12 col-sm-12 ">
			                <div class="x_panel">
			                    <div class="x_title">
			                        <h2>Halaman Edit Pelayanan</h2>

			                        <div class="clearfix"></div>
			                    </div>
			                    <div class="x_content">
			                        <br />
			                        <form method="POST" action="<?php echo site_url('Pelayanan/aksi_update'); ?>">
			                            <input type="text" id="first-name" name="id_pel" value="<?php echo $pelayanan->id_pel; ?>" required="required" class="form-control " hidden>

			                            <div class="item form-group">
			                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Pelayanan<span class="required">*</span>
			                                </label>
			                                <div class="col-md-6 col-sm-6 ">
			                                    <input type="text" id="first-name" name="nama" value="<?php echo $pelayanan->nama_pel; ?>" placeholder="Masukan Nama" required="required" class="form-control ">
			                                </div>
			                            </div>
			                            <div class="item form-group">
			                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Harga<span class="required">*</span>
			                                </label>
			                                <div class="col-md-6 col-sm-6 ">
			                                    <input type="text" id="last-name" name="harga" value="<?php echo $pelayanan->harga; ?>" placeholder="Masukan Username" required="required" class="form-control">
			                                </div>
			                            </div>




			                            <div class="ln_solid"></div>
			                            <div class="item form-group">
			                                <div class="col-md-6 col-sm-6 offset-md-3">

			                                    <button class="btn btn-primary" type="reset">Reset</button>
			                                    <button type="submit" class="btn btn-success">Submit</button>
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