<?php
/**
 * 2007-2016 PrestaShop
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
 * @author    SeoSA <885588@bk.ru>
 * @copyright 2012-2017 SeoSA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

class AdminSeoSaExtendedFeaturesController extends ModuleAdminController
{
    public function __construct()
    {
        $this->context = Context::getContext();
        $this->bootstrap = true;
        $this->display = 'view';
        parent::__construct();
    }

    public function renderView()
    {
        /**
         * @var SeoSAExtendedFeatures $module
         */
        $module = Module::getInstanceByName('seosaextendedfeatures');

        if (version_compare(_PS_VERSION_, '1.7.0.0', '>=')) {
            $this->context->smarty->assign(array(
                'autorefresh_notifications' => Configuration::get('PS_ADMINREFRESH_NOTIFICATION')
            ));
        }

        if ($module->active) {
            $module->assignProductFromData();
            return $module->fetchTemplate('admin/product-tab.tpl');
        }
    }

    public static function noEscape($value)
    {
        return $value;
    }

    public function display()
    {
        $smarty = Context::getContext()->smarty;
        if (!array_key_exists('no_escape', $smarty->registered_plugins['modifier'])) {
            smartyRegisterFunction($smarty, 'modifier', 'no_escape', array(__CLASS__, 'noEscape'));
        }

        $this->layout = _PS_MODULE_DIR_.$this->module->name
            .'/views/templates/admin/seo_sa_extended_features/layout.tpl';
        parent::display();
    }
}
