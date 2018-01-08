<?php
function db_connect()
{
    $params = getConnexionParams();

    $hote = $params['hote'];
    $passDb = $params['passDb'];
    $bd = $params['bd'];
    $user = $params['user'];

    $connexion = new PDO('mysql:host=' . $hote . ';dbname=' . $bd . ';charset=utf8', $user, $passDb);

    return $connexion;
}

function getConnexionParams()
{
    $array = array();

    $array['hote'] = 'bdd.k4mshost.odns.fr';
    $array['passDb'] = '!!oumb0x';
    $array['bd'] = 'k4mshost_oumbeta';
    $array['user'] = 'k4mshost_oumdev';

    return $array;
}
function updateEligibilite()
{
    $array = array();
    try {
        $connexion = db_connect();
        $resultats = $connexion->prepare('UPDATE customer set eligible="" where 1;');
        $resultats->execute();
        $resultats = $connexion->prepare('UPDATE customer c1 LEFT JOIN baby b1 ON b1.customer_id=c1.id set c1.eligible=\'BOX3_BEBE1\' where  b1.ordre=1 and b1.naissance BETWEEN CURDATE() - INTERVAL 305 DAY AND CURDATE()-INTERVAL 183 DAY and c1.id  not in (
			SELECT  c.id
			FROM    (select * from customer) as c
			LEFT JOIN
			        commande co
			ON      co.customer_id = c.id
			LEFT JOIN
			        product p
			ON      p.id = co.product_id
			LEFT JOIN
			        baby b
			ON b.customer_id=c.id
			where co.id is not NULL and co.baby_id=b1.id and p.id_box=3
			);');
        $resultats->execute();
        $resultats = $connexion->prepare('UPDATE customer c1 LEFT JOIN baby b1 ON b1.customer_id=c1.id set c1.eligible=\'BOX2_BEBE1\' where  b1.ordre=1 and b1.naissance BETWEEN CURDATE() - INTERVAL 122 DAY AND CURDATE()-INTERVAL 7 DAY and c1.id  not in (
		SELECT  c.id
		FROM    (select * from customer) as c
		LEFT JOIN
		        commande co
		ON      co.customer_id = c.id
		LEFT JOIN
		        product p
		ON      p.id = co.product_id
		LEFT JOIN
		        baby b
		ON b.customer_id=c.id
		where co.id is not NULL and co.baby_id=b1.id and p.id_box=2

		);');
        $resultats->execute();
        $resultats = $connexion->prepare('UPDATE customer c1 LEFT JOIN baby b1 ON b1.customer_id=c1.id set c1.eligible=\'BOX1_BEBE1\' where  b1.ordre=1 and b1.naissance BETWEEN CURDATE()+ INTERVAL 7 DAY AND CURDATE() + INTERVAL 146 DAY  and c1.id  not in (
			SELECT  c.id
			FROM    (select * from customer) as c
			LEFT JOIN
			        commande co
			ON      co.customer_id = c.id
			LEFT JOIN
			        product p
			ON      p.id = co.product_id
			LEFT JOIN
			        baby b
			ON b.customer_id=c.id
			where co.id is not NULL and co.baby_id=b1.id and p.id_box=1
			);');
        $resultats->execute();

        $resultats = $connexion->prepare('UPDATE customer c1 LEFT JOIN baby b1 ON b1.customer_id=c1.id set c1.eligible=\'BOX3_BEBE2\' where  b1.ordre=2 and b1.naissance BETWEEN CURDATE() - INTERVAL 305 DAY AND CURDATE()-INTERVAL 183 DAY and c1.id  not in (
		SELECT  c.id
		FROM    (select * from customer) as c
		LEFT JOIN
		        commande co
		ON      co.customer_id = c.id
		LEFT JOIN
		        product p
		ON      p.id = co.product_id
		LEFT JOIN
		        baby b
		ON b.customer_id=c.id
		where co.id is not NULL and p.id_box=3 and b.ordre=2 and c.eligible!=\'BOX3_BEBE1\'
		);');
        $resultats->execute();
        $resultats = $connexion->prepare('UPDATE customer c1 LEFT JOIN baby b1 ON b1.customer_id=c1.id set c1.eligible=\'BOX2_BEBE2\' where  b1.ordre=2 and b1.naissance BETWEEN CURDATE() - INTERVAL 122 DAY AND CURDATE()-INTERVAL 7 DAY  and c1.id  not in (
		SELECT  c.id
		FROM    (select * from customer) as c
		LEFT JOIN
		        commande co
		ON      co.customer_id = c.id
		LEFT JOIN
		        product p
		ON      p.id = co.product_id
		LEFT JOIN
		        baby b
		ON b.customer_id=c.id
		where co.id is not NULL and co.baby_id=b1.id and p.id_box=2 and b.ordre=2 and c.eligible!=\'BOX2_BEBE1\'
		);');
        $resultats->execute();
        $resultats = $connexion->prepare('UPDATE customer c1 LEFT JOIN baby b1 ON b1.customer_id=c1.id set c1.eligible=\'BOX1_BEBE2\' where  b1.ordre=2 and b1.naissance BETWEEN CURDATE()+ INTERVAL 7 DAY AND CURDATE() + INTERVAL 146 DAY  and c1.id  not in (
		SELECT  c.id
		FROM    (select * from customer) as c
		LEFT JOIN
		        commande co
		ON      co.customer_id = c.id
		LEFT JOIN
		        product p
		ON      p.id = co.product_id
		LEFT JOIN
		        baby b
		ON b.customer_id=c.id
		where co.id is not NULL and co.baby_id=b1.id and p.id_box=1 and b.ordre=2 and c.eligible!=\'BOX1_BEBE1\'
		);');
        $resultats->execute();

        $resultats = $connexion->prepare('UPDATE customer c1 LEFT JOIN baby b1 ON b1.customer_id=c1.id set c1.eligible=\'BOX3_BEBE3\' where  b1.ordre=3 and b1.ordre=3 and b1.naissance BETWEEN CURDATE() - INTERVAL 305 DAY AND CURDATE()-INTERVAL 183 DAY and c1.id  not in (
		SELECT  c.id
		FROM    (select * from customer) as c
		LEFT JOIN
		        commande co
		ON      co.customer_id = c.id
		LEFT JOIN
		        product p
		ON      p.id = co.product_id
		LEFT JOIN
		        baby b
		ON b.customer_id=c.id
		where co.id is not NULL and co.baby_id=b1.id and p.id_box=3 and b.ordre=2 and c.eligible!=\'BOX3_BEBE2\'
		);');
        $resultats->execute();
        $resultats = $connexion->prepare('UPDATE customer c1 LEFT JOIN baby b1 ON b1.customer_id=c1.id set c1.eligible=\'BOX2_BEBE3\' where  b1.ordre=3 and b1.naissance BETWEEN CURDATE() - INTERVAL 122 DAY AND CURDATE()-INTERVAL 7 DAY  and c1.id  not in (
		SELECT  c.id
		FROM    (select * from customer) as c
		LEFT JOIN
		        commande co
		ON      co.customer_id = c.id
		LEFT JOIN
		        product p
		ON      p.id = co.product_id
		LEFT JOIN
		        baby b
		ON b.customer_id=c.id
		where co.id is not NULL and co.baby_id=b1.id and p.id_box=2 and b.ordre=3 and c.eligible!=\'BOX2_BEBE2\'
		);');
        $resultats->execute();
        $resultats = $connexion->prepare('UPDATE customer c1 LEFT JOIN baby b1 ON b1.customer_id=c1.id set c1.eligible=\'BOX1_BEBE3\' where  b1.ordre=3 and b1.naissance BETWEEN CURDATE()+ INTERVAL 7 DAY AND CURDATE() + INTERVAL 146 DAY  and c1.id  not in (
		SELECT  c.id
		FROM    (select * from customer) as c
		LEFT JOIN
		        commande co
		ON      co.customer_id = c.id
		LEFT JOIN
		        product p
		ON      p.id = co.product_id
		LEFT JOIN
		        baby b
		ON b.customer_id=c.id
		where co.id is not NULL and co.baby_id=b1.id and p.id_box=1 and b.ordre=3 and c.eligible!=\'BOX1_BEBE2\'
		);');
        $resultats->execute();

        require_once('../log/Logging.php');
        new Logging("eligibitlite cron update ok");
    } catch (Exception $e) {
        echo "error";
        new Logging("eligibitlite cron update error: ". $e->getMessage());
    }

    $connexion = null;
}

updateEligibilite();
?>

