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
{extends file="helpers/form/form.tpl"}{block name="autoload_tinyMCE"}
    {literal}
	tinySetup({
		editor_selector :"autoload_rte",
		plugins : "colorpicker link image paste pagebreak table contextmenu filemanager table code media autoresize textcolor template",
		toolbar1 : "code,|,bold,italic,underline,strikethrough,|,alignleft,aligncenter,alignright,alignfull,formatselect,|,blockquote,colorpicker,pasteword,|,bullist,numlist,|,outdent,indent,|,link,unlink,|,cleanup,|,media,image,|,template",
        templates : "{/literal}{$smarty.const._MODULE_DIR_}{literal}stnewsletter/template_list.php",
        fontsize_formats: '10px 12px 14px 16px 18px 22px 30px 38px 46px 58px 68px',
        block_formats: 'Paragraph=p;Address=address;Pre=pre;Div=div;Header 1=h1;Header 2=h2;Header 3=h3;Header 4=h4;Header 5=h5;Header 6=h6',
        verify_html : false
	});
    {/literal}
{/block}

{block name="field"}
    {if $input.type == 'go_to_adv_editor'}
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