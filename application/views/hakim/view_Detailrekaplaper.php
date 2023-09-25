
<!-- contonet start -->
<div class="container-fluid py-4 px-5">

    <?php foreach ($laporan as $lp) : ?>
        <div class="row bg-gray-400 justify-content-start">

        <div class="row mt-3">
                <div class="col-md-2">
                    <p class="fw-bold">Satker</p>
                </div>
                <div class="col-md-auto">
                    <p>:</p>
                </div>
                <div class="col-md-auto">
                    <p><?php echo $lp['nama']; ?></p>
                </div>
            </div>
            <div class="row mt-n3">
                <div class="col-md-2">
                    <p class="fw-bold">Periode</p>
                </div>
                <div class="col-md-auto">
                    <p>:</p>
                </div>
                <div class="col-md-auto">
                    <p><?php echo date('M Y', strtotime($lp['periode'])); ?></p>
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
                    <p><?php echo date('Y', strtotime($lp['periode'])); ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="row mt-5">
        <div class="col">

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
                                    Tanggal
                                </th>
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
                                            <h6 class="mb-0"><?php echo $lhs['periode']; ?></h6>
                                            <p class="text-secondary mb-0">Rekap Lap Per <?php echo $lhs['periode']; ?></p>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary font-weight-normal"><?php echo $lhs['tgl_upload']; ?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-normal">
                                            <a href="#!" data-bs-toggle="modal" data-bs-target="#triwulan<?= $lhs['id'] ?>" class="text-decoration-none text-secondary"><i class="fas fa-upload"></i></a>
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">

                                        <span class="text-secondary text-xs font-weight-normal">
                                            <?php if ($lhs['rekap_pdf'] == null && $lhs['rekap_xls'] == null) : ?>
                                                <a href="<?php echo base_url() ?>hakim/hakim_laper/file_not_found" class="text-decoration-none text-secondary"><i class="fas fa-file-pdf"></i></a> |
                                                <a href="<?php echo base_url() ?>hakim/hakim_laper/file_not_found" class="text-decoration-none text-secondary"><i class="fas fa-file-excel"></i></a>
                                            <?php else : ?>
                                                <a href="<?= base_url('files/rekap_laporan_perkara/') ?><?= $lhs['kode_pa'] ?> <?= $lhs['periode'] ?>/<?= $lhs['rekap_pdf'] ?>" target="blank" class="text-decoration-none text-secondary"><i class="fas fa-file-pdf"></i></a> |
                                                <a href="<?= base_url('files/rekap_laporan_perkara/') ?><?= $lhs['kode_pa'] ?> <?= $lhs['periode'] ?>/<?= $lhs['rekap_xls'] ?>" target="blank" class="text-decoration-none text-secondary"><i class="fas fa-file-excel"></i></a>
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
        <div class="modal fade" id="triwulan<?= $lhs['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Update Laporan</h5>
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?php echo base_url('admin/adminlaper/edit_rekap_laporan'); ?>" enctype="multipart/form-data">

                            <input type="text" id="id_laper" name="id" value="<?php echo $lhs['id'] ?>" hidden>
                            <input type="text" id="id_laper" name="periode" value="<?php echo $lhs['periode'] ?>" hidden>
                            <input type="text" id="id_laper" name="old_pdf" value="<?php echo $lhs['rekap_pdf'] ?>" hidden>
                            <input type="text" id="id_laper" name="old_xls" value="<?php echo $lhs['rekap_xls'] ?>" hidden>

                            <div class="input-group input-group-sm input-group-outline my-3">
                                <div class="col-3">
                                    <label class="form-label">File PDF</label>
                                </div>
                                <div class="col">
                                    <input type="file" name="file1" class="form-control form-control-sm" placeholder="tes" accept=".pdf">
                                </div>
                            </div>
                            <div class="input-group input-group-sm input-group-outline my-3">
                                <div class="col-3">
                                    <label class="form-label">File Excel</label>
                                </div>
                                <div class="col">
                                    <input type="file" name="file2" class="form-control form-control-sm" placeholder="tes" accept=".xls,.xlsx">
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
