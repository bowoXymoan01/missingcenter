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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/bootstrap/css/LoginAdminstyle.css">
        <link rel="stylesheet" href="assets/bootstrap/css/landing_page.css">
        <link rel="stylesheet" href="assets/bootstrap/css/adminpage2.css">
        <title>MISSING CENTER</title>
    </head>
    <body>
        <!--  pembuka Header -->
        <header>
            <img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
            <h1 class="logo">Input Data Barang Temuan</h1>
            <nav>
                <ul>
                    <a href="admin.php" class="btn" style="color:white; padding:5px;" ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 14l-4 -4l4 -4" /><path d="M5 10h11a4 4 0 1 1 0 8h-1" /></svg><br>Kembali</a>
                </ul>
            </nav>
        </header>
        <main class="container">      
            <div class="row justify-content-center">
                <div class="col-md-12 box">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label for="nama">
                                <input class="form-control" size="45" type="text" name="nama" id="nama" placeholder="Nama Penemu" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="telepon">
                                <input class="form-control" size="45" type="text" name="telepon" id="telepon" placeholder="No WA" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="tipe">
                                <input class="form-control" size="45" type="text" name="tipe" id="tipe" placeholder="Nama Barang" required autofocus>
                            </label> 
                        </div>
                        <div class="mb-4">
                            <label for="merek">
                                <input class="form-control" size="45" type="text" name="merek" id="merek" placeholder="Merek Barang" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4"> 
                            <label for="deskripsi">
                                <input class="form-control" size="45" type="text" name="deskripsi" id="deskripsi" placeholder="Deskripsi Jelas"  required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="lokasi">
                                <input class="form-control" size="45" type="text" name="lokasi" id="lokasi" placeholder="Lokasi Ditemukan" required autofocus>
                            </label>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal">Tanggal
                                <input class="form-select" size="45" type="date" name="tanggal" id="tanggal" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="waktu">Waktu
                                <input class="form-control" size="45" type="time" name="waktu" id="waktu" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="formFile" class="form-label">Masukan Gambar</label>
                            <input class="form-control" type="file" id="formFile" name="gambar">
                        </div>
                        <div class="d-flex justify-content-center">
                            <label for="submit">
                                <button class="btn" type="submit" name="submit" id="submit"  for="submit">Simpan</button>
                            </label>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    </body>    
</html>

