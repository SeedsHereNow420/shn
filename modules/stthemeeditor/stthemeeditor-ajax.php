<?php
/*
* 2007-2017 PrestaShop
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
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    ST-themes <hellolee@gmail.com>
*  @copyright 2007-2017 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*/

require_once(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../init.php');
require_once(dirname(__FILE__).'/stthemeeditor.php');

$result = array(
    'r' => false,
    'm' => '',
    'd' => ''
);
if(Tools::getValue('action')=='version_switching')
{
    $vs = (int)Tools::getValue('vs');
    Context::getContext()->cookie->version_switching = $vs ? 1 : 0;
    $result['r'] = true;
    echo json_encode($result);
}
else
    echo json_encode($result);
    

