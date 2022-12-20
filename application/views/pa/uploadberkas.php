<div class="row mt-3">
    <div class="col-12 col-lg-5">
        <div class="card">
            <div class="card-header">
                <h6>Data Perkara</h6>
            </div>
            <div class="card-body">
                <!-- dataPerkara  -->
                <table class="table table-hover">
                    <tbody>
                        <?php foreach ($perkara as $lhs) : ?>
                            <tr>
                                <th>Nomor Perkara</th>
                                <td><?php echo $lhs['no_perkara']; ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Perkara</th>
                                <td><?php echo $lhs['jns_perkara']; ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengajuan Banding</th>
                                <td><?php echo $lhs['tgl_register']; ?></td>
                            </tr>
                            <tr>
                                <th>Nomor Perkara Banding</th>
                                <td><?php echo $lhs['no_perkara_banding']; ?></td>
                            </tr>
                            <tr>
                                <th>Status Terakhir</th>
                                <td><?php echo $lhs['status_perkara']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- end dataPerkara -->
            </div>
        </div>
    </div>
</div>


<div class="row mt-2">
    <div class="col">
        <!-- accordion -->
        <div class="accordion" id="accordionExample">

            <!-- upload surat pengantar -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button type="button" class="accordion-button bg-light" data-bs-toggle="collapse" data-bs-target="#suratPengantar" aria-expanded="true" aria-controls="collapseOne">
                        <span class="text-satu">Surat Pengantar</span>
                    </button>
                </h2>
                <div id="suratPengantar" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form method="post" action="<?= base_url('pa/banding/pengantar_upload'); ?>" enctype="multipart/form-data">
                            <input type="text" value="<?= $perkara[0]['id_perkara'] ?>" hidden name="id_perkara"></input>
                            <div class="row justify-content-start mb-3">
                                <div class="col-1" style="width: 1rem;">1.</div>
                                <label for="formFileSm" class="col-4 form-label">Surat Pengantar --pdf <span class="fw-bold text-danger">*</span></label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file1" required>
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 5 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['sp_perkara'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/SuratPengantar/') . $perkara['0']['sp_perkara'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['sp_perkara'] ?>
                                    </a>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success" value="upload">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end upload surat pengantar -->

            <!-- upload bundle A -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#bundleA" aria-expanded="false" aria-controls="collapseTwo">
                        <span class="text-satu">Bundle A</span>
                    </button>
                </h2>
                <div id="bundleA" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form method="post" action="<?php echo base_url('pa/banding/multiple_upload'); ?>" enctype="multipart/form-data">
                            <input type="text" value="<?= $perkara[0]['id_perkara'] ?>" hidden name="id_perkara"></input>
                            <div class="row justify-content-start mb-3">
                                <div class="col-1" style="width: 1rem;">1.</div>
                                <label for="formFileSm" class="col-4 form-label">Surat Gugatan</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file1">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 20 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['surat_gugatan'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_a/') . $perkara['0']['surat_gugatan'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['surat_gugatan'] ?>
                                    </a>
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <div class="col-1" style="width: 1rem;">2.</div>
                                <label for="formFileSm" class="col-4 form-label">Surat Kuasa dari Kedua Belah Pihak (bila ada)</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file2">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 20 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['sk_bundelA'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_a/') . $perkara['0']['sk_bundelA'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['sk_bundelA'] ?>
                                    </a>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">3.</div>
                                <label for="formFileSm" class="col-4 form-label">Bukti Pembayaran Panjar Biaya Perkara (SKUM)</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file3">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 20 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['bukti_pemb_panjar'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_a/') . $perkara['0']['bukti_pemb_panjar'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['bukti_pemb_panjar'] ?>
                                    </a>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">4.</div>
                                <label for="formFileSm" class="col-4 form-label">Penetapan Majelis Hakim</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file4">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 20 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['majelis_hakim'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_a/') . $perkara['0']['majelis_hakim'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['majelis_hakim'] ?>
                                    </a>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">5.</div>
                                <label for="formFileSm" class="col-4 form-label">Penunjukan Panitera Pengganti</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file5">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 20 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['penunjukan_pp'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_a/') . $perkara['0']['penunjukan_pp'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['penunjukan_pp'] ?>
                                    </a>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">6.</div>
                                <label for="formFileSm" class="col-4 form-label">Penunjukan Jurusita/Jurusita Pengganti</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file6">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 20 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['penunjukan_js'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_a/') . $perkara['0']['penunjukan_js'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['penunjukan_js'] ?>
                                    </a>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">7.</div>
                                <label for="formFileSm" class="col-4 form-label">Penetapan Hari Sidang</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file7">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 20 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['penetapan_hari_sidang'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_a/') . $perkara['0']['penetapan_hari_sidang'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['penetapan_hari_sidang'] ?>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">8.</div>
                                <label for="formFileSm" class="col-4 form-label">Relaas-relaas Panggilan</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file8">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 20 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['relaas_panggilan'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_a/') . $perkara['0']['relaas_panggilan'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['relaas_panggilan'] ?>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">9.</div>
                                <label for="formFileSm" class="col-4 form-label">Berita Acara Sidang</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file9">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 80 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['ba_sidang'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_a/') . $perkara['0']['ba_sidang'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['ba_sidang'] ?>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">10.</div>
                                <label for="formFileSm" class="col-4 form-label">Penetapan Sita Conservatoir/Revindicatoir (bila ada)</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file10">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 20 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['penetapan_sita'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_a/') . $perkara['0']['penetapan_sita'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['penetapan_sita'] ?>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">11.</div>
                                <label for="formFileSm" class="col-4 form-label">Berita Acara Sita Conservatoir/Revindicatoir (bila ada)</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file11">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 20 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['ba_sita'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_a/') . $perkara['0']['ba_sita'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['ba_sita'] ?>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">12.</div>
                                <label for="formFileSm" class=" col-4 col-label form-label">Lampiran-lampiran surat yang diajukan oleh kedua belah pihak (bila ada)</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file12">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 20 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['lampiran_surat'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_a/') . $perkara['0']['lampiran_surat'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['lampiran_surat'] ?>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">13.</div>
                                <label for="formFileSm" class="col-4 form-label">Surat-surat bukti penggugat (bila ada)</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file13">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 20 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['surat_bukti_penggugat'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_a/') . $perkara['0']['surat_bukti_penggugat'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['surat_bukti_penggugat'] ?>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">14.</div>
                                <label for="formFileSm" class="col-4 form-label">surat-surat bukti tergugat (bila ada)</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file14">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 20 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['surat_bukti_tergugat'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_a/') . $perkara['0']['surat_bukti_tergugat'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['surat_bukti_tergugat'] ?>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">15.</div>
                                <label for="formFileSm" class="col-4 form-label">Tanggapan bukti-bukti tergugat dari penggugat (bila ada)</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file15">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 20 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['tanggapan_bukti_tergugat'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_a/') . $perkara['0']['tanggapan_bukti_tergugat'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['tanggapan_bukti_tergugat'] ?>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">16.</div>
                                <label for="formFileSm" class="col-4 form-label">Tanggapan bukti-bukti penggugat dari tergugat (bila ada)</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file16">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 20 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['tanggapan_bukti_penggugat'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_a/') . $perkara['0']['tanggapan_bukti_penggugat'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['tanggapan_bukti_penggugat'] ?>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">17.</div>
                                <label for="formFileSm" class="col-4 form-label">Gambar situasi (bila ada)</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file17">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 20 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['gambar_situasi'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_a/') . $perkara['0']['gambar_situasi'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['gambar_situasi'] ?>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">18.</div>
                                <label for="formFileSm" class="col-4 form-label">Surat-surat lain (bila ada)</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file18">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 20 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['surat_lain'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_a/') . $perkara['0']['surat_lain'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['surat_lain'] ?>
                                    </a>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-block btn-success" value="upload">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- upload Bundle B -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bundleB" aria-expanded="false" aria-controls="collapseThree">
                        <span class="text-satu">Bundle B</span>
                    </button>
                </h2>
                <div id="bundleB" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form method="post" action="<?php echo base_url('pa/banding/multiple_uploadB'); ?>" enctype="multipart/form-data">
                            <input type="text" value="<?= $perkara[0]['id_perkara'] ?>" hidden name="id_perkara"></input>
                            <div class="row justify-content-start mb-3">
                                <div class="col-1" style="width: 1rem;">1.</div>
                                <label for="formFileSm" class="col-4 form-label">Salinan Putusan Pengadilan Agama /Mahkamah Syari'yah</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file1">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 10 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['salinan_putusan_pa'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_b/') .  $perkara['0']['salinan_putusan_pa'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['salinan_putusan_pa'] ?>
                                    </a>
                                </div>
                            </div>

                            <div class="row justify-content-start mb-3">
                                <div class="col-1" style="width: 1rem;"></div>
                                <label for="formFileSm" class="col-4 form-label"></label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/rtf" name="file16">
                                    <small class="text-satu fw-lighter">*File RTF Size Maksimal 80 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['salinan_putusan_pa'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_b/') . $perkara['0']['salinan_putusan_pa_rtf'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['salinan_putusan_pa'] ?>
                                    </a>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">2.</div>
                                <label for="formFileSm" class="col-4 form-label">Surat Kuasa dari Kedua Belah Pihak (bila ada)</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file2">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 10 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['sk_bundelb'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_b/') . $perkara['0']['sk_bundelb'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['sk_bundelb'] ?>
                                    </a>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">3.</div>
                                <label for="formFileSm" class="col-4 form-label">Akta Banding</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file3">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 10 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['akta_banding'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_b/') . $perkara['0']['akta_banding'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['akta_banding'] ?>
                                    </a>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">4.</div>
                                <label for="formFileSm" class="col-4 form-label">Akta Penerimaan Memori Banding</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file4">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 10 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['akta_penerimaan_mb'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_b/') . $perkara['0']['akta_penerimaan_mb'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['akta_penerimaan_mb'] ?>
                                    </a>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">5.</div>
                                <label for="formFileSm" class="col-4 form-label">Memori Banding (bila ada)</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file5">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 10 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['memori_banding'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_b/') . $perkara['0']['memori_banding'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['memori_banding'] ?>
                                    </a>
                                </div>
                            </div>

                            <!-- bulum bekeng depe backend -->
                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;"></div>
                                <label for="formFileSm" class="col-4 form-label"></label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/rtf" name="file17">
                                    <small class="text-satu fw-lighter">*File RTF Size Maksimal 80 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['memori_banding'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_b/') . $perkara['0']['memori_banding_rtf'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['memori_banding'] ?>
                                    </a>
                                </div>
                            </div>
                            <!-- end -->

                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">6.</div>
                                <label for="formFileSm" class="col-4 form-label">Akta Pemberitahuan Banding</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file6">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 10 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['akta_pemberitahuan_banding'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_b/') . $perkara['0']['akta_pemberitahuan_banding'] ?>" lass="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['akta_pemberitahuan_banding'] ?>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">7.</div>
                                <label for="formFileSm" class="col-4 form-label">Pemberitahuan Penyerahan Memori Banding</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file7">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 10 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['pemberitahuan_penyerahan_mb'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_b/') . $perkara['0']['pemberitahuan_penyerahan_mb'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['pemberitahuan_penyerahan_mb'] ?>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">8.</div>
                                <label for="formFileSm" class="col-4 form-label">Akta Penerimaan Kontra Memori Banding (bila ada)</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file8">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 10 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['akta_penerimaankontra_mb'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_b/') . $perkara['0']['akta_penerimaankontra_mb'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['akta_penerimaankontra_mb'] ?>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">9.</div>
                                <label for="formFileSm" class="col-4 form-label">Kontra Memori Banding (bila ada)</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file9">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 10 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['kontra_mb'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_b/') . $perkara['0']['kontra_mb'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['kontra_mb'] ?>
                                    </a>
                                </div>
                            </div>


                            <!-- bulum bekeng depe backend -->
                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;"></div>
                                <label for="formFileSm" class="col-4 form-label"></label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/rtf" name="file18">
                                    <small class="text-satu fw-lighter">*File RTF Size Maksimal 80 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['kontra_mb'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_b/') . $perkara['0']['kontra_mb_rtf'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['kontra_mb'] ?>
                                    </a>
                                </div>
                            </div>
                            <!-- end -->

                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">10.</div>
                                <label for="formFileSm" class="col-4 form-label">Pemberitahuan Penyerahan Kotra Memori Banding (bila ada)</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file10">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 10 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['pemberitahuan_penyerahankontra_mb'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_b/') . $perkara['0']['pemberitahuan_penyerahankontra_mb'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['pemberitahuan_penyerahankontra_mb'] ?>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">11.</div>
                                <label for="formFileSm" class=" col-4 col-label form-label">Relaas Pemberitahuan untuk memeriksa (Inzage) Berkas Perkara Banding></label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file11">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 10 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['relaas_periksa_berkas_pb'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_b/') . $perkara['0']['relaas_periksa_berkas_pb'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['relaas_periksa_berkas_pb'] ?>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">12.</div>
                                <label for="formFileSm" class="col-4 form-label">Surat Kuasa Khusus (bila ada)</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file12">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 10 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['sk_khusus'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_b/') . $perkara['0']['sk_khusus'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['sk_khusus'] ?>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">13.</div>
                                <label for="formFileSm" class="col-4 form-label">Bukti Penerimaan Biaya Perkara Banding</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file13">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 10 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['bukt_pengiriman_bpb'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_b/') . $perkara['0']['bukt_pengiriman_bpb'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['bukt_pengiriman_bpb'] ?>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">14.</div>
                                <label for="formFileSm" class="col-4 form-label">Bukti Setor Biaya Pendaftaran Ke Kas Negara</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file14">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 10 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['bukti_setor_bp_kasnegara'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_b/') . $perkara['0']['bukti_setor_bp_kasnegara'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['bukti_setor_bp_kasnegara'] ?>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-1" style="width: 1rem;">15.</div>
                                <label for="formFileSm" class="col-4 form-label">Surat Lainnya (Bila ada)</label>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" accept="application/pdf" name="file15">
                                    <small class="text-satu fw-lighter">*File PDF Size Maksimal 10 mb</small>
                                </div>
                                <div class="col-3 text-success <?= $perkara['0']['surat_lainnya_b'] ? '' : 'd-none' ?> ">
                                    <span class="text-satu"> <i class="fas fa-paperclip"></i></span>
                                    <a href="<?= base_url('files/bundle_b/') . $perkara['0']['surat_lainnya_b'] ?>" class="text-decoration-none text-reset" target="_blank">
                                        <?= $perkara['0']['surat_lainnya_b'] ?>
                                    </a>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-block btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- upload putusan -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#putusan" aria-expanded="false" aria-controls="collapseFour">
                        Download Putusan
                    </button>
                </h2>
                <div id="putusan" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <a class="btn btn-success" href="<?php echo base_url() ?>pa/banding/download_putusan/<?= $perkara[0]['id_perkara'] ?>">Download Putusan</a>
                    </div>
                </div>
            </div>
            <!-- </ div> -->
            <!-- end accordion -->
        </div>
    </div>