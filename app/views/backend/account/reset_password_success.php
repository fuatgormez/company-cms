<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Reset Password Success</title>

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
			background: #333;
		}
		.login-logo {
			color: #fff;
		}
	</style>

</head>

<body class="hold-transition login-page sidebar-mini">

<div class="login-box">
	<div class="login-logo">
		<b>Multix - Admin Panel</b>
	</div>
  	<div class="login-box-body style="text-align:center;">
    	<h4 class="login-box-msg">Reset Password</h4>    
	    <?php
        if($this->session->flashdata('success')) {
            echo '<div class="success">'.$this->session->flashdata('success').'</div>';
        }
        ?>
        <a href="<?php echo base_url('backend/account/login'); ?>" style="color:red;">back to login page</a>
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