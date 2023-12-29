<?php
session_start();
require "function.php";

if(!isset($_SESSION["user"])){
    header("Location:login.php");
    exit;
}

$select = "SELECT * FROM usermhs WHERE nama_lengkap = '{$_SESSION["user"]}'";
$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0 ){
    $row = mysqli_fetch_array($result);
}

// if(isset($_POST["ubah"] ) ) {

//     if(ubah3($_POST) > 0) {
//         echo "
//             <script>
//               alert('data berhasil diubah!');
//                 document.location.href ='profiladmin.php';
//                 </script>
//             ";
//     } else {
//         echo "
//             <script>
//                 alert('data gagal diubah!');
//                 document.location.href ='profiladmin.php';
//             </script>
//             ";
//     }
// }
function editFotoProfilUser(){

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
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Silkscreen&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/bootstrap/css/LoginAdminstyle.css">
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
                    <li><a href="user.php">kembali</a></li>
                </ul>
            </nav>
        </header>
        <main class="container md-12">				 
        <div class="row justify-content-center">
            <div class="col-md-9 box">
                <h2 class="text-center">EDIT PROFIL</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row["iduser"];?>" >
                    <input type="hidden" name="gambarlama" value="<?= $row["gambar"];?>" >
                    <div class="mb-4">
                        <label for="nama">Nama
                            <input class="form-control" id="nama"  for="nama" 
                            placeholder="Nama Lengkap" name="nama" type="text" value="<?=$row["nama_lengkap"];?>"/>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="username">Email
                            <input class="form-control" id="username" for="username" 
                            placeholder="Username" name="username" type="email" value="<?=$row["username"];?>" />
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="nim">NIM
                            <input class="form-control" id="nim" for="nim" 
                            placeholder="Nim" name="nim" type="text" value="<?=$row["nim"];?>" />
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="nowa">No WA
                            <input class="form-control" id="nowa" for="nowa" 
                            placeholder="No WA" name="no_wa" type="text" value="<?=$row["no_wa"];?>" />
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="nowa">Password
                            <input class="form-control" id="password" for="password" 
                            placeholder="Password" name="user_password" type="text"/>
                        </label>
                    </div>
                    
                    <div class="mb-4">
                            <label for="gambar">ubah foto
                                <br>
                                <img src="fotoprofil/<?= $row["gambar"];?>" alt="gambar" width="250">
                                <input type="file" name="gambar" id="gambar">
                            </label>
                        </div>
                    <br>
                    <div class="mb-4">
                        <button class="btn" type="submit" name="ubah" onclick="return confirm('Pastikan data ada yang dirubah!, klik batal untuk batalkan edit, klik ok untuk lanjutkan');">Update Profile</button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="admin.php">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    </body>    
</html>

<?php
    global $conn;
    if(isset($_POST['ubah'])){
        $nama = mysqli_real_escape_string($conn,$_POST['nama']);
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $nim = mysqli_real_escape_string($conn,$_POST['nim']);
        $nowa = mysqli_real_escape_string($conn,$_POST['no_wa']);
        $user_password = mysqli_real_escape_string($conn,$_POST['user_password']);
        $gambarlama = $_POST["gambarlama"];
        if ( $_FILES['gambar']['error'] === 4){
            $gambar = $gambarlama;
        }else {
            $gambar = editFotoProfilUser();
        }
        // $gambar = mysqli_real_escape_string($conn,$_POST['gambar']);

        if(empty($nama) OR empty($username) OR empty($nowa) OR empty($nim) OR empty($gambar)){
            echo "Field masih Kosong";
        }else {
            if(filter_var($username, FILTER_VALIDATE_EMAIL)){
                echo "masukan Email degan benar 'gunakan @' !";
            }else{
                if (empty($user_password)){
                    $id = $row['iduser'];
                    $sql = "UPDATE usermhs SET nama_lengkap= '$nama', username = '$username', nim = '$nim' , no_wa = '$nowa', gambar = '$gambar' WHERE iduser ='$id'";
                    if(mysqli_query($conn, $sql)){
                        $_POST['nama'] = $nama;
                        $_POST['username'] = $username;
                        $_POST['nim'] = $nim;
                        $_POST['no_wa'] = $nowa;
                        $_POST['gambar'] = $gambar;
                        session_unset();
                        session_destroy();
                        echo "<script type='text/javascript'>alert('edit profil berhasil, silahkan login kembali!');
                             document.location.href = 'login.php'; </script>"; 
                    }else{
                        echo 'Error';
                    }
                }else {
                    $hash = password_hash($user_password, PASSWORD_DEFAULT);
                    $admin = $row['iduser'];
                    $sql2 = "UPDATE usermhs SET nama_lengkap= '$nama', username = '$username', password = '$hash' , nim = '$nim' , no_wa = '$nowa', gambar='$gambar' WHERE iduser ='$admin'";
                    if(mysqli_query($conn, $sql2)){
                        session_unset();
                        session_destroy();
                        echo "<script>alert('password berhasil diubah silahkan login kembali!');
                                document.location.href = 'login.php'; </script>";
                    }else{
                        echo'Error';
                    }

                }
            }
        }
    };
?>