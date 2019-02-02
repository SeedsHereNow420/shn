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
class StWishListMyWishListModuleFrontController extends ModuleFrontController
{
	public $ssl = true;

	public function __construct()
	{
		parent::__construct();
		$this->context = Context::getContext();
		include_once($this->module->getLocalPath().'classes/StWishListClass.php');
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

	/**
	 * Assign wishlist template
	 */
	public function assign()
	{
		$errors = array();

		if ($this->context->customer->isLogged())
		{
			$delete = Tools::getValue('delete');
			$id_st_wishlist = Tools::getValue('id_st_wishlist');
			if (Tools::isSubmit('submitWishlist')) {
				if (Configuration::get('PS_TOKEN_ACTIVATED') == 1 && strcmp(Tools::getToken(), Tools::getValue('token'))) {
				    $errors[] = $this->trans('Please refresh the page and try again', array(), 'Shop.Theme.Transformer');
				}
				if (!count($errors)) {
					$name = Tools::getValue('name');
                    $name = trim($name);
					if (empty($name)) {
					   $errors[] = $this->trans('You must specify a name.', array(), 'Shop.Theme.Transformer');
					}
					/*if (StWishListClass::isExistsByNameForUser($name)) {
					   $errors[] = $this->trans('This name is already used by another list.', array(), 'Shop.Theme.Transformer');
					}*/
					if (!count($errors)) {
						$wishlist = new StWishListClass();
						$wishlist->id_shop = $this->context->shop->id;
						$wishlist->name = $name;
						$wishlist->id_customer = (int)$this->context->customer->id;
						!$wishlist->isDefault($wishlist->id_customer) ? $wishlist->default = 1 : 0;
						list($us, $s) = explode(' ', microtime());
						srand($s * $us);
						$wishlist->token = strtoupper(substr(sha1(uniqid(rand(), true)._COOKIE_KEY_.$this->context->customer->id), 0, 16));
						$wishlist->add();
						Tools::redirect($this->context->link->getModuleLink('stwishlist', 'mywishlist'));
					}
				}
			}
			elseif ($delete && $id_st_wishlist) {
				$wishlist = new StWishListClass((int)$id_st_wishlist);
				if ($this->context->customer->isLogged() && $this->context->customer->id == $wishlist->id_customer && Validate::isLoadedObject($wishlist)) {
				    $wishlist->delete();
                    Tools::redirect($this->context->link->getModuleLink('stwishlist', 'mywishlist'));
				}
				else {
				    $errors[] = $this->trans('Cannot delete this wishlist', array(), 'Shop.Theme.Transformer');
				}	
			}
            if ($wishlists = StWishListClass::getByIdCustomer($this->context->customer->id, true, (int)$id_st_wishlist)) {

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
                foreach($wishlists AS &$wishlist) {
                    foreach ($wishlist['products'] as $key => &$product) {
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
                            $product['wl_attribute_url'] = Context::getContext()->link->getProductLink($product['id_product'],null,null,null,null,null,$id_product_attribute);
                        }
                        foreach($_product AS $k => $v) {
                            $product['wl_'.$k] = $v;
                        }
                        if (!$key) {
                            $wishlist['cover'] = $product['cover']['bySize']['home_default'];
                        }
                    }    
                }
            }
            if ($errors) {
                $this->errors = $errors;
            }
            $this->context->smarty->assign(array(
                'wishlists' => $wishlists,
                'id_st_wishlist' => (int)$id_st_wishlist,
            ));
            
    		$this->context->smarty->assign(array(
    			'id_customer' => (int)$this->context->customer->id
    		));
            
            Media::addJsDef(array(
                'stmywishlist_url' => $this->context->link->getModuleLink('stwishlist', 'mywishlist'),
            ));
    	    $this->addJS(_MODULE_DIR_.'stwishlist/views/js/wishlist.js');
    
            $this->setTemplate('module:stwishlist/views/templates/front/mywishlist.tpl');
        }
        else
			Tools::redirect('index.php?controller=authentication&back='.urlencode($this->context->link->getModuleLink('stwishlist', 'mywishlist')));

	}
    
    public function getBreadcrumbLinks()
    {
        $breadcrumb = parent::getBreadcrumbLinks();

        $breadcrumb['links'][] = $this->addMyAccountToBreadcrumb();

        return $breadcrumb;
    }
    
    public function ajaxProcessAddProduct()
    {
        $this->checkLogin();
        $id_st_wishlist = (int)Tools::getValue('id_st_wishlist');
        $id_product = (int)Tools::getValue('id_product');
        $id_product_attribute = (int)Tools::getValue('id_product_attribute');
        $quantity = (int)Tools::getValue('quantity', 1);
        if (StWishListClass::addProduct($id_st_wishlist, $this->context->customer->id, $id_product, $id_product_attribute, $quantity)) {
            die(Tools::jsonEncode(array('success' => 1,
                'message' => $this->trans('Product added to wishlist.', array(), 'Shop.Theme.Transformer'),
                // 'total' => StWishListClass::getAllProducts($this->context->customer->id, true),
                'current_total' => count(StWishListClass::getWishlistProducts($id_st_wishlist)),
            )));
        }
        die(Tools::jsonEncode(array('success' => 0,
            'message' => $this->trans('Error occurred when adding products.', array(), 'Shop.Theme.Transformer'))));
    }
    
