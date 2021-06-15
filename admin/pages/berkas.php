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
                        <option value="">Pilihan</option>
                        <?php
                            $data_jenis_berkas = $berkas->get_all_jenis_berkas();
                            if(!empty($data_jenis_berkas)){
                                foreach($data_jenis_berkas as $data){
                        ?>
                        <option value="<?= $data['id'] ?>"><?= $data['jenis_berkas'] ?></option>
                        <?php } } ?>
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
    case 'edit':

    $id = isset($_GET['id']) ? $_GET['id'] : null;
    
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Data</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=berkas">Berkas</a></li>
                    <li class="breadcrumb-item active">Edit Data</li>
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
            <h3 class="card-title">Edit Berkas</h3>
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
                    <input type="text" name="nama_berkas" class="form-control" value="<?= $berkas->edit_data_berkas($id, "nama_berkas") ?>">
                </div>
                <div class="form-group">
                    <label for="jenis_berkas">Jenis Berkas</label>
                    <select name="jenis_berkas" class="form-control">
                        <option value="<?= $berkas->edit_data_berkas($id, 'jenis_berkas')?>"><?= $berkas->edit_data_berkas($id, 'berkas_desc') ?></option>
                        <?php
                            $data_jenis_berkas = $berkas->get_all_jenis_berkas();
                            if(!empty($data_jenis_berkas)){
                                foreach($data_jenis_berkas as $data){
                        ?>
                        <option value="<?= $data['id'] ?>"><?= $data['jenis_berkas'] ?></option>
                        <?php } } ?>
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
    
        $berkas->update_data_berkas($id);
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
                    <li class="breadcrumb-item ">Berkas</li>
                    <li class="breadcrumb-item active">Data Berkas</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
<?php
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
            <table class="table table-bordered " id="data-table">
                <thead>
                    <tr>
                        <th width="7%">No</th>
                        <th>Nama Berkas</th>
                        <th>Jenis Berkas</th>
                        <th width="25%">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    $data_berkas = $berkas->get_all_berkas();
                    if(!empty($data_berkas)){
                        foreach($data_berkas as $data){
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['nama_berkas'] ?></td>
                        <td><?= $berkas->get_jenis_berkas_desc($data['jenis_berkas']) ?></td>
                        <td>
                            <a href="./uploads/<?= $data['berkas']?>" class="edit btn btn-warning btn-sm" target="_blank"><span class="fa fa-eye"></span> Preview</a>
                            <a href="?page=berkas&component=edit&id=<?= $data['id'] ?>" class="edit btn btn-info btn-sm"><span class="fa fa-edit"></span> Edit</a>
                            <a href="#" onclick="if(confirm('Apakah Ingin Menghapus Data?')){location.href='?page=berkas&id_berkas=<?= $data['id'] ?>'}" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span> Hapus</a>
                        </td>
                    </tr>
                <?php } } ?>    
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
<?php

$hapus = isset($_GET['id_berkas']) ? $_GET['id_berkas'] : null;
if($hapus){
    $berkas->delete_berkas($_GET['id_berkas']);
} 
    break;
}
?>