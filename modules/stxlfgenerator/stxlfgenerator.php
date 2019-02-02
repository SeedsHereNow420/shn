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
use PrestaShop\PrestaShop\Core\Addon\Theme\ThemeManagerBuilder;
if (file_exists(dirname(__FILE__).'/classes/XliffFileDumper.php')) {
    require_once dirname(__FILE__).'/classes/XliffFileDumper.php';    
} else {
    require_once dirname(__FILE__).'/classes/XliffFileDumper.enc.php';
}
class StXlfGenerator extends Module
{
    private $theme = 'transformer';
    private $light = true;
    public static $modules = array(
        array('val'=>'stbanner', 'id'=>'[]', 'name'=>'stbanner'),
        array('val'=>'stbestsellers', 'id'=>'[]', 'name'=>'stbestsellers'),
        array('val'=>'stblog', 'id'=>'[]', 'name'=>'stblog'),
        array('val'=>'stblogarchives', 'id'=>'[]', 'name'=>'stblogarchives'),
        array('val'=>'stblogblockcategory', 'id'=>'[]', 'name'=>'stblogblockcategory'),
        array('val'=>'stblogcomments', 'id'=>'[]', 'name'=>'stblogcomments'),
        array('val'=>'stblogeditor', 'id'=>'[]', 'name'=>'stblogeditor'),
        array('val'=>'stblogfeaturedarticles', 'id'=>'[]', 'name'=>'stblogfeaturedarticles'),
        array('val'=>'stbloglinknav', 'id'=>'[]', 'name'=>'stbloglinknav'),
        array('val'=>'stblogrecentarticles', 'id'=>'[]', 'name'=>'stblogrecentarticles'),
        array('val'=>'stblogrelatedarticles', 'id'=>'[]', 'name'=>'stblogrelatedarticles'),
        array('val'=>'stblogsearch', 'id'=>'[]', 'name'=>'stblogsearch'),
        array('val'=>'stblogtags', 'id'=>'[]', 'name'=>'stblogtags'),        
        array('val'=>'stbrandsslider', 'id'=>'[]', 'name'=>'stbrandsslider'),
        array('val'=>'stcountdown', 'id'=>'[]', 'name'=>'stcountdown'),
        array('val'=>'stcurrencyselector', 'id'=>'[]', 'name'=>'stcurrencyselector'),
        array('val'=>'stcustomersignin', 'id'=>'[]', 'name'=>'stcustomersignin'),
        array('val'=>'steasycontent', 'id'=>'[]', 'name'=>'steasycontent'),
        array('val'=>'stfblikebox', 'id'=>'[]', 'name'=>'stfblikebox'),
        array('val'=>'stfeaturedcategories', 'id'=>'[]', 'name'=>'stfeaturedcategories'),
        array('val'=>'stfeaturedslider', 'id'=>'[]', 'name'=>'stfeaturedslider'),
        array('val'=>'sthomenew', 'id'=>'[]', 'name'=>'sthomenew'),
        array('val'=>'sthoverimage', 'id'=>'[]', 'name'=>'sthoverimage'),
        array('val'=>'stinstagram', 'id'=>'[]', 'name'=>'stinstagram'),
        array('val'=>'stlanguageselector', 'id'=>'[]', 'name'=>'stlanguageselector'),
        array('val'=>'stlovedproduct', 'id'=>'[]', 'name'=>'stlovedproduct'),
        array('val'=>'stmegamenu', 'id'=>'[]', 'name'=>'stmegamenu'),
        array('val'=>'stmultilink', 'id'=>'[]', 'name'=>'stmultilink'),
        array('val'=>'stnewsletter', 'id'=>'[]', 'name'=>'stnewsletter'),
        array('val'=>'stnotification', 'id'=>'[]', 'name'=>'stnotification'),
        array('val'=>'stoverride', 'id'=>'[]', 'name'=>'stoverride'),
        array('val'=>'stowlcarousel', 'id'=>'[]', 'name'=>'stowlcarousel'),
        array('val'=>'stpagebanner', 'id'=>'[]', 'name'=>'stpagebanner'),
        array('val'=>'stproductcategoriesslider', 'id'=>'[]', 'name'=>'stproductcategoriesslider'),
        array('val'=>'stproductcomments', 'id'=>'[]', 'name'=>'stproductcomments'),
        array('val'=>'stproductlinknav', 'id'=>'[]', 'name'=>'stproductlinknav'),
        array('val'=>'stqrcode', 'id'=>'[]', 'name'=>'stqrcode'),
        array('val'=>'strelatedproducts', 'id'=>'[]', 'name'=>'strelatedproducts'),
        array('val'=>'stsearchbar', 'id'=>'[]', 'name'=>'stsearchbar'),
        array('val'=>'stshoppingcart', 'id'=>'[]', 'name'=>'stshoppingcart'),
        array('val'=>'stsidebar', 'id'=>'[]', 'name'=>'stsidebar'),
        array('val'=>'stsocial', 'id'=>'[]', 'name'=>'stsocial'),
        array('val'=>'stspecialslider', 'id'=>'[]', 'name'=>'stspecialslider'),
        array('val'=>'ststickers', 'id'=>'[]', 'name'=>'ststickers'),
        array('val'=>'stswiper', 'id'=>'[]', 'name'=>'stswiper'),
        array('val'=>'sttags', 'id'=>'[]', 'name'=>'sttags'),
        array('val'=>'stthemeeditor', 'id'=>'[]', 'name'=>'stthemeeditor'),
        array('val'=>'sttwitterembeddedtimelines', 'id'=>'[]', 'name'=>'sttwitterembeddedtimelines'),
        array('val'=>'stvideo', 'id'=>'[]', 'name'=>'stvideo'),
        array('val'=>'stviewedproducts', 'id'=>'[]', 'name'=>'stviewedproducts'),
        array('val'=>'stwishlist', 'id'=>'[]', 'name'=>'stwishlist'),
        array('val'=>'stxlfgenerator', 'id'=>'[]', 'name'=>'stxlfgenerator'),
    );
	function __construct()
	{
		$this->name = 'stxlfgenerator';
		$this->tab = 'front_office_features';
		$this->version = '1.0.0';
		$this->author = 'SUNNYTOO.COM';
		$this->need_instance = 0;

		$this->bootstrap = true;
		parent::__construct();

		$this->displayName = $this->getTranSlator()->trans('Translation files generator', array(), 'Modules.Stxlfgenerator.Admin');
		$this->description = $this->getTranSlator()->trans('Generate xlif files in order to translate the theme.', array(), 'Modules.Stxlfgenerator.Admin');
		$this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
	}
    
