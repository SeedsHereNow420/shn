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
 * Class self
 */
class AutoloaderCPM
{
    private $folder = false;
    private $class_map = null;

    /**
     * self constructor.
     * @param bool $folder
     */
    private function __construct($folder)
    {
        $this->folder = $folder;
    }

    /**
     * @param $folder
     * @return bool
     */
    public static function create($folder)
    {
        $instance = new self($folder);

        return spl_autoload_register(array($instance, 'autoload'));
    }

    /**
     * @void
     */
    protected function buildClassMap()
    {
        $this->class_map = array();

        $path = realpath($this->folder);
        $files = self::globRecursive($path.'/*.php');
        foreach ($files as $file) {
            if (basename($file) == 'index.php') {
                continue;
            }
            $class = str_replace('.php', '', basename($file));
            $this->class_map[$class] = $file;
        }
    }

    /**
     * @param string $classname
     * @void
     */
    private function autoload($classname)
    {
        if (class_exists($classname)) {
            return;
        }

        if (null === $this->class_map) {
            $this->buildClassMap();
        }

        if (array_key_exists($classname, $this->class_map)) {
            /** @noinspection PhpIncludeInspection */
            require_once($this->class_map[$classname]);
        }
    }

    /**
     * @param string $pattern
     * @param int $flags
     * @return array
     */
    private static function globRecursive($pattern, $flags = 0)
    {
        $files = glob($pattern, $flags);

        $dirs = glob(dirname($pattern).'/*', GLOB_ONLYDIR | GLOB_NOSORT);
        if (is_array($dirs) && count($dirs)) {
            foreach ($dirs as $dir) {
                /** @noinspection SlowArrayOperationsInLoopInspection */
                $files = array_merge($files, self::globRecursive($dir.'/'.basename($pattern), $flags));
            }
        }

        return $files;
    }
}
