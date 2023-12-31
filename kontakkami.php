<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}
require "function.php";
if(isset($_POST["submit"]) ) {
    if( form_kontak_kami($_POST) > 0) {
        echo "<script>alert('Laporan berhasil Dikirim Ke Admin');</script>";
    } 
    else {
        echo "<script>alert('Laporan Gagal Dikirim Ke Admin');</script>";
    }
}

include_once 'mysqli-connect.php';
$select = "SELECT * FROM usermhs WHERE nama_lengkap = '{$_SESSION["user"]}'";
$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0 ){
    $row = mysqli_fetch_array($result);

}  


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/bootstrap/css/LoginAdminstyle.css">
    <link rel="stylesheet" href="assets/bootstrap/css/landing_page.css">
    <link rel="stylesheet" href="assets/bootstrap/css/style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/adminpage2.css">

    <title>Form Kontak</title>
</head>

<body>
<header>
    <img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
    <h1 class="logo">Kirim Pesan</h1>
    <nav>
        <ul>
            <a href="user.php" class="btn" style="color:white; padding:5px;" ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 14l-4 -4l4 -4" /><path d="M5 10h11a4 4 0 1 1 0 8h-1" /></svg><br>Kembali</a>

        </ul>
    </nav>
</header>
<div class="container">
    <div class="card-container">
        <div class="left">
            <div class="left-container">
                <h2>Tentang Kami</h2>
                <p>Website Missing Center adalah sebuah Website yang bertujuan untuk membantu mahasiswa dalam melaporkan dan mencari barang hilang atau temuan di lingkungan kampus Politeknik Negeri Indramayu. </p>
            </div>
        </div>
        <div class="right">
            <div class="right-container">
                <h3 class="text-center">Hubungi Kami</h3>
                <form action="" action="" method="post" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="nama">
                            <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama" value="<?=$row['nama_lengkap']?>" required autofocus>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="email">
                            <input class="form-control" type="text" name="email" id="email" placeholder="email" value="<?=$row['username']?>" required autofocus>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="nim">
                            <input class="form-control" type="text" name="nim" id="nim" placeholder="nim" value="<?=$row['nim']?>" required autofocus>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="telepon">
                            <input class="form-control" type="phone" name="telepon" id="telepon" placeholder="telepon" value="<?=$row['no_wa']?>" required autofocus>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="pesan">
                            <input class="form-control" type="text" name="pesan" id="pesan" placeholder="pesan" required autofocus>
                        </label>
                    </div>
                    <div class="d-flex justify-content-center">
                        <label for="submit">
                            <button  class="btn" type="submit" name="submit" id="submit"  for="submit" style="color:white;" >Kirim</button>
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>