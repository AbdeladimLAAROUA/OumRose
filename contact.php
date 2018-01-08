<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Oumbox</title> 
	<meta name="description" content="GotYa Free Bootstrap Theme"/>
	<meta name="keywords" content="Template, Theme, web, html5, css3, Bootstrap" />
	<meta name="author" content="Łukasz Holeczek from creativeLabs"/>
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: Facebook Open Graph -->
	<meta property="og:title" content=""/>
	<meta property="og:description" content=""/>
	<meta property="og:type" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:image" content=""/>
	<!-- end: Facebook Open Graph -->

    <!-- start: CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
	
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/set1.css" />
    <link rel="stylesheet" type="text/css" href="css/programme.css">
	<link rel="stylesheet" type="text/css" href="css/component.css" />
	<link rel="stylesheet" type="text/css" href="css/style_common.css">
	<link rel="stylesheet" type="text/css" href="css/style1.css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	
	<!-- header -->
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<!-- end: CSS -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
	
	<?php include('header3.php'); ?>
	
	<!--start: Header -->
	<header style="border-bottom: 0px;">
		
		<!--start: Container -->
		<div class="container">
			
			<!--start: Row -->
			<div class="row">
					
				<!--start: Logo -->
				<div class="text-center"><a href="index.php"><img src="img/logo.png" ></a></div>
				<!--end: Logo -->
					
				<!--start: Navigation -->
					
				<!--end: Navigation -->
					
			</div>
			<!--end: Row -->
			
		</div>
		<!--end: Container-->			
			
	</header>
	<!--end: Header-->

	<!-- start: Map -->
	<div>

		<!-- starts: Google Maps -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<div id="googlemaps" class="google-map google-map-full"></div>
		<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
		<script src="js/jquery.gmap.min.js"></script>
		<script>

		  function initMap() {
		    var myLatLng = {lat: 33.5797897, lng: -7.6247194};

		    var map = new google.maps.Map(document.getElementById('googlemaps'), {
		      zoom: 16,
		      center: myLatLng
		    });

		    var marker = new google.maps.Marker({
		      position: myLatLng,
		      map: map,
		      title: 'Oumbox'
		    });
		  }
		</script>
		<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBrZqwoiE2SFo32PmyTGZo3D-jvfw5Y10&callback=initMap">
		</script>
		<!-- end: Google Maps -->
	</div>
	<!-- end: Map -->	
	
	<!-- start: Wrapper -->	
	<div id="wrapper"style="
    position: relative;
    top: 84px;">		

		<!-- start: Container -->	
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">
			
				<!-- start: Contact Info -->
				<div class="col-md-4">
					<div class="title"><h3>Contact</h3></div>
					<p>
						<b>Oumbox</b>
					</p>
					<p>
						77 bis, boulevard abdelmoumen
					</p>
					<p>	
						Casablanca
					</p>	
					<p>	
						
					</p>
					<p>	
						Tél.: 05 22 22 58 50
					</p>
					<p>
						Email: contact@oumbox.com
					</p>
					<p>
						Web: oumbox.com
					</p>
				</div>
				<!-- end: Contact Info -->		

				<!-- start: Contact Form -->
				<div class="col-md-4">
					<div class="title"><h3>Contact formulaire</h3></div>
                    <?php
                    if(isset($_SESSION['messageContact'])){
                        if ($_SESSION['messageContact']=="OK"){
                            echo "<div style='margin: 10px;display: block;font-weight: bold;color: #6cc;'>
                                    Votre message a été bien envoyé
                                  </div>";

                        } else {
                            echo "<div style='margin: 10px;display: block;font-weight: bold;color: red;'>
                                    Veuillez remplir tous les champs
                                  </div>";
                        }
                        session_unset($_SESSION['messageContact']);
                    }
                    ?>
					<!-- start: Contact Form -->
					<div id="contact-form">

						<form method="POST" action="tools/contact.php">

							<fieldset>
								<div class="clearfix">
									<label for="name"><span>Name:</span></label>
									<div class="input">
										<input tabindex="1" size="18" id="name" name="name" type="text" value="" required>
									</div>
								</div>

								<div class="clearfix">
									<label for="email"><span>Email:</span></label>
									<div class="input">
										<input tabindex="2" size="25" id="email" name="email" type="text" value="" class="input-xlarge"
                                               required>
									</div>
								</div>

                                <div class="clearfix">
									<label for="subject"><span>Sujet:</span></label>
                                    <select id="subject" name="subject" class="form-control" style="width:75%;">
                                        <option value="Partenaire médical">Partenaire médical</option>
                                        <option value="Annonceur">Annonceur</option>
                                        <option value="Question général">Question général</option>
                                    </select>
								</div>


								<div class="clearfix">
									<label for="message"><span>Message:</span></label>
									<div class="input">
										<textarea tabindex="3" class="input-xlarge" id="message" name="content" rows="7"
                                                  required></textarea>
									</div>
								</div>

								<div class="actions">
									<button tabindex="3" type="submit" class="btn btn-succes btn-large">Envoyer le message</button>
								</div>
							</fieldset>

						</form>

					</div>
					<!-- end: Contact Form -->

				</div>

                <div class="col-md-4 col-xs-12 col-sm-12">

                    <!-- start: Follow Us -->
                    <h3>Suivez nous!</h3>
                    <ul class="social-grid">
                        <li>
                            <div class="social-item">
                                <div class="social-info-wrap">
                                    <div class="social-info">
                                        <div class="social-info-front social-twitter">
                                            <a href="https://www.instagram.com/oumboxma/"></a>
                                        </div>
                                        <div class="social-info-back social-twitter-hover">
                                            <a href="https://www.instagram.com/oumboxma/"></a>
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
                                            <a href="https://www.facebook.com/oumbox/"></a>
                                        </div>
                                        <div class="social-info-back social-facebook-hover">
                                            <a href="https://www.facebook.com/oumbox/"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- <li>
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
                        </li> -->
                        <!-- <li>
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
                        </li> -->
                    </ul>
                    <!-- end: Follow Us -->

                    <!-- start: Newsletter -->
                    <!-- <form id="newsletter">
                        <h3>Newsletter</h3>
                        <p>Please leave us your email</p>
                        <label for="newsletter_input">@:</label>
                        <input type="text" id="newsletter_input"/>
                        <input type="submit" id="newsletter_submit" value="submit">
                    </form> -->
                    <!-- end: Newsletter -->

                </div>
				<!-- end: Contact Form -->

				<!-- start: Social Sites -->
				<!-- <div class="span5">
					<div class="title"><h3>Follow US!</h3></div>
					<ul class="social-bookmarks">
						<li class="aim"><a href="#">aim</a></li>
						<li class="apple"><a href="#">apple</a></li>
						<li class="behance"><a href="#">behance</a></li>
						<li class="blogger"><a href="#">blogger</a></li>
						<li class="cargo"><a href="#">cargo</a></li>
						<li class="delicious"><a href="#">delicious</a></li>
						<li class="deviantart"><a href="#">deviantart</a></li>
						<li class="digg"><a href="#">digg</a></li>
						<li class="dopplr"><a href="#">dopplr</a></li>
						<li class="dribbble"><a href="#">dribbble</a></li>
						<li class="ember"><a href="#">ember</a></li>
						<li class="evernote"><a href="#">evernote</a></li>
						<li class="facebook"><a href="https://www.facebook.com/brankic1979themes">facebook</a></li>
						<li class="flickr"><a href="http://www.flickr.com/photos/brankic1979/">flickr</a></li>
						<li class="forrst"><a href="#">forrst</a></li>
						<li class="github"><a href="#">github</a></li>
						<li class="google"><a href="#">google</a></li>
						<li class="googleplus"><a href="#">googleplus</a></li>
						<li class="gowalla"><a href="#">gowalla</a></li>
						<li class="grooveshark"><a href="#">grooveshark</a></li>
						<li class="html5"><a href="#">html5</a></li>
						<li class="icloud"><a href="#">icloud</a></li>
						<li class="lastfm"><a href="#">lastfm</a></li>
						<li class="linkedin"><a href="#">linkedin</a></li>
						<li class="metacafe"><a href="#">metacafe</a></li>
						<li class="mixx"><a href="#">mixx</a></li>
						<li class="myspace"><a href="#">myspace</a></li>
						<li class="netvibes"><a href="#">netvibes</a></li>
						<li class="newsvine"><a href="#">newsvine</a></li>
						<li class="orkut"><a href="#">orkut</a></li>
						<li class="paypal"><a href="#">paypal</a></li>
						<li class="picasa"><a href="#">picasa</a></li>
						<li class="pinterest"><a href="#">pinterest</a></li>
						<li class="plurk"><a href="#">plurk</a></li>
						<li class="posterous"><a href="#">posterous</a></li>
						<li class="reddit"><a href="#">reddit</a></li>
						<li class="rss"><a href="#">rss</a></li>
						<li class="skype"><a href="#">skype</a></li>
						<li class="stumbleupon"><a href="#">stumbleupon</a></li>
						<li class="technorati"><a href="#">technorati</a></li>
						<li class="tumblr"><a href="#">tumblr</a></li>
						<li class="twitter"><a href="#">twitter</a></li>
						<li class="vimeo"><a href="#">vimeo</a></li>
						<li class="wordpress"><a href="#">wordpress</a></li>
						<li class="yahoo"><a href="#">yahoo</a></li>
						<li class="yelp"><a href="#">yelp</a></li>
						<li class="youtube"><a href="#">youtube</a></li>
						<li class="zerply"><a href="#">zerply</a></li>
						<li class="zootool"><a href="#">zootool</a></li>
					</ul>
				</div> -->
				<!-- end: Social Sites -->
			
			</div>
			<!-- end: Row -->

		</div>
		<!-- end: Container -->
				
  	</div>
	<!-- end: Wrapper  -->			

	</div>
	<!-- end: Footer -->

	
<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.8.2.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/flexslider.js"></script>
<script src="js/carousel.js"></script>
<script src="js/jquery.cslider.js"></script>
<script src="js/slider.js"></script>
<script def src="js/custom.js"></script>
<!-- end: Java Script -->

</body>
</html>