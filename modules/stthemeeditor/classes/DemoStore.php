<?php
/*
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
if (!defined('_PS_VERSION_'))
	exit;

define('_ST_DEMO_DEBUG_', true);

use PrestaShop\PrestaShop\Core\Addon\Theme\ThemeManagerBuilder;

class DemoStore
{
   private $_debug_file = 'store_data.dbg';
   public $theme_manager;
   public $theme_repository;
   public $context;
   public $proc_table = array();
   public $image_type_excluded = array(
    'demo12_default','demo10_2_default','demo10_default','demo12_default',
    'demo16_default','demo19_default','demo4_2_default','demo4_default',
    'demo6_2_default','demo6_default','demo8_cate_default','demo8_default',
    'demo9_default','home_2_1_default','home_4_1_default','home_4_2_default'
   );
   public $hooks = array(
    //Top bar
    'displayBanner',
    'displayAboveHeader',
    'displayNav1','displayNav3','displayNav2',
    // Header
    'displaySlogan1','displaySlogan2',
    'displayHeaderLeft','displayHeaderCenter','displayTop','displayHeaderBottom',
    'displayMainMenu','displayMainMenuWidget',
    // Main content top
    'displayFullWidthTop','displayFullWidthTop2',
    // Home page
    'displayHomeTop',
    'displayHome',
    'displayHomeLeft','displayHomeRight',
    'displayHomeFirstQuarter','displayHomeSecondQuarter','displayHomeThirdQuarter','displayHomeFourthQuarter',
    'displayHomeBottom',
    // Main content buttom.
    'displayFullWidthBottom',
    // Left/right column.
    'displayLeftColumn',//'displayRightColumn',
    // Footer
    'displayStackedFooter1','displayStackedFooter2','displayStackedFooter3','displayStackedFooter4','displayStackedFooter5','displayStackedFooter6',
    'displayFooterBefore',
    'displayFooter',
    'displayFooterAfter',
    // Footer bottom
    'displayFooterBottomLeft','displayFooterBottomRight',
    // Mobile
    'displayMobileBar',
    // Side bar.
    'displaySideBar','displaySideBarRight',
    );
   public $module_tables = array(
        'stbanner' => array(
            'st_banner_group' => array(
                'st_banner' => array(
                    'st_banner_lang' => array('where' => 'id_st_banner={$identify} AND id_lang={$id_lang}'),
                    'st_banner_font' => array('where' => 'id_st_banner={$identify}'),
                    'where' => 'id_st_banner_group={$identify}',
                ),
                'st_banner_group_shop' => array('where' => 'id_st_banner_group={$identify} AND id_shop={$id_shop}'),
                'where' => 'id_parent=0 AND id_st_banner_group IN (select id_st_banner_group from {_DB_PREFIX_}st_banner_group_shop where id_shop={$id_shop})'
            ),
        ),
        'steasycontent' => array(
            'st_easy_content' => array(
                'st_easy_content_column' => array(
                    'st_easy_content_element' => array(
                        'st_easy_content_setting' => array('where' => 'id_st_easy_content_setting={$identify} AND setting_type=2'),
                        'where' => 'id_st_easy_content_column={$identify}',
                    ),
                    'st_easy_content_setting' => array('where' => 'id_st_easy_content_setting={$identify} AND setting_type=1'),
                    'where' => 'id_st_easy_content={$identify} AND id_parent=0',
                ),
                'st_easy_content_font' => array('where' => 'id_st_easy_content={$identify}'),
                'st_easy_content_lang' => array('where' => 'id_st_easy_content={$identify} AND id_lang={$id_lang}'),
                'st_easy_content_shop' => array('where' => 'id_st_easy_content={$identify} AND id_shop={$id_shop}'),
                'where' => 'type=1 AND id_st_easy_content IN (select id_st_easy_content from {_DB_PREFIX_}st_easy_content_shop where id_shop={$id_shop})'
            ),
        ),
        'stmultilink' => array(
            'st_multi_link_group' => array(
                'st_multi_link' => array(
                    'st_multi_link_lang' => array('where' => 'id_st_multi_link={$identify} AND id_lang={$id_lang}'),
                    'where' => 'id_st_multi_link_group={$identify}',
                ),
                'st_multi_link_group_lang' => array('where' => 'id_st_multi_link_group={$identify} AND id_lang={$id_lang}'),
                'st_multi_link_group_shop' => array('where' => 'id_st_multi_link_group={$identify} AND id_shop={$id_shop}'),
                'where' => 'id_st_multi_link_group IN (select id_st_multi_link_group from {_DB_PREFIX_}st_multi_link_group_shop where id_shop={$id_shop})'
            ),
        ),
        'stinstagram' => array(
            'st_instagram' => array(
                'st_instagram_lang' => array('where' => 'id_st_instagram={$identify} AND id_lang={$id_lang}'),
                'st_instagram_shop' => array('where' => 'id_st_instagram={$identify} AND id_shop={$id_shop}'),
                'where' => 'id_st_instagram IN (select id_st_instagram from {_DB_PREFIX_}st_instagram_shop where id_shop={$id_shop})'
            ),
        ),
        'stnewsletter' => array(
            'st_news_letter' => array(
                'st_news_letter_lang' => array('where' => 'id_st_news_letter={$identify} AND id_lang={$id_lang}'),
                'st_news_letter_shop' => array('where' => 'id_st_news_letter={$identify} AND id_shop={$id_shop}'),
                'where' => 'id_st_news_letter IN (select id_st_news_letter from {_DB_PREFIX_}st_news_letter_shop where id_shop={$id_shop})'
            ),
        ),
        'stnotification' => array(
            'st_notification' => array(
                'st_notification_lang' => array('where' => 'id_st_notification={$identify} AND id_lang={$id_lang}'),
                'st_notification_shop' => array('where' => 'id_st_notification={$identify} AND id_shop={$id_shop}'),
                'where' => 'id_st_notification IN (select id_st_notification from {_DB_PREFIX_}st_notification_shop where id_shop={$id_shop})'
            ),
        ),
        'stpagebanner' => array(
            'st_page_banner' => array(
                'st_page_banner_lang' => array('where' => 'id_st_page_banner={$identify} AND id_lang={$id_lang}'),
                'st_page_banner_shop' => array('where' => 'id_st_page_banner={$identify} AND id_shop={$id_shop}'),
                'st_page_banner_font' => array('where' => 'id_st_page_banner={$identify}'),
                'where' => 'id_st_page_banner IN (select id_st_page_banner from {_DB_PREFIX_}st_page_banner_shop where id_shop={$id_shop})'
            ),
        ),
        'stowlcarousel' => array(
            'st_owl_carousel_group' => array(
                'st_owl_carousel' => array(
                    'st_owl_carousel_lang' => array('where' => 'id_st_owl_carousel={$identify} AND id_lang={$id_lang}'),
                    'st_owl_carousel_font' => array('where' => 'id_st_owl_carousel={$identify}'),
                    'where' => 'id_st_owl_carousel_group={$identify}',
                ),
                'st_owl_carousel_group_shop' => array('where' => 'id_st_owl_carousel_group={$identify} AND id_shop={$id_shop}'),
                'where' => 'id_st_owl_carousel_group IN (select id_st_owl_carousel_group from {_DB_PREFIX_}st_owl_carousel_group_shop where id_shop={$id_shop})'
            ),
        ),
        'stsidebar' => array(
            'st_sidebar' => array(
                'st_sidebar_lang' => array('where' => 'id_st_sidebar={$identify} AND id_lang={$id_lang}'),
                'st_sidebar_shop' => array('where' => 'id_st_sidebar={$identify} AND id_shop={$id_shop}'),
                'where' => 'id_st_sidebar IN (select id_st_sidebar from {_DB_PREFIX_}st_sidebar_shop where id_shop={$id_shop})'
            ),
        ),
        'social' => array(
            'st_social' => array(
                'st_social_lang' => array('where' => 'id_st_social={$identify} AND id_lang={$id_lang}'),
                'st_social_shop' => array('where' => 'id_st_social={$identify} AND id_shop={$id_shop}'),
                'where' => 'id_st_social IN (select id_st_social from {_DB_PREFIX_}st_social_shop where id_shop={$id_shop})'
            ),
        ),
        'stswiper' => array(
            'st_swiper_group' => array(
                'st_swiper' => array(
                    'st_swiper_lang' => array('where' => 'id_st_swiper={$identify} AND id_lang={$id_lang}'),
                    'st_swiper_font' => array('where' => 'id_st_swiper={$identify}'),
                    'where' => 'id_st_swiper_group={$identify}',
                ),
                'st_swiper_group_shop' => array('where' => 'id_st_swiper_group={$identify} AND id_shop={$id_shop}'),
                'where' => 'id_st_swiper_group IN (select id_st_swiper_group from {_DB_PREFIX_}st_swiper_group_shop where id_shop={$id_shop})'
            ),
        ),
    );
    public $global = array(
        'sql' => array(),
        'config' => array(
            'STSN_',
            // StCurrencyselector
            'ST_CURRENCIES_LABEL','ST_CURRENCIES_STYLE',
            // StCustomerSignIn
            'ST_USERINFO_DROPDOWN','SHOW_USER_INFO_ICONS',
            // StLanguageselector
            'ST_LANGUAGES_FLAGS','ST_LANGUAGES_STYLE',
            // StShoppingCart
            'PS_BLOCK_CART_AJAX','ST_CLICK_ON_HEADER_CART','ST_HOVER_DISPLAY_CP','ST_ADDTOCART_ANIMATION','ST_BLOCK_CART_STYLE','ST_BLOCK_CART_INFO','PS_BLOCK_CART_SHOW_CROSSSELLING','PS_BLOCK_CART_XSELL_LIMIT',
            // StTags
            'BLOCKTAGS_WIDE_ON_FOOTER','BLOCKTAGS_ALIGN','BLOCKTAGS_TITLE',
        )
    );
    public $data = array();
   
    public function __construct($data = array(), $context)
    {
        set_time_limit(600);
        $this->_debug_file = _PS_MODULE_DIR_.'stthemeeditor/config/store_data.dbg';
        if (_ST_DEMO_DEBUG_ && file_exists($this->_debug_file)) {
            @unlink($this->_debug_file);
        }
        if (is_array($data) && count($data)) {
            $this->data = $data;
        }
        $this->context = $context;
        $this->theme_manager = (new ThemeManagerBuilder($this->context, Db::getInstance()))->build();
        $this->theme_repository = (new ThemeManagerBuilder($this->context, Db::getInstance()))->buildRepository();
    }
    
    public function import_modules()
    {
        foreach($this->hooks AS $hook) {
            $id_hook = Hook::getIdByName($hook);
            $modules = (array)Hook::getModulesFromHook($id_hook);
            // Unregester modules in this hook.
            foreach($modules AS $module) {
                $inst = Module::getInstanceByName($module['name']);
                if (!is_object($inst) 
                || (strtoupper($inst->author) != 'SUNNYTOO.COM'
                && strtoupper($inst->author) != 'PRESTASHOP'
                && $inst->name != 'revsliderprestashop')
                || $inst->name == 'stthemeeditor') {
                    continue;
                }
                $inst->unregisterHook($id_hook, array((int)Context::getContext()->shop->id));
            }
            // Res slider
            /*if ($hook == 'displayFullWidthTop' && $module == 'revsliderprestashop') {
                $this->import_rev_slider($module->version);
            }*/
            // Import new modules.
            $this->import_module_data($hook);
            // Clear cache.
            Cache::clean('hook_module_list');
        }
        // Import global
        $themeeditor = Module::getInstanceByName('stthemeeditor');
        $exclude = array();
        foreach($themeeditor->defaults AS $key => $value) {
            if (!$value['exp']) {
                $exclude[] = 'STSN_'.strtoupper($key);
            }
        }
        if (isset($this->data['global'])) {
            foreach($this->data['global'] AS $key => $value) {
                if (!$value) {
                    continue;
                }
                foreach($value AS $tbls => $v) {
                    if ($key == 'sql' && $tbls && $v) {
                        $where_id_shop = '';
                        $s = array('{id_theme}');
                        $r = array(Context::getContext()->theme->id);
                        foreach(explode('|',$tbls) AS $table) {
                            $s[] = '{'.$table.'}';
                            $r[] = _DB_PREFIX_.$table;
                            $field = Db::getInstance()->executeS('DESC '._DB_PREFIX_.$table.' id_shop');
                            if (is_array($field) && count($field)) {
                                $where_id_shop = ' AND id_shop='.(int)Context::getContext()->shop->id;
                            }
                        }
                        $sql = str_replace($s, $r, $v).$where_id_shop;
                        if (_ST_DEMO_DEBUG_) {
                            @file_put_contents($this->_debug_file, $sql."\r\n", FILE_APPEND);
                        }
                        Db::getInstance()->execute($sql);
                    } elseif ($key == 'config') {
                        if (in_array($v['name'], $exclude)) {
                            continue;
                        }
                        $v['value'] = $this->exclude_image_type($v['name'],$v['value']);
                        Configuration::updateValue(strtoupper($v['name']), $v['value']);
                    }
                }
            }
        }
        
        // Import page layouts.
        if (isset($this->data['layouts']) && $this->data['layouts']) {
            $theme = $this->theme_repository->getInstanceByName($this->context->shop->theme->getName());
            $pages = Meta::getAllMeta($this->context->language->id);
            $default_layout = $theme->getDefaultLayout();
            $page_layouts = $this->data['layouts'];
            
            if ($default_layout && $pages) {
                $layouts = array();
                foreach($pages AS $page) {
                    $key = $page['page'];
                    if (!$key) {
                        continue;
                    }
                    if (key_exists($key, $page_layouts)) {
                        $layouts[$key] = $page_layouts[$key];
                    } else {
                        $layouts[$key] = $default_layout['key'];
                    }
                }
                $this->context->shop->theme->setPageLayouts($layouts);
                $this->theme_manager->saveTheme($this->context->shop->theme);    
            }
        }
        
        $this->import_menu();
        if (_ST_DEMO_DEBUG_) {
            @file_put_contents($this->_debug_file, print_r($this->data, true), FILE_APPEND);
        }
    }
    
    private function import_module_data($hook)
    {
        if (!$hook) {
            return false;
        }
        $content = $this->data;
        if(isset($content[$hook]) && $content[$hook]) {
            foreach($content[$hook] AS $module => $data) {
                $inst = Module::getInstanceByName($module);
                if (is_object($inst)) {
                    $inst->registerHook($hook, array((int)Context::getContext()->shop->id));
                }
                if (!is_object($inst) || !$inst->name) {
                    continue;
                }
                if (!is_array($data)) {
                    $data = (array)$data;
                }
                if (isset($data['disabled']) && $data['disabled'] || (!isset($data['disabled']) && $inst->name != 'stthemeeditor')) {
                    if (Module::isEnabled($module)) {
                        is_object($inst) && $inst->disable();    
                    }
                    continue;
                } elseif(!Module::isEnabled($module)) {
                    is_object($inst) && $inst->enable();
                }
                if (isset($data['sql']) && count($data['sql'])) {
                    $db = Db::getInstance();
                    foreach($data['sql'] AS $tbl => $values) {
                        $this->insert_data($tbl, $values);
                    }
                }
                if (isset($data['config']) && count($data['config'])) {
                    foreach($data['config'] AS $setting) {
                        $setting['value'] = $this->exclude_image_type($setting['name'], $setting['value']);
                        $rs =  Configuration::updateValue($setting['name'], $setting['value']);
                    }
                }
            }
        }
        return true;
    }
    
    protected function insert_data($table, $data, $ref_field='', $ref_id=0)
    {
        $db = Db::getInstance();
        $field = $db->executeS('Describe `'._DB_PREFIX_.$table.'` `active`');
        if(is_array($field) && count($field) && !in_array($table, $this->proc_table)) {
            if (is_array($data) && count($data) && key_exists($table.'_shop', $data[0])) {
                $sql = 'UPDATE '._DB_PREFIX_.$table.' SET `active` = 0';
                $sql .= ' WHERE id_'.$table.' IN (SELECT id_'.$table.' FROM '._DB_PREFIX_.$table.'_shop WHERE id_shop='.(int)Context::getContext()->shop->id.')';
                $db->execute($sql);
                if (_ST_DEMO_DEBUG_) {
                    @file_put_contents($this->_debug_file, $sql."\r\n", FILE_APPEND);
                }
            } else {
                $field = $db->executeS('Describe `'._DB_PREFIX_.$table.'` `id_shop`');
                if(is_array($field) && count($field)) {
                    $sql = 'UPDATE '._DB_PREFIX_.$table.' SET `active` = 0 WHERE `id_shop`='.(int)Context::getContext()->shop->id;
                    $db->execute($sql);
                    if (_ST_DEMO_DEBUG_) {
                        @file_put_contents($this->_debug_file, $sql."\r\n", FILE_APPEND);
                    }
                }
            }
            $this->proc_table[] = $table;
        }
        if (_ST_DEMO_DEBUG_) {
            @file_put_contents($this->_debug_file, print_r($data, true)."\r\n", FILE_APPEND);
        }
        if (!$data) {
            return false;
        }
        $id = 'id_'.$table;
        $remove_pri = false;
        $id_parent = false;
        $id_map = array();
        $field = $db->executeS('Describe `'._DB_PREFIX_.$table.'` `'.$id.'`');
        if (is_array($field) && count($field) && strpos($field[0]['Extra'], 'auto_increment') !== false) {
            $remove_pri = true;
        }
        $field = $db->executeS('Describe `'._DB_PREFIX_.$table.'` `id_parent`');
        if (is_array($field) && count($field)) {
            $id_parent = true;
        }
        foreach($data AS $value) {
            $old_id = 0;
            if ($remove_pri) {
                $old_id = $value[$id];
                // Remove primary ID.
                unset($value[$id]);
            }
            if ($ref_field && $ref_id) {
                if (key_exists($id, $value)) {
                    $value[$id] = (int)$ref_id;
                } else {
                    $value[$ref_field] = (int)$ref_id;
                }
            }
            
            $row = array();
            $children = array();
            foreach($value AS $k => $v) {
                if (is_array($v)) {
                    $children[$k] = $v;
                } elseif ($k == 'id_shop') {
                    $row[$k] = (int)Context::getContext()->shop->id;
                } else {
                    $v = $this->exclude_image_type($k, $v);
                    $row[$k] = pSQL($v, true);
                }
            }
            
            if ($id_parent && key_exists($row['id_parent'], $id_map)) {
                $row['id_parent'] = $id_map[$row['id_parent']];
            }
            
            if (_ST_DEMO_DEBUG_) {
                @file_put_contents($this->_debug_file, print_r($row, true)."\r\n".($id_parent ? '$id_map: '.print_r($id_map, true) : ''), FILE_APPEND);
            }
            if (key_exists('id_lang', $row)) {
                foreach(Language::getLanguages(false) AS $lang) {
                    $row['id_lang'] = $lang['id_lang'];
                    $db->insert($table, $row, false, true, Db::INSERT_IGNORE);
                }
                return true;
            }   
            if($db->insert($table, $row, false, true, Db::INSERT_IGNORE)) {
               $row_id = $db->Insert_ID();
               if (_ST_DEMO_DEBUG_) {
                    @file_put_contents($this->_debug_file, 'ID for '.$table.': '.$row_id."\r\n", FILE_APPEND);
               }
               if ($id_parent && !key_exists($old_id, $id_map)) {
                $id_map[$old_id] = $row_id;
               }
               // Insert data to reference table.
               foreach($children AS $tbl => $_data) {
                    if (!is_array($_data) || !count($_data)) {
                        continue;
                    }
                    $this->insert_data($tbl, $_data, $id, $row_id);
               }
            } else {
                if (_ST_DEMO_DEBUG_) {
                    @file_put_contents($this->_debug_file, 'Row wasn\'t saved: '.print_r($row, true)."\r\n", FILE_APPEND);
               }
            }
        }
    }
    
    public function exclude_image_type($k, $v)
    {
        if (!$v) {
            return $v;
        }
        $k = strtolower($k);
        if ($k == 'image_type' || strpos($k, 'image_type') !== false) {
            if ($v == 'big_default') {
                $v = 'medium_default';
            } elseif (in_array($v, $this->image_type_excluded)) {
                $v = 'home_default';
            }
        }
        return $v;
    }
    
    public function import_menu()
    {
        $db = Db::getInstance();
        $id_shop = (int)Context::getContext()->shop->id;
        $source_id_shop = isset($this->data['source_id_shop']) ? $this->data['source_id_shop'] : 0;
        // Without menu on the columns.
        $without_moc = in_array($source_id_shop, array(12));
        // Column menu
        $theme = $this->theme_repository->getInstanceByName($this->context->shop->theme->getName());
        $left = $theme->get('theme_settings.layouts.index') == 'layout-left-column';
        if ($left && !$without_moc && !$db->getValue('SELECT COUNT(0) FROM '._DB_PREFIX_.'st_mega_menu WHERE location=1 AND id_shop='.$id_shop)) {
            $db->execute("INSERT INTO `"._DB_PREFIX_."st_mega_menu`(`location`,`id_st_mega_column`,`id_parent`,
            `level_depth`,`id_shop`,`item_k`,`item_v`,`subtype`,`position`,`active`,`new_window`,`txt_color`,`link_color`,
            `bg_color`,`txt_color_over`,`bg_color_over`,`tab_content_bg`,`auto_sub`,`nofollow`,`hide_on_mobile`,`alignment`,
            `width`,`is_mega`,`sub_levels`,`sub_limit`,`item_limit`,`items_md`,`icon_class`,`item_t`,`cate_label_color`,
            `cate_label_bg`,`show_cate_img`,`bg_image`,`bg_repeat`,`bg_position`,`bg_margin_bottom`,`granditem`) 
            VALUES (1,0,0,0,".$id_shop.",0,'',0,1,1,0,'','','','','','',0,0,0,0,12.0,1,0,0,0,0,'',0,'','',0,'',0,0,0,0)");
            if ($indert_id = $db->Insert_ID()) {
                foreach(Language::getLanguages(false) AS $lang) {
                    $db->execute("INSERT INTO `"._DB_PREFIX_."st_mega_menu_lang`(`id_st_mega_menu`,`id_lang`,`title`,
                    `link`,`html`,`cate_label`) VALUES (".(int)$indert_id.",".(int)$lang['id_lang'].",'A sample menu','','','')");
                }
            }
        } elseif ($left && !$without_moc && $db->getValue('SELECT COUNT(0) FROM '._DB_PREFIX_.'st_mega_menu WHERE location=1 AND active=0 AND id_shop='.$id_shop)) {
            $db->execute('UPDATE '._DB_PREFIX_.'st_mega_menu SET active=1 WHERE location=1 AND id_shop='.$id_shop);
        } elseif ((!$left || $without_moc) && $db->getValue('SELECT COUNT(0) FROM '._DB_PREFIX_.'st_mega_menu WHERE location=1 AND id_shop='.$id_shop)) {
            $db->execute('UPDATE '._DB_PREFIX_.'st_mega_menu SET active=0 WHERE location=1 AND id_shop='.$id_shop);
        }
        // Vertical menu
        $vertical_id_shop = array(12);
        if (in_array($source_id_shop, $vertical_id_shop) && !$db->getValue('SELECT COUNT(0) FROM '._DB_PREFIX_.'st_mega_menu WHERE location=2 AND id_shop='.$id_shop)) {
            $db->execute("INSERT INTO `"._DB_PREFIX_."st_mega_menu`(`location`,`id_st_mega_column`,`id_parent`,
            `level_depth`,`id_shop`,`item_k`,`item_v`,`subtype`,`position`,`active`,`new_window`,`txt_color`,`link_color`,
            `bg_color`,`txt_color_over`,`bg_color_over`,`tab_content_bg`,`auto_sub`,`nofollow`,`hide_on_mobile`,`alignment`,
            `width`,`is_mega`,`sub_levels`,`sub_limit`,`item_limit`,`items_md`,`icon_class`,`item_t`,`cate_label_color`,
            `cate_label_bg`,`show_cate_img`,`bg_image`,`bg_repeat`,`bg_position`,`bg_margin_bottom`,`granditem`) 
            VALUES (2,0,0,0,".$id_shop.",0,'',0,1,1,0,'','','','','','',0,0,0,0,12.0,1,0,0,0,0,'',0,'','',0,'',0,0,0,0)");
            if ($indert_id = $db->Insert_ID()) {
                foreach(Language::getLanguages(false) AS $lang) {
                    $db->execute("INSERT INTO `"._DB_PREFIX_."st_mega_menu_lang`(`id_st_mega_menu`,`id_lang`,`title`,
                    `link`,`html`,`cate_label`) VALUES (".(int)$indert_id.",".(int)$lang['id_lang'].",'A sample vertical menu','','','')");
                }
            }
        } elseif(in_array($source_id_shop, $vertical_id_shop) && $db->getValue('SELECT COUNT(0) FROM '._DB_PREFIX_.'st_mega_menu WHERE location=2 AND active=0 AND id_shop='.$id_shop)) {
            $db->execute('UPDATE '._DB_PREFIX_.'st_mega_menu SET active=1 WHERE location=2 AND id_shop='.$id_shop);
        }  elseif (!in_array($source_id_shop, $vertical_id_shop) && $db->getValue('SELECT COUNT(0) FROM '._DB_PREFIX_.'st_mega_menu WHERE location=2 AND id_shop='.$id_shop)) {
            $db->execute('UPDATE '._DB_PREFIX_.'st_mega_menu SET active=0 WHERE location=2 AND id_shop='.$id_shop);
        }
    }
    
    public function import_rev_slider($version = '5.1.7')
    {
        if (version_compare($version, '5.1.7', '<')) {
            return false;
        }
        $sql_file = _PS_MODULE_DIR_.'stthemeeditor/config/rev_slider.sql';
        if (file_exists($sql_file)) {
            $db = Db::getInstance();
            if ($db->getValue('select count(0) from '._DB_PREFIX_.'revslider_sliders where `params` like "%displayFullWidthTop%"')) {
                return false;
            }
            $sql = @file_get_contents($sql_file);
            foreach(explode("\r", $sql) AS $sql) {
                $sql = str_replace('{_DB_PREFIX_}', _DB_PREFIX_, $sql);
                $sql = str_replace('{$id_shop}',(int)Context::getContext()->shop->id , $sql);
                $db->execute($sql);
            }
        }
        return true;
    }
    
    public function import_layerslider($hook = '')
    {
        return true;
        $module_name = 'layerslider';
        if (isset($this->data[$module_name]) && $this->data[$module_name] === true) {
            return true;
        }
        $inst = Module::getInstanceByName($module_name);
        if (!is_object($inst)) {
            return false;
        }
        if (isset($this->data[$module_name]) && count($this->data[$module_name])) {
            if (!Module::isEnabled($module_name)) {
                $inst->enable();
            }
            $inst->registerHook($hook);
            $db = Db::getInstance();
            if (!$db->getValue('SELECT COUNT(0) FROM '._DB_PREFIX_.'layerslider_module WHERE (`id_shop`='.$this->context->shop->id.' OR `id_shop`=0) AND `hook` LIKE \''.pSQL($hook).'\'')) {
                $row = $this->data[$module_name];
                $children = $row['children'];
                $children['id_shop'] = (int)$this->context->shop->id;
                unset($row['children']);
                unset($row['id']);
                $row['data'] = pSQL($row['data'], true);
                $children['pages'] = pSQL($children['pages'], true);
                // Insert data.
                if ($db->insert('layerslider', $row)) {
                    $children['id_slider'] = $db->Insert_ID();
                    $db->insert('layerslider_module', $children);
                }
            }
            $this->data[$module_name] = true;
        } elseif (!Shop::isFeatureActive() && Module::isEnabled($module_name)) {
            // If no data and not under mutli store, disable the module.
            // As the module must keep enable for multi store.
            $inst->disable();
        }
        return true;
    }
    public function export_modules()
    {
        $content = array();
        foreach($this->hooks AS $hook) {
            $id_hook = Hook::getIdByName($hook);
            $modules = (array)Hook::getModulesFromHook($id_hook);
            foreach($modules AS $module) {
                $data = array();
                $content[$hook][$module['name']] = array();
                $data = $this->export_module_data($module['name']);
                if (count($data)) {
                    $content[$hook][$module['name']] = $data;
                }
            }
        }
        // Export global
        $global = array('sql'=>array(),'config'=>array());
        
        foreach($this->global AS $key => $value) {
            foreach($value AS $k => $v) {
                if ($key == 'sql') {
                    $global['sql'][$k] = $v;
                } elseif ($key == 'config') {
                    $settings = Db::getInstance()->executeS('
                    SELECT name,value FROM 
                    (SELECT * FROM '._DB_PREFIX_.'configuration 
                    WHERE NAME LIKE "%'.$v.'%" 
                    AND (id_shop IS NULL OR id_shop = '.(int)Context::getContext()->shop->id.')
                    ORDER BY id_shop DESC) AS tmp  
                    GROUP BY name');
                    if (count($settings)) {
                        $global['config'] = array_merge($global['config'], $settings);
                    }
                }
            }
        }
        $content['global'] = $global;
        
        // Export page layouts.
        $theme = $this->theme_repository->getInstanceByName($this->context->shop->theme->getName());
        $content['layouts'] = $theme->getPageLayouts();
        
        $content['source_id_shop'] = (int)Context::getContext()->shop->id;
        // Export layerslider
        if ($layer_module = Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'layerslider_module WHERE `id_shop`='.$this->context->shop->id.' AND `hook` LIKE \'%displayFullWidthTop%\'')) {
            $layer = Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'layerslider WHERE `id`='.(int)$layer_module['id_slider']);
            if ($layer) {
                $layer['children'] = $layer_module;
                $content['layerslider'] = $layer;
            }
        }
        if (_ST_DEMO_DEBUG_) {
            @file_put_contents($this->_debug_file, print_r($content,true), FILE_APPEND);
        }
        return $content;
    }
    
    private function export_module_data($module)
    {
        if (!$module) {
            return false;
        }
        $data = array();
        $module_tables = $this->module_tables;
        $inst = Module::getInstanceByName($module);
        if (!is_object($inst) 
        || (strtoupper($inst->author) != 'SUNNYTOO.COM' 
        && strtoupper($inst->author) != 'PRESTASHOP'
        && $inst->name != 'revsliderprestashop') 
        || $inst->name == 'stthemeeditor') {
            return true;
        }
        // If module was disabled, only update the flag.
        if (Module::isInstalled($module) && Module::isEnabled($module)) {
            $data['disabled'] = 0;
        } else {
            $data['disabled'] = 1;
            return $data;
        }
        $db = Db::getInstance();
        // Export data from tables.
        $tables = isset($module_tables[$module]) && $module_tables[$module] ? $module_tables[$module] : '';
        if ($tables) {
            foreach($tables as $tbl => $value) {
                $data['sql'][$tbl]  = $this->fetch_data($tbl, $value);
                break;
            }
            // Remove this module tables as they were imported.
            unset($this->module_tables[$module]);
        }
        // Export module settings.
        if (method_exists($inst,'get_prefix') && $prefix = $inst->get_prefix()) {
            $settings = $db->executeS('
            SELECT name,value FROM 
            (SELECT * FROM '._DB_PREFIX_.'configuration 
            WHERE NAME LIKE "%'.$prefix.'%" 
            AND (id_shop IS NULL OR id_shop = '.(int)Context::getContext()->shop->id.')
            ORDER BY id_shop DESC) AS tmp  
            GROUP BY name');
            if (count($settings)) {
                $data['config'] = $settings;
            }
        }
        
        return $data;
    }
    
    protected function fetch_data($table, $values=array(), $identify=0)
    {
        $result = array();
        $id = 'id_'.$table;
        $id_lang = Context::getContext()->language->id;
        $id_shop = Context::getContext()->shop->id;
        $where =  str_replace(array('{$id_lang}', '{$id_shop}', '{$identify}', '{_DB_PREFIX_}'), array($id_lang, $id_shop, $identify, _DB_PREFIX_), $values['where']);
        $sql = 'SELECT * FROM '._DB_PREFIX_.$table.' WHERE '.$where;
        $result = Db::getInstance()->executeS($sql);
        unset($values['where']);
        
        $field = Db::getInstance()->executeS('Describe `'._DB_PREFIX_.$table.'` `id_parent`');
        if(is_array($field) && count($field)) {
            foreach($result AS $value) {
                if ($subs = $this->get_subs($table, $value[$id])) {
                    $result = array_merge($result, $subs);
                }
            }  
        }
        if (_ST_DEMO_DEBUG_) {
            @file_put_contents($this->_debug_file, $table.'=====>'.$sql."\r\n".print_r($result, true), FILE_APPEND);
        }
        if ($result) {
            foreach($values AS $table => $value) {
                foreach($result AS &$row) {
                    $row[$table] = $this->fetch_data($table, $value, $row[$id]);
                }
            }
        }
        return $result;
    }
    
    protected function get_subs($table='', $id=0)
    {
        $ret = array();
        if (!$table || !$id) {
            return $ret;
        }
        $sql = 'SELECT * FROM '._DB_PREFIX_.$table.' WHERE id_parent='.(int)$id;
        if($ret = Db::getInstance()->executeS($sql)) {
            foreach($ret AS $value) {
                $ret = array_merge($ret, $this->get_subs($table, $value['id_'.$table]));
            }
        }
        return $ret;
    }

}