<?php

/*Local*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname="oumdev_leads";

/*Distant*/
/*$servername = "essalhi-impr.000webhostapp.com";
$username = "id709237_oumdev";
$password = "oumdev";*/


/*Server dev*/
<<<<<<< HEAD
/*$servername = "sql.k4mshost.odns.fr";
$username = "k4mshost_oumdev";
$password = "!!oumb0x";
$dbname="k4mshost_oumdev";*/
=======
// $servername = "sql.k4mshost.odns.fr";
// $username = "k4mshost_oumdev";
// $password = "!!oumb0x";
// $dbname="k4mshost_oumdev";
>>>>>>> f805307dda7c623dc698596ddf2676e8971233da

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    }
catch(PDOException $e)
    {
   
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
          $stmt = $conn->prepare("SELECT * FROM customer WHERE email=:email and password =:password LIMIT 1");
          $stmt->execute(array(':email'=>$email, ':password'=>$password));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
            $_SESSION['client_id'] = $userRow['id'];
            $_SESSION['nom'] = $userRow['nom'];
            $userRow['naissanceBebe']="2017-03-31";
           
          }     
         return $userRow;
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
function getUserByEmail($conn,$email){
  try
  {  
     $stmt = $conn->prepare("SELECT * FROM customer WHERE email=:email LIMIT 1");
     $stmt->execute(array(':email'=>$email));
     $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

    return $userRow;
  }
  catch(PDOException $e)
  {
      echo $e->getMessage();
  }
}
<<<<<<< HEAD
 function addRefBox($conn,$box,$email)
{
=======

function addRefBox($conn,$box,$email){
>>>>>>> f805307dda7c623dc698596ddf2676e8971233da
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
?> 