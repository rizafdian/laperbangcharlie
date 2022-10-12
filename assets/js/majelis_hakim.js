$(document).ready(function () {

    //data table
    // $('#tablePerkaraHakim').DataTable();
    const path = window.location.origin;
    // ---Tampil data table kegiatan
    let majelis_hakim = $('#majelis_hakim').DataTable({
        "ajax": `${path}/admin/Admin/get_user_mh/`,
        "columns": [
            {
                "data": null, "sortable": false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "nama" },
            { "data": "majelis" },
            {
                "data": null,
                "defaultContent": `<a href="javascript:;" id='hapus' class="text-satu item_delete"><i class="fas fa-trash-alt"></i>`
            }
        ]
    });
    // ======
    $('#save').on('click', function () {

        var majelis = $('select[name="majelis"]').val();
        var id_user_mh = $('select[name="id_user_mh"]').val();

        var id_mh = $('input[name="id_mh"]').val();

        $.ajax({
            type: "POST",
            url: `${path}/admin/Admin/add_majelis`,
            data: {
                id_mh: id_mh,
                id_user_mh: id_user_mh,
                majelis: majelis,


            },
            dataType: "json",
            success: function (e) {
                console.log(e);
                // tampil_user(e);

            }
        });
        Swal.fire('Majelis Hakim berhasil ditambahkan!', '', 'success')
        $('#majelis').val('');
        $('#id_user_mh').val('');
        majelis_hakim.ajax.reload();
        // $('#password_r_error').html('');

    });

    $('#reset').on('click', function () {
        $('#majelis').val('');
        $('#id_user_mh').val('');

    });

    $('#majelis_hakim').on('click', '.item_delete', function () {

        // var id_mh = $('input[name="id_mh"]').val();
        let data = majelis_hakim.row($(this).parents('tr')).data();
        let id_mh = data['id_mh'];

        Swal.fire({
            title: 'Yakin Mau Menghapus?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: `Yakin`,
            cancelButtonText: `Kembali`,
            denyButtonText: `Tidak Yakin`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: `${path}/admin/Admin/del_user_mh`,
                    data: {
                        id_mh: id_mh
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                    }
                });
                //jika delete berhasil
                Swal.fire('Majelis Hakim berhasil dihapus!', '', 'success')
                majelis_hakim.ajax.reload();
            } else if (result.isDenied) {
                Swal.fire('Tidak ada yang di Delete', '', 'info')
            }

        })
    });


});