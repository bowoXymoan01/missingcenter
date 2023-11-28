<?php
include_once "function.php";
$barang = query("SELECT * FROM barang_hilang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/bootstrap/css/LoginAdminstyle.css">
    <link rel="stylesheet" href="assets/bootstrap/css/landing_page.css">
    <title>MISSING CENTER</title>
</head>
<body>
    <!-- pembuka Header -->
    <header>
        <img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
        <h1 class="logo">MISSING CENTER</h1>
        <nav>
            <ul>
                <li><button class="btn-cta"><a href="baranghilang.php">Laporkan barang<br>hilang</a></button></li>
                <li><button class="btn-cta"><a href="daftarbrg.php">Lihat barang<br>hilang</a></button></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <table border="2" cellpadding="12" cellspacing="8" class="table">
        <tr>
            <th>No. </th>
            <th>Aksi </th>
            <th>Gambar </th>
            <th>Nama </th>
            <th>Telepon </th>
            <th>Nama Barang </th>
            <th>Deskripsi </th>
            <th>Tempat Kehilangan </th>
            <th>Nim </th>
            <th>Tanggal Hilang </th>
            <th>Waktu Hilang </th>
        </tr>

            <?php $i = 1; ?>
            <?php foreach( $barang as $row ) : ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href="">Ubah</a>
                    <a href="">Hapus</a>
                </td>
                <td><img src="img/<?= $row["Gambar"]; ?>" width="50"></td>
                <td><?= $row["Nama"]; ?></td>
                <td><?= $row["Telepon"]; ?></td>
                <td><?= $row["Nama Barang"]; ?></td>
                <td><?= $row["Deskripsi"]; ?></td>
                <td><?= $row["Tempat Kehilangan"]; ?></td>
                <td><?= $row["Nim"]; ?></td>
                <td><?= $row["Tanggal Hilang"]; ?></td>
                <td><?= $row["Waktu Hilang"]; ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
    </table>
</body>
</html>
