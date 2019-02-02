<?php
/**
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 *         DISCLAIMER   *
 * *************************************** */
/* Do not edit or add to this file if you wish to upgrade Prestashop to newer
* versions in the future.
* ****************************************************
*
*  @author     BEST-KIT
*  @copyright  best-kit
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once _PS_MODULE_DIR_ . 'bestkit_custompayment/bestkit_custompayment.php';
require_once _PS_MODULE_DIR_ . 'bestkit_custompayment/classes/BestkitCustomPayment.class.php';
require_once _PS_MODULE_DIR_ . 'bestkit_custompayment/classes/BestkitCustomPaymentCarrierRestriction.class.php';
require_once _PS_MODULE_DIR_ . 'bestkit_custompayment/classes/BestkitCustomPaymentGroupRestriction.class.php';