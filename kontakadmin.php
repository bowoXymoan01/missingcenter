<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Silkscreen&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/bootstrap/css/adminpage.css">
        <link rel="stylesheet" href="assets/bootstrap/css/kontak.css">
        <link rel="stylesheet" href="assets/bootstrap/css/LoginAdminstyle.css">

    </head>
    <body>
        <header>
            <img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
            <h1 class="logo">Kontak Admin</h1>
            <nav>
                <ul>
                    <li><a href="index.html">Kembali</a></li>
                </ul>
            </nav>
        </header>
        <br>
        <br>
        <?php
            // Database connection details (replace with your actual credentials)
            include_once "mysqli-connect.php";    
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        
            // Retrieve data from the database
            $sql = "SELECT * FROM pengguna";  // Replace with your actual table name
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    ?>
        
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="fotoprofil/<?php echo $row['gambar']; ?>" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['nama']; ?></h5>
                                    <p class="card-text"><?php echo $row['nowa']; ?></p>
                                    <a href="#" onclick="redirWhatsapp(<?= $row['nowa']; ?>)" class="btn" target="_blank">Hubungi</a>
                                    <h3>SAYA SATPOL!</h3>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <?php
                }
            } else {
                echo "No results found";
            }
        
            $conn->close();
        ?>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script>
            function redirWhatsapp(nomor) {
                window.location.href = "https://wa.me/+62" + nomor;
            }
        </script>
    </body>
</html>

<!doctype html>
<html lang="en">
<head>
    </head>
<body>

    </body>
</html>
