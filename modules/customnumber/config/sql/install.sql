# Table : orders								
ALTER TABLE `_DB_PREFIX_orders` MODIFY `reference` VARCHAR(32);

# Table : order_payment								
ALTER TABLE `_DB_PREFIX_order_payment` MODIFY `order_reference` VARCHAR(32);

# Table : order_slip
SELECT count(*)
INTO @exist
FROM information_schema.columns 
WHERE table_schema = '_DB_NAME_'
and COLUMN_NAME = 'number'
AND table_name = '_DB_PREFIX_order_slip';

SET @query = IF(@exist <= 0, 'ALTER TABLE `_DB_PREFIX_order_slip` ADD COLUMN `number` INT(11) NOT NULL', 
'select \'Column Exists\' status');

PREPARE stmt FROM @query;

EXECUTE stmt;

# Table : customnumber_document
CREATE TABLE IF NOT EXISTS `_DB_PREFIX_customnumber_document` (
    `id_document` INT(10) UNSIGNED NOT NULL,
    `type` VARCHAR(16) NOT NULL,
    `number` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`id_document`)
) ENGINE=_MYSQL_ENGINE_ DEFAULT CHARSET=UTF8;
