<div class="row">
  <div class="col text-center">
    <h6>Laporan Perkara Tahun <?= $current_year; ?>
      <!-- <script>
        document.write(new Date().getFullYear())
      </script> -->
    </h6>
    <!-- dropdown start -->
    <div>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Pilih Tahun
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" id="tahun">
          <li>
            <a class="dropdown-item" href="<?= base_url('pa/PA_laper'); ?>">All</a>
          </li>

          <?php foreach ($years as $y) : ?>

            <li>
              <a class="dropdown-item" href="<?php echo base_url('pa/PA_laper/laporan/'); ?><?= $y['year'];  ?>"><?= $y['year']; ?></a>
            </li>


          <?php endforeach; ?>
        </ul>
      </div>





    </div>
    <!-- dropdown end -->
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="div mt-3 col-lg-6 col-md-12">
      <!-- alert start -->
      <?php //session flash data
      if ($this->session->flashdata('message')) :
      ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <?= $this->session->flashdata('message'); ?>
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


<!-- tabel start -->
<div class="row mt-3">
  <div class="col">

    <!-- button tambah laporan -->
    <a class="btn btn-success" href="<?= base_url('pa/PA_laper/add_laporan_perkara'); ?>">Tambah laporan</a>

    <div class="row mt-3">
      <div class="table-responsive">
        <table class="table align-items-center mb-0" id="bandingTable">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bulan / Berkas</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl Upload
              </th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl Revisi
                Akhir
              </th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status
              </th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
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
                  <span class="text-secondary text-xs font-weight-normal"><?php echo $lhs['tgl_terakhir_rev']; ?></span>
                </td>
                <td class="align-middle text-center">
                  <?php if ($lhs['tanggal'] <= '5' and $lhs['status'] != 'Revisi') : ?>
                    <span class="text-success text-xs font-weight-normal">
                      <i class="fas fa-check-circle"></i>
                    </span>
                  <?php elseif ($lhs['tanggal'] > '5' and $lhs['tanggal'] <= '10' and $lhs['status'] != 'Revisi') : ?>
                    <span class="text-warning text-xs font-weight-normal">
                      <i class="fas fa-check-circle"></i>
                    </span>
                  <?php elseif ($lhs['tanggal'] > '10' and $lhs['status'] != 'Revisi') : ?>
                    <span class="text-danger text-xs font-weight-normal">
                      <i class="fas fa-check-circle"></i>
                    </span>
                  <?php elseif ($lhs['tanggal'] >= '1' and $lhs['status'] = 'Revisi') : ?>
                    <span class="text-dark text-xs font-weight-normal">
                      <i class="fas fa-check-circle"></i>
                    </span>
                  <?php endif; ?>
                </td>
                <td class="align-middle text-center">
                  <!--  <a href="javascript:;" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Upload">
                    <i class="fas fa-upload"></i>
                  </a> |
                  <a href="javascript:;" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit">
                    <i class="fa fa-edit"></i>
                  </a> |
                  <a href="javascript:;" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Download">
                    <i class="fas fa-download"></i>
                  </a> | -->
                  <a href="<?= base_url('pa/PA_laper/view_laporan/') . $lhs['id'] ?>" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Lihat" title="Detail">
                    <i class="fa fa-eye"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>

            <!-- looping data end -->

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- tabel end -->

<div class="row mb-5">
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