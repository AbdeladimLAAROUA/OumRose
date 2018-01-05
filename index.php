<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>OUMBOX</title>
	<meta name="description" content="GotYa Free Bootstrap Theme"/>
	<meta name="keywords" content="Template, Theme, web, html5, css3, Bootstrap" />
	<meta name="author" content="Łukasz Holeczek from creativeLabs"/>
	<meta name="theme-color" content="#FF66CC" />
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

    <!-- favicon -->
	<link rel="shortcut icon" href="img/icons/fav.ico" />

    <!-- start: CSS -->

	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">

	<!-- <link rel="stylesheet" href="css/movieBase.css">
     <link rel="stylesheet" href="css/movieVendor.css">
    <link rel="stylesheet" href="css/movieMain.css"> -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<link href="css/style2.css" rel="stylesheet" media="screen">
	<link href="http://fonts.googleapis.com/css?family=Cabin:400,500,600,700|Asap:400,700" rel="stylesheet" type="text/css">

	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon.png">

	<link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/set1.css" />
    <link rel="stylesheet" type="text/css" href="css/programme.css">
	<link rel="stylesheet" type="text/css" href="css/component.css" />
	<link rel="stylesheet" type="text/css" href="css/style_common.css">
	<link rel="stylesheet" type="text/css" href="css/style1.css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/header.css">


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	<!-- <script src="js/movieModernizr.js"></script> -->
	<script src="js/jquery-1.8.2.js"></script>
    <style>
        .timeline-wrapper{
            margin: auto;
            position: relative;
            right: 65px;
        }
    </style>

