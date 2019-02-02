{if $product.stproductcomments.display_as_link}
<a href="{url entity='module' name='stproductcomments' controller='list' params=['id_product' => $product.id_product]}" title="{l s='View all reviews' d='Shop.Theme.Transformer'}"
{else}
<div
{/if}
class="pad_b6 rating_box">
  <span class="rating_box_inner">
      {for $foo=1 to floor($product.stproductcomments.average)}
          <i class="fto-star-2 icon_btn fs_md light"></i>
      {/for}
      {if floor($product.stproductcomments.average)<5}
          {for $foo=floor($product.stproductcomments.average)+1 to 5}
              <i class="fto-star-2 icon_btn fs_md"></i>
          {/for}
      {/if}
  </span>
  {if $product.stproductcomments.display_rating==3 || $product.stproductcomments.display_rating==4}<span class="ml-1">({$product.stproductcomments.total})</span>{/if}
{if $product.stproductcomments.display_as_link}
</a>
{else}
</div>
{/if}