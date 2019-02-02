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
 * Class ConfCPM
 */
class ConfCPM
{
    protected static $module_prefix = 'CPM';
    protected static $prefix_length = null;
    protected static $conf_length = null;
    protected static $prefix = null;

    public static function getPrefix()
    {
        if (!is_null(self::$prefix)) {
            return self::$prefix;
        }
        $prefix = 'PS_'.self::$module_prefix.'_';
        if (is_null(self::$prefix_length)) {
            self::$prefix_length = Tools::strlen($prefix);
        }
        self::$prefix = $prefix;
        return $prefix;
    }

    public static function formatConfName($name)
    {
        if (is_null(self::$conf_length)) {
            self::$conf_length = (int)Configuration::$definition['fields']['name']['size'];
        }
        $prefix = self::getPrefix();
        $name = Tools::strtoupper($name);
        $name = md5($name);
        $name_length = Tools::strlen($name);

        $difference = self::$conf_length - $name_length - self::$prefix_length;
        if ($difference < 0) {
            $name = Tools::substr($name, 0, $name_length + $difference);
        }

        return $prefix.$name;
    }

    public static function getConf($name)
    {
        return Configuration::get(self::formatConfName($name));
    }

    public static function setConf($name, $value)
    {
        return Configuration::updateValue(self::formatConfName($name), $value);
    }

    public static function deleteConf($name)
    {
        $name = Tools::strtoupper($name);
        return Configuration::deleteByName(self::formatConfName($name));
    }

    public static function installConf($config)
    {
        foreach ($config as $name => $value) {
            self::setConf($name, $value);
        }
    }

    public static function uninstallConf($config)
    {
        foreach (array_keys($config) as $name) {
            self::deleteConf($name);
        }
    }
    public static function setPrefix($name)
    {
        self::$prefix = $name;
    }
}
