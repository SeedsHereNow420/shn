{**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2016 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
<!doctype html>
<html lang="">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    {block name='head_seo'}
      <title>{block name='head_seo_title'}{/block}</title>
      <meta name="description" content="{block name='head_seo_description'}{/block}">
      <meta name="keywords" content="{block name='head_seo_keywords'}{/block}">
    {/block}
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {block name='stylesheets'}
      <style type="text/css">
      {literal}
        body{text-align:center; font-family: Arial,sans-serif;font-size:16px;}
        #layout-error{padding-top: 3em;}
        .page_heading{color:#444;font-size: 2.2em;margin:0 0 26px;}
        .page_heading:before, .page_heading:after{ content: ''; display: inline-block; width: 12px; font-size: 0; overflow: hidden; height: 12px; background: #444; vertical-align: middle;margin-top:-2px;border-radius: 12px;} 
        .page_heading:before{margin-right: 16px;}
        .page_heading:after{margin-left: 16px;}
        .st_logo{font-weight: bold;font-size: 3em;border: 6px solid #444;border-radius: 100px;width: 50px;height: 50px;line-height: 50px;margin: 0 auto 26px;}
        .layout-error{-js-display: flex; display: flex; flex-wrap: wrap;height:100%;} 
        @media (max-width: 767px) {body{font-size:14px;}.page_heading{font-size: 1.5em;}}
      {/literal}
      </style>
    {/block}
  </head>

  <body>

    <div id="layout-error">
      {block name='content'}
        <p>Hello world! This is HTML5 Boilerplate.</p>
      {/block}
    </div>

  </body>

</html>
