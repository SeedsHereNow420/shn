<?php
/**
* 2010-2017 Webkul.
*
* NOTICE OF LICENSE
*
* All right is reserved,
* Please go through this link for complete license : https://store.webkul.com/license.html
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade this module to newer
* versions in the future. If you wish to customize this module for your
* needs please refer to https://store.webkul.com/customisation-guidelines/ for more information.
*
*  @author    Webkul IN <support@webkul.com>
*  @copyright 2010-2017 Webkul IN
*  @license   https://store.webkul.com/license.html
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once dirname(__FILE__).'/classes/NewsTicker.php';

class WkNewsTicker extends Module
{
    const _INSTALL_SQL_FILE_ = 'install.sql';

    private $errors = array();
    public $smartyVal = array();

    public function __construct()
    {
        $this->name = "wknewsticker";
        $this->tab = "advertising_marketing";
        $this->version = '4.0.0';
        $this->author = 'Webkul';
        $this->need_instance = 0;
        $this->ps_version_compliancy = array('
			min' => '1.7', 'max' => _PS_VERSION_
        );
        $this->bootstrap = true;

        parent::__construct();
        $this->displayName = $this->l('News Ticker Block');
        $this->description = $this->l('Display important news heading.');
        $this->confirmUninstall = $this->l('Are you sure?');
    }

    /**
     * getContent get the data and validate it by calling validation function
     * save the data
     * @return array returns error to display on render form
     */
    public function getContent()
    {
        $this->_html = '';
        if (Tools::isSubmit('submitWkNewsTickerModule')) {
            $this->postValidation();
            if (empty($this->errors)) {
                $this->postProcess();
            }
            foreach ($this->errors as $err) {
                $this->_html .= $this->displayError($err);
            }
        }

        return $this->_html.$this->renderForm();
    }

    /**
     * generate form for configuration by using helper class generateForm function
     * @return array Confiruration fields
     */
    protected function renderForm()
    {
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitWkNewsTickerModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($this->getConfigForm()));
    }

    /**
     * getConfigForm set the fields of render form
     * @return array Render form fields
     */
    protected function getConfigForm()
    {
        $listTickerPosition = array(
            array('id' => 'top', 'name' => $this->l('Top')),
            array('id' => 'bottom', 'name' => $this->l('Bottom')),
        );
        $listDisplayPage = array(
            array('id' => 'home', 'name' => $this->l('Home')),
            array('id' => 'fullwebsite', 'name' => $this->l('All Pages')),
        );

        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                    'icon' => 'icon-cogs',
                ),
                'input' => array(
                    array(
                        'type' => 'select',
                        'label' => $this->l('Display Page'),
                        'name' => 'WK_NT_DISPLAY_PAGE',
                        'options' => array(
                            'query' => $listDisplayPage,
                            'id' => 'id',
                            'name' => 'name'
                        ),
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->l('Ticker Position'),
                        'name' => 'WK_NT_POSITION',
                        'options' => array(
                            'query' => $listTickerPosition,
                            'id' => 'id',
                            'name' => 'name'
                        ),
                    ),
                    array(
                        'col' => 2,
                        'type' => 'text',
                        'desc' => $this->l('Set the font size of ticker.'),
                        'name' => 'WK_NT_FONT_SIZE',
                        'required' => 'true',
                        'label' => $this->l('Font Size'),
                        'hint' => $this->l('You can set the size as 15, 20, 22'),
                    ),
                    array(
                        'col' => 2,
                        'type' => 'text',
                        'desc' => $this->l('Set the speed of ticker.'),
                        'name' => 'WK_NT_SPEED',
                        'required' => 'true',
                        'label' => $this->l('Ticker Movement Speed'),
                        'hint' => $this->l('Set the movement speed in miliseconds. For Example - 1500 and 10000. Where 1500 will faster then 10000.'),
                    ),
                    array(
                        'type' => 'color',
                        'desc' => $this->l('Set the text color of ticker.'),
                        'name' => 'WK_NT_FONT_COLOR',
                        'required' => 'true',
                        'label' => $this->l('Ticker Font Color'),
                    ),
                    array(
                        'type' => 'color',
                        'desc' => $this->l('Set the background color of ticker.'),
                        'name' => 'WK_NT_BACKGROUND',
                        'required' => 'true',
                        'label' => $this->l('Ticker Background Color'),
                    ),
                    array(
                        'type' => 'radio',
                        'label' => $this->l('Movement Direction'),
                        'name' => 'WK_NT_DIRECTION',
                        'values' => array(
                            array(
                                'id' => 'type_ltr',
                                'value' => 0,
                                'label' => 'Left to Right'
                            ),
                            array(
                                'id' => 'type_rtl',
                                'value' => 1,
                                'label' => 'Right to Left'
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Stop on hover'),
                        'name' => 'WK_NT_HOVER',
                        'is_bool' => true,
                        'desc' => $this->l('Use this to stop animation on mouse hover.'),
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }

    /**
     * getConfigFormValues get the values of configuration form
     * @return array return form values
     */
    protected function getConfigFormValues()
    {
        return array(
            'WK_NT_HOVER' => Tools::getValue('WK_NT_HOVER', Configuration::get('WK_NT_HOVER')),
            'WK_NT_SPEED' => Tools::getValue('WK_NT_SPEED', Configuration::get('WK_NT_SPEED')),
            'WK_NT_POSITION' => Tools::getValue('WK_NT_POSITION', Configuration::get('WK_NT_POSITION')),
            'WK_NT_FONT_SIZE' => Tools::getValue('WK_NT_FONT_SIZE', Configuration::get('WK_NT_FONT_SIZE')),
            'WK_NT_DIRECTION' => Tools::getValue('WK_NT_DIRECTION', Configuration::get('WK_NT_DIRECTION')),
            'WK_NT_FONT_COLOR' => Tools::getValue('WK_NT_FONT_COLOR', Configuration::get('WK_NT_FONT_COLOR')),
            'WK_NT_BACKGROUND' => Tools::getValue('WK_NT_BACKGROUND', Configuration::get('WK_NT_BACKGROUND')),
            'WK_NT_DISPLAY_PAGE' => Tools::getValue('WK_NT_DISPLAY_PAGE', Configuration::get('WK_NT_DISPLAY_PAGE')),
        );
    }

    /**
     * postValidation Validate the enter data on configuration form
     * set the corresponding errors in a array of errors
     */
    protected function postValidation()
    {
        $speed = Tools::getValue('WK_NT_SPEED');
        $fontSize = Tools::getValue('WK_NT_FONT_SIZE');
        $fontColor = Tools::getValue('WK_NT_FONT_COLOR');
        $background = Tools::getValue('WK_NT_BACKGROUND');

        if (empty($fontSize)) {
            $this->errors[] = $this->l("Font Size Rquired");
        } elseif (!Validate::isInt($fontSize) || $fontSize < 1) {
            $this->errors[] = $this->l("Only positive integer number allowed");
        }

        if (empty($speed)) {
            $this->errors[] = $this->l("Ticker Movement Speed Rquired");
        } elseif (!Validate::isInt($speed) || $speed < 1) {
            $this->errors[] = $this->l("Only integer number allowed");
        }

        if (empty($fontColor)) {
            $this->errors[] = $this->l("Ticker Text Color Rquired");
        } elseif (!preg_match('/^#[a-f0-9]{6}$/i', $fontColor)) {
            $this->errors[] = $this->l("Incorrect color value");
        }

        if (empty($background)) {
            $this->errors[] = $this->l("Ticker Background Color Rquired");
        } elseif (!preg_match('/^#[a-f0-9]{6}$/i', $background)) {
            $this->errors[] = $this->l("Incorrect color value");
        }
    }

    /**
     * postProcess update the values of render form
     */
    protected function postProcess()
    {
        $formValues = $this->getConfigFormValues();
        foreach (array_keys($formValues) as $key) {
            Configuration::updateValue($key, Tools::getValue($key));
        }
        $this->_html .= $this->displayConfirmation($this->l('Successfully Updated.'));
    }

    /**
     * Update the multilang data when add new language.
     */
    public function hookActionObjectLanguageAddAfter($params)
    {
        if ($params['object']->id) {
            //Assign all lang's main table in an ARRAY
            $langTables = array('wk_news_ticker');
            //If Admin create any new language when we do entry in module all lang tables.
            NewsTicker::insertLangIdinAllTables($params['object']->id, $langTables);
        }
    }

    /**
     * install set the configuration value by default
     * create corresponding database tables
     * register hook used in this module
     * callInstallTab function
     * @return bool if install properly return true else false
     */
    public function install()
    {
        Configuration::updateValue('WK_NT_HOVER', '1');
        Configuration::updateValue('WK_NT_SPEED', '10000');
        Configuration::updateValue('WK_NT_DIRECTION', '1');
        Configuration::updateValue('WK_NT_POSITION', 'top');
        Configuration::updateValue('WK_NT_FONT_SIZE', '15');
        Configuration::updateValue('WK_NT_DISPLAY_PAGE', 'home');
        Configuration::updateValue('WK_NT_FONT_COLOR', '#f9fffa');
        Configuration::updateValue('WK_NT_BACKGROUND', '#323232');

        if (!parent::install()
            || !$this->createTable()
            || !$this->registerHook('displayNavFullWidth')
            || !$this->registerHook('displayFooterAfter')
            || !$this->registerHook('actionObjectLanguageAddAfter')
            || !$this->registerHook('actionFrontControllerSetMedia')
            || !$this->callInstallTab()
        ) {
            return false;
        }

        return true;
    }


    /**
    * callInstallTab Install the corresponding tab by calling installTab function
     * @return true
     */
    public function callInstallTab()
    {
        $this->installTab('AdminNewsTicker', 'News Ticker', 'IMPROVE');

        return true;
    }

    /**
     * createTable create a table for this modules as define in sql file
     * @return bool if table created properly return true else false
     */
    public function createTable()
    {
        if (!file_exists(dirname(__FILE__).'/'.self::_INSTALL_SQL_FILE_)) {
            return false;
        } elseif (!$sql = Tools::file_get_contents(dirname(__FILE__).'/'.self::_INSTALL_SQL_FILE_)) {
            return false;
        }
        $sql = str_replace(array('PREFIX_',  'ENGINE_TYPE'), array(_DB_PREFIX_, _MYSQL_ENGINE_), $sql);
        $sql = preg_split("/;\s*[\r\n]+/", $sql);
        foreach ($sql as $query) {
            if ($query) {
                if (!Db::getInstance()->execute(trim($query))) {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     *installTab install the tab by its parameters
     * -getIdFormClassName calling function of tab class
     * @param  string  $className     class name of tab
     * @param  string  $tabName
     * @param  boolean $tabParentName
     * @return int id_tab
     */
    public function installTab($className, $tabName, $tabParentName = false)
    {
        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = $className;
        $tab->name = array();
        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = $tabName;
        }
        if ($tabParentName) {
            $tab->id_parent = (int) Tab::getIdFromClassName($tabParentName);
        } else {
            $tab->id_parent = 0;
        }
        $tab->module = $this->name;

        return $tab->add();
    }

    /**
     * uninstall uninstalling tabs and delete the tables by calling its functions
     * @return bool
     */
    public function uninstall()
    {
        if (!parent::uninstall()
            || !$this->calluninstallTab()
            || !$this->deleteTables()) {
            return false;
        }

        return true;
    }

    /**
     * calluninstallTab call the uninstallTab function
     * pass class name of tab as arguments
     * @return true
     */
    public function calluninstallTab()
    {
        $this->uninstallTab('AdminNewsTicker');

        return true;
    }

    /**
     * uninstallTab uninstall the tab by class name
     * @param  string $class_name tab class name
     * @return type
     */
    public function uninstallTab($class_name)
    {
        $id_tab = (int)Tab::getIdFromClassName($class_name);
        if ($id_tab) {
            $tab = new Tab($id_tab);

            return $tab->delete();
        }

        return false;
    }

    /**
     * delete the tables if already exists in database
     * @return array
     */
    protected function deleteTables()
    {
        return Db::getInstance()->execute('
            DROP TABLE IF EXISTS
            `'._DB_PREFIX_.'wk_news_ticker`,
           `'._DB_PREFIX_.'wk_news_ticker_lang`;
        ');
    }


    /**
     * hookDisplayTop set the values of smarty variables
     * add js file
     * add css file
     * @return tpl
     */
    public function hookDisplayNavFullWidth()
    {
        if (Configuration::get('WK_NT_POSITION') == 'top') {
            $this->assignTplValues();
            if (Configuration::get('WK_NT_DISPLAY_PAGE') == 'home') {
                if (Tools::getValue('controller') == 'index') {
                    return $this->fetch('module:wknewsticker/views/templates/hook/ticker.tpl');
                }
            } else {
                return $this->fetch('module:wknewsticker/views/templates/hook/ticker.tpl');
            }
        }
    }

    /**
     * hookDisplayFooter set the values of smarty variables
     * add js
     * add css file
     * @return tpl
     */
    public function hookDisplayFooterAfter()
    {
        if (Configuration::get('WK_NT_POSITION') == 'bottom') {
            $this->assignTplValues();
            if (Configuration::get('WK_NT_DISPLAY_PAGE') == 'home') {
                if (Tools::getValue('controller') == 'index') {
                    return $this->fetch('module:wknewsticker/views/templates/hook/ticker.tpl');
                }
            } else {
                return $this->fetch('module:wknewsticker/views/templates/hook/ticker.tpl');
            }
        }
    }

    /**
     * set media for display hooks
     * @return [type] [description]
     */
    public function hookActionFrontControllerSetMedia()
    {
        Media::addJsDef(
            array(
                'hover' => Configuration::get('WK_NT_HOVER'),
                'speed' => Configuration::get('WK_NT_SPEED'),
                'direction' => Configuration::get('WK_NT_DIRECTION'),
            )
        );
        if (Configuration::get('WK_NT_DISPLAY_PAGE') == 'home') {
            if ('index' === $this->context->controller->php_self) {
                $this->context->controller->registerStylesheet(
                    'module-wknewsticker-tickertpl-css',
                    'modules/'.$this->name.'/views/css/ticker.css',
                    array('media' => 'all', 'priority' => 999)
                );
                $this->context->controller->registerJavascript(
                    'module-wknewsticker-tickertpl-js',
                    'modules/'.$this->name.'/views/js/ticker.js',
                    array('position' => 'bottom', 'priority' => 999)
                );
            }
        } else {
            $this->context->controller->registerStylesheet(
                'module-wknewsticker-tickertpl-css',
                'modules/'.$this->name.'/views/css/ticker.css',
                array('media' => 'all', 'priority' => 999)
            );
            $this->context->controller->registerJavascript(
                'module-wknewsticker-tickertpl-js',
                'modules/'.$this->name.'/views/js/ticker.js',
                array('position' => 'bottom', 'priority' => 999)
            );
        }
    }

    /**
     * get the data of ticker
     * assign ticker to tpl
     * @return [type] [description]
     */
    public function assignTplValues()
    {
        $idLang = $this->context->language->id;
        $objNewsTicker = new NewsTicker();
        $tickerDetail = $objNewsTicker->getTickerDetailBylangId($idLang);
        $smartyVal = array(
            'fontSize' => Configuration::get('WK_NT_FONT_SIZE'),
            'backColor' => Configuration::get('WK_NT_BACKGROUND'),
            'fontColor' => Configuration::get('WK_NT_FONT_COLOR'),
        );

        $this->context->smarty->assign('configValue', $smartyVal);
        $this->context->smarty->assign('tickerDetail', $tickerDetail);
    }
}
