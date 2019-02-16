<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('admin/_partials/head') ?>
</head>

<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view('admin/_partials/navbar') ?>

    <?php $this->load->view('admin/_partials/sidebar', $data) ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          User
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">User</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Main panel -->
        <div class="box">
          <div id="main-msg"></div>
          
          <table class="table table-hover table-responsive">
            <tr>
							<td width="15%">NIK</td>
							<td><input type="text" name="id" id="id" class="form-control input-sm"></td>
            </tr>

            <tr>
							<td width="15%">Full Name</td>
							<td><input type="text" name="full_name" id="full_name" class="form-control input-sm" readonly></td>
            </tr>

						<tr>
							<td width="15%">Menu</td>
							<td>
								<select class="js-example-basic-multiple form-control input-bg" name="states[]" multiple="multiple">
									<option value="AL">Alabama</option>
										...
									<option value="WY">Wyoming</option>
								</select>
							</td>
            </tr>

        </table>

          <div class="box-footer">
            <a class="btn btn-success btn-flat" id="btn-add">Add</a>
          </div>
        </div>
        <!-- /.Main panel -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php $this->load->view('admin/_partials/footer') ?>

  </div>
  <!-- ./wrapper -->

  <?php $this->load->view('admin/_partials/js') ?>

	<script>
		$(document).ready(function() {
				$('.js-example-basic-multiple').select2();
		});
	</script>

  <!-- <script src="<?php echo base_url();?>/assets/system/js/user.js"></script>
  <script src="<?php echo base_url();?>/assets/system/js/function.js"></script>
  <script src="<?php echo base_url();?>/assets/system/js/link.js"></script> -->
</body>
</html>
