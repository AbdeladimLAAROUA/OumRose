<?php

/*Extracting old references*/


$servername = "sql.k4mshost.odns.fr";
$username = "k4mshost_oumdev";
$password = "!!oumb0x";
$dbname = "k4mshost_oumbeta";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

}


try {


    $stmt = $conn->prepare("SELECT id,REF_BOX1 FROM leads where REF_BOX1!=''");
    $leads = array();
    if ($stmt->execute()) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $leads[] = $row;
        }
    }

    /*BOX 2*/


    $stmt = $conn->prepare("SELECT id,REF_BOX2 FROM leads where REF_BOX2!=''");
    $leads = array();
    if ($stmt->execute()) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $leads[] = $row;
        }
    }

    $updateBox2 = 0;
    foreach ($leads as $index => $lead) {
        $id_leads = $lead['id'];
        $REF_BOX1 = $lead['REF_BOX2'] . '_old';;

        $sql = "UPDATE product p INNER JOIN  commande co ON  p.id=co.product_id INNER JOIN customer c ON c.id=co.customer_id set refBox=:RefBox where c.id_leads=:id_leads";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':RefBox', $REF_BOX1);
        $stmt->bindValue(':id_leads', $id_leads);
        $stmt->execute();

        $updateBox2++;

    }
    echo "UpdateBox2 : " . $updateBox2 . " rows <br/>";



} catch (PDOException $e) {
    echo $e->getMessage();
}

?>