<?php




// rapid check of number of fields
if (count($_POST)>7){
   

    //validate patterns
    if (filter_var($_POST['EMAIL'], FILTER_VALIDATE_EMAIL) && 
        preg_match('/^(19[6-9][0-9]|200[0-9])-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/',$_POST['DATE_NAISSANCE'])  &&
        preg_match('/^(201[5-9]|202[0-6])-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/',$_POST['NAISSANCE_BEBE'])  &&
        preg_match('/^(0|00\s?212\s?|\(?\+212\)?\s?(\(0\))?)[67]([\s\-\.]?[0-9]{2}){4}$/',$_POST['GSM']) &&
        $_POST['TYPE'] == ("enceinte" || "maman") &&
        mb_strlen($_POST['NOM']) >1 &&
        mb_strlen($_POST['PRENOM']) >1 &&
        mb_strlen($_POST['VILLE']) >1 ){

        // check optional fields
        if ( mb_strlen($_POST['ADRESSE'])>150 ||
            (strlen($_POST['CP'])>0 && !preg_match('/^\d{5}$/',$_POST['CP'])) ||
            mb_strlen($_POST['NOM'])>60 ) {
                header("HTTP/1.0 204 No Response",204);
                exit();
        }
        header("Content-Type: text/plain; charset=UTF-8");

        $customer['nom']=htmlspecialchars($_POST['NOM']);
        $customer['prenom']=htmlspecialchars($_POST['PRENOM']);
        $customer['email']=htmlspecialchars($_POST['EMAIL']);
        $customer['password']=htmlspecialchars($_POST['PASSWORD']);
        $customer['gsm']=htmlspecialchars($_POST['GSM']);
        $customer['adresse']=htmlspecialchars($_POST['ADRESSE']);
        $customer['type']=htmlspecialchars($_POST['TYPE']);
        $customer['ville_id']=htmlspecialchars("1");
        $customer['naissance']=htmlspecialchars($_POST['DATE_NAISSANCE']);
        $customer['cp']=htmlspecialchars($_POST['CP']);


        // include lib to make safe mysql request (avoid injections)
        require_once 'safemysql.class.php';

        // connect to DB 

        $mydb = mysqli_connect("localhost","root","","oumdev_leads");
        if (mysqli_connect_errno()) {
        //printf("Connect failed: %s\n", mysqli_connect_error());
                header("HTTP/1.0 503 Service Unavailable",503);
            exit();
        }
        mysqli_set_charset($mydb, "utf8");
       // printf("Jeu de caractère : %s\n", mysqli_character_set_name($mydb));
        $arr['mysqli']=$mydb;
        $db = new SafeMySQL($arr);

        $data = $_POST;
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        $sql  = "INSERT INTO customer SET ?u";
        
        $db->query($sql,$customer);
        $id = $db->insertId();


        echo "InsertedId : ".$id;

        $baby["naissance"]=htmlspecialchars($_POST['NAISSANCE_BEBE']);
        $baby["MATERNITE"]=htmlspecialchars($_POST['MATERNITE']);
        $baby["GYNECO"]=htmlspecialchars($_POST['GYNECO']);
        $baby["customer_id"]=$id;
        $baby["sexe"]="undefined";
        $baby["prenom"]="undefined";  
        if($customer['type']=="maman"){
            $baby["sexe"]=htmlspecialchars($_POST['SEXE_BEBE']);
            $baby["prenom"]=htmlspecialchars($_POST['PRENOM_BEBE']);   
        }

        $sql  = "INSERT INTO baby SET ?u";
        
        $db->query($sql,$baby);
        $id = $db->insertId();

        mysqli_close($mydb);


        //check if real mail
        $listSaved = FALSE;
        $ok = TRUE;
        $info['SendingBlue'] = 'Non inscrit';

        // Logging class initialization

        require_once('../Logging.php');

        $log = new Logging();

        // set path and name of log file (optional)
        $log->lfile('mylog.txt');

        // write message to the log file
       

        // close log file
        $log->lclose();

        $log->lwrite('SendForm Partie emails');
        if (!strstr($_POST["EMAIL"],"@nomail.com")){

            // add user to sendinblue 
            require_once('Mailin.php');

            $mailin = new Mailin("https://api.sendinblue.com/v2.0","YUAxmzIyZSO4EJw9");

            $data = array( "email" => $_POST["EMAIL"],
            "attributes" => $_POST ,
            "listid" => array(34)   //FormCSS list
            );
            $res= $mailin->create_update_user($data);

           
            $log->lwrite('SendForm avant d\'envoyer le message');
            if ($res['code']=='success'){


            $listSaved = TRUE;
            $info['SendingBlue'] = 'Inscrit';
            $log->lwrite('SendForm message envoyé avec succès');
            // close log file
            $log->lclose();
            
            }
            else{
                $log->lwrite('SendForm echec d\'envoie du message');
                // close log file
                $log->lclose();
                echo '\najout utilisateur : ';
                var_dump($res);
                header("HTTP/1.0 503 Service Unavailable",503);
                $ok=FALSE;
                //exit();
            }
        } else{
            $res = notification_email(array_merge($_POST,$info));
            echo '\nnomail.com, notif mail '.$res;

            header("HTTP/1.0 202 Accepted",202);
            exit();
        }

        /*if ($ok){
             
        
                // send notification mail internally
            
        $res = notification_email(array_merge($_POST,$info));
              //  echo $res;
        }
        if (!$listSaved){
                header("HTTP/1.0 202 Accepted",202);
                exit();
        }
        }
        else{
            echo '\najout utilisateur : ';
            var_dump($res);
            header("HTTP/1.0 503 Service Unavailable",503);
            exit();
    }*/
    }
    else{
        header("HTTP/1.0 404 Not Found",404);
        exit();
    }

}
else{
    header("HTTP/1.0 404 Not Found",404);
    exit();
}

function notification_email ($data){
    
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
        $message="<html><table>";
       foreach ($data as $key => $value) {
        $message.="<tr><td>".$key."</td><td>".$value."</td></tr>";
    }
        $message.="</table></html>";
  
    $subj = "[Formulaire CSS] Nouvelle inscription";
    $to ="dounia@oumbox.com,bouchra@oumbox.com,camilleblanc@gmail.com";
    $ok = mail($to, $subj, $message, $headers);
    return $ok;
}