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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{extends file="helpers/form/form.tpl"}{block name="autoload_tinyMCE"}
    {literal}
	tinySetup({
		editor_selector :"autoload_rte",
		plugins : "colorpicker link image paste pagebreak table contextmenu filemanager table code media autoresize textcolor template",
		toolbar1 : "code,|,bold,italic,underline,strikethrough,|,alignleft,aligncenter,alignright,alignfull,formatselect,fontsizeselect,|,blockquote,colorpicker,pasteword,|,bullist,numlist,|,outdent,indent,|,link,unlink,|,cleanup,|,media,image,|,template",
        templates : "{/literal}{$smarty.const._MODULE_DIR_}{literal}steasycontent/template_list.php",
        valid_children : '+a[div|h1|h2|h3|h4|h5|h6|h7|span|img|em|p]',
        fontsize_formats: '10px 12px 14px 16px 18px 22px 30px 38px 46px 58px 68px',
        block_formats: 'Paragraph=p;Address=address;Pre=pre;Div=div;Header 1=h1;Header 2=h2;Header 3=h3;Header 4=h4;Header 5=h5;Header 6=h6',
        verify_html : false
	});
    {/literal}
{/block}
{block name="script"}
$(document).ready(function(){
	$('#column_count').change(function(e){
		handle_columns($(this).val())
	});
	handle_columns($('#column_count').val())
});
function handle_columns(val){
	var column_string = '';
	var selected = 12/val;
	for(var i = 0; i < val; i++)
	{
		if(val==7 || val==9 || val==11)
			selected = i<(val-1) ? 1 : 13-val;
		column_string += '<div class="column_item">';
		column_string += '<select id="{$input.name}_width_'+i+'" name="{$input.name}_width_'+i+'">';
		$.each([1,1.2,1.5,2,2.4,3,4,5,6,7,8,9,10,11,12], function( index, w ) {
			column_string += '<option value="'+w+'" '+(selected==w ? ' selected="selected" ' : '')+'>'+w+'/12</option>';
		});
		column_string += '</select>';
		column_string += '<div><input id="{$input.name}_name_'+i+'" type="text" name="{$input.name}_name_'+i+'" value="Column '+(i+1)+'" /></div>';
		column_string += '</div>';
	}
	$('#column_list_preview').removeClass().addClass('column_'+val).html(column_string);
}
{/block}
{block name="input"}
	{if $input.type == 'row_generater'}
	    <div class="col-lg-12">
	    	<p>{l s='How many columns do you want to have for this row' d='Admin.Theme.Transformer'}</p>
			<select id="column_count" name="column_count" class="fixed-width-xl">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3" selected="selected">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select>
			<p>{l s='Set with for each column' d='Admin.Theme.Transformer'}</p>
			<div id="column_list_preview" class="clearfix">
				<div class="column_item">'
					<select id="{$input.name}_width_1" name="{$input.name}_width_1">
						<option value="1">1/12</option>
						<option value="1">1.2/12</option>
						<option value="1">1.5/12</option>
						<option value="2">2/12</option>
						<option value="2">2.4/12</option>
						<option value="3">3/12</option>
						<option value="4">4/12</option>
						<option value="5">5/12</option>
						<option value="6">6/12</option>
						<option value="6">7/12</option>
						<option value="8">8/12</option>
						<option value="8">9/12</option>
						<option value="10">10/12</option>
						<option value="10">11/12</option>
						<option value="12" selected="selected">12</option>
					</select>
					<div><input id="{$input.name}_name_1" type="text" name="{$input.name}_name_1" value="Column 1" /></div>
				</div>
			</div>
			<p class="help-block">{l s='Column names can be empty' d='Admin.Theme.Transformer'}</p>
			<p class="help-block">{l s='If the sum of all column widths is larger than 1 in a row, then extra columns would not be displayed on the front office. For example, you have 4/12, 3/12, 4/12 and 5/12, then the last 5/12 would not be displayed.' d='Admin.Theme.Transformer'}</p>
		</div>
		{elseif $input.type == 'fontello'}
		<div class="fontello_wrap">
			<a id="btn_{$input.name}" class="btn btn-default" data-toggle="modal" href="#" data-target="#modal_{$input.name}">
				<i class="{$fields_value[$input.name]}"></i>{l s='Edit' d='Admin.Theme.Transformer'}
			</a>
			<div class="modal fade" id="modal_{$input.name}" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">{l s="Icon" d='Admin.Theme.Transformer'}</h4>
					</div>
					<div class="modal-body">
						<ul class="fontello_list clearfix">
							<li>
								<label>
									<input type="radio"	name="{$input.name}" id="{$input.name}" value=""{if $fields_value[$input.name] == ''} checked="checked"{/if}/>
									{l s="None" d='Admin.Theme.Transformer'}
								</label>
							</li>
							{foreach $input.values.classes as $class}
								<li>
								<label>
								<input type="radio"	name="{$input.name}" id="{$input.name}_{$class}" value="{$class|escape:'html':'UTF-8'}"{if $fields_value[$input.name] == $class} checked="checked"{/if}/>
									<i class="{$class}"></i>
								</label>
								</li>
							{/foreach}
						</ul>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">{l s="OK" d='Admin.Theme.Transformer'}</button>
					</div>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				jQuery(function($){
					$("input[name={$input.name}]").change(function() { 
						$("#btn_{$input.name} i").removeClass().addClass($("input[name={$input.name}]:checked").val());
					});
				});
			</script>
			<style type="text/css">
				@font-face {
				  font-family: 'fontello';
				  src: url('{$input.values.module_name}../../themes/{$input.values.theme_name}/font-fontello/font/fontello.eot');
				  src: url('{$input.values.module_name}../../themes/{$input.values.theme_name}/font-fontello/font/fontello.eot#iefix') format('embedded-opentype'),
				       url('{$input.values.module_name}../../themes/{$input.values.theme_name}/font-fontello/font/fontello.woff2') format('woff2'),
				       url('{$input.values.module_name}../../themes/{$input.values.theme_name}/font-fontello/font/fontello.woff') format('woff'),
				       url('{$input.values.module_name}../../themes/{$input.values.theme_name}/font-fontello/font/fontello.ttf') format('truetype'),
				       url('{$input.values.module_name}../../themes/{$input.values.theme_name}/font-fontello/font/fontello.svg#fontello') format('svg');
				  font-weight: normal;
				  font-style: normal;
				}
				{$input.values.css}
			</style>
		</div>
	{elseif $input.type == 'fontello_list'}
		<div class="fontello_wrap">
			<a id="btn_{$input.name}" class="btn btn-default" data-toggle="modal" href="#" data-target="#modal_fontello">
				{l s='Click here' d='Admin.Theme.Transformer'}
			</a>
			<div class="modal fade" id="modal_fontello" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">{l s="Icon" d='Admin.Theme.Transformer'}</h4>
					</div>
					<div class="modal-body">
						<p><code>&lt;em class="fto-diamond"&gt;&lt;span class="unvisible"&gt;&amp;nbsp;&lt;/span&gt;&lt;/em&gt;</code></p>
						<p>{l s='You can use this code to add a icon to your custom content, put it in cource code.' d='Admin.Theme.Transformer'} <a href="javascript:;" onclick="{literal}$('#how_to_put_icons').toggle();return false;{/literal}">{l s='Here is a screenshot' d='Admin.Theme.Transformer'}</a>. {l s='Alert fto-diamond as you needed. "fto_1x" is used to change the size of icons, here are some other classes:' d='Admin.Theme.Transformer'} fto_small,fto_large,fto_0x,fto_1x,fto_2x...</p>
						<p id="how_to_put_icons" style="display:none;">
							<img src="{$smarty.const._MODULE_DIR_}steasycontent/views/img/how_to_put_icons.jpg" />
						</p>
						<ul class="fontello_list fontello_detail_list clearfix">
							{foreach $input.values.classes AS $class}
								<li>
									<i class="{$class}"></i>{$class}
								</li>
							{/foreach}
						</ul>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">{l s="OK" d='Admin.Theme.Transformer'}</button>
					</div>
					</div>
				</div>
			</div>
			<style type="text/css">
				@font-face {
				  font-family: 'fontello';
				  src: url('{$input.values.module_name}../../themes/{$input.values.theme_name}/font-fontello/font/fontello.eot');
				  src: url('{$input.values.module_name}../../themes/{$input.values.theme_name}/font-fontello/font/fontello.eot#iefix') format('embedded-opentype'),
				       url('{$input.values.module_name}../../themes/{$input.values.theme_name}/font-fontello/font/fontello.woff2') format('woff2'),
				       url('{$input.values.module_name}../../themes/{$input.values.theme_name}/font-fontello/font/fontello.woff') format('woff'),
				       url('{$input.values.module_name}../../themes/{$input.values.theme_name}/font-fontello/font/fontello.ttf') format('truetype'),
				       url('{$input.values.module_name}../../themes/{$input.values.theme_name}/font-fontello/font/fontello.svg#fontello') format('svg');
				  font-weight: normal;
				  font-style: normal;
				}
				{$input.values.css}
			</style>
		</div>
	{elseif $input.type == 'predefinedtempaltes'}
		{assign var="input_value" value="_"|explode:$fields_value[$input.name]}
		<div class="pre_box">
			<div class="pre_box_title">Select a predefined template here, and then select a predefined style below. Selected combination is in red</div>
			<ul class="easy_image_list easy_pre_temp_list clearfix">
			{foreach $input.values as $k_t => $v_t}
				<li class="{if $input_value[0] == $k_t} easy_selected {/if}" id="easy_pre_temp_{$k_t}" data-pre_template="{$k_t}">
					<img src="{$input.image_path}views/img/{$input.name}/{$k_t}.jpg" class="easy_imgage" />
					<div class="easy_image_name">{l s='Template' d='Admin.Theme.Transformer'} {$k_t}</div>
				</li>
			{/foreach}
			</ul>
		</div>
		<div class="pre_box">
			<div class="pre_box_title">Predefined styles.</div>
		{foreach $input.values as $k_t => $v_t}
			<ul id="easy_pre_style_{$k_t}" class="easy_image_list easy_pre_style_list clearfix {if $input_value[0] == $k_t} style_selected {/if}">
				{if $v_t && count($v_t)}
					{foreach $v_t as $style}
					<li id="essy_pre_{$k_t|cat:'_'|cat:$style}"><label><input type="radio" {if $fields_value[$input.name] == $k_t|cat:'_'|cat:$style} checked="checked" {/if} value="{$k_t|cat:'_'|cat:$style}" name="{$input.name}" autocomplete="off"><img src="{$input.image_path}views/img/{$input.name}/{$k_t|cat:'_'|cat:$style}.jpg" class="easy_imgage"  /><span class="easy_image_name">{l s='Style' d='Admin.Theme.Transformer'} {$style}</span></label></li>
					{/foreach}
				{/if}
			</ul>
		{/foreach}
		</div>

		<script type="text/javascript">
			jQuery(function($){
				$('.easy_pre_temp_list li').click(function(){
			        $(this).addClass('easy_clicked').siblings().removeClass('easy_clicked');
			        $('#easy_pre_style_'+$(this).data('pre_template')).addClass('style_selected').siblings().removeClass('style_selected');        
			    });
			    $('.easy_pre_style_list input:radio').click(function(){
			        handle_pre_temp_list();
			    });
			    handle_pre_temp_list();		
			});
			
			var handle_pre_temp_list = function(){
			    var easy_pre = $('.easy_pre_style_list input:radio:checked').val();
			    if(easy_pre)
			    {
			    	var easy_pre_arr = easy_pre.split('_');

				    $('.easy_pre_style_list li').removeClass('easy_selected');
				    $('#essy_pre_'+easy_pre).addClass('easy_selected');

				    $('#easy_pre_temp_'+easy_pre_arr[0]).addClass('easy_selected').siblings().removeClass('easy_selected');
			    }
			};
		</script>
	{elseif $input.type == 'dropdownlistgroup'}
			<div class="row">
				{foreach $input.values.medias as $media=>$mv}
					<div class="col-xs-4 col-sm-3">
						<label data-html="true" data-toggle="tooltip" class="label-tooltip" data-original-title="{if $media=='fw'}{l s='If this is set and this module is hooked to the displayFullWidthXXX hooks, then this module will be displayed in full screen.' d='Admin.Theme.Transformer'}{elseif $media=='xxl'}{l s='Desktops (>1400px)' d='Admin.Theme.Transformer'}{elseif $media=='xl'}{l s='Desktops (>1200px)' d='Admin.Theme.Transformer'}{elseif $media=='lg'}{l s='Desktops (>992px)' d='Admin.Theme.Transformer'}{elseif $media=='md'}{l s='Tablets (>768px)' d='Admin.Theme.Transformer'}{elseif $media=='sm'}{l s='Phones (>544px)' d='Admin.Theme.Transformer'}{elseif $media=='xs'}{l s='Phones (<544px)' d='Admin.Theme.Transformer'}{/if}">{if $media=='fw'}{l s='Full screen' d='Admin.Theme.Transformer'}{elseif $media=='xxl'}{l s='Extra large devices' d='Admin.Theme.Transformer'}{elseif $media=='xl'}{l s='Large devices' d='Admin.Theme.Transformer'}{elseif $media=='lg'}{l s='Medium devices' d='Admin.Theme.Transformer'}{elseif $media=='md'}{l s='Small devices' d='Admin.Theme.Transformer'}{elseif $media=='sm'}{l s='Extra small devices' d='Admin.Theme.Transformer'}{elseif $media=='xs'}{l s='Extremely small devices' d='Admin.Theme.Transformer'}{/if}</label>
						<select name="{$input.name}_{$media}" id="{$input.name}_{$media}" class="fixed-width-md" autocomplete="off">
						{if $media=='fw'}<option value="0" {if !$fields_value[$input['name']|cat:"_"|cat:$media]} selected="selected" {/if}></option>{/if}
            			{for $foo=1 to $input.values.maximum}
	                        <option value="{$foo}" {if $fields_value[$input['name']|cat:"_"|cat:$media] == $foo || (!$fields_value[$input['name']|cat:"_"|cat:$media] && $mv == $foo)} selected="selected" {/if}>{$foo}</option>
	                    {/for}
            			</select>
					</div>
				{/foreach}
			</div>
	{elseif $input.type == 'go_to_adv_editor'}
		<div class="col-lg-9">
		<button id="go_to_adv_editor" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_adv_editor" data-url="{$input.name}">{l s='Open text editor' d='Admin.Theme.Transformer'}</button>
		<a href="{$input.name_blank}" target="_blank" class="btn btn-primary" title="{l s='Open text editor in a new window' d='Admin.Theme.Transformer'}">{l s='Open text editor in a new window' d='Admin.Theme.Transformer'}</a>
		<!-- <button id="toggle_tinymce" type="button" class="btn btn-primary">{l s='Toggle tinymce text editor' d='Admin.Theme.Transformer'}</button> -->

			<div class="modal fade" id="modal_adv_editor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">{l s='Text editor' d='Admin.Theme.Transformer'} <a href="{$input.name_blank}" target="_blank" title="{l s='Open in new window' d='Admin.Theme.Transformer'}">{l s='Open in new window' d='Admin.Theme.Transformer'}</a></h4>
					</div>
					<div class="modal-body">
						<iframe id="adv_editor_iframe" src="" width="100%" height="500" frameborder="0" allowfullscreen=""></iframe>
					</div>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				jQuery(function($){
        			$('#modal_adv_editor').on('show.bs.modal', function (e) {
        				/*if(typeof(tinyMCE)!=='undefined')
        					tinyMCE.remove();*/
						if(!$("#adv_editor_iframe").attr("src"))
						  $("#adv_editor_iframe").attr('src', $("#go_to_adv_editor").data("url"));
					});
					/*$('#toggle_tinymce').on('click', function (e){
						if(typeof(tinyMCE)==='undefined' || !tinyMCE.editors.length)
							tinySetup({
								editor_selector :"manual_rte"
							});
						else
							tinyMCE.remove();
					});*/
				});
			</script>
		</div>
	{else}
		{$smarty.block.parent}
	{/if}
{/block}