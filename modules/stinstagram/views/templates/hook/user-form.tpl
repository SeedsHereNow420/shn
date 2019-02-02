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
<script type="text/javascript">
//<![CDATA[
{literal}
function connect_instagram(){
	var params = new Array();
	params['client_id'] = '{/literal}{$client_id}{literal}';
	params['redirect_uri'] = '{/literal}{$redirect_uri}{literal}?url='+encodeURIComponent(location.href);
    params['scope'] = '{/literal}{$scope}{literal}';
	params['response_type'] = '{/literal}{$response_type}{literal}';

	var form = document.createElement('form');
	form.setAttribute('method', 'get');
	form.setAttribute('action', '{/literal}{$action}{literal}');

	for(var key in params)
    {
		if(params.hasOwnProperty(key)) 
        {
			var hidden = document.createElement('input');
			hidden.setAttribute('type', 'hidden');
			hidden.setAttribute('name', key);
			hidden.setAttribute('value', params[key]);
			form.appendChild(hidden);
		}
	}
	document.body.appendChild(form);
	form.submit();
}
{/literal}
//]]>
</script>
<style style="text/css">
#a_linker{
    color:#f00;
    font-weight:bold;
    display:block;
}
</style>
<div class="panel col-lg-12">
<p><a href="javascript:;" id="a_linker" onclick="connect_instagram();">{l s='The first step to use this module to show Instagram media on your site is clicking on this link to build a connection with Instagram.' d='Modules.Stinstagram.Admin'}</a></p>
<p>{l s='By using this module, you are agreeing to the' d='Modules.Stinstagram.Admin'} <a href="http://instagram.com/about/legal/terms/api/" target="_blank">{l s='Instagram API Terms of Use' d='Modules.Stinstagram.Admin'}</a>.</p>
</div>