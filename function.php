<?php
include_once 'mysqli-connect.php';
function register($data) {
    global $conn;

    $nama = strtolower(stripslashes($data["nama"]));
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password1 = mysqli_real_escape_string($conn, $data["password1"]);

    $banding = mysqli_query($conn, "SELECT username FROM pengguna WHERE username ='$username'");
    if (mysqli_fetch_assoc($banding)){
        echo "<script>
                alert('Username sudah digunakan')
            </script>";
        return 0;
    }

    if($password !== $password1) {
        echo "<script>
                alert('Konfirmasi Password tidak sesuai');
            </script>";
        return false;
    }

    mysqli_query($conn, "INSERT INTO pengguna VALUES('', '$username','$password','admin','$nama')");
    return mysqli_affected_rows($conn);

}

function daftarmhs($data) {
    include_once 'mysqli-connect.php';
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

    mysqli_query($conn, "INSERT INTO usermhs VALUES('', '$username','$password','$nama','$nim','$no_wa')");
    return mysqli_affected_rows($conn);

}

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }

}

function tambah($data) {
    include_once 'mysqli-connect.php';
    global $conn;

    $nama= $data["nama"];
    $telepon= $data["telepon"];
    $jenis= $data["jenis"];
    $deskripsi= $data["deskripsi"];
    $tempatditemukan= $data["tempatditemukan"];
    $nim= $data["nim"];
    $tglditemukan= $data["tglditemukan"];
    $waktuditemukan= $data["waktuditemukan"];

    $query = "INSERT INTO kehilangan VALUES ('', '$nama', '$telepon', '$jenis', '$deskripsi', '$tempatditemukan', '$nim', '$tglditemukan', '$waktuditemukan')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

?>
