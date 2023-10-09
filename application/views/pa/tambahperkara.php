<div class="row mt-3">

    <div class="col-lg-10">

        <div class="card mb-6">
            <div class="card-header fw-bold">
                Tambah Perkara
            </div>
            <div class="card-boddy mb-6">
                <div class="container mt-3">
                    <!-- form addBerkas -->
                    <form method="post" action="<?= base_url('pa/banding/tambahperkara'); ?>" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="tanggalregister" name="tgl_register" value="<?= date('Y-m-d'); ?>">
                        <div class="row mb-3">
                            <label for="nomorPerkara" class="col-sm-2 col-form-label">Nomor Perkara</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="nomor_perkara" required>
                                    <span class="input-group-text">/</span>
                                    <select class="form-control" aria-label="Default select example" name="kode_perkara">
                                        <option value="Pdt.P">Pdt.P</option>
                                        <option value="Pdt.G" selected>Pdt.G</option>
                                    </select>
                                    <span class="input-group-text">/</span>
                                    <input type="text" class="form-control" name="tahun_perkara" value="<?= date('Y'); ?>">
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
                                    <option>-- Pilih --</option>
                                    <?php foreach ($perkara as $perk) : ?>
                                        <option value="<?= $perk['jns_kaper']; ?>"><?= $perk['jns_kaper']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text text-danger"><?= form_error('jns_perkara') ?></small>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="namaPihak" class="col-sm-2 col-form-label">Nama Pihak Penggugat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="namaPihak" name="nm_pihak_penggugat" required>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <label for="namaPihak" class="col-sm-2 col-form-label">No. Whatsapp Pihak Penggugat</label>
                            <div class="col-sm-10">
                                <input type="number" maxlength="13" class="form-control" id="namaPihak" name="no_hp_penggugat" required placeholder="example : 0821234567">
                            </div>

                        </div>
                        <div class="row mb-3">
                            <label for="namaPihak" class="col-sm-2 col-form-label">Nama Pihak Tergugat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="namaPihak" name="nm_pihak_tergugat">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="namaPihak" class="col-sm-2 col-form-label">No. Whatsapp Pihak Tergugat</label>
                            <div class="col-sm-10">
                                <input type="number" maxlength="13" class="form-control" id="namaPihak" name="no_hp_tergugat" required placeholder="example : 0821234567">
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
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" name="kode_surat_pa" value="<?= $kode_surat_pa ?>" hidden>
                                    <span class="input-group-text"><?= $kode_surat_pa ?>/</span>
                                    <input type="text" class="form-control" name="nomor_surat_pengantar" required>
                                    <span class="input-group-text">/HK2.6/</span>
                                    <input type="text" class="form-control" name="bulan_surat_pengantar" value="<?= date('m'); ?>">
                                    <span class="input-group-text">/</span>
                                    <input type="text" class="form-control" name="tahun_surat_pengantar" value="<?= date('Y'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jenisPerkara" class="col-sm-2 col-form-label">Pejabat Berwenang</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="jenisPerkara" name="pejabat_berwenang">
                                    <option value="">-- Pilih --</option>

                                    <option value="Panitera"> Panitera</option>
                                    <option value="Panmud Hukum"> Panmud Hukum</option>
                                    <option value="Panmud Gugatan"> Panmud Gugatan</option>
                                    <option value="Panmud Permohonan"> Panmud Permohonan</option>

                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="namaPanitera" class="col-sm-2 col-form-label">Nama Pejabat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="namaPanitera" name="nm_pejabat" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nipPanitera" class="col-sm-2 col-form-label">NIP Pejabat</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="nipPanitera" name="nip_pejabat" required maxlength="18" minlength="18" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="banyaknya" class="col-sm-2 col-form-label">Banyaknya Berkas</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="banyaknya" name="banyaknya" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="keterangan" name="keterangan"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10">
                            <button class="btn btn-success" type="submit">Kirim</button>

                            </div>
                        </div>
                        

                    </form> <!-- end form addBerkas -->
                </div>
            </div>
        </div>

    </div>




</div>