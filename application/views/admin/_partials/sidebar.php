<?php
$menu = explode(",", $_SESSION['menu']);
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <?php if(in_array(1, $menu)){ ?>
        <li class="<?php echo ($parent == 'home') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>home"><i class="fa fa-home"></i> <span>Home</span></a></li>
      <?php } ?>

      <?php if(in_array(2, $menu)){ ?>
        <li class="<?php echo ($parent == 'setting') ? 'active' : ''; ?> treeview">
          <a href="#">
            <i class="fa fa-cogs"></i> <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if(in_array(3, $menu)){ ?>
              <li class="<?php echo ($child == 'category') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>category"><i class="fa fa-circle-o"></i> Category</a></li>
            <?php } ?>

            <?php if(in_array(4, $menu)){ ?>
              <li class="<?php echo ($child == 'item') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>item"><i class="fa fa-circle-o"></i> Item Checklist</a></li>
            <?php } ?>

            <?php if(in_array(5, $menu)){ ?>
              <li class="<?php echo ($child == 'user') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>user/list"><i class="fa fa-circle-o"></i> User</a></li>
            <?php } ?>

            <?php if(in_array(10, $menu)){ ?>
              <li class="<?php echo ($child == 'user_menu') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>usermenu"><i class="fa fa-circle-o"></i> User Menu</a></li>
            <?php } ?>

          </ul>
        </li>
      <?php } ?>
      
      <?php if(in_array(6, $menu)){ ?>
        <li class="<?php echo ($parent == 'schedule') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>schedule"><i class="fa fa-calendar"></i> <span>Schedule</span></a></li>
      <?php } ?>
      
      <?php if(in_array(7, $menu)){ ?>
        <li class="<?php echo ($parent == 'report') ? 'active' : ''; ?> treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if(in_array(8, $menu)){ ?>
              <li class="<?php echo ($child == 'category') ? 'active' : ''; ?>"><a href="#"><i class="fa fa-circle-o"></i> Checklist AAM</a></li>
            <?php } ?>

            <?php if(in_array(9, $menu)){ ?>
              <li class="<?php echo ($child == 'item') ? 'active' : ''; ?>"><a href="#"><i class="fa fa-circle-o"></i> Visit By Schedule</a></li>
            <?php } ?>
            
          </ul>
        </li>
      <?php } ?>
      
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
