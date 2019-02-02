<section class="featured-products block">
  <h3 class="title_block title_block_center">
      <a href="{$allProductsLink}" title="{l s='View all featured products' d='Shop.Theme.Transformer'}">{l s='Popular Products' d='Shop.Theme.Catalog'}</a>
  </h3>

  <div class="products">
    {foreach from=$products item="product"}
      {include file="catalog/_partials/miniatures/product.tpl" product=$product}
    {/foreach}
  </div>
</section>