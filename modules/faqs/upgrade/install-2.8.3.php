<?php

if (!defined('_PS_VERSION_'))
  exit;

function upgrade_module_2_8_3($object)
{
  return	$object->upgradeFaqs2_8_3();
}