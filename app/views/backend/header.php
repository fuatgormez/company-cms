<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Panel</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/datepicker3.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/all.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/jquery.fancybox.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/_all-skins.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/summernote.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/magnific-popup.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/style.css">
	


	<style>
		.skin-blue .wrapper,
		.skin-blue .main-header .logo,
		.skin-blue .main-header .navbar,
		.skin-blue .main-sidebar,
		.content-header .content-header-right a,
		.content .form-horizontal .btn-success {
            background-color: #030e27!important;
            background-image: linear-gradient(to bottom,transparent,rgba(0,0,0,.3));
		}

		.content-header .content-header-right a,
		.content .form-horizontal .btn-success {
			border-color: #4172a5!important;
		}
		
		.content-header>h1,
		.content-header .content-header-left h1,
		h3 {
			color: #4172a5!important;
		}

		.box.box-info {
			border-top-color: #4172a5!important;
		}

		.nav-tabs-custom>.nav-tabs>li.active {
			border-top-color: #f4f4f4!important;
		}

		.skin-blue .sidebar a {
			color: #fff!important;
		}

		.skin-blue .sidebar-menu>li>.treeview-menu {
			margin: 0!important;
		}
		.skin-blue .sidebar-menu>li>a {
			border-left: 0!important;
		}

		.nav-tabs-custom>.nav-tabs>li {
			border-top-width: 1px!important;
		}

		/*
		-------------------------------
		Preloader
		-------------------------------
		*/
		#preloader {
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: #fff;
			z-index: 999999;
		}

		#status {
			width: 200px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 50%;
			background-repeat: no-repeat;
			background-position: center;
			margin: -100px 0 0 -100px;
		}

	</style>



</head>

<body class="hold-transition fixed skin-blue sidebar-mini">
<!--Preloader Start-->
	<div id="preloader">
        <div id="status" style="background-image: url(<?php echo base_url('public/uploads/'.$setting['loader']); ?>)"></div>
    </div>
