<div class="row">

    <?php foreach ($laporan as $lp) : ?>
        <div class="row bg-gray-400 justify-content-start">

            <div class="row mt-5">
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
            <div class="row">
                <div class="col-md-2">
                    <p class="fw-bold">Periode Laporan</p>
                </div>
                <div class="col-md-auto">
                    <p>:</p>
                </div>
                <div class="col-md-auto">
                    <p><?php echo $lp['periode']; ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="row mt-3">
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
                                            <p class="text-xs text-secondary mb-0 ms-3"><?php echo $i++; ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-xs"><?php echo $lhs['periode']; ?></h6>
                                            <p class="text-xs text-secondary mb-0"><?php echo $lhs['berkas_laporan']; ?></p>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-normal"><?php echo $lhs['tgl_upload']; ?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-normal">
                                            <a href="<?= base_url() . 'files/laporan_perkara/' . $laporan['0']['kode_pa'] ?> <?= $laporan['0']['periode'] ?>/<?= $laporan['0']['laper_pdf'] ?>" target="blank"><i class="fas fa-file-pdf text-secondary"></i></a> |
                                            <a href="<?= base_url() . 'files/laporan_perkara/' . $laporan['0']['kode_pa'] ?> <?= $laporan['0']['periode'] ?>/<?= $laporan['0']['laper_xls'] ?>" target="blank"><i class="fas fa-file-excel text-secondary"></i></a>
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-normal">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#catatanModal"><i class="fas fa-clipboard-list text-secondary"></i></a>

                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-normal">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#revisiModal"><i class="fas fa-upload text-secondary"></i></a> | <a href="<?php echo base_url() ?>pa/PA_laper/zip_file/<?= $laporan['0']['id'] ?>"><i class="fas fa-download text-secondary"></i></a>
                                        </span>

                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-normal">
                                            <?php echo $lhs['tgl_terakhir_rev']; ?>
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php if ($lhs['status'] == "Belum Validasi") : ?>
                                            <span id="validate" class="text-white bg-danger text-xs font-weight-normal">
                                                <?php echo $lhs['status']; ?>
                                            </span>
                                        <?php elseif ($lhs['status'] == "Revisi") : ?>
                                            <span id="validate" class="text-white bg-dark text-xs font-weight-normal">
                                                <?php echo $lhs['status']; ?>
                                            </span>
                                        <?php else : ?>
                                            <span id="validate" class="text-white bg-success text-xs font-weight-normal">
                                                <?php echo $lhs['status']; ?>
                                            </span>
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


</div>

<!-- catatanModal start -->
<div class="modal fade" id="catatanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Catatan Perbaikan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">

                <?php foreach ($catatan as $ct) : ?>
                    <div class="card card-frame mb-2">
                        <div class="card-body">
                            <h6><?php echo $ct['tgl_catatan']; ?></h6>
                            <p><?php echo $ct['catatan']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- catatan modal end -->

<!-- modal Revisi Laporan Perkara Bulanan-->
<div class="modal fade" id="revisiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Revisi Laporan Perkara</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <?php foreach ($laporan as $lp) : ?>
                    <form method="POST" action="<?php echo base_url('pa/PA_laper/revisi_laporan_perkara'); ?>" enctype="multipart/form-data">

                        <input type="hidden" class="form-controll" value="<?php echo $lp['id'] ?>" name="id">
                        <input type="hidden" class="form-controll" value="<?php echo $lp['periode'] ?>" name="periode">

                        <div class="input-group input-group-static my-3">
                            <label for="upload-pdf">Upload file PDF</label>
                            <input id="upload-pdf" type="file" name="file1" class="form-control" accept=".pdf" required>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Ukurang maksimal file 25 mb.
                            </small>
                        </div>
                        <div class="input-group input-group-static my-3">
                            <label for="upload-zip">Upload file XLS</label>
                            <input id="upload-zip" type="file" name="file2" class="form-control" accept=".xls,.xlsx" required>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Ukurang maksimal file 25 mb.
                            </small>
                        </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="text-white btn bg-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="text-white btn bg-primary">Simpan</button>
            </div>
            </form>
        <?php endforeach; ?>
        <!-- form end -->
        </div>
    </div>
</div>