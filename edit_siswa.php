<?php
include 'header.php';
include 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM tb_siswa where id = $id";
$data = mysqli_query($koneksi, $query);
$data_hasil = mysqli_fetch_assoc($data);
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
                    <strong>Form Edit</strong> Siswa
                </div>
                <div class="card-body card-block">
                    <form action="proses_edit_siswa.php" method="post" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="" class=" form-control-label">Nama</label></div>
                            <input type="hidden" name="id" value="<?php echo $data_hasil['id']; ?>">
                            <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" value="<?php echo $data_hasil['nama']; ?>" placeholder="" class="form-control" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="" class="form-control-label">Kelas</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="kelas" name="kelas" value="<?php echo $data_hasil['kelas']; ?>" placeholder="" class="form-control" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="" class="form-control-label">Alamat</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="alamat" name="alamat" value="<?php echo $data_hasil['alamat']; ?>" placeholder="" class="form-control" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="" class="form-control-label">Tanggal Lahir</label></div>
                            <div class="col-12 col-md-9"><input type="date" id="tgl_lahir" name="tgl_lahir" value="<?php echo $data_hasil['tgl_lahir']; ?>" placeholder="" class="form-control" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="" class="form-control-label">Jurusan</div>
                            <div class="col-md-2 chosen-container chosen-container-single title=" style="width: 100%;">
                                <select name="id_jurusan" value="<?php echo $data_hasil['id']; ?>" data-placeholder="Choose a Country..." class="standardSelect" tabindex="1">
                                    <option value="">Pilih</option>
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT * FROM tb_jurusan") or die(mysqli_error($koneksi));
                                    while ($data = mysqli_fetch_array($query)) {
                                        $tampil =  '';
                                        if ($data_hasil['id_jurusan'] == $data['id']) {
                                            $tampil = 'selected';
                                        }
                                        echo '<option ' . $tampil . '   value="' . $data['id'] . '">' . $data['jurusan'] . '</option>';
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