<?php
require "function.php";

if(isset($_POST["Register"]) ) {

    if(registra($_POST) > 0 ) {
        echo "<script>
                alert('User Baru Berhasil Dibuat!');
            </script>";
        }
    } else {
    echo 'mysqli_error($conn)';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/bootstrap/css/LoginAdminstyle.css">
    <link rel="stylesheet" href="assets/bootstrap/css/landing_page.css">
</head>
<body>
    <header>
        <img src="img/ellipse_2.png" alt="missingcenter-logo" class="logo1" />
        <h1 class="logo">MISSING CENTER</h1>
    </header>
    <main class="container md-10">
        <?php
            include_once "kon.php";
            //skrip ini melakukan query INSERT yg menambah sebuah rekaman pada tabel pengguna.
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $arrayError = array();//inisialisasi array error
                
                //apakah nama telah dimasukkan
                if(empty($_POST['nama'])){
                    $arrayError[]='<script type="text/javascript">alert("nama tidak boleh kosong");</script> ';
                }
                else{$nama = trim($_POST['nama']);
                }

                //apakah alamat email telah dimasukkan
                if(empty($_POST['username'])){
                    $arrayError[]='<script type="text/javascript">alert("username barang tidak boleh kosong");</script> ';
                }
                //apakah kedua password cocok
                if(!empty($_POST['password1'])){
                    if($_POST['password1'] != $_POST['password']){
                        $arrayError[]='<script type="text/javascript">alert("Password yang anda masukkan tidak sama");</script> ';
                    }
                    else{$password = trim($_POST['password']);
                    }
                }
                else{$arrayError[]='<script type="text/javascript">alert("password tidak boleh kosong");</script>' ;
                }
                
                //jika sebua data terisi
                if(empty($arrayError)){
                    require('mysqli_connect.php');//koneksi ke database.
                    //melakukan query
                    $cek_data=mysqli_query($dbkoneksi, "SELECT * FROM pengguna WHERE
                    username ='".$_POST['username']."'  ");
                    if (mysqli_num_rows($cek_data) > 1){
                        $q = "INSERT INTO pengguna (username,password,level,nama)
                        VALUES('$username','$password','user','$nama')";
                        $hasil = @mysqli_query ($dbkoneksi, $q);//menjalankan query
                        if($hasil){
                            //jika berhasil
                            echo'<script type="text/javascript">alert("Data berhasil dimasukkan");</script> ';
                            header("Location:sadata.php");
                        }
                    }else{
                        echo'<script type="text/javascript">alert("Username Telah Digunakan");</script> ';
                    }
                    mysqli_close($dbkoneksi);//menutup koneksi
                }
                else{
                    foreach ($arrayError as $psn) {//menampilkan error
                        echo"<h11>$psn</h11><br>\n";
                    }
                    echo '</p><h2>Silahkan coba lagi.</h2>';
                }
            }
        ?>					 
        <div class="row justify-content-center">
            <div class="col-md-12 box">
                <h2 class="text-center">REGISTER</h2>
                <form action="register.php" method="post">
                    <div class="mb-4">
                        <input class="form-control" id="nama"  for="nama" 
                        placeholder="Nama Lengkap" name="nama" type="text" required autofocus
                        value="<?php if (isset($_POST['nama'])) echo $_POST['nama']; ?>"/>
                    </div>
                    <div class="mb-4">
                    <input class="form-control" id="username" for="username" 
                        placeholder="Username" name="username" type="text" required autofocus
                        value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"/>
                    </div>
                    <div class="mb-4">
                        <input class="form-control" id="password" for="password" 
                        placeholder="Password" name="password" type="password" required autofocus
                        value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"/>
                    </div>
                    <div class="mb-4">
                        <input class="form-control" id="password1"  for="password1" 
                        placeholder="Konfirmasi Password" name="password1" type="password" required autofocus
                        value="<?php if (isset($_POST['password1'])) echo $_POST['password1']; ?>"/>
                    </div>
                    <div class="mb-4">
                        <input id="submit"  class="primary fit"
                        type="submit" name="Submit" value="Submit"/>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="index.html">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

