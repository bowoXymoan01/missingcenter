<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Silkscreen&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
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
                    <li><a href="lost.php">Barang Belum <br>Terklaim</a></li>
                    <li><a href="#">Barang Sudah <br>Terklaim</a></li>
                    <li><a href="#">Barang <br>hilang</a></li>
                    <li><a href="form.php">Input <br>Data</a></li>
                    <li><a href="register.php">Daftar</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>
			
			<!-- Heading -->
			<div id="heading" >
				<h1>Data Barang Terklaim</h1>
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
							$q="SELECT * FROM data WHERE status='terklaim'";
							$hasil=@mysqli_query ($dbkoneksi, $q);// menjalankan query 
						
								if($hasil){
							
                                    echo '
                                        <thead>
                                            <tr">
												<th>Edit</th>
                                                <th>No</th>
                                                <th>Jenis Barang</th>
												<th>Tempat Ditemukan</th>
												<th>Penemu</th>
												<th>Penerima</th>
												<th>NIM</th>
												<th>Deskripsi Lainnya</th>
												<th>Ditemukan</th>
												<th>Diambil</th>
												<th>Status</th>
                                            </tr>
                                        </thead>
										<tbody>';
										//tampilkan semua user
                                            while($baris=mysqli_fetch_array($hasil, MYSQLI_ASSOC)){
                                        echo'<tr>
												<td><a href="edit.php?idbarang=' . $baris['idbarang'] . '">
												<button type="button" class="button primary fit small">Edit</button></a></td>
												<td>' . $baris['idbarang'] . '</td>
                                                <td>' . $baris['jenis'] . '</td>
												<td>' . $baris['tempatditemukan'] . '</td>
                                                <td>' . $baris['penemu'] . '</td>
												<td>' . $baris['penerima'] . '</td>
												<td>' . $baris['nim'] . '</td>
												<td>' . $baris['deskripsi'] . '</td>
												<td>' . $baris['tglditemukan'] . '</td>
												<td>' . $baris['tgldiambil'] . '</td>
												<td>' . $baris['status'] . '</td>
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
				</div>
			</section>
			
			
		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="copyright">
						&copy; MISSING CENTER Group 5 D4 RPL 2C </a>.
					</div>
				</div>
			</footer>

		<!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>