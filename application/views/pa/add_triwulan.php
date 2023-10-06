<div class="row mt-3">
    <!-- start data satker -->
    <div class="col-md-6">
        <?php foreach ($laporan as $lp) : ?>
            <div class="card">
                <div class="row p-2 justify-content-start">

                    <div class="row">
                        <div class="col-md-3">
                            <p class="fw-bold">Satker</p>
                        </div>
                        <div class="col-md-auto">
                            <p>:</p>
                        </div>
                        <div class="col-md-auto">
                            <p><?= $lp['nama']; ?></p>
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
                            <p><?= $lp['berkas_laporan']; ?></p>
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
                            <p><?= $lp['periode_tahun']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div> <!-- End data satker -->

<div class="row mt-3">
    <!-- start form upload -->
    <div class="col">
        <!-- table start -->
        <div class="card p-3">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">

                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex flex-column justify-content-center">
                                    <a href="#" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#lap_keuangan_modal">
                                        Upload Laporan Keuangan
                                    </a>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <a href="" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#lap_informasi_modal">
                                        Upload Laporan Meja Informasi
                                    </a>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <a href="" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#lap_pengaduan_modal">
                                        Upload Laporan Pengaduan
                                    </a>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- table end -->
    </div>
</div>





<!-- Modal upload lap. Keuangan -->
<div class="modal fade" id="lap_keuangan_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6>Upload Laporan Triwulan Keuangan</h6>
            </div>
            <div class="modal-body">

                <form method="POST" action="<?php echo base_url('pa/PA_laper/uploadLaporanTriwulan'); ?>" enctype="multipart/form-data">
                    <?php foreach ($laporan as $lp) : ?>
                        <input type="text" name="id" value="<?= $lp['id'] ?>" hidden>
                        <input type="text" name="berkas_laporan" value="<?= $lp['berkas_laporan'] ?>" hidden>
                        <input type="text" name="tahun" value="<?= $lp['periode_tahun'] ?>" hidden>
                        <input type="text" name="nm_laporan" value="Keuangan" hidden>
                        <div class="input-group input-group-sm input-group-outline my-3">
                            <div class="col-3">
                                <label class="form-label">File PDF</label>
                            </div>
                            <div class="col">
                                <input type="file" name="file1" class="form-control form-control-sm" accept=".pdf" required>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                Ukurang maksimal file 25 mb.
                                </small>
                            </div>
                        </div>
                        <div class="input-group input-group-sm input-group-outline my-3">
                            <div class="col-3">
                                <label class="form-label">File Excel</label>
                            </div>
                            <div class="col">
                                <input type="file" name="file2" class="form-control form-control-sm" accept=".xls,.xlsx" required>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                Ukurang maksimal file 25 mb.
                                </small>
                            </div>
                        </div>

                    <?php endforeach; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal upload lap. keuangan -->

<!-- Modal upload lap. meja informasi  -->
<div class="modal fade" id="lap_informasi_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6>Upload Laporan Triwulan Meja Informasi</h6>
            </div>
            <div class="modal-body">

                <form method="POST" action="<?php echo base_url('pa/PA_laper/uploadLaporanTriwulan'); ?>" enctype="multipart/form-data">
                    <?php foreach ($laporan as $lp) : ?>
                        <input type="text" name="id" value="<?= $lp['id'] ?>" hidden>
                        <input type="text" name="berkas_laporan" value="<?= $lp['berkas_laporan'] ?>" hidden>
                        <input type="text" name="tahun" value="<?= $lp['periode_tahun'] ?>" hidden>
                        <input type="text" name="nm_laporan" value="Meja Informasi" hidden>
                        <div class="input-group input-group-sm input-group-outline my-3">
                            <div class="col-3">
                                <label class="form-label">File PDF</label>
                            </div>
                            <div class="col">
                                <input type="file" name="file1" class="form-control form-control-sm" accept=".pdf" required>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                Ukurang maksimal file 25 mb.
                                </small>
                            </div>
                        </div>
                        <div class="input-group input-group-sm input-group-outline my-3">
                            <div class="col-3">
                                <label class="form-label">File Excel</label>
                            </div>
                            <div class="col">
                                <input type="file" name="file2" class="form-control form-control-sm" accept=".xls, .xlsx" required>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                Ukurang maksimal file 25 mb.
                                </small>
                            </div>
                        </div>

                    <?php endforeach; ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal upload lap. meja informasi -->

<!-- Modal upload lap. pengaduan  -->
<div class="modal fade" id="lap_pengaduan_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6>Upload Laporan Triwulan Pengaduan</h6>
            </div>
            <div class="modal-body">

                <form method="POST" action="<?php echo base_url('pa/PA_laper/uploadLaporanTriwulan'); ?>" enctype="multipart/form-data">
                    <?php foreach ($laporan as $lp) : ?>
                        <input type="text" name="id" value="<?= $lp['id'] ?>" hidden>
                        <input type="text" name="berkas_laporan" value="<?= $lp['berkas_laporan'] ?>" hidden>
                        <input type="text" name="tahun" value="<?= $lp['periode_tahun'] ?>" hidden>
                        <input type="text" name="nm_laporan" value="Laporan Pengaduan" hidden>
                        <div class="input-group input-group-sm input-group-outline my-3">
                            <div class="col-3">
                                <label class="form-label">File PDF</label>
                            </div>
                            <div class="col">
                                <input type="file" name="file1" class="form-control form-control-sm" accept=".pdf" required>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                Ukurang maksimal file 25 mb.
                                </small>
                            </div>
                        </div>
                        <div class="input-group input-group-sm input-group-outline my-3">
                            <div class="col-3">
                                <label class="form-label">File Excel</label>
                            </div>
                            <div class="col">
                                <input type="file" name="file2" class="form-control form-control-sm" accept=".xls, .xlsx" required>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                Ukurang maksimal file 25 mb.
                                </small>
                            </div>
                        </div>

                    <?php endforeach; ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal upload lap. pengaduan -->