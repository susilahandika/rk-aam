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

    .input-filter{
      padding-top:5px;
    }

    .hidden-box{
      display: none;
    }

    .select2-container--default .select2-selection--multiple{
        height: 34.96px;
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
          Matriks Approval
        </h1>
        <ol class="breadcrumb">
          <li clas="active"><a href="#"><i class="fa fa-dashboard"></i> Matriks Approval</a></li>
          <!-- <li class="active">Dashboard</li> -->
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <form id="form-matriks-app" action="#" method="POST" enctype="multipart/form-data">
          <!-- Main panel -->
          <div class="box">
            <div id="main-msg"></div>
            <fieldset>
              <legend>Filter:</legend>

              <div>
                <select name="region_id" id="region_id" class="form-control input-sm filter" data-column-index='4'></select>
              </div>
              
              <div class="input-filter">
                <select name="dept_id" id="dept_id" class="form-control input-sm filter input-filter" data-column-index='3'></select>
              </div>

              <div style="padding-top:10px;">
                <button class="btn btn-success btn-flat btn-sm" id="btn-set-matriks-app">Set setting</button>
              </div>
            </fieldset>
          </div>

          <div class="box hidden-box" id="box-set-matriks-app">
            <h4 class="box-title"> &nbspInput User Approval</h4> <hr>
            
            <div style="padding-left:10px; padding-right:10px; padding-bottom:10px;" id="box-matriks-app-body">
              
              <div class="box">
                <div id="input-matriks-app"></div>

                <div class="pull-right" style="padding-top:10px;">
                  <button id="btn-add-app" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-plus" aria-hidden="true"></i></button>
                </div>
              </div>

              <div style="padding-top:10px;">
                <button class="btn btn-success btn-flat" id="btn-save-matriks">Save</button>
              </div>
            </div>
          </div>
          <!-- /.Main panel -->
        </form>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php $this->load->view('admin/_partials/footer') ?>

  </div>
  <!-- ./wrapper -->

  <?php $this->load->view('admin/_partials/js') ?>

  <script src="<?php echo base_url();?>/assets/system/js/matriksapp.js"></script>
  <script src="<?php echo base_url();?>/assets/system/js/function.js"></script>
  <script src="<?php echo base_url();?>/assets/system/js/link.js"></script>
  <script src="<?php echo base_url();?>/assets/system/js/header.js"></script>

</body>
</html>
