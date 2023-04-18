<?php
include 'koneksi.php';
$jurusan = $_POST['jurusan'];

$query = "INSERT INTO tb_jurusan set jurusan = '$jurusan'";
mysqli_query($koneksi, $query)
    or die("GAGAL");
header("Location:hasil_jurusan.php");
