<div class="row mt-3">

    

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

        <div class="row mt-3">
        <div class="col">
            <!-- Button trigger modal -->
            <a href="<?= base_url('pa/banding/tambahperkara'); ?>" class="btn btn-success mb-4">Tambah Perkara</a>
            <!-- button tambah perkara -->
            <div class="mt-3">
            <div class="table-responsive">
                <table class="table table-hover" id="bandingTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nomor Perkara</th>
                            <th>Jenis Perkara</th>
                            <th>Nomor Perkara Banding</th>
                            <th>Tanggal Upload</th>
                            <th>Status</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($perkara_banding as $lhs) : ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $lhs['no_perkara']; ?></td>
                                <td><?php echo $lhs['jns_perkara']; ?></td>
                                <td><?php echo $lhs['no_perkara_banding']; ?></td>
                                <td><?php echo $lhs['tgl_register']; ?></td>
                                <td><?php echo $lhs['status_perkara']; ?></td>
                                <td>
                                    <a class="text-decoration-none" href="<?= base_url('pa/banding/uploadberkas/') . $lhs['id_perkara'] ?>">
                                        <i class="fas fa-fw fa-upload text-success" title="Unggah Berkas"></i>
                                    </a>
                                    <a class="text-decoration-none" href="<?= base_url('pa/banding/updateperkara/') . $lhs['id_perkara']; ?>">
                                        <i class="fas fa-pen-square text-success" title="Edit"></i>
                                    </a>
                                    <a class="text-decoration-none" href="<?= base_url('pa/SuratPengantar/downloadsurat/') . $lhs['id_perkara'] ?>">
                                        <i class="fas fa-fw fa-file-download text-success" title="Download Surat Pengantar"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>


                    </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>




    

</div>