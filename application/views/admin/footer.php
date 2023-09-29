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

<footer class="py-4 bg-light mt-auto">
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
</footer>





<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!-- datatables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<!-- sweet alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- chart js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<!-- js sidebar -->
<script src="<?= base_url('assets/js/') ?>sidebar.js"></script>
<!-- jspribadi -->
<script src="<?= base_url('assets/js/') . $js ?>"></script>

<script>
    //untuk chart laper zona 1

    $(document).ready(function() {

        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        let ctx = document.getElementById("LaperZona1");


        let PAManado = {
            label: "PA Manado", 
            lineTension: 0.3,
            borderColor: "#1d5f53",
            pointRadius: 5,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "#1d5f53",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: ["<?php echo $jan_mdo ?>","<?php echo $feb_mdo ?>","<?php echo $mar_mdo ?>","<?php echo $apr_mdo ?>","<?php echo $mei_mdo ?>","<?php echo $jun_mdo ?>","<?php echo $jul_mdo ?>","<?php echo $aug_mdo ?>","<?php echo $sep_mdo ?>","<?php echo $oct_mdo ?>","<?php echo $nov_mdo ?>","<?php echo $des_mdo ?>"]
        };

        let PATahuna = {
            label: "PA Tahuna",
            lineTension: 0.3,
            borderColor: "#719e0f",
            pointRadius: 5,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "#719e0f",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: ["<?php echo $jan_thn ?>","<?php echo $feb_thn ?>","<?php echo $mar_thn ?>","<?php echo $apr_thn ?>","<?php echo $mei_thn ?>","<?php echo $jun_thn ?>","<?php echo $jul_thn ?>","<?php echo $aug_thn ?>","<?php echo $sep_thn ?>","<?php echo $oct_thn ?>","<?php echo $nov_thn ?>","<?php echo $des_thn ?>"]
        };

        let PATondano = {
            label: "PA Tondano",
            lineTension: 0.3,
            borderColor: "#be9a21",
            pointRadius: 5,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "#be9a21",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: ["<?php echo $jan_tdo ?>","<?php echo $feb_tdo ?>","<?php echo $mar_tdo ?>","<?php echo $apr_tdo ?>","<?php echo $mei_tdo ?>","<?php echo $jun_tdo ?>","<?php echo $jul_tdo ?>","<?php echo $aug_tdo ?>","<?php echo $sep_tdo ?>","<?php echo $oct_tdo ?>","<?php echo $nov_tdo ?>","<?php echo $des_tdo ?>"]
        };

        let PABitung = {
            label: "PA Bitung",
            lineTension: 0.3,
            borderColor: "#008080",
            pointRadius: 5,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "#be9a21",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: ["<?php echo $jan_bt ?>","<?php echo $feb_bt ?>","<?php echo $mar_bt ?>","<?php echo $apr_bt ?>","<?php echo $mei_bt ?>","<?php echo $jun_bt ?>","<?php echo $jul_bt ?>","<?php echo $aug_bt ?>","<?php echo $sep_bt ?>","<?php echo $oct_bt ?>","<?php echo $nov_bt ?>","<?php echo $des_bt ?>"]
        };

        let PAAmurang = {
            label: "PA Amurang",
            lineTension: 0.3,
            borderColor: "#FF4500",
            pointRadius: 5,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "#be9a21",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: ["<?php echo $jan_amu ?>","<?php echo $feb_amu ?>","<?php echo $mar_amu ?>","<?php echo $apr_amu ?>","<?php echo $mei_amu ?>","<?php echo $jun_amu ?>","<?php echo $jul_amu ?>","<?php echo $aug_amu ?>","<?php echo $sep_amu ?>","<?php echo $oct_amu ?>","<?php echo $nov_amu ?>","<?php echo $des_amu ?>"]
        };

        let tampungData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agus", "Sept", "Okt", "Nov", "Des"],
            datasets: [PAManado, PATahuna, PATondano, PABitung, PAAmurang]
        };

        let linceChart = new Chart(ctx, {
            type: 'line',
            data: tampungData
        });
        // akhir chart
    });
</script>

