<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="<?php echo base_url(); ?>assets/system/img/mm.JPG">
	<title>Login Checklist</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/system/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/system/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/system/css/checklist.css">
    
</head>

<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(<?php echo base_url(); ?>assets/system/img/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
                </div>
                
                <?php if(!empty($_SESSION['error_login'])){ ?>
                    <div class="alert alert-danger" id="msg-login"><?php echo $this->session->flashdata('error_login'); ?></div>
                <?php } ?>

				<form class="login100-form validate-form" action="../UserController/authChecklist" method="POST">
					<div class="wrap-input100 validate-input m-b-26" data-validate="NIK is required">
						<span class="label-input100">NIK</span>
						<input class="input100" type="text" name="userid" placeholder="Enter NIK">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<!-- <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label> -->
						</div>

						<div>
							<!-- <a href="#" class="txt1">
								Forgot Password?
							</a> -->
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="btn btn-success btn-flat btn-lg">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/system/js/main.js"></script>

</body>
</html>