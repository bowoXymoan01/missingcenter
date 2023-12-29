<?php
include_once 'mysqli-connect.php';
function register($data) {
    global $conn;

    $nama = strtolower(stripslashes($data["nama"]));
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password1 = mysqli_real_escape_string($conn, $data["password1"]);
    $nim = strtolower(stripslashes($data["nim"]));
    $nowa = strtolower(stripslashes($data["nowa"]));

    $gambar = upload2();
    if(!$gambar){
        return false;
    }
    $banding = mysqli_query($conn, "SELECT username FROM pengguna WHERE username ='$username'");
    if (mysqli_fetch_assoc($banding)){
        echo "<script>
                alert('Username sudah digunakan')
            </script>";
        return 0;
    }
    if($password !== $password1){
        echo "<script>
                alert('Konfirmasi password tidak sesuai');
              </script>";
        return false;  
    }
    $password = password_hash($password,PASSWORD_DEFAULT);
    
    $query = "INSERT INTO pengguna VALUES ('','$username','$password','admin','$nama','$nim','$nowa','$gambar')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function upload2(){

    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if($error === 4 ){
        echo "<script>
                alert('pilih gambar terlebih dahulu');
                </script>";
            return false;
    }
    $ekstensiGambarValid = ['jpg','png','jpeg'];
    $ekstensiGambar = explode('.', $namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script>
        alert('yang anda upload bukan gambar');
        </script>";
    }
    if( $ukuranfile > 2000000){
        echo "<script>
        alert('Ukuruan gambar terlalu besar');
        </script>";
    }

    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensiGambar;
    var_dump($namafilebaru);

    move_uploaded_file($tmpName, 'fotoprofil/'.$namafilebaru);
    return $namafilebaru;

}




