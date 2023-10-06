<div class="row mt-5">
    <div class="col text-center">
        <h6 class="d-block">Laporan Triwulan Tahun <?= $current_year; ?>
        <!-- <script>
        document.write(new Date().getFullYear())
        </script> -->
        </h6>
        <!-- dropdown start -->
        <div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Pilih Tahun
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" id="tahun">
                    <li>
                        <a class="dropdown-item" href="<?= base_url('pa/PA_laper/triwulan'); ?>">All</a>
                    </li>

                    <?php foreach ($years as $y) : ?>

                        <li>
                            <a class="dropdown-item" href="<?php echo base_url('pa/PA_laper/triwulan_search_year/'); ?><?= $y['year'];  ?>"><?= $y['year']; ?></a>
                        </li>


                    <?php endforeach; ?>
                </ul>
            </div>





        </div>
        <!-- dropdown end -->
    </div>
</div>

<div class="row">
    <div class="div mt-3 col-lg-6 col-md-12">
        <!-- alert start -->
        <?php //session flash data
        if ($this->session->flashdata('message')) :
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('message'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        endif;
        //end flash data
        ?>
        <!-- alert end -->
    </div>
</div>

<!-- modal start -->
<div class="row">
    <div class="col">
        <!-- button -->
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Laporan
        </button>
        <!-- <a href="<?php echo base_url() ?>PA_laper/addtriwulan" class="btn bg-gradient-success">Tambah Laporan</a> -->

        <!-- table start -->
        <div class="row">
            <div class="table-responsive">
                <table class="table align-items-center mb-0" id="bandingTable">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Triwulan / Berkas</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl Revisi
                                Akhir
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- looping data start -->

                        <?php $i = 1; ?>
                        <?php foreach ($laporan as $lp) : ?>
                            <tr>
                                <td>
                                    <div class="d-flex flex-column justify-content-center">
                                        <p class="text-xs text-secondary mb-0 ms-3"><?= $i++ ?></p>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs"><?= $lp['berkas_laporan']; ?></h6>
                                        <!-- <p class="text-xs text-secondary mb-0">Lap Per Triwulan <?= $i; ?></p> -->
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-normal"><?= $lp['tgl_upload']; ?></span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-normal"><?= $lp['tgl_terakhir_revisi']; ?></span>
                                </td>
                                <td class="align-middle text-center">
                                    <?php if ($lp['tanggal'] <= '5' and $lp['status_laporan'] != 'Revisi') : ?>
                                        <span class="text-success text-xs font-weight-normal">
                                            <i class="fas fa-check-circle"></i>
                                        </span>
                                    <?php elseif ($lp['tanggal'] > '5' and $lp['tanggal'] <= '10' and $lp['status_laporan'] != 'Revisi') : ?>
                                        <span class="text-warning text-xs font-weight-normal">
                                            <i class="fas fa-check-circle"></i>
                                        </span>
                                    <?php elseif ($lp['tanggal'] > '10' and $lp['status_laporan'] != 'Revisi') : ?>
                                        <span class="text-danger text-xs font-weight-normal">
                                            <i class="fas fa-check-circle"></i>
                                        </span>
                                    <?php elseif ($lp['tanggal'] >= '1' and $lp['status_laporan'] = 'Revisi') : ?>
                                        <span class="text-dark text-xs font-weight-normal">
                                            <i class="fas fa-check-circle"></i>
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="<?php echo base_url('pa/PA_laper/addtriwulan/') . $lp['id'] ?>" class="text-decoration-none text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Upload">
                                        <i class="fas fa-upload" title="Upload Laporan"></i>
                                    </a>
                                    <!-- <a href="javascript:;" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a> | -->
                                    <!-- <a href="javascript:;" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Download">
                                                <i class="fas fa-download"></i>
                                            </a> | -->
                                    <a href="<?= base_url('pa/PA_laper/view_triwulan/') . $lp['id'] ?>" class="text-decoration-none text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Lihat">
                                        <i class="fa fa-eye" title="Detail"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>



                        <!-- looping data end -->

                    </tbody>
                </table>
            </div>
        </div>
        <!-- table end -->

        <!-- modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Tambah Laporan Triwulan</h5>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- form start -->
                        <form method="POST" action="<?php echo base_url('pa/PA_laper/add_lap_triwulan'); ?>" enctype="multipart/form-data">
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
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                    </div>
                    </form>
                    <!-- form end -->
                </div>
            </div>
        </div>
        <!-- modal -->

        <div class="row mb-5">
            <div class="col mt-2">
                <h6>Keterangan</h6>
                <table>
                    <tr>
                        <td class=>
                            <span class="bg-success px-2 text-center">&nbsp;</span>
                        </td>
                        <td class="ps-2">: Pengiriman data < tgl 5</td>
                    </tr>
                    <tr>
                        <td class=>
                            <span class="bg-warning px-2 text-center">&nbsp;</span>
                        </td>
                        <td class="ps-2">: PENGIRIMAN DATA > TANGGAL 5 DAN <= TANGGAL 10</td>
                    </tr>
                    <tr>
                        <td class=>
                            <span class="bg-danger px-2 text-center">&nbsp;</span>
                        </td>
                        <td class="ps-2">: PENGIRIMAN DATA > TANGGAL 10</td>
                    </tr>
                    <tr>
                        <td class=>
                            <span class="bg-dark px-2 text-white text-center">R</span>
                        </td>
                        <td class="ps-2">: MASIH ADA YANG PERLU DI REVISI</td>
                    </tr>

                </table>
            </div>
        </div>