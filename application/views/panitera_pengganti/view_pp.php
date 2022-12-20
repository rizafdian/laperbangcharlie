<main class="mt-5">

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="flash-data2" data-flashdata="<?= $this->session->flashdata('msg'); ?>"></div>

    <div class="container-fluid px-4 ">
        <div class="row">
            <div class="col">

                <div class="table-responsive">
                    <table class="table" id="listperkara">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Satker</th>
                                <th>Tanggal Upload</th>
                                <th>Pihak Penggugat</th>
                                <th>Pihak Tergugat</th>
                                <th>Nomor Perkara Tk.I</th>
                                <th>Jenis Perkara</th>
                                <th>Nomor Perkara Banding</th>
                                <th>Tanggal Register Banding</th>
                                <th>Status</th>
                                <th style="width: 5%;">Lihat</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>


</main>