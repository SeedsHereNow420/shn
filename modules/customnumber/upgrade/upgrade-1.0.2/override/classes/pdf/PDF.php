<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 *  @version   1.0.3
 */

class PDF extends PDFCore
{

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

                // Template title
                $tmpl->title = Translate::getPdfTranslation($translations[$tmpl_name]) . ' ' . $result;

                // PDF filename
                $this->filename = preg_replace('([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})', '', $result) . '.pdf';
            }
        }

        return $tmpl;
    }
}
