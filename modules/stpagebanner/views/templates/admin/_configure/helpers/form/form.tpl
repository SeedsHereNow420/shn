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
{extends file="helpers/form/form.tpl"}{block name="autoload_tinyMCE"}
    {literal}
	tinySetup({
		editor_selector :"autoload_rte",
		plugins : "colorpicker link image paste pagebreak table contextmenu filemanager table code media autoresize textcolor template",
		toolbar1 : "code,|,bold,italic,underline,strikethrough,|,alignleft,aligncenter,alignright,alignfull,formatselect,|,blockquote,colorpicker,pasteword,|,bullist,numlist,|,outdent,indent,|,link,unlink,|,cleanup,|,media,image",
        valid_children : '+a[div|h1|h2|h3|h4|h5|h6|h7|span|img|em|p]',
        fontsize_formats: '10px 12px 14px 16px 18px 22px 30px 38px 46px 58px 68px',
        block_formats: 'Paragraph=p;Address=address;Pre=pre;Div=div;Header 1=h1;Header 2=h2;Header 3=h3;Header 4=h4;Header 5=h5;Header 6=h6',
        verify_html : false
	});
    {/literal}
{/block}