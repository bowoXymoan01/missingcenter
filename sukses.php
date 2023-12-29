<?php
	session_start();
	if(!isset($_SESSION["user"])){
		header("Location:login.php");
		exit;
	}
?>
<!DOCTYPE HTML>
<html>
    <head>
		<title>MISSING CENTER</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Silkscreen&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/bootstrap/css/landing_page.css">
        <link rel="stylesheet" href="assets/bootstrap/css/loginAdminstyle.css">
        <title>MISSING CENTER</title>
	</head>
	<body class="is-preload">
		<header>
			<img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
			<h1 class="logo">MISSING CENTER</h1>
			<nav>
				<ul>
					<li><button class="btn-cta"><a href="baranghilang.php">Laporkan barang<br>hilang</a></button></li>
					<li><button class="btn-cta"><a href="found.php">Lihat barang<br>hilang</a></button></li>
				</ul>
			</nav>
		</header>
		<section id="main" class="box">
			<div class="inner">
				<div class="content">
				<h2>Laporan anda berhasil dikirim.</h2>
					<p>Kami akan segera memproses laporan anda, pemberitahuan akan kami informasikan melalui panggilan telepon atau melalui WhatsApp.
						Hubungi kami jika barang anda sudah ditemukan sebelum kami proses, beserta kirimkan bukti melalui kontak Admin.
					</p>
					<a href='user.php'>KEMBALI</a>
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
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

	</body>
</html>