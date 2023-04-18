<?php
include 'koneksi.php';

$foto = $_FILES['foto']['name'];
$foto_tmp = $_FILES['foto']['tmp_name'];
$ekstensi = ['jpg', 'jpeg', 'png'];
$judul_buku = $_POST['judul_buku'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$thn_terbit = $_POST['thn_terbit'];
$deskripsi = $_POST['deskripsi'];
$kode_buku = $_POST['kode_buku'];
$id_kategori = $_POST['id_kategori'];
$stok_buku = $_POST['stok_buku'];

move_uploaded_file($foto_tmp, 'images/' . $foto);

$query = "INSERT INTO tb_buku set foto = '$foto', judul_buku = '$judul_buku',pengarang = '$pengarang',penerbit = '$penerbit',thn_terbit = '$thn_terbit', deskripsi = '$deskripsi', kode_buku = '$kode_buku', id_kategori = '$id_kategori', stok_buku = '$stok_buku' ";

mysqli_query($koneksi, $query)
    or die("GAGAL");
header("Location:hasil_buku.php");
