<?php

if (!defined('_PS_VERSION_'))
  exit;

function upgrade_module_2_8_6($object)
{
  $object->uninstallOverrides();
  $object->installOverrides();
  return	$object->upgradeFaqs2_8_6();
}