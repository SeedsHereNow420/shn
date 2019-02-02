<?php
/**
* 2007-2017 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2017 PrestaShop SA
*  @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
class HTMLTemplateOrderSlip extends HTMLTemplateOrderSlipCore
{
    /*
    * module: ba_prestashop_invoice
    * date: 2017-12-14 14:04:10
    * version: 1.1.23
    */
    public function __construct(OrderSlip $order_slip, $smarty)
    {
        if (Module::isEnabled('ba_prestashop_invoice')==false) {
            return parent::__construct($order_slip, $smarty);
        }
        require_once(_PS_MODULE_DIR_ . "ba_prestashop_invoice/includes/helper.php");
        $helper = new BAInvoiceHelper();
        if ($helper->isEnabledCustomNumber('CREDIT') == false) {
            return parent::__construct($order_slip, $smarty);
        }
        parent::__construct($order_slip, $smarty);
        $number = $this->order_slip->number;
        $date_add = $this->order_slip->date_add;
        $id_lang = $this->order->id_lang;
        $id_shop = $this->order->id_shop;
        $credit_number = $helper->formatCreditbyNumber($number, $date_add, $id_lang, $id_shop);
        $this->title = $credit_number;
    }
    /**
     * Returns the template filename
     * @return string filename
     */
    /*
    * module: ba_prestashop_invoice
    * date: 2017-12-14 14:04:10
    * version: 1.1.23
    */
    public function getFilename()
    {
        require_once(_PS_MODULE_DIR_ . "ba_prestashop_invoice/includes/helper.php");
        $helper = new BAInvoiceHelper();
        if ($helper->isEnabledCustomNumber('CREDIT') == false) {
            return parent::getFilename();
        }
        $number = $this->order_slip->number;
        $date_add = $this->order_slip->date_add;
        $id_lang = $this->order->id_lang;
        $id_shop = $this->order->id_shop;
        $file = $helper->formatCreditbyNumber($number, $date_add, $id_lang, $id_shop);
        return preg_replace("([^\w\s\d\.\-_~,;:\[\]\(\)]|[\.]{2,})", '', $file).'.pdf';
    }
}
