<?php 
session_start();
require "function.php";

if(!isset($_SESSION["admin"])){
    header("Location:login.php");
    exit;
}

if(isset($_POST["submit"]) ) {
    if( tambah_barang_temuan($_POST) > 0) {
        echo "<script>alert('Data berhasil ditambahkan');</script>";
    } 
    else {
        echo "<script>alert('Data Gagal ditambahkan');</script>";
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
            <h1 class="logo">Input Data Barang Temuan</h1>
            <nav>
                <ul>
                    <li><a href="admin.php">Kembali</a></li>
                </ul>
            </nav>
        </header>
        <main class="container">      
            <div class="row justify-content-center">
                <div class="col-md-12 box">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label for="nama">Nama Penemu :
                                <input type="text" name="nama" id="nama" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="telepon">no WA :
                                <input type="text" name="telepon" id="telepon" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="tipe">Nama Barang :
                                <input type="text" name="tipe" id="tipe"  required autofocus>
                            </label> 
                        </div>
                        <div class="mb-4">
                            <label for="merek">Merek Barang : 
                                <input type="text" name="merek" id="merek" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4"> 
                            <label for="deskripsi">Deskripsi :
                                <input type="text" name="deskripsi" id="deskripsi"  required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="lokasi">Lokasi Ditemukan :
                                <input type="text" name="lokasi" id="lokasi"  required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="status">Status Barang :
                                <input type="text" name="status" id="status"  required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="tanggal">Tanggal :
                                <input type="date" name="tanggal" id="tanggal" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="waktu">Waktu :
                                <input type="time" name="waktu" id="waktu" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="gambar">Masukan Gambar Jika Ada :
                                <input type="file" name="gambar" id="gambar">
                            </label>
                        </div>
                        <div class="d-flex justify-content-center">
                            <label for="submit">
                                <button class="btn" type="submit" name="submit" id="submit"  for="submit">Simpan</button>
                            </label>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <a href="admin.php">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </body>    
</html>



