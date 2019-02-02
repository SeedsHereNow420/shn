<?php

class OrderInvoice extends OrderInvoiceCore
{
    /*
    * module: customnumber
    * date: 2017-12-19 10:31:40
    * version: 1.8.6
    */
    public function getInvoiceNumberFormatted($id_lang, $id_shop = null, $type = 'INVOICE')
    {
        require_once _PS_MODULE_DIR_ . 'customnumber/helpers/CustomNumberHelper.php';
        return CustomNumberHelper::format($type, $id_lang, $id_shop, $this);
    }
}
