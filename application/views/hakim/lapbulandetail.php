<div class="container">

    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <?php foreach ($laporan as $lp) : ?>
                        <div class="row mt-3">
                            <div class="col-md-3">
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
                            <div class="col-md-3">
                                <p class="fw-bold">Periode Laporan</p>
                            </div>
                            <div class="col-md-auto">
                                <p>:</p>
                            </div>
                            <div class="col-md-auto">
                                <p><?php echo date('M Y', strtotime($lp['periode'])); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>




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
                                <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Catatan
                                </th> -->
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Revisi
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
                            <?php $i = 1; ?>
                            <?php foreach ($laporan as $lhs) : ?>
                                <!-- first loop -->
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">
                                            <p class="text-secondary mb-0 ms-3"><?php echo $i++; ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0"><?php echo date('M Y', strtotime($lhs['periode'])); ?></h6>
                                            <p class="text-secondary mb-0"><?php echo $lhs['berkas_laporan']; ?></p>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary font-weight-normal"><?php echo $lhs['tgl_upload']; ?></span>
                                    </td>
                                    <td class="align-middle text-center">

                                        <a class="text-decoration-none text-secondary" href="<?= base_url('files/laporan_perkara/') ?><?= $lhs['kode_pa'] ?> <?= $lhs['periode'] ?>/<?= $lhs['laper_pdf'] ?>" target="_blank">
                                            <i class="fas fa-file-pdf"></i> |
                                        </a>
                                        <a class="text-decoration-none text-secondary" href="<?php echo base_url('files/laporan_perkara/') ?><?= $lhs['kode_pa'] ?> <?= $lhs['periode'] ?>/<?= $lhs['laper_xls'] ?>" target="_blank">
                                            <i class="fas fa-file-excel"></i>
                                        </a>

                                    </td>
                                    <!-- <td class="align-middle text-center">
                                        <a class="text-decoration-none text-secondary" href="#" data-bs-toggle="modal" data-bs-target="#catatanModal"><i class="fas fa-clipboard"></i></a>
                                    </td> -->
                                    <td class="align-middle text-center">
                                        <a class="text-decoration-none text-secondary" href="<?php echo base_url() ?>hakim/hakim_laper/zip_file/<?= $lhs['id'] ?>">
                                            <i class="fas fa-download"></i></a>
                                        </a>

                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-normal">
                                            <?php echo $lhs['tgl_terakhir_rev']; ?>
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php if ($lhs['status'] == "Belum Validasi") : ?>
                                            <a class="text-decoration-none">
                                                <span class="text-white bg-danger font-weight-normal rounded p-1">
                                                    <?php echo $lhs['status']; ?>
                                                </span>
                                            </a>
                                        <?php elseif ($lhs['status'] == "Revisi") : ?>
                                            <a class="text-decoration-none">
                                                <span class="text-white bg-dark font-weight-normal rounded p-1">
                                                    <?php echo $lhs['status']; ?>
                                                </span>
                                            </a>
                                        <?php else : ?>
                                            <a class="text-decoration-none">
                                                <span class="text-white bg-dark font-weight-normal rounded p-1">
                                                    <?php echo $lhs['status']; ?>
                                                </span>
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <!-- looping data end -->
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- table end -->
        </div>
    </div>

    <!-- catatanModal start -->
    <div class="modal fade" id="catatanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Catatan Laporan Perkara</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo base_url('Admin/adminlaper/add_catatan'); ?>">
                        <div class="container">
                            <?php foreach ($catatan as $ct) : ?>
                                <div class="card card-frame mb-2">
                                    <div class="card-body">
                                        <h6><?php echo $ct['tgl_catatan']; ?></h6>
                                        <p><?php echo $ct['catatan']; ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="container">
                            <div class="form-floating">
                                <?php foreach ($laporan as $lhs) : ?>
                                    <input type="text" id="id_laper" name="id_laper" value="<?php echo $lhs['id'] ?>" hidden>
                                <?php endforeach; ?>
                                <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">Klik untuk membuat catatan</label>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- catatan modal end -->

    <!-- validasi Modal start -->
    <div class="modal fade" id="validasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <form method="POST" action="<?php echo base_url('admin/adminlaper/add_validasi'); ?>" enctype="multipart/form-data">
                        <?php foreach ($laporan as $lhs) : ?>
                            <input type="text" id="id_laper" name="id_laper" value="<?php echo $lhs['id'] ?>" hidden>
                        <?php endforeach; ?>
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
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batal</button>
                    <input type="submit" name="validasi" value="Revisi" class="btn bg-gradient-warning">
                    <input type="submit" name="validasi" value="Validasi" class="btn bg-gradient-success">
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- validasi modal end -->

    <!-- viewdocument Modal start -->
    <div class="modal fade" id="viewdocumentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">View Document</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="lap_pdf">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#catatanModal" class="text-white btn btn-primary active" role="button">Buat Catatan</a>
                </div>

            </div>
        </div>
    </div>
    <!-- viewdocument modal end -->


</div>