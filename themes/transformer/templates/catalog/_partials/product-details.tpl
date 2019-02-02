<div role="tabpanel" class="tab-pane {if !$sttheme.remove_product_details_tab && $st_active_pro_tab=='product-details'} active {if $sttheme.product_tabs_style==1} st_open {/if} {/if} {if $sttheme.remove_product_details_tab} product-tab-hide {/if}"
     id="product-details"
     data-product="{$product.embedded_attributes|json_encode}"
  >
    <div class="mobile_tab_title">
        <a href="javascript:;" class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></a>
        <div class="mobile_tab_name">{l s='Product Details' d='Shop.Theme.Catalog'}</div>
    </div>
    <div class="tab-pane-body">

    {if isset($product.reference_to_display)}
      <div class="product-reference">
        <label class="label">{l s='Reference' d='Shop.Theme.Catalog'} </label>
        <span>{$product.reference_to_display}</span>
      </div>
    {/if}

    {block name='product_out_of_stock'}
      <div class="product-out-of-stock">
        {hook h='actionProductOutOfStock' product=$product}
      </div>
    {/block}
    
    {block name='product_features'}
      {if $product.features}
        <section class="product-features">
          <h3 class="page_heading">{l s='Data sheet' d='Shop.Theme.Catalog'}</h3>
            {foreach from=$product.features item=feature}
            <dl class="data-sheet flex_container">
              <dt class="name">{$feature.name}</dt>
              <dd class="value flex_child">{$feature.value}</dd>
            </dl>
            {/foreach}
        </section>
      {/if}
    {/block}

    {* if product have specific references, a table will be added to product details section *}
    {block name='product_specific_references'}
      {if isset($product.specific_references)}
        <section class="product-features">
          <h3 class="page_heading">{l s='Specific References' d='Shop.Theme.Catalog'}</h3>
            
              {foreach from=$product.specific_references item=reference key=key}
              <dl class="data-sheet flex_container">
                <dt class="name">{$key}</dt>
                <dd class="value flex_child">{$reference}</dd>
              </dl>
              {/foreach}
            
        </section>
      {/if}
    {/block}

    </div>
</div>
