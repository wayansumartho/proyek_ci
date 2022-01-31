			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">

					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Halaman Edit Apoteker</h2>

									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form method="POST" action="<?php echo site_url('Data_apoteker/aksi_update'); ?>">
										<input type="text" value="<?php echo $apoteker->id_apo; ?>" name="id" hidden>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" name="nama" value="<?php echo $apoteker->nama; ?>" required="required" class="form-control ">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Username<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="last-name" name="username" value="<?php echo $apoteker->username; ?>" required="required" class="form-control">
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