<?php 
session_start();
if( !isset($_SESSION["user"])){
    header("Location:login.php");
    exit;
}
include_once "function.php";
if(isset($_POST["submit"]) ) {

    if( tambah($_POST) > 0) {
        echo "<script>alert('Barang Anda Berhasil Ditambahkan, Tunggu Admin akan Segera Memprosesnya!')</script>";
    } 
    else {
        echo "<script>alert('Data Gagal ditambahkan');</script>";  
    }
}

$select = "SELECT * FROM usermhs WHERE nama_lengkap = '{$_SESSION["user"]}'";
$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0 ){
    $row = mysqli_fetch_array($result);
}

// var_dump($row);


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
            <h1 class="logo">Laporkan Barang Hilang</h1>
            <nav>
                <ul>
                    <a href="user.php" class="btn" style="color:white; padding:5px;" ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 14l-4 -4l4 -4" /><path d="M5 10h11a4 4 0 1 1 0 8h-1" /></svg><br>Kembali</a>
                </ul>
            </nav>
        </header>
        <main class="container">      
            <div class="row justify-content-center">
                <div class="col-md-12 box">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label for="nama">
                                <input size="50" class="form-control" type="text" name="nama" id="nama" placeholder="Nama" value="<?php echo $_SESSION["user"];?>"  required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="nim">
                                <input size="50" class="form-control" type="text" name="nim" id="nim" placeholder="Nim" value="<?php echo $row["nim"];?>" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="telepon">
                                <input size="50" class="form-control" type="text" name="telepon" id="telepon" placeholder="No.Wa" value="<?php echo $row["no_wa"];?>" required autofocus>
                            </label> 
                        </div>
                        <div class="mb-4">
                            <label for="namabarang">
                                <input size="50" class="form-control" type="text" name="namabarang" id="namabarang" placeholder="Nama Barang" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="deskripsi">
                                <input size="50" class="form-control" type="text" name="deskripsi" id="deskripsi" placeholder="Deskripsi" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="tempatkehilangan">
                                <input size="50" class="form-control" type="text" name="tempatkehilangan" id="tempatkehilangan" placeholder="Tempat Kehilangan" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="tglhilang">Tanggal
                                <input class="form-control" type="date" name="tglhilang" id="tglhilang" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="wkthilang">Waktu: 
                                <input class="form-control"  type="time" name="wkthilang" id="wkthilang" required autofocus>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="formFile" class="form-label">Masukan Gambar</label>
                            <input class="form-control" type="file" id="formFile" name="gambar">
                        </div>
                        <div class="d-flex justify-content-center">
                            <label for="submit">
                                <button class="btn" type="submit" name="submit" id="submit"  for="submit" style="color:white;">Laporkan!</button>
                            </label>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </main>
    </body>    
</html>



