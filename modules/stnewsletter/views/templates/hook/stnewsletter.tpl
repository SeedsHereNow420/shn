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
	{assign var='has_news_letter_popup' value=0}
    {foreach $news_letter_array as $ec}
        {if $ec.location==4}
        	{if !$has_news_letter_popup}
        		{$has_news_letter_popup=1}
        		<div class="modal fade st_news_letter_popup_wrap" id="st_news_letter_popup_{$ec.id_st_news_letter}" data-id_st="{(int)$ec.id_st_news_letter}" data-delay_popup="{(int)$ec.delay_popup}" data-hide_on_mobile="{(int)$ec.hide_on_mobile}" data-show_popup="{(int)$ec.show_popup}" data-cookies_time="{(int)$ec.cookies_time}" tabindex="-1" role="dialog" aria-labelledby="{l s='Newsletter' d='Shop.Theme.Transformer'}" aria-hidden="true">
	        		<div class="modal-dialog" role="document">
		      			<div class="modal-content">
				          <button type="button" class="close st_modal_close" data-dismiss="modal" aria-label="{l s='Close' d='Shop.Theme.Transformer'}">
				            <span aria-hidden="true">&times;</span>
				          </button>
					        <div class="modal-body st_modal_body">
					        	<div id="st_news_letter_{$ec.id_st_news_letter}" class="st_news_letter st_news_letter_popup {if !$ec.template} text-{$ec.text_align} text-md-2 {/if}">
				         	      <div class="st_news_letter_box">
				                    <div class="alert alert-danger hidden"></div>
				                    <div class="alert alert-success hidden"></div> 
                                    <div class="news_letter_{$ec.template} {if $ec.template} flex_container flex_column_md text-md-2 {/if}">    
					            	{if $ec.content}<div class="st_news_letter_content style_content flex_child {if $ec.template} m-r-1 {/if}">{$ec.content nofilter}</div>{/if}
					            	{if $ec.show_newsletter}
					            	<form action="{$ajax_url}" method="post" class="st_news_letter_form flex_child_md">
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
									                    {l s='Subscribe' d='Shop.Theme.Transformer'}
									                </button>
								                </span>
											</div>
										</div>
										<input type="hidden" name="action" value="0" />
									</form>				
									{/if}
                                    </div>
				            	  </div>
									{if !$ec.show_popup}
									<div class="st_news_letter_do_not_show_outer clearfix">
				                    	<div class="st_news_letter_do_not_show_inner form-check fr mb-0">
                                            <label class="form-check-label">
                                              <input type="checkbox" name="st_news_letter_do_not_show" class="st_news_letter_do_not_show form-check-input" autocomplete="off" />
                                              {l s='Do not show again' d='Shop.Theme.Transformer'}
                                            </label>
                                        </div>
									</div>
									{/if}	
					            </div>
					        </div>
				        </div>
			        </div>
		        </div>
        	{/if}
        {else}
	        {if isset($ec.is_full_width) && $ec.is_full_width}<div id="st_news_letter_container_{$ec.id_st_news_letter}" class="st_news_letter_container full_container {if $ec.hide_on_mobile}hidden-xs{/if} block"><div class="container"><div class="row"><div class="col-12 col-sm-12">{/if}
	            <div id="st_news_letter_{$ec.id_st_news_letter}" class="st_news_letter_{$ec.id_st_news_letter} {if $ec.hide_on_mobile}hidden-xs{/if} {if !isset($ec.is_full_width) || !$ec.is_full_width}block{/if} st_news_letter {if isset($ec.is_column) && $ec.is_column} column_block {/if}">
                    {if $ec.title_align!=3}
                    <div class="title_block flex_container title_align_{(int)$ec.title_align}">
                        <div class="flex_child title_flex_left"></div>
                        <div class="title_block_inner">
                        {l s='Newsletter' d='Shop.Theme.Transformer'}
                        </div>
                        <div class="flex_child title_flex_right"></div>
                    </div>
                    {/if}
	            	<div class="st_news_letter_box {if !$ec.template} text-{$ec.text_align} text-md-2 {/if} block_content">
                    <div class="alert alert-danger hidden"></div>
                    <div class="alert alert-success hidden"></div>
                    <div class="news_letter_{$ec.template} {if $ec.template} flex_container flex_column_md {/if}"> 
                    {if $ec.content}<div class="st_news_letter_content style_content flex_child {if $ec.template} m-r-1 {/if}">{$ec.content nofilter}</div>{/if}
                    {if $ec.show_newsletter}
	            	<form action="{$ajax_url}" method="post" class="st_news_letter_form flex_child_md">
                            {if $ec.show_gender}
                            <label>{l s='Title' d='Shop.Theme.Transformer'}</label>
                            {foreach Gender::getGenders() key=k item=gender}
                                <label for="id_gender{$gender->id}" class="radio-inline">
                                <input type="radio" name="id_gender" id="id_gender{$gender->id}" value="{$gender->id|intval}" {if isset($smarty.post.id_gender) && $smarty.post.id_gender == $gender->id}checked="checked"{/if} />
                                {$gender->name}</label>
                            {/foreach}
                            {/if}
                            <div class="st_news_letter_form_inner">
	                        <div class="input-group round_item js-parent-focus input-group-with-border" >
								<input class="form-control st_news_letter_input js-child-focus" type="text" name="email" value="{if isset($value) && $value}{$value}{/if}" placeholder="{l s='Your e-mail' d='Shop.Theme.Transformer'}" />
				                <span class="input-group-btn">
				                	<button type="submit" name="submitStNewsletter" class="btn btn-less-padding st_news_letter_submit link_color">
					                    {if isset($ec.is_column) && $ec.is_column}<i class="fto-mail-alt"></i>{else}{l s='Subscribe' d='Shop.Theme.Transformer'}{/if}
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
	        {if isset($ec.is_full_width) && $ec.is_full_width}</div></div></div></div>{/if}
        {/if}
    {/foreach}
{/if}
