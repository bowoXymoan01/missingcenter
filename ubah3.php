<?php
// require_once "function.php";


// $id = $_GET["id"];

// $barang_temuan = query("SELECT * FROM barang_temuan WHERE id = $id")[0];

// if(isset($_POST["submit"] ) ) {

//     if(ubah($_POST) > 0) {
//         echo "
//             <script>
//               alert('data berhasil diubah!');
//                 document.location.href = 
//                     'lost.php';
//                 </script>
//         ";
//     } else {
//         echo "
//             <script>
//                 alert('data gagal diubah!');
//                 document.location.href = 
//                     'lost.php';
//             </script>
//         ";
//     }
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/bootstrap/css/LoginAdminstyle.css">
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
                    <li><a href="admin.php">kembali</a></li>
                </ul>
            </nav>
        </header>
        <main class="container md-12">				 
        <div class="row justify-content-center">
            <div class="col-md-9 box">
                <h2 class="text-center">DAFTAR ADMIN</h2>
                <form action="" method="post">
                    <div class="mb-4">
                        <label for="nama">
                            <input class="form-control" id="nama"  for="nama" 
                            placeholder="Nama Lengkap" name="nama" type="text" required autofocus/>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="username">
                            <input class="form-control" id="username" for="username" 
                            placeholder="Username" name="username" type="email" required autofocus />
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="password">
                            <input class="form-control" id="password" for="password" 
                            placeholder="Password" name="password" type="password" required autofocus/>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="password1">
                            <input class="form-control" id="password1"  for="password1" 
                            placeholder="konfirmasi password" name="password1" type="password"  required autofocus />
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="nim">
                            <input class="form-control" id="nim" for="nim" 
                            placeholder="Nim" name="nim" type="text" required autofocus />
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="nowa">
                            <input class="form-control" id="nowa" for="nowa" 
                            placeholder="No Wa" name="nowa" type="text" required autofocus />
                        </label>
                    </div>
                    <br>
                    <div class="mb-4">
                        <button class="btn" type="submit" name="register">Daftarkan</button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="admin.php">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    </body>    
</html>