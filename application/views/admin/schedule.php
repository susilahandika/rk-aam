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

</body>
</html>
