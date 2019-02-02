<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script> -->
  <?php $this->load->view('checklist/_partials/head'); ?>
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">WebSiteName</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </nav>

  <div class="col-sm-6">
    <div class="input-group">
      <span class="input-group-addon">Store</span>
      <input id="msg" type="text" class="form-control" name="msg" placeholder="" readonly>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="input-group">
      <span class="input-group-addon">Date</span>
      <input id="msg" type="text" class="form-control" name="msg" value="<?php echo $checklist_date; ?>" readonly>
    </div>
  </div>

  <div class="col-sm-12" style="margin-top:10px;">
    <div class="panel panel-success">
      <div class="panel-heading"></div>
      <div class="panel-body">
        <form action="store" method="POST" enctype="multipart/form-data">
          <table class="table table-responsive table-striped table-bordered">
            <thead>
              <tr>
                <th style="text-align:center; width:35%">CONTROL DAILY</th>
                <th style="width:2%">OK</th>
                <th style="width:2%">NO</th>
                <th style="width:2%">N/A</th>
                <th style="width:25%">Information</th>
                <th style="width:20%">Image</th>
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

          <div>
            <input type="submit" value="Save" class="btn btn-success btn-flat">
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php $this->load->view('checklist/_partials/js'); ?>

  <script>
  $(document).ready(function () {
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    });
  });
  </script>
</body>
</html>
