<?php
include 'koneksi.php';

$id = $_POST['id'];
$judul_buku = $_POST['judul_buku'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$thn_terbit = $_POST['thn_terbit'];
$deskripsi = $_POST['deskripsi'];
$kode_buku = $_POST['kode_buku'];
$id_kategori = $_POST['id_kategori'];
$stok_buku = $_POST['stok_buku'];

$query = "UPDATE tb_buku set judul_buku = '$judul_buku',pengarang = '$pengarang', penerbit = '$penerbit',thn_terbit = '$thn_terbit', deskripsi = '$deskripsi', kode_buku = '$kode_buku', id_kategori = '$id_kategori', stok_buku = '$stok_buku' where id = '$id'";
mysqli_query($koneksi, $query);
header("Location:hasil_buku.php");
