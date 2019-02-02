<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_2_5_0($object)
{
	return $object->upgradeFaqs();
}


