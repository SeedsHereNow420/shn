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
<div class="top_bar_item dropdown_wrap qrcode_drop pro_right_item">
	<div class="dropdown_tri dropdown_tri_in header_item">
        {if $qr_label==0 || $qr_label==2}<i class="fto-qrcode{if $qr_label==0} mar_r4 {/if}"></i>{/if}{if $qr_label==0 || $qr_label==1}{l s='QR code' d='Shop.Theme.Transformer'}<i class="fto-angle-down arrow_down arrow"></i><i class="fto-angle-up arrow_up arrow"></i>{/if}
    </div>
	<div class="dropdown_list">
		<div class="dropdown_box text-center">
			<a href="{$qr_image_link}" class="qrcode_link " target="_blank" rel="nofollow" title="{l s='Scan the QR code to open this page on your phone.' d='Shop.Theme.Transformer'}">
				{if $qr_load}
				<i class="fto-spin5 animate-spin"></i>
				{else}
				<img src="{$qr_image_link}" width="{$qr_size}" height="{$qr_size}" alt="{l s='Scan the QR code to open this page on your phone.' d='Shop.Theme.Transformer'}" />
				{/if}
			</a>
		</div>
	</div>
</div>