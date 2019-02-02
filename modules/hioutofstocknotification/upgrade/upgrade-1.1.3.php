<?php
/**
* 2013 - 2017 HiPresta
*
* MODULE Out Of Stock Notification
*
* @version   1.2.2
* @author    HiPresta <suren.mikaelyan@gmail.com>
* @link      http://www.hipresta.com
* @copyright HiPresta 2015
* @license   Addons PrestaShop license limitation
*
* NOTICE OF LICENSE
*
* Don't use this module on several shops. The license provided by PrestaShop Addons 
* for all its modules is valid only once for a single shop.
*/

function upgrade_module_1_1_3($object)
{
    $languages = Language::getLanguages(false);
    $subjects = array();
    foreach ($languages as $lang) {
        $subjects[$lang['id_lang']] = '{product_name} is once again in-stock!';
    }
    Configuration::updateValue('HI_OOSN_EMAIL_SUBJECT', $subjects);
    return true;
}
