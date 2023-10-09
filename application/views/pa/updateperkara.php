<?php

$list_perkara_isi = $list_perkara[0];
$nomor_perkara = $list_perkara[0]['no_perkara'];
$nomor_perkara_explode = explode('/', $nomor_perkara);

?>

<div class="row mt-3">


    <div class="col-lg-10">

        <div class="card mb-4">
            <div class="card-header fw-bold">
                Update Perkara
            </div>
            <div class="card-boddy mb-3">
                <div class="container mt-3">
                    <!-- form addBerkas -->
                    <form method="post" action="<?= base_url('pa/banding/updateperkara/') . $list_perkara_isi['id_perkara']; ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id_perkara" value="<?= $list_perkara_isi['id_perkara'] ?>">
                        <input type="hidden" class="form-control" id="tanggalregister" name="tgl_register" value="<?= date('Y-m-d'); ?>">
                        <div class="row mb-3">
                            <label for="nomorPerkara" class="col-sm-2 col-form-label">Nomor Perkara</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="nomor_perkara" value="<?= $nomor_perkara_explode[0] ?>" required>
                                    <span class="input-group-text">/</span>
                                    <select class="form-control" aria-label="Default select example" name="kode_perkara">
                                        <option value="Pdt.P" <?= $nomor_perkara_explode[1] == 'Pdt.P' ? 'selected' : ''; ?>>Pdt.P</option>
                                        <option value="Pdt.G" <?= $nomor_perkara_explode[1] == 'Pdt.P' ? 'selected' : ''; ?>>Pdt.G</option>
                                    </select>
                                    <span class="input-group-text">/</span>
                                    <input type="text" class="form-control" name="tahun_perkara" value="<?= $nomor_perkara_explode[2]; ?>">
                                    <span class="input-group-text">/</span>
                                    <input type="text" class="form-control" name="kode_pa" value="<?= $this->session->userdata('kode_pa'); ?>" readonly>
                                </div>
                                <small id="emailHelp" class="form-text text-danger"><?= form_error('nomor_perkara') ?></small>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <label for="jenisPerkara" class="col-sm-2 col-form-label">Jenis Perkara</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="jenisPerkara" name="jns_perkara">
                                    <?php foreach ($perkara as $perk) : ?>
                                        <option value="<?= $perk['jns_kaper']; ?>" <?= $perk['jns_kaper'] == $list_perkara[0]['jns_perkara'] ? 'selected' : '' ?>><?= $perk['jns_kaper']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text text-danger"><?= form_error('jns_perkara') ?></small>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="namaPihak" class="col-sm-2 col-form-label">Nama Pihak Penggugat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="namaPihak" name="nm_pihak_penggugat" value="<?= $list_perkara_isi['nm_pihak_penggugat'] ?>" required>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <label for="namaPihak" class="col-sm-2 col-form-label">No. Whatsapp Pihak Penggugat</label>
                            <div class="col-sm-10">
                                <input type="number" maxlength="13" class="form-control" id="namaPihak" name="no_hp_penggugat" value="<?= $list_perkara_isi['no_hp_penggugat'] ?>" required>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <label for="namaPihak" class="col-sm-2 col-form-label">Nama Pihak Tergugat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="namaPihak" name="nm_pihak_tergugat" value="<?= $list_perkara_isi['nm_pihak_tergugat'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="namaPihak" class="col-sm-2 col-form-label">No. Whatsapp Pihak Tergugat</label>
                            <div class="col-sm-10">
                                <input type="number" maxlength="13" class="form-control" id="namaPihak" name="no_hp_tergugat" value="<?= $list_perkara_isi['no_hp_tergugat'] ?>">
                            </div>
                        </div>

                        <!-- cek jenis PA -->
                        <?php

                        switch ($this->session->userdata('kode_pa')) {
                            case 'PA.Mdo':
                                $kode_surat_pa = 'KPA.W18-A1';
                                break;
                            case 'PA.Ktg':
                                $kode_surat_pa = 'KPA.W18-A2';
                                break;
                            case 'PA.Thn':
                                $kode_surat_pa = 'KPA.W18-A3';
                                break;
                            case 'PA.Tdo':
                                $kode_surat_pa = 'KPA.W18-A4';
                                break;
                            case 'PA.Btg':
                                $kode_surat_pa = 'KPA.W18-A5';
                                break;
                            case 'PA.Amg':
                                $kode_surat_pa = 'KPA.W18-A6';
                                break;
                            case 'PA.Llk':
                                $kode_surat_pa = 'KPA.W18-A7';
                                break;
                            case 'PA.Blu':
                                $kode_surat_pa = 'KPA.W18-A8';
                                break;
                            case 'PA.Brk':
                                $kode_surat_pa = 'KPA.W18-A9';
                                break;
                            case 'PA.Tty':
                                $kode_surat_pa = 'KPA.W18-A10';
                                break;
                            case 'PA.Per':
                                $kode_surat_pa = 'KPA.W18-A11';
                                break;
                        }

                        ?>

                        <div class="row mb-3">
                            <label for="nomorPerkara" class="col-sm-2">Nomor Surat Pengantar</label>
                            <!-- ambil nomor untuk di explode -->
                            <?php
                            $nomor_surat_pengantar = $list_perkara_isi['no_surat_pengantar'];
                            $nomor_surat_pengantar_explode = explode('/', $nomor_surat_pengantar);
                            $bulan = $nomor_surat_pengantar_explode[3];
                            $tahun = $nomor_surat_pengantar_explode[4];
                            ?>
                            <!-- taruh di inputan hasil explode -->
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" name="kode_surat_pa" value="<?= $nomor_surat_pengantar_explode[0]; ?>" hidden>
                                    <span class="input-group-text"><?= $nomor_surat_pengantar_explode[0]; ?>/</span>
                                    <input type="text" class="form-control" name="nomor_surat_pengantar" value="<?= $nomor_surat_pengantar_explode[1]; ?>" required>
                                    <span class="input-group-text">/HK2.6/</span>
                                    <input type="text" class="form-control" name="bulan_surat_pengantar" value="<?php echo $bulan ?>">
                                    <span class="input-group-text">/</span>
                                    <input type="text" class="form-control" name="tahun_surat_pengantar" value="<?= $tahun ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jenisPerkara" class="col-sm-2 col-form-label">Pejabat Berwenang</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="jenisPerkara" name="pejabat_berwenang">
                                    <option value="">-- Pilih --</option>

                                    <option value="Panitera" <?= $list_perkara_isi['pejabat_berwenang'] == 'Panitera' ? 'selected' : ''; ?>> Panitera</option>
                                    <option value="Panmud Hukum" <?= $list_perkara_isi['pejabat_berwenang'] == 'Panmud Hukum' ? 'selected' : ''; ?>> Panmud Hukum</option>
                                    <option value="Panmud Gugatan" <?= $list_perkara_isi['pejabat_berwenang'] == 'Panmud Gugatan' ? 'selected' : ''; ?>> Panmud Gugatan</option>
                                    <option value="Panmud Permohonan" <?= $list_perkara_isi['pejabat_berwenang'] == 'PanmudPermohonan' ? 'selected' : ''; ?>> Panmud Permohonan</option>

                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="namaPanitera" class="col-sm-2 col-form-label">Nama Pejabat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="namaPanitera" name="nm_pejabat" value=" <?= $list_perkara_isi['nm_pejabat'] ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nipPanitera" class="col-sm-2 col-form-label">NIP Pejabat</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="nipPanitera" name="nip_pejabat" value="<?= $list_perkara_isi['nip_pejabat'] ?>" required maxlength="18" minlength="18" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="banyaknya" class="col-sm-2 col-form-label">Banyaknya Berkas</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="banyaknya" name="banyaknya" value="<?= $list_perkara_isi['banyaknya'] ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="keterangan" name="keterangan"><?= $list_perkara_isi['keterangan'] ?></textarea>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-success">Kirim</button>


                    </form> <!-- end form addBerkas -->
                </div>
            </div>
        </div>

    </div>




</div>