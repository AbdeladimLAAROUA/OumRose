<?php
session_start();
//include('config.php');
function db_connect(){
	$params = getConnexionParams();

	$hote		=$params['hote'];
	$passDb 	=$params['passDb'];
	$bd 		=$params['bd'];
	$user		=$params['user'];

	$connexion = new PDO('mysql:host='.$hote.';dbname='.$bd.';charset=utf8', $user, $passDb);

	return $connexion;
}

function getConnexionParams(){
	$array = array();

	/*Local Kindy*/

	/*$array['hote']		= 'localhost';
	$array['passDb'] 	= 'S3cr3T%44';
	$array['bd'] 		= 'oumdev_leads';
	$array['user']		= 'root';
	*/
	/*Local*/

	$array['hote']		= 'localhost';
	$array['passDb'] 	= '';
	$array['bd'] 		= 'oumdev_leads';
	$array['user']		= 'root';
	
	/*Distant*/

/*	$array['hote']		= 'localhost';
	$array['passDb'] 	= 'oumdev';
	$array['bd'] 		= 'id709237_oumdev_leads';
	$array['user']		= 'id709237_oumdev';*/
	
	/*oumtest*/
	
/*	$array['hote']		= 'sql.k4mshost.odns.fr';
	$array['passDb'] 	= '!!oumb0x';
	$array['bd'] 		= 'k4mshost_oumdev';
	$array['user']		= 'k4mshost_oumdev';*/

	return $array;
}
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
		}else if($_REQUEST['methode'] == 'getAllClient2'){
			echo getAllClient2();
		}else if($_REQUEST['methode'] == 'getClient'){
			echo getClient($_REQUEST['id']);
		}else if($_REQUEST['methode'] == 'getClient2'){
			echo getClient2($_REQUEST['id']);
		}else if($_REQUEST['methode'] == 'deleteFullClient'){
			echo deleteFullClient($_REQUEST['id']);
		}else if($_REQUEST['methode'] == 'getAllCities'){
			echo getAllCities();
		}else if($_REQUEST['methode'] == 'getAllTypeMoms'){
			echo getAllTypeMoms();
		}else if($_REQUEST['methode'] == 'createClient'){
			echo createClient($_REQUEST['client']);
		}else if($_REQUEST['methode'] == 'updateClient'){
			echo updateClient($_REQUEST['client'],$_REQUEST['baby']);
		}else if($_REQUEST['methode'] == 'getAllBox'){
			echo getAllBox();
		}else if($_REQUEST['methode'] == 'getAllProduct'){
			echo getAllProduct();
		}else if($_REQUEST['methode'] == 'getAllShop'){
			echo getAllShop();
		}else if($_REQUEST['methode'] == 'getBoxById'){
			echo getBoxById($_REQUEST['id']);
		}else if($_REQUEST['methode'] == 'getProductById'){
			echo getProductById($_REQUEST['id']);
		}else if($_REQUEST['methode'] == 'addProduct'){
			echo addProduct($_REQUEST['product']);
		}else if($_REQUEST['methode'] == 'addBox'){
			echo addBox($_REQUEST['box']);
		}else if($_REQUEST['methode'] == 'deleteBox'){
			echo deleteBox($_REQUEST['id']);
		}else if($_REQUEST['methode'] == 'deleteProduct'){
			echo deleteProduct($_REQUEST['id']);
		}else if($_REQUEST['methode'] == 'updateBox'){
			echo updateBox($_REQUEST['box']);
		}else if($_REQUEST['methode'] == 'updateProduct'){
			echo updateProduct($_REQUEST['product']);
		}else if($_REQUEST['methode'] == 'getAllCats'){
			echo getAllCats();
		}else if($_REQUEST['methode'] == 'getCatById'){
			echo getCatById($_REQUEST['id']);
		}else if($_REQUEST['methode'] == 'addCat'){
			echo addCat($_REQUEST['cat']);
		}else if($_REQUEST['methode'] == 'updateCat'){
			echo updateCat($_REQUEST['cat']);
		}else if($_REQUEST['methode'] == 'deleteCat'){
			echo deleteCat($_REQUEST['id']);
		}else if($_REQUEST['methode'] == 'getNumberPostsByCat'){
			echo getNumberPostsByCat();
		}else if($_REQUEST['methode'] == 'getPostsByCatId'){
			echo getPostsByCatId($_REQUEST['id']);
		}else if($_REQUEST['methode'] == 'addPost'){
			echo addPost($_REQUEST['post']);
		}else if($_REQUEST['methode'] == 'deletePost'){
			echo deletePost($_REQUEST['id']);
		}else if($_REQUEST['methode'] == 'getCatsByPostId'){
			echo getCatsByPostId($_REQUEST['id']);
		}else if($_REQUEST['methode'] == 'getPostById'){
			echo getPostById($_REQUEST['id']);
		}else if($_REQUEST['methode'] == 'updatePost'){
			echo updatePost($_REQUEST['post']);
		}else if($_REQUEST['methode'] == 'addPostCat'){
			echo addPostCat($_REQUEST['id_post'],$_REQUEST['id_cat']);
		}else if($_REQUEST['methode'] == 'deleteCatPost'){
			echo deleteCatPost($_REQUEST['id_post']);
		}else if($_REQUEST['methode'] == 'deletePostCatUp'){
			echo deleteCatPostUpdatePost($_REQUEST['id_post'],$_REQUEST['id_cat']);
		}else if($_REQUEST['methode'] == 'updateVilles'){
			echo updateVilles();
		}else if($_REQUEST['methode'] == 'updateRelais'){
			echo updateRelais($_REQUEST['relais']);
		}else if($_REQUEST['methode'] == 'getRelaisListByVille'){
			echo getRelaisListByVille($_REQUEST['id_ville']);
		}else if($_REQUEST['methode'] == 'getRelaisById'){
			echo getRelaisById($_REQUEST['id_relais']);
		}else if($_REQUEST['methode'] == 'addLivraison'){
			echo addLivraison($_REQUEST['livraison']);
		}else if($_REQUEST['methode'] == 'updateLivraison'){
			echo updateLivraison($_REQUEST['livraison']);
		}else if($_REQUEST['methode'] == 'isUserAlreadyExist'){
			echo isUserAlreadyExist($_REQUEST['email']);
		}else if($_REQUEST['methode'] == 'getCurrentUser'){
			echo getCurrentUser();
		}else if($_REQUEST['methode'] == 'getCommandesLD'){
			echo getCommandesLD();
		}else if($_REQUEST['methode'] == 'getCommandesOX'){
			echo getCommandesOX();
		}else if($_REQUEST['methode'] == 'getCommandesSB'){
			echo getCommandesSB();
		}else if($_REQUEST['methode'] == 'getAllCommandes'){
			echo getAllCommandes();
		}else if($_REQUEST['methode'] == 'getAllCommandes2'){
			echo getAllCommandes2();
		}else if($_REQUEST['methode'] == 'getAllCommandeByCus'){
			echo getAllCommandeByCus($_REQUEST['id_cus']);
		}else if($_REQUEST['methode'] == 'updateBaby'){
			echo updateBaby($_REQUEST['baby']);
		}else if($_REQUEST['methode'] == 'searchUser'){
			echo searchUser($_REQUEST['user']);
		}else if($_REQUEST['methode'] == 'getLivraison'){
			echo getLivraison($_REQUEST['id']);
		}else if($_REQUEST['methode'] == 'getAllQuartiers'){
			echo getAllQuartiers();
		}else if($_REQUEST['methode'] == 'deleteCommande'){
			echo deleteCommande($_REQUEST['id']);
		}else if($_REQUEST['methode'] == 'emailOrGsmAlreadyExists'){
			echo emailOrGsmAlreadyExists($_REQUEST['email'],$_REQUEST['gsm']);
		}else{
			echo json_encode(array('result'=>'method_not_exist'));
		}
	}else{
		echo json_encode(array('result'=>'no_method_selected'));
	}
}

