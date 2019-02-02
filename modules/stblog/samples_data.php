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

$_data = array();

$_data['st_blog'] =array(
    array(
        'name'          => 'test',
        'content_short' => 'test',
        'content'       => 'test',
        'link_rewrite'  => 'test',
        'tags'          => 'tag1,tag2',
        
        'type'          => '1',
        'categoryBox'   => '1,2',
        'id_st_blog_category_default' => '1'
    ),
);

$_data['st_blog_image'] = array(
    array(
        'id_st_blog_image'  => '1',
        'id_st_blog'        => '1',
        'type'              => '1',
    ),
);

$_data['st_blog_category'] = array(
	array(
        'id_st_blog_category' => 0,
        'id_parent' => 0, 
        'level_depth' => 0,
        'active' => 1, 
        'is_root_category' => 1, 
        'date_add'=>date('Y-m-d H:i:s',time()), 
        'date_upd'=>date('Y-m-d H:i:s',time()),
        'name'=>'Home',
        'link_rewrite'=>'home',
        'child' => array(
            array(
                'level_depth' => 1, 
                'active' => 1, 
                'is_root_category' => 0, 
                'date_add'=>date('Y-m-d H:i:s',time()), 
                'date_upd'=>date('Y-m-d H:i:s',time()),
                'name'=>'Blog category sample',
                'link_rewrite'=>'blog-category-sample',
            ),
        ),        			
    ),
);

