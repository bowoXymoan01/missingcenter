<?php
session_start();
require "function.php";

if(!isset($_SESSION["admin"])){
    header("Location:login.php");
    exit;
}

$id = $_GET["id"];

$barang_temuan = query("SELECT * FROM barang_temuan WHERE id = $id")[0];

if(isset($_POST["submit"] ) ) {

    if(ubah2($_POST) > 0) {
        echo "
            <script>
              alert('data berhasil diubah!');
                document.location.href = 
                    'lost.php';
                </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 
                    'lost.php';
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
        <link rel="stylesheet" href="assets/bootstrap/css/adminpage2.css">

        <title>MISSING CENTER</title>
    </head>
    <body>
        <!--  pembuka Header -->
        <header>
            <img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
            <h1 class="logo">MISSING CENTER</h1>
            <nav>
                <ul>
                    <a href="lost.php" class="btn" style="color:white; padding:5px;" ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 14l-4 -4l4 -4" /><path d="M5 10h11a4 4 0 1 1 0 8h-1" /></svg><br>Kembali</a>

                </ul>
            </nav>
        </header>
        <main class="container">      
            <div class="row justify-content-center">
                <div class="col-md-12 box">
                    <h3 class="text-center">FORM EDIT</h3>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $barang_temuan["id"];?>" >
                        <input type="hidden" name="gambarlama" value="<?= $barang_temuan["gambar"];?>" >
                        <div class="mb-4">
                            <label for="nama">
                                <input class="form-control" size="40" type="text" name="nama" id="nama" placeholder="Nama Penemu" required autofocus
                                value="<?=$barang_temuan["nama"];?>">
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="telepon">
                                <input class="form-control" size="40" type="text" name="telepon" id="telepon" placeholder="telepon Penemu" required autofocus
                                value="<?=$barang_temuan["telepon"];?>">
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="tipe">
                                <input class="form-control" size="40" type="text" name="tipe" id="tipe" placeholder="Nama Barang" required autofocus
                                value="<?=$barang_temuan["tipe"];?>">
                            </label> 
                        </div>
                        <div class="mb-4">
                            <label for="merek">
                                <input class="form-control" size="40" type="text" name="merek" id="merek" placeholder="Merek" required autofocus
                                value="<?=$barang_temuan["merek"];?>">
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="deskripsi">
                                <input class="form-control" size="40" type="text" name="deskripsi" id="deskripsi" placeholder="deskripsi" required autofocus
                                value="<?=$barang_temuan["deskripsi"];?>">
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="lokasi">
                                <input class="form-control" size="40" ="text" name="lokasi" id="lokasi" placeholder="Tempat ditemukan" required autofocus
                                value="<?=$barang_temuan["lokasi"];?>">
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="status">Status
                                <select class="form-control"  type="text" name="status" id="status" required autofocus>
                                    <option value="<?=$barang_temuan["status"];?>"><?php echo $barang_temuan["status"];?></option>
                                    <option>belum ditemukan</option>
                                    <option>diproses</option>
                                    <option>belum diklaim</option>
                                    <option>sudah diklaim</option>
                                </select>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="tanggal">Tanggal
                                <input class="form-control" type="date" name="tanggal" id="tanggal" required autofocus
                                value="<?=$barang_temuan["tanggal"];?>">
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="waktu">Waktu: 
                                <input class="form-control"  type="time" name="waktu" id="waktu" required autofocus
                                value="<?=$barang_temuan["waktu"];?>">
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="gambar">Masukan Gambar Jika Ada
                                <br>
                                <img src="img/<?= $barang_temuan["gambar"];?>" alt="gambar" width="250">
                                <label for="formFile" class="form-label"></label>
                                <input class="form-control" type="file" id="formFile" name="gambar">
                            </label>
                        </div>
                        <div class="d-flex justify-content-center">
                            <label for="submit">
                                <button class="btn" type="submit" name="submit" id="submit"  for="submit" style="color:white;">Ubah</button>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </body>    
</html>