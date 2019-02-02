# Table : customnumber_document
CREATE TABLE IF NOT EXISTS `_DB_PREFIX_customnumber_document` (
    `id_document` INT(10) UNSIGNED NOT NULL,
    `type` VARCHAR(16) NOT NULL,
    `number` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`id_document`)
) ENGINE=_MYSQL_ENGINE_ DEFAULT CHARSET=UTF8;