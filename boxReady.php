<?php 
session_start();
if(!isset($_SESSION['nom'])){
	header('Location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Oumbox</title>
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
	    <link rel="stylesheet" type="text/css" href="css/set1.css" />
	    <link rel="stylesheet" type="text/css" href="css/programme.css">
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/style_common.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	    <link href="css/bootstrap.css" rel="stylesheet">
	    <link href="css/bootstrap-responsive.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">

		
		<!-- header -->
		<link rel="stylesheet" type="text/css" href="css/header.css">
		<!-- end: CSS -->
		<style type="text/css">
			.alert-info, .information {
			    background-image: none;
			    background-color: #d9edf7;
			    color: #31708f;
			    border-color: #9acfea;
			}
			.alert {
			    padding: 15px;
			    margin-bottom: 20px;
			    border-width: 1px;
			    border-style: solid;
			}
			.boxReady{
				margin: 50px ;
				line-height: 20px;
			}

			.boxReady div{
				font-size: 2em;
				margin-top: 10px;
				color: #c36eaa;
			}
			.content p, .content ul li{
				margin-left: 30px !important;
				font-size: 18px;
				line-height: 35px;
			}
			input[type="submit"]{
				float: right;
			}

		</style>
</head>
<body>
<?php include('header.php'); ?>
	<div class="container">
		<div class="row">
			<div class="text-center boxReady">
			<h2>
				<!-- Bienenu <i><?php echo $_SESSION['nom']; ?></i>, -->Votre box est prête!
			</h2>
			<div class="text-center">Choisissez la méthode de livraison qui vous convient :</div>
			</div>
			
			<div class="alert alert-info col-md-12 col-sm-12 col-xs-12 content">
			    <p><span style="font-size:10.5pt;line-height:107%;font-family:Helvetica, sans-serif;background-image:initial;background-attachment:initial;background-size:initial;background-origin:initial;background-clip:initial;background-position:initial;background-repeat:initial;">
			    <h3>
			    	1-	Chez Oumbox : Gratuit
			    </h3>
			    <p>
			    	Au 77 bis Boulevard Abdelmoumen
			    	Casablanca, (en face de la station de tram Wafasalaf)
			    </p>
			    <p>
			    	tél : 0522 22 58 50
			    </p>
			    <p>
			    	Lundi au vendredi de 9h30 à 15H30 (Horaire Ramadan)
			    </p>

			    </span></p>
			</div>


			<div class="alert alert-success col-md-12 col-sm-12 col-xs-12 content">
			    <p><span style="font-size:10.5pt;line-height:107%;font-family:Helvetica, sans-serif;background-image:initial;background-attachment:initial;background-size:initial;background-origin:initial;background-clip:initial;background-position:initial;background-repeat:initial;">
			    <h3>
			    	2-	Livraison en points Relais Speed Box : 25 dhs
			    </h3>
			    <p>
			    	<ul>
			    		<li>a.	Choisissez le point relais le plus proche de chez vous sur la liste</li>
			    		<li>b.	Recevez un SMS quand votre box est livrée au point relais choisi</li>
			    		<li>c.	Présentez-vous au point relais choisi avec votre CIN et 25 dh pour récupérer votre box</li>
			    		<li>d.	Vous aurez après 7 a 10 j pour récupérer la box; sinon elle ne sera plus disponible</li>
			    	</ul>
			    </p>
			    <form method="post" action="maBox.php"><input type="hidden" name="type_livraison" value="SB" /><input type="submit" value="Demander la box" class="btn btn-primary"></form>
			    </span></p>
			</div>

			<div class="alert alert-warning col-md-12 col-sm-12 col-xs-12 content">
			    <p><span style="font-size:10.5pt;line-height:107%;font-family:Helvetica, sans-serif;background-image:initial;background-attachment:initial;background-size:initial;background-origin:initial;background-clip:initial;background-position:initial;background-repeat:initial;">
			    <h3>
			    	3-	Livraison limitée au centre de Casablanca pendant les horaires de bureau : 15 dhs
			    </h3>
			    <p>
			    	<ul>
			    		<li>a.	Choisissez votre quartier sur la liste</li>
			    		<li>b.	Recevez un appel de notre livreur pour programmer la livraison</li>
			    		<li>c.	Présentez votre CIN à notre livreur et 15 dhs pour récupérer votre box</li>
			    	</ul>
			    </p>
			    <form method="post" action="maBox.php"><input type="hidden" name="type_livraison" value="LD" /><input type="submit" value="Demander la box" class="btn btn-primary"></form>
			    </span></p>
			</div>	
		</div>
	</div>
<?php include('footer.php'); ?>

</body>
</html>