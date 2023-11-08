<?php 
//mendefinisikan konstanta-konstanta
DEFINE ('DB_USER', 'missingcenter');
DEFINE ('DB_PASSWORD','ANDRE_bowo)!01');
DEFINE ('DB_HOST','localhost');
DEFINE ('DB_NAME', 'missingcenter');

//menugaskan koneksi database ke sebuah variabel $dbkoneksi:
$dbkoneksi=@mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die ('Tidak Dapat Terkoneksi MySQL: '. mysqli_connect_error());

//menetapkan pengkodean sebagai utf-8
mysqli_set_charset($dbkoneksi, 'utf8');
?>