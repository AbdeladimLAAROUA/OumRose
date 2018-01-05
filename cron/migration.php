<?php 
include('config.php');
/* Migration form old oumbox db to new oumbox db */

/* Step 2 */
 try
       {
          //function1();
        function2($conn);
       }
catch(PDOException $e)
       {
           echo 'erro --> '.$e->getMessage();
       }

function function1()
{
  $stmt = $conn->prepare("SELECT * FROM leads where id>1000");
  $stmt->execute();
  $users = array();
  
  if ($stmt->execute()) {
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         $i++;

          $stmt1 = $conn->prepare("INSERT INTO customer(nom,prenom,email,gsm,naissance,adresse,CP,type,ville) 
                                                      VALUES(:nom,:prenom,:email,:gsm,:naissance,:adresse,:CP,:type,:ville)");
             
          $stmt1->bindparam(":nom", $row['NOM']);          
          $stmt1->bindparam(":prenom", $row['PRENOM']);          
          $stmt1->bindparam(":email", $row['EMAIL']);          
          $stmt1->bindparam(":gsm", $row['GSM']);          
          $stmt1->bindparam(":naissance", $row['DATE_NAISSANCE']);          
          $stmt1->bindparam(":adresse", $row['ADRESSE']);          
          $stmt1->bindparam(":CP", $row['ADRESSE']);          
          $stmt1->bindparam(":type", $row['TYPE']);          
          $stmt1->bindparam(":ville", $row['VILLE']);          
          $stmt1->execute(); 

         $id = $conn->lastInsertId();

         $stmt1 = $conn->prepare("INSERT INTO baby(customer_id,naissance,prenom,sexe,MATERNITE,GYNECO,naissance_enfant,prenom_enfant,SEXE_ENFANT) 
                                                      VALUES(:customer_id,:naissance,:prenom,:sexe,:MATERNITE,:GYNECO,:NAISSANCE_ENFANT,:PRENOM_ENFANT,:SEXE_ENFANT)");
             
          $stmt1->bindparam(":customer_id", $id);          
          $stmt1->bindparam(":naissance", $row['NAISSANCE_BEBE']);          
          $stmt1->bindparam(":prenom", $row['PRENOM_BEBE']);          
          $stmt1->bindparam(":sexe", $row['SEXE_BEBE']);          
          $stmt1->bindparam(":MATERNITE", $row['MATERNITE']);          
          $stmt1->bindparam(":GYNECO", $row['GYNECO']);          
          $stmt1->bindparam(":NAISSANCE_ENFANT", $row['NAISSANCE_ENFANT']);          
          $stmt1->bindparam(":PRENOM_ENFANT", $row['PRENOM_ENFANT']);          
          $stmt1->bindparam(":SEXE_ENFANT", $row['SEXE_ENFANT']);          
          $stmt1->execute(); 


         echo $id;
         

      }
  }
}


function function2($conn){


    $stmt01 = $conn->prepare("DELETE FROM commande where 1");
    $stmt01->execute(); 

    $stmt02 = $conn->prepare("ALTER TABLE commande AUTO_INCREMENT = 1");
    $stmt02->execute();


    for ($i=1; $i <=3 ; $i++) {

      $stmt = $conn->prepare("SELECT c.id as id FROM leads l, customer c  where l.id=c.id_leads and REF_BOX".$i."!=''");
      $stmt->execute();
      
      $stmt1 = $conn->prepare("SELECT * FROM product where id_box='".$i."'");
      $stmt1->execute();
      $sameRowCount = $stmt->rowCount()==$stmt1->rowCount();
      if ($sameRowCount) {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC) and $row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {

              $stmt2 = $conn->prepare("INSERT INTO commande(customer_id,product_id,baby_id) 
                                                          VALUES(:customer_id,:product_id,:baby_id)");
              $stmt2->bindparam(":customer_id", $row['id']);          
              $stmt2->bindparam(":baby_id", $row['id']);
              $stmt2->bindparam(":product_id", $row1['id']);
              $stmt2->execute();         
          }
      }
    }

    echo "done !";
   
}

?>
