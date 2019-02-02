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
<div class="alert alert-info" role="alert">
    <i class="material-icons">help</i>
    <p class="alert-text">{l s='Enter youtube or vimeo urls here. Examples https://www.youtube.com/watch?v=kVlkhVyCrSY and https://vimeo.com/113707290' d='Admin.Theme.Transformer'}</p>
</div>
<div class="m-b-2">
    <div class="row">
        <div class="col-xl-9 col-lg-8">
          <fieldset class="form-group">
                <input type="text" id="video_url" name="video_url" class="tokenfield form-control" value="{$video.url}" />
          </fieldset>
        </div>
        <div class="col-xl-3 col-lg-4">
          <button type="button" class="btn btn-primary-outline" id="save_video">{l s='Save' d='Admin.Theme.Transformer'}</button>
        </div>
      </div>
</div>
<script type="text/javascript">
jQuery(function($){
    var module_url = '{$current_url}';
    var id_product = '{$id_product}';
    var saving = "{l s='Saving...' d='Admin.Theme.Transformer'}";
    var save = "{l s='Save' d='Admin.Theme.Transformer'}";
    {literal}
    $('#save_video').click(function(){
        var _this = $(this);
        _this.text(saving);
        $.getJSON(module_url+'&ajax=1&act=changeProductVideo&id_product='+id_product+'&url='+$('#video_url').val(), function(json){
            _this.text(save);
        });
    });
    {/literal}
});
</script>