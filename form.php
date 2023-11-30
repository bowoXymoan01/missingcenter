<!DOCTYPE html>
<html lang="en">
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
                    <li><a href="found.php">Barang Sudah <br>Terklaim</a></li>
                    <li><a href="daftarbrg.php">Barang <br>hilang</a></li>
                    <li><a href="form.php">Input <br>Data</a></li>
                    <li><a href="register.php">Daftar</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>
		<section id="main" class="wrapper">
			<div class="inner">
				<div class="content">
					<div class="row">
						<div class="col-12 col-12-medium">
							<?php
							include_once "mysqli-connect.php";
							//skrip ini melakukan query INSERT yg menambah sebuah rekaman pada tabel pengguna.
							if($_SERVER['REQUEST_METHOD']=='POST'){
								$arrayError = array();//inisialisasi array error
								
								//apakah data telah dimasukkan
								if(empty($_POST['tipe'])){
									$arrayError[]='<script type="text/javascript">alert("Jenis barang tidak boleh kosong");</script> ';
								}
								else{$tipe = trim($_POST['tipe']);
								}
								
								if(empty($_POST['merek'])){
									$arrayError[]='<script type="text/javascript">alert("merek pelapor tidak boleh kosong");</script>';
								}
								else{$merek = trim($_POST['merek']);
								}
								
								if(empty($_POST['nama'])){
									$arrayError[]='<script type="text/javascript">alert("NIM tidak boleh kosong");</script> ';
								}
								else{$nama = trim($_POST['nama']);
								}
								if(empty($_POST['warna'])){
									$arrayError[]='<script type="text/javascript">alert("NIM tidak boleh kosong");</script> ';
								}
								else{$warna = trim($_POST['warna']);
								}
													
								if(empty($_POST['deskripsi'])){
									$arrayError[]='<script type="text/javascript">alert("Tempat Barang Hilang tidak boleh kosong");</script> ';
								}
								else{$deskripsi = trim($_POST['deskripsi']);
								}
								
								if(empty($_POST['tanggal'])){
									$arrayError[]='<script type="text/javascript">alert("No Telepon tidak boleh kosong");</script> ';
								}
								else{$tanggal = trim($_POST['tanggal']);
								}
								
								if(empty($_POST['lokasi'])){
									$arrayError[]='<script type="text/javascript">alert("Tanggal Barang Hilang tidak boleh kosong");</script> ';
								}
								else{$lokasi = trim($_POST['lokasi']);
								}
								
								if(empty($_POST['status'])){
									$arrayError[]='<script type="text/javascript">alert("Waktu Barang Hilang tidak boleh kosong");</script> ';
								}
								else{$status = trim($_POST['status']);
								}
								
								//jika sebua data terisi
								if(empty($arrayError)){
									require('mysqli_connect.php');//koneksi ke database.
									//melakukan query
									$q = "INSERT INTO barang_temuan (id,tipe,merek,nama,warna,deskripsi,tanggaL,lokasi,status)
									VALUES('','$tipe','$merek','$nama','$warna','$deskripsi','$tanggal','$lokasi','$status')";
									$hasil = @mysqli_query ($conn, $q);//menjalankan query
									if($hasil){//jika berhasil
										echo'<script type="text/javascript">alert("Laporan berhasil dikirim");</script> ';
										
									}
									else {
										echo '<script type="text/javascript">alert("Data gagal dimasukkan karena error sistem");</script> ';
										echo '<p>'. mysqli_error($conn).'<br><br>Query: ' .$q. '</p>';
									}
									mysqli_close($conn);
									header("Location:sukses.php");
									exit();
								}
								else{
									foreach ($arrayError as $psn) {
										echo"<h11>$psn</h11><br>\n";
									}
									echo '</p><h2>Silahkan coba lagi.</h2>';
								}
							}
							?>
							<form action="" method="post">
								<div class="col-md-12 box">
									<h3>Form Barang Temuan</h2>
									<div class="col-8">
										<input class="form-control" id="tipe"  for="tipe" 
										placeholder="Masukan Tipe Barang" name="tipe" type="text" required autofocus
										value="<?php if (isset($_POST['tipe'])) echo $_POST['tipe']; ?>"/>
									</div>
									<br>
									<div class="col-8">
										<input class="form-control" id="merek" for="merek" 
										placeholder="Merek Barang Temuan" name="merek" type="text" required autofocus
										value="<?php if (isset($_POST['merek'])) echo $_POST['merek']; ?>"/>
										</label>
									</div>
									<br>
									<div class="col-8">
										<input class="form-control" id="nama" for="nama" 
										placeholder="Nama Penemu" name="nama" type="text" required autofocus
										value="<?php if (isset($_POST['nama'])) echo $_POST['nama']; ?>"/>
										</label>
									</div>
									<br>
									<div class="col-8">
										<input class="form-control" id="warna" for="warna" 
										placeholder="Warna Barang Temuan" name="warna" type="text" required autofocus
										value="<?php if (isset($_POST['warna'])) echo $_POST['warna']; ?>"/>
									</div>
									<br>
									<div class="col-8">
										<input class="form-control" id="deskripsi"  for="deskripsi" 
										placeholder="Deskripsi Barang Temuan" name="deskripsi" type="text" required autofocus
										value="<?php if (isset($_POST['deskripsi'])) echo $_POST['deskripsi']; ?>"/>
									</div>
									<br>
									<h4>Tanggal Barang Ditemukan	:</h3>
									<div class="col-8">
									<input class="form-control" id="tanggal"  for="tanggal" 
										placeholder="" name="tanggal" type="date" required autofocus
										value="<?php if (isset($_POST['tanggal'])) echo $_POST['tanggal']; ?>"/>
									</div>
									<br>
									<div class="col-8">
										<input class="form-control" id="lokasi"  for="lokasi" 
										placeholder="Lokasi Barang Ditemukan" name="lokasi" type="text" required autofocus
										value="<?php if (isset($_POST['lokasi'])) echo $_POST['lokasi']; ?>"/>
									</div>
									<div class="col-8">
										<input class="form-control" id="status"  for="status" 
										placeholder="Status Barang Temuan" name="status" type="text" required autofocus
										value="<?php if (isset($_POST['status'])) echo $_POST['status']; ?>"/>
									</div>
									<br>
									<div class="col-8">
										<button id='submit' class="primary" type="submit" name="submit"  value="kirim">Kirim</button>
									</div>
									
									<p><a href="admin.php">kembali</a></p>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>