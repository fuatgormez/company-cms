<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Reset Password</title>

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
		.login-page {
			background: #0f0c29;
			/* fallback for old browsers */
			background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);
			/* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to right, #24243e, #302b63, #0f0c29);
			/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

		}

		.login-logo {
			color: #fff;
		}
	</style>

</head>

<body class="hold-transition login-page sidebar-mini">

	<div class="login-box">
		<div class="login-logo">
			<b>FG - Admin Panel</b>
		</div>
		<div class="login-box-body">
			<h4 class="login-box-msg">Reset Password</h4>

			<?php if($this->session->flashdata('error')):?>
				<div class="callout callout-danger">
					<p><?php echo $this->session->flashdata('error'); ?></p>
				</div>
			<?php endif;?>
			<?php if($this->session->flashdata('success')):?>
				<div class="callout callout-success">
					<p><?php echo $this->session->flashdata('success'); ?></p>
				</div>
			<?php endif;?>

			<?php echo form_open(base_url('backend/reset-password/index/' . $var1 . '/' . $var2)); ?>
			<div class="form-group has-feedback">
				<input class="form-control" placeholder="New Password" name="new_password" type="password" autocomplete="off" autofocus>
			</div>
			<div class="form-group has-feedback">
				<input class="form-control" placeholder="Retype Password" name="re_password" type="password" autocomplete="off" autofocus>
			</div>
			<div class="row">
				<div class="col-xs-8" style="padding-top:7px;"></div>
				<div class="col-xs-4">
					<input type="submit" class="btn btn-primary btn-block btn-flat login-button" name="form1" value="Submit">
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