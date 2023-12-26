<!-- user mahasiswa -->
<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}
// if (isset($_SESSION['nama_lengkap'])) {
//     echo "SELAMAT DATANG, " . $_SESSION['nama_lengkap'];

// }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Silkscreen&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
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
                    <li><button class="btn-cta"><a href="baranghilang.php">Laporkan barang<br>hilang</a></button></li>
                    <li><button class="btn-cta"><a href="daftarbrg.php">Lihat barang<br>hilang</a></button></li>
                    <li><button class="btn-cta"><a href="daftarbrguser.php">Lihat barang<br>hilang saya</a></button></li>
                    <li><button method="post" name="logout" class="btn-cta"><a href="logout.php">Logout</a></button></li>
                </ul>
            </nav>
        </header>
        <!--  penutup Header -->
        <!--isi content-->
        <main>
            <div class="container-fluid jumbotron">
                <h1>HALO <?php
                            echo $_SESSION["user"];
                        ?>
                !
                </h1>
            </div>
        </main>
    </body>
</html>
