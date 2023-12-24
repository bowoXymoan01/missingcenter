<?php
require_once __DIR__ . '/vendor/autoload.php';
require "function.php";

$id = $_GET["id"];
$barang_hilang = query("SELECT * FROM barang_hilang WHERE idbarang = $id")[0];

$mpdf = new \Mpdf\Mpdf();
$html ='<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/css/pdfstyle.css">
    <title>Document</title>
</head>
<body>
    <h1>MISING CENTER</h1>
    <p>Halo pengguna aplikasi missingcenter</p>
    <p>Anda telah kehilangan barang sebagai berikut;</p>
    <input type="hidden" name="id" value="'.$barang_hilang["idbarang"].'" >
    <input type="hidden" name="gambarlama" value="'.$barang_hilang["gambar"].'" >
    <table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No. </th>
        <th>Gambar </th>
        <th>Nama Pemilik</th>
        <th>Whatsapp</th>
        <th>NIM</th>  
        <th>Nama Barang </th>
        <th>Deskripsi </th>
        <th>Tempat Kehilangan </th>
        <th>Tanggal Hilang </th>
        <th>Waktu Hilang </th>
        <th>Status</th>
    </tr>';
        $i= 1;
            $html .= 
                '<tr>
                    <td>'.$i.'</td>
                    <td><img src="img/'.$barang_hilang["gambar"].'" width="150"></td>
                    <td>'.$barang_hilang["nama"].'</td>
                    <td>'.$barang_hilang["telepon"].'</td>
                    <td>'.$barang_hilang["nim"].'</td>
                    <td>'.$barang_hilang["namabarang"].'</td>
                    <td>'.$barang_hilang["deskripsi"].'</td>
                    <td>'.$barang_hilang["tempatkehilangan"].'</td>
                    <td>'.$barang_hilang["tglhilang"].'</td>
                    <td>'.$barang_hilang["wkthilang"].'</td>
                    <td>'.$barang_hilang["status"].'</td>
                </tr>';
            $i++;
    $html .= '</table>
    <p>Kami akan informasikan lebih lanjut terkait barang anda,</p>
    <p>jika anda sudah menemukan barang anda sebelum kami proses silahkan konfirmasi segera ke admin </p>    <a href="index.html" >ADMIN</a>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-BarangHilang-Mahasiswa-'.$barang_hilang["nama"], "I");
?>
