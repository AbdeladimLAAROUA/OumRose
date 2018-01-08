<?php
session_start();
if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['content']) and isset($_POST['subject'])) {
    $nom = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $content = htmlspecialchars($_POST['content']);
    $subject = htmlspecialchars($_POST['subject']);
    echo $subject;
    sendEmail($nom, $email, $content, $subject);
    $_SESSION['messageContact'] = 'OK';
    header('Location:../contact.php');


}
function sendEmail($nom, $email, $content, $subject="contact")
{

    $array = array();

    try {
        $message1 = <<<EOT
<html>
    <head>
        <title>Nouveau message</title>
    </head>
    <body>
        <h4>Nom :  $nom</h4>
        <h4>email:  $email</h4>
        <p>$content</p>
    </body>
</html>      
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

        $subj = $subject;
        //$to =$email;
        // $to =$_SESSION['email'];
        $to = "khalid.essalhi8@gmail.com";
        $ok = mail($to, $subj, $message1, $headers);

        if ($ok) {
            $array['status'] = 'success';
        } else {
            $array['status'] = 'failed';
        }

    } catch (Exception $ex) {
        echo $msg = $ex->getMessage();
        $array['status'] = 'failed';
    }
    print_r($array);
}

?>