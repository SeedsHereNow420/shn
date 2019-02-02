<?php
/**
 * 2007-2017 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
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
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

class Cppcg extends Module
{
    protected $config_form = false;
    
    public function __construct()
    {
        $this->name          = 'cppcg';
        $this->tab           = 'pricing_promotion';
        $this->version       = '2.1.10';
        $this->author        = 'IT PREMIUM OÜ';
        $this->need_instance = 0;
        $this->module_key    = '225682ee961ca5ccda9d2c047422d9b2';
        $this->bootstrap     = true;
        
        parent::__construct();
        
        $this->displayName = $this->l('Customer group prices');
        $this->description = $this->l('This module allows you to set custom product price for specific customer group');
        
        $this->ps_versions_compliancy = array(
            'min' => '1.7',
            'max' => _PS_VERSION_
        );
    }
    
    public function install()
    {
        include(dirname(__FILE__) . '/sql/install.php');
        return parent::install() && $this->registerHook('actionProductUpdate') && $this->registerHook('actionProductDelete') && $this->registerHook('displayAdminProductsExtra');
    }
    
    public function uninstall()
    {
        include(dirname(__FILE__) . '/sql/uninstall.php');
        return parent::uninstall();
    }
    
    
    public function hookDisplayAdminProductsExtra($params)
    {
        $id_product = (int)$params['id_product'];
        $product    = new Product($id_product);
        $id_shop    = (int)Context::getContext()->shop->id;
        $currency   = $this->context->currency;
        
        if (Validate::isLoadedObject($product)) {
            $groups = $this->getProductGroupPrices($id_product, $id_shop);
            $this->context->smarty->assign(array(
                'groups' => $groups,
                'currency' => $currency
            ));
            
            return $this->display(__FILE__, '/views/templates/admin/product_tab.tpl');
        } else {
            return $this->displayWarning($this->l('You must save this product before adding groups pricing'));
        }
    }
    
    public function hookActionProductUpdate($params)
    {
        $id_product = (int)$params['id_product'];
        $id_shop    = (int) Context::getContext()->shop->id;
        $prices = Tools::getValue('price_tax_exluded');
        
        Db::getInstance()->delete('product_group_prices', 'id_product = ' . (int) $id_product . ' AND id_shop = ' . (int) $id_shop . '');
        
        foreach ($prices as $group => $price) {
            if ($price != 0) {
                $this->saveProductGroupPricing($id_product, $id_shop, $group, $price);
            }
        }
        return true;
    }

    public function hookActionProductDelete($params)
    {
        $id_product = (int)$params['id_product'];
        return Db::getInstance()->delete('product_group_prices', 'id_product = ' . (int) $id_product . '');
    }
    
    public function getProductGroupPrices($id_product, $id_shop)
    {
        $groups = Group::getGroups($this->context->language->id);
        
        foreach ($groups as $key => $value) {
            $query                 = 'SELECT * FROM `' . _DB_PREFIX_ . 'product_group_prices` WHERE id_product = ' . (int) $id_product . ' AND id_shop = ' . (int) $id_shop . ' AND id_group = ' . (int) $value['id_group'] . ';';
            $row                   = Db::getInstance()->getRow($query);
            $groups[$key]['price'] = $row['price'];
        }
        
        return $groups;
    }
    
    public function saveProductGroupPricing($id_product, $id_shop, $id_group, $price)
    {
        $query = 'INSERT INTO `' . _DB_PREFIX_ . 'product_group_prices` (`id_product`, `id_shop`, `id_group`, `price`) 
		VALUES (' . (int) $id_product . ',' . (int) $id_shop . ',' . (int) $id_group . ',' . $price . ');';
        
        return DB::getInstance()->execute($query);
    }
}
