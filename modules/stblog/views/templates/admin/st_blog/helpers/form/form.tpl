{*
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
*}
{extends file="helpers/form/form.tpl"}
{block name="input"}
	{if $input.type == 'blog_cateogroes'}
		{$input.html}
	{else}
		{$smarty.block.parent}
	{/if}
{/block}
{block name="other_input"}
    {if $key == 'gallary'}
    {include file="./gallery.tpl" gallery=$field.images}
	{/if}
	{if $key == 'selector'}
    {include file="./select_products.tpl"}
	{/if}
{/block}
{block name="autoload_tinyMCE"}
    {literal}
	tinySetup({
		editor_selector :"autoload_rte",
		plugins : "colorpicker link image paste pagebreak table contextmenu filemanager table code media autoresize textcolor template",
		toolbar1 : "code,|,bold,italic,underline,strikethrough,|,alignleft,aligncenter,alignright,alignfull,formatselect,|,blockquote,colorpicker,pasteword,|,bullist,numlist,|,outdent,indent,|,link,unlink,|,cleanup,|,media,image,|,template",
        templates : "{/literal}{$smarty.const._MODULE_DIR_}{literal}stblog/template_list.php"
	});
    {/literal}
{/block}
{block name="script"}
{if isset($PS_ALLOW_ACCENTED_CHARS_URL) && $PS_ALLOW_ACCENTED_CHARS_URL}
	var PS_ALLOW_ACCENTED_CHARS_URL = 1;
{else}
	var PS_ALLOW_ACCENTED_CHARS_URL = 0;
{/if}
hideOtherLanguage({$default_form_language});
var ps_force_friendly_product = '{$ps_force_friendly_blog}';
{/block}