<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Silkscreen&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/bootstrap/css/landing_page.css">
        <link rel="stylesheet" href="assets/bootstrap/css/loginadminstyle.css">
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
					<div class="row">
						<div class="col-12 col-12-medium">
							<?php
							include_once "mysqli-connect.php";
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
									$arrayError[]='<script type="text/javascript">alert("NIM tidak boleh kosong");</script> ';
								}
								else{$deskripsi = trim($_POST['deskripsi']);
								}
													
								if(empty($_POST['tempatditemukan'])){
									$arrayError[]='<script type="text/javascript">alert("Tempat Barang Hilang tidak boleh kosong");</script> ';
								}
								else{$tempatditemukan = trim($_POST['tempatditemukan']);
								}
								
								if(empty($_POST['telepon'])){
									$arrayError[]='<script type="text/javascript">alert("No Telepon tidak boleh kosong");</script> ';
								}
								else{$telepon = trim($_POST['telepon']);
								}
								
								if(empty($_POST['tglditemukan'])){
									$arrayError[]='<script type="text/javascript">alert("Tanggal Barang Hilang tidak boleh kosong");</script> ';
								}
								else{$tglditemukan = trim($_POST['tglditemukan']);
								}
								
								if(empty($_POST['waktuditemukan'])){
									$arrayError[]='<script type="text/javascript">alert("Waktu Barang Hilang tidak boleh kosong");</script> ';
								}
								else{$waktuditemukan = trim($_POST['waktuditemukan']);
								}
								
								//jika sebua data terisi
								if(empty($arrayError)){
									require('mysqli_connect.php');//koneksi ke database.
									//melakukan query
									$q = "INSERT INTO kehilangan (iddata,jenis,nama,nim,deskripsi,status,tempatditemukan,telpon,tgl,tglproses,tglditemukan,waktuditemukan)
									VALUES('','$jenis','$nama','$nim','$deskripsi','Belum diproses','$tempatditemukan','$telepon',NOW(),'','$tglditemukan','$waktuditemukan')";
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
								<div class="box">
									<h3>Form Barang Hilang</h2>
									<div class="col-8">
										<input class="form-control" id="nama"  for="nama" 
										placeholder="Nama Lengkap Anda" name="nama" type="text" required autofocus
										value="<?php if (isset($_POST['nama'])) echo $_POST['nama']; ?>"/>
									</div>
									<br>
									<div class="col-8">
										<input class="form-control" id="nim" for="nim" 
										placeholder="NIM" name="nim" type="text" required autofocus
										value="<?php if (isset($_POST['nim'])) echo $_POST['nim']; ?>"/>
										</label>
									</div>
									<br>
									<div class="col-8">
										<input class="form-control" id="tempatditemukan" for="tempatditemukan" 
										placeholder="Lokasi Ditemukan" name="tempatditemukan" type="text" required autofocus
										value="<?php if (isset($_POST['tempatditemukan'])) echo $_POST['tempatditemukan']; ?>"/>
										</label>
									</div>
									<br>
									<div class="col-8">
										<input class="form-control" id="telepon" for="telepon" 
										placeholder="No. Telpon Anda" name="telepon" type="text" required autofocus
										value="<?php if (isset($_POST['telepon'])) echo $_POST['telepon']; ?>"/>
									</div>
									<br>
									<div class="col-8">
										<input class="form-control" id="jenis"  for="jenis" 
										placeholder="Jenis Barang Yang Hilang" name="jenis" type="text" required autofocus
										value="<?php if (isset($_POST['jenis'])) echo $_POST['jenis']; ?>"/>
									</div>
									<br>
									<div class="col-8">
										<textarea name="deskripsi" id="deskripsi" for="deskripsi" placeholder="Deskripsi Lainnya" 
										type="text" rows="2" 
										value="<?php if (isset($_POST['deskripsi'])) echo $_POST['deskripsi']; ?>"></textarea>
									</div>
									<br>
									<h4>Waktu Barang Hilang	:</h3>
									<div class="col-8">
									<input class="form-control" id="waktuditemukan"  for="waktuditemukan" 
										placeholder="" name="waktuditemukan" type="time" required autofocus
										value="<?php if (isset($_POST['waktuditemukan'])) echo $_POST['waktuditemukan']; ?>"/>
									</div>
									<br>
									<h4>Tanggal Barang Hilang :</h3>
									<div class="col-8">
										<input class="form-control" id="tglditemukan"  for="tglditemukan" 
										placeholder="" name="tglditemukan" type="date" required autofocus
										value="<?php if (isset($_POST['tglditemukan'])) echo $_POST['tglditemukan']; ?>"/>
									</div>	
									<br>
									<div class="col-8">
										<button id='submit' class="primary" type="submit" name="submit"  value="kirim">Kirim</button>
									</div>
									
									<p><a href="user.php">kembali</a></p>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>