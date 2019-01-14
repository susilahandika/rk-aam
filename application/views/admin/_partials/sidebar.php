<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="<?php echo ($parent == 'home') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> <span>Home</span></a></li>
      <li class="<?php echo ($parent == 'setting') ? 'active' : ''; ?> treeview">
        <a href="#">
          <i class="fa fa-cogs"></i> <span>Setting</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo ($child == 'category') ? 'active' : ''; ?>"><a href="category"><i class="fa fa-circle-o"></i> Category</a></li>
          <li class="<?php echo ($child == 'item') ? 'active' : ''; ?>"><a href="#"><i class="fa fa-circle-o"></i> Item Checklist</a></li>
        </ul>
      </li>
      <li class="<?php echo ($parent == 'schedule') ? 'active' : ''; ?>"><a href="#"><i class="fa fa-calendar"></i> <span>Schedule</span></a></li>
      <li class="<?php echo ($parent == 'report') ? 'active' : ''; ?> treeview">
        <a href="#">
          <i class="fa fa-files-o"></i> <span>Report</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo ($child == 'category') ? 'active' : ''; ?>"><a href="#"><i class="fa fa-circle-o"></i> Checklist AAM</a></li>
          <li class="<?php echo ($child == 'item') ? 'active' : ''; ?>"><a href="#"><i class="fa fa-circle-o"></i> Visit By Schedule</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
