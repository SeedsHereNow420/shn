{*
*  Copyright (C) Prestalia - All Rights Reserved
*
*  Unauthorized copying of this file, via any medium is strictly prohibited
*  Proprietary and confidential
*
*  @author    Prestalia <prestalia.it>
*  @copyright 2015-2016 Prestalia
*  @license   Closed source, proprietary software
*}

<div class="col-lg-6">
    <div class="panel">
        <div class="panel-heading">
            <i class="icon-bookmark"></i>&nbsp;{l s='Bookmarks and notes' mod='ordersplusplus'}
        </div>
        <div id="oppData" class="well">
            <div class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-lg-3">{$bookmark_a_name|escape:'htmlall':'UTF-8'}</label>
                    <div class="col-lg-9">
                        {include file='../admin/list-bookmark.tpl' id_order=$opp_id_order bookmark='a' bookmark_value=$bookmark_a_value}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3">{$bookmark_b_name|escape:'htmlall':'UTF-8'}</label>
                    <div class="col-lg-9">
                        {include file='../admin/list-bookmark.tpl' id_order=$opp_id_order bookmark='b' bookmark_value=$bookmark_b_value}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3">{l s='Notes' mod='ordersplusplus'}</label>
                    <div class="col-lg-9">
                        <textarea id="oppNotes" class="textarea-autosize">{$opp_notes|escape:'htmlall':'UTF-8'}</textarea>
                    </div>
                </div>
                <div class="row">
                    <button class="btn btn-primary pull-right" onclick="oppSaveNotes({$opp_id_order|escape:'htmlall':'UTF-8'}, '{l s='Notes updated' mod='ordersplusplus'}', '{l s='Error' mod='ordersplusplus'}')">
                        <i class="icon-save"></i>
                        {l s='Save notes' mod='ordersplusplus'}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
