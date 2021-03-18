<!DOCTYPE html>
<html>
	<head>
		<title>TCE Resume</title>
		<link rel="shortcut icon" type="image/icon" href="<?php echo base_url(); ?>icons/ivon v4.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body style="background: #ccc;">
		<div class="container" style="position: absolute; top:50%; left: 50%; transform: translate(-50%,-50%);">
			<div class="card shadow">
				<div class="card-header text-center shadow">
					<a href="<?php echo base_url(); ?>index.php/auth/aboutus">
						<img src="<?php echo base_url(); ?>icons/logo v2.png" height=100px;>
					</a>
				</div>
				<div class="card-body">

					<label>Email Id</label>
					<div class="input-group input-group-sm mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-envelope"></i></span>
						</div>
						<input type="text" id="username" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Enter a Valid Email Id">
					</div>
					<label>Password</label>
					<div class="input-group input-group-sm mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-key"></i></span>
						</div>
						<input type="password" id="password" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Enter your Password">
					</div>

					<div id="invalid" class="alert alert-danger text-center" role="alert" style="display: none;">
							Invalid Username or Password!
					</div>
					<div id="error" class="alert alert-danger text-center" role="alert" style="display: none;">
						<b>Internal Error !!!</b>
					</div>
					<div id="warning" class="alert alert-warning text-center" role="alert" style="display: none;">
						Please fill the missing credentials!
					</div>
				</div>
				<div class="card-footer shadow text-center">
					<a href="<?php echo base_url(); ?>index.php/auth/newUser"><i class="fa fa-user-plus"></i> New User? Register Now</a>&emsp;&emsp;
					<button class="btn btn-sm btn-success" onclick="validateUser()">&emsp;&emsp;Login <i class="fa fa-sign-in"></i>&emsp;&emsp;</button>
					<br>
					<br>
					<a href="<?php echo base_url(); ?>index.php/auth/ForgotPassword">Forgot Password?</a>
				</div>
			<div>
		</div>
<!--
<body>
	<div class="sidenav">
		<div class="login-main-text">
			<h2>Create Your<br>Resume </h2>
			<p>A Standard Template of TCE</p>
		</div>
	</div>
	<div class="main">
		<div class="col-md-6 col-sm-12">
			<div class="login-form">
				<form>
					<div class="form-group">
						<label>User Name</label>
						<input type="text" id="username" class="form-control" placeholder="Username">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" id="password" class="form-control" placeholder="Password">
					</div>
                    <div id="invalid" class="alert alert-danger" role="alert" style="display: none;">
                        Invalid Username or Password!
                    </div>
                    <div id="error" class="alert alert-danger" role="alert" style="display: none;">
                        <b>Internal Error !!!</b>
                    </div>
                    <div id="warning" class="alert alert-warning" role="alert" style="display: none;">
                        Please fill the missing credentials!
                    </div>
                    <input type="button" class="btn btn-success" action="javascript:void(0)" value="Let me in..." id="login" onclick="validateUser()">
					<br>
					<br>
                    <a href="<?php echo base_url(); ?>index.php/auth/newUser">New User? Register here</a>
				</form>
			</div>
		</div>
	</div>
</body>
-->
<script type="text/javascript">
	
	function _(el) {
		return document.getElementById(el);
	}

	function validateUser() {
		var username = _("username").value;
		var password = _("password").value;

		_("invalid").style.display = "none";
		_("error").style.display = "none";
		_("warning").style.display = "none";

		if (username == "" || password == "") {
			_("warning").style.display = "block";
		} else {
			$.ajax ({
				type:"POST",
				url:"<?php echo base_url(); ?>index.php/auth/validateUser",
				data:{username:username,password:password},
				success:function(data) {
					if (data == "fail") {
						_("invalid").style.display = "block";
					} else {
						window.location = data;
					}
				},error:function() {
					_("error").style.display = "block";
				}
			});
		}
	}

</script>