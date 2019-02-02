{*
* 2007-2017 PrestaShop
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
*  @author    ST-themes <hellolee@gmail.com>
*  @copyright 2007-2017 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*}
{if isset($st_groups)}
<div class="pro_list_attributes">
{foreach from=$st_groups key=id_attribute_group item=group}
	{if $group.attributes|@count}
        {if ($group.group_type == 'select' and ($show_pro_attr==1 || array_sum($group.attributes_quantity)) )}
    		<p>
    			<strong>{$group.name|escape:'htmlall':'UTF-8'} :&nbsp;</strong>
{foreach from=$group.attributes key=id_attribute item=group_attribute}
{if $show_pro_attr==1 || $group.attributes_quantity[$id_attribute]}
{$group_attribute|escape:'htmlall':'UTF-8'}&nbsp;
{/if}
{/foreach}
            </p>
		{elseif ($group.group_type == 'color' and ($show_pro_attr==1 || array_sum($group.attributes_quantity)) )}
		    <p>
                <strong>{$group.name|escape:'htmlall':'UTF-8'} :&nbsp;</strong>
{foreach from=$group.attributes key=id_attribute item=group_attribute}
{if $show_pro_attr==1 || $group.attributes_quantity[$id_attribute]}
{$group_attribute}&nbsp;
{/if}
{/foreach}
            </p>
		{elseif ($group.group_type == 'radio' and ($show_pro_attr==1 || array_sum($group.attributes_quantity)) )}
		    <p>
                <strong>{$group.name|escape:'htmlall':'UTF-8'} :&nbsp;</strong>
{foreach from=$group.attributes key=id_attribute item=group_attribute}
{if $show_pro_attr==1 || $group.attributes_quantity[$id_attribute]}
{$group_attribute|escape:'htmlall':'UTF-8'}&nbsp;
{/if}
{/foreach}
            </p>
		{/if}
	{/if}
{/foreach}
</div>
{/if}