<?php
include 'header.php';
include 'koneksi.php';
?>

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="m-0 row">
            <div class="col-sm-4">
                <div class="float-left page-header">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="float-right page-header">
                    <div class="page-title">
                        <ol class="text-right breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Forms</a></li>
                            <li class="active">Basic</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="content">
    <div class="animated fadeIn" align="center">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header">
                    <strong>Form</strong> Buku
                </div>
                <div class="card-body card-block">
                    <form action="proses_buku.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Add Foto</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="file-input" name="foto" class="form-control-file"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="" class=" form-control-label">Judul Buku</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="judul_buku" name="judul_buku" placeholder="" class="form-control" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="" class=" form-control-label">Pengarang</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="pengarang" name="pengarang" placeholder="" class="form-control" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="" class=" form-control-label">Penerbit</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="penerbit" name="penerbit" placeholder="" class="form-control" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="" class=" form-control-label">Thn Terbit</label></div>
                            <div class="col-12 col-md-9"><input type="date" id="thn_terbit" name="thn_terbit" placeholder="" class="form-control" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Deskripsi Buku</label></div>
                            <div class="col-12 col-md-9"><textarea name="deskripsi" id="textarea-input" rows="3" placeholder="Deskripsi..." class="form-control"></textarea></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="" class=" form-control-label">Kode Buku</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="kode_buku" name="kode_buku" placeholder="" class="form-control" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="" class="form-control-label">Kategori</label></div>
                            <div class="col-md-2 chosen-container chosen-container-single title=" style="width: 100%;">
                                <select name="id_kategori" data-placeholder="Choose a Country..." class="standardSelect" tabindex="1">
                                    <option value="">Pilih</option>
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT * FROM tb_kategori") or die(mysqli_error($koneksi));
                                    while ($data = mysqli_fetch_array($query)) {
                                        echo '<option value="' . $data['id'] . '">' . $data['kategori'] . '</option>';
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="" class=" form-control-label">Stok Buku</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="stok_buku" name="stok_buku" placeholder="" class="form-control" required></div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>

                    </form>
                    <button onclick="location.href='hasil_buku.php'" class="mt-3 btn btn-outline-secondary btn-sm"><i class="fa fa-mail-reply"></i>&nbsp; Back</button>

                </div>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>