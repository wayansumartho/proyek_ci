<!-- page content -->
<div class="right_col" role="main">
    <div class="">


        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Halaman Data Pemeriksaan</h2>

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
                                                <th>Kode Rekam Medis</th>
                                                <th>Nama Pasien</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Umur</th>
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
                                                    <td><?php echo $item->kd_rm; ?></td>
                                                    <td><?php echo $item->nama_pasien; ?></td>
                                                    <td><?php echo $item->tanggal_lahir; ?></td>
                                                    <td><?= timespan($awal, $ayeuna, 2);  ?></td>
                                                    <td>
                                                        <a href="<?php echo site_url('Dokter/add_pemeriksaan/' . $item->kd_rm . '" class="btn btn-primary btn-sm" '); ?>" class="btn btn-primary">Tambah Pemeriksaan</a>

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