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
          Category
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Category</li>
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
                    <th>Category ID</th>
                    <th>Category Name</th>
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
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" id="modal-title">Modal Header</h4>
            <input type="hidden" name="" id="process">
          </div>
          <div class="modal-body">
            <div id="modal-msg"></div>
            <table class="table table-hover table-responsive">
              <tr>
                <td width="25%">Category ID</td>
                <td><input type="text" name="id" id="id" class="form-control input-sm"></td>
              </tr>

              <tr>
                <td width="25%">Category Name</td>
                <td><input type="text" name="category_name" id="category_name" class="form-control input-sm"></td>
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

  <script src="<?php echo base_url();?>/assets/system/js/category.js"></script>
</body>
</html>
