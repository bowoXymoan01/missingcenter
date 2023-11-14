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
                    <li><a href="#">Barang Belum <br>Terklaim</a></li>
                    <li><a href="#">Barang Sudah <br>Terklaim</a></li>
                    <li><a href="#">Barang <br>hilang</a></li>
                    <li><a href="#">Input <br>Data</a></li>
                    <li><a href="register.php">Daftar</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>
        <!-- / header -->
        <!-- jumbotron -->
        <main>
            <div class="container-fluid jumbotron">
                <h1>HALO ADMIN!</h1>
                <?php
                include_once 'mysqli-connect.php';
                // Koneksi ke database
                // Periksa apakah pengguna sudah login
                if (!isset($_GET['username'])) {
                    // Pengguna belum login, redirect ke halaman login
                    header(".php");
                    exit();
                }
            
                // Melakukan query untuk mencari data pengguna berdasarkan username dan password
                $query = "SELECT nama FROM pengguna WHERE username='$username' AND password='$password'";
                $result = mysqli_query($conn, $query);

                
                // Jika data pengguna ditemukan
                if (mysqli_num_rows($result) > 0) {
                    // Mengambil data nama pengguna
                    $row = mysqli_fetch_assoc($result);
                    $nama = $row['nama'];
                
                    // Menampilkan nama pengguna
                    echo "<h1>HALO ADMIN!, $nama</h1>";
                }
                ?>
            </div>
        </main>
