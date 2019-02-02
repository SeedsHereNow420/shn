<?php
/*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
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
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

include_once(dirname(__FILE__).'/../../classes/controller/FrontController.php');

use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;

class StblogArticleModuleFrontController extends StblogModuleFrontController
{
	protected $blog;
	  
    public function init()
	{
		$id_st_blog = (int)Tools::getValue('id_st_blog');
        if (!$id_st_blog || !Validate::isUnsignedId($id_st_blog))
			Tools::redirect('index.php?controller=404');
            
		$this->blog = new StBlogClass($id_st_blog, $this->context->language->id, $this->context->shop->id);
        
        parent::init();
        
        if (!Tools::getValue('preview') && (!Validate::isLoadedObject($this->blog) || !$this->blog->active || !$this->blog->isAssociatedToShop()))
		{
            Tools::redirect('index.php?controller=404');
		}
    }
	public function initContent()
	{
		parent::initContent();
        if(!$this->errors)
		{
		    if(Configuration::get('ST_BLOG_DISPLAY_VIEWCOUNT'))
                StBlogClass::setPageViewed($this->blog->id, $this->context->shop->id);
            
		    $id_lang = (int)$this->context->language->id;
            $blog_tags = $this->blog->getBlogTags($id_lang);
            
            $blog = StBlogClass::getBlogDetials($this->context->language->id, get_object_vars($this->blog));
    		$this->context->smarty->assign(array(
				'blog' => $blog,
				'blog_tags' => $blog_tags,
                'blogRelatedDisplayPrice' => Configuration::get('ST_BLOG_RELATED_DISPLAY_PRICE'),
                'slider_slideshow' => Configuration::get('ST_BLOG_RELATED_SLIDESHOW'),
                'slider_s_speed' => Configuration::get('ST_BLOG_RELATED_S_SPEED'),
                'slider_a_speed' => Configuration::get('ST_BLOG_RELATED_A_SPEED'),
                'slider_pause_on_hover' => Configuration::get('ST_BLOG_RELATED_PAUSE'),
                'rewind_nav' => Configuration::get('ST_BLOG_RELATED_LOOP'),
                'slider_move' => Configuration::get('ST_BLOG_RELATED_MOVE'),
                'lazy_load' => Configuration::get('ST_BLOG_RELATED_LAZY'),
                'title_position' => Configuration::get('ST_BLOG_RELATED_TITLE'),
                'direction_nav' => Configuration::get('ST_BLOG_RELATED_DIRECTION_NAV'),
                'control_nav' => Configuration::get('ST_BLOG_RELATED_CONTROL_NAV'),
			    // 'homeSize' => Image::getSize(ImageType::getFormatedName('home')),
                'display_viewcount' => Configuration::get('ST_BLOG_DISPLAY_VIEWCOUNT'),
                'pro_per_xl'       => (int)Configuration::get('STSN_BLOG_R_PRO_PER_XL_0'),
	            'pro_per_lg'       => (int)Configuration::get('STSN_BLOG_R_PRO_PER_LG_0'),
	            'pro_per_md'       => (int)Configuration::get('STSN_BLOG_R_PRO_PER_MD_0'),
	            'pro_per_sm'       => (int)Configuration::get('STSN_BLOG_R_PRO_PER_SM_0'),
	            'pro_per_xs'       => (int)Configuration::get('STSN_BLOG_R_PRO_PER_XS_0'),
	            'pro_per_xxs'       => (int)Configuration::get('STSN_BLOG_R_PRO_PER_XXS_0'),
    		));
        }
		$this->context->smarty->assign('errors', $this->errors);
		$this->setTemplate('module:stblog/views/templates/front/article.tpl');
	}
    public static function Timeago($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        /*$string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );*/
        $string = array(
            'y' => 0,
            'm' => 0,
            'w' => 0,
            'd' => 0,
            'h' => 0,
            'i' => 0,
            // 's' => 0,
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k;
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        // return $string ? implode(', ', $string) . ' ago' : 'just now';
        return $string;
    }
    
    protected function getBreadcrumbLinks()
    {
        $breadcrumb = parent::getBreadcrumbLinks();
        $breadcrumb['links'][] = array(
            'title' => $this->trans('Blog', array(), 'Shop.Theme.Transformer'),
            'url' => $this->context->link->getModuleLink('stblog', 'default'),
        );
        $categorys =StBlogCategory::getParentsCategories($this->blog->id_st_blog_category_default);
        foreach ($categorys as $category) {
            if ($category['id_parent'] && !$category['is_root_category']) {
                $breadcrumb['links'][] = array(
                    'title' => $category['name'],
                    'url' => $this->context->link->getModuleLink('stblog', 'category', array('id_st_blog_category'=>$category['id_st_blog_category'], 'rewrite'=>$category['link_rewrite'])),
                );
            }
        }
        $breadcrumb['links'][] = array(
            'title' => $this->blog->name,
            'url' => $this->context->link->getModuleLink('stblog', 'article', array('id_st_blog'=>$this->blog->id, 'rewrite'=>$this->blog->link_rewrite)),
        );

        return $breadcrumb;
    }
}