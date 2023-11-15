<?php
require "function.php";

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/bootstrap/css/LoginAdminstyle.css">
    <link rel="stylesheet" href="assets/bootstrap/css/landing_page.css">
</head>
<body>
    <header>
        <img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
        <h1 class="logo">MISSING CENTER</h1>
    </header>
    <main class="container md-10">				 
        <div class="row justify-content-center">
            <div class="col-md-12 box">
                <h2 class="text-center">DAFTAR</h2>
                <form action="login.php" method="post">
                    <div class="mb-4">
                        <label for="nama">
                            <input class="form-control" id="nama"  for="nama" 
                            placeholder="Nama Lengkap" name="nama" type="text"/>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="username">
                            <input class="form-control" id="username" for="username" 
                            placeholder="Username" name="username" type="text" />
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="password">
                            <input class="form-control" id="password" for="password" 
                            placeholder="Password" name="password" type="password" />
                        </label>
                    </div>
                    <div class="mb-">
                        <label for="password1">
                            <input class="form-control" id="password1"  for="password1" 
                            placeholder="konfirmasi password" name="password1" type="password" />
                        </label>
                        <br>
                        <br>
                    <div class="mb-4">
                        <button type="submit" name="register">Daftarkan</button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="index.html">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
