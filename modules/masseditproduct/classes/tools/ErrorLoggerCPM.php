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

class ErrorLoggerCPM
{
    protected $filename = 'error.log';
    protected $handler;

    public function __construct()
    {
        $this->handler = $this->createHandler();
    }

    protected static $self = null;
    public static function getInstance()
    {
        if (is_null(self::$self)) {
            self::$self = new self();
        }
        return self::$self;
    }

    protected function getLogFilePath()
    {
        return _PS_MODULE_DIR_.ToolsModuleCPM::getModNameForPath(__FILE__).'/'.$this->filename;
    }

    protected function createHandler()
    {
        $handler = fopen($this->getLogFilePath(), 'a');
        return $handler;
    }

    protected function getHandler()
    {
        return $this->handler;
    }

    public function add($string)
    {
        if (is_array($string)) {
            $string = var_export($string, true);
        }
        fwrite($this->getHandler(), $this->getDate().$string.PHP_EOL);
    }

    protected function getDate()
    {
        return date('H:i:s d-m-Y: ');
    }

    public function clear()
    {
        unlink($this->getLogFilePath());
        $this->handler = $this->createHandler();
    }
}
