<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_REQUEST['methode'])){
		if($_REQUEST['methode'] == 'getCustomerType'){
			echo getCustomerType();
		}else if($_REQUEST['methode'] == 'getCustomerAgeRange'){
			echo getCustomerAgeRange();
		}else if($_REQUEST['methode'] == 'getCustomerVille'){
			echo getCustomerVille();
		}else if($_REQUEST['methode'] == 'getBabySex'){
			echo getBabySex();
		}else if($_REQUEST['methode'] == 'getClientDash'){
			echo getClientDash();
		}else if($_REQUEST['methode'] == 'getBabyDash'){
			echo getBabyDash();
		}else if($_REQUEST['methode'] == 'getAllClient'){
			echo getAllClient();
		}else if($_REQUEST['methode'] == 'getClient'){
			echo getClient($_REQUEST['id']);
		}else if($_REQUEST['methode'] == 'deleteFullClient'){
			echo deleteFullClient($_REQUEST['id']);
		}else if($_REQUEST['methode'] == 'getAllCities'){
			echo getAllCities();
		}else if($_REQUEST['methode'] == 'getAllTypeMoms'){
			echo getAllTypeMoms();
		}
	}else{
		$array["response"] = "faux";
		echo json_encode($array);
	}
}

// $id = 216;
// echo getAllTypeMoms();

function getAllCities(){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT * FROM ville");

		$resultats->execute();

		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		$array['result'] = $resultat;
	} catch (Exception $e) {
		$array['result'] = 0;
	}
	
	$connexion = null;
	return json_encode($array);	
}

function getAllTypeMoms(){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT DISTINCT type FROM customer");

		$resultats->execute();

		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		$array['result'] = $resultat;
	} catch (Exception $e) {
		$array['result'] = 0;
	}
	
	$connexion = null;
	return json_encode($array);	
}

function getCustomerType(){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT type, ROUND(COUNT(*) / (SELECT COUNT(*) FROM `customer`) *100) AS poucentage , COUNT(*) AS nbr FROM `customer` GROUP BY type");

		$resultats->execute();

		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		$array['result'] = $resultat;
	} catch (Exception $e) {
		$array['result'] = 0;
	}
	
	$connexion = null;
	return json_encode($array);	
}

function getCustomerAgeRange(){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT COUNT(*) as nbr, CASE WHEN age >=0 AND age <=18 THEN '00-18' WHEN age >=19 AND age <=20 THEN '19-20' WHEN age >=21 AND age <=25 THEN '21-25' WHEN age >=26 AND age <=30 THEN '26-30' WHEN age >=31 AND age <=35 THEN '31-35' WHEN age >=36 AND age <=40 THEN '36-40' WHEN age >=40 THEN '40+' END AS ageband FROM ( SELECT YEAR(NOW()) - YEAR(`naissance`) as age FROM `customer` ) t group by ageband Order by ageband");

		$resultats->execute();

		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		$array['result'] = $resultat;
	} catch (Exception $e) {
		$array['result'] = 0;
	}
	
	$connexion = null;
	return json_encode($array);	
}

function getCustomerVille(){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT v.name, ROUND(COUNT(*) / (SELECT COUNT(*) FROM `customer`) *100) AS poucentage , COUNT(*) AS nbr FROM `customer` c INNER JOIN ville v ON c.Ville_id = v.id GROUP BY Ville_id");

		$resultats->execute();

		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		$array['result'] = $resultat;
	} catch (Exception $e) {
		$array['result'] = 0;
	}
	
	$connexion = null;
	return json_encode($array);	
}

function getBabySex(){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT sexe, ROUND(COUNT(*) / (SELECT COUNT(*) FROM `baby`) *100) AS poucentage , COUNT(*) AS nbr FROM `baby` GROUP BY sexe");

		$resultats->execute();

		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		$array['result'] = $resultat;
	} catch (Exception $e) {
		$array['result'] = 0;
	}
	
	$connexion = null;
	return json_encode($array);	
}

function getClientDash(){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT c.id,c.nom,c.prenom,c.gsm,YEAR(NOW()) - YEAR(c.naissance) as age,v.name FROM `customer` c INNER JOIN ville v ON c.Ville_id = v.id ORDER BY c.creationDate DESC LIMIT 5");

		$resultats->execute();

		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		$array['result'] = $resultat;
	} catch (Exception $e) {
		$array['result'] = 0;
	}
	
	$connexion = null;
	return json_encode($array);	
}

function getBabyDash(){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT b.id, b.naissance, b.prenom, b.sexe, c.nom, c.type FROM baby b INNER JOIN customer c ON c.id = b.customer_id WHERE sexe != 'NULL' ORDER BY b.id DESC LIMIT 5");

		$resultats->execute();

		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		$array['result'] = $resultat;
	} catch (Exception $e) {
		$array['result'] = 0;
	}
	
	$connexion = null;
	return json_encode($array);	
}

function getAllClient(){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT c.id,c.nom, c.prenom, c.email, c.gsm,YEAR(NOW()) - YEAR(c.naissance) as age, c.adresse, v.name FROM customer c INNER JOIN ville v ON c.Ville_id = v.id");

		$resultats->execute();

		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		$array['result'] = $resultat;
	} catch (Exception $e) {
		$array['result'] = 0;
	}
	
	$connexion = null;
	return json_encode($array);	
}

function getClient($id){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT *,c.id as id_client,c.creationDate as creationDateClient FROM customer c INNER JOIN ville v ON c.Ville_id = v.id WHERE c.id = :id");
    	
    	$resultats->bindParam(':id', $id);

		$resultats->execute();

		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		$array['result']['client'] = $resultat;

		$resultatsBaby = $connexion->prepare("SELECT * FROM baby WHERE customer_id = :id");
    	
    	$resultatsBaby->bindParam(':id', $id);

		$resultatsBaby->execute();

		$resultatsBaby->setFetchMode(PDO::FETCH_OBJ);
		$resultatBaby = $resultatsBaby->fetchAll();
		$array['result']['baby'] = $resultatBaby;
	} catch (Exception $e) {
		$array['result'] = 0;
	}
	
	$connexion = null;
	return json_encode($array);	
}

function deleteFullClient($id){
	$array = array();
	try {
		$connexion = db_connect();

		$stmt = $connexion->prepare("DELETE FROM baby WHERE customer_id = :id");
    	$stmt->bindParam(':id', $id);
		$stmt->execute();
		// print_r($stmt->rowCount());
		$count_baby = $stmt->rowCount();

		$stmt = $connexion->prepare("DELETE FROM customer WHERE id = :id");
    	$stmt->bindParam(':id', $id);
		$stmt->execute();
		// print_r($stmt->rowCount());
		$count_customer = $stmt->rowCount();
		if($count_baby == 1 && $count_customer == 1){
			$array['result'] = 'ok';
		}

	} catch (Exception $e) {
		$array['result'] = 'ko';
	}
	
	$connexion = null;
	return json_encode($array);	
}

function db_connect(){

	
	/*Local*/
	/*$hote   	='localhost';
	$passDb 	='';
	$hote   	='localhost';
	$passDb 	='';
	$bd 		='oumdev_leads';
	$user		='root';*/

	/*Distant*/
	$hote   	='localhost';
	$passDb 	='oumdev';
	$bd 		='id709237_oumdev_leads';
	$user		='id709237_oumdev';
	

	$connexion = new PDO('mysql:host='.$hote.';dbname='.$bd.';charset=utf8', $user, $passDb);

	return $connexion;
}