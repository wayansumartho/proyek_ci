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
                        <h2>Halaman Data Apoteker</h2>

                        <div class="clearfix"></div>
                    </div>
                    <a href="<?php echo site_url('Data_apoteker/add_apo'); ?>" class="btn btn-primary">Tambah Data Apoteker</a>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Status</th>
                                                <th>Aktif / Nonaktif User</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($apoteker as $item) { ?>

                                                <tr>
                                                    <td><?php echo $item->id_apo; ?></td>
                                                    <td><?php echo $item->nama; ?></td>
                                                    <td><?php echo $item->username; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($item->aktif == '1') {
                                                        ?>
                                                            <div class="badge badge-success">Aktif</div>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <div class="badge badge-danger">Tidak Aktif</div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($item->aktif == '1') {
                                                        ?>
                                                            <a href="<?php echo site_url("Data_apoteker/non_aktif/" . $item->id_apo); ?>" class="btn btn-warning">Non Aktif</a>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <a href="<?php echo site_url("Data_apoteker/aktif/" . $item->id_apo); ?>" class="btn btn-primary">Aktif</a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>

                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Aksi
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="<?php echo site_url('Data_apoteker/edit_apo/' . $item->id_apo . ''); ?>">Edit</a>
                                                                <a class="dropdown-item" href="<?php echo site_url('Data_apoteker/delete/' . $item->id_apo . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"'); ?>">Hapus</a>


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