<?php
session_start();
require "function.php";

if(!isset($_SESSION["admin"])){
    header("Location:login.php");
    exit;
}

$select = "SELECT * FROM pengguna WHERE nama = '{$_SESSION["admin"]}'";
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
function editFotoProfil(){

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
        <link rel="stylesheet" href="assets/bootstrap/css/adminpage2.css">

        <title>MISSING CENTER</title>
    </head>
    <body>
        <!--  pembuka Header -->
        <header>
            <img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
            <h1 class="logo">MISSING CENTER</h1>
            <nav>
                <ul>
                    <a href="profiladmin.php" class="btn" style="color:white; padding:5px;" ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 14l-4 -4l4 -4" /><path d="M5 10h11a4 4 0 1 1 0 8h-1" /></svg><br>Kembali</a>
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
                        <label for="nama" >Nama
                            <input size="40" class="form-control" id="nama"  for="nama" 
                            placeholder="Nama Lengkap" name="nama" type="text" value="<?=$row["nama"];?>"/>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="username">Email
                            <input size="40" class="form-control" id="username" for="username" 
                            placeholder="Username" name="username" type="email" value="<?=$row["username"];?>" />
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="nim">NIM
                            <input size="40" class="form-control" id="nim" for="nim" 
                            placeholder="Nim" name="nim" type="text" value="<?=$row["nim"];?>" />
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="nowa">No WA
                            <input size="40" class="form-control" id="nowa" for="nowa" 
                            placeholder="No WA" name="nowa" type="text" value="<?=$row["nowa"];?>" />
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="nowa">Password
                            <input size="40" class="form-control" id="password" for="password" 
                            placeholder="Password" name="user_password" type="text"/>
                        </label>
                    </div>
                    
                    <div class="mb-4">
                            <label for="gambar">ubah foto
                                <br>
                                <img src="fotoprofil/<?= $row["gambar"];?>" alt="gambar" width="250">
                                <label for="formFile" class="form-label"></label>
                                <input class="form-control" type="file" id="formFile" name="gambar">
                            </label>
                        </div>
                    <div class="mb-4">
                        <button class="btn" type="submit" name="ubah" onclick="return confirm('Pastikan data ada yang dirubah!, klik batal untuk batalkan edit, klik ok untuk lanjutkan');" style="color:white;" >Update Profile</button>
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
        $nowa = mysqli_real_escape_string($conn,$_POST['nowa']);
        $user_password = mysqli_real_escape_string($conn,$_POST['user_password']);
        $gambarlama = $_POST["gambarlama"];
        if ( $_FILES['gambar']['error'] === 4){
            $gambar = $gambarlama;
        }else {
            $gambar = editFotoProfil();
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
                    $sql = "UPDATE pengguna SET nama= '$nama', username = '$username', nim = '$nim' , nowa = '$nowa', gambar = '$gambar' WHERE iduser ='$id'";
                    if(mysqli_query($conn, $sql)){
                        $_POST['nama'] = $nama;
                        $_POST['username'] = $username;
                        $_POST['nim'] = $nim;
                        $_POST['nowa'] = $nowa;
                        $_POST['gambar'] = $gambar;
                        session_unset();
                        session_destroy();
                        echo "<script type='text/javascript'>alert('edit profil berhasil, silahkan login kembali!');
                             document.location.href = 'loginadmin.php'; </script>"; 
                    }else{
                        echo 'Error';
                    }
                }else {
                    $hash = password_hash($user_password, PASSWORD_DEFAULT);
                    $admin = $row['iduser'];
                    $sql2 = "UPDATE pengguna SET nama= '$nama', username = '$username', password = '$hash' , nim = '$nim' , nowa = '$nowa', gambar='$gambar' WHERE iduser ='$admin'";
                    if(mysqli_query($conn, $sql2)){
                        session_unset();
                        session_destroy();
                        echo "<script>alert('password berhasil diubah silahkan login kembali!');
                                document.location.href = 'loginadmin.php'; </script>";
                    }else{
                        echo'Error';
                    }

                }
            }
        }
    };
?>