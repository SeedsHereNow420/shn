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

include_once(dirname(__FILE__).'/classes/StBlogClass.php');
include_once(dirname(__FILE__).'/classes/StBlogImageClass.php');
include_once(dirname(__FILE__).'/classes/StBlogCategory.php');

class StBlog extends Module
{
    private $_html = '';
    public $fields_form;
    public $fields_value;
    public $validation_errors = array();
    private static $_bo_menu = array(
        array(
            'class_name' => 'AdminStBlog',
            'name' => 'St Blog Module',
            'tab' => 'CONFIGURE',
        ),
        array(
            'class_name' => 'AdminStBlogCategory',
            'name' => 'St Blog Categories',
            'tab' => 'CONFIGURE',
        ),
    );
    private static $_hooks = array(
        array('displayStBlogHome','displayStBlogHome','This hook displays new elements on the blog homepage',1),
        array('displayStBlogHomeTop','displayStBlogHomeTop','This hook displays new elements on the top of blog homepage',1),
        array('displayStBlogFullWidthTop','displayStBlogFullWidthTop','Blog homepage full width top',1),
        array('displayStBlogFullWidthBottom','displayStBlogFullWidthBottom','Blog homepage full width bottom',1),
        // array('displayStBlogHomeBottom','displayStBlogHomeBottom','This hook displays new elements on the bottom of blog homepage',1),
        array('displayStBlogLeftColumn','displayStBlogLeftColumn','This hook displays new elements in the left-hand column',1),  
        array('displayStBlogRightColumn','displayStBlogRightColumn','This hook displays new elements in the right-hand column',1),
        array('displayStBlogArticleFooter','displayStBlogArticleFooter','Bottom of article',1),      
        array('displayStBlogArticleSecondary','displayStBlogArticleSecondary','Secondary block of article',1),      
        array('displayStBlogArticleTop','displayStBlogArticleTop','At the top of article',1),      
        array('displayStBlogArticleInfo','displayStBlogArticleInfo','Information along with date and author',1),      
    );
    
    public static $moduleRoutes = array();
    public static $blog_images = array(
        'gallery_lg_w'  => 870,
        'gallery_lg_h'  => 450,
        'gallery_md_w'  => 400,
        'gallery_md_h'  => 300,
        'gallery_bg_w'  => 580,
        'gallery_bg_h'  => 400,
        'gallery_sm_w'  => 180,
        'gallery_sm_h'  => 124,
        'gallery_xs_w'  => 70,
        'gallery_xs_h'  => 70,
    );
    private $templateFile = array();
    
	public function __construct()
	{
		$this->name          = 'stblog';
		$this->tab           = 'front_office_features';
		$this->version       = '1.6.7';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
		 $this->bootstrap	 = true;
		parent::__construct();
		
        $this->displayName = $this->getTranslator()->trans('Blog module', array(), 'Modules.Stblog.Admin');
        $this->description = $this->getTranslator()->trans('Blog module for Prestashop', array(), 'Modules.Stblog.Admin');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->controllers = array('default','category','article');
        
        $route = Configuration::get('ST_BLOG_ROUNT_NAME', $this->context->language->id);
        if (!$route) $route = 'blog';
        self::$moduleRoutes = array(
            'module-stblog-category' => array(
                'controller' =>  'category',
                'rule' =>        $route.'/{id_st_blog_category}-{rewrite}',
                'keywords' => array(
                    'id_st_blog_category'            =>   array('regexp' => '[0-9]+', 'param' => 'id_st_blog_category'),
                    'rewrite'       =>   array('regexp' => '[_a-zA-Z0-9-\pL]*'),
                ),
                'params' => array(
                    'fc' => 'module',
                    'module' => 'stblog',
                )
            ),
            'module-stblog-article' => array(
                'controller' =>  'article',
                'rule' =>        $route.'/{id_st_blog}_{rewrite}.html',
                'keywords' => array(
                    'id_st_blog'            =>   array('regexp' => '[0-9]+', 'param' => 'id_st_blog'),
                    'rewrite'       =>   array('regexp' => '[_a-zA-Z0-9-\pL]*'),
                ),
                'params' => array(
                    'fc' => 'module',
                    'module' => 'stblog',
                )
            ),
            'module-stblog-default' => array(
                'controller' =>  'default',
                'rule' =>        $route,
                'keywords' => array(
                    'm'            =>   array('regexp' => '[0-9]+', 'param' => 'm'),
                ),
                'params' => array(
                    'fc' => 'module',
                    'module' => 'stblog',
                )
            ),
            'module-stblog-rss' => array(
                'controller' =>  'rss',
                'rule' =>        $route.'/rss',
                'keywords' => array(
                ),
                'params' => array(
                    'fc' => 'module',
                    'module' => 'stblog',
                )
            ),
        );
        $this->templateFile = array(
            'module:stthemeeditor/views/templates/slider/homepage.tpl',
            );
	}

