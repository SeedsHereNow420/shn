=~=~=~=~=~=~=~=~=~=~=~=~=
      Order Fees 
=~=~=~=~=~=~=~=~=~=~=~=~=

Please see module documentation.

For information, question or dev : ecommerce@motionseed.com

Best regards.


(SELECT row_number, new_number 
FROM (SELECT @curRow := @curRow + 1 AS row_number, GREATEST(10 + MOD(@curRow - 1, 9 + 1) * 10, 1) AS new_number 
    FROM ps_order_invoice AS ref 
    INNER JOIN ps_orders o 
        ON o.id_order = ref.id_order AND o.id_shop = 1 
    INNER JOIN (SELECT @curRow := 0) r) AS result 
) 

-- 
Mise à jour en masse du champ number :

UPDATE ps_order_invoice AS t1
INNER JOIN (SELECT id_order_invoice, row_number, new_number 
FROM (SELECT id_order_invoice, @curRow := @curRow + 1 AS row_number, GREATEST(10 + MOD(@curRow - 1, 9 + 1) * 10, 1) AS new_number 
    FROM ps_order_invoice AS ref 
    INNER JOIN ps_orders o 
        ON o.id_order = ref.id_order AND o.id_shop = {ID_SHOP} 
    INNER JOIN (SELECT @curRow := 0) r) AS result 
) AS t2 ON t1.id_order_invoice = t2.id_order_invoice
SET t1.number = t2.new_number


Mise à jour en masse du champ delivery_number :

UPDATE ps_order_invoice AS t1
INNER JOIN (SELECT id_order_invoice, row_number, new_number 
FROM (SELECT id_order_invoice, @curRow := @curRow + 1 AS row_number, GREATEST(10 + MOD(@curRow - 1, 9 + 1) * 10, 1) AS new_number 
    FROM ps_order_invoice AS ref 
    INNER JOIN ps_orders o 
        ON o.id_order = ref.id_order AND o.id_shop = {ID_SHOP} 
    INNER JOIN (SELECT @curRow := 0) r) AS result 
) AS t2 ON t1.id_order_invoice = t2.id_order_invoice
SET t1.delivery_number = t2.new_number