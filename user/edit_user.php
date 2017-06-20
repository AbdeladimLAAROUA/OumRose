<?php
include('../config.php');

if (isset($_POST['nom']) and isset($_POST['prenom']) 
	and isset($_POST['naissance']) and isset($_POST['gsm']) and isset($_POST['id']) 
	and isset($_POST['adresse']) and isset($_POST['ville']) and isset($_POST['cp'])){
	
	$user['id']=htmlspecialchars($_POST['id']);
	$user['nom']=htmlspecialchars($_POST['nom']);
	$user['prenom']=htmlspecialchars($_POST['prenom']);
	$user['naissance']=htmlspecialchars($_POST['naissance']);
	$user['gsm']=htmlspecialchars($_POST['gsm']);
	$user['adresse']=htmlspecialchars($_POST['adresse']);
	$user['ville']=htmlspecialchars($_POST['ville']);
	$user['cp']=htmlspecialchars($_POST['cp']);
	echo updateClient_u($conn,$user);

}else{
	echo "0";
}

function isString(){

}

function isPhone(){

}

function isEmail(){

}