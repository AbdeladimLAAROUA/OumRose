update customer c1 set c1.eligible='BOX3' where c1.id in (
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
where b.naissance BETWEEN CURDATE() - INTERVAL 305 DAY AND CURDATE()-INTERVAL 183 DAY

);

update customer c1 set c1.eligible='BOX2' where c1.id in (
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
where b.naissance BETWEEN CURDATE() - INTERVAL 122 DAY AND CURDATE()-INTERVAL 7 DAY

);

update customer c1 set c1.eligible='BOX1' where c1.id in (
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
where b.naissance BETWEEN CURDATE()+ INTERVAL 7 DAY AND CURDATE() + INTERVAL 146 DAY  

);