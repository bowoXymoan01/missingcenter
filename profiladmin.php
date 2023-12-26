<?php
    session_start();
    include_once 'function.php';
    if(!isset($_SESSION["admin"])){
        header("Location:login.php");
        exit;
    }
    $select = "SELECT * FROM pengguna WHERE nama = '{$_SESSION["admin"]}'";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0 ){
        $row = mysqli_fetch_array($result);
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
        <link rel="stylesheet" href="assets/bootstrap/css/profiladmin.css">
        <link rel="stylesheet" href="assets/bootstrap/css/adminpage.css">
        
        <title>MISSING CENTER</title>
    </head>
    <body>
        <!--  pembuka Header -->
        <header>
            <img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
            <h1 class="logo">Profil</h1>
            <nav>
                <ul>
                    <li><a href="admin.php">kembali</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>
        <main class="container md-10">      
            <div class="row justify-content-center">
                <div class="col-md-12 box">
                    <div class="container">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="fotoprofil/<?php echo $row["gambar"]; ?>" alt="Admin" class="rounded-circle" width="150">                            
                        </div>
                        <br>
                        <h3><?php echo $_SESSION["admin"];?>
                        <br>
                        Admin
                        </h3>
                        <hr>                            
                        <div class="contact-info">
                            <p class="email">Email<br>
                            <?php echo $row["username"];?>
                            </p>
                            <p class="no_wa">whatsapp <i class="fab fa-whatsapp fa-2x"></i><br>
                            <a href="#" onclick="redirWhatsapp(<?= $row['nowa']; ?>)"> <?php echo $row["nowa"];?> </a>
                            </p>
                        </div>
                        <a href="ubah3.php?id=<?= $row ["iduser"]; ?>">ubah profil</a>

                    </div>
                </div>
            </div>
        </main>

        <script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
        <script>
            function redirWhatsapp(nomor) {
                window.location.href = "https://wa.me/+62" + nomor;
            }
        </script>
    </body>
<!-- <form action="" method="post">
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
</form> -->
