{*The same code in the product.js, using js to add images fast, but not standard*}
              <div class="swiper-slide {if $image.id_image == $product.cover.id_image} clicked_thumb {/if}">
                <div class="pro_gallery_thumb_box general_border {if isset($curr_combination_thumb) && $curr_combination_thumb} curr_combination_thumb {/if}">
                  <img
                      class="pro_gallery_thumb {if $sttheme.product_thumbnails!=3 && !$sttheme.is_ajax && (!isset($disable_lazyloading) || !$disable_lazyloading) && (!isset($disable_lazyloading) || !$disable_lazyloading)}swiper-lazy{/if}"
                      {if $sttheme.product_thumbnails!=3 && !$sttheme.is_ajax && (!isset($disable_lazyloading) || !$disable_lazyloading)}data-{/if}src="{$image.bySize.{$sttheme.thumb_image_type}.url}"
                      {if $sttheme.retina && isset($image.bySize.{$sttheme.thumb_image_type|cat:'_2x'}.url)} {if $sttheme.product_thumbnails!=3 && !$sttheme.is_ajax && (!isset($disable_lazyloading) || !$disable_lazyloading)}data-{/if}srcset="{$image.bySize.{$sttheme.thumb_image_type|cat:'_2x'}.url} 2x" {/if}
                      alt="{if $image.legend}{$image.legend}{else}{$product.name}{/if}"
                      title="{if $image.legend}{$image.legend}{else}{$product.name}{/if}"
                      width="{$image.bySize.{$sttheme.thumb_image_type}.width}"
                      height="{$image.bySize.{$sttheme.thumb_image_type}.height}"
                      {*do not need thumbnail{if $sttheme.google_rich_snippets} itemprop="image" {/if}*}
                    /> 
                </div>
              </div>