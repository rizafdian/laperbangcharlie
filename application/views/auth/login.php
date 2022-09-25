<!doctype html>
<html lang="id">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi&display=swap" rel="stylesheet">
    <!-- css sandiri  -->
    <link rel="stylesheet" href="<?= base_url('assets/css/') ?>stylelogin.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- google fonts -->
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi&display=swap" rel="stylesheet">



    <title>LOGIN</title>
</head>

<body>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row justify-content-end">
                <!-- tulisan laperbang -->
                <div class="col-lg-7 d-none d-lg-block">
                    <img class="img-fluid title " src="<?= base_url('assets/img/') ?>title.png" alt="">
                </div>
                <!-- card -->
                <div class="col-md-12 col-lg-4 ">
                    <div class="card card-login">
                        <div class="card-body  text-center">
                            <img class="img-fluid" src="<?= base_url('assets/img/') ?>logo.png" style="width: 20%;">
                            <h4 class="card-title mt-3 mb-4 d-lg-none">APLIKASI LAPERBANG</h4>
                            <h3 class="card-title mt-3 mb-4">Silahkan Masuk</h3><?php echo $this->session->flashdata('msg'); ?>
                            <!-- form login -->
                            <form action="<?php echo base_url('Auth'); ?>" method="post" class="input">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo set_value('username'); ?>" name="username" placeholder="Username">
                                    <?php echo form_error('username', '<small class="red">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                                    <?php echo form_error('password', '<small class="red">', '</small>'); ?>
                                </div>

                                <button type="submit" class="mt-5 btn btn-block btn-warning">MASUK</button>
                                <p class="mt-3">
                                    <a href="#" id="lupaSandi"> <small>Lupa kata sandi?</small></a>
                                </p>
                                <p class="mt-3">
                                    <a href="<?= base_url('assets/files/manualbook.pdf ') ?>" id="manualbook" target="blank" class="text-warning"> <small>Download Petunjuk PDF</small></a>
                                </p>
                                <small class="text-muted shadow">Copyright © PTA Manado 2021</small>
                            </form>
                            <!-- end form -->
                        </div>
                    </div>

                </div>
            </div>

            <div class="row d-none d-lg-block">
                <div class="col mt-4">
                    <p>
                        <i class="fab fa-fw fa-globe text-white"></i>
                        <i class="far fa-fw fa-envelope text-white"></i>
                        <i class="fab fa-fw fa-instagram text-white"></i>
                        <i class="fab fa-fw fa-facebook text-white"></i>
                        <i class="fab fa-fw fa-youtube text-white"></i>
                        <span class="text-warning">PENGADILAN TINGGI AGAMA MANADO</span>
                    </p>


                </div>
            </div>
        </div>
    </div>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- script lupa sandi -->
    <script>
        $('#lupaSandi').on('click', function() {
            Swal.fire({
                title: 'Pastikan email anda terdaftar di sistem!!',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: `Ya Terdaftar`,
                denyButtonText: `Tidak Terdaftar!!`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    //minta inputan email
                    (async () => {

                        const {
                            value: email
                        } = await Swal.fire({
                            title: 'Input email address',
                            input: 'email',
                            inputLabel: 'Your email address',
                            inputPlaceholder: 'Enter your email address'
                        })

                        if (email) {
                            return fetch(`https://laperbang.pta-manado.go.id/auth/forgotpassword/${email}`)
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error(response.statusText)
                                    }
                                    return response.json()
                                })
                                .catch(error => {
                                    Swal.showValidationMessage(
                                        `Request failed: ${error}`
                                    )
                                })
                                .then((result) => {
                                    console.log(result)
                                    swal.fire({
                                        icon: result.status.toLowerCase(),
                                        title: result.status,
                                        text: result.message
                                    })

                                })
                        }

                    })()
                } else if (result.isDenied) {
                    Swal.fire('Silahkan Hubungi Admin untuk Reset Password', '', 'info')
                }
            })
        });
    </script>


</body>

</html>