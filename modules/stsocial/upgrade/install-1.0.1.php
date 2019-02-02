<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_0_1($object)
{
    $result = true;
    
    $result &= Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'st_social` SET `url_key`=\'u\' WHERE `item`=\'facebook\'');
    
    return $result;
}
