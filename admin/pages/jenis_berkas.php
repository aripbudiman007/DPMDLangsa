
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Jenis Berkas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Berkas</li>
                    <li class="breadcrumb-item active">Jenis Berkas</li>
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
            <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-add"><span class="fa fa-plus" ></span> Tambah Jenis Berkas</a><br><br>
            <table class="table table-bordered" id="data-table">
                <thead>
                    <tr>
                        <th width="7%">No</th>
                        <th>Jenis Berkas</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    $data_jenis_berkas = $berkas->get_all_jenis_berkas();
                    if(!empty($data_jenis_berkas)){
                        foreach($data_jenis_berkas as $data){
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['jenis_berkas'] ?></td>
                        <td>
                            <a href="" data-id="<?= $data['id'] ?>" data-jenis="<?= $data['jenis_berkas'] ?>" id="edit" data-toggle="modal" data-target="#modal-edit" class="edit btn btn-info btn-sm"><span class="fa fa-edit"></span> Edit</a>
                            <a href="#" onclick="if(confirm('Apakah Ingin Menghapus Data?')){location.href='?page=jenis_berkas&id_jenis=<?= $data['id'] ?>'}" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span> Hapus</a>
                        </td>
                    </tr>
                <?php } } ?>    
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
          <div class="modal-content">
          <form action="" method="POST">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Jenis Berkas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <div class="form-group">
                <input type="text" name="jenis_berkas" class="form-control" placeholder="Input Jenis Berkas Baru">
             </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
          <div class="modal-content">
          <form action="" method="POST">
            <div class="modal-header">
              <h4 class="modal-title">Edit Jenis Berkas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <div class="form-group">
                <input type="hidden" name="id" id="jenisId" class="form-control">
                <input type="text" name="jenis_berkas" id="jenisBerkas" class="form-control" placeholder="Input Jenis Berkas Baru">
             </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" name="update" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
</section>
<!-- /.content -->
<!-- jQuery -->
<script src="./assets/plugins/jquery/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.edit').on("click", function(){
        let id = $(this).data('id');
        let jenis = $(this).data('jenis');

        $('.modal-body #jenisId').val(id)
        $('.modal-body #jenisBerkas').val(jenis)
    });
});
</script>

<?php
if(isset($_POST['simpan'])){
    $berkas->set_jenis_berkas($_POST['jenis_berkas']);
    $berkas->simpan_jenis_berkas();
}

if(isset($_POST['update'])){
    $berkas->set_jenis_berkas($_POST['jenis_berkas']);
    $berkas->update_jenis_berkas($_POST['id']);
}

$hapus = isset($_GET['id_jenis']) ? $_GET['id_jenis'] : null;
if($hapus){
    $berkas->delete_jenis_berkas($_GET['id_jenis']);
}
?>