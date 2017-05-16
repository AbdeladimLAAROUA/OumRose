<?php
session_start();

include('../config.php');
$info["success"]=true;
$info["response"]='Tous les paramètres sont obligatoires';
$info["mCode"]="0";
if(isset($_GET['email']) ){
	$email = $_GET['email'];

	//authentification
	$user = getUserByEmail($conn,$email);
	
	// si on a trouvé l'utilisateur
	if($user != null){
		$info["success"]=true;
		$info["response"]='';
		$_SESSION['result']=$info;
		$_SESSION['user']=$user;
		header('Location:../clients.php');
	}else{
		$info["success"]=false;
		$info["response"]='Email incorrect';
		$_SESSION['result']=$info;
		header('Location:../clients.php');
	}
}else if(isset($_POST['box'])){
	$box = $_POST['box'];
	addRefBox($conn,$box,$_SESSION['user']['EMAIL']);
}

else{
	$info["success"]=false;
	$_SESSION['result']=$info;
	header('Location:../clients.php');
	
}



?>