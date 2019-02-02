<?php
/*
* 2007-2015 PrestaShop
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

/**
 * @since 1.5.0
 */
class StbannerAdveditorModuleFrontController extends ModuleFrontController
{
    /**
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        parent::initContent();
        $this->addJS(_MODULE_DIR_.'stbanner/views/js/adveditor.js');
        $this->addJqueryPlugin('colorpicker');

        $googleFonts = include(_PS_MODULE_DIR_.'stthemeeditor/googlefonts.php');

        $adveditor['stbanner'] = array(
            0 => array(
                'elements' => array(
                    array(
                            'type' => 'header',
                            'tag' => 'h5',
                            'text'=> 'NEW',
                            'line_height'=> 110,
                            'font_size'=> 68,
                            'font_family' => 'Open Sans',
                            'color'=> '#ffffff',
                        ),
                    array(
                            'type' => 'separator',
                            'text'=> '',
                            'border_color'=> '#ffffff',
                            'border_height'=> 2,
                        ),
                    array(
                            'type' => 'header',
                            'tag' => 'h5',
                            'text'=> 'NEW ARRIVALS',
                            'line_height'=> 110,
                            'font_size'=> 16,
                            'font_family' => 'Open Sans',
                            'color'=> '#ffffff',
                        ),
                    ),
                'buttons' => array(
                    array(
                            'hidden' => true,
                        ),
                    array(
                            'hidden' => true,
                        ),
                    ),
                'settings' => array(
                        'h_align' => 'flex_center',
                        'v_align' => 'flex_middle',
                    ),
                ),
            1 => array(
                'elements' => array(
                    array(
                            'type' => 'header',
                            'tag' => 'h5',
                            'text'=> 'Free shipping',
                            'transform'=> 'text-uppercase',
                            'line_height'=> 110,
                            'color'=> '#ffffff',
                            'font_size'=> 40,
                        ),
                    array(
                            'type' => 'header',
                            'tag' => 'h6',
                            'text'=> 'All around the world, the shipping is FREE',
                            'color'=> '#ffffff',
                        ),
                    ),
                'buttons' => array(
                    array(
                        'class' => 'btn-white',
                        ),
                    array(
                            'hidden' => true,
                        ),
                    ),
                'settings' => array(
                        'h_align' => 'flex_center',
                        'v_align' => 'flex_middle',
                    ),
                ),
            2 => array(
                'elements' => array(
                    array(
                            'type' => 'header',
                            'tag' => 'h5',
                            'text'=> 'SUPPER SALE',
                            'line_height'=> 110,
                            'margin_bottom' => 6,
                            'color' => '#ffffff',
                        ),
                    array(
                            'type' => 'header',
                            'tag' => 'h4',
                            'text'=> 'GRAPHIC TEES',
                            'line_height'=> 110,
                            'margin_bottom' => 0,
                            'color' => '#ffffff',
                        ),
                    ),
                'buttons' => array(
                    array(
                            'class' => 'btn-link',
                            'color' => '#ffffff',
                        ),
                    array(
                            'hidden' => true,
                        ),
                    ),
                'settings' => array(
                        'h_align' => 'flex_left',
                        'v_align' => 'flex_middle',
                        't_align' => 'text-1',
                    ),
                ),
            3 => array(
                'elements' => array(
                    array(
                            'type' => 'header',
                            'tag' => 'h5',
                            'text'=> 'NEW ARRIVALS',
                            'line_height'=> 110,
                            'margin_bottom' => 6,
                            'color' => '#ffffff',
                        ),
                    array(
                            'type' => 'header',
                            'tag' => 'h5',
                            'text'=> 'UP TO 60% OFF',
                            'line_height'=> 110,
                            'margin_bottom' => 0,
                            'color' => '#ffffff',
                        ),
                    ),
                'buttons' => array(
                    array(
                            'class' => 'btn-link',
                            'color' => '#ffffff',
                        ),
                    array(
                            'hidden' => true,
                        ),
                    ),
                'settings' => array(
                        'h_align' => 'flex_left',
                        'v_align' => 'flex_middle',
                        't_align' => 'text-1',
                    ),
                ),
            4 => array(
                'elements' => array(
                    array(
                            'type' => 'header',
                            'tag' => 'h5',
                            'text'=> 'RESPONSIVE',
                            'transform'=> 'text-uppercase',
                            'line_height'=> 110,
                            'color'=> '#ffffff',
                            'font_size'=> 36,
                        ),
                    array(
                            'type' => 'header',
                            'tag' => 'h5',
                            'text'=> 'PrestaShop theme',
                            'transform'=> 'text-uppercase',
                            'line_height'=> 110,
                            'color'=> '#ffffff',
                            'font_size'=> 36,
                        ),
                    array(
                            'type' => 'header',
                            'tag' => 'p',
                            'text'=> 'PrestaShop is an open-source e-commerce solution, it is used in 160 countries and translated into 63 languages.',
                            'color'=> '#ffffff',
                        ),
                    ),
                'buttons' => array(
                    array(
                            'hidden' => true,
                        ),
                    array(
                            'hidden' => true,
                        ),
                    ),
                'settings' => array(
                        'h_align' => 'flex_left',
                        'v_align' => 'flex_middle',
                        't_align' => 'text-1',
                        'padding_left' => 10,
                        'padding_right' => 10,
                    ),
                ),
            5 => array(
                'elements' => array(
                    array(
                            'type' => 'header',
                            'tag' => 'h6',
                            'text'=> 'Shop new arrivals',
                            'transform'=> 'text-uppercase',
                            'line_height'=> 110,
                            'color'=> '#ffffff',
                            'font_size'=> 16,
                        ),
                    array(
                            'type' => 'header',
                            'tag' => 'p',
                            'text'=> 'New colloection out now',
                            'color'=> '#ffffff',
                        ),
                    ),
                'buttons' => array(
                    array(
                            'hidden' => true,
                        ),
                    array(
                            'hidden' => true,
                        ),
                    ),
                'settings' => array(
                        'h_align' => 'flex_center',
                        'v_align' => 'flex_end',
                        'padding_bottom' => 10,
                    ),
                ),
            6 => array(
                'elements' => array(
                    array(
                            'type' => 'header',
                            'tag' => 'h3',
                            'text'=> '680+',
                            'line_height'=> 100,
                            'color'=> '#ffffff',
                            'font_size'=> 60,
                        ),
                    array(
                            'type' => 'header',
                            'tag' => 'h6',
                            'text'=> 'Happy client',
                            'color'=> '#ffffff',
                            'font_size'=> 16,
                            'margin_bottom' => 16,
                        ),
                    array(
                            'type' => 'separator',
                            'border_color'=> '#ffffff',
                            'color'=> '#ffffff',
                            'border_height'=> 2,
                            'border_width' => 20,
                            'margin_bottom' => 16,
                        ),
                    array(
                            'type' => 'header',
                            'tag' => 'p',
                            'text'=> 'Transformer theme is a modern, clean and professional Prestashop theme.',
                            'color'=> '#ffffff',
                        ),
                    ),
                'buttons' => array(
                    array(
                            'hidden' => true,
                        ),
                    array(
                            'hidden' => true,
                        ),
                    ),
                'settings' => array(
                    ),
                ),
            7 => array(
                'elements' => array(
                    array(
                            'type' => 'header',
                            'tag' => 'h3',
                            'text'=> 'FEATURE RICH',
                            'line_height'=> 110,
                            'color'=> '#444444',
                            'font_size'=> 28,
                            'margin_bottom' => 0,
                        ),
                    array(
                            'type' => 'header',
                            'tag' => 'h6',
                            'text'=> '',
                            'line_height'=> 110,
                            'color'=> '#444',
                            'font_size'=> 16,
                            'margin_bottom' => 0,
                        ),
                    ),
                'buttons' => array(
                    array(
                            'hidden' => true,
                        ),
                    ),
                'settings' => array(
                    'background' => '#ffffff',
                    'text_padding' => 10,
                    ),
                ),
            20 => array(
                'elements' => array(
                    array(
                            'type' => 'header',
                            'tag' => 'h1',
                            'text'=> 'CREATIVE THEME',
                            'font_size'=> 60,
                            'line_height'=> 110,
                            'color'=> '#ffffff',
                        ),
                    array(
                            'type' => 'header',
                            'tag' => 'p',
                            'text'=> 'Transformer theme is a modern, clean and professional Prestashop theme, it comes with a lot of useful features. Transformer theme is fully responsive, it looks stunning on all types of screens and devices.',
                            'font_size'=> 14,
                            'width' => 81,
                            'block_width_percentage' => array('100','90','91','92','80','81','82','70','71','72','60','61','62','50','51','52','40','41','42'),
                            'color'=> '#ffffff',
                        ),
                    array(
                            'type' => 'separator',
                            'text'=> 'MODERN & CLEAN',
                            'border_color'=> '#ffffff',
                            'color'=> '#ffffff',
                            'border_height'=> 2,
                            'font_size'=> 36,
                        ),
                    ),
                'buttons' => array(
                    array(
                        ),
                    array(
                        ),
                    ),
                'settings' => array(
                        'h_align' => 'flex_center',
                        'v_align' => 'flex_middle',
                    ),
                ),
            21 => array(
                'elements' => array(
                    array(
                            'type' => 'header',
                            'tag' => 'h6',
                            'text'=> 'WE ARE TRANSFORMER THEME',
                            'font_size'=> 18,
                            'line_height'=> 110,
                            'color'=> '#ffffff',
                        ),
                    array(
                            'type' => 'header',
                            'tag' => 'h5',
                            'text'=> 'FULLY RESPONSIVE THEME',
                            'font_size'=> 60,
                            'line_height'=> 110,
                            'color'=> '#ffffff',
                        ),
                    array(
                            'type' => 'header',
                            'tag' => 'p',
                            'text'=> 'Transformer theme looks stunning on all types of screens and devices.',
                            'font_size'=> 14,
                            'width' => 81,
                            'block_width_percentage' => array('100','90','91','92','80','81','82','70','71','72','60','61','62','50','51','52','40','41','42'),
                            'color'=> '#ffffff',
                        ),
                    ),
                'buttons' => array(
                    array(
                        'class' => 'btn-white',
                        ),
                    array(
                        'class' => 'btn-white',
                        ),
                    ),
                'settings' => array(
                        'h_align' => 'flex_center',
                        'v_align' => 'flex_middle',
                    ),
                ),
            22 => array(
                'elements' => array(
                    array(
                            'type' => 'header',
                            'tag' => 'h5',
                            'text'=> 'OUR NEW BRANDS',
                            'font_size'=> 60,
                            'line_height'=> 110,
                            'color'=> '#ffffff',
                        ),
                    array(
                            'type' => 'header',
                            'tag' => 'h5',
                            'text'=> 'FULLY RESPONSIVE THEME',
                            'font_size'=> 60,
                            'line_height'=> 110,
                            'color'=> '#ffffff',
                        ),
                    array(
                            'type' => 'header',
                            'tag' => 'p',
                            'text'=> 'Transformer theme looks stunning on all types of screens and devices.',
                            'font_size'=> 14,
                            'width' => 81,
                            'block_width_percentage' => array('100','90','91','92','80','81','82','70','71','72','60','61','62','50','51','52','40','41','42'),
                            'color'=> '#ffffff',
                        ),
                    ),
                'buttons' => array(
                    array(
                        'class' => 'btn-white',
                        ),
                    array(
                        'class' => 'btn-white',
                        ),
                    ),
                'settings' => array(
                        'h_align' => 'flex_center',
                        'v_align' => 'flex_middle',
                    ),
                ),
        );
        /*$adveditor['stowlcarousel'] = $slider;
        $adveditor['stswiper'] = $slider;*/
        $caller_module = Tools::getValue('caller_module') ? Tools::getValue('caller_module') : 'stbanner';
        $adv_content_only = false;
        if($caller_module=='steasycontent' || $caller_module=='stnewsletter')
            $adv_content_only = true;
        $this->context->smarty->assign(array(
            'adveditor_window' => Tools::getValue('adveditor_window'),
            'googleFonts' => $googleFonts,
            'adveditor_banners' => $adveditor['stbanner'],
            'adv_content_only' => $adv_content_only,
            'banner_url' => $this->context->link->protocol_content.Tools::getMediaServer(_MODULE_DIR_.'stbanner'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'banners'.DIRECTORY_SEPARATOR.'banner01.jpg')._MODULE_DIR_.'stbanner/views/img/banners/',
        ));
        //This is for color picker js, it should not use baseDir, hope prestashop develop team can fix it. 
        Media::addJsDef(array(
            'baseDir' => $this->context->shop->getBaseURL(true, true),
            'googleFontsJson' => $googleFonts,
            'adveditor_target' => Tools::getValue('adveditor_target'),
            'adv_content_only' => $adv_content_only,
        ));
        $this->setTemplate('module:stbanner/views/templates/front/adveditor.tpl');
    }
}
