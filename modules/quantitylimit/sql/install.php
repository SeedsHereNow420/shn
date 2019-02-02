<?php
/**
* NOTICE OF LICENSE
*
* This source file is subject to a commercial license from BSofts.
* Use, copy, modification or distribution of this source file without written
* license agreement from the BSofts is strictly forbidden.
*
* @author    BSofts Inc.
* @copyright Copyright 2017 © BSofts Inc.
* @license   Single domain commerical license
* @package   quantitylimit
*/

$sql = array();
$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'quantitylimit` (
    `id_quantitylimit`		int(11) NOT NULL AUTO_INCREMENT,
    `id_product`			int(11) NOT NULL,
    `id_attribute_product`	int(11) NOT NULL DEFAULT 0,
    `status`				tinyint(1) NOT NULL DEFAULT 0,
    `min_qty`				int(11) UNSIGNED DEFAULT NULL,
    `max_qty`				int(11) UNSIGNED DEFAULT NULL,
    `date_to`				varchar(12) DEFAULT \'\',
    `id_group`				int(11) NOT NULL DEFAULT 0,
    `id_shop`				int(11) NOT NULL DEFAULT 0,
    PRIMARY KEY				(`id_quantitylimit`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
