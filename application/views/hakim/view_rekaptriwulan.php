<!-- contonet start -->
<div class="container-fluid py-4 mx-4">

    <?php foreach ($triwulan as $lp) : ?>
        <div class="row bg-gray-400 justify-content-start">

        <div class="row mt-3">
                <div class="col-md-2">
                    <p class="fw-bold">Satker</p>
                </div>
                <div class="col-md-auto">
                    <p>:</p>
                </div>
                <div class="col-md-auto">
                    <p><?php echo $this->session->userdata('nama'); ?></p>
                </div>
            </div>
            <div class="row mt-n3">
                <div class="col-md-2">
                    <p class="fw-bold">Laporan Triwulan</p>
                </div>
                <div class="col-md-auto">
                    <p>:</p>
                </div>
                <div class="col-md-auto">
                    <p><?php echo $lp['berkas_laporan']; ?></p>
                </div>
            </div>
            <div class="row mt-n3">
                <div class="col-md-2">
                    <p class="fw-bold">Tahun</p>
                </div>
                <div class="col-md-auto">
                    <p>:</p>
                </div>
                <div class="col-md-auto">
                    <p><?php echo $lp['periode_tahun']; ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="row mt-5">
        <div class="col">

            <?php foreach ($triwulan as $lhs) : ?>
                <!-- button -->
                <a class="btn btn-primary btn-sm mb-3" href="<?php echo base_url() ?>hakim/hakim_laper/zip_rekap_triwulan/<?= $lhs['id'] ?>">
                    Download ZIP <i class="fas fa-download"></i>
                </a>
            <?php endforeach; ?>

            <!-- table start -->
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Laporan</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    File
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- looping data start -->

                            <!-- first loop -->
                            <?php $i = 1; ?>
                            <?php foreach ($laporan as $lhs) : ?>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">
                                            <p class="text-xs text-secondary mb-0 ms-3"><?php echo $i++ ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">
                                            <p class="text-xs text-secondary mb-0"><?php echo $lhs['nm_laporan']; ?></p>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-normal">
                                            <a href="#!" data-bs-toggle="modal" data-bs-target="#triwulan<?= $lhs['id_triwulan'] ?>" class="text-decoration-none text-secondary"><i class="fas fa-upload"></i></a>
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">

                                        <span class="text-secondary text-xs font-weight-normal">
                                            <?php if ($lhs['lap_pdf'] == null && $lhs['lap_xls'] == null) : ?>
                                                <a href="<?php echo base_url() ?>hakim/hakim_laper/file_not_found" class="text-decoration-none text-secondary"><i class="fas fa-file-pdf"></i></a> |
                                                <a href="<?php echo base_url() ?>hakim/hakim_laper/file_not_found" class="text-decoration-none text-secondary"><i class="fas fa-file-excel"></i></a>
                                            <?php else : ?>
                                                <a href="<?= base_url('files/rekap_laporan_triwulan/') ?><?= $lhs['kode_pa'] ?> <?= $lhs['berkas_laporan'] ?> <?= $lhs['periode_tahun'] ?>/<?= $lhs['nm_laporan'] ?>/<?= $lhs['lap_pdf'] ?>" target="blank" class="text-decoration-none text-secondary"><i class="fas fa-file-pdf"></i></a> |
                                                <a href="<?= base_url('files/rekap_laporan_triwulan/') ?><?= $lhs['kode_pa'] ?> <?= $lhs['berkas_laporan'] ?> <?= $lhs['periode_tahun'] ?>/<?= $lhs['nm_laporan'] ?>/<?= $lhs['lap_xls'] ?>" target="blank" class="text-decoration-none text-secondary"><i class="fas fa-file-excel"></i></a>
                                            <?php endif; ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <!-- looping data end -->

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- table end -->
        </div>
    </div>

    <!-- modal upload start -->
    <!-- <?php foreach ($laporan as $lhs) : ?>
        <div class="modal fade" id="triwulan<?= $lhs['id_triwulan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Laporan <?php echo $lhs['nm_laporan'] ?></h5>
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?php echo base_url('admin/adminlaper/lap_RekapTriwulan'); ?>" enctype="multipart/form-data">

                            <input type="text" id="id_laper" name="id_triwulan" value="<?php echo $lhs['id_triwulan'] ?>" hidden>
                            <input type="text" id="id_laper" name="tahun" value="<?php echo $lhs['periode_tahun'] ?>" hidden>
                            <input type="text" id="id_laper" name="berkas_laporan" value="<?php echo $lhs['berkas_laporan'] ?>" hidden>
                            <input type="text" id="id_laper" name="nm_laporan" value="<?php echo $lhs['nm_laporan'] ?>" hidden>

                            <div class="input-group input-group-sm input-group-outline my-3">
                                <div class="col-3">
                                    <label class="form-label">File PDF</label>
                                </div>
                                <div class="col">
                                    <input type="file" name="file_pdf" class="form-control form-control-sm" placeholder="tes" accept=".pdf" required>
                                </div>
                            </div>
                            <div class="input-group input-group-sm input-group-outline my-3">
                                <div class="col-3">
                                    <label class="form-label">File Excel</label>
                                </div>
                                <div class="col">
                                    <input type="file" name="file_excel" class="form-control form-control-sm" placeholder="tes" accept=".xls,.xlsx" required>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?> -->
    <!-- modal upload end -->

    <!-- //modal tampil pdf -->

    <div class="modal fade" id="triwulanPdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Laporan Triwulan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="triwulan_pdf">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mx-auto" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- end modal tampil pdf -->



</div>
<!-- content end -->