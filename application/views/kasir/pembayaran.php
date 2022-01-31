<!-- page content -->
<div class="right_col" role="main">
    <div class="">


        <div class="clearfix"></div>
        <?php if (!empty($this->session->flashdata('pesan'))) {; ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <span class="alert-text"> <?php echo $this->session->flashdata('pesan'); ?></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
        <?php if (!empty($this->session->flashdata('pesan2'))) {; ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-text"> <?php echo $this->session->flashdata('pesan2'); ?></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Halaman Data Pembayaran</h2>

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
                                                <th>Kode Resep</th>
                                                <th>Id Pemeriksaan</th>
                                                <th>Kode Rekam Medis</th>
                                                <th>Nama Pasien</th>
                                                <th>Tindakan</th>
                                                <th>Pengobatan</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($pembayaran as $item) { ?>

                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $item->kd_resep; ?></td>
                                                    <td><?php echo $item->id_periksa; ?></td>
                                                    <td><?php echo $item->kd_rm; ?></td>
                                                    <td><?php echo $item->nama_pasien; ?></td>
                                                    <td><?php echo $item->tindakan; ?></td>
                                                    <td><?php echo $item->pengobatan; ?></td>
                                                    <td>
                                                        <a href="<?php echo site_url('Pembayaran/bayar/' . $item->id_periksa . '/' . $item->kd_resep . '" class="btn btn-warning btn-sm" '); ?>" class="btn btn-warning">Bayar</a>
                                                        <a href="<?php echo site_url('Pembayaran/detail_bayar/' . $item->id_periksa . '/' . $item->kd_resep . '" class="btn btn-primary btn-sm" '); ?>" class="btn btn-primary">Lihat Data</a>

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