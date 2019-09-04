<?php
$menu = explode(",", $_SESSION['menu']);
$user_id = $_SESSION['nik'];
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <?php if(in_array(1, $menu)){ ?>
        <li class="<?php echo ($parent == 'home') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>home"><img src="<?php echo base_url() . 'assets/public/sidebar_img/home.png' ?>"> <span>Home</span></a></li>
      <?php } ?>

      <?php if(in_array(2, $menu)){ ?>
        <li class="<?php echo ($parent == 'setting') ? 'active' : ''; ?> treeview">
          <a href="#">
          <img src="<?php echo base_url() . 'assets/public/sidebar_img/settings-icon.png' ?>"> <span>Setting</span>
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

            <?php if(in_array(11, $menu)){ ?>
              <li class="<?php echo ($child == 'matriks_app') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>matriksapp"><i class="fa fa-circle-o"></i> Matriks Approval</a></li>
            <?php } ?>

          </ul>
        </li>
      <?php } ?>
      
      <?php if(in_array(6, $menu)){ ?>
        <li class="<?php echo ($parent == 'schedule') ? 'active' : ''; ?> treeview">
          <a href="#">
          <img src="<?php echo base_url() . 'assets/public/sidebar_img/schedule.png' ?>"> <span>Schedule</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if(in_array(12, $menu)){ ?>
              <li class="<?php echo ($child == 'schedule_pending') ? 'active' : ''; ?>"><a href="<?php echo base_url() . 'schedule/schedulepending'; ?>"><i class="fa fa-circle-o"></i> Schedule Pending</a></li>
            <?php } ?>

            <?php if(in_array(13, $menu)){ ?>
              <li class="<?php echo ($child == 'schedule_checklist') ? 'active' : ''; ?>"><a href="<?php echo base_url() . 'schedule'; ?>"><i class="fa fa-circle-o"></i> Schedule Checklist</a></li>
            <?php } ?>
            
          </ul>
        </li>
      <?php } ?>
      
      <?php if(in_array(7, $menu)){ ?>
        <li class="<?php echo ($parent == 'report') ? 'active' : ''; ?> treeview">
          <a href="#">
          <img src="<?php echo base_url() . 'assets/public/sidebar_img/report-icon.png' ?>" alt="Smiley face"> <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if(in_array(8, $menu)){ ?>
              <li class="<?php echo ($child == 'rchecklist') ? 'active' : ''; ?>"><a href="<?php echo base_url() . 'report/checklist'; ?>"><i class="fa fa-circle-o"></i> Checklist AAM</a></li>
            <?php } ?>
          </ul>
        </li>
      <?php } ?>
      
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
