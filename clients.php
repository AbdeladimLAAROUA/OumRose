<?php  session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Oumbox</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/client.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container">
	<img src="img/logo.png"/>
	<form method="get" action="user/infos.php">
		email : <input type="text" name="email" />
				<input type="submit" value="Rechercher">
	</form>
	<?php 
		if(isset($_SESSION['result']) and !$_SESSION['result']['success']){
			echo $_SESSION['result']['response'];
			session_unset($_SESSION['result']);
		}
	 ?>
	<div class="client">
		<div class="row">
			<div class="col-md-2">
				nom : 
			</div>
			<div class="col-md-2">
				<?php echo $_SESSION['user']['nom']; ?>
			</div>
			<div class="col-md-2">
				prenom : 
			</div>
			<div class="col-md-2">
				<?php echo $_SESSION['user']['prenom']; ?>
			</div>
			<div class="col-md-2">
				date d'accouchement : 
			</div>
			<div class="col-md-2">
				<?php echo $_SESSION['user']['naissance']; ?>
			</div>
		</div>
	</div>

	<form method="post" action="user/infos.php">
	Confirmer la réception de : 
	<select name="box">
		<option value="box1">Box 1</option>
		<option value="box2">Box 2</option>
		<option value="box3">Box 3</option>
	</select>	
	<br/>
	<input type="submit" value="Envoyer" class="btn btn-primary"/>

	</form>
</div>
</body>
</html>