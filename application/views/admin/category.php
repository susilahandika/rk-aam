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
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Main panel -->
        <div class="box">
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
            <a class="btn btn-success btn-flat">Add</a>
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
    $(document).ready(function () {
      $('#example').DataTable( {
          "ajax": "http://localhost/rk-aam/category/select",
          "sAjaxDataProp": "",
          "columns": [
              { "data": "id" },
              { "data": "category_name" },
              { 
                "data": "null",
                "defaultContent": '<a href="" class="btn btn-warning btn-flat btn-sm">Edit</a> <a href="" class="btn btn-danger btn-flat btn-sm">Delete</a>' 
              },
          ]
      } );
    });
  </script>
</body>
</html>