// $id = 216;
// echo getAllBox();
// echo getAllProduct();
// echo getAllShop();
// echo getBoxById(1);
// echo getProductById(1);
// $json_test = '{"refProduct": "fd", "id_box": "2", "id_shop": "1"}';
// $res = json_decode($json_test);
// echo addProduct($res);

function loginGestion($email,$password){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT * FROM user WHERE email=:email and password =:password");

    	$resultats->bindParam(':email', $email);
    	$resultats->bindParam(':password', $password);

		$resultats->execute();

		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetch();

		if($resultats->rowCount() > 0){
			$_SESSION['UserId'] = $resultat->id;
			$_SESSION['name'] 	= $resultat->nom;
			$_SESSION['role_a'] = $resultat->role;
			$array['result'] 	= true;
			$array['infos'] 	= $resultat;
		}else{
			$array['result'] 	= false;
			$array['infos'] 	= 'Not_Found';
		}
	} catch (Exception $e) {
		$array['result'] 	= false;
		$array['infos'] 	= 'Exception';
	}
	
	$connexion = null;
	return json_encode($array);	
}

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

function getCommandesLD(){

	$array = array();
	try {
		$connexion = db_connect();
		$sql =
			"SELECT  cust.id as 'idMaman', cust.nom as 'nomMaman', cust.prenom, cust.gsm as 'GSM1',
			l.gsm as 'GSM2',b.naissance,co.creationDate,p.id_box,co.id as 'idCommande',
			 l.type as 'typeLivraison', l.adresseLivraison, l.quartier,l.status,l.id as 'idLivraison',l.creationDate
			 from  commande co, customer cust, product p, livraison l, baby b
			 where 
			 cust.id=co.customer_id and
             p.id=co.product_id and
             l.commande_id=co.id and
             b.customer_id=cust.id and
             l.type='LD' and
             co.deleted=0
            order by l.creationDate and l.status='Non livré' DESC
             ";
		$resultats = $connexion->prepare($sql);

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
function getCommandesOX(){

	$array = array();
	try {
		$connexion = db_connect();
		$sql =
			"SELECT  cust.id as 'idMaman', cust.nom as 'nomMaman', cust.prenom, cust.gsm as 'GSM1',
			l.gsm as 'GSM2',b.naissance,co.creationDate,p.id_box,co.id as 'idCommande',
			 l.type as 'typeLivraison', l.adresseLivraison, l.quartier,l.status,l.id as 'idLivraison', l.creationDate
			 from  commande co, customer cust, product p, livraison l, baby b
			 where 
			 cust.id=co.customer_id and
             p.id=co.product_id and
             l.commande_id=co.id and
             b.customer_id=cust.id and
             l.type='OX' and 
             co.deleted=0
             order by l.creationDate and l.status='Non livré' DESC
             ";
		$resultats = $connexion->prepare($sql);

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
function getCommandesSB(){

	$array = array();
	try {
		$connexion = db_connect();
		$sql =
			"SELECT cust.id as 'idMaman', cust.nom as 'nomMaman', cust.prenom, cust.GSM as 
			'GSM1',l.gsm as 'GSM2', b.naissance,co.creationDate,p.id_box,co.id as 'idCommande',
			r.nom as 'pointRelais',v.name as'Ville',l.status,l.id as 'idLivraison',l.creationDate
			from livraison l, commande co, customer cust, relais r, ville v,baby b,product p
			where 
			l.commande_id=co.id and 
			cust.id=co.customer_id and 
			l.shop_id=r.id_relais and 
			v.id=r.id_ville and
			b.customer_id=cust.id and
			p.id=co.product_id and
			l.type='SB' and 
			co.deleted=0
			order by l.creationDate and l.status='Non livré' DESC";

		$resultats = $connexion->prepare($sql);

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
function getAllCommandes(){

	$array = array();
	try {
		$connexion = db_connect();
		$sql =
			"SELECT  cust.id as 'idMaman', cust.nom as 'nomMaman', cust.prenom, cust.gsm as 'GSM1',
			l.gsm as 'GSM2',b.naissance,co.creationDate,
			 l.type as 'typeLivraison', l.adresseLivraison, l.quartier,l.creationDate
			 from  commande co, customer cust, product p, livraison l, baby b
			 where 
			 cust.id=co.customer_id and
             p.id=co.product_id and
             l.commande_id=co.id and
             b.customer_id=cust.id and
             l.type='LD' and 
             co.deleted=0
             order by l.creationDate and l.status='Non livré' DESC
             ";
		$resultats = $connexion->prepare($sql);

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
function getAllCommandes2(){

	$array = array();
	try {
		$connexion = db_connect();
		$sql =
			"SELECT  cust.id as 'idMaman', cust.nom as 'nomMaman', cust.prenom, cust.gsm as 'GSM1',
			l.gsm as 'GSM2',b.naissance,co.creationDate,l.status,commande_id as 'idCommande',p.id_box,
			 l.type as 'typeLivraison', l.adresseLivraison, l.quartier,l.id as 'idLivraison',l.creationDate
			 from  commande co, customer cust, product p, livraison l, baby b
			 where 
			 cust.id=co.customer_id and
             p.id=co.product_id and
             l.commande_id=co.id and
             b.customer_id=cust.id and
             co.deleted=0
             order by l.creationDate and l.status='Non livré' DESC
             ";
		$resultats = $connexion->prepare($sql);

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
		

		
		 
              /*for ($i = 0; $i < count($resultat); $i++) {
              	 $boxList[] = $getCommandeByClient($resultat[i]['id']);

              	 $box1="Non commandé";
              	 $box2="Non commandé";
              	 $box3="Non commandé";
              	 
              	 if(in_array('1', $boxList)){
              	   $box1="commandé";
              	 }if(in_array('2', $boxList)){
              	   $box2="commandé";
              	 }if(in_array('3', $boxList)){
              	   $box3="commandé";
				}
				$resultats[i]['refBox1']=$box1;
				$resultats[i]['refBox2']=$box2;
				$resultats[i]['refBox3']=$box3;
          }*/

		$array['result'] = $resultat;
	} catch (Exception $e) {
		$array['result'] = 0;
	}
	
	$connexion = null;
	return json_encode($array);	
}


function getAllClient2(){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT c.id,c.nom, c.prenom, c.email, c.gsm,YEAR(NOW()) - YEAR(c.naissance) as age, c.adresse, ville FROM customer c");

		$resultats->execute();

		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		
		//Récupérer la liste des commande
		$sql =  "SELECT c.id,id_box
				from customer c, commande co, product p, livraison l 
				where c.id=co.customer_id and p.id=co.product_id and  l.commande_id=co.id and  co.deleted=0";
		$commandes = $connexion->prepare($sql);

		$commandes->execute();

		$commandes->setFetchMode(PDO::FETCH_OBJ);
		$commandes = $commandes->fetchAll();
	
		$array['commandes'] = $commandes;
		
		$array['result'] = $resultat;

	} catch (Exception $e) {
		$array['result'] = 0;
		$array['commandes'] = 0;
	}
	
	$connexion = null;
	return json_encode($array);	
}


function getClientWithEligibility(){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT *, CASE WHEN age >=-3 AND age <=0 THEN 'BOX1' WHEN age >=1 AND age <=3 THEN 'BOX2' WHEN age >=6 AND age <=9 THEN 'BOX3' ELSE 'NON_ELIGIBLE' END AS eleg FROM ( SELECT *,PERIOD_DIFF(DATE_FORMAT(NOW(),'%Y%m'),DATE_FORMAT(naissance,'%Y%m')) as age FROM baby ) t INNER JOIN customer c ON c.id = t.customer_id INNER JOIN ville v ON c.Ville_id = v.id");

		$resultats->execute();

		$resultats->setFetchMode(PDO::FETCH_OBJ);
		
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
		//$resultats = $connexion->prepare("SELECT *,c.id as id_client,c.creationDate as creationDateClient FROM customer c INNER JOIN ville v ON c.Ville_id = v.id WHERE c.id = :id");
		$resultats = $connexion->prepare("SELECT *,c.id as id_client,c.creationDate as creationDateClient, ville as 'name' FROM customer c where id=:id");
    	
    	$resultats->bindParam(':id', $id);

		$resultats->execute();

		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		$array['result']['client'] = $resultat;

		
		//liste des bébé
		$resultatsBaby = $connexion->prepare("SELECT * FROM baby WHERE customer_id = :id");
    	
    	$resultatsBaby->bindParam(':id', $id);

		$resultatsBaby->execute();

		$resultatsBaby->setFetchMode(PDO::FETCH_OBJ);
		$resultatBaby = $resultatsBaby->fetchAll();
		$array['result']['baby'] = $resultatBaby;

		//liste des commandes 
		// requete particulière pour les anciens commandes!
		$stmt = $connexion->prepare("SELECT product_id FROM commande where customer_id=:id and  deleted=0");
          $stmt->execute(array(':id'=>$id));
          $clientCommandesId = array();
          if ($stmt->execute()) {
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $clientCommandesId[] = $row['product_id'];
              }
          }
           $boxList = array();
          if( count($clientCommandesId)){
               $qMarks = str_repeat('?,', count($clientCommandesId) - 1) . '?';
            $sth = $connexion->prepare("SELECT * FROM product WHERE id IN ($qMarks)");
           
           
            
            if ($sth->execute($clientCommandesId)) {
                while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                    $boxList[] = $row;		
                }
            }else{

            }
        }


        // liste des livraison 
        $stmt = $connexion->prepare("SELECT id_box,l.status
				from customer c, commande co, livraison l,product p
				where c.id=co.customer_id and  co.product_id=p.id and l.commande_id = co.id and c.id=:id and  co.deleted=0");
         
         $commandes=$stmt->execute(array(':id'=>$id));
        $stmt->setFetchMode(PDO::FETCH_OBJ);
		$commandes = $stmt->fetchAll();

         $test=$commandes;
        

            $array['result']['box']= $boxList;
            $array['result']['commandes']= $commandes;

	} catch (Exception $e) {
		$array['result'] = 0;
	}
	
	$connexion = null;
	return json_encode($array);	
}

function getClient2($id){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT *,c.id as id_client,c.creationDate as creationDateClient FROM customer c where id=:id");
    	
    	$resultats->bindParam(':id', $id);

		$resultats->execute();

		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		$array['result']['client'] = $resultat;

		
		//liste des bébé
		$resultatsBaby = $connexion->prepare("SELECT * FROM baby WHERE customer_id = :id");
    	
    	$resultatsBaby->bindParam(':id', $id);

		$resultatsBaby->execute();

		$resultatsBaby->setFetchMode(PDO::FETCH_OBJ);
		$resultatBaby = $resultatsBaby->fetchAll();
		$array['result']['baby'] = $resultatBaby;

		//liste des commandes 
		// requete particulière pour les anciens commandes!
		$stmt = $connexion->prepare("SELECT product_id FROM commande where customer_id=:id and deleted=0");
          $stmt->execute(array(':id'=>$id));
          $clientCommandesId = array();
          if ($stmt->execute()) {
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $clientCommandesId[] = $row['product_id'];
              }
          }
           $boxList = array();
          if( count($clientCommandesId)){
               $qMarks = str_repeat('?,', count($clientCommandesId) - 1) . '?';
            $sth = $connexion->prepare("SELECT id_box FROM product WHERE id IN ($qMarks)");
           
           
            
            if ($sth->execute($clientCommandesId)) {
                while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                    $boxList[] = $row['id_box'];
                }
            }else{

            }
        }


        // liste des livraison 
        $stmt = $connexion->prepare("SELECT id_box,l.status
				from customer c, commande co, livraison l,product p
				where c.id=co.customer_id and  co.product_id=p.id and l.commande_id = co.id and c.id=:id and  co.deleted=0");
         
         $commandes=$stmt->execute(array(':id'=>$id));
        $stmt->setFetchMode(PDO::FETCH_OBJ);
		$commandes = $stmt->fetchAll();

         $test=$commandes;
        

            $array['result']['box']= $boxList;
            $array['result']['commandes']= $commandes;

	} catch (Exception $e) {
		$array['result'] = 0;
	}
	
	$connexion = null;
	return json_encode($array);	
}

function getCommandeByClient($id){
	try {
		$stmt = $connexion->prepare("SELECT product_id FROM commande where customer_id=:id and  deleted=0");
          $stmt->execute(array(':id'=>$id));
          $clientCommandesId = array();
          if ($stmt->execute()) {
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $clientCommandesId[] = $row['product_id'];
              }
          }
           $boxList = array();
          if( count($clientCommandesId)){
               $qMarks = str_repeat('?,', count($clientCommandesId) - 1) . '?';
            $sth = $connexion->prepare("SELECT id_box FROM product WHERE id IN ($qMarks)");
           
           
            
            if ($sth->execute($clientCommandesId)) {
                while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                    $boxList[] = $row['id_box'];
                }
            }else{

            }
        }

        return $boxList;
	} catch (Exception $e) {
		
	}
}

function deleteFullClient($id){
	$array = array();

	try {
		$connexion = db_connect();

		$stmt = $connexion->prepare("DELETE FROM baby WHERE customer_id = :id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$count_baby = $stmt->rowCount();

		$stmt = $connexion->prepare("DELETE FROM customer WHERE id = :id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
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

function createClient($client){
	$array = array();

	$array['nom'] = $client['nom'];
	$array['prenom'] = $client['prenom'];
	$array['email'] = $client['email'];
	$array['gsm'] = $client['gsm'];
	$array['naissance'] = $client['dof'];
	$array['adresse'] = $client['adresse'];
	$array['cp'] = $client['cp'];
	$array['type'] = $client['type'];
	$array['ville_id'] = $client['ville_id'];
	$villeName=getCityById($client['ville_id']);

	try {
		$connexion = db_connect();

		$stmt = $connexion->prepare("INSERT INTO customer(nom,prenom,email,gsm,naissance,adresse,CP,type,ville_id,ville,eligible,createdBy) 
												VALUES(:nom,:prenom,:email,:gsm,:naissance,:adresse,:cp,:type,:ville_id,:ville,:eligible,:user)");
		
		
		$stmt->bindValue(':nom', $client['nom']);
		$stmt->bindValue(':prenom', $client['prenom']);
		$stmt->bindValue(':email', $client['email']);
		$stmt->bindValue(':gsm', $client['gsm']);
		$stmt->bindValue(':naissance', $client['dof']);
		$stmt->bindValue(':adresse', $client['adresse']);
		$stmt->bindValue(':cp', $client['cp']);
		$stmt->bindValue(':type', $client['type']);
		$stmt->bindValue(':ville_id', $client['ville_id']);
		$stmt->bindValue(':ville', $villeName['name']);
		$stmt->bindValue(':eligible', eligible($client['naissance_bebe']));
		$stmt->bindValue(':user', '1');

		$stmt->execute();
		$idClient = $connexion->lastInsertId();
		if($stmt->rowCount()) {
			
			$stmt = $connexion->prepare("INSERT INTO baby(naissance,gyneco,maternite,customer_id) 
													VALUES(:naissance,:gyneco,:maternite,:customer_id)");
			
			
			$stmt->bindValue(':naissance', $client['naissance_bebe']);
			$stmt->bindValue(':maternite', $client['maternite']);
			$stmt->bindValue(':gyneco', $client['gyneco']);
			$stmt->bindValue(':customer_id', $idClient);
			
			$stmt->execute();
			if($stmt->rowCount()) {
				$array['result'] = 'success';
			}else{
				$array['result'] = 'failed';
			}
			
		} else {
			$array['result'] = 'failed';
		}


		// ajouter une livraison 
		$livraison['user']="admin";
		$livraison['id_box']="2";
		$livraison['idClient']=$idClient;
		$livraison['status']='Livré';
		$livraison['type']='CL';

		addLivraison($livraison);

	} catch (Exception $e) {
		$array['result'] = 'ko';
	}
	
	$connexion = null;

	return json_encode($array);	
}

function updateClient($client,$baby){
	$array = array();

	$array['id'] = $client['id'];
	$array['nom'] = $client['nom'];
	$array['prenom'] = $client['prenom'];
	$array['email'] = $client['email'];
	$array['gsm'] = $client['gsm'];
	$array['naissance'] = $client['dof'];
	$array['adresse'] = $client['adresse'];
	$array['cp'] = $client['cp'];
	$array['type'] = $client['type'];
	$array['Ville_id'] = $client['ville'];



	/*$array['idBebe'] = $baby['id'];
	$array['prenomBebe'] = $baby['prenomBebe'];
	*/


	try {
		$connexion = db_connect();

		$stmt = $connexion->prepare("UPDATE customer SET nom = :nom,prenom = :prenom,email = :email,gsm = :gsm,naissance = :naissance,adresse = :adresse,CP = :cp,type = :type,Ville_id = :Ville_id, eligible = :eligible WHERE id = :id ");
		
		$stmt->bindValue(':id', $client['id']);
		$stmt->bindValue(':nom', $client['nom']);
		$stmt->bindValue(':prenom', $client['prenom']);
		$stmt->bindValue(':email', $client['email']);
		$stmt->bindValue(':gsm', $client['gsm']);
		$stmt->bindValue(':naissance', $client['dof']);
		$stmt->bindValue(':adresse', $client['adresse']);
		$stmt->bindValue(':cp', $client['cp']);
		$stmt->bindValue(':type', $client['type']);
		$stmt->bindValue(':Ville_id', $client['ville']);
		$stmt->bindValue(':eligible',eligible($baby['naissanceBebe']));

		$a =$stmt->execute();



		
		$stmt1 = $connexion->prepare("UPDATE baby SET prenom = :prenom ,sexe = :sexe, MATERNITE = :maternite,naissance= :naissance WHERE id = :id ");

		$stmt1->bindValue(':id', $baby['id']);
		$stmt1->bindValue(':prenom', $baby['prenomBebe']);
		$stmt1->bindValue(':sexe', $baby['sexeBebe']);
		$stmt1->bindValue(':maternite', $baby['maternite']);
		$stmt1->bindValue(':naissance', $baby['naissanceBebe']);

		$b=$stmt1->execute();


		$array['addLivraison']=$client['livraison']['addLivraison'];
		if($client['livraison']['addLivraison']=='true'){
			$livraison['user']='admin';
			$livraison['id_box']='2';
			$livraison['idClient']=$client['id'];
			$livraison['type']=$client['livraison']['type'];
			$livraison['status']='Livré';
			addLivraison($livraison);
		}

		

		if($a or $b) {
			$array['result'] = 'success';
		} else  {
			$array['result'] = 'failed1';
		}
	

		
	} catch (Exception $e) {
		$array['result'] = 'ko';
	}
	
	$connexion = null;

	return json_encode($array);	
}

function updateBaby($baby){
	$array = array();

	try {
		$connexion = db_connect();

		$stmt = $connexion->prepare("UPDATE `baby` SET `naissance`= :naissance,`prenom`= :prenom,`sexe`= :sexe,`MATERNITE`= :MATERNITE,`GYNECO`= :GYNECO WHERE `id`= :id");
		
		$stmt->bindValue(':id', $baby['id']);
		$stmt->bindValue(':prenom', $baby['prenom']);
		$stmt->bindValue(':sexe', $baby['sexe']);
		$stmt->bindValue(':GYNECO', $baby['gyneco']);
		$stmt->bindValue(':MATERNITE', $baby['maternite']);
		$stmt->bindValue(':naissance', $baby['naissance']);

		$stmt->execute();

		if($stmt->rowCount()) {
			$array['result'] = 'success';
		} else {
			$array['result'] = 'failed';
		}
	} catch (Exception $e) {
		$array['result'] = 'ko';
	}
	
	$connexion = null;

	return json_encode($array);	
}

function deleteCommande($id){
	$array = array();

	try {
		$connexion = db_connect();

		$resultats = $connexion->prepare("SELECT co.id FROM commande co INNER JOIN livraison l ON l.commande_id=co.id where l.id=:id and co.deleted=0");

		$resultats->bindValue(':id', $id);
		$resultats->execute();

		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$commande_id = $resultats->fetchColumn();




		$stmt = $connexion->prepare("UPDATE `commande` SET `deleted`= 1 WHERE `id`= :id");
		
		$stmt->bindValue(':id', $commande_id);

		$stmt->execute();


		$stmt = $connexion->prepare("UPDATE `livraison` SET `deleted`= 1 WHERE `id`= :id");
		
		$stmt->bindValue(':id', $id);

		$stmt->execute();



		if($stmt->rowCount()) {
			$array['result'] = 'ok';
		} else {
			$array['result'] = 'failed';
		}
	} catch (Exception $e) {
		$array['result'] = 'ko';
	}
	
	$connexion = null;

	return json_encode($array);	
}

function getAllBox(){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT * FROM box");

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

function getAllProduct(){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT *,p.id as id_product FROM product p INNER JOIN box b ON b.id = p.id_box INNER JOIN shop s ON p.id_shop = s.id");

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

function getAllShop(){
	$array = array();
	try {
		$connexion = db_connect();
		//$resultats = $connexion->prepare("SELECT s.*,s.id as id_shop, v.name as ville_name FROM `shop` s INNER JOIN ville v ON s.Ville_id = v.id");
		$resultats = $connexion->prepare("SELECT * FROM `shop` where (type!='Points de retrait' or Name='Oumbox')");

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

function getBoxById($id){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT * FROM `box`WHERE id = :id");
    	
    	$resultats->bindParam(':id', $id);

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

function getLivraison($id){
	$array = array();
	try {
		$connexion = db_connect();
		$sql ="SELECT l.*, co.customer_id,r.id_ville,r.nom as 'relais',r.id_relais
				FROM livraison l 
				INNER JOIN commande co 
				ON l.commande_id = co.id
				LEFT JOIN relais r
				ON shop_id = r.id_relais
				WHERE l.id = :id and  co.deleted=0" ;
		$resultats = $connexion->prepare($sql);
    	
    	$resultats->bindParam(':id', $id);

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

function getProductById($id){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT *, p.id as id_product FROM `product` p INNER JOIN box b ON b.id = p.id_box INNER JOIN shop s ON s.id = p.id_shop WHERE p.id = :id");
    	
    	$resultats->bindParam(':id', $id);

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

function addProduct($product){
	$array = array();
	try {
		$connexion = db_connect();
		$sql = "INSERT INTO `product`(`id_box`, `id_shop`, `RefBox`) VALUES (:id_box, :id_shop, :RefBox)";
		
		//Prepare our statement.
		$statement = $connexion->prepare($sql);
		
		//Bind our values to our parameters (we called them :make and :model).
		$statement->bindValue(':id_box', $product['id_box']);
		$statement->bindValue(':id_shop', $product['id_shop']);
		$statement->bindValue(':RefBox', $product['refProduct']);
		 
		//Execute the statement and insert our values.
		$inserted = $statement->execute();
		 
		//Because PDOStatement::execute returns a TRUE or FALSE value,
		//we can easily check to see if our insert was successful.
		if($inserted){
			$indertedId = $connexion->lastInsertId();
			$array['inserted_id'] = $indertedId;
			$array['result'] = 1;
		}

	} catch (Exception $e) {
		$array['result'] = 0;
	}
	
	$connexion = null;
	return json_encode($array);
}

function addProduct2($product){
	$array = array();
	try {
		$connexion = db_connect();
		$sql = "INSERT INTO `product`(`id_box`) VALUES (:id_box)";
		
		//Prepare our statement.
		$statement = $connexion->prepare($sql);
		
		//Bind our values to our parameters (we called them :make and :model).
		$statement->bindValue(':id_box', $product['id_box']);
		 
		//Execute the statement and insert our values.
		$inserted = $statement->execute();
		 
		//Because PDOStatement::execute returns a TRUE or FALSE value,
		//we can easily check to see if our insert was successful.
		if($inserted){
			$indertedId = $connexion->lastInsertId();
			$array['inserted_id'] = $indertedId;
			$array['result'] = 1;
			return $indertedId;
		}

	} catch (Exception $e) {
		$array['result'] = 0;
	}
	
	$connexion = null;
}

function addBox($box){
	$array = array();
	try {
		$connexion = db_connect();
		$sql = "INSERT INTO `box` (`name`, `debut`, `fin`, `description`) VALUES (:name, :debut, :fin, :description)";
		
		//Prepare our statement.
		$statement = $connexion->prepare($sql);
		
		//Bind our values to our parameters (we called them :make and :model).
		$statement->bindValue(':name', $box['name']);
		$statement->bindValue(':debut', $box['debut']);
		$statement->bindValue(':fin', $box['fin']);
		$statement->bindValue(':description', $box['description']);
		 
		//Execute the statement and insert our values.
		$inserted = $statement->execute();
		 
		//Because PDOStatement::execute returns a TRUE or FALSE value,
		//we can easily check to see if our insert was successful.
		if($inserted){
			$indertedId = $connexion->lastInsertId();
			$array['inserted_id'] = $indertedId;
			$array['result'] = 1;
		}

	} catch (Exception $e) {
		$array['result'] = 0;
	}
	
	$connexion = null;
	return json_encode($array);
}

function updateBox($box){
	$array = array();

	try {
		$connexion = db_connect();

		$stmt = $connexion->prepare("UPDATE `box` SET `name`= :name,`debut`= :debut,`fin`= :fin,`description`= :description WHERE id = :id ");
		
		$stmt->bindValue(':id', $box['id']);
		$stmt->bindValue(':name', $box['name']);
		$stmt->bindValue(':debut', $box['debut']);
		$stmt->bindValue(':fin', $box['fin']);
		$stmt->bindValue(':description', $box['description']);

		$stmt->execute();

		if($stmt->rowCount()) {
			$array['result'] = 'success';
		} else {
			$array['result'] = 'failed';
		}
	} catch (Exception $e) {
		$array['result'] = 'ko';
	}
	
	$connexion = null;

	return json_encode($array);	
}

function updateProduct($product){
	$array = array();

	try {
		$connexion = db_connect();

		$stmt = $connexion->prepare("UPDATE `product` SET `id_box`= :id_box,`id_shop`= :id_shop,`RefBox`= :RefBox WHERE id = :id ");
		
		$stmt->bindValue(':id', $product['id']);
		$stmt->bindValue(':id_box', $product['id_box']);
		$stmt->bindValue(':id_shop', $product['id_shop']);
		$stmt->bindValue(':RefBox', $product['RefBox']);

		$stmt->execute();

		if($stmt->rowCount()) {
			$array['result'] = 'success';
		} else {
			$array['result'] = 'failed';
		}
	} catch (Exception $e) {
		$array['result'] = 'ko';
	}
	
	$connexion = null;

	return json_encode($array);	
}

function deleteBox($id){
	$array = array();
	$array['result'] = 0;

	try {
		$connexion = db_connect();

		$stmt = $connexion->prepare("DELETE FROM `box` WHERE id = :id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$count = $stmt->rowCount();

		if($count == 1){
			$array['result'] = 1;
		}

	} catch (Exception $e) {
		$array['result'] = 0;
	}
	
	$connexion = null;
	return json_encode($array);	
}

function deleteProduct($id){
	$array = array();
	$array['result'] = 0;

	try {
		$connexion = db_connect();

		$stmt = $connexion->prepare("DELETE FROM `product` WHERE id = :id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$count = $stmt->rowCount();

		if($count == 1){
			$array['result'] = 1;
		}

	} catch (Exception $e) {
		$array['result'] = 0;
	}
	
	$connexion = null;
	return json_encode($array);	
}

function getAllCats(){
	$array = array();

	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT * FROM `blog_cats`");

		$resultats->execute();

		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		$array['status'] = 'success';
		$array['result'] = $resultat;
	} catch (Exception $e) {
		$array['status'] = 'failed';
		$array['result'] = 0;
	}
	
	$connexion = null;
	return json_encode($array);	
}

function getCatById($id){
	$array = array();

	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT * FROM `blog_cats` WHERE catID = :id");
		
		$resultats->bindParam(':id', $id);

		$resultats->execute();

		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		$array['status'] = 'success';
		$array['result'] = $resultat;

	} catch (Exception $e) {
		$array['result'] = 0;
		$array['status'] = 'failed';
	}

	$connexion = null;
	return json_encode($array);
}

function addCat($cat){
	$array = array();
	$catSlug = slug($cat['catTitle']);

	try {
		$connexion = db_connect();
		$sql = "INSERT INTO `blog_cats`(`catTitle`, `catSlug`) VALUES (:catTitle, :catSlug)";
		
		//Prepare our statement.
		$statement = $connexion->prepare($sql);
		
		//Bind our values to our parameters (we called them :make and :model).
		$statement->bindValue(':catTitle', $cat['catTitle']);
		$statement->bindValue(':catSlug', $catSlug);
		 
		//Execute the statement and insert our values.
		$inserted = $statement->execute();
		 
		//Because PDOStatement::execute returns a TRUE or FALSE value,
		//we can easily check to see if our insert was successful.
		if($inserted){
			$indertedId = $connexion->lastInsertId();
			$array['status'] = 'success';
			$array['inserted_id'] = $indertedId;
		}

	} catch (Exception $e) {
		$array['status'] = 'failed';
	}
	
	$connexion = null;
	return json_encode($array);
}
function addLivraison($livraison){
	$array = array();
	$connexion = db_connect();
	if($livraison['user']=="admin"){
		// ajouter une livraison 

		//ajouter d'abord un produit
		
		$today = date("dmY");
		$RefBox =  $today.$livraison['type'].$livraison['idClient'];

		$product['id_box']=$livraison['id_box'];
		$product['refProduct']=$RefBox;
		$product['id_shop']=1;

		$insertedProduct = json_decode(addProduct($product),true);
		
		//ajouter ensuite une commande
		$commande['BC']="default";
		$commande['product_id']  = $insertedProduct['inserted_id'];
		$commande['customer_id']  = $livraison['idClient'];
		$resultJS = addCommande($commande);
		$result = json_decode($resultJS,true);
		$id_commande = $result['inserted_id'];
		$sql = "INSERT INTO livraison (commande_id, type,status) 
		VALUES (:commande_id, :type,:status)";
		//Prepare our statement.
		$statement = $connexion->prepare($sql);
		
		$statement->bindValue(':commande_id', $id_commande);
		$statement->bindValue(':status', $livraison['status']);
		$statement->bindValue(':type', $livraison['type']);
		//Execute the statement and insert our values.
		$inserted = $statement->execute();
		$array['result'] = 'success';

	}
	else{
		$product['id_box']=$_SESSION['eligibleToBox'];
		$_SESSION['lastEligibleToBox']=$_SESSION['eligibleToBox'];
		$_SESSION['eligibleToBox']=0;// le client n'est plus éligible 
		$idProduct = addProduct2($product);

		$commande['BC']="default";
		$commande['product_id']  = $idProduct;
		$commande['customer_id'] = $_SESSION['client_id'];
		$resultJS = addCommande($commande);
		$result = json_decode($resultJS,true);
		$id_commande = $result['inserted_id'];

		try {
			
			$sql="";
			if($livraison['type']=='OX'){
				$sql = "INSERT INTO livraison (commande_id, type) 
				VALUES (:commande_id, 'OX')";
			}
			else if($livraison['relais']=='NULL'){
				$sql = "INSERT INTO livraison (adresseLivraison, commande_id, type, quartier,gsm) 
				VALUES (:adresseLivraison, :commande_id, :type, :quartier,:gsm)";	
			}
			else{
				$sql = "INSERT INTO livraison (adresseLivraison,shop_id, commande_id, type, quartier,gsm) 
				VALUES (:adresseLivraison, :shop_id, :commande_id, :type, :quartier,:gsm)";	
			}
			//Prepare our statement.
			$statement = $connexion->prepare($sql);
			
			$statement->bindValue(':commande_id', $id_commande);
			if($livraison['type']!='OX'){
				
				//Bind our values to our parameters (we called them :make and :model).
			
				if($livraison['relais']!='NULL')
				$statement->bindValue(':shop_id', $livraison['relais']);
				
				$statement->bindValue(':adresseLivraison', $livraison['adresse']);
				$statement->bindValue(':type', $livraison['type']);
				$statement->bindValue(':quartier', $livraison['quartier']);
				$statement->bindValue(':gsm', $livraison['gsm']);
			}

		
			 
			//Execute the statement and insert our values.
			$inserted = $statement->execute();
			 
			//Because PDOStatement::execute returns a TRUE or FALSE value,
			//we can easily check to see if our insert was successful.
			if($inserted){
				$indertedId = $connexion->lastInsertId();
				$array['result'] = 'success';
				$array['inserted_id'] = $indertedId;
			}else{
				echo 'error';
			}

		} catch (Exception $e) {
			$array['status'] = 'failed';
		}
	}
	
	$connexion = null;
	return json_encode($array);
}
function updateLivraison($livraison){
	$array = array();

	try {
		$connexion = db_connect();
		$sql="";

		$resultats = $connexion->prepare("SELECT c.customer_id,c.id from commande c,livraison l where l.commande_id = c.id and l.id=:id and  c.deleted=0");
		$resultats->bindParam(':id', $livraison['id']);
		$resultats->execute();
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$commande = $resultats->fetchAll();
		

		$today = date("dmY");
		$RefBox =  $today.$livraison['type'].$commande[0]->customer_id;
		$sql='';
		if(isset($livraison['quartier']) and isset($livraison['adresse']) and isset($livraison['relais'])  )
		$sql = "UPDATE livraison set type=:type,status=:status, quartier=:quartier,adresseLivraison=:adresse,shop_id=:relais where id=:id";		
		else
		$sql = "UPDATE livraison set type=:type,status=:status where id=:id";		
		//Prepare our statement.
		$statement = $connexion->prepare($sql);
		
		$statement->bindValue(':id', $livraison['id']);		 
		$statement->bindValue(':status', $livraison['status']);		
		$statement->bindValue(':type', $livraison['type']);		
		if(isset($livraison['quartier']) and isset($livraison['adresse']) and isset($livraison['relais'])  ){
			$statement->bindValue(':quartier', $livraison['quartier']);		
			$statement->bindValue(':adresse', $livraison['adresse']);		
			$statement->bindValue(':relais', $livraison['relais']);		
		}
			
 
		
		//Execute the statement and insert our values.
		$updated = $statement->execute();	

		if($updated){
			$array['status'] = 'success';
		}else{
			echo 'error';
		}
		
		if($array['status'] == 'success' and $livraison['status']=="Livré"){
			$sql = "UPDATE product p 
			JOIN commande co ON p.id=co.product_id 
			JOIN customer c ON c.id=co.customer_id 
			set RefBox=:RefBox
			where customer_id=:customer_id
			and co.id=:commande_id and  co.deleted=0
			";
			//Prepare our statement.
			$statement = $connexion->prepare($sql);
			
			$statement->bindValue(':RefBox', $RefBox);		 	
			$statement->bindValue(':customer_id', $commande[0]->customer_id);		 	
			$statement->bindValue(':commande_id', $commande[0]->id);		 	

			
			//Execute the statement and insert our values.
			$updated = $statement->execute();
			
			//Because PDOStatement::execute returns a TRUE or FALSE value,
			//we can easily check to see if our insert was successful.
			if($updated){
				$array['status'] = 'success';
			}else{
				echo 'error';
			}
		}


	} catch (Exception $e) {
		$array['status'] = 'failed';
	}
	
	$connexion = null;
	return json_encode($array);
}
function addCommande($commande){
	$array = array();

	try {
		$connexion = db_connect();
		$sql = "INSERT INTO commande(customer_id, product_id, BC) VALUES (:customer_id, :product_id, :BC)";
		
		//Prepare our statement.
		$statement = $connexion->prepare($sql);
		
		//Bind our values to our parameters (we called them :make and :model).
		$statement->bindValue(':customer_id', $commande['customer_id']);
		$statement->bindValue(':product_id', $commande['product_id']);
		$statement->bindValue(':BC', $commande['BC']);
		 

		//Execute the statement and insert our values.
		$inserted = $statement->execute();
		 

		//Because PDOStatement::execute returns a TRUE or FALSE value,
		//we can easily check to see if our insert was successful.
		if($inserted){
			$indertedId = $connexion->lastInsertId();
			$array['status'] = 'success';
			$array['inserted_id'] = $indertedId;
		}

	} catch (Exception $e) {
		$array['status'] = 'failed';
	}
	
	$connexion = null;
	return json_encode($array);
}

function updateCat($cat){
	$array = array();
	$catSlug = slug($cat['catTitle']);

	try {
		$connexion = db_connect();

		$stmt = $connexion->prepare("UPDATE `blog_cats` SET `catTitle` = :catTitle,`catSlug` = :catSlug WHERE catID = :id ");
		
		$stmt->bindValue(':id', $cat['id']);
		$stmt->bindValue(':catTitle', $cat['catTitle']);
		$stmt->bindValue(':catSlug', $catSlug);

		$stmt->execute();

		if($stmt->rowCount()) {
			$array['result'] = 'success';
		} else {
			$array['result'] = 'failed';
		}
	} catch (Exception $e) {
		$array['result'] = 'failed';
	}
	
	$connexion = null;

	return json_encode($array);	
}

function deleteCat($id){
	$array = array();
	$array['result'] = 0;

	try {
		$connexion = db_connect();

		$stmt = $connexion->prepare("DELETE FROM `blog_cats` WHERE catID = :id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$count = $stmt->rowCount();

		if($count == 1){
			$array['result'] = 'success';
		}else{
			$array['result'] = 'failed';
		}
	} catch (Exception $e) {
		$array['result'] = 'failed';
	}
	
	$connexion = null;
	return json_encode($array);	
}

function getNumberPostsByCat(){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT bc.catID, bc.catTitle, COUNT(*) as nombre FROM `blog_post_cats` bpc INNER JOIN `blog_cats` bc ON bpc.catID = bc.catID GROUP BY bc.catID");
		$resultats->execute();
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		$array['result'] = $resultat;
		$array['status'] = 'success';
	} catch (Exception $e) {
		$array['status'] = 'failed';
	}
	
	$connexion = null;
	return json_encode($array);	
}

function getPostsByCatId($id){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT bps.postID, bps.postTitle, bps.postDate FROM `blog_posts_seo` bps INNER JOIN `blog_post_cats` bpc ON bps.postID = bpc.postID WHERE bpc.catID = :id");
		$resultats->bindParam(':id', $id);
		$resultats->execute();
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		$array['result'] = $resultat;
		$array['status'] = 'success';
	} catch (Exception $e) {
		$array['status'] = 'failed';
	}
	
	$connexion = null;
	return json_encode($array);	
}

function addPost($post){
	$array = array();
	$postSlug = slug($post['title']);

	try {
		$connexion = db_connect();
		$sql = "INSERT INTO `blog_posts_seo`(`postTitle`, `postSlug`, `postDesc`, `postCont`) VALUES (:postTitle, :postSlug, :postDesc, :postCont)";
		
		//Prepare our statement.
		$statement = $connexion->prepare($sql);
		
		//Bind our values to our parameters (we called them :make and :model).
		$statement->bindValue(':postTitle', $post['title']);
		$statement->bindValue(':postSlug', $postSlug);
		$statement->bindValue(':postDesc', $post['desc']);
		$statement->bindValue(':postCont', $post['content']);
		 
		//Execute the statement and insert our values.
		$inserted = $statement->execute();
		 
		//Because PDOStatement::execute returns a TRUE or FALSE value,
		//we can easily check to see if our insert was successful.
		if($inserted){
			$indertedId = $connexion->lastInsertId();

			foreach ($post['catArray'] as $catId) {
				addPostCat($indertedId,$catId);
			}
			
			$array['status'] = 'success';
			$array['inserted_id'] = $indertedId;
		}

	} catch (Exception $e) {
		$array['status'] = 'failed';
	}
	
	$connexion = null;
	return json_encode($array);
}

function addPostCat($postId, $catId){
	$array = array();
	try {
		$connexion = db_connect();
		$sql = "INSERT INTO `blog_post_cats`(`postID`, `catID`) VALUES (:postID,:catID)";
		
		//Prepare our statement.
		$statement = $connexion->prepare($sql);
		
		//Bind our values to our parameters (we called them :make and :model).
		$statement->bindValue(':postID', $postId);
		$statement->bindValue(':catID', $catId);
		 
		//Execute the statement and insert our values.
		$inserted = $statement->execute();
		 
		//Because PDOStatement::execute returns a TRUE or FALSE value,
		//we can easily check to see if our insert was successful.
		if($inserted){
			// $indertedId = $connexion->lastInsertId();
			// $array['inserted_id'] = $indertedId;
			$array['result'] = 'success';
		}

	} catch (Exception $e) {
		$array['result'] = 0;
	}
	
	$connexion = null;
	return json_encode($array);
}

function deletePost($id){
	$array = array();
	$array['result'] = 0;

	try {
		$connexion = db_connect();

		$stmt = $connexion->prepare("DELETE FROM `blog_posts_seo` WHERE `postID` = :postID");
		$stmt->bindParam(':postID', $id);
		$stmt->execute();
		$count = $stmt->rowCount();

		if($count == 1){
			$res = deleteCatPost($id);
		}else{
			$array['result'] 	= 'empty';
			$res 				= json_encode($array);
		}
	} catch (Exception $e) {
		$array['result'] 	= 'failed';
		$res 				= json_encode($array);
	}
	
	$connexion = null;
	return $res;	
}

function deleteCatPost($id){
	$array = array();
	$array['result'] = 0;

	try {
		$connexion = db_connect();

		$stmtCat = $connexion->prepare("DELETE FROM `blog_post_cats` WHERE `postID` = :postID");
		$stmtCat->bindParam(':postID', $id);
		$stmtCat->execute();
		$countCat = $stmtCat->rowCount();
		if($countCat >= 1){
			$array['result'] = 'success';
		}else{
			$array['result'] = 'failed';
		}
	} catch (Exception $e) {
		$array['result'] = 'failed';
	}
	
	$connexion = null;
	return json_encode($array);	
}

function deleteCatPostUpdatePost($idPost, $idCat){
	$array = array();
	$array['result'] = 0;

	try {
		$connexion = db_connect();

		$stmtCat = $connexion->prepare("DELETE FROM `blog_post_cats` WHERE `postID` = :postID AND `catID` = :catID");
		$stmtCat->bindParam(':postID', $idPost);
		$stmtCat->bindParam(':catID', $idCat);
		$stmtCat->execute();
		$countCat = $stmtCat->rowCount();
		if($countCat >= 1){
			$array['result'] = 'success';
		}else{
			$array['result'] = 'failed';
		}
	} catch (Exception $e) {
		$array['result'] = 'failed';
	}
	
	$connexion = null;
	return json_encode($array);	
}

function getCatsByPostId($id){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT `catID` FROM `blog_post_cats` WHERE `postID` = :postID");
		$resultats->bindParam(':postID', $id);
		$resultats->execute();
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();

		if($resultat > 0){
			$array['result'] = $resultat;
			$array['status'] = 'success';
		}else{
			$array['status'] = 'empty';
		}
	} catch (Exception $e) {
		$array['status'] = 'failed';
	}
	
	$connexion = null;
	return json_encode($array);	
}

function getPostById($id){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT * FROM `blog_posts_seo` WHERE `postID`= :postID");
		$resultats->bindParam(':postID', $id);
		$resultats->execute();
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		if($resultat > 0){
			$array['result'] = $resultat;
			$array['status'] = 'success';
		}else{
			$array['status'] = 'empty';			
		}
	} catch (Exception $e) {
		$array['status'] = 'failed';
	}
	
	$connexion = null;
	return json_encode($array);	
}

function updatePost($post){
	$array = array();
	$postSlug = slug($post['title']);

	try {
		$connexion = db_connect();

		$stmt = $connexion->prepare("UPDATE `blog_posts_seo` SET `postTitle`= :postTitle, `postSlug`= :postSlug, `postDesc`= :postDesc, `postCont`= :postCont WHERE `postID` = :postID");
		
		$stmt->bindValue(':postTitle', $post['title']);
		$stmt->bindValue(':postSlug', $postSlug);
		$stmt->bindValue(':postDesc', $post['desc']);
		$stmt->bindValue(':postCont', $post['content']);
		$stmt->bindValue(':postID', $post['postId']);

		$stmt->execute();

		if($stmt->rowCount()) {
			$array['result'] = 'success';
		} else {
			$array['result'] = 'failed';
		}
	} catch (Exception $e) {
		$array['result'] = 'failed';
	}
	
	$connexion = null;

	return json_encode($array);	
}

function getAllCommandeByCus($id){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT co.id, b.name, b.description, co.creationDate,l.type FROM commande co INNER JOIN customer cu ON co.customer_id = cu.id INNER JOIN livraison l ON l.commande_id = co.id INNER JOIN product pr ON co.product_id = pr.id INNER JOIN box b ON pr.id_box = b.id WHERE co.customer_id = :id_cus and  co.deleted=0");
		$resultats->bindParam(':id_cus', $id);
		$resultats->execute();
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		if($resultat > 0){
			$array['result'] = $resultat;
			$array['status'] = 'success';
		}else{
			$array['status'] = 'empty';			
		}
	} catch (Exception $e) {
		$array['status'] = 'failed';
	}
	
	$connexion = null;
	return json_encode($array);	
}

function updateVilles(){
	$array = array();
	$villes=$_POST['villes'];

	try {
		$connexion = db_connect();

		$stmt = $connexion->prepare('DELETE FROM ville where 1');
		$stmt->execute();
		$stmt = $connexion->prepare('ALTER TABLE ville AUTO_INCREMENT = 1');
		$stmt->execute();

		$stmt = $connexion->prepare('DELETE FROM relais where 1');
		$stmt->execute();

		$stmt = $connexion->prepare('ALTER TABLE relais AUTO_INCREMENT = 1');
		$stmt->execute();


		$requet="INSERT INTO ville (name)
				SELECT * FROM (SELECT :villeName) AS tmp
				WHERE NOT EXISTS (
				    SELECT name FROM ville WHERE name = :villeName
				) LIMIT 1;";
		foreach ($villes as $key => $villeName) {
			$stmt = $connexion->prepare($requet);

			echo $stmt->bindValue(':villeName', $villeName);
			$stmt->execute();

			if($stmt->rowCount()) {
				$array['result'] = 'success';
			} else {
				$array['result'] = 'failed --> error';
			}
		}
	} catch (Exception $e) {
		$array['result'] = 'failed --> exception';
	}
	
	$connexion = null;

	return json_encode($array);	
}
function updateRelais($relais){
	$array = array();

	$villeJS=getVilleIdByName($relais['ville']);
	$ville = json_decode($villeJS,true);
	$id_ville =  $ville['result'][0]['id'];
	try {
		$connexion = db_connect();
		

		$requet="INSERT INTO relais (gps_lat,gps_lng,nom,adresse,id_relais,id_ville)
					values(:gps_lat,:gps_lng,:nom,:adresse,:id_relais,:id_ville)";
				  
		foreach ($relais['relaisList'] as $key => $relaisElement) {
			$stmt = $connexion->prepare($requet);

			$stmt->bindValue(':gps_lat', $relaisElement['gps_lat']);
			$stmt->bindValue(':gps_lng', $relaisElement['gps_lng']);
			$stmt->bindValue(':nom', $relaisElement['nom']);
			$stmt->bindValue(':adresse', $relaisElement['adresse']);
			$stmt->bindValue(':id_relais', $relaisElement['id']);
			$stmt->bindValue(':id_ville', $id_ville);
			$stmt->execute();

			if($stmt->rowCount()) {
				$array['result'] = 'success';
			} else {
				$array['result'] = 'failed --> error';
			}
		}
	} catch (Exception $e) {
		$array['result'] = 'failed --> exception';
	}
	
	$connexion = null;

	return json_encode($array);	
}

function getCityById($id){
      try
       {
       	  $connexion = db_connect();
          $stmt = $connexion->prepare("SELECT * FROM ville where id=:id");
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

function getVilleIdByName($name){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT id FROM ville WHERE name= :name");
		$resultats->bindParam(':name', $name);
		$resultats->execute();
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		if($resultat > 0){
			$array['result'] = $resultat;
			$array['status'] = 'success';
		}else{
			$array['status'] = 'empty';			
		}
	} catch (Exception $e) {
		$array['status'] = 'failed';
	}
	
	$connexion = null;
	return json_encode($array);	
}

function getAllQuartiers(){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT * FROM quartier");

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

 function getCurrentUser(){
 	$array = array();
	
	try {
		$connexion = db_connect();

		$resultats = $connexion->prepare("SELECT * FROM customer WHERE id=:id LIMIT 1");
		$resultats->bindParam(':id', $_SESSION['client_id']);
		$resultats->execute();
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		$array['result'] = $resultat;
		$array['status'] = 'success';
	} catch (Exception $e) {
		$array['status'] = 'failed';
	}
	
	$connexion = null;
	return json_encode($array);	
	
}
function isUserAlreadyExist($email){
	$array = array();
	
	try {
		$connexion = db_connect();

		$resultats = $connexion->prepare("SELECT id FROM customer WHERE email= :email");
		$resultats->bindParam(':email', $email);
		$resultats->execute();
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();

		if(count($resultat) > 0){
			$array['result'] = $resultat;
			$array['isUserAlreadyExist'] = true;
			$array['status'] = 'success';
		}else{
			$array['status'] = 'empty';		
			$array['isUserAlreadyExist'] = false;
	
		}
	} catch (Exception $e) {
		$array['status'] = 'failed';
	}
	
	$connexion = null;
	return json_encode($array);	
}

function emailOrGsmAlreadyExists($email,$gsm){
	$array = array();
	
	try {
		$connexion = db_connect();
		$response='';
		
		$resultats = $connexion->prepare("SELECT id FROM customer WHERE gsm= :gsm");
		$resultats->bindParam(':gsm', $gsm);
		$resultats->execute();
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();

		$array['isUserAlreadyExist'] = false;
		if(count($resultat) > 0){
			$array['result'] = $resultat;
			$array['isUserAlreadyExist'] = true;
			$array['status'] = 'success';
			$array['response']='Téléphone déjà existant';
		}else{
			$array['status'] = 'success';	
			$array['isUserAlreadyExist'] = false;
	
		}
		if(!$array['isUserAlreadyExist']){
			$resultats = $connexion->prepare("SELECT id FROM customer WHERE email= :email");
			$resultats->bindParam(':email', $email);
			$resultats->execute();
			$resultats->setFetchMode(PDO::FETCH_OBJ);
			$resultat = $resultats->fetchAll();

			if(count($resultat) > 0){
				$array['result'] = $resultat;
				$array['isUserAlreadyExist'] = true;
				$array['status'] = 'success';
				$array['response']='Email déjà existant';
			}else{
				$array['status'] = 'success';	
				$array['isUserAlreadyExist'] = false;
			
			}
		}

	} catch (Exception $e) {
		$array['status'] = 'failed';
	}
	
	$connexion = null;
	return json_encode($array);	
}

function getRelaisListByVille($id){
	$array = array();
	try {
		$connexion = db_connect();
		$resultats = $connexion->prepare("SELECT * FROM `relais` WHERE `id_ville`= :id");
		$resultats->bindParam(':id', $id);
		$resultats->execute();
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		if($resultat > 0){
			$array['result'] = $resultat;
			$array['status'] = 'success';
		}else{
			$array['status'] = 'empty';			
		}
	} catch (Exception $e) {
		$array['status'] = 'failed';
	}
	
	$connexion = null;
	return json_encode($array);	
}

function eligible($naissanceBebe){
        
        $eligible='';
        // Date d'aujourd'hui
        $today = new DateTime(date('Y-m-d'));

        $naissance= new DateTime($naissanceBebe);
        

        $interval = date_diff($today, $naissance);

        $diffJours = $interval->format('%R%a days');
        
        if($diffJours>=7 && $diffJours<=146 ){
                  $eligible='BOX1';
        }
        else if($diffJours<=-7 && $diffJours>=-122){
               $eligible='BOX2';
        }
        else if($diffJours<=-183 && $diffJours>=-305 ){
              $eligible='BOX3';
        }
        return $eligible;
}


function searchUser($user){
	$array = array();
	try {
		$connexion = db_connect();
		$params = array();
		$sql='SELECT c.id,c.nom, c.prenom, c.email, c.gsm,YEAR(NOW()) - YEAR(c.naissance) as age, c.adresse, ville FROM customer c where id>0 ';
		if($user['email']!=''){
			$sql.="and email=:email ";
			$params['email']=$user['email'];
		}if($user['nom']!=''){
			$sql.="and nom=:nom ";
			$params['nom']=$user['nom'];
		}if($user['prenom']!=''){
			$sql.="and prenom=:prenom ";
			$params['prenom']=$user['prenom'];
		}if($user['gsm']!=''){
			$gsm1 = $user['gsm'];
			$regex = '/(\\d{2})(\\d{2})(\\d{2})(\\d{2})(\\d{2})/';
			$gsm2 = preg_replace($regex, '$1 $2 $3 $4 $5', $gsm1);
			$gsm3 = preg_replace($regex, '$1.$2.$3.$4.$5', $gsm1);
			$sql.="and gsm LIKE :gsm1 or gsm LIKE :gsm2 or gsm LIKE :gsm3 or gsm LIKE :gsm4 or gsm LIKE :gsm5 ";
			$params['gsm1']='%'.$gsm1.'%';
			$params['gsm2']='%'.$gsm2.'%';
			$params['gsm3']='%'.$gsm3.'%';
			$params['gsm4']='%'.substr($gsm2, 1).'%';
			$params['gsm5']='%'.substr($gsm3, 1).'%';
		}		

		$resultats = $connexion->prepare($sql);
		$resultats->execute($params);

		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$resultat = $resultats->fetchAll();
		
		//Récupérer la liste des commande
		$sql =  "SELECT c.id,id_box
				from customer c, commande co, product p, livraison l 
				where c.id=co.customer_id and p.id=co.product_id and  l.commande_id=co.id and  co.deleted=0 ";
		$commandes = $connexion->prepare($sql);

		$commandes->execute();

		$commandes->setFetchMode(PDO::FETCH_OBJ);
		$commandes = $commandes->fetchAll();
	
		$array['commandes'] = $commandes;
		
		$array['result'] = $resultat;

	} catch (Exception $e) {
		$array['result'] = 0;
		$array['commandes'] = 0;
	}
	
	$connexion = null;
	return json_encode($array);	
}





function slug($text){ 
	// replace non letter or digits by -
	$text = preg_replace('~[^\\pL\d]+~u', '-', $text);

	// trim
	$text = trim($text, '-');

	// transliterate
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	// lowercase
	$text = strtolower($text);

	// remove unwanted characters
	$text = preg_replace('~[^-\w]+~', '', $text);

	if (empty($text))
	{
		return 'n-a';
	}

	return $text;
}