<?php
session_start();
require "function.php";

if(!isset($_SESSION["admin"])){
    header("Location:login.php");
    exit;
}
$barang_temuan = query("SELECT * FROM barang_temuan WHERE status='belum diklaim'");
$barang_hilang = query("SELECT * FROM barang_hilang WHERE status='belum ditemukan'");

if ( isset($_POST["cari"])){
    $barang_hilang = cari($_POST["keyword"]);
    $barang_temuan = cari2($_POST["keyword"]);
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Silkscreen&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/bootstrap/css/LoginAdminstyle.css">
        <link rel="stylesheet" href="assets/bootstrap/css/landing_page.css">
        <link rel="stylesheet" href="assets/bootstrap/css/adminpage2.css">

        <title>MISSING CENTER</title>
    </head>
    <body>
        <!--  pembuka Header -->
        <header>
            <img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
            <h1 class="logo">Barang Temuan & Hilang</h1>
            <nav>
                <ul>
                    <a href="admin.php" class="btn" style="color:white; padding:5px;" ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 14l-4 -4l4 -4" /><path d="M5 10h11a4 4 0 1 1 0 8h-1" /></svg><br>Kembali</a>
                </ul>
            </nav>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari" aria-label="Recipient's username" aria-describedby="basic-addon1" name="keyword" size="50">
                    <button class="input-group-text" id="basic-addon1" type="sumbit"  name="cari">Cari</button>
                </div>
            </form>
        </header>
        <h1>Barang Temuan</h1> <p>( daftar barang inputan dari Admin)</p>
        <table style="padding: 5px; border: 1px solid black;" border="1" cellpadding="10" cellspacing="0" class="table table-bordered table-striped table-hover">
            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Gambar</th>
                <th>Nama Penemu</th>
                <th>telepon <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/></svg></th>                <th>Nama Barang</th>
                <th>Merek</th>
                <th>Deskripsi</th>
                <th>Waktu Ditemukan</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Status</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach( $barang_temuan as $row ) : ?>
            <tr>
                <td><?= $i ?></td>
                <td>    
                    <a class="btn" href="update2.php?id=<?= $row ["id"]; ?>">Ubah</a>
                </td>
                <td><img src="img/<?= $row["gambar"];?>" width="150"></td>
                <td><?= $row["nama"]; ?></td>
                <td>
                <?= $row["telepon"]; ?><br>
                <button class="btn" onclick="redirWhatsapp(<?= $row['telepon']; ?>)">Hubungi</button>
                </td>
                <td><?= $row["tipe"]; ?></td>
                <td><?= $row["merek"]; ?></td>
                <td><?= $row["deskripsi"]; ?></td>
                <td><?= $row["waktu"]; ?></td>
                <td><?= $row["tanggal"]; ?></td>
                <td><?= $row["lokasi"]; ?></td>
                <td><?= $row["status"]; ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
        <h1>Barang Hilang</h1> <p>( daftar barang inputan dari Mahasiswa)</p>
        <table style="padding: 5px; border: 1px solid black;" border="1" cellpadding="10" cellspacing="0" class="table table-bordered table-striped table-hover">
            <tr>
                <th>No. </th>
                <th>Aksi </th>
                <th>Gambar </th>
                <th>Nama Pemilik</th>
                <th>telepon <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/></svg></th>                <th>NIM</th>  
                <th>Nama Barang </th>
                <th>Deskripsi </th>
                <th>Tempat Kehilangan </th>
                <th>Tanggal Hilang </th>
                <th>Waktu Hilang </th>
                <th>Status</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach( $barang_hilang as $row ) : ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <a class="btn" href="update.php?id=<?= $row ["idbarang"]; ?>">Ubah</a><br>
                </td>
                <td><img src="img/<?= $row["gambar"];?>" width="150"></td>
                <td><?= $row["nama"]; ?></td>
                <td>
                    <?= $row["telepon"]; ?><br>
                    <button class="btn" onclick="redirWhatsapp(<?= $row['telepon']; ?>)" target="_blank">Hubungi</button>
                </td>
                <td><?= $row["nim"]; ?></td>
                <td><?= $row["namabarang"]; ?></td>
                <td><?= $row["deskripsi"]; ?></td>
                <td><?= $row["tempatkehilangan"]; ?></td>
                <td><?= $row["tglhilang"]; ?></td>
                <td><?= $row["wkthilang"]; ?></td>
                <td><?= $row["status"]?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
        <script>
            function redirWhatsapp(nomor) {
                window.location.href = "https://wa.me/+62"+nomor;
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    </body>
</html>