<?php
session_start();

try {
	include('config.php');
	$box= $_SESSION['result']['box'];
	$client_id= $_SESSION['client_id'];

	if(isBoxAlreadyOrdered($conn,$client_id)){
		$_SESSION['result1']['response']="Vous avez déjà demandé votre box";
		header('Location:retrait-r.php');
	}else{
		reserveBox($conn, $box,"en cours",$client_id);	
		$_SESSION['result1']['response']="La demande a été effecuté evec succès";
		header('Location:retrait-r.php');	
	}
	
} catch (Exception $e) {
	$_SESSION['result1']['response']="Une erreure s'est produite ";
	header('Location:retrait-r.php');
}
?>