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

use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;
use PrestaShop\PrestaShop\Adapter\BestSales\BestSalesProductSearchProvider;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchContext;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchQuery;
use PrestaShop\PrestaShop\Core\Product\Search\SortOrder;

include_once(_PS_MODULE_DIR_.'stthemeeditor/classes/BaseProductsSlider.php');
class StBestSellers extends BaseProductsSlider
{
    protected static $cache_products = array();
    public $_prefix_st = 'ST_SELLERS_';
    public $_prefix_stsn = 'STSN_SELLERS_';
	function __construct()
	{
		$this->name           = 'stbestsellers';
		$this->tab            = 'front_office_features';
        $this->title          = $this->getTranslator()->trans('Top sellers', array(), 'Shop.Theme.Transformer'); // Front office title block.
        $this->url_entity     = 'best-sales';
        $this->displayName = $this->getTranslator()->trans('Top sellers Slider', array(), 'Modules.Stbestsellers.Admin');
		$this->description = $this->getTranslator()->trans('Display top-selling products on homepage.', array(), 'Modules.Stbestsellers.Admin');
        
		parent::__construct();
    }
	function install()
	{
		if (!parent::install()
            || !$this->registerHook('actionOrderStatusPostUpdate')
            || !$this->registerHook('displayLeftColumn')
        )
			return false;
	    $this->clearSliderCache();
		return true;
	}
    protected function getProducts($ext='')
    {
        if ($ext && strpos($ext, '_') === false) {
            $ext = '_'.strtoupper($ext);
        }
        
        if (isset(self::$cache_products[$ext]) && self::$cache_products[$ext])
            return self::$cache_products[$ext];
        
        $nbr = Configuration::get($this->_prefix_st.'NBR'.$ext);
        // ($nbr===false && $col) && $nbr = Configuration::get($this->_prefix_st.'NBR');
        
        if(!$nbr)
            $nbr = 8;
        
        $order_by = 'date_add';
        $order_way = 'DESC';
        $soby = (int)Configuration::get($this->_prefix_st.'SOBY'.$ext);
        if (key_exists($soby, $this->sort_by)) {
            $order_by = $this->sort_by[$soby]['orderBy'];
            $order_way = $this->sort_by[$soby]['orderWay'];
        }
        $searchProvider = new BestSalesProductSearchProvider(
            $this->context->getTranslator()
        );

        $context = new ProductSearchContext($this->context);
        $query = new ProductSearchQuery();
        $query
            ->setResultsPerPage($nbr)
            ->setPage(1);
        $query->setSortOrder(new SortOrder('product', $order_by, $order_way));
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

        $products = [];
        foreach ($result->getProducts() as $rawProduct) {
            $products[] = $presenter->present(
                $presentationSettings,
                $assembler->assembleProduct($rawProduct),
                $this->context->language
            );
        }
        return self::$cache_products[$ext] = $products;;
    }
    public function hookActionOrderStatusPostUpdate($params)
    {
        $this->clearSliderCache();
    }
}