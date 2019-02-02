<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_2_6_2($object)
{
  return	$object->upgradeFaqs2_6_2();
}


