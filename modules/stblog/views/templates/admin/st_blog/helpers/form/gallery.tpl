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
{if count($gallery)}
<div class="row">
	<div class="form-group">
		<label class="control-label col-lg-{if $gallery.id_st_blog}3{else}4{/if} file_upload_label">
			
			<span class="label-tooltip" data-toggle="tooltip"
				title="{l s='Format:'} JPG, GIF, PNG. {l s='Filesize:'} {$gallery.max_image_size|string_format:"%.2f"} {l s='MB max.'}">
				{if $gallery.id_st_blog}{l s='Add a new image to this blog:'}{else}{l s='You must save the blog before adding gallery.'}{/if}
			</span>
		</label>
		<div class="col-lg-9">
			{if $gallery.id_st_blog}{$gallery.image_uploader}{/if}
		</div>
	</div>
</div>

<table class="table tableDnD" id="imageTable">
	<thead>
		<tr class="nodrag nodrop"> 
			<th class="fixed-width-sm"><span class="title_box">{l s='Image'}</span></th>
			<th class="center fixed-width-xs"><span class="title_box">{l s='Position'}</span></th>
			{if $gallery.shops}
			{foreach from=$gallery.shops item=shop}
				<th class="center fixed-width-xs"><span class="title_box">{$shop.name}</span></th>
			{/foreach}
			{/if}
			<th class="center fixed-width-xs"></th>
		</tr>
	</thead>
	<tbody id="imageList">
	</tbody>
</table>
<table id="lineType" style="display:none;">
	<tr id="image_id">
		<td>
			<a href="image_path" class="fancybox">
				<img src="image_path" alt="legend" title="legend" class="img-thumbnail" />
			</a>
		</td>
		<td id="td_image_id" class="pointer dragHandle center positionImage">
			image_position
		</td>
		{if $gallery.shops}
			{foreach from=$gallery.shops item=shop}
			<td class="center">
				<input type="checkbox" class="image_shop" name="id_image" id="{$shop.id_shop}image_id" value="{$shop.id_shop}" />
			</td>
			{/foreach}
		{/if}
		<td class="center">
			<a href="#" class="delete_gallery_image pull-right btn btn-default" >
					<i class="icon-trash"></i> {l s='Delete this image'}
			</a>
		</td>
	</tr>
</table>

<script type="text/javascript">
	var upbutton = '{l s='Upload an image'}';
	var token = '{$gallery.token}';
	var come_from = '{$gallery.table}';
	var success_add =  '{l s='The image has been successfully added.'}';
	var id_tmp = 0;
	var current_shop_id = {$gallery.current_shop_id|intval};
    var tb_pathToImage = "../img/loadingAnimation.gif";
	{literal}
	//Ready Function

	function imageLine(id, path, position, shops)
	{
		line = $("#lineType").html();
		line = line.replace(/image_id/g, id);
		line = line.replace(/image_path/g, path);
		line = line.replace(/image_position/g, position);
		line = line.replace(/<tbody>/gi, "");
		line = line.replace(/<\/tbody>/gi, "");
		if (shops != false)
		{
			$.each(shops, function(key, value){
				if (value == 1)
					line = line.replace('id="' + key + '' + id + '"','id="' + key + '' + id + '" checked=checked');
			});
		}
		$("#imageList").append(line);
	}

	$(document).ready(function(){
		{/literal}
		{foreach from=$gallery.images item=image}
			assoc = {literal}"{"{/literal};
			{if $gallery.shops}
				{foreach from=$gallery.shops item=shop}
					assoc += '"{$shop.id_shop}" : {if $gallery.object->isAssociatedToGalleryShop($image.id_image, $shop.id_shop)}1{else}0{/if},';
				{/foreach}
			{/if}
			if (assoc != {literal}"{"{/literal})
			{
				assoc = assoc.slice(0, -1);
				assoc += {literal}"}"{/literal};
				assoc = jQuery.parseJSON(assoc);
			}
			else
				assoc = false;
			imageLine({$image.id_image}, "{$image.image}", {$image.position}, assoc);
		{/foreach}
		{literal}
		$("#imageTable").tableDnD(
		{
			onDrop: function(table, row) {
			current = $(row).attr("id");
			stop = false;
			image_up = "{";
			$("#imageList").find("tr").each(function(i) {
				$("#td_" +  $(this).attr("id")).html(i + 1);
				if (!stop || (i + 1) == 2)
					image_up += '"' + $(this).attr("id") + '" : ' + (i + 1) + ',';
			});
			image_up = image_up.slice(0, -1);
			image_up += "}";
			updateImagePosition(image_up);
			}
		});

		/**
		 * on success function 
		 */
		function afterDeleteGalleryImage(data)
		{
			data = $.parseJSON(data);
			if (data)
			{
				id = data.id;
				if(data.success)
				{
					$("#" + id).remove();
                    refreshImagePositions($("#imageTable"));
                    showSuccessMessage(data.success);
				}
                else
                	showErrorMessage(data.error);
			}
		}

		$('.delete_gallery_image').die().live('click', function(e)
		{
			e.preventDefault();
			id = $(this).parent().parent().attr('id');
			if (confirm("{/literal}{l s='Are you sure?' js=1}{literal}"))
			doAdminAjax({
					"action":"deleteGalleryImage",
					"id_image":id,
					"id_st_blog" : {/literal}{$gallery.id_st_blog}{literal},
					"token" : "{/literal}{$gallery.token}{literal}",
					"tab" : "AdminStBlog",
					"ajax" : 1 }, afterDeleteGalleryImage
			);
		});
		
		$('.image_shop').die().live('click', function()
		{
			active = false;
			if ($(this).attr("checked"))
				active = true;
			id = $(this).parent().parent().attr('id');
			id_shop = $(this).attr("id").replace(id, "");
			doAdminAjax(
			{
				"action":"UpdateGalleryImageShopAsso",
				"id_image":id,
				"id_shop": id_shop,
				"active":active,
				"token" : "{/literal}{$token}{literal}",
				"tab" : "AdminStBlog",
				"ajax" : 1 
			});
		});
		
		function updateImagePosition(json)
		{
			doAdminAjax(
			{
				"action":"updateImagePosition",
				"json":json,
				"token" : "{/literal}{$gallery.token}{literal}",
				"tab" : "AdminStBlog",
				"ajax" : 1
			});

		}
		
		function delQueue(id)
		{
			$("#img" + id).fadeOut("slow");
			$("#img" + id).remove();
		}
		
        function refreshImagePositions(imageTable)
        {
        	var reg = /_[0-9]$/g;
        	var up_reg  = new RegExp("imgPosition=[0-9]+&");
        
        	imageTable.find("tbody tr").each(function(i,el) {
        		$(el).find("td.positionImage").html(i + 1);
        	});
        	imageTable.find("tr td.dragHandle a:hidden").show();
        	imageTable.find("tr td.dragHandle:first a:first").hide();
        	imageTable.find("tr td.dragHandle:last a:last").hide();
        }
		
		$('.fancybox').fancybox();
	});
	{/literal}
</script>
{/if}
