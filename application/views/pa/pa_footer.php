</div>
</main>
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
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('bootstrap/') ?>js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('bootstrap/') ?>assets/demo/chart-area-demo.js"></script>
<script src="<?= base_url('bootstrap/') ?>assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="<?= base_url('bootstrap/') ?>js/datatables-simple-demo.js"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    //datatable
    $(document).ready( function() {
        let table = new DataTable('#bandingTable');
    });
</script>

<script>
    //untuk chart

    $(document).ready(function() {

        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        let ctx = document.getElementById("LaperZona1");
        


        let PA = {
            label: "<?php echo $nama ?>",
            lineTension: 0.3,
            borderColor: "#1d5f53",
            pointRadius: 5,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "#1d5f53",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: ["<?php echo $jan_mdo ?>","<?php echo $feb_mdo ?>","<?php echo $mar_mdo ?>","<?php echo $apr_mdo ?>","<?php echo $mei_mdo ?>","<?php echo $jun_mdo ?>","<?php echo $jul_mdo ?>","<?php echo $aug_mdo ?>","<?php echo $sep_mdo ?>","<?php echo $oct_mdo ?>","<?php echo $nov_mdo ?>","<?php echo $des_mdo ?>"]
        };

        let tampungData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agus", "Sept", "Okt", "Nov", "Des"],
            datasets: [PA]
        };

        let linceChart = new Chart(ctx, {
            type: 'line',
            data: tampungData
        });


        // akhir chart


    });
</script>

</body>

</html>