	public function install()
	{
        $res = $this->installDb() &&
            $this->_addHook() &&
            $this->installTab() &&
            parent::install() &&
            $this->registerHook('actionShopDataDuplication') &&
            $this->registerHook('displayBackOfficeHeader') &&
            $this->registerHook('moduleRoutes') &&
            $this->registerHook('overrideLayoutTemplate') && //blog controllers can not have php_self to get correct page layout, beacuse url
            Configuration::updateValue('ST_BLOG_META_TITLE', array('1'=>'Blog')) &&
            Configuration::updateValue('ST_BLOG_META_KEYWORDS', array('1'=>'Blog')) &&
            Configuration::updateValue('ST_BLOG_META_DESCRIPTION', array('1'=>'Blog')) &&
            Configuration::updateValue('ST_BLOG_CATE_LAYOUTS', 1) &&

            Configuration::updateValue('STSN_BLOG_GRID_PER_FW_0', 0) &&
            Configuration::updateValue('STSN_BLOG_GRID_PER_XXL_0', 4) &&
            Configuration::updateValue('STSN_BLOG_GRID_PER_XL_0', 3) &&
            Configuration::updateValue('STSN_BLOG_GRID_PER_LG_0', 3) &&
            Configuration::updateValue('STSN_BLOG_GRID_PER_MD_0', 2) &&
            Configuration::updateValue('STSN_BLOG_GRID_PER_SM_0', 2) &&
            Configuration::updateValue('STSN_BLOG_GRID_PER_XS_0', 2) &&

            Configuration::updateValue('ST_BLOG_COLUMN_HOMEPAGE', 2) &&
            Configuration::updateValue('ST_BLOG_COLUMN_CATEGORY', 2) &&
            Configuration::updateValue('ST_BLOG_COLUMN_ARTICLE', 2) &&
            Configuration::updateValue('ST_BLOG_PER_PAGE', 10) &&
            Configuration::updateValue('ST_BLOG_DISPLAY_VIEWCOUNT', 1) &&
            
            Configuration::updateValue('ST_BLOG_RELATED_DISPLAY_PRICE', 1) &&
            Configuration::updateValue('ST_BLOG_RELATED_SLIDESHOW', 0) &&
            Configuration::updateValue('ST_BLOG_RELATED_S_SPEED', 7000) &&
            Configuration::updateValue('ST_BLOG_RELATED_A_SPEED', 400) &&
            Configuration::updateValue('ST_BLOG_RELATED_PAUSE', 1) &&
            Configuration::updateValue('ST_BLOG_RELATED_LOOP', 0) &&
            Configuration::updateValue('ST_BLOG_RELATED_MOVE', 2) &&
            Configuration::updateValue('ST_BLOG_RELATED_LAZY', 1) &&
            Configuration::updateValue('ST_BLOG_RELATED_TITLE', 0) &&
            Configuration::updateValue('ST_BLOG_RELATED_DIRECTION_NAV', 1) &&
            Configuration::updateValue('ST_BLOG_RELATED_CONTROL_NAV', 0) &&
            
            Configuration::updateValue('ST_BLOG_SS_SLIDESHOW', 0) &&
            Configuration::updateValue('ST_BLOG_SS_S_SPEED', 7000) &&
            Configuration::updateValue('ST_BLOG_SS_A_SPEED', 400) &&
            Configuration::updateValue('ST_BLOG_SS_PAUSE', 1) &&
            
            Configuration::updateValue('STSN_BLOG_R_PRO_PER_FW_0', 0) &&
            Configuration::updateValue('STSN_BLOG_R_PRO_PER_XXL_0', 5) &&
            Configuration::updateValue('STSN_BLOG_R_PRO_PER_XL_0', 4) &&
            Configuration::updateValue('STSN_BLOG_R_PRO_PER_LG_0', 3) &&
            Configuration::updateValue('STSN_BLOG_R_PRO_PER_MD_0', 3) &&
            Configuration::updateValue('STSN_BLOG_R_PRO_PER_SM_0', 2) &&
            Configuration::updateValue('STSN_BLOG_R_PRO_PER_XS_0', 2);
        
        if ($res)
            $res &= $this->initImgData();
		if ($res)
				$res &= $this->sampleData();
        return $res;
	}
    public function initImgData()
    {
        $res = true;
        foreach(self::$blog_images AS $key => $value)
            $res &= Configuration::updateValue('ST_BLOG_IMG_'.strtoupper($key), (int)$value);
        return $res;
    }
    public function uninstall()
	{
        @set_time_limit(10*60);
		if (!parent::uninstall() 
            || !$this->uninstallDb()
            || !$this->uninstallTab() 
        )
			return false;
		return true;
	}
    
