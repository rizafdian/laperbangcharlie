<main>
    <div class="container-fluid px-4">
        <div class="row-lg-5 row-md-12 mt-4">
        <div class="card">
        <div class="card-header">
        <h5>Tambah Rekap Laporan Triwulan</h5>

        </div>
        <div class="card-body">
            <form action="">
                <div class="form-row">
                    <div class="form-group mb-3">
                    <label for="inputState" class="form-label">Triwulan</label>
                        <select class="form-select" id="lap_triwulan" name="lap_triwulan" require>
                            <option selected>Choose...</option>
                            <option value="03"> Triwulan I</option>
                            <option value="06"> Triwulan II</option>
                            <option value="09"> Triwulan III</option>
                            <option value="12"> Triwulan IV</option>
                        </select>
                    </div>
                </div>  

                <div class="row">
                    <div class="col-md-6 mb-3">
                    <label for="Keuangan" class="form-label">Keuangan (.pdf)</label>	
                        <input type="file" name="file_pdf_keu" class="form-control form-control-sm" placeholder="tes" accept=".pdf" required>
                    </div>

                    <div class="col-md-6 mb-3">
                    <label for="Keuangan" class="form-label">Keuangan (.xls/.xlsx)</label>	
                        <input type="file" name="file_excel_keu" class="form-control form-control-sm" placeholder="tes" accept=".xls,.xlsx" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                    <label for="Meja Informasi" class="form-label">Meja Informasi (.pdf)</label>	
                        <input type="file" name="file_pdf_info" class="form-control form-control-sm" placeholder="tes" accept=".pdf" required>
                    </div>

                    <div class="col-md-6 mb-3">
                    <label for="Meja Informasi" class="form-label">Meja Informasi (.xls/.xlsx)</label>	
                        <input type="file" name="file_excel_info" class="form-control form-control-sm" placeholder="tes" accept=".xls,.xlsx" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                    <label for="Pengaduan" class="form-label">Pengaduan (.pdf)</label>	
                        <input type="file" name="file_pdf_pengaduan" class="form-control form-control-sm" placeholder="tes" accept=".pdf" required>
                    </div>

                    <div class="col-md-6 mb-3">
                    <label for="Pengaduan" class="form-label">Pengaduan (.xls/.xlsx)</label>	
                        <input type="file" name="file_excel_pengaduan" class="form-control form-control-sm" placeholder="tes" accept=".xls,.xlsx" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                    <label for="Penilaian Banding" class="form-label">Penilaian Banding (.pdf)</label>	
                        <input type="file" name="file_pdf_penilaian" class="form-control form-control-sm" placeholder="tes" accept=".pdf" required>
                    </div>

                    <div class="col-md-6 mb-3">
                    <label for="Penilaian Banding" class="form-label">Penilaian Banding (.xls/.xlsx)</label>	
                        <input type="file" name="file_excel_penilaian" class="form-control form-control-sm" placeholder="tes" accept=".xls,.xlsx" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
        </div>
        </div>
    </div>
</main>