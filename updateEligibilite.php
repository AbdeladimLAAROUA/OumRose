<?php
session_start();

include('config.php');

		
		$users = gestAllUsers();

		foreach ($users as $key => $user) {
			
		$baby = getBaby($conn,$user);
		$boxList = getClientBox($conn,$user);

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
		}
		$info["success"]=true;
		$_SESSION['result1']=$info;
		$_SESSION['eligibleToBox']=$info["box"];
		}

		

?>