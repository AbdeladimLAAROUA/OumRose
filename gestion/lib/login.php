<?php
// session_start();

include('./util.php');
$info["success"]=true;
$info["response"]='Tous les paramètres sont obligatoires';
$info["mCode"]="0";
if(isset($_POST['email']) and isset($_POST['password']) ){
	$email = $_POST['email'];
	$password = $_POST['password'];

	$user 	= loginGestion($email,$password);
	$res 	= json_decode($user);
    $userInfos = json_decode($user, true);
	// print_r($res->infos->id);

	$_SESSION['ResultUser'] = $res->result;
	$_SESSION['resultInfos']= $res->infos;
	$_SESSION['userInfos']=$userInfos["infos"];

	header('Location: ../');
}