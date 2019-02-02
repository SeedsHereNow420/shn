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
{if isset($news_letter_array) && count($news_letter_array)}
    {foreach $news_letter_array as $ec}
		<section id="st_news_letter_{$ec.id_st_news_letter}" class="st_news_letter_{$ec.id_st_news_letter} {if $ec.hide_on_mobile} hidden-md-down {/if} footer_block block {if !$ec.is_stacked_footer} col-lg-{if $ec.span}{$ec.span}{else}3{/if} {/if}">
		    {if $ec.title_align!=3}
    		<div class="title_block flex_container title_align_{(int)$ec.title_align}">
                <div class="flex_child title_flex_left"></div>
                <div class="title_block_inner">{l s='Newsletter' d='Shop.Theme.Transformer'}</div>
                <div class="flex_child title_flex_right"></div>
                <div class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></div></div>
			{/if}
			<div class="footer_block_content {if $ec.title_align==3}keep_open{/if} {if !$ec.template} text-{$ec.text_align} text-md-2 {/if}">
				<div class="st_news_letter_box">
                <div class="alert alert-danger hidden"></div>
                <div class="alert alert-success hidden"></div>
                <div class="news_letter_{$ec.template} {if $ec.template} flex_container flex_column_md {if $ec.text_align==2} flex_center {elseif $ec.text_align==3} flex_right {else} flex_left {/if} text-md-2 {/if}">
            	{if $ec.content}<div class="st_news_letter_content style_content flex_child_md {if $ec.template} mar_r10 {/if}">{$ec.content nofilter}</div>{/if}
            	{if $ec.show_newsletter}
            	<form action="{$ajax_url}" method="post" class="st_news_letter_form flex_child">
                    {if isset($ec.show_gender) && $ec.show_gender}
                        <div class="st_news_letter_gender">
                        {foreach Gender::getGenders() key=k item=gender}
                            <label for="id_gender{$gender->id}" class="radio-inline">
                            <input type="radio" name="id_gender" id="id_gender{$gender->id}" value="{$gender->id|intval}" {if isset($smarty.post.id_gender) && $smarty.post.id_gender == $gender->id}checked="checked"{/if} />
                            {$gender->name}</label>
                        {/foreach}
                        </div>
                    {/if}
					<div class="st_news_letter_form_inner">
						<div class="input-group round_item js-parent-focus input-group-with-border" >
							<input class="form-control st_news_letter_input js-child-focus" type="text" name="email" value="{if isset($value) && $value}{$value}{/if}" placeholder="{l s='Your e-mail' d='Shop.Theme.Transformer'}" />
			                <span class="input-group-btn">
			                	<button type="submit" name="submitStNewsletter" class="btn btn-less-padding st_news_letter_submit link_color">
				                    <i class="fto-mail-alt"></i>
				                </button>
			                </span>
						</div>
					</div>
					<input type="hidden" name="action" value="0" />
				</form>
				{/if}
                </div>
				</div>
			</div>
		</section>
    {/foreach}
{/if}