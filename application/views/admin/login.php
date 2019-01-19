<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="<?php echo base_url(); ?>assets/system/img/mm.JPG">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RK AAM</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">

  <style>
    @font-face{
      font-family: 'myFont';
      src: url('<?php echo base_url(); ?>assets/system/font/PTF76F.ttf')  format('truetype');
    }

    .title-project{
      font-family: 'myFont', Fallback, 'PTF76F.ttf';
      font-size:20px;
    }
  </style>

</head>
<body class="login-page" <?php echo 'style="background-image:url(' . base_url() . 'assets/system/img/bg3.png);"' ?>>
<div class="login-box">
  <div class="login-logo">
    <img src="<?php echo base_url(); ?>assets/system/img/mm.jpg" alt="" class="img-responsive center-block" style="width: 100px; height: 100px;">
  </div>

  <?php if(!empty($_SESSION['error_login'])){ ?>
    <div class="alert alert-danger" id="msg-login"><?php echo $this->session->flashdata('error_login'); ?></div>
  <?php } ?>

  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="login/auth" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="userid" class="form-control" placeholder="User ID" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-success btn-flat pull-right">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<div class="col-md-12">
  <div class="text-center title-project"><strong>RENCANA KUNJUNGAN AAM</strong></div>
  <div class="text-center">Copyright (c) 2019 PT.GLOBAL RETAILINDO PRATAMA (MINI MART), IT DEPARTMENT</div>
  <div class="text-center">All rights reserved</div>
</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
$(document).ready(function () {
  setTimeout(function () {
      $("#msg-login").hide('slow');
  }, 2000);
});
</script>

</body>
</html>
