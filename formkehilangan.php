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

		<!-- Header -->
			<header id="header">
				<a class="logo" href="index.html"> MISSING CENTER </a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.html">Home</a></li>
					<li><a href="login.php">Login</a></li>
				</ul>
			</nav>
			
			<!-- Heading -->
			<div id="heading" >
				<h1>FORM BARANG</h1>
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
					
					//apakah data telah dimasukkan
					if(empty($_POST['jenis'])){
						$arrayError[]='<script type="text/javascript">alert("Jenis barang tidak boleh kosong");</script> ';
					}
					else{$jenis = trim($_POST['jenis']);
					}
					
					if(empty($_POST['nama'])){
						$arrayError[]='<script type="text/javascript">alert("nama pelapor tidak boleh kosong");</script>';
					}
					else{$nama = trim($_POST['nama']);
					}
					
					if(empty($_POST['nim'])){
						$arrayError[]='<script type="text/javascript">alert("NIM tidak boleh kosong");</script> ';
					}
					else{$nim = trim($_POST['nim']);
					}
					
					if(empty($_POST['deskripsi'])){
						$deskripsi = trim($_POST['deskripsi']);
					}
					else{$deskripsi = trim($_POST['deskripsi']);
					}
										
					if(empty($_POST['tempatditemukan'])){
						$arrayError[]='<script type="text/javascript">alert("Tempat ditemukan tidak boleh kosong");</script> ';
					}
					else{$tempatditemukan = trim($_POST['tempatditemukan']);
					}
					
					if(empty($_POST['telepon'])){
						$arrayError[]='<script type="text/javascript">alert("No Telepon tidak boleh kosong");</script> ';
					}
					else{$telepon = trim($_POST['telepon']);
					}
					
                    if(empty($_POST['tglditemukan'])){
						$arrayError[]='<script type="text/javascript">alert("Tanggal ditemukan tidak boleh kosong");</script> ';
					}
					else{$tglditemukan = trim($_POST['tglditemukan']);
					}
					
					if(empty($_POST['waktuditemukan'])){
						$arrayError[]='<script type="text/javascript">alert("Waktu ditemukan tidak boleh kosong");</script> ';
					}
					else{$waktuditemukan = trim($_POST['waktuditemukan']);
					}
					
					//jika sebua data terisi
					if(empty($arrayError)){
						require('mysqli_connect.php');//koneksi ke database.
						//melakukan query
						$q = "INSERT INTO kehilangan (iddata,jenis,nama,nim,deskripsi,status,tempatditemukan,telepon,tanggal,tglproses,tglditemukan,waktuditemukan)
						VALUES('','$jenis','$nama','$nim','$deskripsi','Belum diproses','$tempatditemukan','$telepon',NOW(),'','','$tglditemukan','$waktuditemukan')";
						$hasil = @mysqli_query ($dbkoneksi, $q);//menjalankan query
						if($hasil){//jika berhasil
							echo'<script type="text/javascript">alert("Laporan berhasil dikirim");</script> ';
							
						}
						else{//jika gagal
							//tampilkan error
							echo '<script type="text/javascript">alert("Data gagal dimasukkan karena error sistem");</script> ';
							//Debug:
							echo '<p>'. mysqli_error($dbkoneksi).'<br><br>Query: ' .$q. '</p>';
						}
						mysqli_close($dbkoneksi);//menutup koneksi
						header("Location:sukses.php");
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
						
						<form action="formkehilangan.php" method="post">
						<div class="row gtr-uniform">
							<div class="col-6 col-12-xsmall">
								<input class="form-control" id="nama"  for="nama" 
								placeholder="Nama Lengkap Anda" name="nama" type="text" required autofocus
								value="<?php if (isset($_POST['nama'])) echo $_POST['nama']; ?>"/>
							</div>
							
							<div class="col-2">
								<input class="form-control" id="nim" for="nim" 
								placeholder="NIM" name="noka" type="text" required autofocus
								value="<?php if (isset($_POST['nim'])) echo $_POST['nim']; ?>"/>
								</label>
							</div>
							<h2>/</h2>
							<div class="col-3">
								<input class="form-control" id="tempatditemukan" for="tempatditemukan" 
								placeholder="Lokasi Ditemukan" name="tempatditemukan" type="text" required autofocus
								value="<?php if (isset($_POST['tempatditemukan'])) echo $_POST['tempatditemukan']; ?>"/>
								</label>
							</div>
							<div class="col-6 col-12-xsmall">
								<input class="form-control" id="telpon" for="telpon" 
								placeholder="No. Telpon Anda" name="telpon" type="text" required autofocus
								value="<?php if (isset($_POST['telpon'])) echo $_POST['telpon']; ?>"/>
							</div>
							<div class="col-6 col-12-xsmall">
								<input class="form-control" id="jenis"  for="jenis" 
								placeholder="Jenis Barang Yang Hilang" name="jenis" type="text" required autofocus
								value="<?php if (isset($_POST['jenis'])) echo $_POST['jenis']; ?>"/>
							</div>
							<div class="col-6">
								<textarea name="deskripsi" id="deskripsi" for="deskripsi" placeholder="Deskripsi Lainnya" 
								type="text" rows="2" 
								value="<?php if (isset($_POST['deskripsi'])) echo $_POST['deskripsi']; ?>"></textarea>
							</div>
							<h3>Waktu Barang Hilang	:</h3>
							<div class="col-3 col-12-xsmall">
							<input class="form-control" id="waktuditemukan"  for="waktuditemukan" 
								placeholder="" name="waktuditemukan" type="time" required autofocus
								value="<?php if (isset($_POST['waktuditemukan'])) echo $_POST['waktuditemukan']; ?>"/>
							</div>
							<!-- Change this to a button or input when using this as a form -->
							<div class="col-6 ">
								<input id="submit"  class="primary fit"
								type="submit" name="Submit" value="Kirim"/>
							</div>
							<h3>Tanggal Barang Hilang	:</h3>
							<div class="col-3 col-12-xsmall">
								<input class="form-control" id="tglditemukan"  for="tglditemukan" 
								placeholder="" name="tglditemukan" type="date" required autofocus
								value="<?php if (isset($_POST['tglditemukan'])) echo $_POST['tglditemukan']; ?>"/>
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