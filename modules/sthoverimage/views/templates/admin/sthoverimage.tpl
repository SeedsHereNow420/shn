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
    <p class="alert-text">{l s='Click on one image below to set it as the hover image. The cover image is not showing on the list.' d='Admin.Theme.Transformer'}</p>
</div>
<div id="product-images-container-sthoverimage" class="m-b-2">
    <div id="product-images-dropzone-sthoverimage" class="panel dropzone ui-sortable col-md-12 dz-started" data-max-size="8">
        {foreach $images as $image}
        <div class="dz-preview dz-image-preview">
            <div class="dz-image bg" data-id="{$image.id}" style="background-image: url('{$image.base_image_url}-home_default.{$image.format}');"></div>
            <div class="ishover{if !$image['hover']} hide{/if}">{l s='Hover' d='Admin.Theme.Transformer'}</div>
        </div>
        {/foreach}
    </div>
</div>
<script type="text/javascript">
jQuery(function($){
    var module_url = '{$current_url}';
    {literal}
    $('#product-images-dropzone-sthoverimage .dz-image').click(function(){
        var _this = $(this);
        $.getJSON(module_url+'&ajax=1&action=update_hover&id_image='+_this.data('id'), function(json){
            if (json.r) {
                $('#product-images-dropzone-sthoverimage').find('.ishover').hide();
                
                if (_this.parent().find('.ishover').hasClass('hide')) {
                    _this.parent().find('.ishover').removeClass('hide').show(); 
                } else {
                    _this.parent().find('.ishover').addClass('hide').hide();    
                }
                
            }
        });
    });
    {/literal}
});
</script>