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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2017 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<link href="{$module_dir}views/css/admin.css" rel="stylesheet" type="text/css"/>
<div class="alert alert-info" role="alert">
    <i class="material-icons">help</i>
    <p class="alert-text">{l s='Click a sticker to add it on on the product, click it once more to remove it from the product .' d='Admin.Theme.Transformer'}</p>
</div>
<div id="product-images-container-ststickers" class="m-b-2">
    <div id="product-images-dropzone-ststickers" class="panel dropzone ui-sortable col-md-12 dz-started" data-max-size="8">
        {foreach $stickers as $sticker}
        <div class="dz-preview dz-image-preview" data-id_st_sticker="{$sticker.id_st_sticker}" data-id_st_sticker_map="{$sticker.id_st_sticker_map}" >
            <div class="dz-details">
                {if $sticker.name}
                    <div>{l s='Name:' d='Admin.Theme.Transformer'}{$sticker.name}</div>
                {else}
                    <div>{l s='Id:' d='Admin.Theme.Transformer'}{$sticker.id_st_sticker}</div>
                {/if}
                {if $sticker.text}<div>{l s='Text:' d='Admin.Theme.Transformer'}{$sticker.text}</div>{/if}
            </div>
            <div class="dz-image bg" style="{if $sticker.image_multi_lang}background-image: url('{$sticker.image_multi_lang}');{/if}"></div>
            <div class="ishover {if !$sticker['id_st_sticker_map']} hide{/if}">{l s='Selected' d='Admin.Theme.Transformer'}</div>
        </div>
        {/foreach}
    </div>
</div>
<script type="text/javascript">
jQuery(function($){
    var module_url = '{$current_url}';
    var id_product = '{$id_product}'
    {literal}
    $('#product-images-dropzone-ststickers .dz-preview').click(function(){
        var _this = $(this);
        $.getJSON(module_url+'&ajax=1&act=changeProductSticker&id_st_sticker_map='+_this.data('id_st_sticker_map')+'&id_st_sticker='+_this.data('id_st_sticker')+'&id_product='+id_product, function(json){
            if (json.r && json.d) {
                _this.find('.ishover').show();
                _this.data('id_st_sticker_map', json.d);
            } else {
                _this.find('.ishover').hide();
                _this.data('id_st_sticker_map', 0);
            }
        });
    });
    {/literal}
});
</script>