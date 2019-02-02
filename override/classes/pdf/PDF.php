<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 */
class PDF extends PDFCore
{
    /*
    * module: customnumber
    * date: 2017-12-19 10:31:41
    * version: 1.8.6
    */
    public function getTemplateObject($object)
    {
        $tmpl = parent::getTemplateObject($object);
        if ($tmpl) {
            $tmpl_name = Tools::strtolower($this->template);
            $templates = array('invoice' => 'INVOICE', 'deliveryslip' => 'DELIVERY', 'orderslip' => 'CREDIT_SLIP');
            if (array_key_exists($tmpl_name, $templates)) {
                require_once _PS_MODULE_DIR_ . 'customnumber/helpers/CustomNumberHelper.php';
                $translations = array('invoice' => 'Invoice ', 'deliveryslip' => 'Delivery', 'orderslip' => 'Slip #');
                $obj = $tmpl_name == 'orderslip' ? $tmpl->order_slip : $tmpl->order_invoice;
                $result = CustomNumberHelper::format(
                    $templates[$tmpl_name],
                    Context::getContext()->language->id,
                    $tmpl->order->id_shop,
                    $obj
                );
                if (version_compare(_PS_VERSION_, '1.6.0.11') >= 0) {
                    if (version_compare(_PS_VERSION_, '1.6.0.14') <= 0) {
                        $tmpl->title = Translate::getAdminTranslation('Invoice', 'AdminOrders') . ' ' . $result;
                    } else {
                        $tmpl->title = $result;
                    }
                } else {
                    $tmpl->title = Translate::getPdfTranslation($translations[$tmpl_name]) . ' ' . $result;
                }
                $this->filename = preg_replace('([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})', '', $result) . '.pdf';
            }
        }
        return $tmpl;
    }
}
