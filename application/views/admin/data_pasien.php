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
                        <h2>Halaman Data Pasien</h2>

                        <div class="clearfix"></div>
                    </div>
                    <a href="<?php echo site_url('Pasien/add_pasien'); ?>" class="btn btn-primary">Tambah Pasien</a>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Pasien</th>
                                                <th>Nama Pasien</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tangal Lahir</th>
                                                <th>Umur</th>
                                                <th>Alamat</th>
                                                <th>Pengobatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($pasien as $item) {
                                                $awal = strtotime($item->tanggal_lahir);
                                                $ayeuna = time(); ?>

                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $item->id_pasien; ?></td>
                                                    <td><?php echo $item->nama_pasien; ?></td>
                                                    <td><?php echo $item->jenkel; ?></td>
                                                    <td><?php echo $item->tempat_lahir; ?></td>
                                                    <td><?php echo $item->tanggal_lahir; ?></td>
                                                    <td><?= timespan($awal, $ayeuna, 2);  ?></td>
                                                    <td><?php echo $item->alamat; ?></td>
                                                    <td><?php echo $item->pengobatan; ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Aksi
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="<?php echo site_url('Pasien/edit_pasien/' . $item->id_pasien . ''); ?>">Edit</a>
                                                                <a class="dropdown-item" href="<?php echo site_url('Pasien/delete/' . $item->id_pasien . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"'); ?>">Hapus</a>


                                                            </div>
                                                        </div>
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