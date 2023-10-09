<div class="container-fluid py-4 px-5">

    <!-- contonet start -->


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
                    <p><?php echo $lp['nama']; ?></p>
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
                                    Tgl Kirim
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    File
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Catatan
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    revisi
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Tgl Revisi
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Validasi
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
                                        <span class="text-secondary text-xs font-weight-normal"><?php echo $lhs['tgl_upload']; ?></span>
                                    </td>
                                    <td class="align-middle text-center">

                                        <span class="text-secondary text-xs font-weight-normal">
                                            <a href="<?= base_url('files/laporan_triwulan/') ?><?= $lhs['kode_pa'] ?> <?= $lhs['berkas_laporan'] ?> <?= $lhs['periode_tahun'] ?>/<?= $lhs['nm_laporan'] ?>/<?= $lhs['lap_pdf'] ?>" class="text-decoration-none text-secondary" target="_blank"><i class="fas fa-file-pdf"></i></a> |
                                            <a href="<?php echo base_url('files/laporan_triwulan/') ?><?= $lhs['kode_pa'] ?> <?= $lhs['berkas_laporan'] ?> <?= $lhs['periode_tahun'] ?>/<?= $lhs['nm_laporan'] ?>/<?= $lhs['lap_xls'] ?>" class="text-decoration-none text-secondary"><i class="fas fa-file-excel"></i></a>
                                        </span>
                                    </td>

                                    <td class="align-middle text-center">

                                        <span class="text-success text-xs font-weight-normal">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#catatanModal<?= $lhs['id_triwulan'] ?>" class="text-decoration-none text-secondary"><i class="fas fa-clipboard"></i></a>
                                        </span>

                                    </td>

                                    <td class="align-middle text-center">
                                        <a class="text-secondary text-xs font-weight-normal" href="<?php echo base_url() ?>admin/adminlaper/zip_file_triwulan/<?= $lhs['id_triwulan'] ?>"> <i class="fas fa-download"></i></a>

                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-normal">
                                            <?php echo $lhs['tgl_revisi']; ?>
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php if ($lhs['status_validasi'] == "Belum Validasi") : ?>
                                            <a class="text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#validasiModal<?= $lhs['id_triwulan']; ?>">
                                                <span id="validate" class="text-white bg-danger text-xs font-weight-normal">
                                                    <?php echo $lhs['status_validasi']; ?>
                                                </span>
                                            </a>

                                        <?php elseif ($lhs['status_validasi'] == "Revisi") : ?>
                                            <a class="text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#validasiModal<?= $lhs['id_triwulan']; ?>">
                                                <span id="validate" class="text-white bg-dark text-xs font-weight-normal">
                                                    <?php echo $lhs['status_validasi']; ?>
                                                </span>
                                            </a>

                                        <?php else : ?>
                                            <a class="text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#validasiModal<?= $lhs['id_triwulan']; ?>">
                                                <span id="validate" class="text-white bg-success text-xs font-weight-normal">
                                                    <?php echo $lhs['status_validasi']; ?>
                                                </span>
                                            </a>

                                        <?php endif; ?>
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

    <!-- catatanModal start -->
    <?php foreach ($laporan as $lhs) : ?>
        <div class="modal fade" id="catatanModal<?= $lhs['id_triwulan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Catatan Perbaikan</h5>
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?php echo base_url('admin/adminlaper/add_catatan_triwulan'); ?>" enctype="multipart/form-data">

                            <div class="container">
                                <?php foreach ($catatan as $ct) : ?>
                                    <?php if ($ct['id_triwulan'] == $lhs['id_triwulan']) : ?>
                                        <div class="card card-frame mb-2">
                                            <div class="card-body">
                                                <h6><?php echo $ct['tgl_catatan']; ?></h6>
                                                <p><?php echo $ct['catatan']; ?></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>

                            <div class="container">
                                <div class="form-floating">
                                    <input type="text" id="id_laper" name="id_triwulan" value="<?php echo $lhs['id_triwulan'] ?>" hidden>
                                    <input type="text" id="periode_triwulan" name="periode_triwulan" value="<?php echo $lhs['berkas_laporan'] ?>" hidden>
                                    <input type="text" id="periode_tahun" name="periode_tahun" value="<?php echo $lhs['periode_tahun'] ?>" hidden>
                                    <input type="text" id="status_laporan" name="status_laporan" value="<?php echo $lhs['status_laporan'] ?>" hidden>
                                    <input type="text" id="operator" name="operator" value="<?php echo $lhs['operator'] ?>" hidden>
                                    <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                    <label for="floatingTextarea">Klik untuk membuat catatan</label>
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
    <?php endforeach; ?>
    <!-- catatan modal end -->

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

    <!-- validasi Modal start -->
    <?php foreach ($laporan as $lhs) : ?>
        <div class="modal fade" id="validasiModal<?php echo $lhs['id_triwulan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <form method="POST" action="<?php echo base_url('admin/adminlaper/add_validasi_triwulan'); ?>" enctype="multipart/form-data">

                            <input type="text" id="id_laper" name="id_triwulan" value="<?php echo $lhs['id_triwulan'] ?>" hidden>

                            <div class="row align-items-center">
                                <div class="col text-end">
                                    <h3>Validasi Laporan ini</h3>
                                </div>
                                <div class="col">
                                    <img class="img-fluid" src="<?= base_url('assets/ilus/') ?>tanya.png" alt="">
                                </div>

                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-secondary" data-bs-dismiss="modal">Batal</button>
                        <input type="submit" name="validasi" value="Revisi" class="btn btn-warning">
                        <input type="submit" name="validasi" value="Validasi" class="btn btn-success">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- validasi modal end -->


</div>
<!-- modal end -->