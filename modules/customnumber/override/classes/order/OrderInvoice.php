<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 */

class OrderInvoice extends OrderInvoiceCore
{

    public function getInvoiceNumberFormatted($id_lang, $id_shop = null, $type = 'INVOICE')
    {
        require_once _PS_MODULE_DIR_ . 'customnumber/helpers/CustomNumberHelper.php';

        return CustomNumberHelper::format($type, $id_lang, $id_shop, $this);
    }
}
