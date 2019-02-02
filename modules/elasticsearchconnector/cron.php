<?php
/**
 * 2017 PrestaWach
 *
 * @author    PrestaWach <info@prestawach.info>
 * @copyright 2017 PrestaWach
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

include(dirname(__FILE__) . '/../../config/config.inc.php');
include(dirname(__FILE__) . '/elasticsearchconnector.php');

if (Tools::substr(Tools::encrypt('elasticsearchconnector'), 0, 10) != Tools::getValue('token')
    || !Module::isInstalled('elasticsearchconnector')
) {
    die('Bad token');
}

if (!Tools::getValue('ajax')) {
    if (Tools::getValue('return_message') !== false) {
        echo '1';
        die();
    }

    if (Tools::usingSecureMode()) {
        $domain = Tools::getShopDomainSsl(true);
    } else {
        $domain = Tools::getShopDomain(true);
    }

    // Uncomment this code if You are using external cron service
    /*
    header(
	    'Location: '.
	    $domain . __PS_BASE_URI__ .
	    'modules/elasticsearchconnector/cron.php?token=' . Tools::getValue('token') .
	    '&return_message=' . (int) Tools::getValue('cursor')
    );
    */

    // Comment this code if You are using external cron service
    Tools::redirect(
        $domain . __PS_BASE_URI__ .
        'modules/elasticsearchconnector/cron.php?token=' . Tools::getValue('token') .
        '&return_message=' . (int) Tools::getValue('cursor')
    );
    flush();
}

$elasticsearchConnector = new ElasticsearchConnector();
echo $elasticsearchConnector->cronProcess(
    (int)Tools::getValue('cursor'),
    (int)Tools::getValue('ajax'),
    (int)Tools::getValue('full')
);
