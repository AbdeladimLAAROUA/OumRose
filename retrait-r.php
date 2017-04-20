<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="utf-8"/>
		
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo1.css" />
		<link rel="stylesheet" type="text/css" href="css/set2.css" />
		<link rel="stylesheet" type="text/css" href="js/bootstrap.js">
		
	    <!-- start: CSS -->
	    
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">

		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/demo1.css" />
	    <link rel="stylesheet" type="text/css" href="css/set1.css" />
	    <link rel="stylesheet" type="text/css" href="css/set2.css" />
	    <link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/style_common.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	    <link href="css/bootstrap.css" rel="stylesheet">
	    <link href="css/bootstrap-responsive.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		
	</head>
	<body>
		<!--start: Header -->
	<header>
		
		<!--start: Container -->
		<div class="container">
			
			<!--start: Row -->
			<div class="row">
					
				<!--start: Logo -->
				<div class="logo span3">
						
					<a class="brand" href="#"><img src="img/logo.png" alt="Logo"></a>
						
				</div>
				<!--end: Logo -->
					
				<!--start: Navigation -->
				<div class="span9 ">
					
						<div class="navbar navbar-inverse">
			    		<div class="navbar-inner">
			          		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			            		<span class="icon-bar"></span>
			            		<span class="icon-bar"></span>
			            		<span class="icon-bar"></span>
			          		</a>
			          		<div class="nav-collapse collapse">
			            		<ul class="nav cl-effect-9">
			              			<li ><a href="index.html"><span>Grossesse</span><span>Suivi de ma grossesse</span></a><li>
									<li class="active"><a  href="#"><span>Box</span><span></span></a></li>
									<li ><a  href="#"><span>Bébé</span><span>Santé bébé</span></a></li>
									<li><a href="#"><span>Programme</span><span></span></a></li>
									<li><a href="#"><span>Partenaires</span><span></span></a></li>
							              			
			            		</ul>
			          		</div>
			        	</div>
			      	</div>
					
				</div>


				<!--end: Navigation -->
					<!-- <div>aaa</div> -->
			</div>
			<!--end: Row -->
			
		</div>
		<!--end: Container-->			
		
	</header>
	<!--end: Header-->
		<div class="section1">
					<section class="content askForBox">
						<h2>
							<?php
								if(isset($_SESSION['result1'])){
									echo $_SESSION['result1']['response'];
								}
							?>
						</h2>
						<img src="img/guide<?php echo $_SESSION['result1']['mCode']; ?>box.png" class="imgBox" alt="box1">
						
						<form method="post" action="reserverBox.php">
						<input type="submit" value="Obtenir sa box" class="btn btn-info">
						</form>
					</section>			
				</div><!-- /container -->

		<!-- start: Footer -->
		<div id="footer">
		
		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">

				<!-- start: About -->
				<div class="span3">
					
					<h3>About Us</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
					</p>
						
				</div>
				<!-- end: About -->

				<!-- start: Photo Stream -->
				<div class="span4">
					
					<h3>We are here!</h3>
					<div id="small-map-container"><a href="contact.html"></a></div>
					<iframe id="small-map" width="210" height="210" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d830.9964799260239!2d-7.625237066526706!3d33.57971483992227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7d2b11a0f11d5%3A0x1ca6d976ea310f70!2sOUMBOX!5e0!3m2!1sfr!2sfr!4v1492113064260"></iframe>
					
				</div>
				<!-- end: Photo Stream -->

				<div class="span5">
				
					<!-- start: Follow Us -->
					<h3>Follow Us!</h3>
					<ul class="social-grid">
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-twitter">
											<a href="http://twitter.com"></a>
										</div>
										<div class="social-info-back social-twitter-hover">
											<a href="http://twitter.com"></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-facebook">
											<a href="http://facebook.com"></a>
										</div>
										<div class="social-info-back social-facebook-hover">
											<a href="http://facebook.com"></a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-dribbble">
											<a href="http://dribbble.com"></a>
										</div>
										<div class="social-info-back social-dribbble-hover">
											<a href="http://dribbble.com"></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-flickr">
											<a href="http://flickr.com"></a>
										</div>
										<div class="social-info-back social-flickr-hover">
											<a href="http://flickr.com"></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
					</ul>
					<!-- end: Follow Us -->
				
					<!-- start: Newsletter -->
					<form id="newsletter">
						<h3>Newsletter</h3>
						<p>Please leave us your email</p>
						<label for="newsletter_input">@:</label>
						<input type="text" id="newsletter_input"/>
						<input type="submit" id="newsletter_submit" value="submit">
					</form>
					<!-- end: Newsletter -->
				
				</div>
				
			</div>
			<!-- end: Row -->	
			
		</div>
		<!-- end: Container  -->

	<!-- start: Java Script -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="js/jquery-1.8.2.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/flexslider.js"></script>
	<script src="js/carousel.js"></script>
	<script src="js/jquery.cslider.js"></script>
	<script src="js/slider.js"></script>
	<script defer="defer" src="js/custom.js"></script>
	<!-- end: Java Script -->
	</body>
</html>
