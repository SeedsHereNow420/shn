/**
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
 * @author    SeoSA <885588@bk.ru>
 * @copyright 2012-2017 SeoSA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

var ProductMultishop = new function()
{
    var self = this;
    this.load_tinymce = {};

    this.checkField = function(checked, id, type)
    {
        checked = !checked;
        switch (type)
        {
            case 'tinymce' :
                $('#'+id).attr('disabled', checked);
                if (typeof self.load_tinymce[id] == 'undefined')
                    self.load_tinymce[id] = checked;
                else
                {
                    if (checked)
                        tinyMCE.get(id).hide();
                    else
                        tinyMCE.get(id).show();
                }
                break;

            case 'radio' :
                $('input[name=\''+id+'\']').attr('disabled', checked);
                break;

            case 'show_price' :
                if ($('input[name=\'available_for_order\']').prop('checked'))
                    checked = true;
                $('input[name=\''+id+'\']').attr('disabled', checked);
                break;

            case 'price' :
                $('#priceTE').attr('disabled', checked);
                $('#priceTI').attr('disabled', checked);
                break;

            case 'unit_price' :
                $('#unit_price').attr('disabled', checked);
                $('#unity').attr('disabled', checked);
                break;

            case 'attribute_price_impact' :
                $('#attribute_price_impact').attr('disabled', checked);
                $('#attribute_price').attr('disabled', checked);
                $('#attribute_priceTI').attr('disabled', checked);
                break;

            case 'category_box' :
                $('#'+id+' input[type=checkbox]').attr('disabled', checked);
                if (!checked) {
                    $('#check-all-'+id).removeAttr('disabled');
                    $('#uncheck-all-'+id).removeAttr('disabled');
                } else {
                    $('#check-all-'+id).attr('disabled', 'disabled');
                    $('#uncheck-all-'+id).attr('disabled', 'disabled');
                }
                break;

            case 'attribute_weight_impact' :
                $('#attribute_weight_impact').attr('disabled', checked);
                $('#attribute_weight').attr('disabled', checked);
                break;

            case 'attribute_unit_impact' :
                $('#attribute_unit_impact').attr('disabled', checked);
                $('#attribute_unity').attr('disabled', checked);
                break;

            case 'seo_friendly_url':
                $('#'+id).attr('disabled', checked);
                $('#generate-friendly-url').attr('disabled', checked);

            default :
                $('#'+id).attr('disabled', checked);
                break;
        }
    };

    this.checkAllInformations = function()
    {
        ProductMultishop.checkField($('input[name=\'multishop_check[active]\']').prop('checked'), 'active', 'radio');
        ProductMultishop.checkField($('input[name=\'multishop_check[visibility]\']').prop('checked'), 'visibility');
        ProductMultishop.checkField($('input[name=\'multishop_check[available_for_order]\']').prop('checked'), 'available_for_order');
        ProductMultishop.checkField($('input[name=\'multishop_check[show_price]\']').prop('checked'), 'show_price', 'show_price');
        ProductMultishop.checkField($('input[name=\'multishop_check[online_only]\']').prop('checked'), 'online_only');
        ProductMultishop.checkField($('input[name=\'multishop_check[condition]\']').prop('checked'), 'condition');
        $.each(languages, function(k, v)
        {
            ProductMultishop.checkField($('input[name=\'multishop_check[name]['+v.id_lang+']\']').prop('checked'), 'name_'+v.id_lang);
            ProductMultishop.checkField($('input[name=\'multishop_check[description_short]['+v.id_lang+']\']').prop('checked'), 'description_short_'+v.id_lang, 'tinymce');
            ProductMultishop.checkField($('input[name=\'multishop_check[description]['+v.id_lang+']\']').prop('checked'), 'description_'+v.id_lang, 'tinymce');
        });
    };

    this.checkAllPrices = function()
    {
        ProductMultishop.checkField($('input[name=\'multishop_check[wholesale_price]\']').prop('checked'), 'wholesale_price');
        ProductMultishop.checkField($('input[name=\'multishop_check[price]\']').prop('checked'), 'price', 'price');
        ProductMultishop.checkField($('input[name=\'multishop_check[id_tax_rules_group]\']').prop('checked'), 'id_tax_rules_group');
        ProductMultishop.checkField($('input[name=\'multishop_check[unit_price]\']').prop('checked'), 'unit_price', 'unit_price');
        ProductMultishop.checkField($('input[name=\'multishop_check[on_sale]\']').prop('checked'), 'on_sale');
        ProductMultishop.checkField($('input[name=\'multishop_check[ecotax]\']').prop('checked'), 'ecotax');
    };

    this.checkAllSeo = function()
    {
        $.each(languages, function(k, v)
        {
            ProductMultishop.checkField($('input[name=\'multishop_check[meta_title]['+v.id_lang+']\']').prop('checked'), 'meta_title_'+v.id_lang);
            ProductMultishop.checkField($('input[name=\'multishop_check[meta_description]['+v.id_lang+']\']').prop('checked'), 'meta_description_'+v.id_lang);
            ProductMultishop.checkField($('input[name=\'multishop_check[meta_keywords]['+v.id_lang+']\']').prop('checked'), 'meta_keywords_'+v.id_lang);
            ProductMultishop.checkField($('input[name=\'multishop_check[link_rewrite]['+v.id_lang+']\']').prop('checked'), 'link_rewrite_'+v.id_lang, 'seo_friendly_url');
        });
    };

    this.checkAllQuantities = function()
    {
        $.each(languages, function(k, v)
        {
            ProductMultishop.checkField($('input[name=\'multishop_check[minimal_quantity]\']').prop('checked'), 'minimal_quantity');
            ProductMultishop.checkField($('input[name=\'multishop_check[available_later]['+v.id_lang+']\']').prop('checked'), 'available_later_'+v.id_lang);
            ProductMultishop.checkField($('input[name=\'multishop_check[available_now]['+v.id_lang+']\']').prop('checked'), 'available_now_'+v.id_lang);
            ProductMultishop.checkField($('input[name=\'multishop_check[available_date]\']').prop('checked'), 'available_date');
        });
    };

    this.checkAllAssociations = function()
    {
        ProductMultishop.checkField($('input[name=\'multishop_check[id_category_default]\']').prop('checked'), 'id_category_default');
        ProductMultishop.checkField($('input[name=\'multishop_check[id_category_default]\']').prop('checked'), 'associated-categories-tree', 'category_box');
    };

    this.checkAllCustomization = function()
    {
        ProductMultishop.checkField($('input[name=\'multishop_check[uploadable_files]\']').prop('checked'), 'uploadable_files');
        ProductMultishop.checkField($('input[name=\'multishop_check[text_fields]\']').prop('checked'), 'text_fields');
    };

    this.checkAllCombinations = function()
    {
        ProductMultishop.checkField($('input[name=\'multishop_check[attribute_wholesale_price]\']').prop('checked'), 'attribute_wholesale_price');
        ProductMultishop.checkField($('input[name=\'multishop_check[attribute_price_impact]\']').prop('checked'), 'attribute_price_impact', 'attribute_price_impact');
        ProductMultishop.checkField($('input[name=\'multishop_check[attribute_weight_impact]\']').prop('checked'), 'attribute_weight_impact', 'attribute_weight_impact');
        ProductMultishop.checkField($('input[name=\'multishop_check[attribute_unit_impact]\']').prop('checked'), 'attribute_unit_impact', 'attribute_unit_impact');
        ProductMultishop.checkField($('input[name=\'multishop_check[attribute_ecotax]\']').prop('checked'), 'attribute_ecotax');
        ProductMultishop.checkField($('input[name=\'multishop_check[attribute_minimal_quantity]\']').prop('checked'), 'attribute_minimal_quantity');
        ProductMultishop.checkField($('input[name=\'multishop_check[available_date_attribute]\']').prop('checked'), 'available_date_attribute');
        ProductMultishop.checkField($('input[name=\'multishop_check[attribute_default]\']').prop('checked'), 'attribute_default');
    };
};