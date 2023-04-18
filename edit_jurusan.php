<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM tb_jurusan where id = '$id'";
$data = mysqli_query($koneksi, $query);
$data_hasil = mysqli_fetch_assoc($data)
?>
<?php
include 'header.php';
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
                            <li><a href="index.php">Dashboard</a></li>
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
                    <strong>Form Edit</strong> Jurusan
                </div>
                <div class="card-body card-block">
                    <form action="proses_edit_jurusan.php" method="post" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="" class=" form-control-label">Jurusan</label></div>
                            <input type="hidden" name="id" value="<?php echo $data_hasil['id']; ?>">
                            <div class="col-12 col-md-9"><input type="text" id="jurusan" name="jurusan" value="<?php echo $data_hasil['jurusan']; ?>" placeholder="" class="form-control" required></div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                    </form>
                    <button onclick="location.href='hasil_jurusan.php'" class="btn btn-outline-secondary btn-sm mt-3"><i class="fa fa-mail-reply"></i>&nbsp; Back</button>

                </div>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>