<?php
require "function.php";
$barang = query(" SELECT * FROM barang_temuan ");
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
        <title>MISSING CENTER</title>
    </head>
    <body>
        <!--  pembuka Header -->
        <header>
            <img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
            <h1 class="logo">MISSING CENTER</h1>
            <nav>
                <ul>
                    <li><a href="lost.php">Barang Belum <br>Terklaim</a></li>
                    <li><a href="daftarbrg.php">Barang <br>hilang</a></li>
                    <li><a href="formtemuan.php">Input <br>Data</a></li>
                    <li><a href="register.php">Daftar</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>
			
		<table border="2" cellpadding="20" cellspacing="10" class="table">
        <tr>
            <th>No. </th>
            <th>Aksi </th>
            <th>Gambar </th>
            <th>Nama Penemu </th>
            <th>Nama Barang </th>
            <th>Merek </th>
            <th>Deskripsi </th>
            <th>Waktu Ditemukan </th>
            <th>Tanggal </th>
            <th>Lokasi </th>
            <th>Status </th>
        </tr>

            <?php $i = 1; ?>
            <?php foreach( $barang as $row ) : ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href="update.php?id=<?= $row ["id"]; ?>">Ubah</a>
                    <a href="">Hapus</a>
                </td>
                <td><img src="img/<?= $row["gambar"];?>" width="80"></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["tipe"]; ?></td>
                <td><?= $row["merek"]; ?></td>
                <td><?= $row["deskripsi"]; ?></td>
                <td><?= $row["waktu"]; ?></td>
                <td><?= $row["tanggal"]; ?></td>
                <td><?= $row["lokasi"]; ?></td>
                <td><?= $row["status"]; ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
    </table>
</body>
</html>
