<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('checklist/_partials/head'); ?>
</head>
<body>

  <?php $this->load->view('checklist/_partials/navbar') ?>
  <form action="#" id="form-store-checklist" method="POST" enctype="multipart/form-data">
  
    <div class="col-sm-6">
      <div class="input-group">
        <span class="input-group-addon">Store&nbsp</span>
        <input id="msg" type="text" class="form-control" name="store" placeholder="" value="<?php echo $store; ?>" readonly>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="input-group">
        <span class="input-group-addon">Date</span>
        <input id="msg" type="text" class="form-control" name="checklist_date" value="<?php echo $checklist_date; ?>" readonly>
      </div>
    </div>

    <div class="col-sm-12" style="margin-top:10px;">
      <div class="panel panel-success">
        <div class="panel-heading"></div>
        <div class="panel-body">
          <!-- <form action="store" method="POST" enctype="multipart/form-data"> -->
          
          <table class="table table-responsive table-striped table-bordered">
            <thead>
              <tr>
                <th style="text-align:center; width:35%">CONTROL DAILY</th>
                <th style="width:2%">OK</th>
                <th style="width:2%">NO</th>
                <th style="width:2%">N/A</th>
                <th style="width:25%">Information</th>
              </tr>
            </thead>

            <?php foreach ($data as $value) { ?>
              <thead>
                <tr>
                  <th><?php echo $value->category_name ?></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <?php $controller->checklistItem($value->id, $region); ?>
            <?php } ?>
          </table>

          <div id="alert-msg"></div>

          <div>
            <input type="submit" value="Save" class="btn btn-success btn-flat">
          </div>
          
        </div>
      </div>
    </div>

  </form>

  <?php $this->load->view('checklist/_partials/js'); ?>
  <script src="<?php echo base_url();?>/assets/system/js/link.js"></script>
  <script src="<?php echo base_url();?>/assets/system/js/checklist_detail.js"></script>
</body>
</html>
