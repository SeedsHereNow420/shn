<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_0_1($object)
{
    $result = true;
    
    $result = $object->registerHook('actionProductDelete');
    
	return $result;
}
