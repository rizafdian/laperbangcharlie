<main>

    <div class="container-fluid px-4">
        <div class="row-lg-5 row-md-12 mt-4">

            <div class="card">
                <div class="card-header">
                    <h5>Pilih Majelis Hakim</h5>
                </div>
                <div class="card-body">
                    <form>

                        <input type="hidden" id="id_mh" name="id_mh">
                        <div class="row justify-content-between mb-3">
                            <div class="col-lg-5 ">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Majelis</label>
                                    <select class="form-control" id="majelis" name="majelis">
                                        <option value="" selected>--Pilih--</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">User</label>
                                    <select class="form-select" id="id_user_mh" name="id_user_mh">

                                        <option value="" selected>--Pilih--</option>
                                        <?php foreach ($user_mh as $mh) : ?>
                                            <option value="<?= $mh['id'] ?>"><?= $mh['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-2">
                                <button type="button" class="btn btn-primary" id="save">Tambah</button>
                                <button type="button" class="btn btn-primary" id="reset">Reset</button>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

        <div class="row-lg-5 row-md-12 mt-4">

            <div class="card">
                <div class="card-header">
                    <h5>Table Majelis Hakim</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table" id="majelis_hakim">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Majelis</th>
                                            <th style="width: 5%;">Aksi</th>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</main>