<!--Preloader End-->
	<div class="wrapper">
		<header class="main-header">
			<a href="<?php echo base_url(); ?>backend/dashboard" class="logo">
				<span class="logo-lg">FG CMS</span>
			</a>

			<nav class="navbar navbar-static-top">
				
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				<span style="float:left;line-height:50px;color:#fff;padding-left:15px;font-size:18px;">Admin Panel</span>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li>
							<a href="<?php echo base_url(); ?>" target="_blank">Visit Website</a>
						</li>

						<?php if($this->session->userdata('id')): ?>
							<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php if($this->session->userdata('photo') == ''): ?>
									<img src="<?php echo base_url(); ?>public/images/no-photo.jpg" class="user-image" alt="user photo">
								<?php else: ?>
									<img src="<?php echo base_url(); ?>public/uploads/<?php echo $this->session->userdata('photo'); ?>" class="user-image" alt="user photo">
								<?php endif; ?>
								<span class="hidden-xs"><?php echo $this->session->userdata('full_name'); ?></span>
							</a>
								<ul class="dropdown-menu">
									<li class="user-footer">
										<a href="<?php echo base_url('backend/profile'); ?>" class="btn btn-default btn-flat">Edit Profile</a>
										<div>
											<a href="<?php echo base_url('backend/account/logout'); ?>" class="btn btn-default btn-flat">Log out</a>
										</div>
									</li>
								</ul>
							</li>
						<?php endif; ?>
					</ul>
				</div>

			</nav>
		</header>

  		<?php
			$class_name = '';
		    $segment_2 = 0;
		    $segment_3 = 0;
		    $class_name = $this->router->fetch_class();
		    $segment_2 = $this->uri->segment('2');
		    $segment_3 = $this->uri->segment('3');
		?>

  		<aside class="main-sidebar">
    		<section class="sidebar">
      			<ul class="sidebar-menu">
			        <li class="treeview <?php if($class_name == 'dashboard') {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>backend/dashboard">
			            <i class="fa fa-laptop"></i> <span>Dashboard</span>
			          </a>
			        </li>
					<?php if( $this->session->userdata('role') == 'Administrator' ): ?>
			        <li class="treeview <?php if( $class_name == 'contact' ) {echo 'active';} ?>">
			          <a href="<?php echo base_url('backend/contact'); ?>">
			            <i class="fa fa-warning"></i> <span>Contact</span>
			          </a>
			        </li>
			        <li class="treeview <?php if( ($class_name == 'setting') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>backend/setting">
			            <i class="fa fa-cog"></i> <span>Settings</span>
			          </a>
			        </li>
			        <li class="treeview <?php if( ($class_name == 'page') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>backend/page">
			            <i class="fa fa-file-text"></i> <span>Page</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'language') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>backend/language">
			            <i class="fa fa-language"></i> <span>Language</span>
			          </a>
			        </li>
			      
			        <li class="treeview <?php if( ($class_name == 'category') || ($class_name == 'news') || ($class_name == 'comment') ) {echo 'active';} ?>">
						<a href="#">
							<i class="fa fa-newspaper-o"></i>
							<span>News</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url(); ?>backend/category"><i class="fa fa-circle-o"></i>Category</a></li>
							<li><a href="<?php echo base_url(); ?>backend/news"><i class="fa fa-circle-o"></i> News</a></li>
							<li><a href="<?php echo base_url(); ?>backend/comment"><i class="fa fa-circle-o"></i> Comment</a></li>
						</ul>
					</li>

					<li class="treeview <?php if( ($class_name == 'event') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>backend/event">
			            <i class="fa fa-calendar"></i> <span>Event</span>
			          </a>
			        </li>

					<li class="treeview <?php if( ($class_name == 'subscriber') ) {echo 'active';} ?>">
						<a href="#">
							<i class="fa fa-comment"></i>
							<span>Subscriber</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url(); ?>backend/subscriber"><i class="fa fa-circle-o"></i>All Subscribers</a></li>
							<li><a href="<?php echo base_url(); ?>backend/subscriber/send_email"><i class="fa fa-circle-o"></i>Email to Subscribers</a></li>
						</ul>
					</li>

			        <li class="treeview <?php if( ($class_name == 'team_member') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>backend/team_member">
			            <i class="fa fa-users"></i> <span>Team Member</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'slider') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>backend/slider">
			            <i class="fa fa-picture-o"></i> <span>Slider</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'testimonial') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>backend/testimonial">
			            <i class="fa fa-user-plus"></i> <span>Testimonial</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'photo') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>backend/photo">
			            <i class="fa fa-camera"></i> <span>Photo Gallery</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'pricing_table') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>backend/pricing_table">
			            <i class="fa fa-usd"></i> <span>Pricing Table</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'portfolio')||($class_name == 'portfolio_category') ) {echo 'active';} ?>">
						<a href="#">
							<i class="fa fa-bars"></i>
							<span>Portfolio</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url(); ?>backend/portfolio_category"><i class="fa fa-circle-o"></i> Portfolio Category</a></li>
							<li><a href="<?php echo base_url(); ?>backend/portfolio"><i class="fa fa-circle-o"></i> Portfolio</a></li>
						</ul>
					</li>

			        <li class="treeview <?php if( ($class_name == 'client') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>backend/client">
			            <i class="fa fa-clone"></i> <span>Client</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'service') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>backend/service">
			            <i class="fa fa-life-ring"></i> <span>Service</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'feature') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>backend/feature">
			            <i class="fa fa-cube"></i> <span>Feature</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'why_choose') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>backend/why_choose">
			            <i class="fa fa-paper-plane-o"></i> <span>Why Choose Us</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'faq') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>backend/faq">
			            <i class="fa fa-bolt"></i> <span>FAQ</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'social_media') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>backend/social_media">
			            <i class="fa fa-address-book"></i> <span>Social Media</span>
			          </a>
			        </li>

			        	        

			        <?php endif; ?>        
      			</ul>
    		</section>
  		</aside>

  		<div class="content-wrapper">