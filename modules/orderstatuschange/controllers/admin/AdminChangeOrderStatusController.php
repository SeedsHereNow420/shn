<?php

class AdminChangeOrderStatusController extends ModuleAdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function ajaxProcessChangeOrderStatus()
    {
        $id_order = Tools::getValue('id_order');
        if ($id_order) {
            $order = new Order((int)$id_order);
            $order_state = new OrderState(Tools::getValue('new_status'));
            if (!Validate::isLoadedObject($order_state)) {
                die('2');
            } else {
                $current_order_state = $order->getCurrentOrderState();
                if ($current_order_state->id != $order_state->id) {
                    $history = new OrderHistory();
                    $history->id_order = $order->id;
                    $history->id_employee = (int)$this->context->employee->id;
                    $use_existings_payment = false;
                    if (!$order->hasInvoice()) {
                        $use_existings_payment = true;
                    }
                    $history->changeIdOrderState((int)$order_state->id, $order, $use_existings_payment);
                    $carrier = new Carrier($order->id_carrier, $order->id_lang);
                    $templateVars = array();
                    if ($history->id_order_state == Configuration::get('PS_OS_SHIPPING') && $order->shipping_number) {
                        $templateVars = array('{followup}' => str_replace('@', $order->shipping_number, $carrier->url));
                    }
                    if ($history->addWithemail(true, $templateVars)) {
                        if (Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT')) {
                            foreach ($order->getProducts() as $product) {
                                if (StockAvailable::dependsOnStock($product['product_id'])) {
                                    StockAvailable::synchronize($product['product_id'], (int)$product['id_shop']);
                                }
                            }
                        }
                    }
                    $result = array('msg' => 'ok', 'color' => $order_state->color);
                    $result = Tools::jsonEncode($result);
                    die($result);                    
                } else {
                    die('4');
                }
            }
        }
    }
}
