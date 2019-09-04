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
          Detail OK
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url() . 'home'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Detail OK</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Main panel -->
        <div class="box">
          <div id="main-msg"></div>
          <div class="box-body">
						<!-- <div>
              <fieldset>
                <legend>Filter:</legend>

                <select name="" id="filter_month" class="form-control input-sm filter" data-column-index='4'></select>
                <select name="" id="filter_year" class="form-control input-sm filter" data-column-index='5'></select>
              </fieldset>
            </div> <hr> -->

            <table id="example" class="display table table-bordered table-striped" style="width:100%">
              <thead>
                <tr>
									<th>Store</th>
									<th>Store Name</th>
									<th>Item Name</th>
									<th>Month</th>
									<th>Year</th>
									<th>Count OK</th>
                </tr>
              </thead>
            </table>
          </div>

          <!-- <div class="box-footer">
            <a class="btn btn-success btn-flat" id="btn-add">Add</a>
          </div> -->
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

  <script src="<?php echo base_url();?>/assets/system/js/rdetail_ok.js"></script>
  <script src="<?php echo base_url();?>/assets/system/js/function.js"></script>
  <script src="<?php echo base_url();?>/assets/system/js/link.js"></script>
</body>
</html>
