<?php

function upgrade_module_1_6_3() {
	return Db::getInstance()->execute('
		ALTER TABLE `' . _DB_PREFIX_ . 'bestkit_custompayment`
		  ADD COLUMN `max_commision_amount` decimal(20,6) NOT NULL DEFAULT \'0.000000\' AFTER `id_order_state`
    ');
}