	function install()
	{
		return parent::install();
	}
    
    function uninstall()
	{
		return parent::uninstall();
	}

	public function getContent()
    {
        $output = '';
        $errors = array();
        if (Tools::isSubmit('generatefiles'))
        {
            $locale = Tools::getValue('locale','en-US');
            if ($this->light) {
                $modules = array();
                foreach(self::$modules AS $value) {
                    $modules[] = $value['val'];
                }
                $options = array(
                    'theme' => $this->theme,
                    'theme_module' => 0,
                    'locale' => $locale,
                    'modules' => $modules,
                    'type' => Tools::getValue('type'),
                    'check_missing' => 0,
                    'tpl_path' => _PS_ALL_THEMES_DIR_.$this->theme.'/templates/',
                );
            } else {
                $options = array(
                    'theme' => Tools::getValue('theme'),
                    'theme_module' => Tools::getValue('theme_module'),
                    'locale' => $locale,
                    'modules' => Tools::getValue('module_'),
                    'type' => Tools::getValue('type', 1),
                    'check_missing' => Tools::getValue('check_missing', 0),
                    'tpl_path' => _PS_ALL_THEMES_DIR_.$this->theme.'/templates/',
                );    
            }
            $save_path = _PS_ALL_THEMES_DIR_.$this->theme.'/translations/'.$locale.'/';
            $dumper = new XliffFileDumper($save_path);
            // Clear modules translation files & theme files..
            $dumper->clearFiles($save_path, 'ModulesSt');
            $dumper->clearFiles($save_path, ucfirst($this->theme));
            if ($dumper->dump($options)) {
                // Copy Xliff file /app/Resources/translations
                $des = _PS_CORE_DIR_.'/app/Resources/translations/default/';
                $dumper->CopyFiles($save_path, $des, 'ModulesSt', $locale);
                $dumper->CopyFiles($save_path, $des, 'AdminTheme'.ucfirst($this->theme), $locale);
                $output = $this->displayConfirmation('Translatoin files successfully generated, files were saved in '.$save_path.'.');
            } else {
                $output = $this->displayError('Error occurred.');
            }
        }
        return $output.$this->renderForm();
    }
    
