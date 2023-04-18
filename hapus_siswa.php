<?php
include 'koneksi.php';

$id = $_GET['id'];
$query_hapus = "DELETE FROM tb_siswa where id = '$id'";
$query = mysqli_query($koneksi, $query_hapus);
if ($query) {
    header("Location:hasil_siswa.php");
}