</head>
<body>

	<!--start: Header -->
	<header>
		<?php include('header3.php'); ?>
	</header>
	<!--end: Header-->


	<!-- start: Slider -->
	   <?php include('slider.php');  ?>
	<!-- end: Slider -->

	<!--start: Wrapper-->
	<div id="wrapper">
	<?php include('programme2.php'); ?>
	<div class="container part2">
            <div class="title">Comment ça marche ?</div>
            <div class="subtitle">Vous pouvez mettre une petite description ici. Comment ça marche </div>

            <div>
                <div class="col-md-4">
                    <a href="register.php" style="text-decoration: none;">
                    	<div class="block">
                    	    <img class="logoProgramme" src="img/avatar_femme.png" style="width: 55px;">
                    	    <div class="description1">
                    	        Je m'inscris, c'est gratuit!
                    	    </div>
                    	    <div class="description2" style="text-align: left;position: relative;left: 49px;">
                    	        1- Je renseigne mes informations<br/>
                                2- Je valide mon inscription par email<br/>
                                3- Je reçois mon email de bienvenue<br/>
                    	    </div>
                    	</div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="oxProgramme.php" style="text-decoration: none;">
                    	<div class="block">
                    	    <img class="logoProgramme2" src="img/simulation guide+box oumbox.png">
                    	    <div class="description1">
                    	        Je découvre le programme
                    	    </div>
                    	    <div class="description2" style="text-align: left">
                    	        1- Je découve le programme oumbox en détail<br/>
                                2- Je reçois les newsletters mensuelles<br/>
                                3- Je consulte les articles du blog <br/>
                    	    </div>
                    	</div>
                    </a>
                </div>
                <div class="col-md-4">
                    <div class="block">
                        <img class="logoProgramme" src="img/cadeau.png">
                        <div class="description1">
                           Je reçois mes cadeaux
                        </div>
                        <div class="description2" style="text-align:left ;">
                            1- Je reçois un email pour commander ma box<br/>
                            2- Je me connecte à mon espace personnel<br/>
                            3- Je choisi le mode de livarison<br/>
                            4- Je reçois ma box<br/>
                        </div>
                    </div>
                </div>
            </div>
            <a class="goTopLink" href="#">-Go-to-top-</a>
           </div>

        <?php
        /*include('movie.php'); */
        ?>
		<!--start: Container -->
    	<div class="">

      		<!-- start: Hero Unit - Main hero unit for a primary marketing message or call to action -->

      		<div class="container">
      			      		<div class="row section2"  >

      						      <h2><span>Nos partenaires médicaux</span></h2>

      			        		<!-- <div class="col-md-4">
      			          			<div class="view view-first">
      			                    <img src="img/magasin.jpg" />
      			                    <div class="mask">
      			                        <h2>Magasins</h2>
      			                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
      			                        <a href="#" class="info">Localiser</a>
      			                    </div>
      			                </div>
      			        		</div> -->

      			        		<div class="col-md-6">
      			          			 <div class="view view-first">
      			                    <img src="img/docteur.jpg" />
      			                    <div class="mask">
      			                        <h2>Médecins</h2>
      			                        <p>Retrouvez la liste des gynécologues et pédiatres partenaires qui disposent de nos guides OUMBOX</p>
      			                        <a href="partenaires.php?search=Médecin" class="info">Localiser</a>
      			                    </div>
      			                </div>
      			        		</div>

      			        		<div class="col-md-6">
      			          			<div class="view view-first">
      			                    <img src="img/hopital.jpg" />
      			                    <div class="mask">
      			                        <h2>Cliniques</h2>
      			                        <p>Oumbox distribue les box et guides "Bébé est la!" dans les cliniques partenaires</p>
      			                        <a href="partenaires.php?search=Clinique" class="info">Localiser</a>
      			                    </div>
      			                </div>
      			        		</div>



      			      		</div>
      		</div>
			<!-- end: Row -->
			<!-- <hr> -->
			<!-- start: Row -->
      		<?php include('derniersArticles.php'); ?>
			<!-- end: Row -->


			<!-- <hr> -->
			<!-- start Clients List -->
			<!-- <div class="clients-carousel">

				<ul class="slides clients">
					<li><img src="img/logos/1.png" alt=""/></li>
					<li><img src="img/logos/2.png" alt=""/></li>
					<li><img src="img/logos/3.png" alt=""/></li>
					<li><img src="img/logos/4.png" alt=""/></li>
					<li><img src="img/logos/5.png" alt=""/></li>
					<li><img src="img/logos/6.png" alt=""/></li>
					<li><img src="img/logos/7.png" alt=""/></li>
					<li><img src="img/logos/8.png" alt=""/></li>
					<li><img src="img/logos/9.png" alt=""/></li>
					<li><img src="img/logos/10.png" alt=""/></li>
				</ul>

			</div> -->
			<!-- end Clients List -->



			<!-- start: Row -->

			<!-- end: Row -->



		</div>
		<!--end: Container-->

	</div>
	<!-- end: Wrapper  -->



	<!-- start: Footer -->
	<?php include('footer.php') ?>
	<!-- end: Footer -->

	<!-- start: Copyright -->
	<div id="copyright">

		<!-- start: Container -->
		<!-- <div class="container">

			<p>
				&copy; 2013, creativeLabs. <a href="http://bootstrapmaster.com" alt="Bootstrap Themes">Bootstrap Themes</a> designed by BootstrapMaster in Poland <img src="img/poland2.png" alt="Poland" style="margin-top:-4px">
			</p>

		</div> -->
		<!-- end: Container  -->

	</div>
	<!-- end: Copyright -->

<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="js/flexslider.js"></script>
<script src="js/carousel.js"></script>
<script src="js/jquery.cslider.js"></script>
<script src="js/slider.js"></script>
<!-- <script defer="defer" src="js/custom.js"></script>
<script src="js/moviePlugins.js"></script>
<script src="js/movieMain.js"></script>
<script type="text/javascript" src="js/header.js"></script> -->
<script type="text/javascript">
	var fixmeTop = $('.fixme').offset().top;
	$(window).scroll(function() {
	    var currentScroll = $(window).scrollTop();
	    if (currentScroll >= fixmeTop) {
	        $('.fixme').css({
	            position: 'fixed',
	            top: '0',
	            left: '0'
	        });
	    } else {
	        $('.fixme').css({
	            position: 'static'
	        });
	    }
	});

</script>
<!-- end: Java Script -->

	<script type="text/javascript">

       $(".inscriptionBtn").click(function() {
	   window.location.replace('register.php');
	});
	</script>
	<script type="text/javascript">
		$(".goTopLink").click(function() {
		    $('html, body').animate({
		        scrollTop: $("header").offset().top
			}, 1000);
		});
	</script>
</body>
</html>