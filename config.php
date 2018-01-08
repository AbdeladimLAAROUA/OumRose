<?php

/*Local Kindy*/
/*$servername = "localhost";
$username = "root";
$password = "S3cr3T%44";
$dbname="oumdev_leads";*/

/*Local*/
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname="oumdev_leads";*/

/*Distant*/
/*$servername = "essalhi-impr.000webhostapp.com";
$username = "id709237_oumdev";
$password = "oumdev";*/

/*Server dev*/

/*$servername = "sql.k4mshost.odns.fr";
$username = "k4mshost_oumdev";
$password = "!!oumb0x";
$dbname="k4mshost_oumdev";*/

$servername = "bdd.k4mshost.odns.fr";
$username = "k4mshost_oumdev";
$password = "!!oumb0x";
$dbname="k4mshost_oumbeta";


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){
   
}


function register($conn,$firstname,$email,$password)
    {
       try
       {
   
           $stmt = $conn->prepare("INSERT INTO user(firstname,email,password) 
                                                       VALUES(:firstname, :email,:password)");
              
           $stmt->bindparam(":firstname", $firstname);
           $stmt->bindparam(":email", $email);
           $stmt->bindparam(":password", $password);            
           $stmt->execute(); 
        
           return $stmt; 
       }
       catch(PDOException $e)
       {

           echo $e->getMessage();
       }    
}

function login($conn,$email,$password)
    {
       try
       {  
          $stmt = $conn->prepare("SELECT * FROM customer WHERE email=:email and password =:password and status='approved' LIMIT 1");
          $stmt->execute(array(':email'=>$email, ':password'=>$password));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
            $_SESSION['client_id'] = $userRow['id'];
            $_SESSION['nom'] = $userRow['nom'];
            $_SESSION['nomComplet']=$userRow['nom']." ".$userRow['prenom'];           
          }     
         return $userRow;
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   function loginByEmail($conn,$email)
    {
       try
       {  
          $stmt = $conn->prepare("SELECT * FROM customer WHERE email=:email LIMIT 1");
          $stmt->execute(array(':email'=>$email));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
            $_SESSION['client_id'] = $userRow['id'];
            $_SESSION['nom'] = $userRow['nom'];
            $_SESSION['nomComplet']=$userRow['nom']." ".$userRow['prenom'];
            $userRow['naissanceBebe']="2017-03-31";
           
          }     
         return $userRow;
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   function registerByEmail($conn,$email,$password)
    {
       try
       {  

          $stmt = $conn->prepare("UPDATE customer c SET c.password=:password where email=:email and status='not_approved'");
          $stmt->bindparam(":password", $password);
          $stmt->bindparam(":email", $email);
          $stmt->execute();
          //$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

         /* if($stmt->rowCount() > 0)
          {
            $_SESSION['client_id'] = $userRow['id'];
            $_SESSION['nom'] = $userRow['nom'];
            $_SESSION['nomComplet']=$userRow['nom']." ".$userRow['prenom'];
            $userRow['naissanceBebe']="2017-03-31";
           
          }*/     
         return $stmt;
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

function getBaby($conn,$user)
    {
       try
       {
          $stmt = $conn->prepare("SELECT * FROM baby WHERE customer_id=:customer_id LIMIT 1");
          $stmt->execute(array(':customer_id'=>$user['id']));
          $babyRow=$stmt->fetch(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
            /*$_SESSION['user_session'] = $userRow['ID'];
            $_SESSION['name'] = $userRow['name'];*/
           
          }     
         return $babyRow;
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
function reserveBox($conn,$type,$status,$client_id)
    {
       try
       {
   
           $stmt = $conn->prepare("INSERT INTO boite(type,status,client_id) 
                                                       VALUES(:type, :status,:client_id)");
              
           $stmt->bindparam(":type", $type);
           $stmt->bindparam(":status", $status);
           $stmt->bindparam(":client_id", $client_id);            
           $stmt->execute(); 
        
           return $stmt; 
       }
       catch(PDOException $e)
       {

           echo $e->getMessage();
       }    
}
function isBoxAlreadyOrdered($conn,$client_id){
   {
       try
       {
          $stmt = $conn->prepare("SELECT * FROM boite WHERE client_id=:client_id LIMIT 1");
          $stmt->execute(array(':client_id'=>$client_id));
          $row=$stmt->fetch(PDO::FETCH_ASSOC);
         
          if($stmt->rowCount() > 0)
          {
            return true;
           
          }     
         return false;
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
}
function getAllUsers($conn){
  try
       {
          $stmt = $conn->prepare("SELECT * FROM user");
          $stmt->execute();
          $users = array();
          if ($stmt->execute()) {
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $users[] = $row;
              }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
       return  $users;
}
function getUserById($conn,$id){
  try
  {  
     $stmt = $conn->prepare("SELECT * FROM customer WHERE id=:id LIMIT 1");
     $stmt->execute(array(':id'=>id));
     $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

    return $userRow;
  }
  catch(PDOException $e)
  {
      echo $e->getMessage();
  }
}
function getArticle($conn,$id){

    try {
        $stmt = $conn->prepare("SELECT * FROM blog_posts_seo WHERE postID=:id LIMIT 1");
        $stmt->execute(array(':id' => $id));
        $article = $stmt->fetch(PDO::FETCH_ASSOC);
        return $article;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }


}

function getUserByEmail($conn, $email)
{
    try {
        $stmt = $conn->prepare("SELECT * FROM customer WHERE email=:email LIMIT 1");
        $stmt->execute(array(':email' => $email));
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

        return $userRow;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function getUser($conn,$id){
  try
  {  
     $stmt = $conn->prepare("SELECT * FROM customer WHERE id=:id LIMIT 1");
     $stmt->execute(array(':id'=>$id));
     $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

    return $userRow;
  }
  catch(PDOException $e)
  {
      echo $e->getMessage();
  }
}

function getUserPassword($conn,$id){
  try
  {  
     $stmt = $conn->prepare("SELECT * FROM customer WHERE id=:id LIMIT 1");
     $stmt->execute(array(':id'=>$id));
     $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

    return $userRow['password'];
  }
  catch(PDOException $e)
  {
      echo $e->getMessage();
  }
}


function addRefBox($conn,$box,$email){

  if($box=="box1"){
          $stmt = $conn->prepare("UPDATE leads SET REF_BOX1=:REF_BOX1 WHERE email=:email");
          $stmt->execute(array(':REF_BOX1'=>"REF_BOX1",':email'=>$email));
  }else if($box=="box2"){
          $stmt = $conn->prepare("UPDATE leads SET REF_BOX2=:REF_BOX2 WHERE email=:email");
          $stmt->execute(array(':REF_BOX2'=>"REF_BOX2",':email'=>$email));
  }else if($box=="box3"){
          $stmt = $conn->prepare("UPDATE leads SET REF_BOX3=:REF_BOX3 WHERE email=:email");
          $stmt->execute(array(':REF_BOX3'=>"REF_BOX3",':email'=>$email));
  }
}
function deleteUser($conn, $id){
  try
       {
          $stmt = $conn->exec("DELETE FROM user WHERE id = ".$id);
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
}

function getAllCities1($conn){
  try
       {
          $stmt = $conn->prepare("SELECT * FROM ville order by name");
          $stmt->execute();
          $villes = array();
          $villes1=array();
          $villes2=array();
          if ($stmt->execute()) {
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  if(strtoupper($row['name'])=='CASABLANCA' or strtoupper($row['name'])=='RABAT' or strtoupper($row['name'])=='MARRAKECH'){
                    $villes1[] = $row;
                  }else{
                     $villes2[] = $row;
                  }
              }
              $villes=array_merge($villes1, $villes2);

          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
       return  $villes;
}function getAllCities2($conn){
  try
       {
          $stmt = $conn->prepare("SELECT * FROM villeOx order by name");
          $stmt->execute();
          $villes = array();
          $villes1=array();
          $villes2=array();
          if ($stmt->execute()) {
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  if(strtoupper($row['name'])=='CASABLANCA' or strtoupper($row['name'])=='RABAT' or strtoupper($row['name'])=='MARRAKECH'){
                    $villes1[] = $row;
                  }else{
                     $villes2[] = $row;
                  }
              }
              $villes=array_merge($villes1, $villes2);

          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
       return  $villes;
}
function getCityById1($conn,$id){
      try
       {
          $stmt = $conn->prepare("SELECT * FROM villeOx where id=:id");
          $stmt->execute(array(':id'=>$id));
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          $ville = $row;
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
       return  $ville;
}
function getClientByToken($conn,$token){
      try
       {
          $stmt = $conn->prepare("SELECT * FROM customer where token=:token and expiration >= NOW() and status='approved'");
          $stmt->execute(array(':token'=>$token));
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          $client = $row;
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
       return  $client;
}
function getDisapprouvedClientByToken($conn,$token){
      try
       {
          $stmt = $conn->prepare("SELECT * FROM customer where token=:token and expiration >= NOW() and status='not_approved'");
          $stmt->execute(array(':token'=>$token));
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          $client = $row;
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
       return  $client;
}
function getAllRelais($conn){
  $villes = array("AGADIR", "ASSILAH","CASABLANCA", "HAYSTACK","HAYSTACK", "HAYSTACK",
                "KENITRA", "LARACHE","MARRAKECH", "MOHAMMEDIA",
                "RABAT", "SALA AL JADIDA","SALE", "SETTAT",
                "TANGER", "TEMARA");
  try
       {
          $stmt = $conn->prepare("SELECT r.*,v.name FROM relais r INNER JOIN ville v ON v.id=r.id_ville");
          $stmt->execute();
          $relais = array();
          if ($stmt->execute()) {
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  if(in_array(strtoupper($row['name']), $villes)){
                    $row['prix']=25; 
                  }else{
                    $row['prix']=30;
                  }
                  print_r( $row);
                  $relais[] = $row;

              }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
       return  $relais;
}

function getClientBox($conn,$user){
  try
       {

          $stmt = $conn->prepare("SELECT product_id FROM commande where customer_id=:id and deleted=0");
          $stmt->execute(array(':id'=>$user['id']));
          $clientCommandesId = array();
          if ($stmt->execute()) {
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $clientCommandesId[] = $row['product_id'];
              }
          }
           $boxList = array();
          if( count($clientCommandesId)){
               $qMarks = str_repeat('?,', count($clientCommandesId) - 1) . '?';
            $sth = $conn->prepare("SELECT id_box FROM product WHERE id IN ($qMarks)");
           
           
            
            if ($sth->execute($clientCommandesId)) {
                while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                    $boxList[] = $row['id_box'];
                }
            }else{

            }
          }
         
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
       return  $boxList;
}
function updateEligibilite1($id,$eligible){
   try {
    $connexion = $conn;

    $stmt = $connexion->prepare("UPDATE customer SET eligible = :eligible WHERE id = :id ");
    
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':eligible', $eligible);


    if($stmt->execute()) {
        $user = getUserById($id);
        sindinblue($user);
      $array['status'] = 'success';
    } else  {
      $array['status'] = 'error';
    }
  

    
  } catch (Exception $e) {
    $array['status'] = 'ko';
  }  
}
function changePassword($conn,$id,$newPassword){
   try {
    $connexion = $conn;

    $stmt = $connexion->prepare("UPDATE customer SET password = :password WHERE id = :id ");
    
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':password', $newPassword);


    if($stmt->execute()) {
      $array['status'] = 'success';
    } else  {
      $array['status'] = 'error';
    }
  

    
  } catch (Exception $e) {
    $array['status'] = 'ko';
  }  

  return  $array['status'];
}

function updateClient_u($conn,$client){
  $array = array();
 
  $array['id'] = $client['id'];
  $array['nom'] = $client['nom'];
  $array['prenom'] = $client['prenom'];
  $array['gsm'] = $client['gsm'];
  $array['naissance'] = $client['naissance'];
  $array['adresse'] = $client['adresse'];
  $array['cp'] = $client['cp'];
 /* $array['type'] = $client['type'];*/
  $array['ville'] = $client['ville'];



  /*$array['idBebe'] = $baby['id'];
  $array['prenomBebe'] = $baby['prenomBebe'];
  */


  try {
    $connexion = $conn;

    $stmt = $connexion->prepare("UPDATE customer SET nom = :nom,prenom = :prenom,gsm = :gsm,naissance = :naissance,adresse = :adresse,CP = :cp, ville = :ville WHERE id = :id ");

    $stmt->bindValue(':id', $client['id']);
    $stmt->bindValue(':nom', $client['nom']);
    $stmt->bindValue(':prenom', $client['prenom']);
    $stmt->bindValue(':gsm', $client['gsm']);
    $stmt->bindValue(':naissance', $client['naissance']);
    $stmt->bindValue(':adresse', $client['adresse']);
    $stmt->bindValue(':cp', $client['cp']);
    $stmt->bindValue(':ville', $client['ville']);

    $a =$stmt->execute();

    if($a) {
      $array['status'] = 'success';
      ;
    } else  {
      $array['status'] = 'error';
    }



  } catch (Exception $e) {
    $array['status'] = 'ko';
  }
  
  $connexion = null;

  return json_encode($array); 
}

function updateToken($conn,$email,$token)
    {
       try
       {

          $stmt = $conn->prepare("UPDATE customer c SET c.token=:token, c.expiration=:expiration where email=:email and status='approved'");
          $stmt->bindparam(":token", $token);
          $stmt->bindparam(":email", $email);
          $stmt->bindparam(":expiration", date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")." +30 minutes")));
          $stmt->execute();

          $user = getUserByEmail($conn, $email);
          sindinblue($user);

         return $stmt;
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
}

function updatePassword($conn,$email,$password)
    {
       try
       {  

          $stmt = $conn->prepare("UPDATE customer c SET c.password=:password where email=:email and status='approved'");
          $stmt->bindparam(":password", $password);
          $stmt->bindparam(":email", $email);
          $stmt->execute();
          updateToken($conn,$email,'');
         return $stmt;
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
}
function getAllQuartiers1($conn){
  try
       {
          $stmt = $conn->prepare("SELECT * FROM quartier");
          $stmt->execute();
          $quartiers = array();
          if ($stmt->execute()) {
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $quartiers[] = $row;
              }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
       return  $quartiers;
}
function fullEligible($conn,$user,$naissanceBebe){
    
    $boxList = getClientBox($conn,$user);
    
    $eligible='0';
    
    // Date d'aujourd'hui
    $today = new DateTime(date('Y-m-d'));

    /*//Ajout de 3 mois sur la date d'aujourd'hui
    $dateInThreeMonth = $today->add(new DateInterval('P3M'));*/

    // Date de naissance du bébé

    $naissance= new DateTime($naissanceBebe);
    

    $interval = date_diff($today, $naissance);

    $diffJours = $interval->format('%R%a days');
    
    if($diffJours>=7 && $diffJours<=146 && !in_array("1", $boxList)){
       $eligible='1';
    }
    else if($diffJours<=-7 && $diffJours>=-122 and !in_array("2", $boxList)){
        $eligible='2';
    }
    else if($diffJours<=-183 && $diffJours>=-305 and !in_array("3", $boxList)){
         $eligible='3';
    }
    return $eligible;
}

function sindinblue($sindinblueUser)
{
    // add user to sendinblue
    require_once('Mailin.php');

    $mailin = new Mailin("https://api.sendinblue.com/v2.0", "YUAxmzIyZSO4EJw9");

    $data = array("email" => $sindinblueUser["email"],
        "attributes" => $sindinblueUser,
        "listid" => array(128)   //FormCSS list
    );
    $res = $mailin->create_update_user($data);
    if ($res['code'] == 'success') {
        return true;
    } else {
        return false;
    }
}
?> 