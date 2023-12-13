<?php

//yang baru
session_start();

if (isset($_SESSION["user"])) {
  header("Location: user.php");
  exit;
} else if (isset($_SESSION["admin"])) {
  header("Location: admin.php");
  exit;
}

include_once 'mysqli-connect.php';

if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($conn, $_POST["username"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);

  // **Check usermhs table**
  $sql1 = "SELECT * FROM usermhs WHERE username = '$username'";
  $result1 = mysqli_query($conn, $sql1);

  if (mysqli_num_rows($result1) == 1) {
    $row = mysqli_fetch_assoc($result1);
    if (password_verify($password, $row["password"])) {
      $_SESSION["user"] = true;
      header("Location: user.php");
      exit;
    }
  }

  // **Check pengguna table**
  $sql2 = "SELECT * FROM pengguna WHERE username = '$username'";
  $result2 = mysqli_query($conn, $sql2);

  if (mysqli_num_rows($result2) == 1) {
    $row = mysqli_fetch_assoc($result2);
    if (password_verify($password, $row["password"])) {
      $_SESSION["admin"] = true;
      header("Location: admin.php");
      exit;
    }
  }

  echo "<script>alert('Username dan password tidak ditemukan');</script>";
}
  //yang baru
  //yang lama
  session_start();
  if (isset($_SESSION["user"])){
      header("Location: user.php");
      exit;
  }
  elseif(isset($_SESSION["admin"])){
      header("Location: admin.php");
      exit;
  }
  include_once 'mysqli-connect.php';
  if (isset($_POST['login'])){
      $username = $_POST["username"];
      $password = $_POST["password"];

      $result1 = mysqli_query($conn,"SELECT * FROM usermhs WHERE
      username = '$username'");
      $result2 = mysqli_query($conn,"SELECT * FROM pengguna WHERE
      username = '$username'");

      if(mysqli_num_rows($result1) == 1){
          $row = mysqli_fetch_assoc($result1);
          $_SESSION["user"] =  true;
          header("Location: user.php");
          exit;
      }elseif(mysqli_num_rows($result2) == 1){
          $row1 = mysqli_fetch_assoc($result2);
          $_SESSION["admin"] =  true;
          header("Location: admin.php");
          exit;
      }elseif (mysqli_num_rows($result1) == 0 && mysqli_num_rows($result2) == 0){
          echo "<script>
                  alert('Username dan password tidak ditemukan');
              </script>";
      }
  
  }
  //yang lama
?>
