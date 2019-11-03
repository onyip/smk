<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SMK N 1 Bukatja | Registration</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="#"><b>Registration</b></a>
    </div>

    <div class="register-box-body">
      <p class="login-box-msg">Register a new membership</p>
      <?=$this->session->flashdata('pesan') ?>

      <form action="<?=base_url('auth/validasi')?>" method="post">
        <div class="has-feedback">
          <input type="text" class="form-control" placeholder="Enter NIS" name="nis" value="<?= set_value('name')?>">
          <span class="form-control-feedback"></span>
          <small class="text-danger"><?= form_error('name') ?></small>
        </div>
        <div class="form-group row">
          <label class="btn btn-block">Enter your birthday</label>
          <div class="col-xs-3">
            <input type="text" class="form-control" placeholder="Day" name="d">
            <small class="text-info">ext : 01</small>
          </div> 
          <div class="col-xs-3">
            <input type="text" class="form-control" placeholder="Month" name="m">
            <small class="text-info">ext : 01</small>
          </div>
          <div class="col-xs-6">
            <input type="text" class="form-control" placeholder="Year" name="y">
            <small class="text-info">ext : 2000</small>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-8">

          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <label>Do you already have an account?</label><br>
      <a href="<?=base_url('auth')?>" class="text-center"> Click here to Login</a>
    </div>
    <!-- /.form-box -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery 3 -->
  <script src="<?=base_url()?>bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?=base_url()?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="<?=base_url()?>plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
</body>
</html>
