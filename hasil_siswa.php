<?php
include 'header.php';
?>

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="m-0 row">
            <div class="col-sm-4">
                <div class="float-left page-header">
                    <div class="page-title">
                        <h1>Data Siswa</h1>
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
                        <strong class="card-title">Data Siswa</strong>
                        <strong class="float-right"><button class="mt-1 btn btn-outline-success btn-sm" onclick="location.href='siswa.php'">Tambah</button></strong>
                        <div class="float-right form-inline">
                            <form class="search-form" method="post">
                                <input class="form-control mr-sm-2" type="text" name="cari" placeholder="Search ..." aria-label="Search">
                                <button type="submit" name="search" class="mr-3 btn btn-outline-secondary btn-sm"><i class="fa fa-search"></i>&nbsp; Cari</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">No Anggota</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Tgl Lahir</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Hapus</th>
                                </tr>
                            </thead>
                            <?php
                            include 'koneksi.php';
                            if (isset($_POST['search'])) {
                                $cari = $_POST['cari'];
                                $tampil = mysqli_query($koneksi, "SELECT ts.nama,ts.kelas,tj.jurusan,ts.id,ts.alamat,ts.tgl_lahir,ts.no_anggota FROM tb_siswa ts INNER JOIN tb_jurusan tj ON ts.id_jurusan = tj.id where nama like '%$cari%'");
                            } else {
                                $tampil = mysqli_query($koneksi, 'SELECT ts.nama,ts.kelas,tj.jurusan,ts.id,ts.alamat,ts.tgl_lahir,ts.no_anggota FROM tb_siswa ts INNER JOIN tb_jurusan tj ON ts.id_jurusan = tj.id');
                            }
                            $no = 1;
                            while ($data = mysqli_fetch_array($tampil)) { ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td align="left"><?php echo $data['nama']; ?></td>
                                        <td align="left"><?php echo $data['no_anggota']; ?></td>
                                        <td align="left"><?php echo $data['kelas']; ?></td>
                                        <td align="left"><?php echo $data['alamat']; ?></td>
                                        <td align="left"><?php echo $data['tgl_lahir']; ?></td>
                                        <td align="left"><?php echo $data['jurusan']; ?></td>
                                        <td><button class="btn btn-outline-primary btn-sm" onclick="location.href='edit_siswa.php?id=<?php echo $data['id']; ?>'">Edit</button></td>
                                        <td><button class="btn btn-outline-danger btn-sm" onclick="location.href='hapus_siswa.php?id=<?php echo $data['id']; ?>'">Hapus</button></td>
                                    </tr>
                                <?php
                            }
                                ?>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>