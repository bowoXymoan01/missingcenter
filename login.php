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
        <?php
            include_once 'mysqli-connect.php';            
            // Periksa apakah form login sudah terisi
            if (isset($_POST['login'])) {
            
                // Melakukan query SQL untuk mencari data pengguna berdasarkan username dan password
                try {
                    // Mendefinisikan variabel username dan password
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $query = "SELECT * FROM pengguna WHERE username = ? AND password = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("ss", $username, $password);
                    $stmt->execute();
                    $result = $stmt->get_result();
                } catch (Exception $e) {
                    // Tangkap kesalahan query SQL
                    echo "Terjadi kesalahan saat melakukan query SQL: " . $e->getMessage();
                    exit();
                }
            
                // Periksa apakah data pengguna ditemukan
                if ($result->num_rows > 0) {
                    // Data pengguna ditemukan
                    $row = $result->fetch_assoc();
                    $level = $row['level'];
            
                    // Redirect pengguna ke halaman admin atau halaman user sesuai dengan levelnya
                    if ($level == 'admin') {
                        header("Location:admin.php");
                    } elseif ($level == 'user') {
                        header("Location:user.php");
                    }
                } else {
                    // Data pengguna tidak ditemukan
                    echo '<script type="text/javascript">alert("Username atau Password salah!");</script> ';
                }
            }
            
        ?>        
        <div class="row justify-content-center">
            <div class="col-md-12 box">
                <h2 class="text-center">LOGIN</h2>
                <form action="" method="post">
                    <div class="mb-4">
                        <input class="form-control" id="username"  for="username" 
						placeholder="Username" name="username" type="text" required autofocus
						value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"/>
                    </div>
                    <div class="mb-4">
                        <input class="form-control" id="password" for="password" 
						placeholder="Password" name="password" type="password" required autofocus
						value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"/>
                    </div>
                    <div class="mb-4 d-grid gap-2">
                        <input id="submit"  class="btn"
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
</body>
</html>
