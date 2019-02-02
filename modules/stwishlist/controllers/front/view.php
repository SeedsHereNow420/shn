<?php

/*
* 2007-2015 PrestaShop
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
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;
class StWishListViewModuleFrontController extends ModuleFrontController
{

	public function __construct()
	{
		parent::__construct();
		$this->context = Context::getContext();
		include_once($this->module->getLocalPath().'classes/StWishListClass.php');
	}

	public function initContent()
	{
		parent::initContent();
		$token = Tools::getValue('token');
        $wishlist = StWishListClass::getByToken($token);
		if ($wishlist && $products = StWishListClass::getProductsByIdWishlist($wishlist['id_st_wishlist'])) {

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
            
            foreach ($products as &$product) {
                $_product = $product;
                $id_product_attribute = $product['id_product_attribute'];
                $prod = new Product((int)$product['id_product']);
                if (!$prod->id) {
                    continue;
                }
                $product = $presenter->present(
                    $presentationSettings,
                    $assembler->assembleProduct(array('id_product' => $product['id_product'])),
                    $this->context->language
                );
                if ($id_product_attribute) {
                    $product['wl_attribute'] = Product::getAttributesParams($product['id_product'],$id_product_attribute);
                    $product['url'] = Context::getContext()->link->getProductLink($product['id_product'],null,null,null,null,null,$id_product_attribute);
                }
                foreach($_product AS $k => $v) {
                    $product['wl_'.$k] = $v;
                }
            }
            $wishlist['products'] = $products;
        }
        $this->context->smarty->assign('wishlist', $wishlist);
		$this->setTemplate('module:stwishlist/views/templates/front/view.tpl');
	}
}