    public function ajaxProcessDeleteProduct()
    {
        $this->checkLogin();
        $id_st_wishlist = (int)Tools::getValue('id_st_wishlist');
        $id_product = (int)Tools::getValue('id_product');
        $id_product_attribute = (int)Tools::getValue('id_product_attribute');
        //
        if (StWishListClass::removeProduct($id_st_wishlist, $id_product, $id_product_attribute)) {
            die(Tools::jsonEncode(array('success' => 1,
            'message' => $this->trans('Product deleted', array(), 'Shop.Theme.Transformer'))));
        }
        die(Tools::jsonEncode(array('success' => 0,
            'message' => $this->trans('Failed to delete this product', array(), 'Shop.Theme.Transformer'))));
    }
    
    public function ajaxProcessCreateWishlist()
    {
        $this->checkLogin();
        $name = Tools::getValue('name');
        $name = trim($name);
        if ($name) {
            /*if (StWishListClass::isExistsByNameForUser($name)) {
                die(Tools::jsonEncode(array('success' => 0,
                    'message' => $this->trans('This name is already used by another list', array(), 'Shop.Theme.Transformer'))));
            }*/
            $wishlist = new StWishListClass();
    		$wishlist->id_shop = $this->context->shop->id;
    		$wishlist->name = $name;
    		$wishlist->id_customer = (int)$this->context->customer->id;
    		!$wishlist->isDefault($wishlist->id_customer) ? $wishlist->default = 1 : 0;
    		list($us, $s) = explode(' ', microtime());
    		srand($s * $us);
    		$wishlist->token = strtoupper(substr(sha1(uniqid(rand(), true)._COOKIE_KEY_.$this->context->customer->id), 0, 16));
    		$wishlist->add();
            if ($wishlist->id) {
                $this->context->smarty->assign(array(
                        'wishlist_name' => $name,
                        'id_st_wishlist' => $wishlist->id,
                        'wishlist_total' => 0,
                    ));

                die(Tools::jsonEncode(array('success' => 1,
                    'data' => $this->context->smarty->fetch('module:stwishlist/views/templates/hook/item.tpl'),
                    'message' => $this->trans('Wishlist created', array(), 'Shop.Theme.Transformer'))));      
            } 
        }
        die(Tools::jsonEncode(array('success' => 0,
            'message' => $this->trans('Create wishilist failed', array(), 'Shop.Theme.Transformer'))));
    }
    
    public function ajaxProcessUpdateProduct()
    {
        $this->checkLogin();
        $id_st_wishlist = (int)Tools::getValue('id_st_wishlist');
        $id_product = (int)Tools::getValue('id_product');
        $id_product_attribute = (int)Tools::getValue('id_product_attribute');
        $quantity = (int)Tools::getValue('quantity');
        if (StWishListClass::updateProduct($id_st_wishlist, $id_product, $id_product_attribute, $quantity)) {
            die(Tools::jsonEncode(array('success' => 1,
                'message' => $this->trans('Quantity updated', array(), 'Shop.Theme.Transformer'))));
        }
        die(Tools::jsonEncode(array('success' => 0,
            'message' => $this->trans('Update quantity failed', array(), 'Shop.Theme.Transformer'))));
    }
    
    public function ajaxProcessSendEmail()
    {
        $this->checkLogin();
        $id_st_wishlist = (int)Tools::getValue('id_st_wishlist');
        $email = (array)Tools::getValue('email');
        $context = Context::getContext();
        $errors = array();
        foreach($email AS $to) {
            if (!Validate::isEmail(trim($to))) {
                $errors[] = $this->trans('Email Address is not correct:', array(), 'Shop.Theme.Transformer').$to;
            }
            $wishlist = StWishListClass::exists($id_st_wishlist, $context->customer->id);
    		if (!$wishlist) {
  		        $errors[] = $this->trans('This wishlist does not exist', array(), 'Shop.Theme.Transformer');
    		}
            if (!$errors && !StWishListClass::addEmail($id_st_wishlist, $to)) {
                $errors[] = $this->trans('An error occurred when sending this wishlist.', array(), 'Shop.Theme.Transformer');
            }
            if ($errors) {
                die(Tools::jsonEncode(array('success' => 0,
                    'message' => $this->trans('An error occurred:', array(), 'Shop.Theme.Transformer').implode('<br/>', $errors))));
            }
            
            $toName = strval(Configuration::get('PS_SHOP_NAME'));
    		$customer = $context->customer;
    		if (Validate::isLoadedObject($customer))
    			Mail::Send(
    				$context->language->id,
    				'stwishlist',
    				sprintf(Mail::l('Message from %1$s %2$s', $context->language->id), $customer->lastname, $customer->firstname),
    				array(
    					'{lastname}' => $customer->lastname,
    					'{firstname}' => $customer->firstname,
    					'{wishlist}' => $wishlist['name'],
    					'{message}' => $context->link->getModuleLink('stwishlist', 'view', array('token' => $wishlist['token']))
    				),
    				$to, $toName, $customer->email, $customer->firstname.' '.$customer->lastname, null, null, dirname(__FILE__).'/mails/'
    			);
            
        }
        if (!$errors) {
            die(Tools::jsonEncode(array('success' => 1,
             'message' => $this->trans('This wishlist was sent.', array(), 'Shop.Theme.Transformer'))));
        }
        die(Tools::jsonEncode(array('success' => 0,
            'message' => $this->trans('An error occurred when sending this wishlist.', array(), 'Shop.Theme.Transformer'))));
    }
    
    public function checkLogin()
    {
        if (!$this->context->customer->isLogged())
			die(Tools::jsonEncode(array('success' => 2,
				'message' => $this->trans('You aren not logged in', array(), 'Admin.Theme.Transformer'))));
    }
}