<script>
    //untuk chart laper zona 2

    $(document).ready(function() {

        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        let ctx = document.getElementById("LaperZona2");

        let PAKotamobagu = {
            label: "PA Kotamobagu",
            lineTension: 0.3,
            borderColor: "#9ACD32",
            pointRadius: 5,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "#be9a21",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: ["<?php echo $jan_ktg ?>","<?php echo $feb_ktg ?>","<?php echo $mar_ktg ?>","<?php echo $apr_ktg ?>","<?php echo $mei_ktg ?>","<?php echo $jun_ktg ?>","<?php echo $jul_ktg ?>","<?php echo $aug_ktg ?>","<?php echo $sep_ktg ?>","<?php echo $oct_ktg ?>","<?php echo $nov_ktg ?>","<?php echo $des_ktg ?>"]
        };

        let PALolak = {
            label: "PA Lolak",
            lineTension: 0.3,
            borderColor: "#00FA9A",
            pointRadius: 5,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "#be9a21",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: ["<?php echo $jan_lo ?>","<?php echo $feb_lo ?>","<?php echo $mar_lo ?>","<?php echo $apr_lo ?>","<?php echo $mei_lo ?>","<?php echo $jun_lo ?>","<?php echo $jul_lo ?>","<?php echo $aug_lo ?>","<?php echo $sep_lo ?>","<?php echo $oct_lo ?>","<?php echo $nov_lo ?>","<?php echo $des_lo ?>"]
        };

        let PABolaangUki = {
            label: "PA Bolaang Uki",
            lineTension: 0.3,
            borderColor: "#2E8B57",
            pointRadius: 5,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "#be9a21",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: ["<?php echo $jan_bol ?>","<?php echo $feb_bol ?>","<?php echo $mar_bol ?>","<?php echo $apr_bol ?>","<?php echo $mei_bol ?>","<?php echo $jun_bol ?>","<?php echo $jul_bol ?>","<?php echo $aug_bol ?>","<?php echo $sep_bol ?>","<?php echo $oct_bol ?>","<?php echo $nov_bol ?>","<?php echo $des_bol ?>"]
        };

        let PABoroko = {
            label: "PA Boroko",
            lineTension: 0.3,
            borderColor: "#6495ED",
            pointRadius: 5,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "#be9a21",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: ["<?php echo $jan_bor ?>","<?php echo $feb_bor ?>","<?php echo $mar_bor ?>","<?php echo $apr_bor ?>","<?php echo $mei_bor ?>","<?php echo $jun_bor ?>","<?php echo $jul_bor ?>","<?php echo $aug_bor ?>","<?php echo $sep_bor ?>","<?php echo $oct_bor ?>","<?php echo $nov_bor ?>","<?php echo $des_bor ?>"]
        };

        let PATutuyan = {
            label: "PA Tutuyan",
            lineTension: 0.3,
            borderColor: "#8A2BE2",
            pointRadius: 5,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "#be9a21",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: ["<?php echo $jan_tty ?>","<?php echo $feb_tty ?>","<?php echo $mar_tty ?>","<?php echo $apr_tty ?>","<?php echo $mei_tty ?>","<?php echo $jun_tty ?>","<?php echo $jul_tty ?>","<?php echo $aug_tty ?>","<?php echo $sep_tty ?>","<?php echo $oct_tty ?>","<?php echo $nov_tty ?>","<?php echo $des_tty ?>"]
        };

        let tampungData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agus", "Sept", "Okt", "Nov", "Des"],
            datasets: [PAKotamobagu, PALolak, PABolaangUki, PABoroko, PATutuyan]
        };

        let linceChart = new Chart(ctx, {
            type: 'line',
            data: tampungData
        });
        // akhir chart
    });
</script>

<script>
    //untuk chart perkara banding

    $(document).ready(function() {

        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        let ctx = document.getElementById("myAreaChart");


        let dataBanding = {
            label: "Perkara Banding",
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
    $(document).ready(function() {

        const path = window.location.origin;
        //ambil data get_log_inbox
        $.ajax({
            type: "get",
            url: `${path}/admin/Admin/get_log_inbox`,
            dataType: "JSON",
            success: function(response) {
                //hitung jumlah data yang masuk
                let jumlah = response.data.length;
                //tampilkan jumlah di badge
                $('#inbox-count').text(jumlah);
                let text = ''
                //pengulangan response.data
                $.each(response.data, function(index, val) {
                    // console.log(val);
                    //tampilkan pemberitahuan
                    text = `<li><a class="dropdown-item isi" href="#!" data-id="${val.id_log_inbox}">Perkara Baru nomor ${val.no_perkara}</a></li>`
                    $('#inbox-isi').append(text);

                });
            }
        });

        $('#inbox-isi').on('click', '.isi', function(d) {
            d.preventDefault();
            let id = $(this).attr('data-id');

            $.ajax({
                type: "POST",
                url: `${path}/admin/Admin/click_log_inbox`,
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    console.log(window.location.origin);
                    window.location.href = window.location.origin + '/admin/inputnoper/';
                }
            });
        });


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