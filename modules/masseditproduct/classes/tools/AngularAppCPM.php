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

class AngularAppCPM
{
    protected $path_angular_app = null;
    protected $context = null;
    protected $autoload = array(
        'modules' => false,
        'app' => false,
        'filters' => false,
        'directives' => false,
        'controllers' => false,
        'services' => false
    );

    /**
     * @var AngularAppCPM
     */
    protected static $instance = array();

    public static function getInstance($path)
    {
        if (!array_key_exists($path, self::$instance)) {
            self::$instance[$path] = new self($path);
        }
        return self::$instance[$path];
    }

    public function __construct($path)
    {
        $this->context = Context::getContext();
        $this->path_angular_app = $path;
    }

    public function autoloadApp()
    {
        if (is_array($this->autoload) && count($this->autoload)) {
            foreach (array_keys($this->autoload) as $type) {
                $this->autoloadComponents($type);
            }
        }
    }

    protected function checkAutoloadModules()
    {
        return $this->checkAutoloadComponents('modules');
    }

    protected function checkAutoloadComponents($component)
    {
        return array_key_exists($component, $this->autoload) ? $this->autoload[$component] : false;
    }

    public function checkAutoloadDirectives()
    {
        return $this->checkAutoloadComponents('directives');
    }

    public function checkAutoloadFilters()
    {
        return $this->checkAutoloadComponents('filters');
    }

    public function checkAutoloadControllers()
    {
        return $this->checkAutoloadComponents('controllers');
    }

    public function checkAutoloadServices()
    {
        return $this->checkAutoloadComponents('services');
    }

    protected function autoloadComponents($type)
    {
        if (!array_key_exists($type, $this->autoload) || $this->autoload[$type]) {
            return false;
        }

        if ($type == 'app') {
            $this->context->controller->addJS($this->path_angular_app.$type.'.js');
        } else {
            $full_path = _PS_ROOT_DIR_.DIRECTORY_SEPARATOR.ToolsModuleCPM::strReplaceFirst(__PS_BASE_URI__, '', $this->path_angular_app);
            $files = glob($full_path.$type.'/**.js');
            if (is_array($files) && count($files)) {
                foreach ($files as $file) {
                    $this->context->controller->addJS($this->path_angular_app.$type.'/'.basename($file));
                }
            }
        }
        $this->autoload[$type] = true;
    }
}