	public function installDb()
	{
		$return = true;
		include(dirname(__FILE__).'/sql_install.php');
		foreach ($sql as $s)
			$return &= Db::getInstance()->execute($s); 
        
		return $return;
	}
    
    public function installTab()
	{
	    $result = true;
	    foreach(self::$_bo_menu as $v)
        {
            if (Tab::getIdFromClassName($v['class_name'])) {
                continue;
            }
            $tab = new Tab();
    		$tab->active = 0;
    		$tab->class_name = $v['class_name'];
    		$tab->name = array();
    		foreach (Language::getLanguages(true) as $lang)
    			$tab->name[$lang['id_lang']] = $v['name'];
    		$tab->id_parent = (int)Tab::getIdFromClassName($v['tab']);
    		$tab->module = $this->name;
    		$result &= $tab->add();
        }
		return $result;
	}
	
	public function uninstallTab()
	{
	    $result = true;
        
	    foreach(self::$_bo_menu as $v)
        {
                
    		$id_tab = (int)Tab::getIdFromClassName($v['class_name']);
    		if ($id_tab)
    		{
    			$tab = new Tab($id_tab);
    			$result &= $tab->delete();
    		}
            else
                $result = false;
        }
		return $result;
	}
    
    public function sampleData()
    {
        $return = true;
        include(dirname(__FILE__).'/samples_data.php');
        
        foreach($_data AS $key => $value)
        {
            switch($key)
            {
                case 'st_blog_category':
                foreach($value as $k=>&$sample)
                {
        			$module = new StBlogCategory();
        			foreach (Language::getLanguages(false) as $lang)
                    {
        				$module->name[$lang['id_lang']] = $sample['name'];
        				$module->link_rewrite[$lang['id_lang']] = $sample['link_rewrite'];
                    }
        			$module->id_parent = $sample['id_parent'];
        			$module->level_depth = $sample['level_depth'];
        			$module->active = $sample['active'];
        			$module->is_root_category = $sample['is_root_category'];
        			$module->date_add = $sample['date_add'];
        			$module->date_upd = $sample['date_upd'];
        			$return &= $module->assocShop()->add();
        		}
                $insert_id = $module->id;
                foreach($value as $sp)
        		{
                    if(!$insert_id || !isset($sp['child']) || !count($sp['child']))
                        continue;
                    foreach(Shop::getShops() AS $shop)
                    {
                        foreach($sp['child'] as $k=>$v)
                		{
                			$module = new StBlogCategory();
                            
                			foreach (Language::getLanguages(false) as $lang)
                            {
                				$module->name[$lang['id_lang']] = $v['name'];
                				$module->link_rewrite[$lang['id_lang']] = $v['link_rewrite'];
                            }
                			$module->id_parent = $insert_id;
                			$module->level_depth = $v['level_depth'];
                			$module->active = $v['active'];
                			$module->is_root_category = $v['is_root_category'];
                			$module->date_add = $v['date_add'];
                			$module->date_upd = $v['date_upd'];
                			$return &= $module->assocShop(array($shop['id_shop']))->add();
                		}
                    }
        		}
                break;
            }
        }
		return $return;
    }
	
