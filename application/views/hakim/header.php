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
    <!-- dropzone -->
    <link rel="stylesheet" href="<?= base_url('assets/dropzone/dropzone.css') ?>">

    <title><?= $judul ?></title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-satu">
        <div class="container">
            <a class="navbar-brand" href="">
                <img src="<?= base_url('assets/img/') ?>logoapp.png" alt="" width="80" class="drop-shadow">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= $judul == 'Dashboard' ? 'active' : '' ?>" aria-current="page" href="<?= base_url('ViewHakim/') ?>">Dasbor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $judul == 'Banding' ? 'active' : '' ?>" href="<?= base_url('ViewHakim/banding/') ?>">Banding</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled <?= $judul == 'Ekasaminasi' ? 'active' : '' ?>" href="<?= base_url('viewhakim/eksaminasi/') ?>">Eksaminasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  disabled<?= $judul == 'laper' ? 'active' : '' ?>" href="<?= base_url('viewhakim/laper/') ?>">Laporan Perkara</a>
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
        </div>
    </nav>