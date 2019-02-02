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

<div id="slider_form_with_list">
    <div class="panel">
        <div class="panel-heading">
            <i class="icon-cogs"></i> {l s='Sliders:' mod='dealsofthedaypro'}
        </div>
        <div>
            <p>{l s='Add a Deal block' mod='dealsofthedaypro'}</p>
            <button class="btn btn-success" id="show-form-new">
                <i class="icon-plus-square"></i>
                {l s='Add new Deal block' mod='dealsofthedaypro'}
            </button>
            <div class="new_slider_form" id="new_slider_form">
                <div class="alert alert-danger no-category-alert" style="display: none;" id="no_products_selected">{l s='Please add at least one product' mod='dealsofthedaypro'}</div>
                <div class="alert alert-danger no-category-alert" style="display: none;" id="no_categories_selected">{l s='Please choose at least one category' mod='dealsofthedaypro'}</div>
                <div class="alert alert-danger no-category-alert" style="display: none;" id="no_date">{l s='Please fill date' mod='dealsofthedaypro'}</div>
                <div class="alert alert-danger no-category-alert" style="display: none;" id="no_valid">{l s='Please enter valid data' mod='dealsofthedaypro'}</div>

                <div class="form-group row">
                    <label class="control-label col-lg-2">
                        {l s='Products' mod='dealsofthedaypro'}
                    </label>
                    <div class="col-lg-5 col-xs-12">
                        <div>
                            <input type="text" id="ajax_products" class="ajax_products" placeholder="{l s='Search by name or reference' mod='dealsofthedaypro'}">
                        </div>
                        <div>
                            <ul id="ajax_products_list"></ul>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-lg-2">
                        {l s='Categories pages to display' mod='dealsofthedaypro'}
                    </label>
                    <div class="col-lg-9 col-xs-12">
                        {$category_tree nofilter}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-lg-2">
                        {l s='Button text' mod='dealsofthedaypro'}
                    </label>
                    <div class="col-lg-5">
                        {$DealsoftheDayProTool->createField(['type' => 'text', 'lang' => true, 'id' => 'add_btntext_new', 'name' => 'btntext_new', 'class' => 'add_btntext_new']) nofilter}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-lg-2">
                        {l s='Title' mod='dealsofthedaypro'}
                    </label>
                    <div class="col-lg-5">
                        {$DealsoftheDayProTool->createField(['type' => 'text', 'lang' => true, 'id' => 'add_maintext_new', 'name' => 'maintext_new', 'class' => 'add_maintext_new']) nofilter}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-lg-2">
                        {l s='Link' mod='dealsofthedaypro'}
                    </label>
                    <div class="col-lg-5">
                        {$DealsoftheDayProTool->createField(['type' => 'text', 'lang' => true, 'id' => 'add_btnlink_new', 'name' => 'btnlink_new', 'class' => 'add_btnlink_new']) nofilter}
                    </div>
                </div>
                <div class="form-group row datepicker-row">
                    <label class="control-label col-lg-2">
                        {l s='Date' mod='dealsofthedaypro'}
                    </label>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="input-group">
                                    <span class="input-group-addon">{l s='Countdown' mod='dealsofthedaypro'}</span>
                                    <input type="text" name="date" data-hex="true" class="datetimepicker" value="" style="text-align: center;" id="add_date">
                                    <span class="input-group-addon"><i class="icon-calendar-empty"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="status_new" class="control-label col-lg-2">
                        <span class="label-tooltip" data-toggle="tooltip" data-html="true" data-original-title="{l s='Uncheck to disable' mod='dealsofthedaypro'}">
                        {l s='Status' mod='dealsofthedaypro'}
                        </span>
                    </label>
                    <div class="col-lg-5">
                        <input type="checkbox" name="status_new" id="status_new" class="status_new" checked>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="control-label col-lg-2">
                        {l s='Left Gradient first Color' mod='dealsofthedaypro'}
                    </label>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-3">
                              <div class="input-group">
                                <input type="text" data-hex="true" class="mColorPicker mColorPickerInput" name="maincolor_new" value="#ffefef" id="maincolor_new" style="background-color: rgb(255, 239, 239); color: black;"><span style="cursor:pointer;" id="icp_maincolor_new" class="mColorPickerTrigger input-group-addon modulecolorpick" data-mcolorpicker="true" align="absmiddle"></span>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="control-label col-lg-2">
                        {l s='Change Button color' mod='dealsofthedaypro'}
                    </label>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-3">
                              <div class="input-group">
                                <input type="text" data-hex="true" class="mColorPicker mColorPickerInput" name="color1_new" value="#2874f0" id="color1_new" style="background-color: rgb(40, 116, 240); color: black;"><span style="cursor:pointer;" id="icp_color1_new" class="mColorPickerTrigger input-group-addon modulecolorpick" data-mcolorpicker="true" align="absmiddle"></span>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-lg-2">
                        {l s='Change Button Font Color' mod='dealsofthedaypro'}
                    </label>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-3">
                              <div class="input-group">
                                <input type="text" data-hex="true" class="mColorPicker mColorPickerInput" name="color2_new" value="#ffffff" id="color2_new" style="background-color: rgb(255, 255, 255); color: black;"><span style="cursor:pointer;" id="icp_color2_new" class="mColorPickerTrigger input-group-addon modulecolorpick" data-mcolorpicker="true" align="absmiddle"></span>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-lg-2">
                        {l s='Change Main text Color' mod='dealsofthedaypro'}
                    </label>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-3">
                              <div class="input-group">
                                <input type="text" data-hex="true" class="mColorPicker mColorPickerInput" name="color3_new" value="#000000" id="color3_new" style="background-color: rgb(0, 0, 0); color: white;"><span style="cursor:pointer;" id="icp_color3_new" class="mColorPickerTrigger input-group-addon modulecolorpick" data-mcolorpicker="true" align="absmiddle"></span>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-lg-2">
                        {l s='Change Slider background Color' mod='dealsofthedaypro'}
                    </label>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-3">
                              <div class="input-group">
                                <input type="text" data-hex="true" class="mColorPicker mColorPickerInput" name="color4_new" value="#ffffff" id="color4_new" style="background-color: rgb(255, 255, 255); color: black;"><span style="cursor:pointer;" id="icp_color4_new" class="mColorPickerTrigger input-group-addon modulecolorpick" data-mcolorpicker="true" align="absmiddle"></span>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-lg-2">
                        {l s='Change product name color' mod='dealsofthedaypro'}
                    </label>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-3">
                              <div class="input-group">
                                <input type="text" data-hex="true" class="mColorPicker mColorPickerInput" name="color5_new" value="#212121" id="color5_new" style="background-color: rgb(33, 3, 33); color: white;"><span style="cursor:pointer;" id="icp_color5_new" class="mColorPickerTrigger input-group-addon modulecolorpick" data-mcolorpicker="true" align="absmiddle"></span>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-lg-2">
                        {l s='Change Price or Discount color' mod='dealsofthedaypro'}
                    </label>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-3">
                              <div class="input-group">
                                <input type="text" data-hex="true" class="mColorPicker mColorPickerInput" name="color6_new" value="#388e3c" id="color6_new" style="background-color: rgb(56, 142, 60); color: black;"><span style="cursor:pointer;" id="icp_color6_new" class="mColorPickerTrigger input-group-addon modulecolorpick" data-mcolorpicker="true" align="absmiddle"></span>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-lg-2">
                        {l s='Change Extra info color' mod='dealsofthedaypro'}
                    </label>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-3">
                              <div class="input-group">
                                <input type="text" data-hex="true" class="mColorPicker mColorPickerInput" name="color7_new" value="#798096" id="color7_new" style="background-color: rgb(121, 128, 150); color: black;"><span style="cursor:pointer;" id="icp_color7_new" class="mColorPickerTrigger input-group-addon modulecolorpick" data-mcolorpicker="true" align="absmiddle"></span>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-lg-2">
                        {l s='Change Short description color' mod='dealsofthedaypro'}
                    </label>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-3">
                              <div class="input-group">
                                <input type="text" data-hex="true" class="mColorPicker mColorPickerInput" name="color8_new" value="#72727f" id="color8_new" style="background-color: rgb(114, 114, 127); color: black;"><span style="cursor:pointer;" id="icp_color8_new" class="mColorPickerTrigger input-group-addon modulecolorpick" data-mcolorpicker="true" align="absmiddle"></span>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="blurb_new" class="control-label col-lg-2">
                        <span class="label-tooltip" data-toggle="tooltip" data-html="true" data-original-title="{l s='Short description' mod='dealsofthedaypro'}">
                            {l s='Enable blurb' mod='dealsofthedaypro'}
                        </span>
                    </label>
                    <div class="col-lg-5">
                        <input type="checkbox" name="blurb_new" id="blurb_new" class="blurb_new" checked>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="rounded_new" class="control-label col-lg-2">
                        <span class="label-tooltip" data-toggle="tooltip" data-html="true" data-original-title="{l s='Enable rounded' mod='dealsofthedaypro'}">
                            {l s='Rounded corners' mod='dealsofthedaypro'}
                        </span>
                    </label>
                    <div class="col-lg-5">
                        <input type="checkbox" name="rounded_new" id="rounded_new" class="rounded_new" checked>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="slideshow_new" class="control-label col-lg-2">
                        <span class="label-tooltip" data-toggle="tooltip" data-html="true" data-original-title="{l s='Enable slideshow autostart' mod='dealsofthedaypro'}">
                            {l s='Autostart' mod='dealsofthedaypro'}
                        </span>
                    </label>
                    <div class="col-lg-5">
                        <input type="checkbox" name="slideshow_new" id="slideshow_new" class="slideshow_new" checked>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="margin_new" class="control-label col-lg-2">
                        <span class="label-tooltip" data-toggle="tooltip" data-html="true" data-original-title="{l s='Pixels between products' mod='dealsofthedaypro'}">
                            {l s='Margin' mod='dealsofthedaypro'}
                        </span>
                    </label>
                    <div class="col-lg-5">
                      <div class="input-group fixed-width-xs">
                        <input type="text" class="fixed-width-xs" id="margin_new" name="margin_new" value="6"><span class="input-group-addon">{l s='Px' mod='dealsofthedaypro'}</span>
                      </div>
                    </div>
                </div>



                <div class="form-group row discount-row">
                    <label for="more_data_new" class="control-label col-lg-2">
                        {l s='Slider:' mod='dealsofthedaypro'}
                    </label>

                    <div class="col-lg-1">
                        <select id="offslider_new" name="offslider_new">
                            <option value="1">{l s='Off' mod='dealsofthedaypro'}</option>
                            <option value="0" selected>{l s='On' mod='dealsofthedaypro'}</option>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <span class="" title="">{l s='Extra info' mod='dealsofthedaypro'}</span>
                    </div>
                    <div class="col-lg-2">
                        <select name="extra_info_new" id="extra_info_new" class="extra_info_new">
                            <option value="1">{l s='Manufacturer' mod='dealsofthedaypro'}</option>
                            <option value="2">{l s='Supplier' mod='dealsofthedaypro'}</option>
                            <option value="3" selected>{l s='Category default' mod='dealsofthedaypro'}</option>
                            <option value="4">{l s=' - None - ' mod='dealsofthedaypro'}</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-4 col-xs-12">
                        <div>
                            <button class="btn btn-primary" id="submit_slider">{l s='Create' mod='dealsofthedaypro'}</button>
                        </div>
                    </div>
                </div>
                <div class="close_new_slider_form"><a href="#"><i class="icon-close" ></i></a></div>
            </div>
        </div>
        <hr>
        <div id="all_sliders_list">
            {include "`$tpl_path`all_list.tpl"}
        </div>
    </div>
</div>
