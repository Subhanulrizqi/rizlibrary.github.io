<?php
include 'header.php';
?>
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="m-0 row">
            <div class="col-sm-4">
                <div class="float-left page-header">
                    <div class="page-title">
                        <h1>Category</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="float-right page-header">
                    <div class="page-title">
                        <ol class="text-right breadcrumb">
                            <li><a href="#">Category</a></li>
                            <li><a href="index.php">Dashboard</a></li>
                            <!-- <li class="active">Cards</li> -->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="right form-inline">
        <form class="mb-3 search-form" method="post">
            <input class="form-control mr-sm-2" type="text" name="cari" placeholder="Search ..." aria-label="Search">
            <button type="submit" name="search" class="mr-3 btn btn-outline-secondary btn-sm"><i class="fa fa-search "></i>&nbsp; </button>
        </form>
        <button onclick="location.href='sewa.php';" class="mb-3 btn btn-outline-success btn-sm"><i class="fa fa-magic"></i>&nbsp; Sewa buku</button>
    </div>
    <div class="animated fadeIn">
        <div class="row">
            <?php
            include 'koneksi.php';
            if (isset($_POST['search'])) {
                $cari = $_POST['cari'];
                $tampil = mysqli_query($koneksi, "SELECT tb.judul_buku,tb.kode_buku,tk.kategori,tb.id,tb.foto,tb.deskripsi,tb.stok_buku FROM tb_buku tb INNER JOIN tb_kategori tk ON tb.id_kategori = tk.id where judul_buku like '%$cari%'");
            } else {
                $tampil = mysqli_query($koneksi, 'SELECT tb.judul_buku,tb.kode_buku,tk.kategori,tb.id,tb.foto,tb.deskripsi,tb.stok_buku FROM tb_buku tb INNER JOIN tb_kategori tk ON tb.id_kategori = tk.id ');
            }
            $no = 1;
            while ($data = mysqli_fetch_array($tampil)) { ?>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" style="width: 380px; height: 190px;" src=" images/<?php echo $data['foto']; ?>">
                        <div class="card-body">
                            <h4 class="mb-3 card-title"><?php echo $data['kode_buku']; ?> - <?php echo $data['judul_buku']; ?></h4>
                            <p class="card-text"><?php echo $data['deskripsi']; ?></p>
                            <p class="badge badge-success">Stok Buku : <?php echo $data['stok_buku']; ?></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </div>
</div>
</div>
<?php
include 'footer.php';
?>