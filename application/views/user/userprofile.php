<?php

$user = $userprofile[0];

?>


<div class="row mt-3">
    <div>
        <!-- <div class="card border-light"> -->
        <div class="row d-flex justify-content-center py-4">
            <div class="col-5 mx-1 px-3">
                <div class="card shadow rounded animate__animated animate__fadeIn animate__fast">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="<?= base_url('assets/img/') ?>user.svg" alt="" class="img-fluid" style="width: 30%;">
                            <h5>My Profile</h5>
                        </div>
                        <?php foreach ($userprofile as $profile) : ?>
                            <form>
                                <input type="text" id="profile-id" hidden='true'>
                                <div class="mb-1">
                                    <small class="text-success">
                                        <label for="profile-name" class="form-label">Nama</label>
                                    </small>
                                    <input type="text" class="form-control" id="profile-name" value="<?= $profile['nama'] ?>">
                                </div>
                                <div class="mb-1">
                                    <small class="text-success">
                                        <label for="profile-email" class="form-label">email</label>
                                    </small>
                                    <input type="email" class="form-control" id="profile-email" value="<?= $profile['email'] ?>">
                                </div>
                                <div class="mb-1">
                                    <small class="text-success">
                                        <label for="profile-numb" class="form-label">Nomor Whatsapp Operator</label>
                                    </small>
                                    <div class="input-group">
                                        <input type="number" maxlength="13" class="form-control" id="profile-numb" value="<?= $profile['operator'] ?>" placeholder="example : 0821234567">
                                    </div>
                                </div>
                                <div class=" mb-1">
                                    <small class="text-success">
                                        <label for="profile-username" class="form-label">Username</label>
                                    </small>
                                    <input type="text" class="form-control text-secondary" id="profile-username" value="<?= $profile['username'] ?>" disabled>
                                </div>
                                <div class=" mb-1">
                                    <small class="text-success">
                                        <label for="profile-since" class="form-label">Aktif Sejak</label>
                                    </small>
                                    <input type="text" class="form-control text-secondary" id="profile-since" value="<?= $profile['data_created'] ?>" disabled>
                                </div>


                                <div class=" d-grid gap-2 col-3 mx-auto">
                                    <button class="btn btn-success mt-3" type="button" id="profile-save">Simpan</button>
                                </div>

                            </form>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <div class="col-4 mx-1 px-3">
                <div class="card shadow rounded animate__animated animate__fadeIn animate__slower">
                    <div class="card-body">
                        <u>
                            <h5>Update Password</h5>
                        </u>
                        <form>
                            <div class="mb-1">
                                <small class="text-success">
                                    <label for="old-password" class="form-label">Password Lama</label>
                                </small>
                                <input type="password" class="form-control" name="oldPassword" id="old-password">
                                <div id="old-passwordHelp" class="form-text text-danger"></div>
                            </div>
                            <div class="mb-1">
                                <small class="text-success">
                                    <label for="new-password" class="form-label">Password Baru</label>
                                </small>
                                <input type="password" class="form-control" name="newPassword" id="new-password">
                                <div id="new-passwordHelp" class="form-text text-danger"></div>
                            </div>
                            <div class="mb-1">
                                <small class="text-success">
                                    <label for="repeat-password" class="form-label">Ulangi Password Baru</label>
                                </small>
                                <input type="password" class="form-control" id="repeat-password" name="repeatPassword">
                                <div id="repeat-passwordHelp" class="form-text text-danger"></div>
                            </div>

                            <div class="d-grid gap-2 col-8 mx-auto">
                                <button class="btn btn-success mt-3" type="button" id="change-password">Ubah Password</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- </div> -->
    </div>
</div>


<script>
    console.log('ini banding user_profile.js');
    $(document).ready(function() {

        const pathdasar = window.location.origin;
        const path = `${pathdasar}/profiles/`;
        console.log(pathdasar);

        //panggil function tampil data
        tampil_data();

        //function tampil data
        function tampil_data() {
            $.ajax({
                type: "GET",
                url: `${path}get_profile`,
                dataType: "json",
                success: function(response) {
                    $.each(response, function(index, value) {
                        //Tampilkan di tampilan user profile
                        $('#profile-id').val(value.id)
                        $('#profile-name').val(value.nama)
                        $('#profile-email').val(value.email)
                        $('#profile-numb').val(value.operator)
                        $('#profile-username').val(value.username)
                        $('#profile-since').val(value.data_created)

                    });
                }
            });
        }
        //--- end function tampil data


        //tombol save data di klik
        $('#profile-save').on('click', function() {
            console.log('tombol di klik')

            //ambil data
            let id = $('#profile-id').val()
            let nama = $('#profile-name').val()
            let email = $('#profile-email').val()
            let operator = $('#profile-numb').val()
            //kirim data via ajax
            $.ajax({
                type: "POST",
                url: `${path}update_data`,
                data: {
                    id: id,
                    nama: nama,
                    email: email,
                    operator: operator,
                },
                dataType: "json",
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Data Terupdate',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    tampil_data();

                }
            });

        });
        //--- end Tombol save data

        //tombol ubah password di klik
        $('#change-password').on('click', function() {
            //ambil data dari inputan
            let id = $('#profile-id').val()
            let oldPassword = $('#old-password').val();
            let newPassword = $('#new-password').val();
            let repeatPassword = $('#repeat-password').val();

            console.log(id, oldPassword, newPassword, repeatPassword);

            //panggil ajax
            $.ajax({
                type: "POST",
                url: `${path}check_password_error`,
                data: {
                    id: id,
                    oldPassword: oldPassword,
                    newPassword: newPassword,
                    repeatPassword: repeatPassword
                },
                dataType: "json",
                success: function(response) {
                    if (response.status == true) {
                        //panggil fungsi update_password
                        update_password(id, oldPassword, newPassword);
                    } else {
                        $('#old-passwordHelp').html(response.oldPassword);
                        $('#new-passwordHelp').html(response.newPassword);
                        $('#repeat-passwordHelp').html(response.repeatPassword);
                    }

                }
            });
        });
        //--- end tombol ubah password klik


        //fungsi update_password
        function update_password(id, oldpass, newpass) {
            $.ajax({
                type: "POST",
                url: `${path}update_password`,
                data: {
                    id: id,
                    oldpass: oldpass,
                    newpass: newpass
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response.status == true) {
                        //jalankan swal
                        Swal.fire({
                            icon: 'success',
                            title: 'Password Terupdate',
                        });
                        //kosongkan form
                        $('#old-password').val('');
                        $('#new-password').val('');
                        $('#repeat-password').val('');
                        $('#old-passwordHelp').html('');
                        $('#new-passwordHelp').html('');
                        $('#repeat-passwordHelp').html('');

                    } else {
                        //jalankan swal
                        Swal.fire({
                            icon: 'error',
                            title: 'Password Lama Salah!!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }
            });
        }
        //--- end update_password


    });
</script>