<div class="row mt-5">

    <div class="col">

        <?php //session flash data
        if ($this->session->flashdata('message')) :
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('message'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        endif;
        //end flash data
        ?>

        <div class="card mb-4">
            <div class="card-header text-primary">
                <i class="fas fa-table"></i>
                Daftar Perkara
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <a href="<?= base_url('pa/banding/tambahperkara'); ?>" class="btn btn-primary mb-4">Tambah Perkara</a>
                <!-- button tambah perkara -->
                <div class="table-responsive">
                    <table class="table" id="tablePerkara">
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
                                        <a class="text-decoration-none" href="<?= base_url('pa/banding/uploadbundle/') . $lhs['id_perkara'] ?>">
                                            <i class="fas fa-fw fa-upload text-primary" title="Unggah Berkas"></i>
                                        </a>
                                        <a class="text-decoration-none" href="<?= base_url('pa/banding/updateperkara/') . $lhs['id_perkara']; ?>">
                                            <i class="fas fa-pen-square text-primary" title="Edit"></i>
                                        </a>
                                        <a class="text-decoration-none" href="<?= base_url('pa/suratpengantar/downloadsurat/') . $lhs['id_perkara'] ?>">
                                            <i class="fas fa-fw fa-file-download text-primary" title="Download Surat Pengantar"></i>
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