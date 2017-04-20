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
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		
	</head>
	<body>
		<div class="container">
		<img src="img/bebe-maman@2x.jpg">
			
			<section class="content askForBox">
				<h2>Commander votre box</h2>
				<form method="post" action="commandeBox.php">
				<?php
					if(isset($_SESSION['result'])){
						echo $_SESSION['result']['response'];
						
					}else{

					}
				?>

				<div class="container askForBox">
					<section class="content">
						<span class="input input--isao">
							<input class="input__field input__field--isao" type="text" id="input-38" name ="email" />
							<label class="input__label input__label--isao" for="input-38" data-content="Email">
								<span class="input__label-content input__label-content--isao">Email</span>
							</label>
						</span>
						<span class="input input--isao">
							<input class="input__field input__field--isao" type="password" id="input-39" name="password" />
							<label class="input__label input__label--isao" for="input-39" data-content="Password">
								<span class="input__label-content input__label-content--isao">Mot de passe</span>
							</label>
						</span>
					</section>
				</div>		

				<input type="submit" value="Envoyer" class="btn btn-info">
				</form>
			</section>
			
			
		</div><!-- /container -->
	</body>
</html>
