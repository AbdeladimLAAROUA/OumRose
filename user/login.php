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
		$info["success"]=true;
		$_SESSION['result1']=$info;
		header('Location:../espace.php');
		
	}else{
		$info["success"]=false;
		$info["response"]='Email ou password incorrect';
		$_SESSION['result']=$info;
		header('Location:../login.php');
	}
}else{
	$info["success"]=false;
	$_SESSION['result']=$info;
	header('Location:../login.php');
	
}



?>