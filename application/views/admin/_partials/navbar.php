<header class="main-header">

	<!-- Logo -->
	<a href="index2.html" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>M</b>M</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>MM</b> Checklist</span>
	</a>

	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<!-- Navbar Right Menu -->
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<!-- Messages: style can be found in dropdown.less-->
				<!-- Notifications: style can be found in dropdown.less -->
				<li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-bell-o"></i>
						<span class="label label-warning">10</span>
					</a>
					<ul class="dropdown-menu">
						<li class="header">You have 10 notifications</li>
						<li>
							<!-- inner menu: contains the actual data -->
							<ul class="menu">
								<li>
									<a href="#">
										<i class="fa fa-users text-aqua"></i> 5 new members joined today
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
										page and may cause design problems
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-users text-red"></i> 5 new members joined
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-shopping-cart text-green"></i> 25 sales made
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-user text-red"></i> You changed your username
									</a>
								</li>
							</ul>
						</li>
						<li class="footer"><a href="#">View all</a></li>
					</ul>
				</li>
				<!-- Tasks: style can be found in dropdown.less -->
				<li class="dropdown tasks-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-flag-o"></i>
						<span class="label label-danger">9</span>
					</a>
					<ul class="dropdown-menu">
						<li class="header">You have 9 tasks</li>
						<li>
							<!-- inner menu: contains the actual data -->
							<ul class="menu">
								<li><!-- Task item -->
									<a href="#">
										<h3>
											Design some buttons
											<small class="pull-right">20%</small>
										</h3>
										<div class="progress xs">
											<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
														aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
												<span class="sr-only">20% Complete</span>
											</div>
										</div>
									</a>
								</li>
								<!-- end task item -->
								<li><!-- Task item -->
									<a href="#">
										<h3>
											Create a nice theme
											<small class="pull-right">40%</small>
										</h3>
										<div class="progress xs">
											<div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
														aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
												<span class="sr-only">40% Complete</span>
											</div>
										</div>
									</a>
								</li>
								<!-- end task item -->
								<li><!-- Task item -->
									<a href="#">
										<h3>
											Some task I need to do
											<small class="pull-right">60%</small>
										</h3>
										<div class="progress xs">
											<div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
														aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
												<span class="sr-only">60% Complete</span>
											</div>
										</div>
									</a>
								</li>
								<!-- end task item -->
								<li><!-- Task item -->
									<a href="#">
										<h3>
											Make beautiful transitions
											<small class="pull-right">80%</small>
										</h3>
										<div class="progress xs">
											<div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
														aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
												<span class="sr-only">80% Complete</span>
											</div>
										</div>
									</a>
								</li>
								<!-- end task item -->
							</ul>
						</li>
						<li class="footer">
							<a href="#">View all tasks</a>
						</li>
					</ul>
				</li>
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
						<span class="hidden-xs"><?php echo $this->session->username; ?></span>
					</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header">
							<img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

							<p>
								<?php echo $this->session->username; ?>
							</p>
						</li>
						<!-- Menu Body -->
						<li class="user-body">
							<div class="row">
								<div class="col-xs-4 text-center">
									<!-- <a href="#">Followers</a> -->
								</div>
								<div class="col-xs-4 text-center">
									<!-- <a href="#">Sales</a> -->
								</div>
								<div class="col-xs-4 text-center">
									<!-- <a href="#">Friends</a> -->
								</div>
							</div>
							<!-- /.row -->
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="#" class="btn btn-default btn-flat">Profile</a>
							</div>
							<div class="pull-right">
								<a href="#" class="btn btn-default btn-flat" data-toggle="modal" data-target="#myModal">Sign out</a>
							</div>
						</li>
					</ul>
				</li>
				
			</ul>
		</div>

	</nav>

</header>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form action="<?php echo base_url(); ?>">
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