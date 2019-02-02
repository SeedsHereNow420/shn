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

include_once(_PS_MODULE_DIR_.'stthemeeditor/classes/BaseProductsSlider.php');
class StHomeNew extends BaseProductsSlider
{
    protected static $cache_products = array();
    public $_prefix_st = 'ST_HOMENEW_';
    public $_prefix_stsn = 'STSN_HOMENEW_';
	function __construct()
	{
		$this->name           = 'sthomenew';
		$this->version        = '1.7.9';
        $this->title          = $this->getTranslator()->trans('New products', array(), 'Shop.Theme.Transformer'); // Front office title block.
        $this->url_entity     = 'new-products';
        $this->displayName    = $this->getTranslator()->trans('New Products Slider', array(), 'Modules.Sthomenew.Admin');
		$this->description    = $this->getTranslator()->trans('Display new products on homepage.', array(), 'Modules.Sthomenew.Admin');

		parent::__construct();
    }
	function install()
	{
		if (!parent::install()
            || !$this->registerHook('displayHomeBottom')
            || !Configuration::updateValue($this->_prefix_st.'GRID', 2)
            || !Configuration::updateValue($this->_prefix_st.'NBR', 6)
            || !Configuration::updateValue($this->_prefix_stsn.'PRO_PER_FW', '')
            || !Configuration::updateValue($this->_prefix_stsn.'PRO_PER_XXL', 3)
            || !Configuration::updateValue($this->_prefix_stsn.'PRO_PER_XL', 3)
            || !Configuration::updateValue($this->_prefix_stsn.'PRO_PER_LG', 2)
            || !Configuration::updateValue($this->_prefix_stsn.'PRO_PER_MD', 2)
            || !Configuration::updateValue($this->_prefix_stsn.'PRO_PER_SM', 2)
            || !Configuration::updateValue($this->_prefix_stsn.'PRO_PER_XS', 1)
        )
			return false;
	    $this->clearSliderCache();
		return true;
	}
    public function getProducts($ext='')
    {
        if ($ext && strpos($ext, '_') === false) {
            $ext = '_'.strtoupper($ext);
        }
        
        if (isset(self::$cache_products[$ext]) && self::$cache_products[$ext])
            return self::$cache_products[$ext];

        $nbr = Configuration::get($this->_prefix_st.'NBR'.$ext);
        
        if(!$nbr)
            $nbr = 8;
        
        $order_by = 'date_add';
        $order_way = 'DESC';
        $soby = (int)Configuration::get($this->_prefix_st.'SOBY'.$ext);
        if (key_exists($soby, $this->sort_by)) {
            $order_by = $this->sort_by[$soby]['orderBy'];
            $order_way = $this->sort_by[$soby]['orderWay'];
        }
        $newProducts = array();
        if (Configuration::get('PS_NB_DAYS_NEW_PRODUCT')) {
            $newProducts = Product::getNewProducts(
                (int)$this->context->language->id,
                0,
                $nbr,
                false,
                $order_by,
                $order_way
            );
        }

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

        $products_for_template = array();

        if (is_array($newProducts)) {
            foreach ($newProducts as $rawProduct) {
                $products_for_template[] = $presenter->present(
                    $presentationSettings,
                    $assembler->assembleProduct($rawProduct),
                    $this->context->language
                );
            }
        }
        return self::$cache_products[$ext] = $products_for_template;
    }
}