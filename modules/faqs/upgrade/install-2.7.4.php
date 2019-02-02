<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_2_7_4($object)
{
  return	$object->upgradeFaqs2_7_4();
}


