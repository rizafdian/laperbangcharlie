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



</body>

</html>