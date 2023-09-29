<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Siap untuk keluar?</h5>
                <button class="close" type="button" data-bs-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik tombol "Keluar" jika ingin keluar.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?php echo base_url('auth/logout') ?>">Keluar</a>
            </div>
        </div>
    </div>
</div>

<!-- <footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Pengadilan Tinggi Agama Manado </div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer> -->





<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<!-- Bootsrap js -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.js"></script> -->
<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!-- datatables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<!-- chart js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<!-- jspribadi -->
<script src="<?= base_url('assets/js/') . $js ?>"></script>
<script src="<?= base_url('bootstrap/') ?>js/scripts.js"></script>

<script>
    //untuk chart

    $(document).ready(function() {

        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        let ctx = document.getElementById("myAreaChart");


        let dataBanding = {
            label: "Banding",
            lineTension: 0.3,
            borderColor: "#008080",
            backgroundColor: "#008080",
            pointRadius: 5,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "#008080",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: ["<?php echo $perkara_januari ?>", "<?php echo $perkara_februari ?>", "<?php echo $perkara_maret ?>", "<?php echo $perkara_april ?>", "<?php echo $perkara_may ?>", "<?php echo $perkara_juni ?>", "<?php echo $perkara_juli ?>", "<?php echo $perkara_agustus ?>", "<?php echo $perkara_september ?>", "<?php echo $perkara_oktober ?>", "<?php echo $perkara_november ?>", "<?php echo $perkara_desember ?>"]
        };

        // let dataExaminasi = {
        //     label: "Examinasi",
        //     lineTension: 0.3,
        //     borderColor: "#719e0f",
        //     pointRadius: 5,
        //     pointHoverRadius: 5,
        //     pointHoverBackgroundColor: "#719e0f",
        //     pointHitRadius: 50,
        //     pointBorderWidth: 2,
        //     data: []
        // };

        // let dataLaporanPerkara = {
        //     label: "Laporan Perkara",
        //     lineTension: 0.3,
        //     borderColor: "#008080",
        //     backgroundColor: "#008080",
        //     pointRadius: 5,
        //     pointHoverRadius: 5,
        //     pointHoverBackgroundColor: "#008080",
        //     pointHitRadius: 50,
        //     pointBorderWidth: 2,
        //     data: []
        // };

        let tampungData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agus", "Sept", "Okt", "Nov", "Desember"],
            datasets: [dataBanding]
        };

        let linceChart = new Chart(ctx, {
            type: 'bar',
            data: tampungData
        });
        // akhir chart

    });
</script>

<script>
    $(document).ready(function () {
        let ctx = document.getElementById("chart_rekaplaper");

        let rekap_laper = {
            label: "Rekap Laporan Perkara PTA Manado",
            lineTension: 0.3,
            borderColor: "#9ACD32",
            pointRadius: 5,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "#be9a21",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: ["<?php echo $jan_ktg ?>","<?php echo $feb_ktg ?>","<?php echo $mar_ktg ?>","<?php echo $apr_ktg ?>","<?php echo $mei_ktg ?>","<?php echo $jun_ktg ?>","<?php echo $jul_ktg ?>","<?php echo $aug_ktg ?>","<?php echo $sep_ktg ?>","<?php echo $oct_ktg ?>","<?php echo $nov_ktg ?>","<?php echo $des_ktg ?>"]
        };

        let tampungData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agus", "Sept", "Okt", "Nov", "Des"],
            datasets: [rekap_laper]
        };

        let linceChart = new Chart(ctx, {
            type: 'line',
            data: tampungData
        });
    })
</script>

<script>
    $(document).ready(function () {
        let ctx = document.getElementById("chart_rekaptriwulan");

        let rekap_triwulan = {
            label: "Rekap Laporan Triwulan PTA Manado",
            lineTension: 0.3,
            borderColor: "#9ACD32",
            pointRadius: 5,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "#be9a21",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: ["<?php echo $mar_ktg ?>", "<?php echo $jun_ktg ?>", "<?php echo $sep_ktg ?>", "<?php echo $des_ktg ?>"]
        };

        let tampungData = {
            labels: ["Triwulan I (Mar)", "Triwulan II (Jun)", "Triwulan III (Sept)", "Triwulan IV (Des)"],
            datasets: [rekap_triwulan]
        };

        let linceChart = new Chart(ctx, {
            type: 'line',
            data: tampungData
        });
    })
</script>

</body>

</html>