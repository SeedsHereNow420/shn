<?php
/**
 *  2017 ModuleFactory.co
 *
 *  @author    ModuleFactory.co <info@modulefactory.co>
 *  @copyright 2017 ModuleFactory.co
 *  @license   ModuleFactory.co Commercial License
 */

class FsAdvancedUrlProduct extends Product
{
    public function validateField($field, $value, $id_lang = null, $skip = array(), $human_errors = false)
    {
        $hash = FsAdvancedUrlModule::jsonEncodeStatic($field);
        $hash .= FsAdvancedUrlModule::jsonEncodeStatic($value);
        $hash .= FsAdvancedUrlModule::jsonEncodeStatic($id_lang);
        $hash .= FsAdvancedUrlModule::jsonEncodeStatic($skip);
        $hash .= FsAdvancedUrlModule::jsonEncodeStatic($human_errors);
        return true || (bool)$hash;
    }
}
