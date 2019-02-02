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

if (!Tools::getIsset('new_state')) {
    exit(Tools::jsonEncode(array('status' => 'error', 'msg' => 'Invalid order state')));
}
$idOrderState = Tools::getValue('new_state');
if (!is_numeric($idOrderState) || (int)$idOrderState < 0) {
    exit(Tools::jsonEncode(array('status' => 'error', 'msg' => 'Invalid order state')));
}

if (!Tools::getIsset('orders')) {
    exit(Tools::jsonEncode(array('status' => 'error', 'msg' => 'No order selected')));
}
$orders = explode("|", trim(Tools::getValue('orders'), "|"));
if (count($orders) < 1) {
    exit(Tools::jsonEncode(array('status' => 'error', 'msg' => 'No order selected')));
}

$context = Context::getContext();
$context->cart = null;
$context->customer = null;
$context->shop = new Shop($id_shop, null, $id_shop);
$context->employee = new Employee($id_employee, null, $id_shop);

$order_state = new OrderState((int)$idOrderState);

foreach ($orders as $id_order) {
    $order = new Order((int)$id_order);

    if (!Validate::isLoadedObject($order)) {
        exit(Tools::jsonEncode(array(
            'status' => 'error',
            'msg'    => sprintf(Tools::displayError('Order #%d cannot be loaded'), $id_order)
        )));
    }

    $current_order_state = $order->getCurrentOrderState();
    if ($current_order_state->id == $order_state->id) {
        continue;
    }

    $history = new OrderHistory();
    $history->id_order = $order->id;
    $history->id_employee = (int)$id_employee;
    $use_existings_payment = !$order->hasInvoice();
    $history->changeIdOrderState((int)$order_state->id, $order, $use_existings_payment);
    $history->add();
}

exit(Tools::jsonEncode(array(
    'status' => 'success',
    'redirect' => strtok(Tools::getValue('redirect'), '#')
)));
