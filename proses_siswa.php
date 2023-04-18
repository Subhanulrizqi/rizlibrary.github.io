<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$no_anggota = $_POST['no_anggota'];
$kelas = $_POST['kelas'];
$alamat = $_POST['alamat'];
$tgl_lahir = $_POST['tgl_lahir'];
$id_jurusan = $_POST['id_jurusan'];

$query = "INSERT INTO tb_siswa set nama = '$nama',no_anggota = '$no_anggota', kelas = '$kelas', id_jurusan = '$id_jurusan',alamat = '$alamat', tgl_lahir = '$tgl_lahir'";
mysqli_query($koneksi, $query)
    or die("GAGAL");
header("Location:hasil_siswa.php");
