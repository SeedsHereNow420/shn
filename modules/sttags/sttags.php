<?php
/*
* 2007-2017 PrestaShop
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

class StTags extends Module implements WidgetInterface
{
    private $templateFile;
    public static $wide_map = array(
        array('id'=>'1', 'name'=>'1/12'),
        array('id'=>'1-2', 'name'=>'1.2/12'),
        array('id'=>'1-5', 'name'=>'1.5/12'),
        array('id'=>'2', 'name'=>'2/12'),
        array('id'=>'2-4', 'name'=>'2.4/12'),
        array('id'=>'4', 'name'=>'4/12'),
        array('id'=>'5', 'name'=>'5/12'),
        array('id'=>'6', 'name'=>'6/12'),
        array('id'=>'7', 'name'=>'7/12'),
        array('id'=>'8', 'name'=>'8/12'),
        array('id'=>'9', 'name'=>'9/12'),
        array('id'=>'10', 'name'=>'10/12'),
        array('id'=>'11', 'name'=>'11/12'),
        array('id'=>'12', 'name'=>'12/12'),
    );
    private $_hooks = array();
    function __construct()
    {
        $this->name = 'sttags';
        $this->tab = 'front_office_features';
        $this->version = '1.2.2';
        $this->author = 'SUNNYTOO.COM';
        $this->need_instance = 0;

        $this->bootstrap = true;
        parent::__construct();
        
        $this->initHookArray(); 

        $this->displayName = $this->getTranslator()->trans('Tags block', array(), 'Modules.Sttags.Admin');
        $this->description = $this->getTranslator()->trans('Adds a block containing your product tags.', array(), 'Modules.Sttags.Admin');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->templateFile = array(
                'module:sttags/views/templates/hook/sttags.tpl',
                'module:sttags/views/templates/hook/sttags-footer.tpl'
            );
    }
    
    private function initHookArray()
    {
        $this->_hooks = array(
            'Hooks' => array(
                array(
                    'id' => 'displayLeftColumn',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Left column except the produt page', array(), 'Admin.Theme.Transformer'),
                    'is_column' => 1,
                ),
                array(
                    'id' => 'displayRightColumn',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Right column except the produt page', array(), 'Admin.Theme.Transformer'),
                    'is_column' => 1,
                ),
                array(
                    'id' => 'displayLeftColumnProduct',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Left column on the product page only', array(), 'Admin.Theme.Transformer'),
                    'is_column' => 1,
                ),
                array(
                    'id' => 'displayRightColumnProduct',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Right column on the product page only', array(), 'Admin.Theme.Transformer'),
                    'is_column' => 1,
                ),
                array(
                    'id' => 'displayProductRightColumn',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Product Right column', array(), 'Admin.Theme.Transformer'),
                    'is_column' => 1,
                ),
                array(
                    'id' => 'displayStackedFooter1',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Stacked footer 1', array(), 'Admin.Theme.Transformer'),
                    'is_footer' => 1,
                    'is_stacked_footer'=>1,
                ),
                array(
                    'id' => 'displayStackedFooter2',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Stacked footer 2', array(), 'Admin.Theme.Transformer'),
                    'is_footer' => 1,
                    'is_stacked_footer'=>1,
                ),
                array(
                    'id' => 'displayStackedFooter3',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Stacked footer 3', array(), 'Admin.Theme.Transformer'),
                    'is_footer' => 1,
                    'is_stacked_footer'=>1,
                ),
                array(
                    'id' => 'displayStackedFooter4',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Stacked footer 4', array(), 'Admin.Theme.Transformer'),
                    'is_footer' => 1,
                    'is_stacked_footer'=>1,
                ),
                array(
                    'id' => 'displayStackedFooter5',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Stacked footer 5', array(), 'Admin.Theme.Transformer'),
                    'is_footer' => 1,
                    'is_stacked_footer'=>1,
                ),
                array(
                    'id' => 'displayStackedFooter6',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Stacked footer 6', array(), 'Admin.Theme.Transformer'),
                    'is_footer' => 1,
                    'is_stacked_footer'=>1,
                ),
                array(
                    'id' => 'displayFooter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Footer', array(), 'Admin.Theme.Transformer'),
                    'is_footer' => 1,
                ),
                array(
                    'id' => 'displayFooterAfter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Footer after', array(), 'Admin.Theme.Transformer'),
                    'is_footer' => 1,
                )
            )
        );
    }
    
    private function saveHook()
    {
        foreach($this->_hooks AS $key => $values)
        {
            if (!$key)
                continue;
            foreach($values AS $value)
            {
                $id_hook = Hook::getIdByName($value['id']);
                
                if (Tools::getValue($key.'_'.$value['id']))
                {
                    if ($id_hook && Hook::getModulesFromHook($id_hook, $this->id))
                        continue;
                    if (!$this->isHookableOn($value['id']))
                        $this->validation_errors[] = $this->getTranslator()->trans('This module cannot be transplanted to ', array(), 'Admin.Theme.Transformer').$value['id'];
                    else
                        $rs = $this->registerHook($value['id'], Shop::getContextListShopID());
                }
                else
                {
                    if($id_hook && Hook::getModulesFromHook($id_hook, $this->id))
                    {
                        $this->unregisterHook($id_hook, Shop::getContextListShopID());
                        $this->unregisterExceptions($id_hook, Shop::getContextListShopID());
                    } 
                }
            }
        }
        // clear module cache to apply new data.
        Cache::clean('hook_module_list');
    }

    function install()
    {
        $success = (parent::install() 
            && Configuration::updateValue('BLOCKTAGS_NBR', 6) 
            && Configuration::updateValue('BLOCKTAGS_MAX_LEVEL', 3)
            && Configuration::updateValue('BLOCKTAGS_WIDE_ON_FOOTER', '2-4')
            && Configuration::updateValue('BLOCKTAGS_ALIGN', 0)
            && Configuration::updateValue('BLOCKTAGS_TITLE', 0)
        );
        return $success;
    }
    
    public function getContent()
    {
        $output = '';
        $errors = array();
        if (Tools::isSubmit('submitBlockTags'))
        {
            $tagsNbr = Tools::getValue('blocktags_nbr');
            $tagsLevels = Tools::getValue('blocktags_max_level');                          

            Configuration::updateValue('BLOCKTAGS_NBR', $tagsNbr ? (int)$tagsNbr : 10);
            Configuration::updateValue('BLOCKTAGS_MAX_LEVEL', $tagsLevels ? (int)$tagsLevels : 3);
            Configuration::updateValue('BLOCKTAGS_WIDE_ON_FOOTER', Tools::getValue('blocktags_wide_on_footer'));
            Configuration::updateValue('BLOCKTAGS_ALIGN', (int)Tools::getValue('blocktags_align'));
            Configuration::updateValue('BLOCKTAGS_TITLE', (int)Tools::getValue('blocktags_title'));
            
            $this->saveHook();

            $output = $this->displayConfirmation($this->getTranslator()->trans('Settings updated', array(), 'Admin.Theme.Transformer'));
        }
        return $output.$this->renderForm();
    }
    
    public function renderForm()
    {
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Displayed tags', array(), 'Modules.Sttags.Admin'),
                    'name' => 'blocktags_nbr',
                    'class' => 'fixed-width-xs',
                    'default_value' => 10,
                    'desc' => $this->getTranslator()->trans('Set the number of tags you would like to see displayed in this block. (default: 10)', array(), 'Modules.Sttags.Admin')
                    ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Tag levels', array(), 'Modules.Sttags.Admin'),
                    'name' => 'blocktags_max_level',
                    'class' => 'fixed-width-xs',
                    'default_value' => 3,
                    'desc' => $this->getTranslator()->trans('Set the number of different tag levels you would like to use. (default: 3)', array(), 'Modules.Sttags.Admin')
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Title:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'blocktags_title',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'text_align_left',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'text_align_center',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'text_align_right',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'text_align_none',
                            'value' => 3,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Alignment:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'blocktags_align',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'text_align_left',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'text_align_center',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'text_align_right',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
                    ),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Wide on footer:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'blocktags_wide_on_footer',
                    'options' => array(
                        'query' => self::$wide_map,
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => 3,
                            'label' => '3/12',
                        ),
                    ),
                    'desc' => $this->getTranslator()->trans('Does not work for Stacked footers', array(), 'Modules.Sttags.Admin'),
                ),
            ),
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer'),
            )
        );
        
        $this->fields_form[1]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Hook manager', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'description' => $this->getTranslator()->trans('Check the hook that you would like this module to display on.', array(), 'Modules.Sttags.Admin').'<br/><a href="'._MODULE_DIR_.'stthemeeditor/img/hook_into_hint.jpg" target="_blank" >'.$this->getTranslator()->trans('Click here to see hook position', array(), 'Modules.Sttags.Admin').'</a>.',
            'input' => array(
            ),
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer'),
            ),
        );
        
        foreach($this->_hooks AS $key => $values)
        {
            if (!is_array($values) || !count($values))
                continue;
            $this->fields_form[1]['form']['input'][] = array(
                    'type' => 'checkbox',
                    'label' => $key,
                    'name' => $key,
                    'lang' => true,
                    'values' => array(
                        'query' => $values,
                        'id' => 'id',
                        'name' => 'name'
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
        $helper->submit_action = 'submitBlockTags';
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
            'blocktags_nbr' => (int)Configuration::get('BLOCKTAGS_NBR'),
            'blocktags_max_level' => (int)Configuration::get('BLOCKTAGS_MAX_LEVEL'),
            'blocktags_wide_on_footer' => Configuration::get('BLOCKTAGS_WIDE_ON_FOOTER'),
            'blocktags_align' => (int)Configuration::get('BLOCKTAGS_ALIGN'),
            'blocktags_title' => (int)Configuration::get('BLOCKTAGS_TITLE'),
        );
        
        foreach($this->_hooks AS $key => $values)
        {
            if (!$key)
                continue;
            foreach($values AS $value)
            {
                $fields_values[$key.'_'.$value['id']] = 0;
                if($id_hook = Hook::getIdByName($value['id']))
                    if(Hook::getModulesFromHook($id_hook, $this->id))
                        $fields_values[$key.'_'.$value['id']] = 1;
            }
        }
        
        return $fields_values;
    }
    
    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        $tags = Tag::getMainTags((int)($this->context->language->id), (int)(Configuration::get('BLOCKTAGS_NBR')));
        
        $max = -1;
        $min = -1;
        foreach ($tags as $tag)
        {
            if ($tag['times'] > $max)
                $max = $tag['times'];
            if ($tag['times'] < $min || $min == -1)
                $min = $tag['times'];
        }
        
        if ($min == $max)
            $coef = $max;
        else
        {
            $coef = (Configuration::get('BLOCKTAGS_MAX_LEVEL') - 1) / ($max - $min);
        }
        
        if (sizeof($tags))
        {
            foreach ($tags AS $key => &$tag)
            {
                $tag['class'] = 'tag_level'.(int)(($tag['times'] - $min) * $coef + 1);
                if (!$tag['name'])
                    unset($tags[$key]);
            }
                
        }
        return array(
            'tags' => $tags,
            'blocktags_wide_on_footer' => Configuration::get('BLOCKTAGS_WIDE_ON_FOOTER'),
            'blocktags_align' => (int)Configuration::get('BLOCKTAGS_ALIGN'),
            'blocktags_title' => (int)Configuration::get('BLOCKTAGS_TITLE'),
        );

    }
    
    public function renderWidget($hookName = null, array $configuration = [])
    {
        //
        $is_footer = $is_stacked_footer = $is_column = false;
        foreach($this->_hooks AS $key => $values)
        {
            if (!$key)
                continue;
            foreach($values AS $value)
            {
                if(Tools::strtolower($value['id']) == Tools::strtolower($hookName)){
                    $is_footer = isset($value['is_footer']);
                    $is_stacked_footer = isset($value['is_stacked_footer']);
                    $is_column = isset($value['is_column']);
                    break;                        
                }
            }
            if ($is_footer || $is_column) {
                break;
            }
        }
        //

        $this->smarty->assign(array(
            'is_footer' => $is_footer,
            'is_stacked_footer' => $is_stacked_footer,
            'is_column' => $is_column,
        ));

        if (!$this->isCached($is_footer ? $this->templateFile[1] : $this->templateFile[0], $this->getCacheId('sttags'))) {
            $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));
        }

        return $this->fetch($is_footer ? $this->templateFile[1] : $this->templateFile[0], $this->getCacheId('sttags'));
    }
    public function get_prefix()
    {
        return 'BLOCKTAGS_';
    }
}
