<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Silkscreen&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
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
                    <li><button class="btn-cta"><a href="formkehilangan.php">Laporkan barang<br>hilang</a></button></li>
                    <li><button class="btn-cta"><a href="found.php">Lihat barang<br>hilang</a></button></li>
				</ul>
			</nav>
		</header>
		<section id="main" class="wrapper">
			<div class="inner">
				<div class="content">
					<p><a href="user.php">Batal</a></p>
					<div class="row">
						<div class="col-12 col-12-medium">
							<h2>Form Barang Hilang</h2>
							<?php
							include "mysqli-connect.php";
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
										placeholder="NIM" name="nim" type="text" required autofocus
										value="<?php if (isset($_POST['nim'])) echo $_POST['nim']; ?>"/>
										</label>
									</div>
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
	</body>
</html>