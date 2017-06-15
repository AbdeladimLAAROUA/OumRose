<?php
session_start();

include('../config.php');
$info["success"]=true;
$info["response"]='Tous les paramètres sont obligatoires';
$info["mCode"]="0";
if(isset($_POST['email']) and isset($_POST['password']) ){
	  header('Location: ../');
}




