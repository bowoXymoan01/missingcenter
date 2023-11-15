<?php

function registrasi($data) {
    global $conn;

    $namalengkap = strtolower(stripslashes($data["Nama Lengkap"]));
    $username = strtolower(stripslashes($conn, $data["Username"]));
    $password = mysqli_real_escape_string($conn, $data["Password"]);
    $password2 = mysqli_real_escape_string($data["Konfirmasi Password"]);


    if($password !== $password2) {
        echo "<script>
                alert('Konfirmasi Password tidak sesuai');
            </script>";
        return false;
    }

    return 1;

    mysqli_query($conn, "INSERT INTO pengguna VALUES('', '$username','$password','user','$namaalengkap')");

    return mysqli_affected_rows($conn);

}