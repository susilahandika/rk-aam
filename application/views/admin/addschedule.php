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
          Add Schedule
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="../schedule"><i class="fa fa-dashboard"></i> Schedule</a></li>
          <li class="active">Add</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Main panel -->
        <div class="box">
          <div id="main-msg"></div>

          <div class="box-body">
            <div class="form-group">
              <label for="periode">Region</label>
              <select name="region_id" id="region_id" class="form-control input-sm"></select>
            </div>

            <div class="form-group">
              <label for="periode">Department</label>
              <select name="dept_id" id="dept_id" class="form-control input-sm"></select>
            </div>

            <div class="form-group">
              <label for="periode">Periode</label>
              <div class="input-group">
                <?php 
            
                echo form_dropdown('month', $options, $monthNow, [
                  'class' => 'form-control input-sm',
                  'id' => 'month',
                ]); 
                
                ?>

                <span class="input-group-addon" id=""></span>
                <input type="text" name="year" class="form-control input-sm" id="year" value="<?php echo $yearNow; ?>" readonly>
              </div>
              <hr>
            </div>              
            
            <!-- <form action="#" id="upload-file" enctype="multipart/form-data" method="post">
              <div class="form-group" style="padding-Bottom:10px;">
                <div class="input-group">
                  <input style="float:none;" type="file" name="schedule_file" class="form-control input-sm" id="">
                  <span class="input-group-btn">
                    <input type="submit" id="btn-upload" class="btn btn-warning btn-flat btn-sm" value="Upload">
                  </span>
                </div>
                <small id="emailHelp" class="form-text text-muted">You can upload excel(xls, xlsx) file.</small>
              </div>
            </form> -->

            <div class="row">
              <div class="col-md-12">
                <div class="box">
                  <table class="table table-hover" id="tbl-schedule-dtl">
                    <thead>
                      <tr>
                        <th>Code</th>
                        <th>Checklist Date</th>
                        <th>process</th>
                      </tr>
                    </thead>

                    <tbody></tbody>
                  </table>
                </div>
                <div>
                  <input type="button" id="btn-add" class="btn btn-success btn-flat" value="Add Store">
                </div>
              </div>
            </div>
          </div>

          <div class="box-footer">
            <!-- <a class="btn btn-success btn-flat" href="schedule/create" id="btn-add">Add</a> -->
            <div class="pull-right">
              <input type="button" class="btn btn-success btn-flat" id="btn-ok" value="OK">
              <input type="button" class="btn btn-success btn-flat" id="btn-approve" value="Approve">
            </div>
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
            <h4 class="modal-title" id="modal-title">Add Store</h4>
            <input type="hidden" name="" id="process">
          </div>
          <div class="modal-body">
            <div id="modal-msg"></div>
            <table class="table table-hover table-responsive">
              <tr>
                <td width="25%">Store</td>
                <td><select name="store" class="form-control input-sm" id="store" style="width:100%;"></select></td>
              </tr>

              <tr>
                <td width="25%">Checklist Date</td>
                <td>
                  <input type="date" name="checklist_date" class="form-control" id="checklist_date">
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
  <script src="<?php echo base_url();?>/assets/system/js/addschedule.js"></script>
  <script src="<?php echo base_url();?>/assets/system/js/function.js"></script>
  <script src="<?php echo base_url();?>/assets/system/js/link.js"></script>
  <script src="<?php echo base_url();?>/assets/system/js/moment.js"></script>

</body>
</html>
