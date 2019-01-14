<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
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
  /* .panel-heading {
    padding: 5px 15px;
  }

  .panel-footer {
    padding: 1px 15px;
    color: #A0A0A0;
  } */

  .profile-img {
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
  }

  .vertical-center {
    margin: 0 auto;
    position: absolute;
    top: 50%;
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
  }
  </style>

</head>
<body class="login-page" <?php echo 'style="background-image:url(' . base_url() . 'assets/system/img/bg3.png);"' ?>>

<div class="container vertical-center">
  <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-5">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong> Sign in to continue</strong>
        </div>
        <div class="panel-body">
          <form role="form" action="home" method="#">
            <fieldset>
              <div class="row">
                <div class="center-block">
                  <img class="profile-img"
                    src="<?php echo base_url(); ?>assets/system/img/photo.png" alt="">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                      </span> 
                      <input class="form-control" placeholder="Username" name="loginname" type="text" autofocus>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-lock"></i>
                      </span>
                      <input class="form-control" placeholder="Password" name="password" type="password" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-lg btn-success btn-block btn-flat" value="Sign in">
                  </div>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
