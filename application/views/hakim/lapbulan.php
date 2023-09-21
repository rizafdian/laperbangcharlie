<div class="container">
    <div class="row mt-3">
        
        <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-laper-tab" data-toggle="tab" data-target="#nav-laper" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Laporan Perkara</button>
            <button class="nav-link" id="nav-rekaplaper-tab" data-toggle="tab" data-target="#nav-rekaplaper" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Rekap Laporan Perkara</button>
            <button class="nav-link" id="nav-triwulan-tab" data-toggle="tab" data-target="#nav-triwulan" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Laporan Triwulan</button>
            <button class="nav-link" id="nav-rekaptriwulan-tab" data-toggle="tab" data-target="#nav-rekaptriwulan" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Rekap Laporan Triwulan</button>
        </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-laper" role="tabpanel" aria-labelledby="nav-laper-tab">
                <div class="row mt-3">
                    <div class="col text-center">
                        <h6 class="d-block">Laporan Perkara <br> Tahun <script>
                                document.write(new Date().getFullYear())
                            </script>
                        </h6>
                        <!-- dropdown start -->
                        <div class="d-flex justify-content-center">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Pilih Tahun
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                    <!-- <li>
                                        <a class="dropdown-item" href="<?= base_url('admin/Adminlaper'); ?>">All</a>
                                    </li> -->
                                    <?php foreach ($years as $y) : ?>

                                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>index.php/hakim/Hakim_laper/laper_search_year/<?php echo $y['year'];  ?>" value="1"><?php echo $y['year']; ?></a></li>


                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <!-- dropdown end -->
                    </div>
                </div>

                    <!-- table start -->
                    <div class="row mt-3">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">#</th>
                                            <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Satker</th>
                                            <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Jan
                                            </th>
                                            <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Feb
                                            </th>
                                            <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Mar
                                            </th>
                                            <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Apr
                                            </th>
                                            <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Mei
                                            </th>
                                            <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Jun
                                            </th>
                                            <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Jul
                                            </th>
                                            <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Agu
                                            </th>
                                            <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Sept
                                            </th>
                                            <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Okt
                                            </th>
                                            <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Nov
                                            </th>
                                            <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Des
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- looping data start -->

                                        <?php $i = 1; ?>
                                        <?php foreach ($nama_user as $nm) : ?>

                                            <tr>
                                                <td>
                                                    <div class="text-center">
                                                        <p class="text-secondary mb-0"><?php echo $i++; ?></p>
                                                    </div>
                                                </td>

                                                <td class="text-center">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="text-secondary mb-0"><?php echo $nm['nama']; ?></p>
                                                    </div>
                                                </td>

                                                <td class="text-center">
                                                    <?php foreach ($all as $one) : ?>
                                                        <!-- <?php if ($nm['id'] == $one['id_user'] and $one['periode'] == '2022-01') {
                                                                    echo "√";
                                                                } ?>     -->
                                                        <?php if ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '01' and $one['tanggal'] <= '5' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-success">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '01' and $one['tanggal'] > '5' and $one['tanggal'] <= '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-warning">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '01' and $one['tanggal'] > '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-danger">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '01' and $one['tanggal'] >= '1' and $one['status'] == 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-dark  ">
                                                                        R
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach ($all as $one) : ?>
                                                        <!-- <?php if ($nm['id'] == $one['id_user'] and $one['periode'] == '2022-02') {
                                                                    echo "√";
                                                                } ?>     -->
                                                        <?php if ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '02' and $one['tanggal'] <= '5' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-success">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '02' and $one['tanggal'] > '5' and $one['tanggal'] <= '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-warning">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '02' and $one['tanggal'] > '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-danger">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '02' and $one['tanggal'] >= '1' and $one['status'] == 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-dark  ">
                                                                        R
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach ($all as $one) : ?>
                                                        <!-- <?php if ($nm['id'] == $one['id_user'] and $one['periode'] == '2022-03') {
                                                                    echo "√";
                                                                } ?>     -->
                                                        <?php if ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '03' and $one['tanggal'] <= '5' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-success">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '03' and $one['tanggal'] > '5' and $one['tanggal'] <= '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-warning">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '03' and $one['tanggal'] > '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-danger">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '03' and $one['tanggal'] >= '1' and $one['status'] == 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-dark  ">
                                                                        R
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach ($all as $one) : ?>
                                                        <!-- <?php if ($nm['id'] == $one['id_user'] and $one['periode'] == '2022-04') {
                                                                    echo "√";
                                                                } ?>     -->
                                                        <?php if ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '04' and $one['tanggal'] <= '5' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-success">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '04' and $one['tanggal'] > '5' and $one['tanggal'] <= '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-warning">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '04' and $one['tanggal'] > '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-danger">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '04' and $one['tanggal'] >= '1' and $one['status'] == 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-dark  ">
                                                                        R
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach ($all as $one) : ?>
                                                        <!-- <?php if ($nm['id'] == $one['id_user'] and $one['periode'] == '2022-05') {
                                                                    echo "√";
                                                                } ?>     -->
                                                        <?php if ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '05' and $one['tanggal'] <= '5' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-success">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '05' and $one['tanggal'] > '5' and $one['tanggal'] <= '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-warning">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '05' and $one['tanggal'] > '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-danger">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '05' and $one['tanggal'] >= '1' and $one['status'] == 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-dark  ">
                                                                        R
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach ($all as $one) : ?>
                                                        <!-- <?php if ($nm['id'] == $one['id_user'] and $one['periode'] == '2022-06') {
                                                                    echo "√";
                                                                } ?>     -->
                                                        <?php if ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '06' and $one['tanggal'] <= '5' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-success">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '06' and $one['tanggal'] > '5' and $one['tanggal'] <= '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-warning">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '06' and $one['tanggal'] > '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-danger">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '06' and $one['tanggal'] >= '1' and $one['status'] == 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-dark  ">
                                                                        R
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach ($all as $one) : ?>
                                                        <!-- <?php if ($nm['id'] == $one['id_user'] and $one['periode'] == '2022-07') {
                                                                    echo "√";
                                                                } ?>     -->
                                                        <?php if ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '07' and $one['tanggal'] <= '5' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-success">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '07' and $one['tanggal'] > '5' and $one['tanggal'] <= '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-warning">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '07' and $one['tanggal'] > '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-danger">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '07' and $one['tanggal'] >= '1' and $one['status'] == 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-dark  ">
                                                                        R
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach ($all as $one) : ?>
                                                        <!-- <?php if ($nm['id'] == $one['id_user'] and $one['periode'] == '2022-08') {
                                                                    echo "√";
                                                                } ?>     -->
                                                        <?php if ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '08' and $one['tanggal'] <= '5' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-success">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '08' and $one['tanggal'] > '5' and $one['tanggal'] <= '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-warning">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '08' and $one['tanggal'] > '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-danger">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '08' and $one['tanggal'] >= '1' and $one['status'] == 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-dark  ">
                                                                        R
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach ($all as $one) : ?>
                                                        <!-- <?php if ($nm['id'] == $one['id_user'] and $one['periode'] == '2022-09') {
                                                                    echo "√";
                                                                } ?>     -->
                                                        <?php if ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '09' and $one['tanggal'] <= '5' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-success">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '09' and $one['tanggal'] > '5' and $one['tanggal'] <= '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-warning">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '09' and $one['tanggal'] > '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-danger">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '09' and $one['tanggal'] >= '1' and $one['status'] == 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-dark  ">
                                                                        R
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach ($all as $one) : ?>
                                                        <!-- <?php if ($nm['id'] == $one['id_user'] and $one['periode'] == '2022-10') {
                                                                    echo "√";
                                                                } ?>     -->
                                                        <?php if ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '10' and $one['tanggal'] <= '5' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-success">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '10' and $one['tanggal'] > '5' and $one['tanggal'] <= '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-warning">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '10' and $one['tanggal'] > '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-danger">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '10' and $one['tanggal'] >= '1' and $one['status'] == 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-dark  ">
                                                                        R
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach ($all as $one) : ?>
                                                        <!-- <?php if ($nm['id'] == $one['id_user'] and $one['periode'] == '2022-11') {
                                                                    echo "√";
                                                                } ?>     -->
                                                        <?php if ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '11' and $one['tanggal'] <= '5' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-success">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '11' and $one['tanggal'] > '5' and $one['tanggal'] <= '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-warning">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '11' and $one['tanggal'] > '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-danger">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '11' and $one['tanggal'] >= '1' and $one['status'] == 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-dark  ">
                                                                        R
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach ($all as $one) : ?>
                                                        <!-- <?php if ($nm['id'] == $one['id_user'] and $one['periode'] == '2022-12') {
                                                                    echo "√";
                                                                } ?>     -->
                                                        <?php if ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '12' and $one['tanggal'] <= '5' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-success">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '12' and $one['tanggal'] > '5' and $one['tanggal'] <= '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-warning">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '12' and $one['tanggal'] > '10' and $one['status'] != 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-danger">
                                                                        √
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php elseif ($nm['id'] == $one['id_user'] and date('m', strtotime($one['periode'])) == '12' and $one['tanggal'] >= '1' and $one['status'] == 'Revisi') : ?>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <a class="text-decoration-none" href="<?= base_url('admin/adminlaper/view_document/') . $one['id'] ?>">
                                                                    <p class="text-white mb-0 rounded bg-dark  ">
                                                                        R
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>




                                        <!-- looping data end -->

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- table end -->

                    <div class="row mt-3">
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
            </div>

            <div class="tab-pane fade" id="nav-rekaplaper" role="tabpanel" aria-labelledby="nav-rekaplaper-tab">Rekap Laporan Perkara</div>
            <div class="tab-pane fade" id="nav-triwulan" role="tabpanel" aria-labelledby="nav-triwulan-tab">Laporan Triwulan</div>
            <div class="tab-pane fade" id="nav-rekaptriwulan" role="tabpanel" aria-labelledby="nav-rekaptriwulan-tab">Rekap Laporan Triwulan</div>
        </div>

    </div> 
    
</div>