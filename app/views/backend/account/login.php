<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/datepicker3.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/all.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/_all-skins.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/style.css">
	<style>

		.login-forgot-password {
            background: radial-gradient(circle,#E91E63 0,#E91E63 80%);
            padding: 10px;
            border-radius: 5px;
            color: #FFF;
		}
	</style>

</head>

<body class="hold-transition login-page sidebar-mini">

	<div class="login-box">
		<div class="login-logo">
			<b>FG-CMS - Admin Panel</b>
		</div>
		<div class="login-box-body">
			<p class="login-box-msg">Log in to start your session</p>
			<?php if ($this->session->flashdata('error')):?>
				<div class="error"><?php echo $this->session->flashdata('error');?></div>
			<?php endif;?>
			<?php if ($this->session->flashdata('success')):?>
				<div class="success"><?php echo $this->session->flashdata('success');?></div>
			<?php endif;?>
			<?php echo form_open(base_url('backend/account/login')); ?>
			<div class="form-group has-feedback">
				<input class="form-control" placeholder="Username" name="username" type="text" autocomplete="off" autofocus>
			</div>
			<div class="form-group has-feedback">
				<input class="form-control" placeholder="Password" name="password" type="password" autocomplete="off" value="">
			</div>
			<div class="row">
				<div class="col-xs-8" style="padding-top:10px;"><a href="<?php echo base_url('backend/forget-password'); ?>" class="login-forgot-password">Forget Password?</a></div>
				<div class="col-xs-4">
					<input type="submit" class="btn btn-primary btn-block btn-flat login-button" name="form1" value="Login">
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
	<script src="<?php echo base_url(); ?>public/backend/js/jquery-2.2.3.min.js"></script>
	<script src="<?php echo base_url(); ?>public/backend/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>public/backend/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>public/backend/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>public/backend/js/select2.full.min.js"></script>
	<script src="<?php echo base_url(); ?>public/backend/js/jquery.inputmask.js"></script>
	<script src="<?php echo base_url(); ?>public/backend/js/jquery.inputmask.date.extensions.js"></script>
	<script src="<?php echo base_url(); ?>public/backend/js/jquery.inputmask.extensions.js"></script>
	<script src="<?php echo base_url(); ?>public/backend/js/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>public/backend/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url(); ?>public/backend/js/icheck.min.js"></script>
	<script src="<?php echo base_url(); ?>public/backend/js/fastclick.js"></script>
	<script src="<?php echo base_url(); ?>public/backend/js/jquery.sparkline.min.js"></script>
	<script src="<?php echo base_url(); ?>public/backend/js/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url(); ?>public/backend/js/app.min.js"></script>
	<script src="<?php echo base_url(); ?>public/backend/js/demo.js"></script>
</body>
</html>