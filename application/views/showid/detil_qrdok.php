<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

  <!-- css sandiri -->
  <link rel="stylesheet" href="<?= base_url('assets/css/') ?>cssribon.css">

  <title>LAPERBANG | Pengadilan Tinggi Agama Manado</title>
</head>

<body class="bg-white">

  <div class="container">

    <div class="ribbon ribbon-top-right"><span>Sah</span></div>


    <div class="row">
      <div class="col">
        <h3 class="name_title">Deskripsi Dokumen</h3>
        <span>
          <img width="80px" src="<?php echo base_url('qrcodeimg/qr_' . $dok_id . '.png') ?>">
        </span>
        <p>Ini adalah detil dokumen dari pengajuan perkara banding yang benar diterbikan oleh aplikasi LAPERBANG Pengadilan Tinggi Agama Manado.</p>
        <hr>
        <h5>Satker</h5>
        <p><?php echo $nama; ?></p>
        <hr>
        <h5>Nomor Perkara</h5>
        <p><?php echo $no_perkara; ?></p>
        <hr>
        <h5>Nomor Surat Pengantar</h5>
        <p><?php echo $no_surat_pengantar; ?></p>
        <hr>
        <h5>Pejabat Berwenang</h5>
        <p><?php echo $pejabat_berwenang; ?></p>
        <hr>
        <h5>Nama</h5>
        <p><?php echo $nm_pejabat; ?></p>
        <hr>
        <h5>NIP</h5>
        <p><?php echo $nip_pejabat; ?></p>
        <hr>
      </div>
    </div>


  </div>








  <!-- =========================== -->


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>

</html>