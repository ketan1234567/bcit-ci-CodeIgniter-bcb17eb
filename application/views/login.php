<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codervent.com/rocker/white-version/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Dec 2018 14:18:52 GMT -->
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta name="description" content=""/>
	<meta name="author" content=""/>
	<title>cashproindia</title>
	<!--favicon-->
	<link rel="icon" href="<?php echo base_url();?>assets/images/favicon.ico" type="image/x-icon">
	<!-- Bootstrap core CSS-->
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet"/>
	<!-- animate CSS-->
	<link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet" type="text/css"/>
	<!-- Icons CSS-->
	<link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css"/>
	<!-- Custom Style-->
	<link href="<?php echo base_url();?>assets/css/app-style.css" rel="stylesheet"/>

</head>

<body>
	<!-- Start wrapper-->
	<div id="wrapper">
		<div class="card border-primary border-top-sm border-bottom-sm card-authentication1 mx-auto my-5 animated bounceInDown">
			<div class="card-body">
				<div class="card-content p-2">
					<div class="text-center">
						<img src="<?php echo base_url();?>assets/images/logo-icon.png"> 
					</div>
					<div class="card-title text-uppercase text-center py-3">Sign In</div>
					<?php echo form_open(base_url('auth') ); ?>
					<div class="form-group">
						<div class="position-relative has-icon-right">
							<input type="text" name="username" id="exampleInputUsername" class="form-control form-control-rounded" placeholder="Username">
							<div class="form-control-position">
								<i class="icon-user"></i>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="position-relative has-icon-right">
							<input type="password" name="password" id="exampleInputPassword" class="form-control form-control-rounded" placeholder="Password">
							<div class="form-control-position">
								<i class="icon-lock"></i>
							</div>
						</div>
					</div>
			<!-- <div class="form-row mr-0 ml-0">
			 <div class="form-group col-6">
			   <div class="icheck-primary">
                <input type="checkbox" id="user-checkbox" checked="" />
                <label for="user-checkbox">Remember me</label>
			  </div>
			 </div>
			 <div class="form-group col-6 text-right">
			  <a href="authentication-reset-password.html">Reset Password</a>
			 </div>
			</div> -->
			<button type="submit" class="btn btn-primary shadow-primary btn-round btn-block waves-effect waves-light">Sign In</button>
			  <!-- <div class="text-center pt-3">
				<p>or Sign in with</p>
				<a href="javascript:void()" class="btn-social btn-social-circle btn-facebook waves-effect waves-light m-1"><i class="fa fa-facebook"></i></a>
				<a href="javascript:void()" class="btn-social btn-social-circle btn-google-plus waves-effect waves-light m-1"><i class="fa fa-google-plus"></i></a>
				<a href="javascript:void()" class="btn-social btn-social-circle btn-twitter waves-effect waves-light m-1"><i class="fa fa-twitter"></i></a>
				<hr> -->
				<br>
				<br>
				<p class="text-muted">Do not have an account? <a href="<?php echo base_url();?>index.php/signup"> Sign Up here</a></p>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<!--Start Back To Top Button-->
<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
<!--End Back To Top Button-->
</div><!--wrapper-->

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

</body>

<!-- Mirrored from codervent.com/rocker/white-version/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Dec 2018 14:18:52 GMT -->
</html>


<!--Sweet Alerts -->
  <script src="<?php echo base_url();?>assets/plugins/alerts-boxes/js/sweetalert.min.js"></script>
  <script src="<?php echo base_url();?>assets/plugins/alerts-boxes/js/sweet-alert-script.js"></script>

<?php
  if($error = $this->session->flashdata('success')) {
    ?>
    <script>
      
      swal("Good job!", "<?php echo $this->session->flashdata('success'); ?>", "success");

    </script>
    <?php
  }
  ?>

  <?php
  if($error = $this->session->flashdata('warning')) {
    ?>
    <script>
      swal("Warning!", "<?php echo $this->session->flashdata('warning'); ?>", "error");

    </script>
    <?php
  }
  ?>
