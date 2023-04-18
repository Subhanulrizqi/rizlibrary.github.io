<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$alamat = $_POST['alamat'];
$tgl_lahir = $_POST['tgl_lahir'];
$id_jurusan = $_POST['id_jurusan'];

$query = "UPDATE tb_siswa set nama = '$nama', kelas = '$kelas',id_jurusan = '$id_jurusan',alamat = '$alamat',tgl_lahir = '$tgl_lahir' where id = '$id'";
mysqli_query($koneksi, $query);
header("Location:hasil_siswa.php");
