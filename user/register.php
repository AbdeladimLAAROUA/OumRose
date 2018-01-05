<?php 
session_start();

$response = array();
if (isset($_POST['email']) and isset($_POST['password'])) {
	include('../config.php');
	$password = htmlspecialchars($_POST['password']);
	$email = htmlspecialchars($_POST['email']);
	

	$user = getUserByEmail($conn,$email);
	if($user==null){
		$response['response']="Aucun utilisateur correspondant à cette adresse n'a été trouvé";
		$response['success']="true";
		$response['code']="0";
	}else{
		
		if($user['status']=="approved"){
			$response['response']="Ce compte a été déjà activé";
			$response['success']="true";
			$response['code']="3";
		}else{
			registerByEmail($conn,$email,$password);
			$response['response']="Un email de confirmation a été envoyé";
			$response['success']="true";
			$response['code']="1";
			//$_SESSION['email'] = $email;
			$_SESSION['email'] = 'khalid.essalhi8@gmail.com';
			$_SESSION['nom'] = $user['nom'];
			$response['msg']=validateByEmail($emaill,$user['id'],$user['nom']);
		}	
			
	}
}else if(isset($_POST['email_fp'])){
	include('../config.php');
	$email = htmlspecialchars($_POST['email_fp']);
	$user = getUserByEmail($conn,$email);
	if($user==null or $user['status']!="approved"){
		$response['response']="Aucun utilisateur correspondant à cette adresse n'a été trouvé";
		$response['success']="true";
		$response['code']="0";
	}else if(date("Y-m-d H:i:s")<$user['expiration']){
		$response['response']="Vous devez attendre 30min avant de faire un nouvelle demande";
		$response['success']="true";
		$response['code']="0";
	}
	else{
			$token = bin2hex(openssl_random_pseudo_bytes(32));
			updateToken($conn,$email,$token);
			$response['response']="Un email de réinitialisation du mot de passe a été envoyé";
			$response['success']="true";
			$response['code']="1";
			//$_SESSION['emailSend'] = $email;
			$_SESSION['emailSend'] = 'khalid.essalhi8@gmail.com';
			$_SESSION['nom'] = $user['nom'];
			$response['msg']=passwordForgot($$email,$user['id'],$user['nom'],$token);
		}	
			
}else if(isset($_POST['password']) and isset($_POST['newPassword'])){
	include('../config.php');
	$password = htmlspecialchars($_POST['password']);
	$newPassword = htmlspecialchars($_POST['newPassword']);
	$passwordUser = getUserPassword($conn,$_SESSION['client_id']);
	$response['passwordUser']=$passwordUser;
    $response['password'] = $password;
    $response['passwordUser'] = $passwordUser != $password;
	if($passwordUser!==$password){
		$response['response']="Password incorrect";
		$response['success']="true";
		$response['code']="0";
	}else {
		changePassword($conn,$_SESSION['client_id'],$newPassword);
		$response['response']="Votre mot de passe a été bien changé !";
		$response['success']="true";
		$response['code']="1";
	}		
}
else{
	$response['success']="false";
	$response['code']="2";
}

echo json_encode($response);

function validateByEmail($emaill,$id,$nom){

	try {
$myId=base64_encode($id);
$message1 = <<<EOT
<html>
    <head>
        <title>Email Verification</title>
    </head>
    <body>
        <h4>Bonjour Mme $nom!</h4>
        <p>Pour valider votre inscription au programme Oumbox, cliquez sur le lien ci-dessous</p>
        <p><a href="oumtest.k4mshost.odns.fr/activate.php?id=$myId">Cliquez ici pour activer</a></p>
        <p>Si vous avez reçu cet email par erreur, supprimez le simplement.</p>
    </body>
</html>      
EOT;
    


		$semi_rand = md5(time());
        $mime_boundary = "Oumbx_Mpart_Bound_x{$semi_rand}x";
        $headers= "Sender: contact@oumbox.com\n";
//      $headers.= "Return-Path: lead@dclabs.fr\n";
        $headers.= "From: contact@oumbox.com\n";

        $headers .= "MIME-Version: 1.0\n" .
             "Content-Type: text/html; charset=UTF-8;format=flowed\n" .
                 "Content-Transfer-Encoding: 8bit\n".
                                 "X-Mailer: PHP\n".
                                 " boundary=\"{$mime_boundary}\"";
  
	    $subj = "Confirmation du mot de passe";
	    //$to =$email;
	    $to =$_SESSION['email'];
	    $ok = mail($to, $subj, $message1, $headers);
		return $ok;
	} catch (Exception $ex) {
	  echo $msg = $ex->getMessage();
	}
}



function passwordForgot($email,$id,$nom,$token){

	try {
$myId=base64_encode($id);

$message1 = <<<EOT
<html>
    <head>
        <title>Email Verification</title>
    </head>
    <body>
        <h4>Bonjour Mme $nom!</h4>
        <p>Nous avons reçu une demande de récupération de votre compte $email</p>
        <p><a href="beta.oumbox.com/resetPassword.php?token=$token">
        	Cliquez ici réinitialiser votre mot de passe
        	</a>
        </p>
        <p>Si vous n'avez pas lancé cette demande de récupération, ignorer cet e-mail. 
        Nous allons garder votre compte en toute sécurité.</p>
    </body>
</html>      
EOT;
    


		$semi_rand = md5(time());
        $mime_boundary = "Oumbx_Mpart_Bound_x{$semi_rand}x";
        $headers= "Sender: contact@oumbox.com\n";
//      $headers.= "Return-Path: lead@dclabs.fr\n";
        $headers.= "From: contact@oumbox.com\n";

        $headers .= "MIME-Version: 1.0\n" .
             "Content-Type: text/html; charset=UTF-8;format=flowed\n" .
                 "Content-Transfer-Encoding: 8bit\n".
                                 "X-Mailer: PHP\n".
                                 " boundary=\"{$mime_boundary}\"";
  
	    $subj = "Récupération du compte";
	    //$to =$email;
	    $to =$_SESSION['emailSend'];
	    $ok = mail($to, $subj, $message1, $headers);
		return $ok;
	} catch (Exception $ex) {
	  echo $msg = $ex->getMessage();
	}
}




 ?>