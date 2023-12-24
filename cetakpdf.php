<?php
require_once __DIR__ . '/vendor/autoload.php';
require "function.php";

$id = $_GET["id"];
$barang_temuan = query("SELECT * FROM barang_temuan WHERE id = $id")[0];

$mpdf = new \Mpdf\Mpdf();
$html ='<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>MISING CENTER</h1>
    <input type="hidden" name="id" value="'.$barang_temuan["id"].'" >
    <input type="hidden" name="gambarlama" value="'.$barang_temuan["gambar"].'" >
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama Penemu</th>
            <th>No. WA</th>
            <th>Nama Barang</th>
            <th>Merek</th>
            <th>Deskripsi</th>
            <th>Waktu Ditemukan</th>
            <th>Tanggal</th>
            <th>Lokasi</th>
            <th>Status</th>
        </tr>';
        $i= 1;
            $html .= 
                '<tr>
                    <td>'.$i.'</td>
                    <td><img src="img/'.$barang_temuan["gambar"].'" width="150"></td>
                    <td>'.$barang_temuan["nama"].'</td>
                    <td>'.$barang_temuan["telepon"].'</td>
                    <td>'.$barang_temuan["tipe"].'</td>
                    <td>'.$barang_temuan["merek"].'</td>
                    <td>'.$barang_temuan["deskripsi"].'</td>
                    <td>'.$barang_temuan["waktu"].'</td>
                    <td>'.$barang_temuan["tanggal"].'</td>
                    <td>'.$barang_temuan["lokasi"].'</td>
                    <td>'.$barang_temuan["status"].'</td>
                </tr>';
            $i++;
    $html .= '</table>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output();
?>
