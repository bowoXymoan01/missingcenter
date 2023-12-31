<?php
require "function.php";

if(isset($_POST["register"]) ) {

    if(daftarmhs($_POST) > 0 ) {
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/bootstrap/css/LoginAdminstyle.css">
    <link rel="stylesheet" href="assets/bootstrap/css/landing_page.css">
    <link rel="stylesheet" href="assets/bootstrap/css/adminpage2.css">

</head>
<body>
    <header>
        <img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
        <h1 class="logo">Daftar Akun</h1>
        <nav>
            <ul>
                <a href="login.php" class="btn" style="color:white; padding:5px;" ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 14l-4 -4l4 -4" /><path d="M5 10h11a4 4 0 1 1 0 8h-1" /></svg><br>Kembali</a>
            </ul>
        </nav>
    </header>
    <main class="container md-12">				 
        <div class="row justify-content-center">
            <div class="col-md-9 box">
                <p style="color:red; font:italic;" >isikan data dengan benar<br>bahwa anda Mahasiswa POLINDRA!</p>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="username">
                            <input class="form-control" id="username" for="username" 
                            placeholder="Email" name="username" type="email" required autofocus autocomplete="off"/>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="password">
                            <input class="form-control" id="password" for="password" 
                            placeholder="Password" name="password" type="password" required autofocus autocomplete="off" />
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="password1">
                            <input class="form-control" id="password1"  for="password1" 
                            placeholder="konfirmasi password" name="password1" type="password" required autofocus autocomplete="off"/>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="nama">
                            <input class="form-control" id="nama"  for="nama" 
                            placeholder="Nama Lengkap" name="nama" type="text" required autofocus autocomplete="off"/>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="nim">
                            <input class="form-control" id="nim"  for="nim" 
                            placeholder="Nim" name="nim" type="text" required autofocus autocomplete="off"/>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="no_wa">
                            <input class="form-control" id="no_wa"  for="no_wa" 
                            placeholder="No. WA" name="no_wa" type="text" required autofocus autocomplete="off"/>
                        </label>
                    </div>
                    <div class="mb-4">
                            <label for="formFile" class="form-label">Masukan Foto yang ada di KTM anda!</label>
                            <input class="form-control" type="file" id="formFile" name="gambar">
                    </div>
                    <div class="mb-4">
                        <label for="register">
                            <button class="btn" type="submit" name="register" id="register"  for="register">Daftarkan</button>
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

