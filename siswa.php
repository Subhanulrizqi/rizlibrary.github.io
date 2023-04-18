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
                    <strong>Form</strong> Siswa
                </div>
                <div class="card-body card-block">
                    <form action="proses_siswa.php" method="post" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="" class=" form-control-label">Nama</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" placeholder="" class="form-control" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="" class=" form-control-label">No anggota</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="no_anggota" name="no_anggota" placeholder="" class="form-control" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="" class="form-control-label">Kelas</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="kelas" name="kelas" placeholder="" class="form-control" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="" class="form-control-label">Alamat</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="alamat" name="alamat" placeholder="" class="form-control" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="" class="form-control-label">Tanggal Lahir</label></div>
                            <div class="col-12 col-md-9"><input type="date" id="tgl_lahir" name="tgl_lahir" placeholder="" class="form-control" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="" class="form-control-label">Jurusan</label></div>
                            <div class="col-md-2 chosen-container chosen-container-single title=" style="width: 100%;">
                                <select name="id_jurusan" data-placeholder="Choose a Country..." class="standardSelect" tabindex="1">
                                    <option value="">Pilih</option>
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT * FROM tb_jurusan") or die(mysqli_error($koneksi));
                                    while ($data = mysqli_fetch_array($query)) {
                                        echo '<option value="' . $data['id'] . '">' . $data['jurusan'] . '</option>';
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                    </form>
                    <button onclick="location.href='hasil_siswa.php'" class="mt-3 btn btn-outline-secondary btn-sm"><i class="fa fa-mail-reply"></i>&nbsp; Back</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>