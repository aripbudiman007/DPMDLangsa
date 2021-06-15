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
                    <li class="breadcrumb-item"><a href="?page=berkas">Penduduk</a></li>
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
            <h3 class="card-title">Form Input Penduduk</h3>
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
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" class="form-control" placeholder="NIK">
                </div>
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="">Pilihan</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" type="text" cols="30" rows="2" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value="">Pilihan</option>
                        <option value="Hidup">Hidup</option>
                        <option value="Meninggal">Meninggal</option>
                        <option value="Pindah">Pindah</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" name="simpan_penduduk" class="btn btn-primary">
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
if(isset($_POST['simpan_penduduk'])){
    $penduduk->set_nik($_POST['nik']);
    $penduduk->set_nama_lengkap($_POST['nama_lengkap']);
    $penduduk->set_jenis_kelamin($_POST['jenis_kelamin']);
    $penduduk->set_tempat_lahir($_POST['tempat_lahir']);
    $penduduk->set_tanggal_lahir(date('Y-m-d',strtotime($_POST['tanggal_lahir'])));
    $penduduk->set_alamat($_POST['alamat']);
    $penduduk->set_status($_POST['status']);

    $penduduk->insert_data_penduduk();
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
                    <li class="breadcrumb-item"><a href="?page=berkas">Penduduk</a></li>
                    <li class="breadcrumb-item active">Edit Data Penduduk</li>
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
            <h3 class="card-title">Edit Penduduk</h3>
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
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" class="form-control" value="<?= $penduduk->edit_data_penduduk($id, "nik") ?>">
                </div>
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" value="<?= $penduduk->edit_data_penduduk($id, "nama_lengkap") ?>">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="<?= $penduduk->edit_data_penduduk($id, "jenis_kelamin") ?>" selected><?= $penduduk->edit_data_penduduk($id, "jenis_kelamin") ?></option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="<?= $penduduk->edit_data_penduduk($id, "tempat_lahir") ?>">
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="<?= $penduduk->edit_data_penduduk($id, "tanggal_lahir") ?>">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" type="text" cols="30" rows="2" class="form-control"><?= $penduduk->edit_data_penduduk($id, "alamat") ?></textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                    <option value="<?= $penduduk->edit_data_penduduk($id, "status") ?>" selected><?= $penduduk->edit_data_penduduk($id, "status") ?></option>
                        <option value="Hidup">Hidup</option>
                        <option value="Meninggal">Meninggal</option>
                        <option value="Pindah">Pindah</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" name="update_penduduk" class="btn btn-primary">
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
    if(isset($_POST['update_penduduk'])){
        $penduduk->set_nik($_POST['nik']);
        $penduduk->set_nama_lengkap($_POST['nama_lengkap']);
        $penduduk->set_jenis_kelamin($_POST['jenis_kelamin']);
        $penduduk->set_tempat_lahir($_POST['tempat_lahir']);
        $penduduk->set_tanggal_lahir(date('Y-m-d',strtotime($_POST['tanggal_lahir'])));
        $penduduk->set_alamat($_POST['alamat']);
        $penduduk->set_status($_POST['status']);
    
        $penduduk->update_data_penduduk($id);
    }

    break;
    default:
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Penduduk</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item ">Penduduk</li>
                    <li class="breadcrumb-item active">Data Penduduk</li>
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
            <h3 class="card-title">Data Penduduk</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <a href="?page=penduduk&component=tambah" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> Tambah Penduduk</a><br><br>
            <table class="table table-bordered " id="data-table">
                <thead>
                    <tr>
                        <th width="7%">No</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th width="25%">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    $data_penduduk = $penduduk->get_data_penduduk();
                    if(!empty($data_penduduk)){
                        foreach($data_penduduk as $data){
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['nik'] ?></td>
                        <td><?= $data['nama_lengkap'] ?></td>
                        <td><?= $data['jenis_kelamin'] ?></td>
                        <td><?= $data['tempat_lahir'] ?></td>
                        <td><?= $data['tanggal_lahir'] ?></td>
                        <td><?= $data['alamat'] ?></td>
                        <td><?= $data['status'] ?></td>
                        <td>
                            <a href="./uploads/<?= $data['berkas']?>" class="edit btn btn-warning btn-sm" target="_blank"><span class="fa fa-eye"></span> Detail</a>
                            <a href="?page=penduduk&component=edit&id=<?= $data['id'] ?>" class="edit btn btn-info btn-sm"><span class="fa fa-edit"></span> Edit</a>
                            <a href="#" onclick="if(confirm('Apakah Ingin Menghapus Data?')){location.href='?page=penduduk&id_penduduk=<?= $data['id'] ?>'}" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span> Hapus</a>
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

$hapus = isset($_GET['id_penduduk']) ? $_GET['id_penduduk'] : null;
if($hapus){
    $penduduk->delete_data_penduduk($_GET['id_penduduk']);
} 
    break;
}
?>