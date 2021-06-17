<?php
$nik = $_SESSION['nik'];
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
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
            <table class="table">
                <tr>
                    <td width="25%">NIK</td>
                    <td>: <strong><?= $penduduk->get_detail_penduduk($nik, "nik") ?></strong></td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>: <strong><?= $penduduk->get_detail_penduduk($nik, "nama_lengkap") ?></strong></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>: <strong><?= $penduduk->get_detail_penduduk($nik, "jenis_kelamin") ?></strong></td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>: <strong><?= $penduduk->get_detail_penduduk($nik, "tempat_lahir") ?></strong></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>: <strong><?= $penduduk->get_detail_penduduk($nik, "tanggal_lahir") ?></strong></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: <strong><?= $penduduk->get_detail_penduduk($nik, "alamat") ?></strong></td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->