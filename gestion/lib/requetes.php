<?php 

$sql0='UPDATE customer set eligible="" WHERE id=:id';

$sql1="UPDATE customer c1 LEFT JOIN baby b1 ON b1.customer_id=c1.id set c1.eligible='BOX3_BEBE1' where c1.id=:id and b1.ordre=1 and b1.naissance BETWEEN CURDATE() - INTERVAL 305 DAY AND CURDATE()-INTERVAL 183 DAY and c1.id  not in (
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
			);";

$sql2="UPDATE customer c1 LEFT JOIN baby b1 ON b1.customer_id=c1.id set c1.eligible='BOX2_BEBE1' where c1.id=:id and b1.ordre=1 and b1.naissance BETWEEN CURDATE() - INTERVAL 122 DAY AND CURDATE()-INTERVAL 7 DAY and c1.id  not in (
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

		);";


$sql3="UPDATE customer c1 LEFT JOIN baby b1 ON b1.customer_id=c1.id set c1.eligible='BOX1_BEBE1' where c1.id=:id and b1.ordre=1 and b1.naissance BETWEEN CURDATE()+ INTERVAL 7 DAY AND CURDATE() + INTERVAL 146 DAY  and c1.id  not in (
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
			);";

/*BEBE 2*/

$sql4="UPDATE customer c1 LEFT JOIN baby b1 ON b1.customer_id=c1.id set c1.eligible='BOX3_BEBE2' where c1.id=:id and b1.ordre=2 and b1.naissance BETWEEN CURDATE() - INTERVAL 305 DAY AND CURDATE()-INTERVAL 183 DAY and c1.id  not in (
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
		where co.id is not NULL and p.id_box=3 and b.ordre=2 and c.eligible!='BOX3_BEBE1'
		);";


$sql5="UPDATE customer c1 LEFT JOIN baby b1 ON b1.customer_id=c1.id set c1.eligible='BOX2_BEBE2' where c1.id=:id and b1.ordre=2 and b1.naissance BETWEEN CURDATE() - INTERVAL 122 DAY AND CURDATE()-INTERVAL 7 DAY  and c1.id  not in (
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
		where co.id is not NULL and co.baby_id=b1.id and p.id_box=2 and b.ordre=2 and c.eligible!='BOX2_BEBE1'
		);";


$sql6="UPDATE customer c1 LEFT JOIN baby b1 ON b1.customer_id=c1.id set c1.eligible='BOX1_BEBE2' where c1.id=:id and b1.ordre=2 and b1.naissance BETWEEN CURDATE()+ INTERVAL 7 DAY AND CURDATE() + INTERVAL 146 DAY  and c1.id  not in (
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
		where co.id is not NULL and co.baby_id=b1.id and p.id_box=1 and b.ordre=2 and c.eligible!='BOX1_BEBE1'
		);";

/*BEBE 3*/

$sql7="UPDATE customer c1 LEFT JOIN baby b1 ON b1.customer_id=c1.id set c1.eligible='BOX3_BEBE3' where c1.id=:id and b1.ordre=3 and b1.ordre=3 and b1.naissance BETWEEN CURDATE() - INTERVAL 305 DAY AND CURDATE()-INTERVAL 183 DAY and c1.id  not in (
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
		where co.id is not NULL and co.baby_id=b1.id and p.id_box=3 and b.ordre=2 and c.eligible!='BOX3_BEBE2'
		);";


$sql8="UPDATE customer c1 LEFT JOIN baby b1 ON b1.customer_id=c1.id set c1.eligible='BOX2_BEBE3' where c1.id=:id and b1.ordre=3 and b1.naissance BETWEEN CURDATE() - INTERVAL 122 DAY AND CURDATE()-INTERVAL 7 DAY  and c1.id  not in (
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
		where co.id is not NULL and co.baby_id=b1.id and p.id_box=2 and b.ordre=3 and c.eligible!='BOX2_BEBE2'
		);";

$sql9="UPDATE customer c1 LEFT JOIN baby b1 ON b1.customer_id=c1.id set c1.eligible='BOX1_BEBE3' where c1.id=:id and b1.ordre=3 and b1.naissance BETWEEN CURDATE()+ INTERVAL 7 DAY AND CURDATE() + INTERVAL 146 DAY  and c1.id  not in (
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
		where co.id is not NULL and co.baby_id=b1.id and p.id_box=1 and b.ordre=3 and c.eligible!='BOX1_BEBE2'
		);";


$requetes=array($sql0,$sql9,$sql8,$sql7,$sql6,$sql5,$sql4,$sql3,$sql2,$sql1);

?>