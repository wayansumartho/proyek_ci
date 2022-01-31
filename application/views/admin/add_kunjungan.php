			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">

					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Halamann Tambah Kunjungan</h2>

									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<?php if (!empty($this->session->flashdata('pesan2'))) {; ?>
										<div class="alert alert-warning alert-dismissible fade show" role="alert">
											<span class="alert-text"> <?php echo $this->session->flashdata('pesan2'); ?></span>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									<?php } ?>
									<form method="POST" action="<?php echo site_url('Kunjungan/aksi_simpan'); ?>">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kode Rekam Medis<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input class="form-control" value="<?php echo $kodeunik; ?>" required="required" type="text" disabled />
												<input class="form-control" value="<?php echo $kodeunik; ?>" name="kd_rm" required="required" type="text" hidden />
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kode Pasien<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="select2_single form-control" tabindex="-1" name="id_pasien" required>
													<option value="0">-Pilih Pasien-</option>
													<?php foreach ($pasien as $val) { ?>
														<option value="<?php echo $val->id_pasien; ?><?= set_value('id_pasien'); ?>"><?= form_error('id_pasien', '<div class="text-danger small">', '</div>'); ?><?php echo $val->id_pasien; ?> - <?php echo $val->nama_pasien; ?></option>
													<?php } ?>
												</select>
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