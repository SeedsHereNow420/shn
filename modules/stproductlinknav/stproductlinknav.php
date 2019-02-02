<?php
/*
* 2007-2014 PrestaShop
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
	exit;

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;
use PrestaShop\PrestaShop\Core\Product\ProductExtraContent;

class StProductLinkNav extends Module
{
	public function __construct()
	{
		$this->name          = 'stproductlinknav';
		$this->tab           = 'front_office_features';
		$this->version       = '1.0';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
        $this->bootstrap 	 = true;
        $this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);
		
		parent::__construct();
		
		$this->displayName = $this->getTranslator()->trans('Next and previous products', array(), 'Modules.Stproductlinknav.Admin');
		$this->description = $this->getTranslator()->trans('This module adds next and previous links on the product page.', array(), 'Modules.Stproductlinknav.Admin');
	}

	public function install()
	{
		if (!parent::install() 
			|| !$this->registerHook('displayProductExtraContent')
			|| !$this->registerHook('displayFooterProduct')
            )
			return false;
		return true;
	}
         
    
    public function hookDisplayFooterProduct($params)
    {
        if(isset($params['category']->id_category))
			$this->context->cookie->nav_last_visited_category = (int)$params['category']->id_category;
    }
    
    
    private function _prepareHook($nav)
    {
        $id_product = (int)Tools::getValue('id_product');
		if (!$id_product)
			return false;
        
        $product = new Product($id_product, false, (int)$this->context->language->id);
        if(!Validate::isLoadedObject($product))
            return false;
        
        $id_lang = $this->context->language->id;
        
        if (!isset($this->context->cookie->nav_last_visited_category) || !Product::idIsOnCategoryId($id_product, array('0' => array('id_category' => $this->context->cookie->nav_last_visited_category))))
		  $this->context->cookie->nav_last_visited_category = (int)($product->id_category_default);
          
        $curr_position = $this->getWsPositionInCategory($id_product, $this->context->cookie->nav_last_visited_category);
        if(!Validate::isUnsignedInt($curr_position))
            return false;
        $sql = 'SELECT p.`id_product`,
            pl.`link_rewrite`,pl.`name`,
            product_shop.`id_category_default`, 
            MAX(image_shop.`id_image`) id_image
        FROM `'._DB_PREFIX_.'category_product` cp
        LEFT JOIN `'._DB_PREFIX_.'product` p ON p.`id_product` = cp.`id_product`
        '.Shop::addSqlAssociation('product', 'p').'
        LEFT JOIN `'._DB_PREFIX_.'product_lang` pl
            ON (p.`id_product` = pl.`id_product`
            AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl').')
        LEFT JOIN `'._DB_PREFIX_.'image` i
            ON (i.`id_product` = p.`id_product`)'.
        Shop::addSqlAssociation('image', 'i', false, 'image_shop.cover=1').'
        LEFT JOIN `'._DB_PREFIX_.'image_lang` il
            ON (image_shop.`id_image` = il.`id_image`
            AND il.`id_lang` = '.(int)$id_lang.')
        WHERE product_shop.`id_shop` = '.(int)$this->context->shop->id.'
        AND cp.`id_category` = '.(int)$this->context->cookie->nav_last_visited_category.'
        AND product_shop.`active` = 1
        AND product_shop.`visibility` IN ("both", "catalog") 
        AND cp.`position` '.($nav=='next' ? '>' : '<').$curr_position.'
        GROUP BY product_shop.id_product
        ORDER BY cp.`position` '.($nav=='next' ? 'ASC' : 'DESC');
        if($data = Db::getInstance()->getRow($sql))
        {  
            $product = array(
                'name' => $data['name'],
                'url' => $this->context->link->getProductLink($data['id_product']),
                'small_default' => Image::getSize('small_default'),
                );

            if(($cover = Product::getCover($data['id_product'])) && $cover['id_image'])
            {
                $product['cover'] = $this->context->link->getImageLink($data['link_rewrite'], $cover['id_image'],'small_default');
                return $product;
            }
            else
                return false;
        }    
        else
            return false;
        /*//to do if hop::addSqlRestrictionOnLang('ps') is enough to tell the product is in current stor when in multistore 
        $sql = 'SELECT cp.`id_product`
        FROM `'._DB_PREFIX_.'category_product` cp
        LEFT JOIN `'._DB_PREFIX_.'product_shop` ps ON (ps.`id_product` = cp.`id_product`)
        WHERE cp.`id_category` = '.(int)$this->context->cookie->nav_last_visited_category.'
        AND cp.`position` '.($nav=='next' ? '>' : '<').$curr_position.'
        '.Shop::addSqlRestrictionOnLang('ps').'
        ORDER BY cp.`position` '.($nav=='next' ? 'ASC' : 'DESC');
        if($product = Db::getInstance()->getRow($sql))
        {  
            $assembler = new ProductAssembler($this->context);

            $presenterFactory = new ProductPresenterFactory($this->context);
            $presentationSettings = $presenterFactory->getPresentationSettings();
            $presenter = new ProductListingPresenter(
                new ImageRetriever(
                    $this->context->link
                ),
                $this->context->link,
                new PriceFormatter(),
                new ProductColorsRetriever(),
                $this->context->getTranslator()
            );
            $product['id_product_attribute'] = Product::getDefaultAttribute($product['id_product']);
            $product = $presenter->present(
                $presentationSettings,
                $assembler->assembleProduct($product),
                $this->context->language
            );
            // $product['category'] =  Category::getLinkRewrite((int)$product['id_category_default'], (int)$id_lang);
            return $product;
        }    
        else
            return false;*/
    }
    
    public function hookDisplayProductExtraContent($params)
    {
        $extraContent = new ProductExtraContent();
        if(!isset($params['product']))
            return $extraContent;
        $extraContent->setContent(array(
                'prev'=>$this->_prepareHook('prev'),
                'next'=>$this->_prepareHook('next'),
            ));

        return array('products'=>$extraContent);
    }
    public function getWsPositionInCategory($id_product = 0, $id_category = 0)
	{
		$result = Db::getInstance()->executeS('SELECT position
			FROM `'._DB_PREFIX_.'category_product`
			WHERE id_category = '.(int)$id_category.'
			AND id_product = '.(int)$id_product);
		if (count($result) > 0)
			return $result[0]['position'];
		return '';
	}
    public function hookDisplayRightBar($params)
    {
        if( Dispatcher::getInstance()->getController() != 'product' )
            return false;

        $this->context->smarty->assign(array(
            'nav_products' => array(
                'prev'=>$this->_prepareHook('prev'),
                'next'=>$this->_prepareHook('next'),
            ),
        ));

        return $this->display(__FILE__, 'stproductlinknav_side_bar.tpl');
    }
}