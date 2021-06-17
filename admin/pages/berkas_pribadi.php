<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Berkas Pribadi</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
<?php
    $nik= $_SESSION['nik'];
    $msg = isset($_GET['msg']) ? $_GET['msg'] : null;


    if($msg == "berhasil"){
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php }elseif($msg == "gagal") { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Gagal!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Your Profile</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group col-md-10">
                    <label for="">KTP</label>
                    <input type="hidden" name="jenis_berkas" value="1" class="form-control">
                    <input type="file" name="ktp" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">
                        <?php
                            if($penduduk->get_status_berkas($_SESSION['nik'],'1') === "ada"){
                                echo "<span style='color:green'>* Berkas Sudah Lengkap</span>";
                            }elseif($penduduk->get_status_berkas($_SESSION['nik'],'1') === "tidak ada"){
                                echo "<span style='color:red'>* Bekas Belum Lengkap</span>";
                            }
                        ?>
                    </label>
                </div>
                <div class="form-group col-md-2">
                    <input type="submit" name="upload_ktp" value="Upload" class="btn btn-primary">
                </div>
            </form>

            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group col-md-10">
                    <label for="">Kartu Keluarga</label>
                    <input type="hidden" name="jenis_berkas" value="2" class="form-control">
                    <input type="file" name="kk" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">
                        <?php
                            if($penduduk->get_status_berkas($_SESSION['nik'],'2') === "ada"){
                                echo "<span style='color:green'>* Berkas Sudah Lengkap</span>";
                            }elseif($penduduk->get_status_berkas($_SESSION['nik'],'2') === "tidak ada"){
                                echo "<span style='color:red'>* Bekas Belum Lengkap</span>";
                            }
                        ?>
                    </label>
                </div>
                <div class="form-group col-md-2">
                    <input type="submit" name="upload_kk" value="Upload" class="btn btn-primary">
                </div>
            </form>

            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group col-md-10">
                    <label for="">Akta Kelahiran</label>
                    <input type="hidden" name="jenis_berkas" value="3" class="form-control">
                    <input type="file" name="akte" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">
                        <?php
                            if($penduduk->get_status_berkas($_SESSION['nik'],'3') === "ada"){
                                echo "<span style='color:green'>* Berkas Sudah Lengkap</span>";
                            }elseif($penduduk->get_status_berkas($_SESSION['nik'],'3') === "tidak ada"){
                                echo "<span style='color:red'>* Bekas Belum Lengkap</span>";
                            }
                        ?>
                    </label>
                </div>
                <div class="form-group col-md-2">
                    <input type="submit" name="upload_akte" value="Upload" class="btn btn-primary">
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
<?php
if(isset($_POST['upload_ktp'])){
    $penduduk->set_nik($_SESSION['nik']);
    $penduduk->set_jenis_berkas($_POST['jenis_berkas']);

    $penduduk->upload_ktp();
}

if(isset($_POST['upload_kk'])){
    $penduduk->set_nik($_SESSION['nik']);
    $penduduk->set_jenis_berkas($_POST['jenis_berkas']);

    $penduduk->upload_kk();
}

if(isset($_POST['upload_akte'])){
    $penduduk->set_nik($_SESSION['nik']);
    $penduduk->set_jenis_berkas($_POST['jenis_berkas']);

    $penduduk->upload_akte();
}
?>