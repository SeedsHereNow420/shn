<?php
/**
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
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2017 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class AmazzingFilterAjaxModuleFrontController extends ModuleFrontControllerCore
{
    public function initContent()
    {
        if ($params_string = Tools::getValue('params')) {
            $params = array();
            parse_str($params_string, $params);
            $this->module->ajaxGetFilteredProducts($params);
        } elseif (Tools::getValue('action') == 'SaveMyFilters') {
            $this->module->ajaxSaveCustomerFilters();
        } elseif (Tools::getValue('action') == 'prepareLayout') {
            $this->module->ajaxPrepareLayout();
        }
        /*
        } else if (Tools::getValue('action') == 'getRedirectLink') {
            $link_params = Tools::getValue('link_params');
            $id_category = $link_params['id_category'];
            unset($link_params['id_category']);
            $link = new Link();
            $url = $link->getCategoryLink($id_category);
            $params = strpos($url, '?') ? '&' : '?';
            $params .= http_build_query($link_params);
            $ret = array('url' => $url.$params);
            exit(Tools::jsonEncode($ret));
        }
        */
    }
}
