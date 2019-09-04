<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('checklist/_partials/head'); ?>
</head>
<body>

<div class="container">
	<div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
        <br><br> <h2 style="color:#0fad00">Success</h2>
        <img src="<?php echo base_url() . 'assets/system/img/check-true.png'; ?>">
        <h3>Dear, <?php echo $_SESSION['username']; ?></h3>
        <p style="font-size:20px;color:#5C5C5C;">Thank you for checklist your store. If you want to check your checklist detail, you can login here.</p>
        <a href="<?php echo base_url() . 'administrator' ?>" class="btn btn-success">     Dashboard      </a>
    <br><br>
        </div>
        
	</div>
</div>

<?php $this->load->view('checklist/_partials/js'); ?>
    
</body>
</html>