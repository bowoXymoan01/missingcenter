<?php
require_once "function.php";

if(isset($_POST["submit"] ) ) {

    if(ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 
                    'daftarbrgadmin.php';
            
                </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 
                    'daftarbrgadmin.php';
    
            </script>
        ";
    }
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
                    <li><a href="daftarbrgadmin.php">Barang <br>hilang</a></li>
                    <li><a href="formtemuan.php">Input <br>Data</a></li>
                    <li><a href="register.php">Daftar</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>
<body>
    <h1>Ubah Data Barang Temuan</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="tipe">Tipe : </label>
                <input type="text" name="tipe" id="tipe" required>
            </li>
            <li>
                <label for="merek">Merek : </label>
                <input type="text" name="merek" id="merek" required>
            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="deskripsi">Deskripsi : </label>
                <input type="text" name="deskripsi" id="deskripsi" required>
            </li>
            <li>
                <label for="tanggal">Tanggal : </label>
                <input type="date" name="tanggal" id="tanggal" required>
            </li>
            <li>
                <label for="lokasi">Lokasi : </label>
                <input type="text" name="lokasi" id="lokasi" required>
            </li>
            <li>
                <label for="status">Status : </label>
                <input type="text" name="status" id="status" required>
            </li>
            <li>
                <label for="waktu">Waktu : </label>
                <input type="time" name="waktu" id="waktu" required>
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="file" name="gambar" id="gambar" required>
            </li>
            <li>
                <label for="submit">
                    <button class="btn" type="submit" name="submit" id="submit"  for="submit">Simpan</button>
                </label>
            </li>
        </ul>
</body>
</html>