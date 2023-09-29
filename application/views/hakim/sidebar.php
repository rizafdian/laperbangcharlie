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
    <!-- sweet alert css -->
    <!-- <link rel="stylesheet" href="<?= base_url('assets/');  ?>dist/sweetalert2.min.css"> -->
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/f8c43fa68d.js" crossorigin="anonymous"></script>
    <!-- css sandiri -->
    <link rel="stylesheet" href="<?= base_url('assets/css/') . $css ?>">
    <!-- css sidebar -->
    <link rel="stylesheet" href="<?= base_url('assets/css/') ?>styles.css">
    <!-- dropzone -->
    <link rel="stylesheet" href="<?= base_url('assets/dropzone/dropzone.css') ?>">
    <!-- sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="<?= base_url('bootstrap/') ?>css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <title><?= $judul ?></title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-satu">
        <!-- <div class="container"> -->
        <a class="navbar-brand ps-3" href="<?= base_url() ?>">
            <img class="img-fluid" width="80" src="<?= base_url('assets/img/logoapp.png') ?>" alt="">
        </a>
            <!-- Sidebar Toggle-->
            <!-- <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= $judul == 'Dashboard' ? 'active' : '' ?>" aria-current="page" href="<?= base_url('hakim/hakim') ?>">Dasboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $judul == 'Banding' ? 'active' : '' ?>" href="<?= base_url('hakim/hakim/banding/') ?>">Banding</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled <?= $judul == 'Ekasaminasi' ? 'active' : '' ?>" href="<?= base_url('hakim/hakim/eksaminasi/') ?>">Eksaminasi</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link active" id="tablaper" href="<?= base_url('hakim/hakim_laper/') ?>">Laporan Perkara</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-fw fa-user-tie"></i> User
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item disabled" href="">Profile</a></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        <!-- </div> -->
    </nav>

<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <div class="sb-sidenav-menu-heading">Laporan Perkara</div>
                            <a class="nav-link <?= $judul == 'Laporan Bulanan' ? 'active' : '' ?>" href="<?= base_url('hakim/hakim_laper') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-chart-pie"></i></div>
                                Laporan Perkara
                            </a>
                            <a class="nav-link <?= $judul == 'Rekap Laporan Bulanan' ? 'active' : '' ?>" href="<?= base_url('hakim/hakim_laper/rekap_laporan/') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Rekap Laporan Perkara
                            </a>
                            <a class="nav-link <?= $judul == 'Laporan Triwulan' ? 'active' : '' ?>" href="<?= base_url('hakim/hakim_laper/triwulan/') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Laporan Triwulan
                            </a>
                            <a class="nav-link <?= $judul == 'Rekap Laporan Triwulan' ? 'active' : '' ?>" href="<?= base_url('hakim/hakim_laper/rekap_triwulan/') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Rekap Laporan Triwulan
                            </a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $this->session->userdata('nama'); ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">