function daftarmhs($data) {
    global $conn;

    $nama = strtolower(stripslashes($data["nama"]));
    $nim = stripslashes($data["nim"]);
    $no_wa = stripslashes($data["no_wa"]);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password1 = mysqli_real_escape_string($conn, $data["password1"]);

    $banding = mysqli_query($conn, "SELECT username FROM usermhs WHERE username ='$username'");
    if (mysqli_fetch_assoc($banding)){
        echo "<script>
                alert('Username sudah digunakan');
            </script>";
        return 0;
    }

    if($password !== $password1) {
        echo "<script>
                alert('Konfirmasi Password tidak sesuai');
            </script>";
        return false;
    }

    $password = password_hash($password,PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO usermhs VALUES('', '$username','$password','$nama','$nim','$no_wa')");
    return mysqli_affected_rows($conn);

}

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data) {
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $telepon = htmlspecialchars($data["telepon"]);
    $namabarang = htmlspecialchars($data["namabarang"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $tempatkehilangan = htmlspecialchars($data["tempatkehilangan"]);
    $nim = htmlspecialchars($data["nim"]);
    $tglhilang = htmlspecialchars($data["tglhilang"]);
    $wkthilang = htmlspecialchars($data["wkthilang"]);

    $gambar = upload();
    if(!$gambar){
        return false;
    }
    $query = "INSERT INTO barang_hilang VALUES ('','$nama', '$telepon', '$nim', '$namabarang', '$deskripsi', '$tempatkehilangan', '$tglhilang', '$wkthilang','belum ditemukan','$gambar')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload(){

    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // if($error === 4 ){
    //     echo "<script>
    //             alert('pilih gambar terlebih dahulu');
    //             </script>";
    //         return false;
    // }
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
        // echo "<script>
        // alert('yang anda upload bukan gambar');
        // </script>";
    }
    if( $ukuranfile > 2000000){
        echo "<script>
        alert('Ukuruan gambar terlalu besar');
        </script>";
    }

    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensiGambar;
    var_dump($namafilebaru);

    move_uploaded_file($tmpName, 'img/'.$namafilebaru);
    return $namafilebaru;

}

function tambah_barang_temuan($data) {
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $telepon = htmlspecialchars($data["telepon"]);
    $tipe = htmlspecialchars($data["tipe"]);
    $merek = htmlspecialchars($data["merek"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $lokasi = htmlspecialchars($data["lokasi"]);
    $waktu = htmlspecialchars($data["waktu"]);
    
    $gambar = upload();
    if(!$gambar){
        return false;
    }

    $query = "INSERT INTO barang_temuan VALUES ('', '$tipe', '$merek', '$nama', '$deskripsi','$tanggal','$lokasi','belum diklaim','$waktu','$gambar','$telepon')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM barang_hilang WHERE idbarang =$id");
    return mysqli_affected_rows($conn);
}

function hapus1($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM barang_temuan WHERE id=$id ");
    return mysqli_affected_rows($conn);
}

function ubah3($data) {
    global $conn;

    // Sanitize all user input to prevent SQL injection:
    $id = mysqli_real_escape_string($conn, $data["id"]);
    $nama = mysqli_real_escape_string($conn, htmlspecialchars($data["nama"]));
    $username = mysqli_real_escape_string($conn, htmlspecialchars($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password1 = mysqli_real_escape_string($conn, $data["password1"]);
    $nim = mysqli_real_escape_string($conn, htmlspecialchars($data["nim"]));
    $nowa = mysqli_real_escape_string($conn, htmlspecialchars($data["nowa"]));
    $gambarlama = mysqli_real_escape_string($conn, $data["gambarlama"]);

    // Enhanced password validation:
    if ($password !== $password1) {
        // Use a more appropriate error handling mechanism:
        throw new Exception("Konfirmasi password tidak sesuai");
    }
    $password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

    // Handle image upload effectively:
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 4) {
        $gambar = $gambarlama;
    } else {
        $gambar = upload2(); // Assuming upload2() handles image uploads securely
    }

    // Correctly format the UPDATE query:
    $query = "UPDATE pengguna SET
            username = '$username',
            password = '$password',
            level = 'admin',
            nama = '$nama',
            nim = '$nim',
            nowa = '$nowa',
            gambar = '$gambar'
            WHERE iduser = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function ubah($data){
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $telepon = htmlspecialchars($data["telepon"]);
    $namabarang = htmlspecialchars($data["namabarang"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $tempatkehilangan = htmlspecialchars($data["tempatkehilangan"]);
    $nim = htmlspecialchars($data["nim"]);
    $tglhilang = htmlspecialchars($data["tglhilang"]);
    $wkthilang = htmlspecialchars($data["wkthilang"]);
    $status = htmlspecialchars($data["status"]);

    $gambarlama = $data["gambarlama"];
    if ( $_FILES['gambar']['error'] === 4){
        $gambar = $gambarlama;
    }else {
        $gambar = upload();
    }

    $query = "UPDATE barang_hilang SET 
    nama = '$nama',
    telepon = '$telepon',
    namabarang = '$namabarang',
    deskripsi = '$deskripsi',
    tempatkehilangan = '$tempatkehilangan',
    nim = '$nim',
    tglhilang = '$tglhilang',
    wkthilang = '$wkthilang',
    status = '$status',
    gambar = '$gambar'
    WHERE idbarang = $id
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah2($data){
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $tipe = htmlspecialchars($data["tipe"]);
    $merek = htmlspecialchars($data["merek"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $lokasi = htmlspecialchars($data["lokasi"]);
    $status = htmlspecialchars($data["status"]);
    $waktu = htmlspecialchars($data["waktu"]);

    $gambarlama = $data["gambarlama"];
    if ( $_FILES['gambar']['error'] === 4){
        $gambar = $gambarlama;
    }else {
        $gambar = upload();
    }

    $query = "UPDATE barang_temuan SET
    tipe ='$tipe',
    merek ='$merek',
    nama ='$nama',
    deskripsi ='$deskripsi',
    tanggal ='$tanggal',
    lokasi ='$lokasi',
    status ='$status',
    waktu ='$waktu',
    gambar ='$gambar'
    WHERE id = '$id'
    ";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM barang_hilang
        WHERE
        nama LIKE '%$keyword%' OR
        telepon LIKE '%$keyword%' OR
        namabarang LIKE '%$keyword%' OR
        deskripsi LIKE '%$keyword%' OR
        tempatkehilangan LIKE '%$keyword%' OR
        nim LIKE '%$keyword%' OR
        tglhilang LIKE '%$keyword%' OR
        wkthilang LIKE '%$keyword%' OR
        status = 'belum ditemukan'
    ";

    return query($query);
}

function cari2($keyword){
    $query = "SELECT * FROM barang_temuan
        WHERE
        tipe LIKE '%$keyword%' OR
        merek LIKE '%$keyword%' OR
        nama LIKE '%$keyword%' OR
        deskripsi LIKE '%$keyword%' OR
        tanggal LIKE '%$keyword%' OR
        lokasi LIKE '%$keyword%' OR
        status LIKE '%$keyword%' OR
        waktu LIKE '%$keyword%' OR
        telepon LIKE '%$keyword%' OR
        status = 'belum diklaim'
    ";

    return query($query);
}

function form_kontak_kami ($data) {
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $nim = htmlspecialchars($data["nim"]);
    $telepon = htmlspecialchars($data["telepon"]);
    $pesan = htmlspecialchars($data["pesan"]);

    $query = "INSERT INTO kontak_kami VALUES ('','$nama','$email','$nim','$telepon','$pesan')";

    mysqli_query($conn, $query);

    return mysqli_effected_rows($conn);
}

?>
