<?php
/**
* NOTICE OF LICENSE
*
* This source file is subject to a commercial license from BSofts.
* Use, copy, modification or distribution of this source file without written
* license agreement from the BSofts is strictly forbidden.
*
* @author    BSofts Inc.
* @copyright Copyright 2017 © BSofts Inc.
* @license   Single domain commerical license
* @package   quantitylimit
*/

/**
* In some cases you should not drop the tables.
* Maybe the merchant will just try to reset the module
* but does not want to loose all of the data associated to the module.
*/

$sql = array();
$sql[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'quantitylimit`';
foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
