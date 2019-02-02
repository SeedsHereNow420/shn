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
class StLovedProductMyLovedModuleFrontController extends ModuleFrontController
{
	public $ssl = true;

	public function __construct()
	{
		parent::__construct();
		$this->context = Context::getContext();
		include_once($this->module->getLocalPath().'classes/StLovedProductClass.php');
	}

	/**
	 * @see FrontController::initContent()
	 */
	public function initContent()
	{
		parent::initContent();
		$action = Tools::getValue('action');

		if (!Tools::isSubmit('ajax'))
			$this->assign();
		elseif (!empty($action) && method_exists($this, 'ajaxProcess'.Tools::toCamelCase($action)))
			$this->{'ajaxProcess'.Tools::toCamelCase($action)}();
		else
			die(Tools::jsonEncode(array('error' => $this->trans('Method doesn\'t exist', array(), 'Shop.Theme.Transformer'))));
	}
    
	public function assign()
	{
		$errors = array();
		if ($this->context->customer->isLogged())
		{
			$id_st_loved_product = Tools::getValue('id_st_loved_product');
            if ($products = StLovedProductClass::getMyLoved($this->context->customer->id, 0, 1)) {

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
                foreach($products AS &$product) {
                    $prod = new Product((int)$product['id_source']);
                    if (!$prod->id) {
                        continue;
                    }
                    $product = $presenter->present(
                        $presentationSettings,
                        $assembler->assembleProduct(array('id_product' => $product['id_source'])),
                        $this->context->language
                    );
                }
                $this->context->smarty->assign(array(
                    'products' => $products
                ));
            }
            $show_blog = true;
            if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog')) {
                $show_blog = false;
            }
            if ($show_blog && ($blogs = StLovedProductClass::getMyLoved($this->context->customer->id, 0, 2))) {
                foreach($blogs AS &$blog) {
                    $blog = new StBlogClass($blog['id_source'], $this->context->language->id);
                    $blog = StBlogClass::getBlogDetials($this->context->language->id, get_object_vars($blog));
                }
                $this->context->smarty->assign(array(
                    'blogs' => $blogs
                ));
            }
		}
		else
			Tools::redirect('index.php?controller=authentication&back='.urlencode($this->context->link->getModuleLink('stlovedproduct', 'myloved')));

		$this->context->smarty->assign(array(
			'id_customer' => (int)$this->context->customer->id,
			'errors' => $errors,
		));
        
        Media::addJsDef(array(
            'st_myloved_url' => $this->context->link->getModuleLink('stlovedproduct', 'myloved'),
        ));
	    $this->addJS(_MODULE_DIR_.'stlovedproduct/views/js/myloved.js');

        $this->setTemplate('module:stlovedproduct/views/templates/front/myloved.tpl');
	}
    
    public function getBreadcrumbLinks()
    {
        $breadcrumb = parent::getBreadcrumbLinks();

        $breadcrumb['links'][] = $this->addMyAccountToBreadcrumb();

        return $breadcrumb;
    }
    
    public function ajaxProcessDeleteProduct()
    {
        $this->checkLogin();
        $id_source = (int)Tools::getValue('id_source');
        $type = (int)Tools::getValue('type', 1);
        $type || $type = 1;
        //
        if (StLovedProductClass::DeleteProduct($id_source, $this->context->customer->id, $type)) {
            die(Tools::jsonEncode(array('success' => 1,
            'action' => 0,
            'message' => $this->trans('Product deleted', array(), 'Shop.Theme.Transformer'),
            'total' => StLovedProductClass::getTotal($id_source, $type),
            )));
        }
        die(Tools::jsonEncode(array('success' => 0,
            'message' => $this->trans('Failed to delete  this product', array(), 'Shop.Theme.Transformer'))));
    }
        
    public function ajaxProcessAddLovedProduct()
    {
        $this->checkLogin();
        $id_source = (int)Tools::getValue('id_source');
        $type = (int)Tools::getValue('type', 1);
        $type || $type = 1;
        $unloveable = (int)Tools::getValue('unloveable');
        if (StLovedProductClass::AddProduct($id_source, $this->context->customer->id, $unloveable, $type)) {
            // $row = StLovedProductClass::getOne($id_source, $this->context->customer->id);
            die(Tools::jsonEncode(array('success' => 1,
            'action' => $unloveable && !StLovedProductClass::exists($id_source, $this->context->customer->id, $type) ? 0 : 1, //to tell: add or remove
            'message' => $this->trans('Loved it!', array(), 'Shop.Theme.Transformer'),
            'total' => StLovedProductClass::getTotal($id_source, $type),
            // 'last_time' => strtotime($row['date_upd']),
            )));
        }
        die(Tools::jsonEncode(array('success' => 0,
        'message' => $this->trans('Adding to love failed', array(), 'Shop.Theme.Transformer'))));
    }
    
    public function checkLogin()
    {
        if (!$this->context->customer->isLogged())
			die(Tools::jsonEncode(array('success' => 2,
				'message' => $this->trans('You are not logged in', array(), 'Admin.Theme.Transformer'))));
    }
}
