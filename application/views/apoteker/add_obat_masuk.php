			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">

					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Halaman Tambah Obat Masuk</h2>

									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form method="POST" action="<?php echo site_url('Obat/aksi_obat_masuk'); ?>">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kode Transaksi<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" value="<?php echo $kode_baru; ?>" required="required" class="form-control " disabled>
												<input type="text" id="first-name" value="<?php echo $kode_baru; ?>" name="kode" required="required" class="form-control " hidden>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tanggal Transaksi<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="date" id="last-name" name="tgl" required="required" class="form-control">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Harga Subtotal<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="last-name" name="harga" placeholder="Masukan Harga" required="required" class="form-control">
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