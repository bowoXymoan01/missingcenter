<?php
    session_start();
    if (isset($_SESSION["user"])){
        header("Location: user.php");
        exit;
    }
    elseif(isset($_SESSION["admin"])){
        header("Location: admin.php");
        exit;
    }
    include_once 'mysqli-connect.php';
    if (isset($_POST['login'])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result1 = mysqli_query($conn,"SELECT * FROM usermhs WHERE
        username = '$username'");
        $result2 = mysqli_query($conn,"SELECT * FROM pengguna WHERE
        username = '$username'");

        if(mysqli_num_rows($result1) == 1){
            $row = mysqli_fetch_assoc($result1);
            $_SESSION["user"] =  true;
            header("Location: user.php");
            exit;
        }elseif(mysqli_num_rows($result2) == 1){
            $row1 = mysqli_fetch_assoc($result2);
            $_SESSION["admin"] =  true;
            header("Location: admin.php");
            exit;
        }elseif (mysqli_num_rows($result1) == 0 && mysqli_num_rows($result2) == 0){
            echo "<script>
                    alert('Username dan password tidak ditemukan');
                </script>";
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
</head>
<body>
    <header>
        <img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
        <h1 class="logo">MISSING CENTER</h1>
    </header>
    <main class="container md-10">      
        <div class="row justify-content-center">
            <div class="col-md-12 box">
                <h2 class="text-center">LOGIN</h2>
                <form action="" method="post">
                    <div class="mb-4">
                        <label for="username">
                            <input class="form-control" id="username"  for="username" 
						        placeholder="Username" name="username" type="text" required autofocus/>
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
						type="submit" name="login" value="LOGIN"/>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="index.html">Kembali</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="daftarmhs.php">Buat akun</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</script>
</body>
</html>
