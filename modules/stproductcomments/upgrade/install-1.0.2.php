<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_0_2($object)
{
    $result = true;
    
    if (!Db::getInstance()->Execute('ALTER TABLE `'._DB_PREFIX_.'st_product_comment_grade` DROP PRIMARY KEY'))
        $result &= false;
    
	return $result;
}
