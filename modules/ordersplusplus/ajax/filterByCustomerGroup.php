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

if (!Tools::getIsset('customer_group')) {
    exit(Tools::jsonEncode(array('status' => 'error', 'msg' => 'Invalid customer group')));
}

$customer_group = Tools::getValue('customer_group');

if (!is_numeric($customer_group) || (int)$customer_group < 0) {
    exit(Tools::jsonEncode(array('status' => 'error', 'msg' => 'Invalid customer group')));
}

if ((int)$customer_group == 0) {
    Db::getInstance()->execute(
        sprintf(
            "DELETE FROM %sopp_customer_group_filter WHERE id_shop = %s AND id_employee = %s",
            _DB_PREFIX_,
            (int)$id_shop,
            (int)$id_employee
        )
    );
} else {
    Db::getInstance()->execute(
        sprintf(
            "REPLACE INTO %sopp_customer_group_filter (id_customer_group, id_shop, id_employee) VALUES (%s, %s, %s)",
            _DB_PREFIX_,
            (int)$customer_group,
            (int)$id_shop,
            (int)$id_employee
        )
    );
}

exit(Tools::jsonEncode(array('status' => 'success', 'redirect' => strtok(Tools::getValue('redirect'), '#'))));
