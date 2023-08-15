    <div class="container-fluid py-4">

        <div class="row">
            <div class="col">
                <div class="div">
                    <!-- alert start -->
                    <?php //session flash data
                    if ($this->session->flashdata('msg')) :
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('msg'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    endif;
                    //end flash data
                    ?>
                    <!-- alert end -->
                </div>
            </div>
        </div>


        <div class="row mx-4 my-3">
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
                                <a class="dropdown-item" href="<?= base_url('pp/Pp_laper/triwulan'); ?>">All</a>
                            </li> -->
                            <?php foreach ($years as $y) : ?>

                                <li><a class="dropdown-item" href="<?php echo base_url(); ?>pp/Pp_laper/triwulan_search_year/<?php echo $y['year'];  ?>" value="1"><?php echo $y['year']; ?></a></li>


                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <!-- dropdown end -->
            </div>
        </div>

        <!-- table start -->
        <div class="card mx-4">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr class="text-center">
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Satker</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Triwulan I
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Triwulan II
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Triwulan III
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Triwulan IV
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- looping data start -->

                        <?php $i = 1; ?>
                        <?php foreach ($nama_user as $nm) : ?>

                            <tr class="text-center">
                                <td>
                                    <div class="d-flex flex-column justify-content-center">
                                        <p class="text-xs text-secondary mb-0 ms-3"><?php echo $i++; ?></p>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex flex-column justify-content-center">
                                        <p class="text-xs text-secondary mb-0"><?php echo $nm['nama']; ?></p>
                                    </div>
                                </td>

                                <td>
                                    <?php foreach ($all as $one) : ?>
                                        <!-- <?php if ($nm['id'] == $one['id_user'] and $one['periode'] == '2022-01') {
                                                    echo "√";
                                                } ?>     -->
                                        <?php if ($nm['id'] == $one['id_user'] and $one['periode_triwulan'] == '03' and $one['tanggal'] <= '5' and $one['status_laporan'] != 'Revisi') : ?>
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="<?= base_url('pp/Pp_laper/view_triwulan/') . $one['id'] ?>" class="text-decoration-none">
                                                    <p class="text-xs text-white mb-0 rounded bg-success">
                                                        √
                                                    </p>
                                                </a>
                                            </div>
                                        <?php elseif ($nm['id'] == $one['id_user'] and $one['periode_triwulan'] == '03' and $one['tanggal'] > '5' and $one['tanggal'] <= '10' and $one['status_laporan'] != 'Revisi') : ?>
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="<?= base_url('pp/Pp_laper/view_triwulan/') . $one['id'] ?>" class="text-decoration-none">
                                                    <p class="text-xs text-white mb-0 rounded bg-warning">
                                                        √
                                                    </p>
                                                </a>
                                            </div>
                                        <?php elseif ($nm['id'] == $one['id_user'] and $one['periode_triwulan'] == '03' and $one['tanggal'] > '10' and $one['status_laporan'] != 'Revisi') : ?>
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="<?= base_url('pp/Pp_laper/view_triwulan/') . $one['id'] ?>" class="text-decoration-none">
                                                    <p class="text-xs text-white mb-0 rounded bg-danger">
                                                        √
                                                    </p>
                                                </a>
                                            </div>
                                        <?php elseif ($nm['id'] == $one['id_user'] and $one['periode_triwulan'] == '03' and $one['tanggal'] >= '1' and $one['status_laporan'] == 'Revisi') : ?>
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="<?= base_url('pp/Pp_laper/view_triwulan/') . $one['id'] ?>" class="text-decoration-none">
                                                    <p class="text-xs text-white mb-0 rounded bg-dark  ">
                                                        R
                                                    </p>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php foreach ($all as $one) : ?>
                                        <!-- <?php if ($nm['id'] == $one['id_user'] and $one['periode'] == '2022-02') {
                                                    echo "√";
                                                } ?>     -->
                                        <?php if ($nm['id'] == $one['id_user'] and $one['periode_triwulan'] == '06' and $one['tanggal'] <= '5' and $one['status_laporan'] != 'Revisi') : ?>
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="<?= base_url('pp/Pp_laper/view_triwulan/') . $one['id'] ?>" class="text-decoration-none">
                                                    <p class="text-xs text-white mb-0 rounded bg-success">
                                                        √
                                                    </p>
                                                </a>
                                            </div>
                                        <?php elseif ($nm['id'] == $one['id_user'] and $one['periode_triwulan'] == '06' and $one['tanggal'] > '5' and $one['tanggal'] <= '10' and $one['status_laporan'] != 'Revisi') : ?>
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="<?= base_url('pp/Pp_laper/view_triwulan/') . $one['id'] ?>" class="text-decoration-none">
                                                    <p class="text-xs text-white mb-0 rounded bg-warning">
                                                        √
                                                    </p>
                                                </a>
                                            </div>
                                        <?php elseif ($nm['id'] == $one['id_user'] and $one['periode_triwulan'] == '06' and $one['tanggal'] > '10' and $one['status_laporan'] != 'Revisi') : ?>
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="<?= base_url('pp/Pp_laper/view_triwulan/') . $one['id'] ?>" class="text-decoration-none">
                                                    <p class="text-xs text-white mb-0 rounded bg-danger">
                                                        √
                                                    </p>
                                                </a>
                                            </div>
                                        <?php elseif ($nm['id'] == $one['id_user'] and $one['periode_triwulan'] == '06' and $one['tanggal'] >= '1' and $one['status_laporan'] == 'Revisi') : ?>
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="<?= base_url('pp/Pp_laper/view_triwulan/') . $one['id'] ?>" class="text-decoration-none">
                                                    <p class="text-xs text-white mb-0 rounded bg-dark  ">
                                                        R
                                                    </p>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php foreach ($all as $one) : ?>
                                        <!-- <?php if ($nm['id'] == $one['id_user'] and $one['periode'] == '2022-03') {
                                                    echo "√";
                                                } ?>     -->
                                        <?php if ($nm['id'] == $one['id_user'] and $one['periode_triwulan'] == '09' and $one['tanggal'] <= '5' and $one['status_laporan'] != 'Revisi') : ?>
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="<?= base_url('pp/Pp_laper/view_triwulan/') . $one['id'] ?>" class="text-decoration-none">
                                                    <p class="text-xs text-white mb-0 rounded bg-success">
                                                        √
                                                    </p>
                                                </a>
                                            </div>
                                        <?php elseif ($nm['id'] == $one['id_user'] and $one['periode_triwulan'] == '09' and $one['tanggal'] > '5' and $one['tanggal'] <= '10' and $one['status_laporan'] != 'Revisi') : ?>
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="<?= base_url('pp/Pp_laper/view_triwulan/') . $one['id'] ?>" class="text-decoration-none">
                                                    <p class="text-xs text-white mb-0 rounded bg-warning">
                                                        √
                                                    </p>
                                                </a>
                                            </div>
                                        <?php elseif ($nm['id'] == $one['id_user'] and $one['periode_triwulan'] == '09' and $one['tanggal'] > '10' and $one['status_laporan'] != 'Revisi') : ?>
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="<?= base_url('pp/Pp_laper/view_triwulan/') . $one['id'] ?>" class="text-decoration-none">
                                                    <p class="text-xs text-white mb-0 rounded bg-danger">
                                                        √
                                                    </p>
                                                </a>
                                            </div>
                                        <?php elseif ($nm['id'] == $one['id_user'] and $one['periode_triwulan'] == '09' and $one['tanggal'] >= '1' and $one['status_laporan'] == 'Revisi') : ?>
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="<?= base_url('pp/Pp_laper/view_triwulan/') . $one['id'] ?>" class="text-decoration-none">
                                                    <p class="text-xs text-white mb-0 rounded bg-dark  ">
                                                        R
                                                    </p>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php foreach ($all as $one) : ?>
                                        <!-- <?php if ($nm['id'] == $one['id_user'] and $one['periode'] == '2022-04') {
                                                    echo "√";
                                                } ?>     -->
                                        <?php if ($nm['id'] == $one['id_user'] and $one['periode_triwulan'] == '12' and $one['tanggal'] <= '5' and $one['status_laporan'] != 'Revisi') : ?>
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="<?= base_url('pp/Pp_laper/view_triwulan/') . $one['id'] ?>" class="text-decoration-none">
                                                    <p class="text-xs text-white mb-0 rounded bg-success">
                                                        √
                                                    </p>
                                                </a>
                                            </div>
                                        <?php elseif ($nm['id'] == $one['id_user'] and $one['periode_triwulan'] == '12' and $one['tanggal'] > '5' and $one['tanggal'] <= '10' and $one['status_laporan'] != 'Revisi') : ?>
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="<?= base_url('pp/Pp_laper/view_triwulan/') . $one['id'] ?>" class="text-decoration-none">
                                                    <p class="text-xs text-white mb-0 rounded bg-warning">
                                                        √
                                                    </p>
                                                </a>
                                            </div>
                                        <?php elseif ($nm['id'] == $one['id_user'] and $one['periode_triwulan'] == '12' and $one['tanggal'] > '10' and $one['status_laporan'] != 'Revisi') : ?>
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="<?= base_url('pp/Pp_laper/view_triwulan/') . $one['id'] ?>" class="text-decoration-none">
                                                    <p class="text-xs text-white mb-0 rounded bg-danger">
                                                        √
                                                    </p>
                                                </a>
                                            </div>
                                        <?php elseif ($nm['id'] == $one['id_user'] and $one['periode_triwulan'] == '12' and $one['tanggal'] >= '1' and $one['status_laporan'] == 'Revisi') : ?>
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="<?= base_url('pp/Pp_laper/view_triwulan/') . $one['id'] ?>" class="text-decoration-none">
                                                    <p class="text-xs text-white mb-0 rounded bg-dark  ">
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
        <!-- table end -->

        <div class="row mb-5 mx-4">
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