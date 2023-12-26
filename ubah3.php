<?php
session_start();
require "function.php";

if(!isset($_SESSION["admin"])){
    header("Location:login.php");
    exit;
}
require_once "function.php";

$id = $_GET["id"];
$admin = query("SELECT * FROM pengguna WHERE iduser = $id")[0];

if(isset($_POST["ubah"] ) ) {

    if(ubah3($_POST) > 0) {
        echo "
            <script>
              alert('data berhasil diubah!');
                document.location.href ='profiladmin.php';
                </script>
            ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href ='profiladmin.php';
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
            <h1 class="logo">MISSING CENTER</h1>
            <nav>
                <ul>
                    <li><a href="admin.php">kembali</a></li>
                </ul>
            </nav>
        </header>
        <main class="container md-12">				 
        <div class="row justify-content-center">
            <div class="col-md-9 box">
                <h2 class="text-center">EDIT PROFIL</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $admin["iduser"];?>" >
                    <input type="hidden" name="gambarlama" value="<?= $admin["gambar"];?>" >
                    <div class="mb-4">
                        <label for="nama">Nama
                            <input class="form-control" id="nama"  for="nama" 
                            placeholder="Nama Lengkap" name="nama" type="text" value="<?=$admin["nama"];?>" required autofocus/>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="username">Email
                            <input class="form-control" id="username" for="username" 
                            placeholder="Username" name="username" type="email" value="<?=$admin["username"];?>" required autofocus />
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="nim">NIM
                            <input class="form-control" id="nim" for="nim" 
                            placeholder="Nim" name="nim" type="text" value="<?=$admin["nim"];?>" required autofocus />
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="nowa">No WA
                            <input class="form-control" id="nowa" for="nowa" 
                            placeholder="No Wa" name="nowa" type="text" value="<?=$admin["nowa"];?>" required autofocus />
                        </label>
                    </div>
                    <div class="mb-4">
                            <label for="gambar">ubah foto
                                <br>
                                <img src="fotoprofil/<?= $admin["gambar"];?>" alt="gambar" width="250">
                                <input type="file" name="gambar" id="gambar">
                            </label>
                        </div>
                    <br>
                    <div class="mb-4">
                        <button class="btn" type="submit" name="ubah">Ubah</button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="admin.php">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    </body>    
</html>