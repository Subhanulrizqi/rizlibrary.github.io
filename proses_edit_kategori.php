<?php
include 'koneksi.php';

$id = $_POST['id'];
$kategori = $_POST['kategori'];
$query = "UPDATE tb_kategori set kategori = '$kategori' where id = '$id'";
mysqli_query($koneksi, $query);
header("Location:hasil_kategori.php");
