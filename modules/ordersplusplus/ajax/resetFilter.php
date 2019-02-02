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

if (!Tools::getIsset('filter')) {
    exit(Tools::jsonEncode(array('status' => 'error', 'msg' => 'Invalid filter')));
}

switch (Tools::getValue('filter')) {
    case 'categories':
        Db::getInstance()->execute(
            sprintf(
                "DELETE FROM %sopp_category_filter WHERE id_shop = %s AND id_employee = %s",
                _DB_PREFIX_,
                (int)$id_shop,
                (int)$id_employee
            )
        );
        break;
    case 'customer_group':
        Db::getInstance()->execute(
            sprintf(
                "DELETE FROM %sopp_customer_group_filter WHERE id_shop = %s AND id_employee = %s",
                _DB_PREFIX_,
                (int)$id_shop,
                (int)$id_employee
            )
        );
        break;
    case 'product':
        Db::getInstance()->execute(
            sprintf(
                "DELETE FROM %sopp_product_filter WHERE id_shop = %s AND id_employee = %s",
                _DB_PREFIX_,
                (int)$id_shop,
                (int)$id_employee
            )
        );
        break;
    default:
        exit(Tools::jsonEncode(array('status' => 'error', 'msg' => 'Invalid filter')));
}

exit(Tools::jsonEncode(array('status' => 'success', 'redirect' => strtok(Tools::getValue('redirect'), '#'))));
