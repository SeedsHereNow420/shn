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

class StblogCategoryModuleFrontController extends StblogModuleFrontController
{
	protected $category;
	public $nbr_blogs;
          
    public function init()
	{
        $id_st_blog_category = (int)Tools::getValue('id_st_blog_category');
        
        if (!$id_st_blog_category || !Validate::isUnsignedId($id_st_blog_category))
			Tools::redirect('index.php?controller=404');
            
		$this->category = new StBlogCategory($id_st_blog_category, $this->context->language->id);
        
		parent::init();
        
        if (!Validate::isLoadedObject($this->category) || !$this->category->active || !$this->category->isAssociatedToShop())
		{
            Tools::redirect('index.php?controller=404');
		}
    }
	public function initContent()
	{
		parent::initContent();
        
        if(!$this->errors)
		{
    		$this->nbr_blogs = $this->category->getBlogs(null, null, null, null, null, true);         
    		$blogs = $this->category->getBlogs($this->context->language->id, (int)$this->page, (int)$this->resultsPerPage);
            /*
            if($blogs)
                foreach($comments as &$v)
                    $v['images'] = ProductCommentImage::getByComment($v['id_product_comment']);            
            */
            //print_r($blogs);die;
            
            $this->context->smarty->assign(array(
    			'category' => $this->category,
                'blogs' => $blogs,
                'nbr_blogs' => $this->nbr_blogs,
                'id_st_blog_category' => $this->category->id,
                'pagination' => $this->getTemplateVarPagination($this->nbr_blogs),
                'category_layouts' => Configuration::get('ST_BLOG_CATE_LAYOUTS'),
                // 'cate_row_blog_nbr' => Configuration::get('ST_BLOG_CATE_ROW_BLOG_NBR'),
                // 'display_viewcount' => Configuration::get('ST_BLOG_DISPLAY_VIEWCOUNT'),
                'pro_per_fw'               => Configuration::get('STSN_BLOG_PRO_PER_GRID_FW'),
                'pro_per_xxl'              => Configuration::get('STSN_BLOG_PRO_PER_GRID_XXL'),
                'pro_per_xl'               => Configuration::get('STSN_BLOG_PRO_PER_GRID_XL'),
                'pro_per_lg'               => Configuration::get('STSN_BLOG_PRO_PER_GRID_LG'),
                'pro_per_md'               => Configuration::get('STSN_BLOG_PRO_PER_GRID_MD'),
                'pro_per_sm'               => Configuration::get('STSN_BLOG_PRO_PER_GRID_SM'),
                'pro_per_xs'               => Configuration::get('STSN_BLOG_PRO_PER_GRID_XS'),
            ));
        }
		$this->context->smarty->assign('errors', $this->errors);
		$this->setTemplate('module:stblog/views/templates/front/category.tpl');
	}
    
    public function getBreadcrumbLinks()
    {
        $breadcrumb = parent::getBreadcrumbLinks();
        $breadcrumb['links'][] = array(
            'title' => $this->trans('Blog', array(), 'Shop.Theme.Transformer'),
            'url' => $this->context->link->getModuleLink('stblog', 'default'),
        );
        $categorys =StBlogCategory::getParentsCategories($this->category->id);
        foreach ($categorys as $category) {
            if ($category['id_parent'] && !$category['is_root_category']) {
                $breadcrumb['links'][] = array(
                    'title' => $category['name'],
                    'url' => $this->context->link->getModuleLink('stblog', 'category', array('id_st_blog_category'=>$category['id_st_blog_category'], 'rewrite'=>$category['link_rewrite'])),
                );
            }
        }
        return $breadcrumb;
    }
}