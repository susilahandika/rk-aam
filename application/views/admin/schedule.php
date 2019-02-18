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
          Schedule
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Schedule</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Main panel -->
        <div class="box">
          <div id="main-msg"></div>
          <div class="box-body">
            <table id="example" class="display table table-bordered table-striped" style="width:100%">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Region ID</th>
                    <th>Region</th>
                    <th>Created Date</th>
                    <th>Created Name</th>
                    <th>Status</th>
                    <th>Process</th>
                </tr>
              </thead>
            </table>
          </div>

          <div class="box-footer">
            <a class="btn btn-success btn-flat" href="schedule/create" id="btn-add">Add</a>
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
  <script src="<?php echo base_url();?>/assets/system/js/schedule.js"></script>
  <script src="<?php echo base_url();?>/assets/system/js/function.js"></script>
  <script src="<?php echo base_url();?>/assets/system/js/link.js"></script>

</body>
</html>