	public function uninstallDb()
	{
		include(dirname(__FILE__).'/sql_install.php');
		foreach ($sql as $name => $v)
			Db::getInstance()->execute('DROP TABLE '.$name);
		return true;
	}
	
	    
    private function _addHook()
	{
        $res = true;
        foreach(self::$_hooks as $v)
        {
            if(!$res)
                break;
            if (!Validate::isHookName($v[0]))
                continue;
                
            $id_hook = Hook::getIdByName($v[0]);
    		if (!$id_hook)
    		{
    			$new_hook = new Hook();
    			$new_hook->name = pSQL($v[0]);
    			$new_hook->title = pSQL($v[1]);
    			$new_hook->description = pSQL($v[2]);
    			$new_hook->position = pSQL($v[3]);
    			//$new_hook->live_edit  = 0;
    			$new_hook->add();
    			$id_hook = $new_hook->id;
    			if (!$id_hook)
    				$res = false;
    		}
            else
            {
                Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'hook` set `title`="'.$v[1].'", `description`="'.$v[2].'", `position`="'.$v[3].'" where `id_hook`='.$id_hook);
            }
        }
		return $res;
	}

	private function _removeHook()
	{
	    $sql = 'DELETE FROM `'._DB_PREFIX_.'hook` WHERE ';
        foreach(self::$_hooks as $v)
            $sql .= ' `name` = "'.$v[0].'" OR';
		return Db::getInstance()->execute(rtrim($sql,'OR').';');
	}
    
	public function getContent()
	{
		Tools::redirectAdmin($this->context->link->getAdminLink('AdminStBlog'));
	}
    
	public function hookDisplayBackOfficeHeader()
	{
		if (method_exists($this->context->controller, 'addJquery'))
		{
			return '<script>
				var admin_stblog_ajax_url = \''.$this->context->link->getAdminLink('AdminStBlog').'\';
				var current_id_tab = '.(int)$this->context->controller->id.';
			</script>';
		}
	}
	public function hookActionShopDataDuplication($params)
	{
		Db::getInstance()->execute('
		INSERT IGNORE INTO '._DB_PREFIX_.'st_blog_category_shop (id_st_blog_category, id_shop)
		SELECT id_st_blog_category, '.(int)$params['new_id_shop'].'
		FROM '._DB_PREFIX_.'st_blog_category_shop
		WHERE id_shop = '.(int)$params['old_id_shop']);
        Db::getInstance()->execute('
		INSERT IGNORE INTO '._DB_PREFIX_.'st_blog_shop (id_st_blog, id_shop)
		SELECT id_st_blog, '.(int)$params['new_id_shop'].'
		FROM '._DB_PREFIX_.'st_blog_shop
		WHERE id_shop = '.(int)$params['old_id_shop']);
    }
    public function hookModuleRoutes($params)
    {
        return self::$moduleRoutes;
    }
	public function hookOverrideLayoutTemplate($params)
    {
        if(isset($params['controller']->page_name) && ($params['controller']->page_name=='module-stblog-default' || $params['controller']->page_name=='module-stblog-category' || $params['controller']->page_name=='module-stblog-article' || $params['controller']->page_name=='module-stblogarchives-default' || $params['controller']->page_name=='module-stblogsearch-default'))
            return $this->context->shop->theme->getLayoutRelativePathForPage($params['controller']->page_name);
        else
            return $params['default_layout'];
    }
    function hookDisplayAdminHomeQuickLinks() {
			echo '<li id="stthemeeditor_block">
			<a  style="background:url('.$this->_path.'logo.png) no-repeat center 25px #F8F8F8;" href="index.php?controller=AdminModules&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'">
				<h4>St Blog Module</h4>
				<p>Blog module for Prestashop</p>
			</a>
    		</li>';
    }
}