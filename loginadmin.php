<?php
    session_start();
    include_once "mysqli-connect.php";
    if(isset($_SESSION["admin"])){
        header("Location:admin.php");
        exit;
    }
    include_once 'mysqli-connect.php';
    if (isset($_POST['login'])) {
        // Validasi dan sanitasi input
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    
        // Query yang aman untuk mencegah SQL injection
        $select = "SELECT * FROM pengguna WHERE username = '$username'";
        $query = mysqli_query($conn, $select);
        $user_count = mysqli_num_rows($query);
    
        if ($user_count > 0) {
            $user_pass = mysqli_fetch_assoc($query);
            $db_pass = $user_pass['password'];
    
            if (password_verify($password, $db_pass)) {  // Verifikasi password dengan hash
                // Login berhasil
                $_SESSION['username'] = $username;
                $_SESSION['admin'] = $user_pass['nama'];
                header("Location:admin.php");
                exit;
            } else {
                // Password salah
                // echo "<h2 style='color : red; font-style: italic;'>Password anda salah</h2>";
                echo "<script>alert('Password yang anda masukan salah!')</script>";
            }
        } else {
            // Username tidak ditemukan
            // echo "<h2 style='color : red; font-style: italic;'>Username tidak ditemukan</h2>";
            echo "<script>alert('Username yang anda masukan tidak ada, cek lagi username atau password anda!')</script>";
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/bootstrap/css/LoginAdminstyle.css">
    <link rel="stylesheet" href="assets/bootstrap/css/landing_page.css">
    <link rel="stylesheet" href="assets/bootstrap/css/adminpage.css">
</head>
<body>
    <header>
        <img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
        <h1 class="logo">MISSING CENTER</h1>
    </header>

    <main class="container md-10">      
        <div class="row justify-content-center">
            <div class="col-md-12 box">
                <h2 class="text-center">LOGIN ADMIN</h2>
                <form action="" method="post">
                    <div class="mb-4">
                        <label for="username">
                            <input class="form-control" id="username"  for="username" 
						        placeholder="Email" name="username" type="text" required autofocus/>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="password">
                            <input class="form-control" id="password" for="password" 
						    placeholder="Password" name="password" type="password" required autofocus/>
                        </label>
                    </div>
                    <div class="mb-4">
                        <input id="login"  class="btn"
						type="submit" name="login" value="Masuk"/>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="login.php">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
