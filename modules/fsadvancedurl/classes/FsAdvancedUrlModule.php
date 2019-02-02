<?php
/**
 *  2017 ModuleFactory.co
 *
 *  @author    ModuleFactory.co <info@modulefactory.co>
 *  @copyright 2017 ModuleFactory.co
 *  @license   ModuleFactory.co Commercial License
 */

class FsAdvancedUrlModule extends Module
{
    /**
     * @var bool
     */
    protected $debug_mode_enabled = false;

    /**
     * @var array
     */
    protected $register_hooks = array();

    /**
     * @var bool
     */
    private static $smarty_registered = false;

    /**
     * @var bool
     */
    private static $compatibility_warning_done = array();

    /**
     * @var bool
     */
    public $show_developed_by = true;

    /**
     * @var string
     */
    public $tab_section;

    /**
     * @var array
     */
    protected $default_config = array();

    /**
     * @var array
     */
    protected $front_config = null;


    /**
     * construct
     */
    public function __construct()
    {
        $this->bootstrap = true;
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
        $this->debug_mode_enabled = (bool)Tools::isSubmit('debug');

        parent::__construct();

        if (!self::$smarty_registered) {
            $context = Context::getContext();
            smartyRegisterFunction(
                $context->smarty,
                'modifier',
                'fsauCorrectTheMess',
                array('FsAdvancedUrlTools', 'unescapeSmarty'),
                false
            );
            smartyRegisterFunction(
                $context->smarty,
                'modifier',
                'fsauJsonEncode',
                array('FsAdvancedUrlModule', 'jsonEncodeStatic'),
                false
            );
            smartyRegisterFunction(
                $context->smarty,
                'block',
                'fsauMinifyCss',
                array('FsAdvancedUrlTools', 'minifyCss'),
                false
            );
            if ($this->isPs15()) {
                $context->smarty->registerPlugin(
                    'block',
                    'fsauMinifyCss',
                    array('FsAdvancedUrlTools', 'minifyCss')
                );
            }
            self::$smarty_registered = true;
        }
    }

    /**
     * @return bool
     */
    public function install()
    {
        $return = parent::install();
        if (count($this->register_hooks) > 0) {
            foreach ($this->register_hooks as $register_hook) {
                $return = $return && $this->registerHook($register_hook);
            }
        }

        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }

        if ($this->getDefaultConfig()) {
            foreach ($this->getDefaultConfig() as $key => $value) {
                $return = $return && Configuration::updateValue($key, $value, true);
            }
        }

