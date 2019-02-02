<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_8_6($object)
{
    $result = true;
    
    $field = Db::getInstance()->executeS('Describe `'._DB_PREFIX_.'st_banner_group` `left_spacing`');  
   
    if(is_array($field) && count($field))
        return $result;

    if (!Db::getInstance()->Execute('ALTER TABLE `'._DB_PREFIX_.'st_banner_group` 
        ADD `left_spacing` varchar(10) DEFAULT NULL,
        ADD `right_spacing` varchar(10) DEFAULT NULL'
        ))
        $result &= false;
    
    return $result;
}
