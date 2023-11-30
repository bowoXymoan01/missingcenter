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
        <link rel="stylesheet" href="assets/bootstrap/css/adminpage.css">
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
                    <li><a href="found.php">Barang Sudah <br>Terklaim</a></li>
                    <li><a href="daftarbrg.php">Barang <br>hilang</a></li>
                    <li><a href="form.php">Input <br>Data</a></li>
                    <li><a href="register.php">Daftar</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>
			
		<table border="2" cellpadding="20" cellspacing="10" class="table">
        <tr>
            <th>No. </th>
            <th>Aksi </th>
            <th>Tipe </th>
            <th>Merek </th>
            <th>Nama </th>
            <th>Warna </th>
            <th>Deskripsi </th>
            <th>Tanggal </th>
            <th>Lokasi </th>
            <th>Status </th>
        </tr>

            <?php $i = 1; ?>
            <?php foreach( $barang as $row ) : ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href="">Ubah</a>
                    <a href="">Hapus</a>
                </td>
                <td><?= $row["tipe"]; ?></td>
                <td><?= $row["merek"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["warna"]; ?></td>
                <td><?= $row["deskripsi"]; ?></td>
                <td><?= $row["tanggal"]; ?></td>
                <td><?= $row["lokasi"]; ?></td>
                <td><?= $row["status"]; ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
    </table>
</body>
</html>
