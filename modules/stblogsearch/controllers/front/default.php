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

require_once _PS_MODULE_DIR_.'/stblogsearch/classes/StBlogSearchClass.php';
require_once _PS_MODULE_DIR_.'/stblog/classes/StBlogLoader.php';
include_once _PS_MODULE_DIR_.'/stblog/classes/controller/FrontController.php';
StBlogLoader::load(array('class','ImageClass'));
include_once(dirname(__FILE__).'/../../stblogsearch.php');
class StblogSearchDefaultModuleFrontController extends StblogModuleFrontController
{
	public $nbr_blogs;
        
	public function initContent()
	{
		parent::initContent();
        
        $query = Tools::replaceAccentedChars(urldecode(Tools::getValue('stb_search_query')));
        $original_query = Tools::getValue('stb_search_query');
        
        if(!$this->errors)
		{
		    $search = new StBlogSearchClass();
            $id_array = $search->prepareSearch($query);
            $blogs = array();
            $this->nbr_blogs = 0;
            if ($id_array) {
                $this->nbr_blogs = $search->getBlogs($id_array, null, null, null, null, null, true);             
        		$blogs = $search->getBlogs($id_array, $this->context->language->id, (int)$this->page, (int)$this->resultsPerPage);    
            }
                
            $this->context->smarty->assign(array(
                'search_tag' => $original_query,
                'blogs' => $blogs,
                'pagination' => $this->getTemplateVarPagination($this->nbr_blogs),
                'nbr_blogs' => $this->nbr_blogs,
                'meta_title' => Configuration::get('ST_BLOG_META_TITLE', $this->context->language->id),
                'meta_description' => Configuration::get('ST_BLOG_META_KEYWORDS', $this->context->language->id),
                'meta_keywords' => Configuration::get('ST_BLOG_META_DESCRIPTION', $this->context->language->id),
                
                'category_layouts' => Configuration::get('ST_BLOG_CATE_LAYOUTS'),
                'pro_per_fw'  => Configuration::get('STSN_BLOG_PRO_PER_GRID_FW'),
                'pro_per_xxl' => Configuration::get('STSN_BLOG_PRO_PER_GRID_XXL'),
                'pro_per_xl'  => Configuration::get('STSN_BLOG_PRO_PER_GRID_XL'),
                'pro_per_lg'  => Configuration::get('STSN_BLOG_PRO_PER_GRID_LG'),
                'pro_per_md'  => Configuration::get('STSN_BLOG_PRO_PER_GRID_MD'),
                'pro_per_sm'  => Configuration::get('STSN_BLOG_PRO_PER_GRID_SM'),
                'pro_per_xs'  => Configuration::get('STSN_BLOG_PRO_PER_GRID_XS'),
            ));
        }
        
		$this->context->smarty->assign('errors', $this->errors);
		$this->setTemplate('module:stblogsearch/views/templates/front/default.tpl');
	}
    public function getBreadcrumbLinks()
    {
        $breadcrumb = parent::getBreadcrumbLinks();

        $breadcrumb['links'][] = array(
            'title' => $this->trans('Blog', array(), 'Shop.Theme.Transformer'),
            'url' => $this->context->link->getModuleLink('stblog', 'default'),
        );
        $breadcrumb['links'][] = array(
            'title' => $this->trans('Search', array(), 'Shop.Theme.Transformer'),
            'url' => $this->context->link->getModuleLink('stblogsearch', 'default'),
        );
        return $breadcrumb;
    }
}
