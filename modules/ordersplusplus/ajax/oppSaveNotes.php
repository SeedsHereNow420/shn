<?php
/**
*  Copyright (C) Prestalia - All Rights Reserved
*
*  Unauthorized copying of this file, via any medium is strictly prohibited
*  Proprietary and confidential
*
*  @author    Prestalia <prestalia.it>
*  @copyright 2015-2016 Prestalia
*  @license   Closed source, proprietary software
*/

require_once('../../../config/config.inc.php');

header('Content-Type: application/json');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

if (!Tools::getIsset('id_order')) {
    exit(Tools::jsonEncode(array('status' => 'error', 'msg' => 'Invalid order id')));
}

$id_order = Tools::getValue('id_order');

if (!is_numeric($id_order) || (int)$id_order < 1) {
    exit(Tools::jsonEncode(array('status' => 'error', 'msg' => 'Invalid order id')));
}

if (!Tools::getIsset('notes')) {
    exit(Tools::jsonEncode(array('status' => 'error', 'msg' => 'Invalid notes')));
}

$notes = Tools::purifyHTML(Tools::getValue('notes'));

if ($notes == '') {
    $query = 'INSERT INTO `'._DB_PREFIX_.'opp_bookmarks` (`id_order`, `notes`) VALUES ('.
    (int)$id_order.', null)'."\n".
    'ON DUPLICATE KEY UPDATE `notes` = null';
} else {
    $query = 'INSERT INTO `'._DB_PREFIX_.'opp_bookmarks` (`id_order`, `notes`) VALUES ('.
    (int)$id_order.', \''.pSQL($notes).'\')'."\n".
    'ON DUPLICATE KEY UPDATE `notes` = \''.pSQL($notes).'\'';
}

if (Db::getInstance()->execute($query)) {
    exit(Tools::jsonEncode(array('status' => 'success', 'msg' => 'Ok')));
} else {
    exit(Tools::jsonEncode(array('status' => 'error', 'msg' => Db::getInstance()->getMsgError())));
}
