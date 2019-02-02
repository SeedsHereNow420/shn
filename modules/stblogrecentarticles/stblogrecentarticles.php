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

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;    

include_once(_PS_MODULE_DIR_.'/stblogfeaturedarticles/stblogfeaturedarticles.php');
class StBlogRecentArticles extends StBlogFeaturedArticles
{
    public $_prefix_st = 'ST_B_RECENT_';
    public $_prefix_stsn = 'STSN_B_RECENT_';
    protected $type = 2;
	public function __construct()
	{
		$this->name          = 'stblogrecentarticles';
		$this->version       = '1.0.2';
        $this->displayName = $this->getTranslator()->trans('Blog Module - Recent articles', array(), 'Modules.Stblog.Admin');
        $this->description = $this->getTranslator()->trans('Display rencent articles on your store.', array(), 'Modules.Stblog.Admin');
        parent::__construct();
	}
	public function install()
	{
		if (!parent::install()
			|| !$this->registerHook('displayStBlogHome')
        )
			return false;
        // Revoke by parent.
        //$res = $this->prepareHooks();
        /*if ($res)
			foreach(Shop::getShops(false) as $shop)
				$res &= $this->sampleData($shop['id_shop']);*/
		
		return $res;
	}
    function sampleData($id_shop)
    {
        return true;
        $ret = true;
        $samples = array(
            array(
                'type'          => 2,
                'display_on'    => 22,
                'nbr_fot'       => 4,
                'id_shop'       => (int)$id_shop,
                'aw_display_fot'=> 1,
                'footer_wide'   => 3,  
            ),
        );
        foreach($samples AS $sample) {
            if (Db::getInstance()->getValue('SELECT COUNT(0) FROM `'._DB_PREFIX_.'st_blog_slider` 
                WHERE `type`='.(int)$sample['type'].' 
                AND `display_on`='.(int)$sample['display_on'].'
                AND `id_shop`='.(int)$sample['id_shop'])) {
                continue;
            }
            $module = new StBlogSliderClass;
            $module->type = $sample['type'];
            $module->display_on = $sample['display_on'];
            $module->nbr_fot = $sample['nbr_fot']; 
            $module->id_shop = $sample['id_shop'];
            $module->aw_display_fot = $sample['aw_display_fot'];
            $module->footer_wide = $sample['footer_wide'];
            $module->active = 1;
            $ret &= $module->add(); 
        }
        return $ret;
    }
    protected function initList()
	{
	   $helper = parent::initList();
	   unset($this->fields_list['id_st_blog_category']);
       return $helper;
    }
    public function initForm()
    {
        $help = parent::initForm();
        
        unset($this->fields_form[0]['form']['input']['category']);
        unset($this->fields_form[2]['form']['input']['view_more']);
        $this->fields_form[2]['form']['input']['soby']['default_value'] = 5;
        $this->fields_form[3]['form']['input']['soby_col']['default_value'] = 5;
        $this->fields_form[4]['form']['input']['soby_fot']['default_value'] = 5;
        
        return $help;
	}
}