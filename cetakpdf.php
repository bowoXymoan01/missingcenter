<?php
require_once __DIR__ . '/vendor/autoload.php';
require "function.php";

$id = $_GET["id"];
$barang_temuan = query("SELECT * FROM barang_temuan WHERE id = $id AND status='diproses'")[0];
$barang_hilang = query("SELECT * FROM barang_hilang WHERE idbarang = $id AND status='diproses'")[0];

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
    <h1>MISSING CENTER</h1>
    <p>Halo pengguna aplikasi missingcenter</p>
    <p>Apakah data barang ini milik anda? <br> Ketikan (<a href="index.html" >Ya</a> / <a href="" >Tidak</a>) melalui kontak admin </p>    
    <input type="hidden" name="id" value="'.$barang_temuan["id"].'" >
    <input type="hidden" name="gambarlama" value="'.$barang_temuan["gambar"].'" >
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama Penemu</th>
            <th>telepon
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
    // $html .= '</table>';
    // $html .='<input type="hidden" name="id" value="'.$barang_hilang["idbarang"].'" >
    // <input type="hidden" name="gambarlama" value="'.$barang_hilang["gambar"].'" >
    // <h1>Laporan Barang Hilang Anda</h1>
    // <table border="1" cellpadding="10" cellspacing="0">
    // <tr>
    //     <th>No. </th>
    //     <th>Gambar </th>
    //     <th>Nama Pemilik</th>
    //     <th>Whatsapp</th>
    //     <th>NIM</th>  
    //     <th>Nama Barang </th>
    //     <th>Deskripsi </th>
    //     <th>Tempat Kehilangan </th>
    //     <th>Tanggal Hilang </th>
    //     <th>Waktu Hilang </th>
    //     <th>Status</th>
    // </tr>';
    //     $i= 1;
    //         $html .= 
    //             '<tr>
    //                 <td>'.$i.'</td>
    //                 <td><img src="img/'.$barang_hilang["gambar"].'" width="150"></td>
    //                 <td>'.$barang_hilang["nama"].'</td>
    //                 <td>'.$barang_hilang["telepon"].'</td>
    //                 <td>'.$barang_hilang["nim"].'</td>
    //                 <td>'.$barang_hilang["namabarang"].'</td>
    //                 <td>'.$barang_hilang["deskripsi"].'</td>
    //                 <td>'.$barang_hilang["tempatkehilangan"].'</td>
    //                 <td>'.$barang_hilang["tglhilang"].'</td>
    //                 <td>'.$barang_hilang["wkthilang"].'</td>
    //                 <td>'.$barang_hilang["status"].'</td>
    //             </tr>';
    //         $i++;
    $html .='</table>

</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('BarangTemuan-Mahasiswa-'.$barang_temuan["nama"].'.pdf', "I");
?>
