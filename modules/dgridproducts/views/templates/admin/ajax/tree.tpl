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
*  @author    SeoSA <885588@bk.ru>
*  @copyright 2012-2017 SeoSA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{if isset($view_header) && $view_header && isset($root) && $root}
	<div class="tree_categories_header">
		<a class="collapse_all btn btn-default button" href="#" style="display: none;">
			<i class="icon-collapse-alt"></i>
			{l s='Collapse all' mod='dgridproducts'}
		</a>
		<a class="expand_all btn btn-default button" href="#">
			<i class="icon-expand-alt"></i>
			{l s='Expand all' mod='dgridproducts'}
		</a>
		<a class="check_all_associated_categories btn btn-default button" href="#">
			<i class="icon-check-sign"></i>
			{l s='Check all' mod='dgridproducts'}
		</a>
		<a class="uncheck_all_associated_categories btn btn-default button" href="#">
			<i class="icon-check-empty"></i>
			{l s='Uncheck all' mod='dgridproducts'}
		</a>
        <span class="twitter-typeahead" style="position: relative; display: inline-block;">
			<input class="tt-hint" type="text" autocomplete="off" spellcheck="off" disabled="" style="position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; background: none 0% 0% / auto repeat scroll padding-box border-box rgb(245, 248, 249);">
			<input type="text" id="associated-categories-tree-categories-search" class="search-field tt-query" placeholder="search..." autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top; background-color: transparent;">
			<span style="position: absolute; left: -9999px; visibility: hidden; white-space: nowrap; font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif, FontAwesome; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;">
			</span>
			<span class="tt-dropdown-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none;">
			</span>
		</span>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			var categories_for_search = [];
			$('.tree_categories input').each(function(e) {
				categories_for_search[e] = { id : $(this).val(), name : $(this).data('name') };
			});
			$("#associated-categories-tree-categories-search").typeahead({
				name: '',
				valueKey: 'name',
				local: categories_for_search
			});
			$("#associated-categories-tree-categories-search").keypress(function( event ) {
				if ( event.which == 13 ) {
					event.stopPropagation();
				}
			});
		});
		function checkedCaterogy(obj) {
			var selector_category = '.tree_categories input[value='+obj.datum.id+']';
			$(selector_category).attr('checked', 'checked');
			$(selector_category).parent().addClass("tree_selected");
			$(selector_category).parents('ul[class ^= "tree_"]').each(function() {
				$(this).removeClass('tree_close').addClass('tree_open');
				$(this).find('.icon-folder-close').removeClass('icon-folder-close').addClass('icon-folder-open');
			});
		}
	</script>
{/if}
{if isset($categories)}
	<ul {if isset($root) && $root}class="{if isset($class_tree)}{$class_tree|escape:'quotes':'UTF-8'}{else}tree_categories{/if} tree_root"{/if}>
        {if isset($categories[$id_category])}
            {foreach from=$categories[$id_category] item=category}
                <li class="tree_item">
                    <span class="tree_label {if isset($selected_categories) && in_array($category['infos']['id_category'], $selected_categories)}tree_selected{/if}">
                        <input data-name="{$category['infos']['name']|escape:'quotes':'UTF-8'}" {if isset($selected_categories) && in_array($category['infos']['id_category'], $selected_categories)}checked{/if} class="tree_input" type="{if isset($multiple) && $multiple}checkbox{else}radio{/if}" name="categoryBox[]" value="{$category['infos']['id_category']|escape:'quotes':'UTF-8'}" />
                        <label class="tree_toogle">
                            {if isset($categories[$category['infos']['id_category']]) && count($categories[$category['infos']['id_category']])}
                                <i class="icon-folder-close"></i>
                            {else}
                                <i class="tree-dot"></i>
                            {/if}
                            {$category['infos']['name']|escape:'quotes':'UTF-8'}
                            {if isset($categories[$category['infos']['id_category']]) && count($categories[$category['infos']['id_category']])}
                                <span class="tree_counter"></span>
                            {/if}
                        </label>
                    </span>
                    {if isset($categories[$category['infos']['id_category']]) && count($categories[$category['infos']['id_category']])}
                        {include file="./tree.tpl" categories=$categories id_category=$category['infos']['id_category'] selected_categories=$selected_categories root=false}
                    {/if}
                </li>
            {/foreach}
        {/if}
	</ul>
{/if}