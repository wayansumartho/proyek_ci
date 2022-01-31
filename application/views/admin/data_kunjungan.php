<!-- page content -->
<div class="right_col" role="main">
    <div class="">


        <div class="clearfix"></div>
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
        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Halaman Data Kunjungan</h2>

                        <div class="clearfix"></div>
                    </div>
                    <a href="<?php echo site_url('Kunjungan/add_kunjungan'); ?>" class="btn btn-primary">Tambah Data Kunjungan</a>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Rekam Medis</th>
                                                <th>Id Pasien</th>
                                                <th>Nama Pasien</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($kunjungan as $item) { ?>

                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $item->kd_rm; ?></td>
                                                    <td><?php echo $item->id_pasien; ?></td>
                                                    <td><?php echo $item->nama_pasien; ?></td>
                                                    <td>
                                                        <a href="<?php echo site_url('Kunjungan/delete/' . $item->kd_rm . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"'); ?>" class="btn btn-danger">Hapus</a>

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