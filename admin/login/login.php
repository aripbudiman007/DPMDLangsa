<?php
    include_once("../model/class_login.php");

    $log = new Login();

    if(isset($_POST['login'])){
        $log->set_username($_POST['username']);
        $log->set_password(md5($_POST['password']));

        $cek = $log->cek_login();

        if($cek == 0){ ?>
            <script type="text/javascript">
                alert('Belum Terdaftar');
            </script>
         <?php } else { 
             if(($log->get_username() == $log->get_login("username")) AND ($log->get_password() == $log->get_login("password"))){
                session_start(); 

                $_SESSION['username'] = $log->get_login("username");
                $_SESSION['password'] = $log->get_login("password");
                $_SESSION['level'] = $log->get_login("level");
                $_SESSION['nik'] = $log->get_login("nik");
                header("location:./../");
            } else { ?>
                <script type="text/javascript">
                alert('Username / Password Salah')
                </script>
            <?php } 
        } 
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DPMG Kota Langsa | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
<?php
    $status = isset($_GET['status']) ? $_GET['status'] : null;
    $msg = isset($_GET['msg']) ? $_GET['msg'] : null;

    if($status == "success"){
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?= $msg ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php }elseif($status == "failed") { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong><?= $msg ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?> 
  <div class="login-logo">
    <a href="">Administrations</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">DPMG Kota Langsa</p>

      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <div class="col-6">
            <a href="register.php" class="btn btn-danger" style="width:100%">Register</a>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>

</body>
</html>
