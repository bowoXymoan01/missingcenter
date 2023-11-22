<?php 
include_once "function.php";
if(isset($_POST["submit"]) ) {

    if( tambah($_POST) > 0) {
        echo "<script>alert('Data berhasil ditambahkan');</script>";
    } 
    else {
        echo "<script>alert('Data Gagal ditambahkan');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
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
                    <li><button class="btn-cta"><a href="baranghilang.php">Laporkan barang<br>hilang</a></button></li>
                    <li><button class="btn-cta"><a href="found.php">Lihat barang<br>hilang</a></button></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>
        <form action="" method="post">
            <ul>
                <li>
                    <label for="nama">NAMA : </label>
                    <input type="text" name="nama" id="nama">
                </li>
                <li>
                    <label for="telepon">TELEPON : </label>
                    <input type="text" name="telepon" id="telepon">
                </li>
                <li>
                    <label for="namabarang">JENIS : </label>
                    <input type="text" name="namabarang" id="namabarang">
                </li>
                <li>
                    <label for="deskripsi">DESKRIPSI : </label>
                    <input type="text" name="deskripsi" id="deskripsi">
                </li>
                <li>
                    <label for="tempatkehilangan">Tempat Kehilangan Barang : </label>
                    <input type="text" name="tempatkehilangan" id="tempatkehilangan">
                </li>
                <li>
                    <label for="nim">NIM : </label>
                    <input type="text" name="nim" id="nim">
                </li>
                <li>
                    <label for="tglhilang">Tanggal Kehilangan Barang : </label>
                    <input type="date" name="tglhilang" id="tglhilang">
                </li>
                <li>
                    <label for="wkthilang">Waktu Kehilangan Barang : </label>
                    <input type="time" name="wkthilang" id="wkthilang">
                </li>
                <li>
                    <label for="gambar">Foto Barang : </label>
                    <input type="file" name="gambar" id="gambar">
                </li>
                <li>
                    <button type="submit" name="submit">Tambah Barang Hilang !</button>
                </li>
            </ul>
        </form>
    
    </body>    
</html>