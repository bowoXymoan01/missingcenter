<?php
session_start();
require "function.php";

if(!isset($_SESSION["admin"])){
    header("Location:login.php");
    exit;
}
$barang_temuan = query(" SELECT * FROM barang_temuan WHERE status='sudah diklaim'");
$barang_hilang = query("SELECT * FROM barang_hilang WHERE status='sudah diklaim'");


if ( isset($_POST["cari"])){
    $barang_hilang = cari($_POST["keyword"]);
    $barang_temuan = cari2($_POST["keyword"]);
}

?>


<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Silkscreen&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/bootstrap/css/LoginAdminstyle.css">
        <link rel="stylesheet" href="assets/bootstrap/css/landing_page.css">
        <link rel="stylesheet" href="assets/bootstrap/css/adminpage.css">

        <title>MISSING CENTER</title>
    </head>
    <body>
        <!--  pembuka Header -->
        <header>
            <img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
            <h1 class="logo">Barang Sudah Diklaim</h1>
            <nav>
                <ul>
                    <li><a href="admin.php">Kembali</a></li>
                </ul>
            </nav>
            <form action="" method="post">
                <dv class="mb-4">
                    <input type="text" name="keyword" size="40" placeholder="masukan keyword yang anda cari" autocomplete="off" > 
                    <button class="btn-cta" type="submit" name="cari" >cari</button>
                </dv>
            </form>
        </header>
        <h1>Barang Temuan</h1>
		<table border="2" cellpadding="10" cellspacing="0" class="table">
            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Gambar</th>
                <th>Nama Penemu</th>
                <th>telepon</th>
                <th>Nama Barang</th>
                <th>Merek</th>
                <th>Deskripsi</th>
                <th>Waktu Ditemukan</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Status</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach( $barang_temuan as $row ) : ?>
            <tr>
                <td><?= $i ?></td> <!--no-->
                <td>
                    <a class="btn" href="update2.php?id=<?= $row ["id"]; ?>">Ubah</a> <!--aksi-->
                    <a class="btn" href="hapus2.php?id=<?= $row["id"];?>"  onclick="
                    return confirm('Yakin menghapus data ini?');">Hapus</a>
                </td>
                <td><img src="img/<?= $row["gambar"];?>" width="80"></td> <!--gambar-->
                <td><?= $row["nama"]; ?></td> <!--nama penemu-->
                <td><?= $row["telepon"]; ?></td> <!--telepon-->
                <td><?= $row["tipe"]; ?></td> <!--nama barang-->
                <td><?= $row["merek"]; ?></td> <!--merek-->
                <td><?= $row["deskripsi"]; ?></td> <!--deskripsi-->
                <td><?= $row["waktu"]; ?></td> <!--waktu ditemukan-->
                <td><?= $row["tanggal"]; ?></td> <!--tanggal-->
                <td><?= $row["lokasi"]; ?></td> <!--lokasi-->
                <td><?= $row["status"]; ?></td> <!--status-->
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
        <h1>Barang Hilang</h1>
        <table border="2" cellpadding="20" cellspacing="20" class="table" >
            <tr>
                <th>No. </th>
                <th>Aksi </th>
                <th>Gambar </th>
                <th>Nama Pemilik </th>
                <th>Telepon </th>
                <th>Nama Barang </th>
                <th>Deskripsi </th>
                <th>Tempat Kehilangan </th>
                <th>Tanggal Hilang </th>
                <th>Waktu Hilang </th>
                <th>Status</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach( $barang_hilang as $row ) : ?>

            <tr>
                <td><?= $i ?></td>
                <td>
                    <a class="btn" href="update.php?id=<?= $row ["idbarang"]; ?>">Ubah</a>
                    <a class="btn" href="hapus.php?id=<?= $row["idbarang"];?>" onclick="
                    return confirm('Yakin menghapus data ini?');">Hapus</a>
                </td>
                <td><img src="img/<?= $row["gambar"];?>" width="80"></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["telepon"]; ?></td>
                <td><?= $row["namabarang"]; ?></td>
                <td><?= $row["deskripsi"]; ?></td>
                <td><?= $row["tempatkehilangan"]; ?></td>
                <td><?= $row["tglhilang"]; ?></td>
                <td><?= $row["wkthilang"]; ?></td>
                <td><?= $row["status"]?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </body>
</html>
