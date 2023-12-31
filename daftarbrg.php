<?php
session_start();
require "function.php";
if( !isset($_SESSION["user"])){
    header("Location:login.php");
    exit; 
}

//pagination
//konfiguration
$jumlahdataperhalaman =  3 ;
$jumlahdata = count(query("SELECT * FROM barang_hilang"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$halamanaktif = ( isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awaldata = ($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;
 


$barang_hilang = query(" SELECT * FROM barang_hilang LIMIT $awaldata , $jumlahdataperhalaman ");

// tombol cari logic
if ( isset($_POST["cari"])){
    $barang_hilang = cari($_POST["keyword"]);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/bootstrap/css/LoginAdminstyle.css">
    <link rel="stylesheet" href="assets/bootstrap/css/landing_page.css">
    <link rel="stylesheet" href="assets/bootstrap/css/kontak.css">
    <link rel="stylesheet" href="assets/bootstrap/css/adminpage2.css">

    <title>MISSING CENTER</title>
</head>
<body>
    <!-- pembuka Header -->
    <header>
        <img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
        <h1 class="logo">Barang Hilang</h1>
        <nav>
            <ul>
                <a href="user.php" class="btn" style="color:white; padding:5px;" ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 14l-4 -4l4 -4" /><path d="M5 10h11a4 4 0 1 1 0 8h-1" /></svg><br>Kembali</a>
            </ul>
        </nav>
        <form action="" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari" aria-label="Recipient's username" aria-describedby="basic-addon1" name="keyword" size="50">
                <button class="input-group-text" id="basic-addon1" type="sumbit"  name="cari">Cari</button>
            </div>
        </form>
    </header>
    halaman
    <?php if( $halamanaktif > 1):?>
        <a class="btn" href="?halaman=<?= $halamanaktif - 1; ?>">&laquo;</a>
    <?php endif; ?>
    <?php for($i = 1; $i <=$jumlahhalaman; $i++) :?>
        <?php if( $i == $halamanaktif): ?>
            <a class="btn" href="?halaman=<?= $i;  ?>" style="font-weight: bold; color: white;" > <?= $i; ?> </a>
        <?php else:?>
            <a class="btn" href="?halaman=<?= $i;  ?>"> <?= $i; ?> </a>
        <?php endif; ?>
    <?php endfor; ?>
    <?php if( $halamanaktif < $jumlahhalaman):?>
        <a class="btn" href="?halaman=<?= $halamanaktif + 1; ?>">&raquo;</a>
    <?php endif; ?>
    <br>
    <br>
    <!-- <table border="2" cellpadding="20" cellspacing="20" class="table" >
        <tr>
            <th>No.</th>
            <th>Gambar</th>
            <th>Nama Pemilik</th>
            <th>Nama Barang</th>
            <th>Deskripsi</th>
            <th>Tempat Kehilangan</th>
            <th>Tanggal Hilang</th>
            <th>Waktu Hilang</th>
            <th>Status</th>
        </tr>
            <?php $i = 1; ?>
            <?php foreach( $barang_hilang as $row ) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><img src="img/<?= $row["gambar"];?>" width="100"></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["namabarang"]; ?></td>
                <td><?= $row["deskripsi"]; ?></td>
                <td><?= $row["tempatkehilangan"]; ?></td>
                <td><?= $row["tglhilang"]; ?></td>
                <td><?= $row["wkthilang"]; ?></td>
                <td><?= $row["status"]; ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
    </table> -->
    <div class="row row-cols-10 row-cols-md-1 g-1">
        <?php foreach ($barang_hilang as $row) : ?>
        <div class="card mb-5 card text-bg-light mb-1" style="max-width: 500px;">
            <div class="row g-4">
                <div class="col-md-4">
                    <img src="img/<?= $row["gambar"]; ?>" class="img-fluid rounded-start" alt="..." width=700">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title"><?= $row["namabarang"]; ?></h3>
                        <hr>
                        <p class="card-text">
                            Nama Pemilik        :   <?= $row["nama"]; ?><br>
                            <hr>
                            Tempat Kehilangan   :   <?= $row["tempatkehilangan"]; ?><br>
                            <hr>
                            Tanggal Hilang      :   <?= $row["tglhilang"]; ?><br>
                            <hr>
                            Waktu Hilang        :   <?= $row["wkthilang"]; ?><br>
                            <hr>
                            Status: <?= $row["status"]; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>