	public function renderForm()
	{
        $languages = array();
        $themes_array = array();
        foreach(Language::getLanguages(false) AS $value) {
            $language['id'] = $value['locale'];
            $language['name'] = $value['name'];
            $languages[] = $language;
        }
        if ($this->light) {
            $this->fields_form[0]['form'] = array(
    			'legend' => array(
    				'title' => $this->getTranSlator()->trans('Translation file generator', array(), 'Modules.Stxlfgenerator.Admin'),
    				'icon' => 'icon-cogs',
    			),
    			'input' => array(
                    array(
                        'type' => 'select',
                        'label' => $this->getTranSlator()->trans('Select language:', array(), 'Modules.Stxlfgenerator.Admin'),
                        'name' => 'locale',
                        'options' => array(
                            'query' => $languages,
                            'id' => 'id',
                            'name' => 'name',
                        ),
                        'desc' => '<div class="alert alert-info">'.
                            $this->getTranSlator()->trans('1. To translate the theme, you need to generate translation files first.', array(), 'Modules.Stxlfgenerator.Admin').'<br/>'.
                            $this->getTranSlator()->trans('2. After generating translation files, please go to BO > "International" > "Translations" page > "Modify translations" section to translate the theme.', array(), 'Modules.Stxlfgenerator.Admin').'<br/>'.
                            $this->getTranSlator()->trans('3. To translate the front office, locate to "Shop" > "Theme" > "%theme%".', array('%theme%'=>$this->theme), 'Modules.Stxlfgenerator.Admin').'<br/>'.
                            $this->getTranSlator()->trans('4. To translate the back office, locate to "Admin" > "Theme" > "%theme%" and "Modules" > "St".', array('%theme%'=>$this->theme), 'Modules.Stxlfgenerator.Admin').'<br/>'.
                            $this->getTranSlator()->trans('5. Please don\'t modify translation files manually, your modifications will be overridden when regenerating them.', array(), 'Modules.Stxlfgenerator.Admin').
                            $this->getTranSlator()->trans('6. Refer to the Documentation > "Translation" for more info.', array(), 'Modules.Stxlfgenerator.Admin').
                        '</div>'
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->getTranSlator()->trans('Type of translation:', array(), 'Modules.Stxlfgenerator.Admin'),
                        'name' => 'type',
                        'options' => array(
                            'query' => array(
                                array('id' => 0, 'name' => $this->getTranSlator()->trans('Front office only', array(), 'Modules.Stxlfgenerator.Admin')),
                                array('id' => 1, 'name' => $this->getTranSlator()->trans('Front office + backoffice', array(), 'Modules.Stxlfgenerator.Admin')),
                            ),
                            'id' => 'id',
                            'name' => 'name',
                        ),
                        'desc' => '<div class="alert alert-info">'.
                            $this->getTranSlator()->trans('It is recommended to generate translation files for the front office only, because generally we do not need to translate the back office, anthor reason is that the back office has 2000+ phrases, way better more than the front office\'s 300+ phrases, those 2000+ phrases would slow the translation page down', array(), 'Modules.Stxlfgenerator.Admin').
                            '</div>'
                    ),
    			),
    			'submit' => array(
    				'title' => $this->getTranSlator()->trans('Generate', array(), 'Modules.Stxlfgenerator.Admin'),
    			)
    		);
        } else {
            $themes = (new ThemeManagerBuilder($this->context, Db::getInstance()))
                    ->buildRepository()
                    ->getList();
            foreach($themes AS $theme) {
                $array['id'] = $theme->getName();
                $array['name'] = $theme->get('display_name');
                $themes_array[] = $array;
            }
    		$this->fields_form[0]['form'] = array(
    			'legend' => array(
    				'title' => $this->getTranSlator()->trans('Xliff generator', array(), 'Modules.Stxlfgenerator.Admin'),
    				'icon' => 'icon-cogs'
    			),
    			'input' => array(
                    array(
                        'type' => 'select',
                        'label' => $this->getTranSlator()->trans('Select theme:', array(), 'Modules.Stxlfgenerator.Admin'),
                        'name' => 'theme',
                        'options' => array(
                            'query' => $themes_array,
                            'id' => 'id',
                            'name' => 'name',
                            'default' => array(
                                'value' => '',
                                'label' => 'Select theme',
                            ),
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->getTranSlator()->trans('Theme module:', array(), 'Modules.Stxlfgenerator.Admin'),
                        'name' => 'theme_module',
                        'default_value' => 0,
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'theme_module_on',
                                'value' => 1,
                                'label' => $this->getTranSlator()->trans('Yes', array(), 'Modules.Stxlfgenerator.Admin')),
                            array(
                                'id' => 'theme_module_off',
                                'value' => 0,
                                'label' => $this->getTranSlator()->trans('No', array(), 'Modules.Stxlfgenerator.Admin')),
                        ),
                        'validation' => 'isBool',
                        'desc' => $this->getTranSlator()->trans('Whether export the translations in /themes/theme_name/modules folder, generally, it no need.', array(), 'Modules.Stxlfgenerator.Admin'),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->getTranSlator()->trans('Check missing:', array(), 'Modules.Stxlfgenerator.Admin'),
                        'name' => 'check_missing',
                        'default_value' => 0,
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'check_missing_on',
                                'value' => 1,
                                'label' => $this->getTranSlator()->trans('Yes', array(), 'Modules.Stxlfgenerator.Admin')),
                            array(
                                'id' => 'check_missing_off',
                                'value' => 0,
                                'label' => $this->getTranSlator()->trans('No', array(), 'Modules.Stxlfgenerator.Admin')),
                        ),
                        'validation' => 'isBool',
                        'desc' => $this->getTranSlator()->trans('Just to check whether there are any translations missed.', array(), 'Modules.Stxlfgenerator.Admin'),
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->getTranSlator()->trans('Target language:', array(), 'Modules.Stxlfgenerator.Admin'),
                        'name' => 'locale',
                        'options' => array(
                            'query' => $languages,
                            'id' => 'id',
                            'name' => 'name',
                        ),
                        'desc' => $this->getTranSlator()->trans('Source langue is "en-US".', array(), 'Modules.Stxlfgenerator.Admin')
                    ),
                    array(
    					'type' => 'checkbox',
    					'label' => $this->getTranSlator()->trans('Modules', array(), 'Modules.Stxlfgenerator.Admin'),
    					'name' => 'module',
    					'values' => array(
    						'query' => self::$modules,
    						'id' => 'id',
    						'name' => 'name'
    					)
    				),
    			),
    			'submit' => array(
    				'title' => $this->getTranSlator()->trans('Generate', array(), 'Modules.Stxlfgenerator.Admin'),
    			)
    		);    
        }
		$helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->module = $this;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'generatefiles';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);

		return $helper->generateForm($this->fields_form);
	}
	
	public function getConfigFieldsValues()
	{		
		$fields_values = array(
			'theme' => '',
			'theme_module' => '',
            'locale' => '',
			'module' => '',
            'type' => 0,
            'check_missing' => 0,
		);
        foreach(self::$modules AS $value)
        {
            $fields_values['module_'.$value['id']] = $value['val'];
        }
        
        return $fields_values;
	}

}
