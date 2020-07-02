<?php
// koneksi databse
include_once("config.php");

// mendapat kan id
$id = $_GET['id'];

// menghapus user 
$result = mysqli_query($mysqli, "DELETE FROM produk WHERE id=$id");

// setelah menghapus kembali ke home
header("Location:index.php");
?>