-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 13 Apr 2023 pada 13.36
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int(11) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `judul_buku` varchar(250) NOT NULL,
  `pengarang` varchar(250) NOT NULL,
  `penerbit` varchar(250) NOT NULL,
  `thn_terbit` varchar(250) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `kode_buku` varchar(50) NOT NULL,
  `id_kategori` int(50) NOT NULL,
  `stok_buku` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `foto`, `judul_buku`, `pengarang`, `penerbit`, `thn_terbit`, `deskripsi`, `kode_buku`, `id_kategori`, `stok_buku`) VALUES
(26, '34343_product_1643904270 (1).jpg', 'MTK', 'John cena1', 'MTK1', '2023-04-04', '', '27', 7, '28'),
(27, 'cover3.jpg', 'PBO', 'iken', 'amik', '2023-04-07', 'Deskripsi buku PBO', '1', 9, '1'),
(29, 'cover1 (1).jpg', 'Filsafat', 'John cena', 'amik', '2023-04-21', 'askdasd', '2', 7, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id`, `jurusan`) VALUES
(6, 'RPL'),
(7, 'TOI'),
(8, 'TBSM'),
(9, 'TKR'),
(10, 'Tata Boga'),
(11, 'Kecantikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `kategori`) VALUES
(5, 'Komik'),
(6, 'Dongeng'),
(7, 'Sosial'),
(8, 'Kedinasan'),
(9, 'Buku Belajar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'user', '123', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sewa`
--

CREATE TABLE `tb_sewa` (
  `id` int(11) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `id_siswa` int(50) NOT NULL,
  `id_jurusan` int(50) NOT NULL,
  `kode_buku` int(50) NOT NULL,
  `jumlah_buku` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `tgl_kembali` varchar(50) NOT NULL,
  `sudah_kembali` int(11) DEFAULT NULL,
  `denda` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sewa`
--

INSERT INTO `tb_sewa` (`id`, `foto`, `id_siswa`, `id_jurusan`, `kode_buku`, `jumlah_buku`, `tanggal`, `tgl_kembali`, `sudah_kembali`, `denda`) VALUES
(33, '', 11, 0, 9, 0, '2023-04-13', '', NULL, ''),
(35, '', 11, 8, 9, 0, '2023-04-18', '', NULL, ''),
(36, '', 10, 8, 9, 0, '2023-04-02', '', NULL, ''),
(37, '', 9, 5, 16, 0, '2023-04-26', '', NULL, ''),
(38, '', 9, 6, 17, 0, '2023-04-12', '', NULL, ''),
(43, '', 8, 5, 0, 0, '2023-04-27', '', NULL, ''),
(44, '', 9, 0, 0, 0, '2023-04-10', '', NULL, ''),
(47, '', 8, 5, 0, 0, '2023-04-12', '', NULL, ''),
(48, '', 8, 5, 0, 0, '2023-04-11', '', NULL, ''),
(63, '', 11, 6, 23, 0, '2023-04-08', '', 1, ''),
(66, '', 8, 6, 23, 0, '2023-04-23', '2023-04-24', 1, ''),
(67, '', 14, 6, 25, 0, '2023-04-02', '2023-04-18', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_anggota` int(20) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `id_jurusan` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id`, `nama`, `no_anggota`, `kelas`, `alamat`, `tgl_lahir`, `id_jurusan`) VALUES
(8, 'Fira', 0, 'XII', '', '', 0),
(9, 'FIRA', 0, 'XII', '', '', 0),
(10, '8', 0, '5', '', '', 0),
(16, 'Kaped', 2, 'XII', 'Malang', '2023-04-24', 8);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_sewa`
--
ALTER TABLE `tb_sewa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_sewa`
--
ALTER TABLE `tb_sewa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
