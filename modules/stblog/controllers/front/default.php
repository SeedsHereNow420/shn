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
include_once(dirname(__FILE__).'/../../classes/StBlogClass.php');
class StblogDefaultModuleFrontController extends StblogModuleFrontController
{       
	public function initContent()
	{
		parent::initContent();
        $blogs = $pagination = array();
        if (Configuration::get('ST_BLOG_SHOW_ALL')) {
            $this->nbr_blogs = StBlogClass::getBlogs(null, null, null, null, true);         
    		$blogs = StBlogClass::getBlogs((int)$this->page, (int)$this->resultsPerPage, 'id_st_blog', 'DESC');
            $pagination = $this->getTemplateVarPagination($this->nbr_blogs);    
        }
        $this->context->smarty->assign(array(
            'HOOK_ST_BLOG_HOME_TOP' => Hook::exec('displayStBlogHomeTop'),
            'HOOK_ST_BLOG_HOME' => Hook::exec('displayStBlogHome'),
            'blogs' => $blogs,
            'pagination' => $pagination,
            'blog_show_all' => Configuration::get('ST_BLOG_SHOW_ALL'),

            'category_layouts' => Configuration::get('ST_BLOG_CATE_LAYOUTS'),
            'pro_per_fw'  => Configuration::get('STSN_BLOG_PRO_PER_GRID_FW'),
            'pro_per_xxl' => Configuration::get('STSN_BLOG_PRO_PER_GRID_XXL'),
            'pro_per_xl'  => Configuration::get('STSN_BLOG_PRO_PER_GRID_XL'),
            'pro_per_lg'  => Configuration::get('STSN_BLOG_PRO_PER_GRID_LG'),
            'pro_per_md'  => Configuration::get('STSN_BLOG_PRO_PER_GRID_MD'),
            'pro_per_sm'  => Configuration::get('STSN_BLOG_PRO_PER_GRID_SM'),
            'pro_per_xs'  => Configuration::get('STSN_BLOG_PRO_PER_GRID_XS'),
        ));
        
		$this->setTemplate('module:stblog/views/templates/front/default.tpl');
	}
}