<?php
include 'koneksi.php';

$id_siswa = $_POST['id_siswa'];
$id_jurusan = $_POST['id_jurusan'];
$id_buku = $_POST['id_buku'];
$tanggal = $_POST['tanggal'];
$tgl_kembali = $_POST['tgl_kembali'];

$query_ambil_buku = "SELECT * FROM tb_buku where id = '$id_buku'";
$data = mysqli_query($koneksi, $query_ambil_buku);
$data1 = mysqli_fetch_array($data);
$stok = $data1['stok_buku'];
if ($stok == 0) {
    echo "Stok Buku Habis!";
    die;
    // Validasi = pencegahan
}

$query1 = "UPDATE tb_buku set stok_buku = stok_buku - 1  where id = '$id_buku'";
mysqli_query($koneksi, $query1);

$query2 = "INSERT INTO tb_sewa set   id_siswa = '$id_siswa', id_jurusan = '$id_jurusan', id_buku = '$id_buku',  tanggal = '$tanggal',tgl_kembali = '$tgl_kembali', sudah_kembali = 0 ";
mysqli_query($koneksi, $query2)
    or die("GAGAL");
header("Location:hasil_sewa.php");
