<?php 
$array = array();
$array['result'] = 0;

/*$email    = $_POST['email'];*/
$nom        = $_POST['nom'];
$email      = 'khalid.essalhi8@gmail.com';
$password   = $_POST['password'];
$token      = $_POST['token'];

/*Valeur de test*/

/*$nom      = 'khalid';
$email    = 'khalid.essalhi8@gmail.com';
$password = "oumbox";
$id='44444';*/
try {
$message1 = <<<EOT
<html>
    <head>
        <title>Validation du compte</title>
    </head>
    <body>
        <h4>Bonjour Mme $nom!!</h4>
        <p>Pour valider votre inscription au programme Oumbox, cliquez sur le lien ci-dessous</p>
        <p><a href="beta.oumbox.com/activate.php?token=$token">Cliquez ici pour activer</a></p>
        <p>Votre mot de passe provisoire est : $password</p>
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
  
        $subj = "Validation du compte";
        //$to =$email;
       // $to =$_SESSION['email'];
        $to =$email;
        $ok = mail($to, $subj, $message1, $headers);
    
    if($ok){
        $array['status'] = 'success'; 
    }else{
         $array['status'] = 'failed';  
    }

    } catch (Exception $ex) {
       echo $msg = $ex->getMessage();
       $array['status'] = 'failed';
    }
echo json_encode($array);
 ?>