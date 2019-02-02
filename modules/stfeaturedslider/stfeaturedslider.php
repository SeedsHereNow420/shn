<?php
/*
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
*  @author    ST-themes <hellolee@gmail.com>
*  @copyright 2007-2017 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*/

if (!defined('_PS_VERSION_'))
	exit;

use PrestaShop\PrestaShop\Adapter\Category\CategoryProductSearchProvider;
use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchContext;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchQuery;
use PrestaShop\PrestaShop\Core\Product\Search\SortOrder;

include_once(_PS_MODULE_DIR_.'stthemeeditor/classes/BaseProductsSlider.php');
class StFeaturedSlider extends BaseProductsSlider
{
    protected static $cache_products = array();
    public $_prefix_st = 'HOME_FEATURED_S_';
    public $_prefix_stsn = 'STSN_FEATURED_';
	function __construct()
	{
		$this->name           = 'stfeaturedslider';
		$this->version        = '1.1.8';
        $this->title          = $this->getTranslator()->trans('Featured Products', array(), 'Shop.Theme.Transformer'); // Front office title block.
        $this->displayName    = $this->getTranslator()->trans('Featured products slider', array(), 'Modules.Stfeaturedslider.Admin');
		$this->description    = $this->getTranslator()->trans('Displays featured products on homepage.', array(), 'Modules.Stfeaturedslider.Admin');

		parent::__construct();
        
        $this->sort_by[13] = array('id' =>13 , 'name' => 'Random', 'orderBy'=>null, 'orderWay'=>null);
	}
	function install()
	{
		if (!parent::install() 
            || !$this->registerHook('displayHomeTop')
            || !Configuration::updateValue($this->_prefix_st.'NBR', 6) 
            || !Configuration::updateValue($this->_prefix_st.'CAT', (int)Context::getContext()->shop->getCategory())
        )
			return false;
		$this->clearSliderCache();
		return true;
	}
    public function initFieldsForm()
    {
        parent::initFieldsForm();
        $custom_fields['cat'] = array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Category from which to pick products to be displayed', array(), 'Modules.Stfeaturedslider.Admin'),
            'name' => 'cat',
            'class' => 'fixed-width-xs',
            'desc' => $this->getTranslator()->trans('Choose the category ID of the products that you would like to display on homepage (default: 2 for "Home").', array(), 'Modules.Stfeaturedslider.Admin'),
            'validation' => 'isUnsignedInt',
        );

        $this->fields_form[0]['form']['input'] = array_merge($custom_fields, $this->fields_form[0]['form']['input']);
    }
    public function saveForm()
    {
        if (isset($_POST['savesliderform'])) {
            parent::saveForm();
            if ($id_category = Configuration::get($this->_prefix_st.'CAT')) {
                $exists = Db::getInstance()->getValue('SELECT COUNT(0) FROM '._DB_PREFIX_.'category WHERE active = 1 AND id_category='.(int)$id_category);
                if (!$exists) {
                    Configuration::updateValue($this->_prefix_st.'CAT', (int)Context::getContext()->shop->getCategory());
                }
            }
        }
    }
    public function _prepareHook($col=0)
    {
        parent::_prepareHook($col);

        $this->smarty->assign(array(
            'title_link' => Context::getContext()->link->getCategoryLink((int)Configuration::get($this->_prefix_st.'CAT')),
		));
        return true;
    }
    public function getProducts($ext='')
    {
        if ($ext && strpos($ext, '_') === false) {
            $ext = '_'.strtoupper($ext);
        }
        
        if (isset(self::$cache_products[$ext]) && self::$cache_products[$ext])
            return self::$cache_products[$ext];
        
        $featured_category_id = (int)Configuration::get($this->_prefix_st.'CAT');

        $nProducts = Configuration::get($this->_prefix_st.'NBR'.$ext);
        
        if(!$nProducts)
            $nProducts = !$ext ? 10 : 3;
            
        $order_by = 'id_product';
        $order_way = 'DESC';
        $random = false;
        $soby = (int)Configuration::get($this->_prefix_st.'SOBY'.$ext);
        if (key_exists($soby, $this->sort_by)) {
            $order_by = $this->sort_by[$soby]['orderBy'];
            $order_way = $this->sort_by[$soby]['orderWay'];
        }
        
        if ($soby == 13) {
            $order_by = null;
            $order_way = null;
            $random = true;
        }

        if(!$featured_category_id)
            $featured_category_id = (int)Context::getContext()->shop->getCategory();

        $category = new Category($featured_category_id);

        $searchProvider = new CategoryProductSearchProvider(
            $this->context->getTranslator(),
            $category
        );
        $context = new ProductSearchContext($this->context);
        $query = new ProductSearchQuery();
        $query
            ->setResultsPerPage($nProducts)
            ->setPage(1)
        ;
        if ($random) {
            $query->setSortOrder(SortOrder::random());
        } else {
            $query->setSortOrder(new SortOrder('product', $order_by, $order_way));
        }
        $result = $searchProvider->runQuery(
            $context,
            $query
        );
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

        $products_for_template = [];
        foreach ($result->getProducts() as $rawProduct) {
            $products_for_template[] = $presenter->present(
                $presentationSettings,
                $assembler->assembleProduct($rawProduct),
                $this->context->language
            );
        }
        return self::$cache_products[$ext] = $products_for_template;
    }
    public function getConfigFieldsValues()
    {
        $fields_values = parent::getConfigFieldsValues();
        $fields_values['cat'] = Configuration::get($this->_prefix_st.'CAT');
        return $fields_values;
    }
}