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
          Home
        </h1>
        <ol class="breadcrumb">
          <li clas="active"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <!-- <li class="active">Dashboard</li> -->
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><span id="sm-box-ok"></span></h3>

                <p>Cheklist OK</p>
              </div>
              <div class="icon">
                <i class="fa fa-calendar-check-o"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><span id="sm-box-no"></span></h3>

                <p>Cheklist NO</p>
              </div>
              <div class="icon">
                <i class="fa fa-calendar-times-o" aria-hidden="true"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><span id="sm-box-na"></span></h3>

                <p>Checklist N/A</p>
              </div>
              <div class="icon">
                <i class="fa fa-calendar-minus-o"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>   

        <div class="row">
          <div class="col-md-6">
            <!-- DONUT CHART -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Donut Chart</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <canvas id="pieChart" style="height:250px"></canvas>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>

          <div class="col-md-6">
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">List Store</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <table id="example" class="display table table-bordered table-striped" style="width:100%">
                  <thead>
                    <tr>
                      <th>Store</th>
                      <th>Name</th>
                      <th>OK</th>
                      <th>NO</th>
                      <th>N/A</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">List Item Checklist</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>

              <div class="box-body">
                <table id="list_item_checklist" class="display table table-bordered table-striped" style="width:100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Item Name</th>
                      <th>Category ID</th>
                      <th>Category Name</th>
                      <th>OK</th>
                      <th>NO</th>
                      <th>NA</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php $this->load->view('admin/_partials/footer') ?>

  </div>
  <!-- ./wrapper -->

  <?php $this->load->view('admin/_partials/js') ?>
  <script src="<?php echo base_url();?>/assets/system/js/header.js"></script>
  <!-- ChartJS -->
  <script src="<?php echo base_url(); ?>assets/bower_components/Chart.js/Chart.js"></script>
  <script src="<?php echo base_url();?>/assets/system/js/home.js"></script>
  <script src="<?php echo base_url();?>/assets/system/js/function.js"></script>
  <script src="<?php echo base_url();?>/assets/system/js/link.js"></script>


</body>
</html>
