<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('admin/_partials/head') ?>

  <style>
    .status{
      background-color: #bfbfbf;
    }

    fieldset{
        border: 1px groove #ddd !important;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow:  0px 0px 0px 0px #000;
                box-shadow:  0px 0px 0px 0px #000;
    }

    legend{
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;
        width:auto;
        padding:0 10px;
        border-bottom:none;
    }
  </style>
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
          Item Checklist
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Item Checklist</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Main panel -->
        <div class="box">
          <div id="main-msg"></div>
          <div class="box-body">
            <div>
              <fieldset>
                <legend>Filter:</legend>

                <select name="" id="filter_region" class="form-control input-sm filter" data-column-index='4'></select>
                <select name="" id="filter_dept" class="form-control input-sm filter" data-column-index='3'></select>
              </fieldset>
            </div> <hr>
            <table id="example" class="display table table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th width="10%">Item ID</th>
                  <th width="5%">Category ID</th>
                  <th width="20%">Category Name</th>
                  <th width="10%">Dept ID</th>
                  <th width="10%">Region ID</th>
                  <th width="30%">Item Name</th>
                  <th width="5%">Order</th>
                  <th width="5%">Status</th>
                  <th width="10%">Process</th>
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
    <div id="modal-item" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" id="modal-item-title">Modal Header</h4>
            <input type="hidden" name="" id="process">
          </div>
          <div class="modal-body">
            <div id="modal-item-msg"></div>
            <table class="table table-hover table-responsive">
              <tr>
                <td width="25%">Item ID</td>
                <td><input type="text" name="id" id="id" class="form-control input-sm"></td>
              </tr>

              <tr>
                <td width="25%">Item Name</td>
                <td><input type="text" name="item_name" id="item_name" class="form-control input-sm"></td>
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
                <td width="25%">Category</td>
                <td>
                  <select name="category_id" id="category_id" class="form-control input-sm"></select>
                </td>
              </tr>

              <tr>
                <td width="25%">Order</td>
                <td><input type="text" name="order" id="order" class="form-control input-sm"></td>
              </tr>

              <tr>
                <td width="25%">Status</td>
                <td><input type="text" name="status" id="status" class="form-control input-sm"></td>
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

  <script src="<?php echo base_url();?>/assets/system/js/item.js"></script>
  <script src="<?php echo base_url();?>/assets/system/js/function.js"></script>
  <script src="<?php echo base_url();?>/assets/system/js/link.js"></script>
</body>
</html>
