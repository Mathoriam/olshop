<?php

    include_once("function/koneksi.php");
    include_once("function/helper.php");

    $level = "customer";
    $nama = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $status = "on";

    unset($_POST['password']);
    unset($_POST['repassword']);
    $dataform = http_build_query($_POST);

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email ='$email'");

    if(empty($nama) || empty($email) || empty($phone) || empty($alamat) || empty($password) || empty($repassword)) {
      header("location: ".BASE_URL."index.php?page=register&notif=require&$dataform");
    }elseif ($password != $repassword) {
      header("location: ".BASE_URL."index.php?page=register&notif=password&$dataform");
    }elseif (mysqli_num_rows($query) == 1) {
      header("location: ".BASE_URL."index.php?page=register&notif=email&$dataform");
    } else {
      $password = md5($password);
      mysqli_query($koneksi, "INSERT INTO user (level, nama, email, alamat, phone, password, status)
                                      VALUES('$level', '$nama','$email','$alamat','$phone','$password','$status')");
      header("location: ".BASE_URL."index.php?page=login&notif=email&$dataform");
    }

 ?>
