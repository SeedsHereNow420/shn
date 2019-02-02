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
        "DELETE FROM %sopp_category_filter WHERE id_shop = %s AND id_employee = %s",
        _DB_PREFIX_,
        (int)$id_shop,
        (int)$id_employee
    )
)) {
    exit(Tools::jsonEncode(array('status' => 'error', 'msg' => Db::getInstance()->getMsgError())));
}

if (!Tools::getIsset('categories')) {
    exit(Tools::jsonEncode(array('status' => 'success', 'msg' => 'Ok')));
}

foreach (Tools::getValue('categories') as $category_id) {
    if (is_numeric($category_id) && (int)$category_id > 0) {
        if (!Db::getInstance()->execute(
            sprintf(
                "INSERT INTO %sopp_category_filter (id_category, id_shop, id_employee) VALUES (%s, %s, %s)",
                _DB_PREFIX_,
                (int)$category_id,
                (int)$id_shop,
                (int)$id_employee
            )
        )) {
            exit(Tools::jsonEncode(array('status' => 'error', 'msg' => Db::getInstance()->getMsgError())));
        }
    }
}

if (Tools::getIsset('exclude_unchecked')) {
    if (!Db::getInstance()->execute(
        sprintf(
            'INSERT INTO %sopp_exclude_categories (exclude, id_shop, id_employee)
            VALUES (%s, %s, %s)
            ON DUPLICATE KEY UPDATE exclude = %2$s',
            _DB_PREFIX_,
            (int)Tools::getValue('exclude_unchecked'),
            (int)$id_shop,
            (int)$id_employee
        )
    )) {
        exit(Tools::jsonEncode(array('status' => 'error', 'msg' => Db::getInstance()->getMsgError())));
    }
}

exit(Tools::jsonEncode(array('status' => 'success', 'redirect' => strtok(Tools::getValue('redirect'), '#'))));
