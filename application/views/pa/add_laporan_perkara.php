<div class="row">

    <div class="col">

        <h6 class="mt-3">Tambah Laporan Perkara Bulanan</h6>
        <div class="row mt-3">
            <div class="col-lg-4">
                <form method="POST" action="<?php echo base_url('pa/PA_laper/add_laporan_perkara'); ?>" enctype="multipart/form-data">

                    <!-- form start -->
                    <div class="mb-3 row">
                        <label for="bulan" class="col-sm-2 col-form-label">Periode</label>
                        <div class="col-sm-10">
                            <input type="month" name="periode" class="form-control" id="bulan">
                            <div class="form-text text-danger"><?= form_error('periode') ?></div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="upload_pdf" class="col-sm-2 col-form-label">Upload File PDF</label>
                        <div class="col-sm-10">
                            <input type="file" name="file1" class="form-control" id="upload_pdf" accept=".pdf" required>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Ukuran maksimal file 25 mb.
                            </small>
                            <div class="form-text text-danger"><?= form_error('file1') ?></div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="upload_zip" class="col-sm-2 col-form-label">Upload File Excel</label>
                        <div class="col-sm-10">
                            <input type="file" name="file2" class="form-control" id="upload_zip" accept=".xls,.xlsx" required>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Ukuran maksimal file 25 mb.
                            </small>
                            <div class="form-text text-danger"><?= form_error('file2') ?></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>

                </form> <!-- Form end -->
            </div>
        </div>

    </div>


</div>