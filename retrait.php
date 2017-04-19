<?php
include('config.php');
$info["success"]=true;
$info["response"]='';
if(isset($_POST['email']) and isset($_POST['password'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

	//authentification
	$user = login($conn,$email,$password);
	
	// si on a trouvé l'utilisateur
	if($user != null){

		$baby = getBaby($conn,$user);
		// Date d'aujourd'hui
		$today = new DateTime(date('Y-m-d'));

		/*//Ajout de 3 mois sur la date d'aujourd'hui
		$dateInThreeMonth = $today->add(new DateInterval('P3M'));*/

		// Date de naissance du bébé

		$naissance= new DateTime($baby['naissance']);
		

		$interval = date_diff($today, $naissance);

		$diffJours = $interval->format('%R%a days');

		if($diffJours>0 && $diffJours<92){
				$info["response"]="Chère khalid ESSALHI, vous éligible à la box  \"Je suis enceinte\" ";
		}
		else if($diffJours<0 && $diffJours>-92){
				$info["response"]="Chère khalid ESSALHI, vous éligible à la box  \"Bébé est là!\" ";
		}
		else if($diffJours<-183 && $diffJours>-276){
				$info["response"]="Chère khalid ESSALHI, vous éligible à la box  \"Bébé grandit\" ";
		}else{
				$info["response"]= "Chère khalid ESSALHI, vous n'êtes éligible à aucune box pour le moment (du 5ème au 8ème mois de grossesse : box \"Je suis enceinte\", de la naissance à 3 mois : box \"Bébé est là!\", de 6 à 9 mois : box \"Bébé grandit\").";
		}
		
		
		$info["success"]=true;
		
		echo json_encode($info);
		exit();
	}else{
		$info["success"]=false;
		$info["response"]='userNotExists';
		echo json_encode($info);
		exit();
	}
}else{
	$info["success"]=false;
	echo json_encode($info);
	
}



?>