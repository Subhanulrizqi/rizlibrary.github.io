<?php
include 'koneksi.php';
$kategori = $_POST['kategori'];
$query = "INSERT INTO tb_kategori set kategori = '$kategori'";
mysqli_query($koneksi, $query)
    or die("GAGAL");
header("Location:hasil_kategori.php");
