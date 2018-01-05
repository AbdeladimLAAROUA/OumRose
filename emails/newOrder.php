<?php
$array = array();
$array['result'] = 0;

$email = 'khalid.essalhi8@gmail.com';


/*$dateCommande = date('d/m/Y');
$validity = 'validity';
$name ='name';
$livraisonType = 'livraisonType';
$livraisonAdresse = 'livraisonAdresse';
$typeBox = 'Box je suis enceinte';*/

try{
$message1 = <<<EOT
<div style="border:1px solid #e8e8e8;padding:20px 0 0;background:#fff"><div class="adM">
            </div><div style="text-align:center;border-bottom:1px solid #e8e8e8"><div class="adM">
                </div><img src="http://oumbox.com/img/logo-l.png" alt="icon home" style="margin-bottom:30px;margin-top:20px" class="CToWUd">
            </div>
            <div style="padding:20px 30px 10px;color:#737373;font-family:sans-serif;font-weight:100;line-height:21px;font-size:15px">
<p>Chère Mme khalid ESSALHI<br><br>Nous avons bien reçu la commande 100954 que vous avez effectué le $dateCommande.<br><br>
------------------------------<wbr>------------------------<br>
Type de la box : $typeBox<br>
Type de la livraison : $livraisonType<br>
Date de de la commande : $dateCommande <br><br/>

Nom complet: $name<br>
Adresse de livraison: $livraisonAdresse<br>
Le bon de commande est valable juqu'au: $validity<br><br>

Vous pouvez consulter vos commandes précédentes en accédant à votre zone client. <a href="http://beta.oumbox.com/espace.php">http://beta.oumbox.com/espace.php</a><br><br>
L'équipe Oumox.<br><br></p>
</div>

            <div style="background:#2085c6;color:#fff;padding:30px 17px 10px;text-align:center">
                <div style="width:38%;display:inline-block;text-align:left;font-size:15px;margin-bottom:20px;background:url(https://ci4.googleusercontent.com/proxy/GRSCNVIFOGTSySTunaojkm1lJT-QdNiH6KuUIQVeRJFknUtkt5uMgmTPzcQSgQ-4rV5X-mUnsKL1XpyEiQd_VrHdv51V4iNsfw=s0-d-e1-ft#https://clients.genious.net/mailtpl/img/icontel.png) center left no-repeat;padding-left:45px;display:inline-block;font-family:sans-serif;font-weight:100;line-height:21px;font-size:16px">
                                    <p style="font-size:14px;margin:0">Des questions ?</p>
                                    <span style="font-size:13px">0522 ... ...</span>
                </div>

                <div style="width:38%;text-align:left;font-size:15px;background:url(https://ci3.googleusercontent.com/proxy/AnKj-_MEknj3yB30R5KYOQPcXJc_ktXsDiM70_m4Mu5IFgWRim8lOccwI2dms3f5b4V1Lq3MHN0uknq-VP00D0_1xMnHlq9tAP1toLs=s0-d-e1-ft#https://clients.genious.net/mailtpl/img/iconsupport.png) center left no-repeat;padding-left:45px;display:inline-block;font-family:sans-serif;font-weight:100;line-height:21px;font-size:16px">
                                    <p style="font-size:14px;margin:0">Nous contacter</p>
                                    <a style="color:#fff;font-size:13px" href="mailto:contact@genious.net" target="_blank" data-mt-detrack-inspected="true">contact@oumbox.com</a>
                </div>
            </div>
    </div>
EOT;

    $semi_rand = md5(time());
    $mime_boundary = "Oumbx_Mpart_Bound_x{$semi_rand}x";
    $headers = "Sender: contact@oumbox.com\n";
    //      $headers.= "Return-Path: lead@dclabs.fr\n";
    $headers .= "From: contact@oumbox.com\n";

    $headers .= "MIME-Version: 1.0\n" .
        "Content-Type: text/html; charset=UTF-8;format=flowed\n" .
        "Content-Transfer-Encoding: 8bit\n" .
        "X-Mailer: PHP\n" .
        " boundary=\"{$mime_boundary}\"";

    $subj = "Validation du compte";
    //$to =$email;
    // $to =$_SESSION['email'];
    $to = $email;
    $ok = mail($to, $subj, $message1, $headers);
    echo $ok;
    if ($ok) {
        $array['status'] = 'success';
    } else {
        $array['status'] = 'failed';
    }

} catch
(Exception $ex) {
    echo $msg = $ex->getMessage();
    $array['status'] = 'failed';
}

?>
