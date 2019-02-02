<?php

if (!defined('_PS_VERSION_'))
  exit;

function upgrade_module_2_9_0($object)
{
  return $object->upgradeFaqs2_9_0();
}