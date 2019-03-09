<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url() . 'checklist'; ?>">MM Checklist</a>
    </div>
    <!-- <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
    </ul> -->
    <ul class="nav navbar-nav navbar-right">
      <li><p style="color:black;" class="navbar-text navbar-right"><?php echo $_SESSION['username']; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p></li>
      <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<input type="hidden" name="hdn_id" id="hdn_id" value="<?php echo $_SESSION['nik']; ?>">
<input type="hidden" name="hdn_region" id="hdn_region" value="<?php echo $_SESSION['region_id']; ?>">
<input type="hidden" name="hdn_dept" id="hdn_dept" value="<?php echo $_SESSION['dept_id']; ?>">

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form action="<?php echo base_url(); ?>login/checklist">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Confirmation</h4>
          <input type="hidden" name="" id="process">
        </div>
        <div class="modal-body">
          Are you sure you want to logout?
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success btn-sm btn-flat" value="Yes">
        </div>
      </form>
    </div>

  </div>
</div>