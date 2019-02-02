<?php
/**
 * 2007-2016 PrestaShop
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
 * @author    SeoSA <885588@bk.ru>
 * @copyright 2012-2017 SeoSA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

/**
 * Class TransModDGP
 */
class TransModDGP
{
    /**
     * @var TransModDGP
     */
    protected static $instance = null;
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
            self::$instance->setModuleNameForString(__FILE__);
        }
        return self::$instance;
    }

    public function l($string, $file)
    {
        $source = $this->getSourceByPath($file);
        $string = $this->translate($string, $source);
        return $string;
    }

    protected $dynamic = null;
    public function ld($string)
    {
        if (!file_exists(_PS_MODULE_DIR_.$this->module_name.'/translations')) {
            mkdir(_PS_MODULE_DIR_.$this->module_name.'/translations');
        }

        $string = pSQL($string);
        $file = _PS_MODULE_DIR_.$this->module_name.'/translations/translate_dynamic.php';
        ${'_DYNAMIC'} = array();

        if (is_null($this->dynamic)) {
            if (file_exists($file)) {
                $this->dynamic = array();
                include($file);
                if (count(${'_DYNAMIC'})) {
                    foreach (${'_DYNAMIC'} as $key => $dynamic) {
                        $this->dynamic[str_replace('"', '\"', $key)] = $dynamic;
                    }
                }
            } else {
                $this->dynamic = array();
            }
        }

        $t_key = '->l(\''.$string.'\')';
        if (!array_key_exists($t_key, $this->dynamic)) {
            $this->dynamic[$t_key] = $string;
            $translate_dynamic = fopen($file, 'w+');
            fwrite($translate_dynamic, '<?php'.PHP_EOL);
            fwrite($translate_dynamic, '$_DYNAMIC = array();'.PHP_EOL);
            foreach ($this->dynamic as $key => $row) {
                fwrite($translate_dynamic, '$_DYNAMIC["'.$key.'"] = \''.$row.'\';'.PHP_EOL);
            }
        }

        return $this->translate($string, 'translate_dynamic');
    }

    protected $module_name = null;
    public function setModuleNameForString($path)
    {
        if (!is_null($this->module_name)) {
            return $this->module_name;
        }
        $path = str_replace(_PS_ROOT_DIR_, '', $path);
        $map_dir = explode(DIRECTORY_SEPARATOR, $path);
        $this->module_name = $map_dir[2];
        return $this->module_name;
    }

    public function getSourceByPath($file)
    {
        $filename = str_replace('.php', '', basename($file));
        return Tools::strtolower($filename);
    }

    public function translate($string, $source)
    {
        return Translate::getModuleTranslation($this->module_name, $string, $source);
    }
}
