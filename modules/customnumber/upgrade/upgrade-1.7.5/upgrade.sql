# Table : order_invoice
ALTER TABLE `_DB_PREFIX_order_invoice` MODIFY `number` INT(11) NOT NULL;
ALTER TABLE `_DB_PREFIX_order_invoice` MODIFY `delivery_number` INT(11) NOT NULL;

# Table : order_slip
ALTER TABLE `_DB_PREFIX_order_slip` MODIFY `number` INT(11) NOT NULL;