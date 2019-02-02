{**
 * NOTICE OF LICENSE.
 *
 * This source file is subject to the following license: REGULAR LICENSE
 * that is bundled with this package in the file LICENSE.txt.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade to newer
 * versions in the future.
 *
 * @author    VaSibi
 * @copyright VaSibi
 * @license   REGULAR LICENSE
 *}

{if sizeof($sliders)}
{*$sliders|@print_r*}
{*$slider_names|@print_r*}
    <div class="form-wrapper">
    <div class="alert alert-danger no-category-alert" style="display: none;" id="no_valid_slide">{l s='Please enter valid data' mod='dealsofthedaypro'}</div>
                    {foreach from=$sliders item=slider}
                    <div class="form-group" id="slider{$slider.id_displaydealsofthedaypro_sliders}">
                        <div class="table-responsive-row">
                            <table class="table module-list-addon">
                                <thead><b>{l s='Block ID' mod='dealsofthedaypro'} {$slider.id_displaydealsofthedaypro_sliders}</b></thead>
                                <tbody>
                        <tr>
                            <th width="14%">{l s='Selected Products' mod='dealsofthedaypro'}</th>
                            <th width="19%">{l s='Button text' mod='dealsofthedaypro'}</th>
                            <th width="19%">{l s='Title' mod='dealsofthedaypro'}</th>
                            <th width="14%">{l s='Link' mod='dealsofthedaypro'}</th>
                            <th width="14%">{l s='Date' mod='dealsofthedaypro'}</th>
                            <th width="14%">{l s='Actions' mod='dealsofthedaypro'}</th>
                        </tr>
                        <tr class="slider{$slider.id_displaydealsofthedaypro_sliders} tr1" sid="{$slider.id_displaydealsofthedaypro_sliders}">
                            <td>
                                <div class="display-only">
                                    <div id="display_only_products_{$slider.id_displaydealsofthedaypro_sliders}">id:{$slider.sections}</div>
                                </div>
                                <div class="form-fields" id="id_sections_{$slider.id_displaydealsofthedaypro_sliders}_ajax" data-slider="{$slider.id_displaydealsofthedaypro_sliders}">
                                  <input type="text" class="ajax_input" id="id_sections_{$slider.id_displaydealsofthedaypro_sliders}" data-id="{$slider.id_displaydealsofthedaypro_sliders}" value="{$slider.sections}" placeholder="{l s='Type to search' mod='dealsofthedaypro'}" onclick="this.value=''">
                                <input type="hidden" class="id_sections ajax_hidden" id="id_sections_{$slider.id_displaydealsofthedaypro_sliders}" value="{$slider.sections}">
                                <div>
                                    <ul class="ajax_list" data-slider="id_sections_{$slider.id_displaydealsofthedaypro_sliders}_ajax"></ul>
                                </div>
                                </div>
                            </td>
                            <td>
                                <div class="display-only">
                                    {$slider.btntext|truncate:23:'..'|escape:'html':'UTF-8'}
                                </div>
                                <div class="form-fields">
                                    {assign var='slider_btntext_lang' value=""}
                                    {assign var='id_id_slider' value=$slider.id_displaydealsofthedaypro_sliders|cat:'_edit_btntext'}
                                    {if isset($slider_multilang_btntext[$slider.id_displaydealsofthedaypro_sliders])}
                                        {assign var='slider_btntext_lang' value=$slider_multilang_btntext[$slider.id_displaydealsofthedaypro_sliders]}
                                    {/if}
                                    {$DealsoftheDayProTool->createField(['type' => 'text', 'lang' => true, 'id' => $id_id_slider, 'name' => 'edit_btntext', 'class' => 'edit-btntext', 'values' => $slider_btntext_lang]) nofilter}
                                </div>
                            </td>


                            <td>
                                <div class="display-only">
                                    {$slider.maintext|truncate:23:'..'|escape:'html':'UTF-8'}
                                </div>
                                <div class="form-fields">
                                    {assign var='slider_maintext_lang' value=""}
                                    {assign var='id_id_slider' value=$slider.id_displaydealsofthedaypro_sliders|cat:'_edit_maintext'}
                                    {if isset($slider_multilang_maintext[$slider.id_displaydealsofthedaypro_sliders])}
                                        {assign var='slider_maintext_lang' value=$slider_multilang_maintext[$slider.id_displaydealsofthedaypro_sliders]}
                                    {/if}
                                    {$DealsoftheDayProTool->createField(['type' => 'text', 'lang' => true, 'id' => $id_id_slider, 'name' => 'edit_maintext', 'class' => 'edit-maintext', 'values' => $slider_maintext_lang]) nofilter}
                                </div>
                            </td>





                            <td>
                                <div class="display-only">
                                    {$slider.btnlink|truncate:23:'..'|escape:'html':'UTF-8'}
                                </div>
                                <div class="form-fields div_zoom">
                                    {assign var='slider_btnlink_lang' value=""}
                                    {assign var='id_id_slider' value=$slider.id_displaydealsofthedaypro_sliders|cat:'_edit_btnlink'}
                                    {if isset($slider_multilang_btnlink[$slider.id_displaydealsofthedaypro_sliders])}
                                        {assign var='slider_btnlink_lang' value=$slider_multilang_btnlink[$slider.id_displaydealsofthedaypro_sliders]}
                                    {/if}
                                    {$DealsoftheDayProTool->createField(['type' => 'text', 'lang' => true, 'id' => $id_id_slider, 'name' => 'edit_btnlink', 'class' => 'edit-btnlink', 'values' => $slider_btnlink_lang]) nofilter}
                                </div>
                            </td>


                            <td>
                                <div class="display-only datetime-utc">{$slider.date|escape:'html':'UTF-8'} UTC</div>
                                <div class="form-fields">
                                    <div class="input-group">
                                        <input type="text" name="date" data-hex="true" class="datetimepicker" value="{$slider.date|escape:'html':'UTF-8'}" >
                                    </div>
                                </div>
                            </td>
                            <td>
                                {* Edit/cancel buttons *}
                                <span class="display-only">
                                    <a href="#" title="{l s='Edit' mod='dealsofthedaypro'}" class="list-edit edit btn btn-default" target="_blank">
                                      <i class="icon-pencil"></i>
                                    </a>
                                </span>
                                <span class="form-fields">
                                    <button class="list-edit-submit button btn btn-primary" data-id-category="{$slider.id_category|intval}">{l s='Save' mod='dealsofthedaypro'}</button>
                                    <button class="list-edit-cancel button btn btn-default" data-id-category="{$slider.id_category|intval}">{l s='Cancel' mod='dealsofthedaypro'}</button>
                                    <a style="cursor: pointer; text-decoration: none;" onclick="addNewCustomFieldPopup({$slider.id_displaydealsofthedaypro_sliders})" data-toggle="modal" class="btn btn-action open">
                                        <i class="material-icons"></i>{l s='Edit More Settings' mod='dealsofthedaypro'}
                                      </a>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                {* Remove btn *}
                                <span class="display-only">
                                    <a href="#" title="{l s='Remove' mod='dealsofthedaypro'}" class="edit btn btn-default remove-slider" data-id-category="{$slider.id_category|intval}">
                                        <i class="icon-remove"></i>
                                    </a>
                                </span>
                            </td>

                        </tr>


                        <tr class="slider{$slider.id_displaydealsofthedaypro_sliders}">
                            <th width="16%">{l s='Left Gradient 1st Color' mod='dealsofthedaypro'}</th>
                            <th width="16%">{l s='Button color' mod='dealsofthedaypro'}</th>
                            <th width="16%">{l s='Button Font Color' mod='dealsofthedaypro'}</th>
                            <th width="16%">{l s='Main text' mod='dealsofthedaypro'}</th>
                            <th width="16%">{l s='Slider background' mod='dealsofthedaypro'}</th>
                            <th width="16%">{l s='Extra info' mod='dealsofthedaypro'}</th>
                        </tr>
                        <tr class="slider{$slider.id_displaydealsofthedaypro_sliders}  tr2">

                          <td>
                              <div class="display-only">{$slider.maincolor|escape:'html':'UTF-8'} hex<div class="colormark" style="background-color:{$slider.maincolor|escape:'html':'UTF-8'}"></div></div>
                              <div class="form-fields col-lg-12">
                                  <div class="input-group">
                                      <input type="text" data-hex="true" class="mColorPicker mColorPickerInput edit_maincolor" name="maincolor" value="{$slider.maincolor|escape:'html':'UTF-8'}" id="maincolor_{$slider.id_displaydealsofthedaypro_sliders}" style="background-color: {$slider.maincolor|escape:'html':'UTF-8'}; color: black;"><span style="cursor:pointer;" id="icp_maincolor_{$slider.id_displaydealsofthedaypro_sliders}" class="mColorPickerTrigger input-group-addon modulecolorpick" data-mcolorpicker="true" align="absmiddle"></span>
                                  </div>
                              </div>
                          </td>


                          <td>
                              <div class="display-only">{$slider.color1|escape:'html':'UTF-8'} hex<div class="colormark" style="background-color:{$slider.color1|escape:'html':'UTF-8'}"></div></div>
                              <div class="form-fields col-lg-12">
                                <div class="input-group">
                                    <input type="text" data-hex="true" class="mColorPicker mColorPickerInput edit_color1" name="color1" value="{$slider.color1|escape:'html':'UTF-8'}" id="color1_{$slider.id_displaydealsofthedaypro_sliders}" style="background-color: {$slider.color1|escape:'html':'UTF-8'}; color: black;"><span style="cursor:pointer;" id="icp_color1_{$slider.id_displaydealsofthedaypro_sliders}" class="mColorPickerTrigger input-group-addon modulecolorpick" data-mcolorpicker="true" align="absmiddle"></span>
                                </div>
                              </div>
                          </td>

                          <td>
                              <div class="display-only">{$slider.color2|escape:'html':'UTF-8'} hex<div class="colormark" style="background-color:{$slider.color2|escape:'html':'UTF-8'}"></div></div>
                              <div class="form-fields  col-lg-12">
                                <div class="input-group">
                                  <input type="text" data-hex="true" class="mColorPicker mColorPickerInput edit_color2" name="color2" value="{$slider.color2|escape:'html':'UTF-8'}" id="color2_{$slider.id_displaydealsofthedaypro_sliders}" style="background-color: {$slider.color2|escape:'html':'UTF-8'}; color: black;"><span style="cursor:pointer;" id="icp_color2_{$slider.id_displaydealsofthedaypro_sliders}" class="mColorPickerTrigger input-group-addon modulecolorpick" data-mcolorpicker="true" align="absmiddle"></span>
                                </div>
                              </div>
                          </td>

                          <td>
                              <div class="display-only">{$slider.color3|escape:'html':'UTF-8'} hex<div class="colormark" style="background-color:{$slider.color3|escape:'html':'UTF-8'}"></div></div>
                              <div class="form-fields col-lg-12">
                                <div class="input-group">
                                  <input type="text" data-hex="true" class="mColorPicker mColorPickerInput edit_color3" name="color3" value="{$slider.color3|escape:'html':'UTF-8'}" id="color3_{$slider.id_displaydealsofthedaypro_sliders}" style="background-color: {$slider.color3|escape:'html':'UTF-8'}; color: black;"><span style="cursor:pointer;" id="icp_color3_{$slider.id_displaydealsofthedaypro_sliders}" class="mColorPickerTrigger input-group-addon modulecolorpick" data-mcolorpicker="true" align="absmiddle"></span>
                                </div>
                              </div>
                          </td>

                          <td>
                              <div class="display-only">{$slider.color4|escape:'html':'UTF-8'} hex<div class="colormark" style="background-color:{$slider.color4|escape:'html':'UTF-8'}"></div></div>
                              <div class="form-fields col-lg-12">
                                  <div class="input-group">
                                      <input type="text" data-hex="true" class="mColorPicker mColorPickerInput edit_color4" name="color4" value="{$slider.color4|escape:'html':'UTF-8'}" id="color4_{$slider.id_displaydealsofthedaypro_sliders}" style="background-color: {$slider.color4|escape:'html':'UTF-8'}; color: black;"><span style="cursor:pointer;" id="icp_color4_{$slider.id_displaydealsofthedaypro_sliders}" class="mColorPickerTrigger input-group-addon modulecolorpick" data-mcolorpicker="true" align="absmiddle"></span>
                                  </div>
                              </div>
                          </td>

                          <td>
                            <div class="row">
                                <div class="display-only">
                                  {if $slider.showcase=='01'}{l s='Manufacturer' mod='dealsofthedaypro'}{/if}
                                  {if $slider.showcase=='02'}{l s='Supplier' mod='dealsofthedaypro'}{/if}
                                  {if $slider.showcase=='03'}{l s='Category default' mod='dealsofthedaypro'}{/if}
                                  {if $slider.showcase=='04'}{l s=' - None - ' mod='dealsofthedaypro'}{/if}
                                </div>
                                <div class="form-fields">
                                    <select name="extra_info" class="edit_extra_info">
                                        <option value="01" {if $slider.showcase=='01'}selected{/if}>{l s='Manufacturer' mod='dealsofthedaypro'}</option>
                                        <option value="02" {if $slider.showcase=='02'}selected{/if}>{l s='Supplier' mod='dealsofthedaypro'}</option>
                                        <option value="03" {if $slider.showcase=='03'}selected{/if}>{l s='Category default' mod='dealsofthedaypro'}</option>
                                        <option value="04" {if !$slider.showcase}selected{/if}>{l s=' - None - ' mod='dealsofthedaypro'}</option>
                                    </select>
                                </div>
                            </div>
                          </td>
                        </tr>







                        <tr>
                            <th width="20%">{l s='Product name' mod='dealsofthedaypro'}</th>
                            <th width="20%">{l s='Price color' mod='dealsofthedaypro'}</th>
                            <th width="20%">{l s='Extra info' mod='dealsofthedaypro'}</th>
                            <th width="20%">{l s='Description color' mod='dealsofthedaypro'}</th>
                            <th width="20%">{l s='Slider status and margin' mod='dealsofthedaypro'}</th>
                            <th width="4%">{l s='Status' mod='dealsofthedaypro'}</th>
                        </tr>
                        <tr class="slider{$slider.id_displaydealsofthedaypro_sliders}  tr3">
                          <td>
                              <div class="display-only">{$slider.color5|escape:'html':'UTF-8'} hex<div class="colormark" style="background-color:{$slider.color5|escape:'html':'UTF-8'}"></div></div>
                              <div class="form-fields col-lg-12">
                                  <div class="input-group">
                                      <input type="text" data-hex="true" class="mColorPicker mColorPickerInput edit_color5" name="color5" value="{$slider.color5|escape:'html':'UTF-8'}" id="color5_{$slider.id_displaydealsofthedaypro_sliders}" style="background-color: {$slider.color5|escape:'html':'UTF-8'}; color: black;"><span style="cursor:pointer;" id="icp_color5_{$slider.id_displaydealsofthedaypro_sliders}" class="mColorPickerTrigger input-group-addon modulecolorpick" data-mcolorpicker="true" align="absmiddle"></span>
                                  </div>
                              </div>
                          </td>

                          <td>
                              <div class="display-only">{$slider.color6|escape:'html':'UTF-8'} hex<div class="colormark" style="background-color:{$slider.color6|escape:'html':'UTF-8'}"></div></div>
                              <div class="form-fields col-lg-12">
                                  <div class="input-group">
                                      <input type="text" data-hex="true" class="mColorPicker mColorPickerInput edit_color6" name="color6" value="{$slider.color6|escape:'html':'UTF-8'}" id="color6_{$slider.id_displaydealsofthedaypro_sliders}" style="background-color: {$slider.color6|escape:'html':'UTF-8'}; color: black;"><span style="cursor:pointer;" id="icp_color6_{$slider.id_displaydealsofthedaypro_sliders}" class="mColorPickerTrigger input-group-addon modulecolorpick" data-mcolorpicker="true" align="absmiddle"></span>
                                  </div>
                              </div>
                          </td>

                          <td>
                              <div class="display-only">{$slider.color7|escape:'html':'UTF-8'} hex<div class="colormark" style="background-color:{$slider.color7|escape:'html':'UTF-8'}"></div></div>
                              <div class="form-fields col-lg-12">
                                  <div class="input-group">
                                      <input type="text" data-hex="true" class="mColorPicker mColorPickerInput edit_color7" name="color7" value="{$slider.color7|escape:'html':'UTF-8'}" id="color7_{$slider.id_displaydealsofthedaypro_sliders}" style="background-color: {$slider.color7|escape:'html':'UTF-8'}; color: black;"><span style="cursor:pointer;" id="icp_color7_{$slider.id_displaydealsofthedaypro_sliders}" class="mColorPickerTrigger input-group-addon modulecolorpick" data-mcolorpicker="true" align="absmiddle"></span>
                                  </div>
                              </div>
                          </td>

                          <td>
                              <div class="display-only">{$slider.color8|escape:'html':'UTF-8'} hex<div class="colormark" style="background-color:{$slider.color8|escape:'html':'UTF-8'}"></div></div>
                              <div class="form-fields col-lg-12">
                                  <div class="input-group">
                                      <input type="text" data-hex="true" class="mColorPicker mColorPickerInput edit_color8" name="color8" value="{$slider.color8|escape:'html':'UTF-8'}" id="color8_{$slider.id_displaydealsofthedaypro_sliders}" style="background-color: {$slider.color8|escape:'html':'UTF-8'}; color: black;"><span style="cursor:pointer;" id="icp_color8_{$slider.id_displaydealsofthedaypro_sliders}" class="mColorPickerTrigger input-group-addon modulecolorpick" data-mcolorpicker="true" align="absmiddle"></span>
                                  </div>
                              </div>
                          </td>

                          <td>
                              <div class="display-only">
                                {if $slider.offslider == '1'}
                                  {l s='Off' mod='dealsofthedaypro'}
                                {elseif $slider.offslider == '0'}
                                  {l s='On' mod='dealsofthedaypro'}
                                {/if}
                                {$slider.margin|floatval}{l s='px' mod='dealsofthedaypro'}
                              </div>
                              <div class="form-fields">
                                  <div class="row">
                                      <div class="col-lg-6 col-md-12">
                                          <select name="offslider" class="edit_offslider">
                                              <option {if $slider.offslider == '1'}selected{/if} value="1">{l s='Off' mod='dealsofthedaypro'}</option>
                                              <option {if $slider.offslider == '0'}selected{/if} value="0">{l s='On' mod='dealsofthedaypro'}</option>
                                          </select>
                                      </div>
                                      <div class="col-lg-6 col-md-12">
                                          <input type="text" name="margin" class="edit_margin" value="{$slider.margin|floatval}" >
                                      </div>
                                  </div>

                              </div>
                          </td>

                          <td>
                              <div class="display-only">
                              {if $slider.status > 0}
                                  {if $slider.status}
                                      <span class="label change-category-slider-status label-success" data-id-category="{$slider.id_displaydealsofthedaypro_sliders|intval}">{l s='Enabled' mod='dealsofthedaypro'}</span>
                                  {else}
                                      <span class="label change-category-slider-status label-danger" data-id-category="{$slider.id_displaydealsofthedaypro_sliders|intval}">{l s='Disabled' mod='dealsofthedaypro'}</span>
                                  {/if}
                              {else}
                                  <span class="label label-default">{l s='Inactive' mod='dealsofthedaypro'}</span>
                              {/if}
                              </div>
                              <span class="form-fields form-fields-inline">
                                  <span class="input-group">
                                      <label for="edit-status-cat-{$slider.id_displaydealsofthedaypro_sliders|intval}">
                                          <input type="checkbox" name="status" class="edit_status" id="edit-status-{$slider.id_displaydealsofthedaypro_sliders|intval}" value="1" {if $slider.status > 0}checked{/if}>
                                      </label>
                                  </span>
                              </span>
                          </td>
                        </tr>

                      </tbody>
                  </table>
              </div>
              <!-- Start - Modal Popup -->
              <div class="modal fade" id="modal_edit_form_{$slider.id_displaydealsofthedaypro_sliders}" tab-index="-1" aria-hidden="true" aria-labelledby="modal-incentive-form">
                <div class="modal-dialog" style="width:50%">
                  <div class="modal-content">
                    <div class="modal-header">
                      <span class="font_popup_header">{l s='New Custom Field' mod='dealsofthedaypro'}</span>
                      <button type="button" class="close" onclick="closeModalPopup('modal_edit_form_{$slider.id_displaydealsofthedaypro_sliders}')">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">{l s='Close' mod='dealsofthedaypro'}</span>
                      </button>
                    </div>
                    <div class="modal-body" style="padding-bottom:0;">
                      <div class="row">
                        <div class="span" style="margin-left:0; width:100%;">
                          <div id="modal_incentive_form_process_status" class="modal_process_status_blk alert" style="display:none;"></div>
                        </div>
                      </div>
                      <div style="overflow-y:auto !important;padding-bottom: 20px;" id="custom_fields_add_form">
                        <table class="list form" style="width:100%">
                          <tbody id="custom_table_tbody">
                            <tr class="modal_fields">
                              <td class="right"><span class="control-label">{l s='Categories to display' mod='dealsofthedaypro'}</span>
                                <p class="help-block">{l s='Search categories' mod='dealsofthedaypro'}</p>
                              </td>
                              <td class="">
                                <div id="d_categories_{$slider.id_displaydealsofthedaypro_sliders}_ajax" data-slider="{$slider.id_displaydealsofthedaypro_sliders}">
                                <div class="span">
                                  <input class="ajax_hidden" type="hidden" id="d_categories_{$slider.id_displaydealsofthedaypro_sliders}_hidden" name="categories_{$slider.id_displaydealsofthedaypro_sliders}" value="{$slider.d_categories}">
                                  <input class="ajax_input d_categories" type="text" data-id="{$slider.id_displaydealsofthedaypro_sliders}" id="d_categories_{$slider.id_displaydealsofthedaypro_sliders}" name="categories_{$slider.id_displaydealsofthedaypro_sliders}" value="{$slider.d_categories}" placeholder="{l s='Type to search' mod='dealsofthedaypro'}" onclick="this.value=''">
                                </div>
                                <div>
                                    <ul class="ajax_list" data-slider="d_categories_{$slider.id_displaydealsofthedaypro_sliders}_ajax"></ul>
                                </div></div>
                              </td>
                            </tr>

                            <tr class="modal_fields">
                              <td class="right"><span class="control-label">{l s='Rounded' mod='dealsofthedaypro'}</span>
                                <p class="help-block">{l s='Enable rounded corners' mod='dealsofthedaypro'}</p>
                              </td>
                              <td>
                                <div class="">
                                  <input type="checkbox" name="rounded" class="edit_rounded" id="edit-rounded-{$slider.id_displaydealsofthedaypro_sliders|intval}" value="1" {if $slider.rounded > 0}checked{/if}>
                                </div>
                              </td>
                            </tr>


                            <tr class="modal_fields">
                              <td class="right"><span class="control-label">{l s='Blurb' mod='dealsofthedaypro'}</span>
                                <p class="help-block">{l s='Enable short description' mod='dealsofthedaypro'}</p>
                              </td>
                              <td>
                                <div class="">
                                  <input type="checkbox" name="description" class="edit_description" id="edit-description-{$slider.id_displaydealsofthedaypro_sliders|intval}" value="1" {if $slider.description > 0}checked{/if}>
                                </div>
                              </td>
                            </tr>


                            <tr class="modal_fields">
                              <td class="right"><span class="control-label">{l s='Autostart' mod='dealsofthedaypro'}</span>
                                <p class="help-block">{l s='Enable slider autostart' mod='dealsofthedaypro'}</p>
                              </td>
                              <td>
                                <div class="">
                                  <input type="checkbox" name="slideshow" class="edit_slideshow" id="edit-slideshow-{$slider.id_displaydealsofthedaypro_sliders|intval}" value="1" {if $slider.slideshow > 0}checked{/if}>
                                </div>
                              </td>
                            </tr>

                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="modal-footer no_border">
                      <button type="button" onclick="closeModalPopup('modal_edit_form_{$slider.id_displaydealsofthedaypro_sliders}')" class="btn btn-default">{l s='X' mod='dealsofthedaypro'}</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End - Modal Popup -->
          </div>
          {/foreach}
    </div>
    <div class="" id="loader-spin"></div>
{/if}
