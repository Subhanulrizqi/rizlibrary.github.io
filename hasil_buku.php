<?php
include 'header.php';
?>

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="m-0 row">
            <div class="col-sm-4">
                <div class="float-left page-header">
                    <div class="page-title">
                        <h1>Data Buku</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content" style="width:100%;overflow-x:auto;">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Buku</strong>
                        <strong class="float-right"><button class="mt-1 btn btn-outline-success btn-sm" onclick="location.href='buku.php'">Tambah</button></strong>
                        <div class="float-right form-inline">
                            <form class="search-form" method="post">
                                <input class="form-control mr-sm-2" type="text" name="cari" placeholder="Search ..." aria-label="Search">
                                <button type="submit" name="search" class="mr-3 btn btn-outline-secondary btn-sm"><i class="fa fa-search "></i>&nbsp; </button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Judul Buku</th>
                                    <th>Pengarang</th>
                                    <th>Penerbit</th>
                                    <th>Tahun Terbit</th>
                                    <th>Deskripsi Buku</th>
                                    <th>Kode Buku</th>
                                    <th>Kategori</th>
                                    <th>Stok Buku</th>
                                    <th>Edit</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <?php
                            include 'koneksi.php';
                            if (isset($_POST['search'])) {
                                $cari = $_POST['cari'];
                                $tampil = mysqli_query($koneksi, "SELECT tb.judul_buku,tb.kode_buku,tk.kategori,tb.id,tb.foto,tb.deskripsi,tb.stok_buku,tb.pengarang,tb.penerbit,tb.thn_terbit FROM tb_buku tb INNER JOIN tb_kategori tk ON tb.id_kategori = tk.id where kode_buku like '%$cari%' OR tk.kategori like '%$cari%' ");
                            } else {

                                $tampil = mysqli_query($koneksi, 'SELECT tb.judul_buku,tb.kode_buku,tk.kategori,tb.id,tb.foto,tb.deskripsi,tb.stok_buku,tb.pengarang,tb.penerbit,tb.thn_terbit FROM tb_buku tb INNER JOIN tb_kategori tk ON tb.id_kategori = tk.id');
                            }
                            $no = 1;
                            while ($data = mysqli_fetch_array($tampil)) { ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td class="avatar">
                                            <div class="round-img">
                                                <a href="#"><img class="rounded-circle" style="width: 50px; height: 50px;" src="images/<?php echo $data['foto']; ?>" alt=""></a>
                                            </div>
                                        </td>
                                        <td align="left"><?php echo $data['judul_buku']; ?></td>
                                        <td align="left"><?php echo $data['pengarang']; ?></td>
                                        <td align="left"><?php echo $data['penerbit']; ?></td>
                                        <td align="left"><?php echo $data['thn_terbit']; ?></td>
                                        <td align="left"><?php echo $data['deskripsi']; ?></td>
                                        <td align="left"><?php echo $data['kode_buku']; ?></td>
                                        <td align="left"><?php echo $data['kategori']; ?></td>
                                        <td align="left"><?php echo $data['stok_buku']; ?></td>
                                        <td><button class="btn btn-outline-primary btn-sm" onclick="location.href='edit_buku.php?id=<?php echo $data['id']; ?>'">Edit</button></td>
                                        <td><button class="btn btn-outline-danger btn-sm" onclick="location.href='hapus_buku.php?id=<?php echo $data['id']; ?>'">Hapus</button></td>
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