<div class="container">
    <div class="row mt-3">
                    <div class="col text-center">
                        <h6 class="d-block">Rekap Laporan Perkara <br> Tahun <?= $current_year; ?>
                            <!-- <script>
                                document.write(new Date().getFullYear())
                            </script> -->
                        </h6>
                        <!-- dropdown start -->
                        <div class="d-flex justify-content-center">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Pilih Tahun 
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" id="tahun">

                                    <!-- <li>
                                        <a class="dropdown-item" href="<?= base_url('hakim/Hakim_laper/rekap_laporan'); ?>">All</a>
                                    </li> -->
                                    <?php foreach ($years as $y) : ?>

                                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>hakim/Hakim_laper/rekap_search_year/<?php echo $y['year'];  ?>" value="1"><?php echo $y['year']; ?></a></li>


                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <!-- dropdown end -->
                    </div>
    </div>
        <div class ="row mt-3">
            <div class ="col">
                <!-- table start -->
                
                    <div class="table-responsive">
                        <table class="table align-items-center mb-3">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Jan</th>
                                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Feb</th>
                                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Mar</th>
                                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Apr</th>
                                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Mei</th>
                                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Jun</th>
                                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Jul</th>
                                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Agu</th>
                                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Sep</th>
                                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Okt</th>
                                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Nov</th>
                                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center">Des</th>

                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        <?php foreach ($all as $one) : ?>
                                            <?php if (date('m', strtotime($one['periode'])) == '01') : ?>
                                                <div class="d-flex flex-column justifxy-content-center px-3">
                                                    <a href="<?php echo base_url() ?>hakim/hakim_laper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                        <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                                </div>

                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <?php foreach ($all as $one) : ?>
                                            <?php if (date('m', strtotime($one['periode'])) == '02') : ?>
                                                <div class="d-flex flex-column justifxy-content-center px-3">
                                                    <a href="<?php echo base_url() ?>hakim/hakim_laper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                        <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                                </div>

                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                    </td>
                                    <td>
                                        <?php foreach ($all as $one) : ?>
                                            <?php if (date('m', strtotime($one['periode'])) == '03') : ?>
                                                <div class="d-flex flex-column justifxy-content-center px-3">
                                                    <a href="<?php echo base_url() ?>hakim/hakim_laper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                        <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                                </div>

                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <?php foreach ($all as $one) : ?>
                                            <?php if (date('m', strtotime($one['periode'])) == '04') : ?>
                                                <div class="d-flex flex-column justifxy-content-center px-3">
                                                    <a href="<?php echo base_url() ?>hakim/hakim_laper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                        <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                                </div>

                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <?php foreach ($all as $one) : ?>
                                            <?php if (date('m', strtotime($one['periode'])) == '05') : ?>
                                                <div class="d-flex flex-column justifxy-content-center px-3">
                                                    <a href="<?php echo base_url() ?>hakim/hakim_laper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                        <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                                </div>

                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <?php foreach ($all as $one) : ?>
                                            <?php if (date('m', strtotime($one['periode'])) == '06') : ?>
                                                <div class="d-flex flex-column justifxy-content-center px-3">
                                                    <a href="<?php echo base_url() ?>hakim/hakim_laper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                        <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                                </div>

                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <?php foreach ($all as $one) : ?>
                                            <?php if (date('m', strtotime($one['periode'])) == '07') : ?>
                                                <div class="d-flex flex-column justifxy-content-center px-3">
                                                    <a href="<?php echo base_url() ?>hakim/hakim_laper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                        <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                                </div>

                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <?php foreach ($all as $one) : ?>
                                            <?php if (date('m', strtotime($one['periode'])) == '08') : ?>
                                                <div class="d-flex flex-column justifxy-content-center px-3">
                                                    <a href="<?php echo base_url() ?>hakim/hakim_laper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                        <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                                </div>

                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <?php foreach ($all as $one) : ?>
                                            <?php if (date('m', strtotime($one['periode'])) == '09') : ?>
                                                <div class="d-flex flex-column justifxy-content-center px-3">
                                                    <a href="<?php echo base_url() ?>hakim/hakim_laper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                        <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                                </div>

                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <?php foreach ($all as $one) : ?>
                                            <?php if (date('m', strtotime($one['periode'])) == '10') : ?>
                                                <div class="d-flex flex-column justifxy-content-center px-3">
                                                    <a href="<?php echo base_url() ?>hakim/hakim_laper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                        <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                                </div>

                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <?php foreach ($all as $one) : ?>
                                            <?php if (date('m', strtotime($one['periode'])) == '11') : ?>
                                                <div class="d-flex flex-column justifxy-content-center px-3">
                                                    <a href="<?php echo base_url() ?>hakim/hakim_laper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                        <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                                </div>

                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <?php foreach ($all as $one) : ?>
                                            <?php if (date('m', strtotime($one['periode'])) == '12') : ?>
                                                <div class="d-flex flex-column justifxy-content-center px-3">
                                                    <a href="<?php echo base_url() ?>hakim/hakim_laper/detail_rekap_laporan/<?= $one['id'] ?>">
                                                        <p class="text-xs text-center bg-success rounded text-white mb-0">√</p>
                                                </div>

                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                
                <!-- table end -->

                <div class="row mt-4">
                    <div class="col">
                        <div class="card card-frame mb-4">
                            <div class="card-body">
                                <h6 class="text-center">
                                    GRAFIK REKAP KECAPATAN & KETEPATAN <br>REKAP LAPORAN PERKARA
                                </h6>
                                <div>
                                    <canvas id="chart_rekaplaper" width="100%" height="30"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>