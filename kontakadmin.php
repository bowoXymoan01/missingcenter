<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Silkscreen&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/bootstrap/css/kontak.css">
        <link rel="stylesheet" href="assets/bootstrap/css/LoginAdminstyle.css">
        <link rel="stylesheet" href="assets/bootstrap/css/adminpage2.css">
    </head>
    <body>
        <header>
            <img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
            <h1 class="logo">Kontak Admin</h1>
            <nav>
                <ul>
                    <a href="index.html" class="btn" style="color:white; padding:5px;" ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 14l-4 -4l4 -4" /><path d="M5 10h11a4 4 0 1 1 0 8h-1" /></svg><br>Kembali</a>
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
                                <img src="fotoprofil/<?php echo $row['gambar']; ?>" class="img-fluid rounded-start" alt="..." style="border-radius: 50%;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $row['nama']; ?></h4>
                                    <hr>
                                    <p class="card-text"><?php echo $row['nowa']; ?></p>
                                    <a href="#" onclick="redirWhatsapp(<?= $row['nowa']; ?>)" class="btn" target="_blank">Hubungi</a>
                                    <hr>
                                    <p>Kebenaran.. takkan pernah takut.<br>`papa zola`</p>
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
