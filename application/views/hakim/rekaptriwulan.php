<div class="container">

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


    <div class="row mt-3">
        <div class="col text-center">
            <h6 class="d-block">Rekap Laporan Triwulan <br> Tahun <?= $current_year; ?>
                <!-- <script>
                    document.write(new Date().getFullYear())
                </script> -->
            </h6>
            <!-- dropdown start -->
            <div class="d-flex justify-content-center">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Pilih Tahun
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" id="tahun">

                        <!-- <li>
                            <a class="dropdown-item" href="<?= base_url('hakim/hakim_laper/rekap_triwulan'); ?>">All</a>
                        </li> -->
                        <?php foreach ($years as $y) : ?>

                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>hakim/hakim_laper/rekap_triwulan_year/<?php echo $y['periode_tahun'];  ?>" value="1"><?php echo $y['periode_tahun']; ?></a></li>


                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <!-- dropdown end -->
        </div>
    </div>

    <!-- modal start -->
    <!-- <div class="row">
        <div class="col"> -->
            <!-- button -->
            <!-- <a class="btn btn-success btn-sm my-3" href="<?php echo base_url() ?>admin/adminlaper/v_add_rekap_triwulan/" role="button">
                Tambah Rekap Laporan Triwulan
            </a> -->
            <!-- <button type="button" class="btn btn-success btn-sm my-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Rekap Laporan Triwulan
            </button> -->

            <!-- modal -->
            <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Tambah Laporan Triwulan</h5>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body"> -->
                            <!-- form start -->
                            <!-- <form method="POST" action="<?php echo base_url('hakim/hakim_laper/add_rekap_triwulan'); ?>" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="user_pp" class="form-label">Laporan Triwulan</label>
                                    <select class="form-select" id="lap_triwulan" name="lap_triwulan">
                                        <option value="" selected>-- Pilih --</option>

                                        <option value="03"> Triwulan I</option>
                                        <option value="06"> Triwulan II</option>
                                        <option value="09"> Triwulan III</option>
                                        <option value="12"> Triwulan IV</option>

                                    </select>

                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form> -->
                        <!-- form end -->
                    <!-- </div>
                </div>
            </div> -->
            <!-- modal -->

        <!-- </div>
    </div> -->
    <!-- modal end -->

<div class="row mt-3">
    <div class="col">

        
    <!-- table start -->
        <div class="table-responsive">
            <table class="table align-items-center mb-3">
                <thead>
                    <tr>
                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Triwulan I</th>
                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Triwulan II</th>
                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Triwulan III</th>
                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Triwulan IV</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>
                            <?php foreach ($all as $one) : ?>
                                <?php if ($one['periode_triwulan'] == '03') : ?>
                                    <div class="d-flex flex-column justifxy-content-center px-3">
                                        <a class="text-decoration-none" href="<?php echo base_url() ?>hakim/hakim_laper/view_rekap_tri/<?= $one['id'] ?>">
                                            <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                    </div>

                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <?php foreach ($all as $one) : ?>
                                <?php if ($one['periode_triwulan'] == '06') : ?>
                                    <div class="d-flex flex-column justifxy-content-center px-3">
                                        <a class="text-decoration-none" href="<?php echo base_url() ?>hakim/hakim_laper/view_rekap_tri/<?= $one['id'] ?>">
                                            <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                    </div>

                                <?php endif; ?>
                            <?php endforeach; ?>

                        </td>
                        <td>
                            <?php foreach ($all as $one) : ?>
                                <?php if ($one['periode_triwulan'] == '09') : ?>
                                    <div class="d-flex flex-column justifxy-content-center px-3">
                                        <a class="text-decoration-none" href="<?php echo base_url() ?>hakim/hakim_laper/view_rekap_tri/<?= $one['id'] ?>">
                                            <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                    </div>

                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <?php foreach ($all as $one) : ?>
                                <?php if ($one['periode_triwulan'] == '12') : ?>
                                    <div class="d-flex flex-column justifxy-content-center px-3">
                                        <a class="text-decoration-none" href="<?php echo base_url() ?>hakim/hakim_laper/view_rekap_tri/<?= $one['id'] ?>">
                                            <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                    </div>

                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    <!-- table end -->

        <div class="row mt-4">
            <div class="col">
                <div class="card card-frame mb-4">
                    <div class="card-body">
                        <h6 class="text-center">
                            GRAFIK REKAP KECAPATAN & KETEPATAN <br>REKAP LAPORAN TRIWULAN
                        </h6>
                        <div>
                            <canvas id="chart_rekaptriwulan" width="100%" height="30"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- viewdocument Modal start -->
    <?php foreach ($all as $one) : ?>
        <div class="modal fade" id="viewdocumentModal<?= $one['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">View Document</h5>
                        <!-- <button type="button" class="btn bg-gradient-success">
                            Download Excel
                        </button> -->
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
    <?php endforeach; ?>
    <!-- viewdocument modal end -->
</div>