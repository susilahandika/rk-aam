<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('checklist/_partials/head'); ?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/system/css/checklist.css">

</head>
<body class="bg-body">

<?php $this->load->view('checklist/_partials/navbar'); ?>

<div class="text-center top-div">
	<h1>Minimart checklist</h1>
</div>

<div id="alert-msg" style="padding-bottom:10px;"></div>

<div class="text-center" style="margin:auto; width:50%;">
	<div class="panel panel-success">
		<div class="panel-body">
			<div class="col-md-12">
				<form action="#" id="form-start-checklist">
					<div class="input-group">
						<select style="" name="region_id" class="form-control" id="region_id" required></select>
						<span class="input-group-addon"></span>
						<select name="store_id" class="form-control" id="store_id" required></select>
					</div><!-- /input-group --><br>
					
					<!-- <button class="btn btn-success btn-flat btn-lg" type="button" id="btn-start">Start Checklist!</button> -->
					<input type="submit" value="Start Checklist!" class="btn btn-success btn-flat btn-lg">
				</form>
			</div><!-- /.col-lg-6 -->
		</div>
	</div>

</div>

<?php $this->load->view('checklist/_partials/js'); ?>
<script src="<?php echo base_url();?>/assets/system/js/checklist.js"></script>
<script src="<?php echo base_url();?>/assets/system/js/function.js"></script>
<script src="<?php echo base_url();?>/assets/system/js/link.js"></script>
    
</body>
</html>