        return $return;
    }

    /**
     * @return bool
     */
    public function uninstall()
    {
        $return = parent::uninstall();
        if ($this->getDefaultConfig()) {
            foreach ($this->getConfigKeys() as $key) {
                $return = $return && Configuration::deleteByName($key);
            }
        }

        return $return;
    }

    /**
     * @return string
     */
    public function url()
    {
        $url = $this->context->link->getAdminLink('AdminModules').'&configure='.$this->name;
        if ($this->isPsMin17()) {
            return $url;
        }
        return FsAdvancedUrlTools::baseUrl().$url;
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->context->shop->getBaseURL(true);
    }

    /**
     * @return string
     */
    public function getModuleBaseUrl()
    {
        return $this->context->shop->getBaseURL(true).'modules/'.$this->name.'/';
    }

    /**
     * @param $controller
     * @param array $params
     * @return string
     */
    public function getAdminAjaxUrl($controller, $params = array())
    {
        $context = Context::getContext();
        $params_string = '';
        if ($params) {
            $params_string .= '&'.http_build_query($params);
        }
        $url = $context->link->getAdminLink($controller).$params_string;
        if ($this->isPsMin17()) {
            return $url;
        }
        return FsAdvancedUrlTools::baseUrl().$url;
    }

    /**
     * @param $template_path
     * @param $new_fetcher
     *
     * Relative path to from the module templates path
     * @return string
     */
    public function smartyFetch($template_path, $new_fetcher = false)
    {
        $this->smartyAssign(array(
            'is_ps_15' => $this->isPs15(),
            'is_ps_min_16' => $this->isPsMin16(),
            'is_ps_16' => $this->isPs16(),
            'is_ps_min_17' => $this->isPsMin17(),
            'module_base_url' => $this->getModuleBaseUrl(),
            'debug_mode_enabled' => $this->debug_mode_enabled
        ));

        if ($new_fetcher) {
            return $this->fetch('module:'.$this->name.'/views/templates/'.$template_path);
        }

        return $this->context->smarty->fetch($this->local_path.'/views/templates/'.$template_path);
    }

    /**
     * @param $var
     */
    public function smartyAssign($var)
    {
        $this->context->smarty->assign($var);
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->_path;
    }

    /**
     * @param $css_file
     * @param string $screen
     */
    public function addCSS($css_file, $screen = 'all')
    {
        $this->context->controller->addCSS($this->getPath().'views/css/'.$css_file, $screen);
    }

    /**
     * @param $js_file
     */
    public function addJS($js_file)
    {
        $this->context->controller->addJS($this->getPath().'views/js/'.$js_file);
    }

    /**
     * @param $module_name
     * @param string $min_version
     * @param bool $show_admin_error
     * @return bool
     */
    public function canUseModule($module_name, $min_version = '0.0.0', $show_admin_error = true)
    {
        if (Module::isEnabled($module_name)) {
            $m = Module::getInstanceByName($module_name);
            if (version_compare($m->version, $min_version, '>=')) {
                return true;
            }

            if (isset($this->context->controller) && $show_admin_error &&
                $this->context->controller instanceof AdminController &&
                !isset(self::$compatibility_warning_done[$module_name])) {
                $this->context->controller->warnings[] = sprintf(
                    $this->l(implode(' ', array(
                        'The "%s" module is installed,',
                        'but need to be updated to at least version "%s"',
                        'to able to use it\'s extending features.'
                    ))),
                    $m->displayName,
                    $min_version
                );
                self::$compatibility_warning_done[$module_name] = true;
            }
        }
        return false;
    }

    /**
     * @param $id
     * @param $filter_fields
     * @param $default_order_by
     * @param string $tab_section
     * @return array
     */
    protected function setFilterToCookie($id, $filter_fields, $default_order_by, $tab_section = '')
    {
        $pagination_default = 50;
        if ($this->isPs15()) {
            $pagination_default = 20;
        }

        $filter = array(
            'page' => Tools::getValue('submitFilter'.$id, 1),
            'limit' => Tools::getValue($id.'_pagination', $pagination_default),
            'order_by' => Tools::getValue($id.'Orderby', $default_order_by),
            'order_way' => Tools::strtoupper(Tools::getValue($id.'Orderway', 'ASC')),
        );

        foreach ($filter_fields as $filter_field) {
            $filter[$filter_field] = Tools::getValue($id.'Filter_'.$filter_field, '');
        }

        if (!$filter['page']) {
            $filter['page'] = 1;
        }

        if (Tools::isSubmit('submitReset'.$id)) {
            foreach ($filter_fields as $filter_field) {
                $filter[$filter_field] = '';
            }
            $filter['page'] = 1;
            $filter['limit'] = Tools::getValue($id.'_pagination', $pagination_default);
        }

        foreach ($filter_fields as $filter_field) {
            $cookie_field_name = $id.'Filter_'.$filter_field;
            $this->context->cookie->$cookie_field_name = $filter[$filter_field];
        }

        $cookie_field_name = $id.'Orderby';
        $this->context->cookie->$cookie_field_name = $filter['order_by'];
        $cookie_field_name = $id.'Orderway';
        $this->context->cookie->$cookie_field_name = $filter['order_way'];

        if (Tools::isSubmit('submitReset'.$id)) {
            FsAdvancedUrlTools::redirect($this->url().'&tab_section='.$tab_section);
        }

        if (Tools::isSubmit('submitFilter'.$id)) {
            $this->tab_section = $tab_section;
        }

        return $filter;
    }

    /**
     * @return array
     */
    public function getFrontConfig()
    {
        if ($this->front_config === null) {
            $id_shop = $this->context->shop->id;
            $id_shop_group = $this->context->shop->id_shop_group;
            $id_language = $this->context->language->id;
            $this->front_config = Configuration::getMultiple(
                $this->getConfigKeys(),
                null,
                $id_shop_group,
                $id_shop
            );
            if ($this->getMultilangualConfigKeys()) {
                foreach ($this->getMultilangualConfigKeys() as $multilang_option_key) {
                    $this->front_config[$multilang_option_key] = Configuration::get(
                        $multilang_option_key,
                        $id_language,
                        $id_shop_group,
                        $id_shop
                    );
                }
            }
        }
        return $this->front_config;
    }

    /**
     * @return array
     */
    public function getDefaultConfig()
    {
        return $this->default_config;
    }

    /**
     * @param string $default_value
     * @return array
     */
    public function generateMultilangualFields($default_value = '')
    {
        $multilangual_fields = array();
        $languages = Language::getLanguages(false);
        foreach ($languages as $language) {
            $multilangual_fields[$language['id_lang']] = $default_value;
        }

        return $multilangual_fields;
    }

    /**
     * @param $key
     * @param null $id_shop_group
     * @param null $id_shop
     * @return array
     */
    public function getMultilangualConfiguration($key, $id_shop_group = null, $id_shop = null)
    {
        $languages = Language::getLanguages(false);
        $results_array = array();
        foreach ($languages as $language) {
            $results_array[$language['id_lang']] = Configuration::get(
                $key,
                $language['id_lang'],
                $id_shop_group,
                $id_shop
            );
        }
        return $results_array;
    }

    /**
     * @param $key
     * @param string $default
     * @return array
     */
    public function getMultilangualValue($key, $default = '')
    {
        $languages = Language::getLanguages(false);
        $results_array = array();
        foreach ($languages as $language) {
            $results_array[$language['id_lang']] = Tools::getValue($key.'_'.$language['id_lang'], $default);
        }
        return $results_array;
    }

    /**
     * @return array
     */
    public function getConfigKeys()
    {
        return array_keys($this->getDefaultConfig());
    }

    /**
     * @return array
     */
    public function getMultilangualConfigKeys()
    {
        $multilangual_option_keys = array();
        foreach ($this->getDefaultConfig() as $key => $value) {
            if (is_array($value)) {
                $multilangual_option_keys[] = $key;
            }
        }
        return $multilangual_option_keys;
    }

    /**
     * @return array
     */
    public function getLanguagesForForm()
    {
        $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
        $languages = array();
        foreach (Language::getLanguages(false) as $lang) {
            $languages[] = array(
                'id_lang' => $lang['id_lang'],
                'iso_code' => $lang['iso_code'],
                'name' => $lang['name'],
                'is_default' => ($default_lang == $lang['id_lang'] ? 1 : 0)
            );
        }
        return $languages;
    }

    /**
     * @param $classname
     * @return bool|Collection|PrestaShopCollection
     */
    public function getCollection($classname)
    {
        if ($this->isPs15()) {
            return new Collection($classname);
        }

        if ($this->isPsMin16()) {
            return new PrestaShopCollection($classname);
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isEuAdvancedFormEnabled()
    {
        if (Module::isEnabled('advancedeucompliance')) {
            return (bool)Configuration::get('AEUC_FEAT_ADV_PAYMENT_API');
        }
        return false;
    }

    /**
     * @param $table_name
     * @return bool
     */
    protected function dropTable($table_name)
    {
        return (bool)Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.pSQL($table_name).'`');
    }

    /**
     * @param $table
     * @param $column
     * @return bool
     */
    public function hasDbTableIndex($table, $column)
    {
        $indexes = Db::getInstance()->executeS('SHOW INDEXES FROM `'._DB_PREFIX_.pSQL($table).'`');
        if ($indexes) {
            foreach ($indexes as $index) {
                if ($index['Column_name'] == $column) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * @param $table
     * @param $column
     * @return bool
     */
    public function addDbTableIndex($table, $column)
    {
        return Db::getInstance()->execute(
            'ALTER TABLE `'._DB_PREFIX_.pSQL($table).'` ADD INDEX (`'.pSQL($column).'`)'
        );
    }

    /**
     * @return bool
     */
    public function isPs15()
    {
        return self::isPs15Static();
    }

    /**
     * @return bool
     */
    public static function isPs15Static()
    {
        return version_compare(_PS_VERSION_, '1.5.0.0', '>=') &&
        version_compare(_PS_VERSION_, '1.6.0.0', '<');
    }

    /**
     * @return bool
     */
    public function isPsMin16()
    {
        return self::isPsMin16Static();
    }

    /**
     * @return bool
     */
    public static function isPsMin16Static()
    {
        return version_compare(_PS_VERSION_, '1.6.0.0', '>=');
    }

    /**
     * @return bool
     */
    public function isPs16()
    {
        return self::isPs16Static();
    }

    /**
     * @return bool
     */
    public static function isPs16Static()
    {
        return version_compare(_PS_VERSION_, '1.6.0.0', '>=') &&
        version_compare(_PS_VERSION_, '1.7.0.0', '<');
    }

    /**
     * @return bool
     */
    public function isPsMin17()
    {
        return self::isPsMin17Static();
    }

    /**
     * @return bool
     */
    public static function isPsMin17Static()
    {
        return version_compare(_PS_VERSION_, '1.7.0.0', '>=');
    }

    /**
     * @param $data
     * @return string
     */
    public function jsonEncode($data)
    {
        return self::jsonEncodeStatic($data);
    }

    /**
     * @param $data
     * @return string
     */
    public static function jsonEncodeStatic($data)
    {
        if (self::isPsMin17Static()) {
            return json_encode($data);
        }
        return Tools::jsonEncode($data);
    }

    /**
     * @param $data
     * @param bool $assoc
     * @return array|mixed
     */
    public function jsonDecode($data, $assoc = false)
    {
        return self::jsonDecodeStatic($data, $assoc);
    }

    /**
     * @param $data
     * @param bool $assoc
     * @return array|mixed
     */
    public static function jsonDecodeStatic($data, $assoc = false)
    {
        if (self::isPsMin17Static()) {
            return json_decode($data, $assoc);
        }
        return Tools::jsonDecode($data, $assoc);
    }

    public function doNothing($param)
    {
        $this->smartyAssign(array('fsau_do_nothing' => sha1($this->jsonEncode($param))));
    }
}
