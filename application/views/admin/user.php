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
          <div class="box-body">
            <table id="example" class="display table table-bordered table-striped" style="width:100%">
              <thead>
                <tr>
                    <th>NIK</th>
                    <th>Full Name</th>
                    <th>Region ID</th>
                    <th>Dept ID</th>
                    <th>Position ID</th>
                    <th>Region Name</th>
                    <th>Dept Name</th>
                    <th>Position Name</th>
                    <th>Process</th>
                </tr>
              </thead>
            </table>
          </div>

          <div class="box-footer">
            <a class="btn btn-success btn-flat" id="btn-add">Add</a>
          </div>
        </div>
        <!-- /.Main panel -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Modal -->
    <div id="modal_insert" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <!-- <h4 class="modal-title" id="modal-title">Modal Header</h4> -->
            <div id='modal-title-user'>Modal Header</div>
            <input type="hidden" name="" id="process">
          </div>
          <div class="modal-body">
            <div id="modal-msg"></div>
            <table class="table table-hover table-responsive">
              <tr>
                <td width="25%">NIK</td>
                <td><input type="text" name="id" id="id" class="form-control input-sm"></td>
              </tr>

              <tr>
                <td width="25%">Full Name</td>
                <td><input type="text" name="full_name" id="full_name" class="form-control input-sm" readonly></td>
              </tr>

              <tr>
                <td width="25%">Region</td>
                <td>
                  <select name="region_id" id="region_id" class="form-control input-sm"></select>
                </td>
              </tr>

              <tr>
                <td width="25%">Department</td>
                <td>
                  <select name="dept_id" id="dept_id" class="form-control input-sm"></select>
                </td>
              </tr>

              <tr>
                <td width="25%">Position</td>
                <td>
                  <select name="position_id" id="position_id" class="form-control input-sm"></select>
                </td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success btn-flat" id="btn-save">Save</button>
            <!-- <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button> -->
          </div>
        </div>

      </div>
    </div>

    <?php $this->load->view('admin/_partials/footer') ?>

  </div>
  <!-- ./wrapper -->

  <?php $this->load->view('admin/_partials/js') ?>

  <script src="<?php echo base_url();?>/assets/system/js/user.js"></script>
  <script src="<?php echo base_url();?>/assets/system/js/function.js"></script>
  <script src="<?php echo base_url();?>/assets/system/js/link.js"></script>
</body>
</html>
