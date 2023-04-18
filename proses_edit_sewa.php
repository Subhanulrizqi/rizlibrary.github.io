<?php
include 'koneksi.php';

$id = $_POST['id'];

$id_siswa = $_POST['id_siswa'];
$id_jurusan = $_POST['id_jurusan'];
$id_buku = $_POST['id_buku'];
$tanggal = $_POST['tanggal'];
$tgl_kembali = $_POST['tgl_kembali'];

$query = "UPDATE tb_sewa set id_siswa = '$id_siswa', id_jurusan = '$id_jurusan', id_buku = '$id_buku', tanggal = '$tanggal',tgl_kembali = '$tgl_kembali' where id = '$id'";
mysqli_query($koneksi, $query);
header("Location:hasil_sewa.php");
