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

class AdminOosnController extends ModuleAdminController
{
    public function __construct()
    {
        $this->secure_key = Tools::getValue('secure_key');
        parent::__construct();
    }

    public function init()
    {
        parent::init();
        if ($this->ajax) {
            if ($this->secure_key == $this->module->secure_key) {
                if (Tools::getValue('action') == 'delete_emails') {
                    $id_product = Tools::getValue('id_product');
                    $id_attr = Tools::getValue('id_attr');
                    $delete_emails_row =  Db::getInstance()->ExecuteS('
                        SELECT *
                        FROM '._DB_PREFIX_.'hioutofstock
                        WHERE status = 1
                        AND id_product ='.(int)$id_product
                        .($id_attr != '' ? ' AND id_combination = '.(int)$id_attr : '')
                    );
                    foreach ($delete_emails_row as $id) {
                        Db::getInstance()->Execute('DELETE FROM '._DB_PREFIX_.'hioutofstock WHERE status = 1 AND id = '.(int)$id['id']);
                    }
                } elseif (Tools::getValue('action') == 'delete_pendding') {
                    $id_row = (int)Tools::getValue('id_row');
                    $outofstock = new OutOfStock($id_row);
                    $outofstock->delete();
                } elseif (Tools::getValue('action') == 'delete_delivery') {
                    $id_row = (int)Tools::getValue('id_row');
                    $outofstock = new SentEmail($id_row);
                    $outofstock->delete();
                } elseif (Tools::getValue('action') == 'send_email') {
                    $id_row = Tools::getValue('id_row');
                    $result = Db::getInstance()->ExecuteS('SELECT * FROM '._DB_PREFIX_.'hioutofstock WHERE id = '.(int)$id_row);
                    $this->module->getStockMailContent($result);
                }
            } else {
                die();
            }
        } else {
            Tools::redirectAdmin($this->module->getModuleUrl());
        }
    }
}
