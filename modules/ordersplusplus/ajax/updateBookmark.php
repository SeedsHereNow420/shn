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

if (!Tools::getIsset('bookmark')) {
    exit(Tools::jsonEncode(array('status' => 'error', 'msg' => 'Bookmark not set')));
}

$bookmark = Tools::getValue('bookmark');

if ($bookmark !== 'a' && $bookmark !== 'b') {
    exit(Tools::jsonEncode(array('status' => 'error', 'msg' => 'Invalid bookmark')));
}

if (Db::getInstance()->execute(
    'INSERT INTO `'._DB_PREFIX_.'opp_bookmarks` (`id_order`, `bookmark_'.pSQL($bookmark).'`) VALUES ('.
    (int)$id_order.', 1)'."\n".
    'ON DUPLICATE KEY UPDATE `bookmark_'.pSQL($bookmark).'` = IF(bookmark_'.pSQL($bookmark).'=1, 0, 1)'
)) {
    exit(Tools::jsonEncode(array('status' => 'success', 'msg' => 'Ok')));
} else {
    exit(Tools::jsonEncode(array('status' => 'error', 'msg' => Db::getInstance()->getMsgError())));
}
