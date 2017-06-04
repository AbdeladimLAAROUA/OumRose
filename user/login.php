<?php
session_start();

include('../config.php');
$info["success"]=true;
$info["response"]='Tous les paramètres sont obligatoires';
$info["mCode"]="0";
if(isset($_POST['email']) and isset($_POST['password']) ){
	$email = $_POST['email'];
	$password = $_POST['password'];

	//authentification
	$user = login($conn,$email,$password);
	
	// si on a trouvé l'utilisateur
	if($user != null){
		
		$baby = getBaby($conn,$user);
		$boxList = getClientBox($conn,$user);

		print_r($boxList);
		// Date d'aujourd'hui
		$today = new DateTime(date('Y-m-d'));

		/*//Ajout de 3 mois sur la date d'aujourd'hui
		$dateInThreeMonth = $today->add(new DateInterval('P3M'));*/

		// Date de naissance du bébé

		$naissance= new DateTime($baby['naissance']);
		

		$interval = date_diff($today, $naissance);

		$diffJours = $interval->format('%R%a days');
		
		if($diffJours>=7 && $diffJours<=146 && !in_array("1", $boxList)){
				$info["response"]="Chère ".$user['nom'].", vous êtes éligible à la box  \"Je suis enceinte\" ";
				$info["mCode"]=1;
				$info["box"]=1;
		}
		else if($diffJours<=-7 && $diffJours>=-122 and !in_array("2", $boxList)){
				$info["response"]="Chère ".$user['nom'].", vous êtes éligible à la box  \"Bébé est là!\" ";
				$info["mCode"]=2;
				$info["box"]=2;
		}
		else if($diffJours<=-183 && $diffJours>=-305 and !in_array("3", $boxList)){
				$info["response"]="Chère ".$user['nom'].", vous êtes éligible à la box  \"Bébé grandit\" ";
				$info["mCode"]=3;
				$info["box"]=3;
		}else{
				$info["response"]= "Chère ".$user['nom'].", vous n'êtes éligible à aucune box pour le moment <br/>
				<ul>
				   <li>Box rose : </li>
				   <li>Box vert : </li>
				   <li>Box vert : </li>
				</ul>";
				$info["box"]=0;
		}
		
		
		$info["success"]=true;
		$_SESSION['result1']=$info;
		$_SESSION['eligibleToBox']=$info["box"];
		//echo $_SESSION['eligibleToBox'];
		header('Location:../boxReady.php');
		
	}else{
		$info["success"]=false;
		$info["response"]='Email ou password incorrect';
		$_SESSION['result']=$info;
		header('Location:../login.php');
	}
}
/*if(isset($_POST['email']) and !isset($_POST['password']) ){
	$email = $_POST['email'];
	

	//authentification
	$user = loginByEmail($conn,$email);
	
	// si on a trouvé l'utilisateur
	if($user != null){
		$info["success"]=true;
		$_SESSION['result1']=$info;
		header('Location:../boxReady.php');
		
	}else{
		$info["success"]=false;
		$info["response"]='Email incorrect';
		$_SESSION['result']=$info;
		header('Location:../login.php');
	}
}*/
else{
	$info["success"]=false;
	$_SESSION['result']=$info;
	header('Location:../login.php');
	
}



?>