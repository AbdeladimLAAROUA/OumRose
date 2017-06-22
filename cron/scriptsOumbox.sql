prqe8Yxhs_t9_Bh
ALTER TABLE customer AUTO_INCREMENT = 1

df5b79


CREATE VIEW oumboxSB 
AS 
SELECT cust.id as 'idMaman', cust.NOM as 'nomMaman', cust.PRENOM, cust.GSM as 'GSM1',l.gsm as 'GSM2', cust.NAISSANCE_BEBE, l.type as 'typeLivraison', r.nom as 'point relais',v.name as'Ville' 
from livraison l, commande co, leads cust, relais r, ville v
where 
l.commande_id=co.id and 
cust.id=co.customer_id and 
l.shop_id=r.id and 
v.id=r.id_ville and
l.type='SB';


CREATE VIEW oumboxLD
AS 
SELECT cust.id as 'idMaman', cust.nom as 'nomMaman', cust.PRENOM, cust.GSM as 'GSM1',l.gsm as 'GSM2', cust.NAISSANCE_BEBE, l.type as 'typeLivraison', l.adresseLivraison, l.quartier 
from livraison l, commande co, leads cust
where 
l.commande_id=co.id and 
cust.id=co.customer_id and 
l.type='LD';

CREATE VIEW leadsV1
AS 
SELECT c.id,c.nom,c.prenom,c.email,c.password,c.gsm,id_box,c.naissance,c.adresse,c.CP,c.type,c.ville,b.naissance 'naissance_bebe',b.prenom 'prenom_bebe',b.sexe,b.MATERNITE,b.GYNECO,b.naissance_enfant,b.prenom_enfant,b.sexe_enfant,c.id_leads
FROM customer c, baby b, commande co, product p
where 
c.id=b.customer_id and
b.customer_id=c.id and
c.id=co.customer_id and 
p.id=co.product_id or c.id not in (
	select customer_id
	from product
)
order by c.id ASC;


CREATE VIEW leadsV1
AS 
SELECT c.id,c.nom,c.prenom,c.email,c.password,c.gsm,id_box,c.naissance,c.adresse,c.CP,c.type,c.ville,b.naissance 'naissance_bebe',b.prenom 'prenom_bebe',b.sexe,b.MATERNITE,b.GYNECO,b.naissance_enfant,b.prenom_enfant,b.sexe_enfant,c.id_leads
FROM customer c, baby b, commande co, product p
where 
c.id=b.customer_id and
b.customer_id=c.id and
c.id=co.customer_id and 
p.id=co.product_id 
order by c.id ASC;



SELECT c.id,c.nom,c.id as 'idCommande',p.id_box 'box1',p1.id_box 'box2' 
FROM customer c, commande co, product p, product p1
WHERE c.id=co.customer_id and p.id=co.product_id and p1.id=p.id
group by (c.id)
order by c.id ASC, box2 DESC



DELETE FROM baby where 1;
DELETE FROM `customer` WHERE 1;
ALTER TABLE baby AUTO_INCREMENT = 1;
ALTER TABLE customer AUTO_INCREMENT = 1;

INSERT INTO customer(nom,prenom,email,gsm,naissance,adresse,CP,type,ville,id_leads)
SELECT nom,prenom,email,gsm,date_naissance,adresse,CP,type,ville,id
FROM   leads;

INSERT INTO baby(customer_id,naissance,prenom,sexe,MATERNITE,GYNECO,naissance_enfant,prenom_enfant,SEXE_ENFANT)
SELECT c.id,NAISSANCE_BEBE,PRENOM_BEBE,SEXE_BEBE,MATERNITE,GYNECO,NAISSANCE_ENFANT,PRENOM_ENFANT,SEXE_ENFANT
FROM   leads l, customer c 
where l.id=c.id_leads;











DELIMITER $$
DROP PROCEDURE updateProducts$$
CREATE PROCEDURE updateProducts()
BEGIN   
	DECLARE countBox1 INT DEFAULT 0;
	DECLARE countBox2 INT DEFAULT 0;
	DECLARE countBox3 INT DEFAULT 0;
    DECLARE i INT DEFAULT 0;
	
	select count(*) into countBox1  from leads where REF_BOX1!='';
	select count(*) into countBox2  from leads where REF_BOX2!='';
	select count(*) into countBox3  from leads where REF_BOX3!='';
    delete from product where 1;
    delete from commande where 1;
    delete from livraison where 1;
    ALTER TABLE product AUTO_INCREMENT = 1;
    WHILE i < countBox1 DO  
    	INSERT INTO product (id_box) VALUES (1);
        SET i = i + 1;
    END WHILE;
    SET i = 0; 
    
    WHILE i < countBox2 DO  
    	INSERT INTO product (id_box) VALUES (2);
        SET i = i + 1;
    END WHILE;
    SET i = 0; 

    WHILE i < countBox3 DO 
    	INSERT INTO product (id_box) VALUES (3); 
        SET i = i + 1;
    END WHILE;
    SET i = 0;
END $$
DELIMITER ;
call updateProducts();






SELECT * FROM `product` WHERE `id_box`=1 ORDER BY `id`
select count(*) from leads where REF_BOX1!='';




