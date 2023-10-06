<!-- baru -->

<!-- data satker start -->
<div class="row">
    <div class="col-md-6">
        <?php foreach ($triwulan as $lp) : ?>
            <div class="row bg-gray-400 justify-content-start">

                <div class="row mt-5">
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
                <div class="row">
                    <div class="col-md-3">
                        <p class="fw-bold">Laporan Triwulan</p>
                    </div>
                    <div class="col-md-auto">
                        <p>:</p>
                    </div>
                    <div class="col-md-auto">
                        <p><?php echo $lp['berkas_laporan']; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
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
    </div>
</div>
<!-- data satker end -->

<!-- row baru -->
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
                                        <p class="text-xs text-secondary mb-0 ms-3"><?php echo $i ?></p>
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
                                        <a href="<?= base_url('files/laporan_triwulan/') ?><?= $lhs['kode_pa'] ?> <?= $lhs['berkas_laporan'] ?> <?= $lhs['periode_tahun'] ?>/<?= $lhs['nm_laporan'] ?>/<?= $lhs['lap_pdf'] ?>" class="text-decoration-none text-secondary" target="blank">
                                            <i class="fas fa-file-pdf"></i>
                                        </a> |
                                        <a href="<?= base_url('files/laporan_triwulan/') ?><?= $lhs['kode_pa'] ?> <?= $lhs['berkas_laporan'] ?> <?= $lhs['periode_tahun'] ?>/<?= $lhs['nm_laporan'] ?>/<?= $lhs['lap_xls'] ?>" class="text-decoration-none text-secondary" target="blank">
                                            <i class="fas fa-file-excel"></i>
                                        </a>
                                    </span>
                                </td>

                                <td class="text-secondary align-middle text-center">
                                    <span class="text-success text-xs font-weight-normal">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#catatanModalbaru<?= $lhs['id_triwulan'] ?>" class="text-decoration-none text-secondary"><i class="fas fa-clipboard"></i></a>
                                    </span>
                                </td>

                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-normal">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#revisiModal<?= $lhs['id_triwulan'] ?>" class="text-decoration-none text-secondary">
                                            <i class="fas fa-upload"></i>
                                        </a>
                                        |
                                        <a href="<?php echo base_url() ?>pa/PA_laper/zip_file_triwulan/<?= $lhs['id_triwulan'] ?>" class="text-decoration-none text-secondary">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    </span>

                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-normal">
                                        <?php echo $lhs['tgl_revisi']; ?>
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <?php if ($lhs['status_validasi'] == "Belum Validasi") : ?>
                                        <span id="validate" class="text-white bg-danger text-xs font-weight-normal">
                                            <?php echo $lhs['status_validasi']; ?>
                                        </span>
                                    <?php elseif ($lhs['status_validasi'] == "Revisi") : ?>
                                        <span id="validate" class="text-white bg-dark text-xs font-weight-normal">
                                            <?php echo $lhs['status_validasi']; ?>
                                        </span>
                                    <?php else : ?>
                                        <span id="validate" class="text-white bg-success text-xs font-weight-normal">
                                            <?php echo $lhs['status_validasi']; ?>
                                        </span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                        <!-- looping data end -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- table end -->
    </div>
</div> <!-- end row -->



<!-- inimodal catatan sudah bisa jalan om riyan -->
<!-- catatanModal start -->

<?php foreach ($laporan as $lhs) : ?>
    <div class="modal fade" id="catatanModalbaru<?= $lhs['id_triwulan'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Catatan Perbaikan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <?php foreach ($catatan as $ct) : ?>
                        <?php if ($ct['id_triwulan'] == $lhs['id_triwulan']) : ?>
                            <div class="card card-frame mb-2">
                                <div class="card-body">
                                    <h6><?php echo $ct['tgl_catatan']; ?></h6>
                                    <p><?php echo $ct['catatan']; ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php
                    endforeach;
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php
endforeach;
?>

<!-- catatan modal end -->

<!-- modal -->
<!-- kalo revisi modalnya jalan, karena foreachnya dari $laporan  -->
<?php foreach ($laporan as $lhs) : ?>
    <div class="modal fade" id="revisiModal<?= $lhs['id_triwulan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Revisi Laporan Perkara</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form start -->

                    <form method="POST" action="<?php echo base_url('pa/PA_laper/revisi_laporan_triwulan'); ?>" enctype="multipart/form-data">

                        <input type="hidden" class="form-controll" value="<?php echo $lhs['id_triwulan'] ?>" name="id">
                        <input type="hidden" class="form-controll" value="<?php echo $lhs['berkas_laporan'] ?>" name="berkas_laporan">
                        <input type="hidden" class="form-controll" value="<?php echo $lhs['periode_tahun'] ?>" name="periode_tahun">
                        <input type="hidden" class="form-controll" value="<?php echo $lhs['nm_laporan'] ?>" name="nm_laporan">

                        <div class="input-group input-group-static my-3">
                            <label for="upload-pdf">Upload file PDF</label>
                            <input id="upload-pdf" type="file" name="file1" class="form-control" accept=".pdf" required>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Ukurang maksimal file 25 mb.
                            </small>
                        </div>
                        <div class="input-group input-group-static my-3">
                            <label for="upload-zip">Upload file XLS</label>
                            <input id="upload-zip" type="file" name="file2" class="form-control" accept=".xls, .xlsx" required>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Ukurang maksimal file 25 mb.
                            </small>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>

                <!-- form end -->
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- modal -->