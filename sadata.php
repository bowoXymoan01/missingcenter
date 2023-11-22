<!DOCTYPE HTML>
<html>
	<head>
		<title> MISSING CENTER </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Silkscreen&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/bootstrap/css/landing_page.css">
        <title>MISSING CENTER</title>
	</head>
	<body class="is-preload">

        <!--  pembuka Header -->
        <header>
            <img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
            <h1 class="logo">MISSING CENTER</h1>
            <nav>
                <ul>
				<li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>
        <!--  penutup Header -->
			<!-- Heading -->
			<div id="heading" >
				<h1>Data User</h1>
			</div>
			
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
					<div class="table-wrapper">
						<table class="alt">
							<?php
							//skrip untuk koneksi
							require('mysqli_connect.php');
							//skrip ini u/ membaca rekaman
							$q="SELECT * FROM pengguna";
							$hasil=@mysqli_query ($dbkoneksi, $q);// menjalankan query 
						
								if($hasil){
							
                                    echo '
                                        <thead>
                                            <tr">
												<th>Edit</th>
												<th>Delete</th>
                                                <th>Nama</th>
												<th>Username</th>
												<th>Level</th>
												<th>Lihat Password</th>
                                            </tr>
                                        </thead>
										<tbody>';
										//tampilkan semua user
                                            while($baris=mysqli_fetch_array($hasil, MYSQLI_ASSOC)){
                                        echo'<tr>
												<td><a href="edituser.php?iduser=' . $baris['iduser'] . '">
												<button type="button" class="button primary fit small">Edit</button></a></td>
												<td><a href="delete.php?iduser=' . $baris['iduser'] . '">
												<button type="button" class="button primary fit small">Delete</button></a></td>
                                                <td>' . $baris['nama'] . '</td>
                                                <td>' . $baris['username'] . '</td>
												<td>' . $baris['level'] . '</td>
												<td><a href="pass.php?iduser=' . $baris['iduser'] . '">
												<button type="button" class="button primary fit small">Lihat Password</button></a></td>
												</tr>
                                        </tbody>';}
									mysqli_free_result($hasil);
								
								}else{
									echo '<p class="error">Terjadi Kesalahan.! </p>';
									echo '<p>' . mysqli_error($dbkoneksi) . '<br><br>Query:' . $q . '</p>'; 
								}
								mysqli_close($dbkoneksi);
								?>
						</table>
						</div>
					</div>
				</div>]
			</section>
	</body>
</html>