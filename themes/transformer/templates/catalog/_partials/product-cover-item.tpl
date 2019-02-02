{*The same code in the product.js, using js to add images fast, but not standard*}
              <div class="swiper-slide">
                <div class="easyzoom--overlay {if $sttheme.enable_zoom} easyzoom {/if} {if $sttheme.enable_zoom==2} disable_easyzoom_on_mobile {/if}">
                    <a href="{if $sttheme.enable_zoom==1 || ($sttheme.enable_zoom==2 && !$sttheme.is_mobile_device) || $sttheme.enable_thickbox}{$image.bySize.superlarge_default.url}{else}javascript:;{/if}" class="{if $sttheme.enable_thickbox && !$sttheme.enable_zoom} st_popup_image st_pro_popup_image {/if} {if $sttheme.retina && isset($image.bySize.superlarge_default_2x.url)} replace-2x {/if}" {if $sttheme.enable_thickbox && !$sttheme.enable_zoom} data-group="pro_gallery_popup" {/if} title="{$image.legend}">
                        <img
                          class="pro_gallery_item {if !$sttheme.is_ajax}swiper-lazy{/if}"
                          {if !$sttheme.is_ajax}data-{/if}src="{$image.bySize.{$sttheme.gallery_image_type}.url}"
                          {if $sttheme.retina && isset($image.bySize.{$sttheme.gallery_image_type|cat:'_2x'}.url)} {if !$sttheme.is_ajax}data-{/if}srcset="{$image.bySize.{$sttheme.gallery_image_type|cat:'_2x'}.url} 2x" {/if}
                          alt="{$image.legend}"
                          title="{$image.legend}"
                          width="{$image.bySize.{$sttheme.gallery_image_type}.width}"
                          height="{$image.bySize.{$sttheme.gallery_image_type}.height}"
                          data-id_image="{$image.id_image}"
                          {if $sttheme.google_rich_snippets} itemprop="image" {/if}
                        />
                    </a>
                </div>
              </div>