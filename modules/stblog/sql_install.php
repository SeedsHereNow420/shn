<?php
/*
* 2007-2014 PrestaShop
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
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

$sql = array();
$sql[_DB_PREFIX_.'st_blog'] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_blog` (
`id_st_blog` int(10) NOT NULL AUTO_INCREMENT,
`status` tinyint(2) unsigned NOT NULL DEFAULT 0,
`comments_status` tinyint(1) unsigned NOT NULL DEFAULT 0,
`active` tinyint(1) unsigned NOT NULL DEFAULT 1,
`type` tinyint(1) unsigned NOT NULL DEFAULT 1,
`position` int(10) unsigned NOT NULL DEFAULT 0,
`id_st_blog_category_default` int(10) unsigned DEFAULT NULL,
`counter` int(10) unsigned NOT NULL DEFAULT 0,
`date_add` datetime NOT NULL,
`date_upd` datetime NOT NULL,
`accept_comment` tinyint(1) unsigned NOT NULL DEFAULT 1,
PRIMARY KEY (`id_st_blog`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[_DB_PREFIX_.'st_blog_lang'] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_blog_lang` (
`id_st_blog` int(10) unsigned NOT NULL,
`id_lang` int(10) unsigned NOT NULL,
`name` varchar(128) NOT NULL,
`meta_title` varchar(128) NOT NULL,
`meta_description` varchar(255) default NULL,
`meta_keywords` varchar(255) default NULL,
`content` longtext,
`content_short` text,
`link_rewrite` varchar(128) NOT NULL,
`video` text default NULL,
`author` varchar(64) default NULL,
PRIMARY KEY (`id_st_blog`,`id_lang`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[_DB_PREFIX_.'st_blog_product_link'] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_blog_product_link` (
`id_st_blog` int(10) unsigned NOT NULL,
`id_product` int(10) unsigned NOT NULL,
`id_shop` int(10) unsigned NOT NULL DEFAULT 0,
`position` int(10) unsigned NOT NULL DEFAULT 0
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[_DB_PREFIX_.'st_blog_shop'] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_blog_shop` (
`id_st_blog` INT( 11 ) UNSIGNED NOT NULL,
`id_shop` INT( 11 ) UNSIGNED NOT NULL,
`active` tinyint(1) unsigned NOT NULL DEFAULT 1, 
`id_st_blog_category_default` int(10) unsigned DEFAULT NULL,
`counter` int(10) unsigned NOT NULL DEFAULT 0,
PRIMARY KEY (`id_st_blog`, `id_shop`),
KEY `id_shop` (`id_shop`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[_DB_PREFIX_.'st_blog_category'] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_blog_category` (
`id_st_blog_category` int(10) unsigned NOT NULL AUTO_INCREMENT,
`id_parent` int(10) unsigned NOT NULL,
`level_depth` tinyint(3) unsigned NOT NULL DEFAULT 0,
`path` varchar(255) DEFAULT NULL,
`nleft` int(10) unsigned NOT NULL DEFAULT 0,            
`nright` int(10) unsigned NOT NULL DEFAULT 0,           
`active` tinyint(1) unsigned NOT NULL DEFAULT 0,
`is_root_category` tinyint(1) unsigned NOT NULL DEFAULT 0,
`date_add` datetime NOT NULL,
`date_upd` datetime NOT NULL,
`position` int(10) unsigned NOT NULL default 0,
PRIMARY KEY (`id_st_blog_category`),
KEY `category_parent` (`id_parent`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[_DB_PREFIX_.'st_blog_category_lang'] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_blog_category_lang` (
`id_st_blog_category` int(10) unsigned NOT NULL,
`id_lang` int(10) unsigned NOT NULL,
`name` varchar(128) NOT NULL,
`description` text,
`link_rewrite` varchar(128) NOT NULL,
`meta_title` varchar(128) DEFAULT NULL,
`meta_keywords` varchar(255) DEFAULT NULL,
`meta_description` varchar(255) DEFAULT NULL,
PRIMARY KEY (`id_st_blog_category`,`id_lang`),
KEY `category_name` (`name`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[_DB_PREFIX_.'st_blog_category_blog'] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_blog_category_blog` (
`id_st_blog_category` int(10) unsigned NOT NULL,
`id_st_blog` int(10) unsigned NOT NULL,
`position` int(10) unsigned NOT NULL default 0,
PRIMARY KEY (`id_st_blog_category`,`id_st_blog`),          
KEY `id_st_blog` (`id_st_blog`)  
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[_DB_PREFIX_.'st_blog_category_shop'] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_blog_category_shop` (
`id_st_blog_category` INT( 11 ) UNSIGNED NOT NULL,
`id_shop` INT( 11 ) UNSIGNED NOT NULL ,
`position` int(10) unsigned NOT NULL default 0,
PRIMARY KEY (`id_st_blog_category`, `id_shop`),
KEY `id_shop` (`id_shop`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[_DB_PREFIX_.'st_blog_tag_map'] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_blog_tag_map` (
`id_st_blog_tag` int(10) unsigned NOT NULL,
`id_st_blog` int(10) unsigned NOT NULL,
PRIMARY KEY (`id_st_blog_tag`,`id_st_blog`),
KEY `id_st_blog_tag` (`id_st_blog_tag`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[_DB_PREFIX_.'st_blog_tag'] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_blog_tag` (
`id_st_blog_tag` int(10) NOT NULL AUTO_INCREMENT,
`id_lang` int(10) unsigned NOT NULL,
`name` varchar(32) NOT NULL,
PRIMARY KEY (`id_st_blog_tag`),
KEY `tag_name` (`name`),
KEY `id_lang` (`id_lang`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';


$sql[_DB_PREFIX_.'st_blog_image'] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_blog_image` (
   `id_st_blog_image` int(10) unsigned NOT NULL AUTO_INCREMENT,
   `id_st_blog` int(10) unsigned NOT NULL,
   `type` tinyint(3) unsigned DEFAULT 1,
   `position` smallint(2) unsigned NOT NULL DEFAULT 0,
   PRIMARY KEY (`id_st_blog_image`),
   KEY `image_blog` (`id_st_blog`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[_DB_PREFIX_.'st_blog_image_lang'] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_blog_image_lang` (
   `id_st_blog_image` int(10) unsigned NOT NULL,
   `id_lang` int(10) unsigned NOT NULL,
   PRIMARY KEY (`id_st_blog_image`,`id_lang`),
   KEY `id_st_blog_image` (`id_st_blog_image`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[_DB_PREFIX_.'st_blog_image_shop'] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_blog_image_shop` (
   `id_st_blog_image` int(11) unsigned NOT NULL,
   `id_shop` int(11) unsigned NOT NULL,
   KEY `id_st_blog_image` (`id_st_blog_image`,`id_shop`),
   KEY `id_shop` (`id_shop`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[_DB_PREFIX_.'st_blog_slider'] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_blog_slider` (
    `id_st_blog_slider` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `type` tinyint(1) unsigned NOT NULL DEFAULT 1,
    `subtype` tinyint(1) unsigned NOT NULL DEFAULT 1,
    `id_st_blog_category` int(10) unsigned NOT NULL DEFAULT 0,
    `id_shop` int(10) unsigned NOT NULL,    
    `article_nbr` int(10) unsigned NOT NULL DEFAULT 0, 
    `article_order` int(10) unsigned NOT NULL DEFAULT 0, 
    `active` tinyint(1) unsigned NOT NULL DEFAULT 1, 
    `position` int(10) unsigned NOT NULL DEFAULT 0,
    `display_on` int(10) unsigned NOT NULL DEFAULT 1,
    `top_margin` varchar(10) DEFAULT NULL,
    `bottom_margin` varchar(10) DEFAULT NULL,
    `top_padding` varchar(10) DEFAULT NULL,
    `bottom_padding` varchar(10) DEFAULT NULL,
    `bg_pattern` tinyint(2) unsigned NOT NULL DEFAULT 0, 
    `bg_img` varchar(255) DEFAULT NULL,
    `bg_color` varchar(7) DEFAULT NULL,
    `speed` float(4,1) unsigned NOT NULL DEFAULT 0.1,
    `bg_img_v_offset` int(10) unsigned NOT NULL DEFAULT 0,
    `title_color` varchar(7) DEFAULT NULL,
    `title_hover_color` varchar(7) DEFAULT NULL,
    `text_color` varchar(7) DEFAULT NULL,
    `price_color` varchar(7) DEFAULT NULL,
    `grid_bg` varchar(7) DEFAULT NULL,
    `grid_hover_bg` varchar(7) DEFAULT NULL,
    `link_hover_color` varchar(7) DEFAULT NULL,
    `direction_color` varchar(7) DEFAULT NULL,
    `direction_color_hover` varchar(7) DEFAULT NULL,
    `direction_color_disabled` varchar(7) DEFAULT NULL,
    `direction_bg` varchar(7) DEFAULT NULL,
    `direction_hover_bg` varchar(7) DEFAULT NULL,
    `direction_disabled_bg` varchar(7) DEFAULT NULL,
    `title_align` tinyint(1) unsigned NOT NULL DEFAULT 0, 
    `title_font_size` int(10) unsigned NOT NULL DEFAULT 0, 
    `direction_nav` tinyint(1) unsigned NOT NULL DEFAULT 1,
    `hide_direction_nav_on_mob` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
    `control_nav` tinyint(1) unsigned NOT NULL DEFAULT 0,
    `hide_control_nav_on_mob` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
    `control_bg` varchar(7) DEFAULT NULL,
    `control_bg_hover` varchar(7) DEFAULT NULL,
    `pag_nav_bg` varchar(7) DEFAULT NULL,
    `pag_nav_bg_hover` varchar(7) DEFAULT NULL,
    `title_bottom_border` varchar(10) DEFAULT NULL,
    `title_bottom_border_color` varchar(7) DEFAULT NULL,
    `title_bottom_border_color_h` varchar(7) DEFAULT NULL,
    
    `grid` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
    `random` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
    `nbr` TINYINT(3) unsigned NOT NULL DEFAULT 8, 
    `soby` TINYINT(3) unsigned NOT NULL DEFAULT 1,
    `spacing_between` SMALLINT(3) UNSIGNED NOT NULL DEFAULT 15,
    `image_type` varchar(64) DEFAULT NULL,
    `slideshow` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1, 
    `s_speed` INT(10) UNSIGNED NOT NULL DEFAULT 7000,
    `a_speed` INT(10) UNSIGNED NOT NULL DEFAULT 400,
    `pause_on_hover` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
    `rewind_nav` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
    `lazy` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
    `move` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
    `hide_mob` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
    `display_sd` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
    `countdown_on` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
    `aw_display` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
    
    `display_pro_col` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
    `nbr_col` TINYINT(3) UNSIGNED NOT NULL DEFAULT 6,
    `soby_col` TINYINT(3) UNSIGNED NOT NULL DEFAULT 1,
    `items_col` TINYINT(3) UNSIGNED NOT NULL DEFAULT 2,
    `slideshow_col` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
    `s_speed_col` INT(10) UNSIGNED NOT NULL DEFAULT 7000,
    `a_speed_col` INT(10) UNSIGNED NOT NULL DEFAULT 400,
    `pause_on_hover_col` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
    `rewind_nav_col` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
    `lazy_col` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
    `move_col` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
    `hide_mob_col` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
    `countdown_on_col` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
    `aw_display_col` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
    
    `nbr_fot` TINYINT(3) UNSIGNED NOT NULL DEFAULT 4,
    `soby_fot` TINYINT(3) UNSIGNED NOT NULL DEFAULT 1,
    `aw_display_fot` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
    `hide_mob_fot` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
    `footer_wide` varchar(3) DEFAULT NULL,
    
    `pro_per_fw` tinyint(2) unsigned NOT NULL DEFAULT 0,
    `pro_per_xxl` tinyint(2) unsigned NOT NULL DEFAULT 5,  
    `pro_per_xl` tinyint(2) unsigned NOT NULL DEFAULT 4, 
    `pro_per_lg` tinyint(2) unsigned NOT NULL DEFAULT 4, 
    `pro_per_md` tinyint(2) unsigned NOT NULL DEFAULT 3, 
    `pro_per_sm` tinyint(2) unsigned NOT NULL DEFAULT 3, 
    `pro_per_xs` tinyint(2) unsigned NOT NULL DEFAULT 2, 
    
    `video_v_offset` int(10) unsigned NOT NULL DEFAULT 0,
    `video_poster` varchar(255) DEFAULT NULL,
    `video_mpfour` varchar(255) DEFAULT NULL,
    `video_webm` varchar(255) DEFAULT NULL,
    `video_ogg` varchar(255) DEFAULT NULL,
    `video_loop` tinyint(1) unsigned NOT NULL DEFAULT 1, 
    `video_muted` tinyint(1) unsigned NOT NULL DEFAULT 0,
    `view_more` tinyint(1) unsigned NOT NULL DEFAULT 0,   
    
    PRIMARY KEY (`id_st_blog_slider`)
    ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;';