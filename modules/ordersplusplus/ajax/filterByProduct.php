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

if (!Tools::getIsset('id_shop')) {
    exit(Tools::jsonEncode(array('status' => 'error', 'msg' => 'Invalid shop id')));
}

$id_shop = Tools::getValue('id_shop');

if (!is_numeric($id_shop) || (int)$id_shop < 1) {
    exit(Tools::jsonEncode(array('status' => 'error', 'msg' => 'Invalid shop id')));
}

$id_employee = Tools::getValue('id_employee');

if (!is_numeric($id_employee) || (int)$id_employee < 1) {
    exit(Tools::jsonEncode(array('status' => 'error', 'msg' => 'Invalid employee id')));
}

if (!Db::getInstance()->execute(
    sprintf(
        "DELETE FROM %sopp_product_filter WHERE id_shop = %s AND id_employee = %s",
        _DB_PREFIX_,
        (int)$id_shop,
        (int)$id_employee
    )
)) {
    exit(Tools::jsonEncode(array('status' => 'error', 'msg' => Db::getInstance()->getMsgError())));
}

if (!Tools::getIsset('ids')) {
    exit(Tools::jsonEncode(array('status' => 'success', 'msg' => 'Ok')));
}

$ids   = explode('-', Tools::getValue('ids'));
$names = explode('¤', Tools::getValue('names'));

foreach ($ids as $key => $product_id) {
    if (is_numeric($product_id) && (int)$product_id > 0) {
        $name = "";

        if (isset($names[$key])) {
            $name = $names[$key];
        }

        if (!Db::getInstance()->execute(
            sprintf(
                "INSERT INTO %sopp_product_filter (id_product, name, id_shop, id_employee) VALUES (%s, '%s', %s, %s)",
                _DB_PREFIX_,
                (int)$product_id,
                pSQL($name),
                (int)$id_shop,
                (int)$id_employee
            )
        )) {
            exit(Tools::jsonEncode(array('status' => 'error', 'msg' => Db::getInstance()->getMsgError())));
        }
    }
}

exit(Tools::jsonEncode(array('status' => 'success', 'redirect' => strtok(Tools::getValue('redirect'), '#'))));
