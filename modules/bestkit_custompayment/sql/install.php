<?php

$sql = array();

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'bestkit_custompayment` (
          `id_bestkit_custompayment` int(10) unsigned NOT NULL AUTO_INCREMENT,
          `ext` varchar(32) NULL,
          `id_order_state` int(11) NOT NULL,
		  `max_commision_amount` decimal(20,6) NOT NULL DEFAULT \'0.000000\',
		  `commision_percent` decimal(20,6) NOT NULL DEFAULT \'0.000000\',
		  `commision_amount` decimal(20,6) NOT NULL DEFAULT \'0.000000\',
		  `commision_currency` int(11) NOT NULL,
          PRIMARY KEY (`id_bestkit_custompayment`)
        ) ENGINE=' . _MYSQL_ENGINE_ . '  DEFAULT CHARSET=utf8';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'bestkit_custompayment_lang` (
          `id_bestkit_custompayment` int(10) unsigned NOT NULL AUTO_INCREMENT,
          `id_lang` INT(11) NOT NULL,
          `name` varchar(255) NULL,
          `description` TEXT NOT NULL,
          `description_short` TEXT NOT NULL,
          `confirmation_text` TEXT NOT NULL,
          PRIMARY KEY (`id_bestkit_custompayment`,`id_lang`)
        ) ENGINE=' . _MYSQL_ENGINE_ . '  DEFAULT CHARSET=utf8';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'bestkit_custompayment_order` (
          `id_bestkit_custompayment_order` int(10) unsigned NOT NULL AUTO_INCREMENT,
          `id_bestkit_custompayment` int(10) unsigned NOT NULL,
          `id_cart` int(11) NOT NULL,
		  `total` decimal(20,6) NOT NULL DEFAULT \'0.000000\',
		  `fee` decimal(20,6) NOT NULL DEFAULT \'0.000000\',
          PRIMARY KEY (`id_bestkit_custompayment_order`)
        ) ENGINE=' . _MYSQL_ENGINE_ . '  DEFAULT CHARSET=utf8';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'bestkit_custompayment_carrier` (
		  `id_bestkit_custompayment_carrier` int(10) unsigned NOT NULL AUTO_INCREMENT,
		  `id_bestkit_custompayment` int(10) unsigned NOT NULL,
		  `id_reference` VARCHAR( 255 ) DEFAULT NULL,
		  PRIMARY KEY (`id_bestkit_custompayment_carrier`)
		) ENGINE=' . _MYSQL_ENGINE_ . '  DEFAULT CHARSET=utf8';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'bestkit_custompayment_group` (
		  `id_bestkit_custompayment_group` int(10) unsigned NOT NULL AUTO_INCREMENT,
		  `id_bestkit_custompayment` int(10) unsigned NOT NULL,
		  `id_group` int(10) unsigned NOT NULL,
		  PRIMARY KEY (`id_bestkit_custompayment_group`)
		) ENGINE=' . _MYSQL_ENGINE_ . '  DEFAULT CHARSET=utf8';