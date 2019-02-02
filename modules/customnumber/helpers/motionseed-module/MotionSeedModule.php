<?php
/**
 *  motionSeed Module
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 */

class MotionSeedModule extends Module
{
    protected $html;
    protected $configurations = array();
    protected $disabled_overrides = array();
    protected $upgrade_version = null;
    
    public function __construct()
    {
        parent::__construct();
        
        $this->registerAutoLoad();
    }

    public function configure($install = true)
    {
        // Context of configure
        foreach ($this->configurations as $c) {
            if ($install) {
                if (!Configuration::updateValue($c['name'], $c['default'])) {
                    return false;
                }
            } elseif (!isset($c['keep']) || !$c['keep']) {
                Configuration::deleteByName($c['name']);
            }
        }

        $result = $this->configureDB($install) && $this->configureMenu($install) && $this->configureTemplates($install);
        
        return $result;
    }

    public function configureDB($install = true, $sql_file = null)
    {
        if (!$sql_file) {
            $sql_file = sprintf('%s/config/sql/%s.sql', $this->getLocalPath(), $install ? 'install' : 'uninstall');
        }

        if (file_exists($sql_file)) {
            $sql = str_replace(
                array('_DB_PREFIX_', '_MYSQL_ENGINE_', '_DB_NAME_'),
                array(_DB_PREFIX_, _MYSQL_ENGINE_, _DB_NAME_),
                Tools::file_get_contents($sql_file)
            );

            try {
                Db::getInstance()->execute($sql);
            } catch (Exception $e) {
                $this->_errors[] = Tools::displayError('An error occured when configuring DB');
                
                return false;
            }
        }

        return true;
    }
    
    public function upgradeDB()
    {
        $sql_file = sprintf('%s/upgrade/upgrade-%s/upgrade.sql', $this->getLocalPath(), $this->upgradeVersion());
        
        return $this->configureDB(false, $sql_file);
    }

    public function configureTemplates($install = true)
    {
        $templates_file = $this->getLocalPath() . '/config/templates.xml';

        if (file_exists($templates_file)) {
            $templates = simplexml_load_file($templates_file);

            foreach ($templates->children() as $template) {
                $tpl_file = (string) $template['file'];
                $tpl_module = null;
                $tpl_path = _PS_THEME_DIR_ . $tpl_file;
                
                if (isset($template['admin'])) {
                    $class = (string) $template['admin'];
                    
                    if (class_exists($class)) {
                        $instance = new $class();
                        
                        $bo_theme = ((Validate::isLoadedObject($this->context->employee)
                            && $this->context->employee->bo_theme) ? $this->context->employee->bo_theme : 'default');

                        if (!file_exists(
                            _PS_BO_ALL_THEMES_DIR_.$bo_theme.DIRECTORY_SEPARATOR
                            .'template'
                        )) {
                            $bo_theme = 'default';
                        }
                        
                        $tpl_path = _PS_BO_ALL_THEMES_DIR_.$bo_theme.DIRECTORY_SEPARATOR
                            .'template/' . $instance->createTemplate($tpl_file)->template_resource;
                    }
                }

                if (isset($template['module'])) {
                    $tpl_module = (string) $template['module'];
                    
                    if ($tpl_module == 'pdf') {
                        $tpl_path = static::getPdfTemplatePath($tpl_file);
                    } else {
                        $tpl_path = Module::getInstanceByName($tpl_module)->getTemplatePath($tpl_file);
                    }
                }

                if (Tools::file_exists_cache($tpl_path)) {
                    if ($install) {
                        $backup_dest = str_replace($tpl_file, $tpl_file . '.backup', $tpl_path);

                        if (defined('_PS_HOST_MODE_')) {
                            $backup_dest = $this->getLocalPath() . 'backup' . DIRECTORY_SEPARATOR . basename($tpl_path);
                        }

                        copy($tpl_path, $backup_dest);
                    }
                    
                    $content = Tools::file_get_contents($tpl_path);
                        
                    foreach ($template->pattern as $pattern) {
                        $match = $install ? (string)$pattern->match : (string)$pattern->replace;
                        $replace = $install ? (string)$pattern->replace : (string)$pattern->match;
                        $nth = isset($pattern['occurence']) ? (int)$pattern['occurence'] : false;
                    
                        $content = $this->templateReplace($match, $replace, $content, $nth);
                    }
                    
                    if (isset($template['module']) && $tpl_module == 'pdf' && defined('_PS_HOST_MODE_')) {
                        $tpl_path = _PS_THEME_DIR_ . 'pdf/' . $tpl_file . '.tpl';
                    }

                    file_put_contents($tpl_path, $content);
                }
            }

            // Clear all compiled templates
            Context::getContext()->smarty->clearCompiledTemplate();
        }

        return true;
    }

