<?php 
	include_once('template.php');
?>
<html>
	<head>
		<title>Travel Companion</title>
		<style>
			
			body
			{
				overflow-x: hidden;
				overflow-y: hidden;
			}
			
			#homepage
			{
				background-position: 50% 50%;
				z-index: 1;
				background: rgba(0, 0, 0, 0) url(Journey.png) no-repeat scroll 50% 50% / cover padding-box border-box;
				font: normal normal normal 16px/normal Helvetica, Arial, sans-serif;
				background-size:cover;
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
			
			.carousel:hover, .panel:hover
			{
				cursor:pointer;
			}
			
			.navbar
			{
				display: none;   
			}​

		</style>
		
		<script type="text/javascript">
			$(document).ready(function () {
				$('#homepage').attr('class', 'animatable');
				setTimeout(function () {
					$('#homepage').removeClass('animatable');
				}, 1000)
			});
			$(document).ready(function() {
				$('.overlay1').delay(600).fadeIn(1200);
			});
			/*$(document).ready(function() {
				$('.navbar').delay(600).fadeIn(1200);
			});*/
		</script>
	</head>

	<body id="homepage" class="scaled")">
		<title>Travel Companion</title>
		<div class="col-md-13">
			<div data-interval="24000" id="carousel-banner" class="carousel slide carousel-fade" data-ride="carousel" height="100%" width="100%">
				
				<ol class="carousel-indicators">
		          <li data-target="#carousel-banner" data-slide-to="0" class="active"></li>
		          <li data-target="#carousel-banner" data-slide-to="1"></li>
				  <li data-target="#carousel-banner" data-slide-to="2"></li>
				  <li data-target="#carousel-banner" data-slide-to="3"></li>
				  <li data-target="#carousel-banner" data-slide-to="4"></li>
		        </ol>
				
				<div class="carousel-inner">
				  
					<div class="item active">
						<div class="carousel-content">
							<section id="banner1" data-video="media/banner1">
								<div class="inner">
									<div class="logo"><a href="index.html"><span></span></a></div>
									<h1 id="overlay1">Travel Companion</h1>
									<a href="login_register.php" class="button special scrolly">Get Started</a>
								</div>
							</section>
						</div>
					</div>
					
					<div class="item">
						<div class="carousel-content">
							<section id="banner2" data-video="media/banner2">
								<div class="inner">
									<h1>Travel Companion</h1>
								</div>
							</section>
						</div>
					</div>
					
					<div class="item">
						<div class="carousel-content">
							<section id="banner3" data-video="media/banner3">
								<div class="inner">
									<h1>Travel Companion</h1>
								</div>
							</section>
						</div>
					</div>
					
					<div class="item">
						<div class="carousel-content">
							<section id="banner4" data-video="media/banner4">
								<div class="inner">
									<h1>Travel Companion</h1>
								</div>
							</section>
						</div>
					</div>
					
					<div class="item">
						<div class="carousel-content">
							<section id="banner5" data-video="media/banner5">
								<div class="inner">
									<h1>Travel Companion</h1>
								</div>
							</section>
						</div>
					</div>
					
					<!--<div class="item">
						<div class="carousel-content">
							<section id="banner6" data-video="media/banner6">
								<div class="inner">
									<h1>Travel Companion</h1>
								</div>
							</section>
						</div>
					</div>
					
					<div class="item">
						<div class="carousel-content">
							<section id="banner7" data-video="media/banner7">
								<div class="inner">
									<h1>Travel Companion</h1>
								</div>
							</section>
						</div>
					</div>
					
					<div class="item">
						<div class="carousel-content">
							<section id="banner8" data-video="media/banner8">
								<div class="inner">
									<h1>Travel Companion</h1>
									<a href="home.php" class="button special scrolly">Get Started</a>
								</div>
							</section>
						</div>
					</div>
					
					<div class="item">
						<div class="carousel-content">
							<section id="banner9" data-video="media/banner9">
								<div class="inner">
									<h1>Travel Companion</h1>
									<a href="home.php" class="button special scrolly">Get Started</a>
								</div>
							</section>
						</div>
					</div>
					
					<div class="item">
						<div class="carousel-content">
							<section id="banner10" data-video="media/banner10">
								<div class="inner">
									<h1>Travel Companion</h1>
									<a href="home.php" class="button special scrolly">Get Started</a>
								</div>
							</section>
						</div>
					</div>
					
					<div class="item">
						<div class="carousel-content">
							<section id="banner11" data-video="media/banner11">
								<div class="inner">
									<h1>Travel Companion</h1>
									<a href="home.php" class="button special scrolly">Get Started</a>
								</div>
							</section>
						</div>
					</div>
					
					<div class="item">
						<div class="carousel-content">
							<section id="banner12" data-video="media/banner12">
								<div class="inner">
									<h1>Travel Companion</h1>
									<a href="home.php" class="button special scrolly">Get Started</a>
								</div>
							</section>
						</div>
					</div>-->
					
			</div>
		</div>

		<a class="left carousel-control" href="#carousel-banner" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
		</a>
		<a class="right carousel-control" href="#carousel-banner" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
		</a>
				  
	</body>
</html>
