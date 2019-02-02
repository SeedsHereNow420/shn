<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_2_4($object)
{
    $result = true;
    
    $result = $object->registerHook('actionProductDelete');
    
	return $result;
}
