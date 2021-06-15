<?php
$component = isset($_GET['component']) ? $_GET['component'] : null;
switch($component){
    case 'tambah' :
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Data</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=berkas">Berkas</a></li>
                    <li class="breadcrumb-item active">Tambah Data</li>
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
            <h3 class="card-title">Form Input Berkas</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_berkas">Nama Berkas</label>
                    <input type="text" name="nama_berkas" class="form-control" placeholder="Nama Berkas">
                </div>
                <div class="form-group">
                    <label for="jenis_berkas">Jenis Berkas</label>
                    <select name="jenis_berkas" class="form-control">
                        <<option value="1">Jenis 1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="berkas">Berkas</label>
                    <input type="file" name="berkas" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" name="simpan_berkas" class="btn btn-primary">
                        <span class="fa fa-save"></span> Simpan
                    </button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->

<?php
if(isset($_POST['simpan_berkas'])){
    $berkas->set_nama_berkas($_POST['nama_berkas']);
    $berkas->set_jenis_berkas($_POST['jenis_berkas']);

    $berkas->simpan_berkas();
}
    
    break;
    default:
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Berkas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Berkas</li>
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
            <h3 class="card-title">Data Berkas</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <a href="?page=berkas&component=tambah" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> Tambah Berkas Baru</a><br><br>
            <table class="table table-borderd">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Berkas</th>
                        <th>Jenis Berkas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                    </tr>    
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
<?php 
    break;
}
?>