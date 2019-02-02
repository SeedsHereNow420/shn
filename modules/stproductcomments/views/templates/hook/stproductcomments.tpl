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
<section class="pccomment_block">
{if $nbComments}
    {include file='module:stproductcomments/views/templates/hook/pcomments_header.tpl'}
    {include file='module:stproductcomments/views/templates/hook/pcomments_filters.tpl'}
	{include file='module:stproductcomments/views/templates/hook/pcomments_list.tpl'}
{else}
    {if $can_comment}<div class="mb-2">{include file='module:stproductcomments/views/templates/hook/pcomments_write.tpl' classname="go" is_first_comment=1}</div>{/if}
  <div class="" role="alert" data-alert="warning">
    {l s='No comments' d='Shop.Theme.Transformer'}
  </div>
{/if}
</section>