    <div class="container-fluid py-4">

        <div class="row">
            <div class="col">
                <div class="div">
                    <!-- alert start -->
                    <?php //session flash data
                    if ($this->session->flashdata('msg')) :
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('msg'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    endif;
                    //end flash data
                    ?>
                    <!-- alert end -->
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col text-center">
                <h6 class="d-block">Rekap Laporan Perkara <br> Tahun <script>
                        document.write(new Date().getFullYear())
                    </script>
                </h6>
                <!-- dropdown start -->
                <div class="d-flex justify-content-center">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Pilih Tahun 
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" id="tahun">

                            <!-- <li>
                                <a class="dropdown-item" href="<?= base_url('admin/Adminlaper/rekap_laporan'); ?>">All</a>
                            </li> -->
                            <?php foreach ($years as $y) : ?>

                                <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/adminlaper/rekap_search_year/<?php echo $y['year'];  ?>" value="1"><?php echo $y['year']; ?></a></li>


                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <!-- dropdown end -->
            </div>
        </div>

        <!-- modal start -->
        <div class="row">
            <div class="col">
                <!-- button -->
                <button type="button" class="btn btn-success btn-sm my-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Rekap Laporan Perkara
                </button>

                <!-- modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Tambah Rekap Laporan Perkara</h5>
                                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- form start -->
                                <form method="POST" action="<?php echo base_url('admin/adminlaper/add_rekap_laporan'); ?>" enctype="multipart/form-data">
                                    <div class="input-group mb-2">
                                        <label for="bulan" class="col-md-4">Periode</label>
                                        <div class="col-md-8">
                                            <input id="bulan" type="month" name="periode" class="form-control">
                                        </div>
                                    </div>
                                    <div class="input-group mb-2">
                                        <label for="upload-pdf" class="col-md-4">Upload file PDF</label>
                                        <div class="col-md-8">
                                            <input id="upload-pdf" type="file" name="file1" class="form-control" accept=".pdf" required>
                                        </div>
                                    </div>
                                    <div class="input-group mb-2">
                                        <label for="upload-zip" class="col-md-4">Upload file XLS</label>
                                        <div class="col-md-8">
                                            <input id="upload-zip" type="file" name="file2" class="form-control" accept=".xls,.xlsx" required>
                                        </div>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                            </form>
                            <!-- form end -->
                        </div>
                    </div>
                </div>
                <!-- modal -->

            </div>
        </div>
        <!-- modal end -->


        <!-- table start -->
        <div class="card">
            <div class="table-responsive">
                <table class="table align-items-center mb-3">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Jan</th>
                            <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Feb</th>
                            <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Mar</th>
                            <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Apr</th>
                            <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Mei</th>
                            <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Jun</th>
                            <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Jul</th>
                            <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Agu</th>
                            <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Sep</th>
                            <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Okt</th>
                            <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Nov</th>
                            <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Des</th>

                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <?php foreach ($all as $one) : ?>
                                    <?php if (date('m', strtotime($one['periode'])) == '01') : ?>
                                        <div class="d-flex flex-column justifxy-content-center px-3">
                                            <a href="<?php echo base_url() ?>admin/adminlaper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                        </div>

                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php foreach ($all as $one) : ?>
                                    <?php if (date('m', strtotime($one['periode'])) == '02') : ?>
                                        <div class="d-flex flex-column justifxy-content-center px-3">
                                            <a href="<?php echo base_url() ?>admin/adminlaper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                        </div>

                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </td>
                            <td>
                                <?php foreach ($all as $one) : ?>
                                    <?php if (date('m', strtotime($one['periode'])) == '03') : ?>
                                        <div class="d-flex flex-column justifxy-content-center px-3">
                                            <a href="<?php echo base_url() ?>admin/adminlaper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                        </div>

                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php foreach ($all as $one) : ?>
                                    <?php if (date('m', strtotime($one['periode'])) == '04') : ?>
                                        <div class="d-flex flex-column justifxy-content-center px-3">
                                            <a href="<?php echo base_url() ?>admin/adminlaper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                        </div>

                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php foreach ($all as $one) : ?>
                                    <?php if (date('m', strtotime($one['periode'])) == '05') : ?>
                                        <div class="d-flex flex-column justifxy-content-center px-3">
                                            <a href="<?php echo base_url() ?>admin/adminlaper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                        </div>

                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php foreach ($all as $one) : ?>
                                    <?php if (date('m', strtotime($one['periode'])) == '06') : ?>
                                        <div class="d-flex flex-column justifxy-content-center px-3">
                                            <a href="<?php echo base_url() ?>admin/adminlaper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                        </div>

                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php foreach ($all as $one) : ?>
                                    <?php if (date('m', strtotime($one['periode'])) == '07') : ?>
                                        <div class="d-flex flex-column justifxy-content-center px-3">
                                            <a href="<?php echo base_url() ?>admin/adminlaper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                        </div>

                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php foreach ($all as $one) : ?>
                                    <?php if (date('m', strtotime($one['periode'])) == '08') : ?>
                                        <div class="d-flex flex-column justifxy-content-center px-3">
                                            <a href="<?php echo base_url() ?>admin/adminlaper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                        </div>

                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php foreach ($all as $one) : ?>
                                    <?php if (date('m', strtotime($one['periode'])) == '09') : ?>
                                        <div class="d-flex flex-column justifxy-content-center px-3">
                                            <a href="<?php echo base_url() ?>admin/adminlaper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                        </div>

                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php foreach ($all as $one) : ?>
                                    <?php if (date('m', strtotime($one['periode'])) == '10') : ?>
                                        <div class="d-flex flex-column justifxy-content-center px-3">
                                            <a href="<?php echo base_url() ?>admin/adminlaper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                        </div>

                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php foreach ($all as $one) : ?>
                                    <?php if (date('m', strtotime($one['periode'])) == '11') : ?>
                                        <div class="d-flex flex-column justifxy-content-center px-3">
                                            <a href="<?php echo base_url() ?>admin/adminlaper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                        </div>

                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php foreach ($all as $one) : ?>
                                    <?php if (date('m', strtotime($one['periode'])) == '12') : ?>
                                        <div class="d-flex flex-column justifxy-content-center px-3">
                                            <a href="<?php echo base_url() ?>admin/adminlaper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                        </div>

                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- table end -->

        <div class="row mt-4">
            <div class="col">
                <div class="card card-frame">
                    <div class="card-body">
                        <h6 class="text-center">
                           GRAFIK REKAP KECAPATAN & KETEPATAN <br>REKAP LAPORAN PERKARA
                        </h6>
                        <div>
                        <canvas id="chart_rekaplaper" width="100%" height="30"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- viewdocument Modal start -->
        <!-- <?php foreach ($all as $one) : ?>
            <div class="modal fade" id="viewdocumentModal<?= $one['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-normal" id="exampleModalLabel">View Document</h5>
                            <button type="button" class="btn bg-gradient-success">
                            Download Excel
                        </button>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body" id="lap_pdf">


                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
                            <a href="<?php echo base_url() ?>index.php/Admin/download_xls_rekap/<?= $one['id'] ?>" class="text-white btn btn-primary active" role="button">Download Excel <i class="fas fa-file-excel"></i><?= $one['id'] ?></a>

                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?> -->
        <!-- viewdocument modal end -->

    </div>