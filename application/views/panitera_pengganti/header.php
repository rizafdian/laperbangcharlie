<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- datatables css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/f8c43fa68d.js" crossorigin="anonymous"></script>
    <!-- css sandiri -->
    <link rel="stylesheet" href="<?= base_url('assets/css/') . $css ?>">
    <!-- css sidebar -->
    <link rel="stylesheet" href="<?= base_url('assets/css/') ?>styles.css">

    <!-- AnimateCss -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <title><?= $judul ?></title>
</head>

<body>


    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 center" href="index.html">
            <img class="img-fluid" width="50%" src="<?= base_url('assets/img/logoapp.png') ?>" alt="">
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle animate__animated animate__heartBeat animate__infinite" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-envelope-open fa-fw"></i>
                        <span class="position-absolute top-6 translate-middle badge rounded-pill bg-danger animate__animated animate__flash animate__infinite" id="inbox-count">

                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" id="inbox-isi">
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle animate__animated animate__heartBeat" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item disabled" href="#!">Settings</a></li>
                        <li><a class="dropdown-item disabled" href="#!">Activity Log</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link <?= $judul == 'Dashboard' ? 'active' : '' ?>" href="<?= base_url('pp/dashboard_pp/') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>


                            <div class="sb-sidenav-menu-heading">Perkara Banding</div>
                            <a class="nav-link <?= $judul == 'Input Nomor Perkara' ? 'active' : '' ?>" href="<?= base_url('pp/panitera_pengganti/') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-keyboard"></i></div>
                                Perkara Banding
                            </a>

                            <div class="sb-sidenav-menu-heading">Laporan Perkara</div>
                            <a class="nav-link <?= $judul == 'Laporan Bulanan' ? 'active' : '' ?>" href="<?= base_url('pp/pp_laper/') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-chart-pie"></i></div>
                                Laporan Perkara
                            </a>
                            <a class="nav-link <?= $judul == 'Rekap Laporan Bulanan' ? 'active' : '' ?>" href="<?= base_url('pp/Pp_laper/rekap_laporan/') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Rekap Laporan Perkara
                            </a>
                            <a class="nav-link <?= $judul == 'Laporan Triwulan' ? 'active' : '' ?>" href="<?= base_url('pp/Pp_laper/triwulan/') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Laporan Triwulan
                            </a>
                            <a class="nav-link <?= $judul == 'Rekap Laporan Triwulan' ? 'active' : '' ?>" href="<?= base_url('pp/Pp_laper/rekap_triwulan/') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Rekap Laporan Triwulan
                            </a>

                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">