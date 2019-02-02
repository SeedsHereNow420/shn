<?php
/**
* 2013 - 2017 HiPresta
*
* MODULE Out Of Stock Notification
*
* @version   1.2.2
* @author    HiPresta <suren.mikaelyan@gmail.com>
* @link      http://www.hipresta.com
* @copyright HiPresta 2015
* @license   Addons PrestaShop license limitation
*
* NOTICE OF LICENSE
*
* Don't use this module on several shops. The license provided by PrestaShop Addons 
* for all its modules is valid only once for a single shop.
*/

class HIoutofstocknotificationOosnStatsModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        $product = new Product(Tools::getValue('id_product'));
        if (Validate::isLoadedObject($product)) {
            if ((bool)Configuration::get('HI_OOSN_STATISTIC_ON')) {
                if (Tools::getIsset('oosn') && Tools::getValue('oosn') == 1 && Tools::getValue('id_product')) {
                    if (Tools::getValue('action') == 'buy_now' &&
                        Tools::getValue('email') &&
                        Tools::getValue('id') &&
                        Tools::getValue('id_product')) {
                        // Add cart if no cart found
                        if (!$this->context->cart->id) {
                            if (Context::getContext()->cookie->id_guest) {
                                $guest = new Guest(Context::getContext()->cookie->id_guest);
                                $this->context->cart->mobile_theme = $guest->mobile_theme;
                            }
                            $this->context->cart->add();
                            if ($this->context->cart->id) {
                                $this->context->cookie->id_cart = (int)$this->context->cart->id;
                            }
                        }
                        $this->context->cart->updateQty(
                            1,
                            Tools::getValue('id_product'),
                            Tools::getValue('id_product_attribute')
                        );
                        Db::getInstance()->Execute('
                            UPDATE '._DB_PREFIX_.'hioutofstockemailstatistic 
                            SET buy_now=1, opened=1
                            WHERE email= \''.pSQL(Tools::getValue('email')).'\'
                            AND id='.(int)Tools::getValue('id'));
                        Tools::redirect($this->context->link->getPageLink('order'));
                    }
                    if (Tools::getValue('action') == 'view'
                        && Tools::getIsset('attr_url_name')
                        && Tools::getValue('id_product') && Tools::getValue('id')) {
                        Db::getInstance()->Execute('
                            UPDATE '._DB_PREFIX_.'hioutofstockemailstatistic 
                            SET view=1, opened=1
                            WHERE email= \''.pSQL(Tools::getValue('email')).'\'
                            AND id='.(int)Tools::getValue('id'));
                        Tools::redirect(
                            $this->context->link->getProductLink(
                                Tools::getValue('id_product'),
                                null,
                                null,
                                null,
                                Configuration::get('PS_LANG_DEFAULT'),
                                null,
                                Tools::getValue('id_product_attribute')
                            )
                            .'#'.Tools::getValue('attr_url_name')
                        );
                    }
                }
                if (Tools::getIsset('oosn')
                    && Tools::getValue('oosn') == 1
                    && Tools::getIsset('action')
                    && Tools::getValue('action') == 'opened') {
                    Db::getInstance()->Execute('
                        UPDATE '._DB_PREFIX_.'hioutofstockemailstatistic
                        SET opened=1
                        WHERE email= \''.pSQL(Tools::getValue('email')).'\'
                        AND id='.(int)Tools::getValue('id'));
                }
            } else {
                 Tools::redirect($this->context->link->getPageLink('index'));
            }
            
        } else {
            Tools::redirect($this->context->link->getPageLink('index'));
        }
        
    }
}
