<?php
session_start();
require "function.php";

if(!isset($_SESSION["admin"])){
    header("Location:login.php");
    exit;
}

if(isset($_POST["register"]) ) {

    if(register($_POST) > 0 ) {
        echo "<script>
                alert('User Baru Berhasil Ditambahkan!');
            </script>";
        }
    } else {
        echo mysqli_error($conn);
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/bootstrap/css/LoginAdminstyle.css">
    <link rel="stylesheet" href="assets/bootstrap/css/landing_page.css">
    <link rel="stylesheet" href="assets/bootstrap/css/adminpage2.css">
</head>
<body>
    <header>
        <img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
        <h1 class="logo">MISSING CENTER</h1>
        <nav>
            <ul>
                <a href="admin.php" class="btn" style="color:white; padding:5px;" ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 14l-4 -4l4 -4" /><path d="M5 10h11a4 4 0 1 1 0 8h-1" /></svg><br>Kembali</a>
            </ul>
        </nav>
    </header>
    <main class="container md-12">				 
        <div class="row justify-content-center">
            <div class="col-md-9 box">
                <h2 class="text-center">DAFTAR ADMIN</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="nama">
                            <input class="form-control" id="nama"  for="nama" 
                            placeholder="Nama Lengkap" name="nama" type="text" required autofocus/>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="username">
                            <input class="form-control" id="username" for="username" 
                            placeholder="Email" name="username" type="email" required autofocus />
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="password">
                            <input class="form-control" id="password" for="password" 
                            placeholder="Password" name="password" type="password" required autofocus/>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="password1">
                            <input class="form-control" id="password1"  for="password1" 
                            placeholder="konfirmasi password" name="password1" type="password"  required autofocus />
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="nim">
                            <input class="form-control" id="nim" for="nim" 
                            placeholder="Nim" name="nim" type="text" required autofocus />
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="nowa">
                            <input class="form-control" id="nowa" for="nowa" 
                            placeholder="No Wa" name="nowa" type="text" required autofocus />
                        </label>
                    </div>
                    <div class="mb-4">
                            <label for="formFile" class="form-label">Masukan Gambar</label>
                            <input class="form-control" type="file" id="formFile" name="gambar">
                        </div>
                    <br>
                    <div class="mb-4">
                        <button class="btn" type="submit" name="register">Daftarkan</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>


