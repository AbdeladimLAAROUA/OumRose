<?php 
session_start();

$response = array();
if (isset($_POST['pwdReset'])) {
	include('../config.php');
	$pwdReset = htmlspecialchars($_POST['pwdReset']);

	$user = updatePassword($conn,$_SESSION['email_c'],$pwdReset);
	$response['response']="Mot de passe a été bien changé!";
	$response['success']="true";
	$response['code']="1";
}
else{
	$response['success']="false";
	$response['code']="2";
}

echo json_encode($response);

 ?>