<?php


    //validate patterns
    if (    filter_var($_POST['EMAIL'], FILTER_VALIDATE_EMAIL) && 
            preg_match('/^(19[6-9][0-9]|200[0-9])-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/',$_POST['DATE_NAISSANCE']) &&
            isset($_POST['g-recaptcha-response']) ){

        require_once './recaptcha/src/autoload.php';
        $recaptcha = new \ReCaptcha\ReCaptcha('6Ld7zxUUAAAAAOZN-otaTb8L_af2CfrUd_44teox');
        $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

       if (!$resp->isSuccess()) {
            // error!
            header("HTTP/1.0 404 Not Found",404);
            exit();
       }
        header("Content-Type: application/json; charset=UTF-8");

        // include lib to make safe mysql request (avoid injections)
        require_once './safemysql.class.php';

        // connect to DB with user k4mshost_dclabs (change to k4mshost_oumdev needed)
        $mydb = mysqli_connect("localhost","root", "root","k4mshost_oumleads");

        if (mysqli_connect_errno()) {
        //printf("Connect failed: %s\n", mysqli_connect_error());
                header("HTTP/1.0 503 Service Unavailable",503);
            exit();
        }
        mysqli_set_charset($mydb, "utf8");
       // printf("Jeu de caractère : %s\n", mysqli_character_set_name($mydb));
        $arr['mysqli']=$mydb;
        $db = new SafeMySQL($arr);

        $sql  = "SELECT NOM , PRENOM , NAISSANCE_BEBE , DATEDIFF(CURDATE(), NAISSANCE_BEBE) AS DIFF, ADRESSE, CP, VILLE  FROM leads WHERE EMAIL=?s AND DATE_NAISSANCE=?s";
            
   
        $data = $db->getRow($sql,$_POST['EMAIL'],$_POST['DATE_NAISSANCE']);
        if($data){
            echo(json_encode($data));
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


?>