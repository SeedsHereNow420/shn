{*
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
*  @author    ST-themes
*  @copyright 2007-2016 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*  
*  
*}
<div class="panel col-lg-12">
<div id="ins_account_info" class="clearfix">
	<img src="{$profile_picture}" />
	<div>{l s='Name' d='Modules.Stinstagram.Admin'}:{$full_name}</div>
	<div>{l s='Username' d='Modules.Stinstagram.Admin'}:{$username}</div>
	{if $bio}<div>{l s='Bio' d='Modules.Stinstagram.Admin'}:{$bio}</div>{/if}
</div>
<p><a href="{$disconnent_url}">{l s='Click here to disconnect from instagram.' d='Modules.Stinstagram.Admin'}</a></p>
<p>{l s='By using this module, you are agreeing to the' d='Modules.Stinstagram.Admin'} <a href="http://instagram.com/about/legal/terms/api/" target="_blank">{l s='Instagram API Terms of Use' d='Modules.Stinstagram.Admin'}</a>.</p>
</div>