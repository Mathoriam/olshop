<?php
require_once "../../function/koneksi.php";
require_once "../../function/helper.php";


    $kategori = $_POST['kategori'];
    $status = $_POST['status'];
    $button = $_POST['button'];

    mysqli_query($koneksi, "INSERT INTO kategori (kategori, status) VALUES ('$kategori', '$status')");

    //var_dump("INSERT INTO kategori ('kategori','status') values ('$kategori', '$status')");die;

    header("location: ".BASE_URL."index.php?page=my_profile&module=kategori&action=list");
?>    