<div class="container">

    <div class="row mt-5">
        <!-- //card dashboard -->
        <div class="col-xl-4 col-md-6">
            <a class="text-reset text-decoration-none" href="<?= base_url('ViewHakim/banding') ?>">
                <div class="card bg-satu text-white mb-4">
                    <div class="card-body">
                        <h3>Perkara Banding</h3>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex align-items-center justify-content-between">
                            <small>Perkara Masuk</small> <?php echo $perkara_harian;  ?>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <small>Teregistrasi</small> <?php echo $regis_harian;  ?>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="card bg-satu text-white mb-4">
                <div class="card-body">
                    <h3>Eksaminasi</h3>
                </div>
                <div class="card-footer">
                    <div class="d-flex align-items-center justify-content-between">
                        <small>Berkas Masuk</small> 0
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <small>Direview</small> 0
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="card bg-satu text-white mb-4">
                <div class="card-body">
                    <h3>Laporan Perkara</h3>
                </div>
                <div class="card-footer">
                    <div class="d-flex align-items-center justify-content-between">
                        <small>Perkara Masuk</small> 0
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <small>Ditanggapi</small> 0
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col">

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Data Berkas Masuk
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>

        </div>
    </div>




</div>