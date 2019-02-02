<?php

/*
* File: /upgrade/Upgrade-1.6.2.php
*/
function upgrade_module_1_6_2() {
	return Db::getInstance()->execute('
		CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'bestkit_custompayment_carrier` (
		  `id_bestkit_custompayment_carrier` int(10) unsigned NOT NULL AUTO_INCREMENT,
		  `id_bestkit_custompayment` int(10) unsigned NOT NULL,
		  `id_reference` VARCHAR( 255 ) DEFAULT NULL,
		  PRIMARY KEY (`id_bestkit_custompayment_carrier`)
		) ENGINE=' . _MYSQL_ENGINE_ . '  DEFAULT CHARSET=utf8
    ');
}