    public function addMenuItems($install, $parent, &$return, $update_lang = null, $parent_id = null)
    {
        foreach ($parent->children() as $menu) {
            $tab = new Tab(!$install ? Tab::getIdFromClassName($menu['class']) : null);

            if ($install) {
                $tab->module = $this->name;

                $tab->id_parent = is_null($parent_id) ? (
                    is_numeric($menu['parent']) ? $menu['parent'] : Tab::getIdFromClassName($menu['parent'])
                    ) : $parent_id;

                $tab->class_name = $menu['class'];
                $tab->name = $this->getTranslations((string) $menu['name'], 'menu');
            }

            if (is_null($update_lang)) {
                $return &= ($install ? $tab->add() : $tab->delete());
            } else {
                // Check if class name exists
                if ($update_lang != '' && isset($tab->class_name) && !empty($tab->class_name)) {
                    $id_lang = Language::getIdByIso($update_lang);
                    $tab->name[(int) $id_lang] = $this->getTranslations((string) $menu['name'], 'menu', $id_lang);

                    if (!Validate::isGenericName($tab->name[(int) $id_lang])) {
                        $return = false;
                    } else {
                        $tab->update();
                    }
                }
            }

            if ($return && isset($menu['parent'])) {
                if (isset($menu['position'])) {
                    $tab->updatePosition(false, $menu['position']);
                }

                $this->addMenuItems($install, $menu, $return, $update_lang, $tab->id);
            }
        }
    }

    public function configureMenu($install = true, $update_lang = null)
    {
        $return = true;

        $menus_file = $this->getLocalPath() . '/config/menus.xml';

        if (file_exists($menus_file)) {
            $menus = simplexml_load_file($menus_file);

            $this->addMenuItems($install, $menus, $return, $update_lang);
        }

        return $return;
    }

    public function registerHooks()
    {
        return $this->registerHook('actionObjectLanguageAddAfter');
    }

    protected function recurseCopy($src, $dst)
    {
        $dir = opendir($src);
        
        if (!file_exists($dst)) {
            mkdir($dst);
        }

        while (false !== ( $file = readdir($dir))) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if (is_dir($src . '/' . $file)) {
                    $this->recurseCopy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }

        closedir($dir);
    }

    protected function recurseRemove($dir)
    {
        $files = array_diff(scandir($dir), array('.', '..'));

        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? $this->recurseRemove("$dir/$file") : unlink("$dir/$file");
        }

