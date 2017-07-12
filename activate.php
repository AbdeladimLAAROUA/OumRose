<?php 
if (isset($_GET["id"])) {
  $id = intval(base64_decode($_GET["id"]));
  include('config.php');
  $sql = "SELECT * from customer where id = :id";
  try {
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $result = $stmt->fetchAll();
 
    if (count($result) > 0) {
      $_SESSION['nom']=$result[0]["nom"];
      getBoxEligibility($result[0],$conn);

      if ($result[0]["status"] == "approved") {
        $msg = "Your account has already been activated.";
        $msgType = "info";
        header('Location:login.php');
      } else {
        $sql = "UPDATE `customer` SET  `status` =  'approved' WHERE `id` = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $msg = "Your account has been activated.";
        $msgType = "success";
         include('emails/emailService.php');
          welcomeEmail($result[0],getBaby($conn,$result[0]));
        /*if($result[0]['id_leads']==0){
          include('emails/emailService.php');
          welcomeEmail($result[0],getBaby($conn,$result[0]));
        }*/
        
        header('Location:login.php');
      }
    } else {
      $msg = "No account found";
      $msgType = "warning";
      echo $msg;
    }
  } catch (Exception $ex) {
    echo $ex->getMessage();
  }
}else if(isset($_GET["token"])){
  try {
    include('config.php');
    $user=getDisapprouvedClientByToken($conn,$_GET['token']);
    $_SESSION['email_c']=$user['email'];

    if ($user!=null) {
      $_SESSION['nom']=$user["nom"];
      getBoxEligibility($user,$conn);
      $sql = "UPDATE `customer` SET  `status` =  'approved' WHERE `id` = :id";
      $stmt = $conn->prepare($sql);
      $stmt->bindValue(":id", $user['id']);
      $stmt->execute();
      $msg = "Your account has been activated.";
      $msgType = "success";
      include('emails/emailService.php');
      welcomeEmail($result[0],getBaby($conn,$result[0])); 
      //updateToken($conn,$user['email'],'');
      header('Location:login.php');
    } else {
      $msg = "No account found";
      $msgType = "warning";
      echo $msg;
    }
  } catch (Exception $ex) {
    echo $ex->getMessage();
  }

}
function getBoxEligibility($user,$conn){
    $baby = getBaby($conn,$user);
    $boxList = getClientBox($conn,$user);

    print_r($boxList);
    // Date d'aujourd'hui
    $today = new DateTime(date('Y-m-d'));

    /*//Ajout de 3 mois sur la date d'aujourd'hui
    $dateInThreeMonth = $today->add(new DateInterval('P3M'));*/

    // Date de naissance du bébé

    $naissance= new DateTime($baby['naissance']);
    

    $interval = date_diff($today, $naissance);

    $diffJours = $interval->format('%R%a days');

    if($diffJours>=7 && $diffJours<=146 && !in_array("1", $boxList)){
        $info["response"]="Chère ".$user['nom'].", vous êtes éligible à la box  \"Je suis enceinte\" ";
        $info["mCode"]=1;
        $info["box"]=1;
    }
    else if($diffJours<=-7 && $diffJours>=-122 and !in_array("2", $boxList)){
        $info["response"]="Chère ".$user['nom'].", vous êtes éligible à la box  \"Bébé est là!\" ";
        $info["mCode"]=2;
        $info["box"]=2;
    }
    else if($diffJours<=-183 && $diffJours>=-305 and !in_array("3", $boxList)){
        $info["response"]="Chère ".$user['nom'].", vous êtes éligible à la box  \"Bébé grandit\" ";
        $info["mCode"]=3;
        $info["box"]=3;
    }else{
        $info["response"]= "Chère ".$user['nom'].", vous n'êtes éligible à aucune box pour le moment <br/>
        <ul>
           <li>Box rose : </li>
           <li>Box vert : </li>
           <li>Box vert : </li>
        </ul>";
        $info["box"]=0;
    }
    $info["success"]=true;
    $_SESSION['result1']=$info;
    $_SESSION['eligibleToBox']=$info["box"];
}

 ?>