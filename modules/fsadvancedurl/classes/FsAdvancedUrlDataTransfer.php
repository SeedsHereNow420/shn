<?php
/**
 *  2017 ModuleFactory.co
 *
 *  @author    ModuleFactory.co <info@modulefactory.co>
 *  @copyright 2017 ModuleFactory.co
 *  @license   ModuleFactory.co Commercial License
 */

class FsAdvancedUrlDataTransfer
{
    private static $data = null;
    private static $readed_from_file = false;
    private static $module_name = 'fsadvancedurl';
    private static $data_file = 'data.json';

    public static function setData($var)
    {
        $data_file = _PS_MODULE_DIR_.self::$module_name.'/'.self::$data_file;
        $file = fopen($data_file, 'w');
        fwrite($file, FsAdvancedUrlModule::jsonEncodeStatic($var));
        fclose($file);
    }

    public static function getData()
    {
        $data_file = _PS_MODULE_DIR_.self::$module_name.'/'.self::$data_file;
        if (!self::$readed_from_file) {
            if (file_exists($data_file)) {
                self::$data = FsAdvancedUrlModule::jsonDecodeStatic(Tools::file_get_contents($data_file), true);
                unlink($data_file);
            }

            self::$readed_from_file = true;
        }

        return self::$data;
    }
}
