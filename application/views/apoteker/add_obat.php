			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">

					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Halaman Tambah Obat</h2>

									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form method="POST" action="<?php echo site_url('Obat/aksi_simpan'); ?>">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kode Obat<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input class="form-control" value="<?php echo $kode_obat; ?>" required="required" type="text" disabled />
												<input class="form-control" value="<?php echo $kode_obat; ?>" name="kd_obat" required="required" type="text" hidden />
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nama Obat<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="last-name" name="nama" placeholder="Nama Obat" required="required" class="form-control">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Stok<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="last-name" name="stok" placeholder="Jumlah Yang Masuk" required="required" class="form-control">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Harga<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="last-name" name="harga" placeholder="Harga Obat" required="required" class="form-control">
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