<?php
session_start();
require "function.php";

if(!isset($_SESSION["admin"])){
    header("Location:login.php");
    exit;
}
$id = $_GET["id"];

if(hapus1($id)>0){
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href ='daftarbrgadmin.php';
        </script>
    ";
}else{
    echo "
        <script>
            alert('data gagal dihapus!');
            document.location.href ='daftarbrgadmin.php';
        </script>
    ";
}
?>