$(document).ready(function () {

    const path = window.location.origin;
    // const path = `/`;
    console.log(path);


    $(".clickable-row").on('click', function () {
        // window.location = $(this).data("href");
        let id = $(this).data('id')
        $.ajax({
            type: "POST",
            url: `${path}/admin/admin/get_data_user`,
            data: {
                id: id,
                // email: email,
                // username: username,
                // role: role_id,
                // is_active: is_active
            },
            dataType: "json",
            success: function (response) {

                $.each(response, function (i, val) {
                    $('#id').val(val.id);
                    $('#nama').val(val.nama);
                    $('#email').val(val.email);
                    $('#username').val(val.username);
                    $('#role_id').val(val.role_id);
                    $('#is_active').val(val.is_active);
                });
            }
        });
    });


    $('#delete_user').on('click', function () {

        var id = $('input[name="id"]').val();

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
                    url: `${path}/admin/admin/del_user`,
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function (response) {

                        $('#nama').val('');
                        $('#email').val('');
                        $('#username').val('');
                        $('#password').val('');
                        $('#password_r').val('');
                        $('#role_id').val('');
                        $('#is_active').val('');
                    }
                });
                //jika delete berhasil
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Data Tersimpan',
                    showConfirmButton: false,
                    timer: 1500
                }).then((result) => {
                    location.reload();
                })
            } else if (result.isDenied) {
                Swal.fire('Tidak ada yang di Delete', '', 'info')
            }

        })
    });



    $('#reset_user').on('click', function () {
        $('#nama').val('');
        $('#email').val('');
        $('#username').val('');
    });

    $('#edit_user').on('click', function () {
        //ambil data
        // let id = $(this).data('id');
        // let nama = $('#nama').val();

        var nama = $('input[name="nama"]').val();
        var email = $('input[name="email"]').val();
        var username = $('input[name="username"]').val();
        var password = $('input[name="password"]').val();
        var password_r = $('input[name="password_r"]').val();
        var role_id = $('select[name="role_id"]').val();
        var is_active = $('select[name="is_active"]').val();
        var id = $('input[name="id"]').val();

        $.ajax({
            type: "POST",
            url: `${path}/admin/admin/updateUser`,
            data: {
                id: id,
                nama: nama,
                email: email,
                username: username,
                password: password,
                password_r: password_r,
                role_id: role_id,
                is_active: is_active
            },
            dataType: "json",
            success: function (e) {
                console.log(e);

                $('#password_error').html(e.password_error);
                $('#nama').val('');
                $('#email').val('');
                $('#username').val('');
                $('#password').val('');
                $('#password_r').val('');
                $('#role_id').val('');
                $('#is_active').val('');
                if (!e.password_error) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data Tersimpan',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

            }
        });



    });

    $('#save_user').on('click', function () {

        var nama = $('input[name="nama"]').val();
        var email = $('input[name="email"]').val();
        var username = $('input[name="username"]').val();
        var password = $('input[name="password"]').val();
        var password_r = $('input[name="password_r"]').val();
        var role_id = $('select[name="role_id"]').val();
        var is_active = $('select[name="is_active"]').val();

        var id = $('input[name="id"]').val();

        $.ajax({
            type: "POST",
            url: `${path}/admin/admin/addUser`,
            data: {
                id: id,
                nama: nama,
                email: email,
                username: username,
                password: password,
                password_r: password_r,
                role_id: role_id,
                is_active: is_active,

            },
            dataType: "json",
            success: function (e) {
                console.log(e);
                tampil_user(e);

            }
        });
        $('#password_r_error').html('');
        // history.go(0);
    });

    function tampil_user(e) {
        $('#username_error').html(e.username_error);
        $('#password_error').html(e.password_error);
        $('#password_r_error').html(e.password_r_error);
        $('#nama').val('');
        $('#email').val('');
        $('#username').val('');
        $('#password').val('');
        $('#password_r').val('');
        $('#role_id').val('');
        $('#is_active').val('');
        if (!e.password_error && !e.password_r_error) {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Data Tersimpan',
                showConfirmButton: false,
                timer: 1500
            }).then((result) => {
                location.reload();
            })
        }

    }



});