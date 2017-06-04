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
}else{
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




 ?>