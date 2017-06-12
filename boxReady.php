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
			.row div.col-md-12{
				border: solid 1px #9c4691;
				padding: 13px;
				margin-bottom: 20px;
				border-radius: 10px;
			}
			.content p, .content ul li{
				margin-left: 30px !important;
				font-size: 18px;
				line-height: 35px;
			}
			input[type="submit"]{
				float: right;
				background: #df5b79 ;
				margin-left: 10px;
			}
			h2 ul li:nth-child(1) {
				/*color:#ec7f8c;*/
				margin: 20px;
				border-bottom: solid 2px;
				display: inline-block;
			}
			h2 ul li:nth-child(2) {
				/*color:#ec7f8c;*/
				font-size: 20px;
			}
			h2 ul li:nth-child(3) {
				color:#6fc7c2;
				font-size: 20px;
			}
			h2 ul li:nth-child(4) {
				color:#8e6cac;
				font-size: 20px;
			}
		</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="text-center boxReady">
			<img src="img/logo.png">
			<!-- <h2>
				 Bienvenue Mme <i><?php echo $_SESSION['nom']; ?></i>, Votre box est prête!
			</h2> -->
			<h2>
				<?php
					if($_SESSION['eligibleToBox']==0){
						echo "Chère ".$_SESSION['nom'].", vous n'êtes éligible à aucune box pour le moment <br/>
				<ul>
				   <li style='line-height: 40px;  color=#ec7f8c;'>Critères d'éligibilité</li>
				   <li style='line-height: 40px;  color=#ec7f8c;'>Box rose (Je suis enceinte) : du 5ème au 8ème mois de grossesse</li>
				   <li style='line-height: 40px; color=#6fc7c2;'>Box vert (Bébé est là!) : de la naissance à 3 mois</li>
				   <li style='line-height: 40px; color=#8e6cac;'>Box mauve (Bébé grandit): de 6 à 9 mois</li>
				</ul>";
					}
					else if(isset($_SESSION['result1'])){
						echo $_SESSION['result1']['response'];
					}
				?>
			</h2>
			<?php 
				if($_SESSION['eligibleToBox']!=0){
			 ?>
			<div class="text-center">Choisissez la méthode de livraison qui vous convient :</div>
			<?php } ?>
			<img src="img/simulation guide+box oumbox.png" style="width: 75%;margin-top: 35px;">
			</div>
			<?php 
				if($_SESSION['eligibleToBox']!=0){
			 ?>
			<div class="col-md-12 col-sm-12 col-xs-12 content">
			    <p><span style="font-size:10.5pt;line-height:107%;font-family:Helvetica, sans-serif;background-image:initial;background-attachment:initial;background-size:initial;background-origin:initial;background-clip:initial;background-position:initial;background-repeat:initial;">
			    <h3>
			    	a-	Chez Oumbox : Gratuit
			    </h3>
			    <p>
			    	Venez récupérer votre box au 77 bis Boulevard Abdelmoumen
			    	Casablanca, (en face de la station de tram Wafasalaf)
			    </p>
			    <p>
			    	tél : 0522 22 58 50
			    </p>
			    <p>
			    	Lundi au vendredi de 9h30 à 15H30 (Horaire Ramadan)
			    </p>
			    <input type="hidden" name="type_livraison" value="SB" /><input type="submit" value="Localisez-nous" class="btn btn-primary">
			    <form method="post" action="maBox.php"><input type="hidden" name="type_livraison" value="OX" /><input type="submit" value="Commander ma box" class="btn btn-primary"></form>
			    </span></p>
			</div>


			<div class=" col-md-12 col-sm-12 col-xs-12 content">
			    <p><span style="font-size:10.5pt;line-height:107%;font-family:Helvetica, sans-serif;background-image:initial;background-attachment:initial;background-size:initial;background-origin:initial;background-clip:initial;background-position:initial;background-repeat:initial;">
			    <h3>
			    	b-	Livraison en points Relais Speed Box : 25 dhs
			    </h3>
			    <p>
			    	<ul>
			    		<li>1.	Choisissez le point relais le plus proche de chez vous sur la liste</li>
			    		<li>2.	Recevez un SMS quand votre box est livrée au point relais choisi</li>
			    		<li>3.	Présentez-vous au point relais choisi avec votre CIN et 25 dh pour récupérer votre box</li>
			    		<li>4.	Vous aurez après 7 a 10 j pour récupérer la box; sinon elle ne sera plus disponible</li>
			    	</ul>
			    </p>
			    <form method="post" action="maBox.php"><input type="hidden" name="type_livraison" value="SB" /><input type="submit" value="Commander ma box" class="btn btn-primary"></form>
			    </span></p>
			</div>

			<div class="col-md-12 col-sm-12 col-xs-12 content">
			    <p><span style="font-size:10.5pt;line-height:107%;font-family:Helvetica, sans-serif;background-image:initial;background-attachment:initial;background-size:initial;background-origin:initial;background-clip:initial;background-position:initial;background-repeat:initial;">
			    <h3>
			    	c-	Livraison limitée au centre de Casablanca pendant les horaires de bureau : 20 dhs
			    </h3>
			    <p>
			    	<ul>
			    		<li>1.	Choisissez votre quartier sur la liste</li>
			    		<li>2.	Recevez un appel de notre livreur pour programmer la livraison</li>
			    		<li>3.	Présentez votre CIN à notre livreur et 20 dhs pour récupérer votre box</li>
			    	</ul>
			    </p>
			    <form method="post" action="maBox.php"><input type="hidden" name="type_livraison" value="LD" /><input type="submit" value="Commander ma box" class="btn btn-primary"></form>
			    </span></p>
			</div>	
			<?php } ?>
		</div>
	</div>
<?php include('footer.php'); ?>

</body>
</html>