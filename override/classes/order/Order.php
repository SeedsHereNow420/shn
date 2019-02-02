<?php
class Order extends OrderCore
{
    /*
    * module: customnumber
    * date: 2017-12-19 10:31:40
    * version: 1.8.6
    */
    public static function setLastInvoiceNumber($order_invoice_id, $id_shop)
    {
        if (!$order_invoice_id) {
            return false;
        }
        require_once _PS_MODULE_DIR_ . 'customnumber/helpers/CustomNumberHelper.php';
        
        $object = new OrderInvoice($order_invoice_id);
        if (CustomNumberHelper::setNumber(CustomNumberHelper::INVOICE, $order_invoice_id, $object)) {
            return true;
        } else {
            return parent::setLastInvoiceNumber($order_invoice_id, $id_shop);
        }
    }
    /*
    * module: customnumber
    * date: 2017-12-19 10:31:40
    * version: 1.8.6
    */
    public function setDeliveryNumber($order_invoice_id, $id_shop)
    {
        if (!$order_invoice_id) {
            return false;
        }
        require_once _PS_MODULE_DIR_ . 'customnumber/helpers/CustomNumberHelper.php';
        
        $object = new OrderInvoice($order_invoice_id);
        if (CustomNumberHelper::setNumber(CustomNumberHelper::DELIVERY, $order_invoice_id, $object)) {
            return true;
        } else {
            return parent::setDeliveryNumber($order_invoice_id, $id_shop);
        }
    }
    /*
    * module: customnumber
    * date: 2017-12-19 10:31:40
    * version: 1.8.6
    */
    public function getInvoiceNumber($order_invoice_id)
    {
        if (!$order_invoice_id) {
            return false;
        }
        return Db::getInstance()->getValue(
            'SELECT `id_order_invoice`
			FROM `' . _DB_PREFIX_ . 'order_invoice`
			WHERE `id_order_invoice` = ' . (int) $order_invoice_id
        );
    }
}
