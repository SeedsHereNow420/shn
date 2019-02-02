{*
* 2007-2015 PrestaShop
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
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{extends file="helpers/list/list_header.tpl"}
{block name=leadin}

    {if isset($urlFaqs) && $urlFaqs}
        <div class="bloc-leadin">
            <div id="container_category_tree">
                <div class="panel">
                    <span style="margin-right: 20px"> {l s='FAQs url: '  mod='faqs'}</span>
                    <a href="{$urlFaqs|escape:'htmlall':'UTF-8'}">{$urlFaqs|escape:'htmlall':'UTF-8'}</a>
                </div>
            </div>
        </div>
    {/if}

  {if isset($category_tree)}
    <div class="bloc-leadin">
      <div id="container_category_tree">
        <div class="panel">
         <div class="tree-panel-heading-controls clearfix">
            <label class="tree-panel-label-title">
              <input type="checkbox" id="filter-by-category" class="filter-by-category-faqs" name="filter-by-category" {if isset($id_category) && ($id_category)}checked="checked"{/if}>
              <input type="hidden" class="base_url_filter" value="{$base_url|escape:'htmlall':'UTF-8'}" >
              <i class="icon-tags"></i>
               {l s='Filter by category'  mod='faqs'}
            </label>
          </div>
          <ul id="categories-tree" class="tree categories-tree-faqs" style="{if isset($id_category) && ($id_category)}display: block{else}display:none{/if}">
            <li class="tree-folder">
              <span class="tree-folder-name {if isset($id_category) && ($id_category == 0)}tree-selected{/if}">
                <input type="radio" class="id-category-faqs-home" name="id-category-faqs-home" value="2" {if isset($id_category) && ($id_category == 0)}checked="checked"{/if}>
                <input type="hidden" class="base_url_filter" value="{$base_url|escape:'htmlall':'UTF-8'}" >

                <i class="icon-folder-close"></i>
                <label class="tree-toggler">{l s='Categories'  mod='faqs'}</label>
              </span>
            <li>
              <ul class="tree" style="display: block; padding-left: 20px">
                {foreach $category_tree as $key => $value}
                  <li class="tree-folder">
                    <span class="tree-folder-name {if isset($id_category) && ($id_category == $value['id_gomakoil_faq_category'])} tree-selected {/if}">
                      <input type="radio" name="id-category" class="id-category-faqs" value="{$value['id_gomakoil_faq_category']|escape:'htmlall':'UTF-8'}"  {if isset($id_category) && ($id_category == $value['id_gomakoil_faq_category'])} checked="checked"{/if}>
                      <input type="hidden" class="base_url_{$value['id_gomakoil_faq_category']|escape:'htmlall':'UTF-8'}" value="{$base_url|escape:'htmlall':'UTF-8'}&id_category={$value['id_gomakoil_faq_category']|escape:'htmlall':'UTF-8'}" >
                      <i class="tree-dot"></i>
                      <label class="tree-toggler">{$value['name']|escape:'htmlall':'UTF-8'}</label>
                     </span>
                  <li>
                {/foreach}
              </ul>
          </ul>
        </div>
      </div>
    </div>

      <script type="text/javascript">
          $('.filter-by-category-faqs').change(function(){
              if($('.filter-by-category-faqs:checked').val()){
                  $('.categories-tree-faqs').show();
              }
              else{
                  $('.categories-tree-faqs').hide();
                  location.href = $('.base_url_filter').val()
              }
          });
          $('.id-category-faqs').change(function(){
              location.href = $('.base_url_'+$(this).val()).val()
          });
          $('.id-category-faqs-home').change(function(){
              location.href = $('.base_url_filter').val()
          });
      </script>

  {/if}
{/block}
