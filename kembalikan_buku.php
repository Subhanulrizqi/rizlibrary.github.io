<?php
include 'koneksi.php';

$id = $_GET['id'];
$id_buku = $_GET['id_buku'];
$query2 = "SELECT * FROM tb_sewa where id = '$id'";
$data = mysqli_query($koneksi, $query2);
$data2 = mysqli_fetch_assoc($data);
$tanggal = $data2['tanggal'];
$tgl_kembali = $data2['tgl_kembali'];


$tanggal = date("Y-m-d");
if ($tanggal > $tgl_kembali) {
    $denda = "10000";
}
$query1 = "UPDATE tb_sewa set denda = '$denda',  sudah_kembali = 1 where id = '$id'";
mysqli_query($koneksi, $query1);


$query = "UPDATE tb_buku set stok_buku = stok_buku + 1  where id = '$id_buku'";
mysqli_query($koneksi, $query);
/* var_dump($query);
die;
 */
header("Location:hasil_sewa.php");
