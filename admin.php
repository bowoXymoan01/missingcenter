<?php
    session_start();
    if(!isset($_SESSION["admin"])){
        header("Location:login.php");
        exit;
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
        <link rel="stylesheet" href="assets/bootstrap/css/adminpage.css">
        <title>MISSING CENTER</title>
    </head>
    <body>
        <!--  pembuka Header -->
        <header>
            <img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
            <h1 class="logo"><?php echo $_SESSION["admin"];?></h1>
            <nav>
                <ul>
                    <li><a href="profiladmin.php">Profil</a></li>
                    <li><a href="found.php">Barang Sudah <br>Diklaim</a></li>
                    <li><a href="daftarbrgadmin.php">Barang <br>Diproses</a></li>
                    <li><a href="lost.php">Barang Temuan & <br>Hilang</a></li>
                    <li><a href="formtemuan.php">Input <br>Data</a></li>
                    <li><a href="register.php">Daftar</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>
        <!-- / header -->
        <!-- jumbotron -->
        <main>
            <div class="container-fluid jumbotron">
                <h1>HALO ADMIN!
                </h1>
            </div>
        </main>
