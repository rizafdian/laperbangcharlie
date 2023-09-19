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
    <!-- sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="bulan-tab" data-toggle="tab" data-target="#bulan" type="button" role="tab" aria-controls="home" aria-selected="true">Laporan Perkara</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="rekap-bulan-tab" data-toggle="tab" data-target="#rekap-bulan" type="button" role="tab" aria-controls="profile" aria-selected="false">Rekap Laporan Perkara</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="triwulan-tab" data-toggle="tab" data-target="#triwulan" type="button" role="tab" aria-controls="contact" aria-selected="false">Laporan Triwulan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="rekap-triwulan-tab" data-toggle="tab" data-target="#rekap-triwulan" type="button" role="tab" aria-controls="contact" aria-selected="false">Rekap Laporan Triwulan</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="bulan-tab">...</div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="rekap-bulan-tab">...</div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="triwulan-tab">...</div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="rekap-triwulan-tab">...</div>
                </div>
            </div>
        </div>
    </nav>