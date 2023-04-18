<?php
include 'header.php';
?>


<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="m-0 row">
            <div class="col-sm-4">
                <div class="float-left page-header">
                    <div class="page-title">
                        <h1>Data Sewa</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Sewa</strong>
                        <strong class="float-right"><button class="mt-1 btn btn-outline-success btn-sm" onclick="location.href='sewa.php'">Add</button></strong>
                        <div class="float-right form-inline">
                            <form class="search-form" method="post">
                                <input class="form-control mr-sm-2" type="text" name="cari" placeholder="Search ..." aria-label="Search">
                                <button type="submit" name="search" class="mr-3 btn btn-outline-secondary btn-sm"><i class="fa fa-search"></i>&nbsp; Cari</button>
                            </form>
                        </div>
                    </div>
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="row">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Judul Buku</th>
                                    <th scope="col">Kode Buku</th>
                                    <th scope="col">Tgl Pinjam</th>
                                    <th scope="col">Tgl harus Kembali</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Hapus</th>
                                    <th scope="col">Kembalikan buku</th>
                                    <th scope="col">Denda</th>
                                </tr>
                            </thead>
                            <?php
                            include 'koneksi.php';
                            $no = 1;
                            if (isset($_POST['search'])) {
                                $cari = $_POST['cari'];
                                $tampil = mysqli_query($koneksi, "SELECT ts.nama,ts.kelas,tj.jurusan,tb.judul_buku,tb.kode_buku,ta.tanggal,ta.id,ta.id_buku,ta.sudah_kembali,ta.tgl_kembali,ta.denda  FROM tb_sewa ta 
                            INNER JOIN tb_buku tb ON ta.id_buku = tb.id
                            INNER JOIN tb_siswa ts ON ta.nama = ts.id
                            INNER JOIN tb_jurusan tj ON ta.jurusan = tj.id where ts.nama like '%$cari%' OR ta.kelas like '%$cari%' OR ta.jurusan like '%$cari%' ");
                            } else {

                                $tampil = mysqli_query($koneksi, "SELECT tb.judul_buku,tb.kode_buku,ts.nama,ts.kelas,tj.jurusan,ta.tanggal,ta.id,ta.id_buku,ta.sudah_kembali,ta.tgl_kembali,ta.denda FROM tb_sewa ta 
                            INNER JOIN tb_buku tb ON ta.id_buku = tb.id
                            INNER JOIN tb_siswa ts ON ta.id_siswa = ts.id
                            INNER JOIN tb_jurusan tj ON ta.id_jurusan = tj.id");
                            }
                            /*   $tampil = mysqli_query($koneksi, 'SELECT tb.judul_buku,ts.nama,ts.kelas,tj.jurusan,ta.tanggal,ta.id FROM tb_sewa ta 
                            INNER JOIN tb_buku tb ON ta.id_buku = tb.id
                            INNER JOIN tb_siswa ts ON ta.nama = ts.id
                            INNER JOIN tb_jurusan tj ON ta.jurusan = tj.id'); */
                            while ($data = mysqli_fetch_array($tampil)) { ?>
                                <tbody>
                                    <tr>
                                        <td class="serial"><?php echo $no++; ?></td>
                                        <td align="left"><?php echo $data['nama']; ?></td>
                                        <td align="left"><?php echo $data['kelas']; ?></td>
                                        <td align="left"> <?php echo $data['jurusan']; ?></td>
                                        <td align="left"><?php echo $data['judul_buku']; ?></td>
                                        <td align="left"><?php echo $data['kode_buku']; ?></td>
                                        <td align=""><?php echo $data['tanggal']; ?></td>
                                        <td align=""><?php echo $data['tgl_kembali']; ?></td>
                                        <td><button class="btn btn-outline-primary btn-sm" onclick="location.href='edit_sewa.php?id=<?php echo $data['id']; ?>'">Edit</button></td>
                                        <td><button class="btn btn-outline-danger btn-sm" onclick="location.href='hapus_sewa.php?id=<?php echo $data['id']; ?>'">Hapus</button></td>
                                        <?php if ($data['sudah_kembali'] == 0) { ?>
                                            <td><button class="btn btn-outline-success btn-sm" onclick="location.href='kembalikan_buku.php?id=<?php echo $data['id']; ?>&id_buku=<?php echo $data['id_buku']; ?>'">kembalikan Buku</button></td>
                                        <?php } else { ?>
                                            <td>
                                                <p>Sudah Dikembalikan</p>
                                            </td>
                                        <?php } ?>
                                        <td align=""><?php echo $data['denda']; ?></td>
                                    </tr>
                                <?php
                            }
                                ?>
                                </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                </div>
                <button class="btn btn-outline-secondary btn-sm" onClick="window.print();">Cetak</button>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>