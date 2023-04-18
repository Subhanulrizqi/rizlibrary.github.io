<?php
include 'koneksi.php';

$id = $_POST['id'];
$jurusan = $_POST['jurusan'];

$query = "UPDATE tb_jurusan set jurusan = '$jurusan' where id = '$id'";
mysqli_query($koneksi, $query);
header("Location:hasil_jurusan.php");
