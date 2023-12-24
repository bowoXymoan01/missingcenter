<?php 
session_start();
 include_once "function.php";
if(isset($_POST["submit"]) ) {

    if( tambah($_POST) > 0) {
        header("Location: sukses.php");
    } 
    else {
        echo "<script>alert('Data Gagal ditambahkan');</script>";  
    }
}

if( !isset($_SESSION["user"])){
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
        <link rel="stylesheet" href="assets/bootstrap/css/LoginAdminstyle.css">
        <link rel="stylesheet" href="assets/bootstrap/css/landing_page.css">
        <title>MISSING CENTER</title>
    </head>
    <body>
        <!--  pembuka Header -->
        <header>
            <img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
            <h1 class="logo">Laporkan Barang Hilang</h1>
            <nav>
                <ul>
                    <li><button class="btn-cta"><a href="daftarbrg.php">Lihat barang hilang</a></button></li>
                </ul>
            </nav>
        </header>
        <main class="container">      
            <div class="row justify-content-center">
                <div class="col-md-12 box">
                    <h3 class="text-center">FORM LAPORAN</h3>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label for="nama">
                                <input type="text" name="nama" id="nama" placeholder="Nama" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="nim">
                                <input type="text" name="nim" id="nim" placeholder="Nim" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="telepon">
                                <input type="text" name="telepon" id="telepon" placeholder="No.Wa" required autofocus>
                            </label> 
                        </div>
                        <div class="mb-4">
                            <label for="namabarang">
                                <input type="text" name="namabarang" id="namabarang" placeholder="Nama Barang" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="deskripsi">
                                <input type="text" name="deskripsi" id="deskripsi" placeholder="Deskripsi" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="tempatkehilangan">
                                <input type="text" name="tempatkehilangan" id="tempatkehilangan" placeholder="Tempat Kehilangan" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="tglhilang">Tanggal
                                <input type="date" name="tglhilang" id="tglhilang" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="wkthilang">Waktu: 
                                <input type="time" name="wkthilang" id="wkthilang" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="gambar">Masukan Gambar Jika Ada
                                <input type="file" name="gambar" id="gambar">
                            </label>
                        </div>
                        <div class="d-flex justify-content-center">
                            <label for="submit">
                                <button class="btn" type="submit" name="submit" id="submit"  for="submit">Laporkan!</button>
                            </label>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <a href="user.php">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </body>    
</html>



