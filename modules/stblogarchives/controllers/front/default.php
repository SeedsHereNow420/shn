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

require_once _PS_MODULE_DIR_.'/stblogarchives/classes/StBlogArchivesClass.php';
require_once _PS_MODULE_DIR_.'/stblog/classes/StBlogLoader.php';
include_once _PS_MODULE_DIR_.'/stblog/classes/controller/FrontController.php';
StBlogLoader::load(array('class','ImageClass'));
include_once(dirname(__FILE__).'/../../stblogarchives.php');
class StblogArchivesDefaultModuleFrontController extends StblogModuleFrontController
{
	public $nbr_blogs;
    public $year;
    public $month;
        
	public function initContent()
	{
		if (!($m = Tools::getValue('m')))
            Tools::redirect('index.php?controller=404');
        
        if(!$this->errors)
		{
		    $year  = substr($m, 0, 4);
            $month = substr($m, 4, 2);
            if (strlen($year) == 4 && strlen($month) == 2)
                $date = date('F', strtotime($year.'-'.$month)).', '.$year;
            elseif(strlen($year) == 4)
            {
                $date = $year;
                $month = null;
            }
            else
            {
                $date = $this->trans('Unknown', array(), 'Shop.Theme.Transformer');
                $year = $month = null;
            }
            $this->year = $year;
            $this->month = $month;
            $heading = $this->trans('Archive for', array(), 'Shop.Theme.Transformer').' '.$date.' - ';
            
            parent::initContent();
            
		    $archive = new StBlogArchivesClass();
    		$this->nbr_blogs = $archive->getBlogs($m, null, null, null, null, null, true); 
    		$blogs = $archive->getBlogs($m, $this->context->language->id, (int)$this->page, (int)$this->resultsPerPage);
            
            $this->context->smarty->assign(array(
                'heading' => $date,
                'blogs' => $blogs,
                'nbr_blogs' => $this->nbr_blogs,
                'pagination' => $this->getTemplateVarPagination($this->nbr_blogs),
                'meta_title' => $heading . Configuration::get('ST_BLOG_META_TITLE', $this->context->language->id),
                'meta_description' => $heading . Configuration::get('ST_BLOG_META_KEYWORDS', $this->context->language->id),
                'meta_keywords' => $heading . Configuration::get('ST_BLOG_META_DESCRIPTION', $this->context->language->id),
                'category_layouts' => Configuration::get('ST_BLOG_CATE_LAYOUTS'),
                
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
		$this->setTemplate('module:stblogarchives/views/templates/front/default.tpl');
	}
    public function getBreadcrumbLinks()
    {
        $breadcrumb = parent::getBreadcrumbLinks();

        $breadcrumb['links'][] = array(
            'title' => $this->trans('Blog', array(), 'Shop.Theme.Transformer'),
            'url' => $this->context->link->getModuleLink('stblog', 'default'),
        );
        $breadcrumb['links'][] = array(
            'title' => $this->year.($this->month ? $this->month : ''),
            'url' => $this->context->link->getModuleLink('stblogarchives', 'default', array('m'=>$this->year.($this->month ? $this->month : ''))),
        );
        return $breadcrumb;
    }
}
