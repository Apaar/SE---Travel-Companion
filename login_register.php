<?php 
	include_once('template.php');
?>
	
		<style>
	
			body
				{
					overflow-x: hidden;
					overflow-y: hidden;
					margin: 0;
					background: #000;
				}
				
				#logreg
				{
					background-position: 50% 50%;
					z-index: 1;
					background: rgba(0, 0, 0, 0) url(Journey.png) no-repeat scroll 50% 50% / cover padding-box border-box;
					font: normal normal normal 16px/normal Helvetica, Arial, sans-serif;
					background-size:cover;
				}
				
				video
				{ 
					position: fixed;
					top: 50%;
					left: 50%;
					min-width: 100%;
					min-height: 100%;
					width: auto;
					height: auto;
					z-index: -100;
					transform: translateX(-50%) translateY(-50%);
					background-size: cover;
				}
				
				.animatable
				{
					-webkit-transition:all 1000ms ease-out;
					transition:all 1000ms ease-out;
				}
				
				.scaled
				{
					-webkit-transform:scale(1.10);
					transform:scale(1.10);
				}
				
				.navbar
				{
					display: none;   
				}​
				
				#loginbox
				{
					background-color: transparent;
				}
				
				.panel
				{
					background: transparent;
					border: transparent;
					font-color: white;
				}
				
				.panel-heading
				{
					background: transparent;
					border: none;
					background-color: transparent !important;
				}
				
				.mainbox
				{
					height: 55% !important;
				}
				
				label 
				{
					color:white;
					
				}
				
				input
				{
					color: white !important;
				}
		</style>
	
		<title>Log In | Travel Companion</title>
		<link rel="stylesheet" href="assets/css/entryForm.css">
		<link rel="stylesheet" type="text/css" href="assets/css/easy-responsive-tabs.css " />
		<link href="assets/css/style.css" rel='stylesheet' type='text/css' />


		<script type="text/javascript">
		
			$(document).ready(function () {
				$('#logreg').attr('class', 'animatable');
				setTimeout(function () {
					$('#logreg').removeClass('animatable');
				}, 1000)
			});
			$(document).ready(function() {
				$('#loginbox').delay(800).fadeIn(1500);
			});
			$(document).ready(function() {
				$('.navbar').delay(600).fadeIn(1500);
			});
			function loginValidate(){
				var username = document.getElementById('login-username').value;
				var password = document.getElementById('login-password').value;
				if(username == "" || password == "") {
					alert("Please enter username and password");
				}
				else{
					//login successful, call the appropriate backend method.

					var username = document.getElementById('login-username').value;
					var password = document.getElementById('login-password').value;
					if(username == "" || password == "") {
						alert("Please enter all fields");
					}
					else
					{
						//alert("aaa")
						xhr = new XMLHttpRequest();
						var url = "login.php";
						var params = "username="+username+"&password="+password;
						xhr.open("POST",url,true);
						xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						xhr.send(params);
						xhr.onreadystatechange = function() {
							if(this.readyState == 4 && this.status == 200) {
								var response = this.responseText;
								console.log(response);
								if(response == 'true')
								{
									window.location = 'home.php';
								}
								else
								{
									alert('wrong entry');
								}
							}
						}
					}
				}
			}

			function forgotPasswordValidate(){
				var email = document.getElementById('resetEmail').value;

				if(email == "") {
					alert("Please enter email address");
				}
				else if (email.indexOf("@") < 1 || ( email.lastIndexOf(".") - email.indexOf("@") < 2 ))
				 {
					alert("Please enter correct email ID")
					return false;
				 }
				else{
					//forgot password successful, call the appropriate backend method.

				}
			}

			function signupValidate(){
				var username = document.getElementById('signup-username').value;
				var password = document.getElementById('signup-passwd').value;
				var firstname = document.getElementById('signup-firstname').value;
				var lastname = document.getElementById('signup-lastname').value;
				var email = document.getElementById('signup-email').value;
				alert(firstname);
				if(username == "" || password == "" || firstname == "" || lastname == ""||email == "") {
					alert("Please enter all fields");
				}
				else{
					//signup successful, call the appropriate backend method.3
					alert("aaa");
					xhr = new XMLHttpRequest();
					var url = "register.php";
					var params = "username="+username+"&"+"password="+password+"&"+"firstname="+firstname+"&"+"lastname="+lastname+"&"+"email="+email;

					xhr.open("POST",url,true);
					xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					
					xhr.onreadystatechange = function() {
							if(this.readyState == 4 && this.status == 200) {
								var response = this.responseText;
								console.log(response);
								if(response == 'true')
								{
									window.location = 'home.php';
								}
								else
								{
									alert('user already exists');
								}
							}
						}
					xhr.send(params);
				}
			}

		</script>
			
	</head>
		
	<body id="logreg" class="scaled">
	<video id="bgvid" playsinline autoplay muted loop>
		<source src="media/bannerlog.mp4" type="video/mp4">
	</video>	
	
		<div class="container">
			<div id="loginbox" class="mainbox col-md-2 col-md-offset-3 col-sm-8 col-sm-offset-2 loginbox" style="display: none; width: 100%">
				<div class="panel panel-info" >
					<div class="panel-heading">
						<div class="panel-title"> Sign In </div>
						<div class="forgot-password"> <a href="#" onClick="$('#forgotpasswordbox').show(); $('#loginbox').hide()">Forgot password?</a> </div>
					</div>
					<div class="panel-body panel-pad">
						<div id="login-alert" class="alert alert-danger col-sm-12 login-alert"></div>
							<form id="loginform" class="form-horizontal" role="form">
								<div class="input-group margT25">
									<span class="input-group-addon">
										<i class="glyphicon glyphicon-user"></i>
									</span>
									<input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Username">
								</div>
								<div class="input-group margT25">
									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									<input id="login-password" type="password" class="form-control" name="password" placeholder="Password">
								</div>
								<div class="form-group margT10">
								<!-- Button -->
									<div class="col-sm-12 controls">
										<a id="btn-login" href="#" class="btn btn-block btn-success" onclick="loginValidate()">Login </a>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12 controls">
										<div class="no-acc">
											Don't have an account?
											<a href="#" onClick="$('#signupbox').show(); $('#loginbox').hide()"> Sign Up Here </a>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div id="forgotpasswordbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 forgotpassword" style="display: none; width: 100%">
					<div class="panel panel-info" >
						<div class="panel-heading">
							<div class="panel-title"> Reset Password </div>
							<div class="backToSignIn"> <a href="#" onClick="$('#forgotpasswordbox').hide(); $('#loginbox').show()">Back to Sign In</a> </div>
						</div>
						<div class="panel-body panel-pad">
								<form id="forgotpasswordform" class="form-horizontal" role="form">
									<div class="form-group">
									<label for="resetEmail" class="col-md-3 control-label">Email</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="resetEmail" id="resetEmail" placeholder="Email">
									</div>
								 </div>
									<div class="form-group margT10">
									<!-- Button -->
										<div class="col-sm-12 controls">
											<a id="btn-reset" href="#" class="btn btn-block btn-success" onclick="forgotPasswordValidate()">Send Password Reset Email </a>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				<div id="signupbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 signup-box" style="display: none; width: 100%">
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title"> Sign Up </div>
						<div class="signin">
								<a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a>
						</div>
					</div>
					<div class="panel-body">
						<form id="signupform" class="form-horizontal" role="form">
							<div class="form-group">
								<label for="email" class="col-md-3 control-label">Email</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="email" id="signup-email" placeholder="Email Address">
								</div>
							 </div>
							 <div class="form-group">
								<label for="firstname" class="col-md-3 control-label">First Name</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="firstname" id="signup-firstname" placeholder="First Name">
								</div>
							 </div>
							 <div class="form-group">
								<label for="lastname" class="col-md-3 control-label">Last Name</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="lastname" id="signup-lastname" placeholder="Last Name">
								</div>
							 </div>
							 <div class="form-group">
								<label for="password" class="col-md-3 control-label">Password</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="passwd" id="signup-passwd" placeholder="Password">
								</div>
							 </div>
							 <div class="form-group">
								<label for="username" class="col-md-3 control-label">Username</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="username" id="signup-username" placeholder="Username">
								</div>
							 </div>
							 <div class="form-group">
							 <!-- Button -->
								<div class="col-md-offset-3 col-md-9">
									<button id="btn-signup" type="button" class="btn btn-info" onclick="signupValidate()"> <i class="icon-hand-right"></i> &nbsp; Sign Up </button>
								</div>
							 </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
