<?php

	// Date d'aujourd'hui
	/*$today = new DateTime(date('Y-m-d'));
	$today2 = new DateTime(date('Y-m-d'));*/

	/*$dateInSixMonth = $today->add(new DateInterval('P9M'));*/
	/*
	$naissance =  new DateTime('2017-7-20');


	$interval = date_diff($today, $naissance);


	$diffJours =  $interval->format('%R%a days');

	if($diffJours>0 && $diffJours<92){
			echo "box1 :".$diffJours;
	}
	else if($diffJours<0 && $diffJours>-92){
			echo "box2 : ".$diffJours;
	}
	else if($diffJours<-183 && $diffJours>-276){
			echo "box3 : ".$diffJours;	
	}else{
		echo "aucune box";
	}*/
/*	//Ajout de 3 mois sur la date d'aujourd'hui
		$dateInThreeMonth = $today->add(new DateInterval('P3M'));
*/

	$khalid['a']="b";
	$khalid['b']="c";
	echo json_encode($khalid);
	
	
?>