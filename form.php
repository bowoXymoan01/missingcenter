<!DOCTYPE HTML>
<!--
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>MISSING CENTER</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Silkscreen&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/bootstrap/css/adminpage.css">
        <title>MISSING CENTER</title>
	</head>
	<body class="is-preload">
               <!--  pembuka Header -->
        <header>
            <img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
            <h1 class="logo">MISSING CENTER</h1>
            <nav>
                <ul>
				<li><a href="lost.php">Barang Belum <br>Terklaim</a></li>
                    <li><a href="found.php">Barang Sudah <br>Terklaim</a></li>
                    <li><a href="#">Barang <br>hilang</a></li>
                    <li><a href="form.php">Input <br>Data</a></li>
                    <li><a href="register.php">Daftar</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>
			
			<!-- Heading -->
			<div id="heading" >
				<h1>FORM</h1>
			</div>
			
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
					<p><a href="admin.php">Batal</a></p>
					<div class="row">
						<div class="col-12 col-12-medium">
						<ul class="alt">
							<li>DATA BARANG</li>
							<li></li>
						</ul>
				<?php
			    include "kon.php";
				//skrip ini melakukan query INSERT yg menambah sebuah rekaman pada tabel pengguna.
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$arrayError = array();//inisialisasi array error
					
					//apakah nama telah dimasukkan
					if(empty($_POST['jenis'])){
						$arrayError[]='<script type="text/javascript">alert("Jenis barang tidak boleh kosong");</script> ';
					}
					else{$jenis = trim($_POST['jenis']);
					}
					
					if(empty($_POST['tempatditemukan'])){
						$arrayError[]='<script type="text/javascript">alert("tempatditemukan barang tidak boleh kosong");</script>';
					}
					else{$tempatditemukan = trim($_POST['tempatditemukan']);
					}
					
					//apakah alamat email telah dimasukkan
					if(empty($_POST['penemu'])){
						$arrayError[]='<script type="text/javascript">alert("penemu barang tidak boleh kosong");</script> ';
					}
					else{$penemu = trim($_POST['penemu']);
					}
					
					//apakah nama telah dimasukkan
					if(empty($_POST['deskripsi'])){
						$deskripsi = trim($_POST['deskripsi']);
					}
					else{$deskripsi = trim($_POST['deskripsi']);
					}
					
					if(empty($_POST['tglditemukan'])){
						$arrayError[]='<script type="text/javascript">alert("Tanggal tidak boleh kosong");</script> ';
					}
					else{$tglditemukan = trim($_POST['tglditemukan']);
					}
					
					//jika sebua data terisi
					if(empty($arrayError)){
						require('mysqli_connect.php');//koneksi ke database.
						//melakukan query
						$q = "INSERT INTO data (idbarang,jenis,tempatditemukan,penemu,deskripsi,tglditemukan,tgldiambil,status)
						VALUES('','$jenis','$tempatditemukan','$penemu','$deskripsi','$tglditemukan','','belum diklaim' )";
						$hasil = @mysqli_query ($dbkoneksi, $q);//menjalankan query
						if($hasil){//jika berhasil
							echo'<script type="text/javascript">alert("Data berhasil dimasukkan");</script> ';
						}
						else{//jika gagal
							//tampilkan error
							echo '<script type="text/javascript">alert("Data gagal dimasukkan karena error sistem");</script> ';
							//Debug:
							echo '<p>'. mysqli_error($dbkoneksi).'<br><br>Query: ' .$q. '</p>';
						}
						mysqli_close($dbkoneksi);//menutup koneksi
						header("Location:lost.php");
						//menyertakan footer dan keluar dari skript:
						exit();
					}
					else{
						foreach ($arrayError as $psn) {//menampilkan error
							echo"<h11>$psn</h11><br>\n";
						}
						echo '</p><h2>Silahkan coba lagi.</h2>';
					}
				}
				?>
						
						<form action="form.php" method="post">
						<div class="row gtr-uniform">
							<div class="col-7 col-12-xsmall">
								<input class="form-control" id="jenis"  for="jenis" 
								placeholder="Jenis Barang" name="jenis" type="text" required autofocus
								value="<?php if (isset($_POST['jenis'])) echo $_POST['jenis']; ?>"/>
							</div>
							<div class="col-5">
								<label>Tanggal Terima :
								<input class="form-control" id="tglditemukan" for="tglditemukan" 
								placeholder="Tanggal Terima" name="tglditemukan" type="date" required autofocus
								value="<?php if (isset($_POST['tglditemukan'])) echo $_POST['tglditemukan']; ?>"/>
								</label>
							</div>
							<div class="col-7 col-12-xsmall">
								<input class="form-control" id="penemu" for="penemu" 
								placeholder="Yang Menyerahkan" name="penemu" type="text" required autofocus
								value="<?php if (isset($_POST['penemu'])) echo $_POST['penemu']; ?>"/>
							</div>
							<!-- Change this to a button or input when using this as a form -->
							<div class="col-5 ">
								<input id="submit"  class="primary fit"
								type="submit" name="Submit" value="Submit"/>
							</div>
							<div class="col-7 col-12-xsmall">
								<input class="form-control" id="tempatditemukan"  for="tempatditemukan" 
								placeholder="TEMPAT BARANG DITEMUKAN" name="tempatditemukan" type="text" required autofocus
								value="<?php if (isset($_POST['tempatditemukan'])) echo $_POST['tempatditemukan']; ?>"/>
							</div>
							<div class="col-7">
								<textarea name="deskripsi" id="deskripsi" for="deskripsi" placeholder="Deskripsi Ciri - Ciri Barang" 
								type="text" rows="3" 
								value="<?php if (isset($_POST['deskripsi'])) echo $_POST['deskripsi']; ?>"></textarea>
							</div>
						</div>
						</form>
						
						</div>
					</div>
					</div>
				</div>
			</section>
			
		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					
					<div class="copyright">
						&copy; MISSING CENTER Group 5 D4 RPL 2C</a>.
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