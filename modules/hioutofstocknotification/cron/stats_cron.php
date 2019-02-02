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

include(dirname(__FILE__).'/../../../config/config.inc.php');
include(dirname(__FILE__).'/../../../init.php');
include(dirname(__FILE__).'/../hioutofstocknotification.php');

$oosn  = new HIOutOfstockNotification();
if (Tools::getValue('cron_secret_key') == ''
    || Tools::getValue('cron_secret_key') != $oosn->mu_cron_pass) {
    echo $oosn->l('Hack attempt!');
} else {
    $emails = explode("\n", trim($oosn->multi_email));
    $emails = array_filter(array_map('trim', $emails));

    if (!empty($emails)) {
        $html = $oosn->renderStatsEmail();
        $oosn->sendAdministratorNotificationMail($emails, $html);
    }
    
}