        return rmdir($dir);
    }

    protected function swapVariables(&$x, &$y)
    {
        list($x, $y) = array($y, $x);
    }
    
    public function upgradeOverride($classname)
    {
        $result = true;

        $specific_path = sprintf('%s/upgrade/upgrade-%s/', $this->getLocalPath(), $this->upgradeVersion());

        $path = PrestaShopAutoload::getInstance()->getClassPath($classname . 'Core');

        if (Tools::file_exists_no_cache($specific_path . 'override' . DIRECTORY_SEPARATOR . $path)) {
            $this->swapVariables($specific_path, $this->local_path);
            $result &= parent::removeOverride($classname);
            $this->swapVariables($specific_path, $this->local_path);
        }

        $result &= $this->addOverride($classname);
        
        $this->flushCache();

        return true;
    }

    public function specificOverride($classname, $install = true)
    {
        static $specific_path = null;

        if (in_array($classname, $this->disabled_overrides)) {
            return true;
        }

        $method = $install ? 'addOverride' : 'removeOverride';

        if ($specific_path === null) {
            $specific_path = $version_selected = false;

            foreach (glob($this->getLocalPath() . 'specs' . DIRECTORY_SEPARATOR . '*', GLOB_ONLYDIR) as $dirname) {
                $version = basename($dirname);

                if (Tools::version_compare($version, _PS_VERSION_, '<=')
                    && (!$version_selected || Tools::version_compare($version_selected, $version))) {
                    $version_selected = $version;
                }
            }

            if ($version_selected) {
                $specific_path = $this->getLocalPath() . 'specs' . DIRECTORY_SEPARATOR
                    . $version_selected . DIRECTORY_SEPARATOR;
            }
        }

        if ($specific_path) {
            $path = PrestaShopAutoload::getInstance()->getClassPath($classname . 'Core');

            if (Tools::file_exists_no_cache($specific_path . 'override' . DIRECTORY_SEPARATOR . $path)) {
                $this->swapVariables($specific_path, $this->local_path);

                $result = parent::$method($classname);

                $this->swapVariables($specific_path, $this->local_path);

                return $result;
            }
        }

        return parent::$method($classname);
    }

    public function addOverride($classname)
    {
        return $this->specificOverride($classname, true);
    }

    public function removeOverride($classname)
    {
        return $this->specificOverride($classname, false);
    }

    public function installOverrides()
    {
        $result = parent::installOverrides();

        $paths = array(
            'views/templates/admin/override' => 'controllers/admin/templates',
            'views/templates/front/override' => 'controllers/front/templates'
        );

        foreach ($paths as $src => $path) {
            $override_src = $this->getLocalPath() . DIRECTORY_SEPARATOR . $src;
            $override_dest = _PS_ROOT_DIR_ . DIRECTORY_SEPARATOR . 'override' . DIRECTORY_SEPARATOR
                . $path . DIRECTORY_SEPARATOR . $this->name;

            if (file_exists($override_src)) {
                if (!is_dir($override_dest)) {
                    mkdir($override_dest);
                }

                if (!is_writable(dirname($override_dest))) {
                    throw new Exception(
                        sprintf(Tools::displayError('directory (%s) not writable'), dirname($override_dest))
                    );
                }

                $this->recurseCopy($override_src, $override_dest);
            }
        }

        return $result;
    }

    public function uninstallOverrides()
    {
        $result = parent::uninstallOverrides();

        $paths = array('controllers/admin/templates', 'controllers/front/templates');

        foreach ($paths as $path) {
            $override_dest = _PS_ROOT_DIR_ . DIRECTORY_SEPARATOR . 'override' . DIRECTORY_SEPARATOR
                . $path . DIRECTORY_SEPARATOR . $this->name;

            if (file_exists($override_dest)) {
                $this->recurseRemove($override_dest);
            }
        }

        return $result;
    }
    
    public function upgradeVersion($version = null)
    {
        if ($version) {
            $this->upgrade_version = $version;
        }
        
        return $this->upgrade_version;
    }

    public function check()
    {
        // Check for overrides only
        if (is_dir($this->getLocalPath() . 'override')) {
            if (!is_writeable(_PS_OVERRIDE_DIR_)) {
                $this->_errors[] = sprintf(Tools::displayError('dir (%s) not writable.'), _PS_OVERRIDE_DIR_);

                return false;
            }

            if (_PS_MODE_DEV_) {
                if ((bool) Configuration::get('PS_DISABLE_NON_NATIVE_MODULE')) {
                    Configuration::updateGlobalValue('PS_DISABLE_NON_NATIVE_MODULE', 0);
                }

                if ((bool) Configuration::get('PS_DISABLE_OVERRIDES')) {
                    Configuration::updateGlobalValue('PS_DISABLE_OVERRIDES', 0);
                }
            }
        }

        return true;
    }

    public function install()
    {
        if (!$this->check() || !parent::install() || !$this->registerHooks() || !$this->configure()) {
            return false;
        }
        
        $this->flushCache();

        return true;
    }

    public function uninstall()
    {
        if (!parent::uninstall() || !$this->configure(false)) {
            return false;
        }

        return true;
    }
    
    public function flushCache()
    {
        // Regenerate Index
        PrestaShopAutoload::getInstance()->_include_override_path = true;
        PrestaShopAutoload::getInstance()->generateIndex();
        
        // Clear cache
        Cache::getInstance()->flush();
    }
    
    public static function getPdfTemplatePath($tpl_file)
    {
        $template = false;
        $shop = new Shop((int)Context::getContext()->shop->id);
        $default_template = rtrim(_PS_PDF_DIR_, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$tpl_file.'.tpl';
        $overridden_template = _PS_ALL_THEMES_DIR_.$shop->getTheme()
            .DIRECTORY_SEPARATOR.'pdf'.DIRECTORY_SEPARATOR.$tpl_file.'.tpl';
        
        if (file_exists($overridden_template)) {
            $template = $overridden_template;
        } elseif (file_exists($default_template)) {
            $template = $default_template;
        }
        
        return $template;
    }
    
    public function registerAutoLoad()
    {
        $path = $this->getLocalPath();
        
        $paths = array(
            $path . 'classes/',
            $path . 'helpers/'
        );
        
        spl_autoload_register(function ($class) use ($paths) {
            $parts = explode('\\', $class);
            
            $class_name = array_pop($parts);
            $namespace = (count($parts) > 0) ? implode(DIRECTORY_SEPARATOR, $parts) . DIRECTORY_SEPARATOR : '';
            
            foreach ($paths as $path) {
                $class_path = sprintf('%s%s.php', $path . Tools::strtolower($namespace), $class_name);
            
                if (file_exists($class_path)) {
                    require_once $class_path;
                    
                    break;
                }
            }
        });
    }
    
    public static function cast($destination, $source_object)
    {
        if (is_string($destination)) {
            $destination = new $destination();
        }

        $source_reflection = new ReflectionObject($source_object);
        $destination_reflection = new ReflectionObject($destination);
        $source_properties = $source_reflection->getProperties();

        foreach ($source_properties as $source_property) {
            $source_property->setAccessible(true);
            $name = $source_property->getName();
            $value = $source_property->getValue($source_object);
            
            if ($destination_reflection->hasProperty($name)) {
                $prop_dest = $destination_reflection->getProperty($name);
                $prop_dest->setAccessible(true);
                $prop_dest->setValue($destination, $value);
            } else {
                $destination->$name = $value;
            }
        }

        return $destination;
    }
    
    public function duplicateDBRecord($table, $id_field, $id_field_value, $id_field_value_new, $params = array())
    {
        $resource = Db::getInstance()->query(
            'SELECT *
                FROM `' . _DB_PREFIX_. bqSQL($table) . '` 
                WHERE `' . bqSQL($id_field) . '` = ' . pSQL($id_field_value),
            false
        );

        while ($row = Db::getInstance()->nextRow($resource)) {
            $set = array();

            foreach ($row as $key => $value) {
                if ($key === $params['column']) {
                    $value = $id_field_value_new;
                }
                
                if (isset($params['assoc_column']) && $key == $params['assoc_column']) {
                    continue;
                }

                $set[] = sprintf("`%s` = '%s'", bqSQL($key), pSQL($value));
            }

            Db::getInstance()->execute(
                'INSERT INTO `' . _DB_PREFIX_ . bqSQL($table) .'`
                    SET ' . implode(', ', $set)
            );

            if (isset($params['assoc_table'])) {
                $this->duplicateDBRecord(
                    $params['assoc_table'],
                    $params['assoc_column'],
                    $row[$params['assoc_column']],
                    Db::getInstance()->Insert_ID(),
                    array('column' => $params['assoc_column'], 'assoc_column' => $params['assoc_column_id'])
                );
            }
        }
    }
    
    public function getConstant($name)
    {
        return constant(get_class($this) . '::' . Tools::strtoupper($name));
    }
    
    public function templateReplace($search, $replace, $subject, $nth = false)
    {
        if (!$nth) {
            $subject = str_replace($search, $replace, $subject);
        } else {
            $matches = null;

            $found = preg_match_all('/'.preg_quote($search).'/', $subject, $matches, PREG_OFFSET_CAPTURE);

            if (false !== $found && $found >= $nth) {
                return substr_replace($subject, $replace, $matches[0][$nth - 1][1], Tools::strlen($search));
            }
        }
        
        return $subject;
    }
    
    public function getTranslations($item, $source = null, $id_lang = null)
    {
        $translations = array();
        
        if (!$source) {
            $source = $this->name;
        }
        
        foreach (Language::getLanguages(false) as $lang) {
            $file = _PS_MODULE_DIR_.$this->name.'/translations/'.$lang['iso_code'].'.php';

            $name = $item;

            if (file_exists($file)) {
                include($file);

                $key = md5($name);
                $default_key = Tools::strtolower('<{'.$this->name.'}prestashop>' . $source).'_'.$key;
                
                if (!isset($_MODULE)) {
                    $_MODULE = array();
                }

                if (!empty($_MODULE[$default_key])) {
                    $name = Tools::stripslashes($_MODULE[$default_key]);
                }
            }

            $translations[$lang['id_lang']] = $name;
        }
        
        return $id_lang != null ? $translations[$id_lang] : $translations;
    }
    
    public function hookActionObjectLanguageAddAfter($params)
    {
        $lang = $params['object'];

        Language::loadLanguages();

        $this->configureMenu(false, $lang->iso_code);
    }
}
