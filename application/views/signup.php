<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codervent.com/rocker/white-version/authentication-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Dec 2018 14:18:52 GMT -->
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
	 <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body>
	<!-- Start wrapper-->
	<div id="wrapper">
		<div class="card border-primary border-top-sm border-bottom-sm card-authentication1 mx-auto my-4 animated bounceInDown">
			<div class="card-body">
				<div class="card-content p-2">
					<div class="text-center">
						<img src="<?php echo base_url();?>assets/images/logo-icon.png"> 
					</div>
					<div class="card-title text-uppercase text-center py-3">Sign Up</div>
	<?php echo form_open_multipart('Vishal/registration'); ?>

					<div class="form-group">
						<div class="position-relative has-icon-right">
							<input type="text" name="fname" id="exampleInputName" class="form-control form-control-rounded" placeholder="First Name" required="required">
							<!-- <div class="form-control-position">
								<i class="icon-user"></i>
							</div> -->
						</div>
					</div>
					<div class="form-group">
						<div class="position-relative has-icon-right">
							<input type="text" name="lname" id="exampleInputName" class="form-control form-control-rounded" placeholder="Last Name" required="required">
							<!-- <div class="form-control-position">
								<i class="icon-user"></i>
							</div> -->
						</div>
					</div>
					<div class="form-group">
						<div class="position-relative has-icon-right">
							<input type="text" name="contact" id="exampleInputName" class="form-control form-control-rounded" placeholder="Contact" required="required">
							<!-- <div class="form-control-position">
								<i class="icon-user"></i>
							</div> -->
						</div>
					</div>
					<div class="form-group">
						<div class="position-relative has-icon-right">
							<input type="text" name="address" id="exampleInputName" class="form-control form-control-rounded" placeholder="Address" required="required">
							<!-- <div class="form-control-position">
								<i class="icon-user"></i>
							</div> -->
						</div>
					</div>
					<div class="form-group">
						<div class="position-relative has-icon-right">
							<input type="text" name="state" id="exampleInputName" class="form-control form-control-rounded" placeholder="State" required="required">
							<!-- <div class="form-control-position">
								<i class="icon-user"></i>
							</div> -->
						</div>
					</div>
					<div class="form-group">
						<div class="position-relative has-icon-right">
							<input type="text" name="gender" id="exampleInputName" class="form-control form-control-rounded" placeholder="Gender" required="required">
							<!-- <div class="form-control-position">
								<i class="icon-user"></i>
							</div> -->
						</div>
					</div>
					<div class="form-group">
						<div class="position-relative has-icon-right">
							<label for="exampleInputEmailId" class="sr-only">Email ID</label>
							<input type="text" name="email" id="exampleInputEmailId" class="form-control form-control-rounded" placeholder="Email ID" >
							<!-- <div class="form-control-position">
								<i class="icon-envelope-open"></i>
							</div> -->
						</div>
					</div>
					<div class="form-group">
					    <label >Attached File</label>
						<div class="position-relative has-icon-right">
							<label class="sr-only">Attached</label>
							<input name="cust_image" type="hidden"  class="form-control file-value file-browser" placeholder="Choose file..." readonly>
                          <input name="cust_image[]" type="file" multiple >
						</div>
					</div>
					<div class="form-group">
						<div class="position-relative has-icon-right">
							<input type="text" name="username" id="exampleInputEmailId" class="form-control form-control-rounded" placeholder="username" required="required">
							<!-- <div class="form-control-position">
								<i class="icon-envelope-open"></i>
							</div> -->
						</div>
					</div>
					<div class="form-group">
						<div class="position-relative has-icon-right">
							<input type="password" name="password" id="exampleInputPassword" class="form-control form-control-rounded" placeholder="Password" required="required">
							<!-- <div class="form-control-position">
								<i class="icon-lock"></i>
							</div> -->
						</div>
					</div>
					 <div class="g-recaptcha" data-sitekey="6LftS64ZAAAAAEa7zJ3xzvTdXpmvpztph0_Ih7hh"></div>
					 
					<button type="submit" class="btn btn-primary shadow-primary btn-round btn-block waves-effect waves-light">Sign Up</button>
					<div class="text-center pt-3">
						<hr>
						<p class="text-muted">Already have an account? <a href="<?php echo base_url();?>"> Sign In here</a></p>
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

<!-- Mirrored from codervent.com/rocker/white-version/authentication-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Dec 2018 14:18:52 GMT -->
</html>