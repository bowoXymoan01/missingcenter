<?php
    session_start();
    if (isset($_SESSION["user"])){
        header("Location: user.php");
        exit;
    }
    if(isset($_SESSION["admin"])){
        header("Location: admin.php");
        exit;
    }
    include_once 'mysqli-connect.php';
    if (isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($conn, "SELECT * FROM usermhs WHERE username = '$username'");

        if( mysqli_num_rows($result) === 1 ){
            $row = mysqli_fetch_array($result);
            if (password_verify($password, $row["password"])){
                //set session
                $_SESSION["user"] = true;
                header("Location:user.php");
                exit;
            }
        }
        $error = true;

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
        <nav>
            <ul>
                <input type="hidden">
                <li><a href="loginadmin.php">Masuk<br>Admin</a></li>
            </ul>
        </nav>
    </header>

    <main class="container md-10">      
        <div class="row justify-content-center">
            <div class="col-md-12 box">
                <h2 class="text-center">LOGIN</h2>
                    <?php if( isset($error)):?>
                        <p style="color : red; font-style: italic; ">username / password salah</p>
                    <?php endif; ?>
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
						type="submit" name="login" value="Masuk"/>
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
