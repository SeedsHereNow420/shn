{*
*
*
* NOTICE OF LICENSE
*
* This source file is subject to the following license: REGULAR LICENSE
* that is bundled with this package in the file LICENSE.txt.
*
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade to newer
* versions in the future.
*
*  @author VaSibi
*  @license    REGULAR LICENSE
*
*}

{function name=generateslider}
<!-- StorefrontSlider-->
{if $data != ''}
{*$page.page_name|@print_r*}
{*$page|@print_r*}
{*$category|@print_r*}
{*$id_category*}
{*$id_category_parent*}
{foreach from=$data item=slider name=slider}
{*$slider|@print_r*}
{if ($id_category|in_array:$slider.display_cat and $page.page_name == 'category' and $slider.status>0) or (isset($slider.home_visible) and $page.page_name == 'index' and $slider.status>0) or (isset($slider.display_custom_hook) and $slider.display_custom_hook == '1' and $slider.status>0)}
<style>
/* COLOURS */
#dealsofthedaypro{$slider.id_displaydealsofthedaypro_sliders} .deal_l {
  background-image: linear-gradient(to top, rgba({$slider.maincolor_rgb|escape:'htmlall':'UTF-8'}, 0.7), rgba(255, 255, 255, 0)) !important;
}
#dealsofthedaypro{$slider.id_displaydealsofthedaypro_sliders} .deal_counterbtn_a {
  background: {$slider.color1|escape:'htmlall':'UTF-8'} none repeat scroll 0 0 !important;
}
#dealsofthedaypro{$slider.id_displaydealsofthedaypro_sliders} .deal_counter {
  color: {$slider.color1|escape:'htmlall':'UTF-8'} !important;
}
#dealsofthedaypro{$slider.id_displaydealsofthedaypro_sliders} .deal_counterimg path {
  fill: {$slider.color1|escape:'htmlall':'UTF-8'};
}
#dealsofthedaypro{$slider.id_displaydealsofthedaypro_sliders} .deal_counterbtn_a {
  color: {$slider.color2|escape:'htmlall':'UTF-8'} !important;
}
#dealsofthedaypro{$slider.id_displaydealsofthedaypro_sliders} .deal_lh {
  color: {$slider.color3|escape:'htmlall':'UTF-8'} !important;
}
#dealsofthedaypro{$slider.id_displaydealsofthedaypro_sliders} .deal_sl {
  background-color: {$slider.color4|escape:'htmlall':'UTF-8'} !important;
}
#dealsofthedaypro{$slider.id_displaydealsofthedaypro_sliders} .deal_slr{
  margin-top: -15px;
}
#dealsofthedaypro{$slider.id_displaydealsofthedaypro_sliders} .deal_slr_item_name {
  color: {$slider.color5|escape:'htmlall':'UTF-8'} ;
}
#dealsofthedaypro{$slider.id_displaydealsofthedaypro_sliders} .deal_slr_item_discount {
  color: {$slider.color6|escape:'htmlall':'UTF-8'} !important;
}
#dealsofthedaypro{$slider.id_displaydealsofthedaypro_sliders} .deal_slr_item_extra {
  color: {$slider.color7|escape:'htmlall':'UTF-8'} !important;
}
#dealsofthedaypro{$slider.id_displaydealsofthedaypro_sliders} .deal_slr_item_extra2 {
  color: {$slider.color8|escape:'htmlall':'UTF-8'} !important;
}

/*colorfill*/
.deal_slr_item_ii > div {
    height: 100%;
    width: 100%;
    background-repeat: no-repeat;
    background-size: 200px 200px;
}
.deal_slr_item_ii > img {
  max-width: 90%;
}

{if $slider.rounded}
#dealsofthedaypro{$slider.id_displaydealsofthedaypro_sliders} .left_deal_w, #dealsofthedaypro{$slider.id_displaydealsofthedaypro_sliders} .deal_slr_item_ii {
  border-radius: 8px;
}
#dealsofthedaypro{$slider.id_displaydealsofthedaypro_sliders} .deal_counterbtn_a {
  border-radius: 4px;
}
{/if}

{if $slider.margin > 21}
#dealsofthedaypro{$slider.id_displaydealsofthedaypro_sliders} .deal_slr_item {
  margin-right: {$slider.margin|escape:"html":'UTF-8'-20}px;
}
{/if}

.deal_slr_item_ii {
  webkit-box-shadow: -4px 7px 28px -7px rgba(0,0,0,0.0075);
  -moz-box-shadow: -4px 7px 28px -7px rgba(0,0,0,0.0075);
  box-shadow: -4px 7px 28px -7px rgba(0,0,0,0.0075);
}
</style>
<div id="dealsofthedaypro{$slider.id_displaydealsofthedaypro_sliders}" class="" data-slider="">
<div class="container" {if $page.page_name == 'index'}style="padding-left:1px;padding-right:1px;"{/if}>
<div class="row">
<div class="{if $dealsofthedaypro_hookposition != 'contenttop' or $page.page_name == 'index'}col-md-12{/if}">
  {*{$data|@print_r}*}
    <div class="full_deal">
    <div class="left_deal">
      <div class="left_deal_w">
        <div class="deal_l">
          <div class="deal_lv">
            <h2 class="deal_lh">{$slider.maintext|escape:"html":'UTF-8'}</h2>
            {if $slider.exp_date|count_characters > 0}{*and $slider.expired == 0*}
            <div class="deal_counter"><div id="dealscount{$slider.id_displaydealsofthedaypro_sliders}"><span></span></div>
            <script>
            // Set the date we're counting down to
            var countDownDate{$slider.id_displaydealsofthedaypro_sliders} = new Date("{$slider.exp_date|escape:"html":'UTF-8'}").getTime(); //31 March 17 21:43:00
            //console.log(countDownDate{$slider.id_displaydealsofthedaypro_sliders});
            //correct date format Jan 5, 2018 15:37:25
              // Update the count down every 1 second
              var x{$slider.id_displaydealsofthedaypro_sliders} = setInterval(function() {

                  // get client's current date
                  var now = new Date().getTime();
                  // better get date to utc
                  var date = new Date();
                  var utc = date.getTime() + (date.getTimezoneOffset() * 60000);

                  // Find the distance between now an the count down date
                  //var distance = countDownDate - now;
                  var demo = 2;
                  //console.log(countDownDate{$slider.id_displaydealsofthedaypro_sliders}); // 1536841282000
                  var distance{$slider.id_displaydealsofthedaypro_sliders} = countDownDate{$slider.id_displaydealsofthedaypro_sliders} - utc;
                  //console.log('distance= '+distance);
                  // Time calculations for days, hours, minutes and seconds
                  var days = Math.floor(distance{$slider.id_displaydealsofthedaypro_sliders} / (1000 * 60 * 60 * 24));
                  var hours = Math.floor((distance{$slider.id_displaydealsofthedaypro_sliders} % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                  var minutes = Math.floor((distance{$slider.id_displaydealsofthedaypro_sliders} % (1000 * 60 * 60)) / (1000 * 60));
                  var seconds = Math.floor((distance{$slider.id_displaydealsofthedaypro_sliders} % (1000 * 60)) / 1000);
                  //console.log(days);
                  if (demo == '1') {
                    days = Math.abs(days);
                    hours = Math.abs(hours);
                    minutes = Math.abs(minutes);
                    seconds = Math.abs(seconds);
                    if (days > 2) {
                      days = 1;
                    }
                  }
                  // Output the result in an element with id="dealscount"
                  document.getElementById("dealscount{$slider.id_displaydealsofthedaypro_sliders}").innerHTML = days + "d " + hours + "h "
                  + minutes + "m " + seconds + "s ";

                  // If the count down is over, write some text
                  //console.log(seconds);
                  //console.log(distance{$slider.id_displaydealsofthedaypro_sliders});
                  if ((distance{$slider.id_displaydealsofthedaypro_sliders} < 0 && demo != 1) || isNaN(distance{$slider.id_displaydealsofthedaypro_sliders})) {
                      clearInterval(x{$slider.id_displaydealsofthedaypro_sliders});
                      document.getElementById("dealscount{$slider.id_displaydealsofthedaypro_sliders}").innerHTML = " ";
                  }
              }, 1000);
              </script>
            </div>
            {/if}
            {if $slider.btntext|count_characters > 0}
            <div class="deal_counterbtn">
              <a class="deal_counterbtn_a" href="{$slider.btnlink|escape:"html":'UTF-8'}">{$slider.btntext|escape:"html":'UTF-8'}</a>
            </div>
            {/if}
          </div>
        </div>
        <div class="deal_sl">
        <div class="deal_slr">
              {if !$slider.offslider and $slider.products|@count gt 3}
              <script>
              function DeferedJQuery{$slider.id_displaydealsofthedaypro_sliders}() {
                  //Do stuff with jQuery
                  //jQuery(document).ready(function($){
                  {if $slider.slideshow == 1}
                  var autostart = true;
                  {else}
                  var autostart = false;
                  {/if}
                  {if $slider.margin > 5}
                  var margin = {$slider.margin};
                  {else}
                  var margin = 5;
                  {/if}
              		//console.log(margin);
              		$('.deal_prevb').show();
              		$('.deal_nextb').show();
              		//console.log("slider{$slider.id_displaydealsofthedaypro_sliders} enabled");
              		$(".bxslider{$slider.id_displaydealsofthedaypro_sliders}").bxSlider({
              	    minSlides: 3,
              	    maxSlides: 7,
              	    nextSelector: '.deal_nextbsvg{$slider.id_displaydealsofthedaypro_sliders}',
              	    prevSelector: '.deal_prevbsvg{$slider.id_displaydealsofthedaypro_sliders}',
              	    nextText: '>', //→
              	    prevText: '<', //←
              	    pager: false,
              	    easing: 'swing', //'ease-in-out', //'linear', http://gsgd.co.uk/sandbox/jquery/easing/
              	    //randomStart: true,
              	    //slideWidth: 232,
              	    //mode: 'fade',
              	    infiniteLoop: true,
              	    slideMargin: margin,
              			auto: autostart,
                    captions: false,
                    //ticker: true,
                    responsive: true,
              	  });
                  //});
              }

              function defer(method) {
                  if (window.jQuery) {
                      //DeferedJQuery{$slider.id_displaydealsofthedaypro_sliders}();
                      method();
                  } else {
                      setTimeout(function() { defer(method) }, 500);
                  }
              }

              defer(function () {
                  //console.log("jQuery is now loaded");
                  DeferedJQuery{$slider.id_displaydealsofthedaypro_sliders}();
              });
              </script>
              <div id="deal_prev_button" class="deal_prev" onclick="document.getElementById('dealsofthedaypro{$slider.id_displaydealsofthedaypro_sliders}').getElementsByClassName('bx-prev')[0].click()"><div class="deal_prevb" style="display:none;">
                <svg width="14.6" height="24" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg" class="deal_prevbsvg{$slider.id_displaydealsofthedaypro_sliders}"><path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#fff" class="deal_prevbsvgpath"/></svg>
              </div></div>
              <div id="deal_next_button" class="deal_next" onclick="document.getElementById('dealsofthedaypro{$slider.id_displaydealsofthedaypro_sliders}').getElementsByClassName('bx-next')[0].click()"><div class="deal_nextb" style="display:none;">
                <svg width="14.6" height="24" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg" class="deal_nextbsvg{$slider.id_displaydealsofthedaypro_sliders}" ><path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#fff" class="deal_nextbsvgpath"/></svg>
              </div></div>
              {/if}
            <div id="slider{$slider.id_displaydealsofthedaypro_sliders}">
            <ul class="bxslider{$slider.id_displaydealsofthedaypro_sliders}">
            {foreach from=$slider.products item=catitem name=catitem}
            {assign var="counter" value=$smarty.foreach.catitem.iteration}
                {if isset($catitem.name) and $catitem.active == '1'}
                <li class="deal_slr_item" style="max-width:216px;"><div class="deal_slr_item">
                    <a title="{$catitem.name|escape:'html':'UTF-8'}" class="deal_slr_item_a" href="{$catitem.plink|escape:"html":'UTF-8'}">
                      <div class="deal_slr_item_i" style="height:200px;">
                          <div class="deal_slr_item_ii" style="height:200px;width:200px;" >
                          <img class="deal_slr_item_image" src="{$link->getImageLink($catitem.link_rewrite, $catitem.id_image, 'home_default')|escape:'html'}" height="{$homeSize.height}" width="{$homeSize.width}" alt="{$catitem.name|escape:'html':'UTF-8'}" colorify-get{$smarty.foreach.catitem.iteration} cid="colorify-get{$smarty.foreach.catitem.iteration}" />
                      </div>
                      </div>
                      {*{$currency|@print_r}*}
                      <div class="deal_slr_item_name">{$catitem.name|escape:'htmlall':'UTF-8'}</div>
                      <div class="deal_slr_item_discount">
                        {if $catitem.show_price = 1 AND !isset($restricted_country_mode)}
                        {if isset($catitem.productPrice) and isset($catitem.productPriceWithoutReduction) }
                        <!--start price default data-->
                        {if $catitem.specificPrice}
                        <span id="reduction_percents" {if $catitem.productPriceWithoutReduction <= 0 || !$catitem.specificPrice || $catitem.specificPrice.reduction_type != 'percentage'} style="display:none;"{/if}>{strip}
        										{if $catitem.specificPrice && $catitem.specificPrice.reduction_type == 'percentage'}{$catitem.specificPrice.reduction*100|escape:'htmlall':'UTF-8'}{l s='% Off' mod='dealsofthedaypro'}{/if}
        								{/strip}</span>
        								<span id="reduction_amounts" {if $catitem.productPriceWithoutReduction <= 0 || !$catitem.specificPrice || $catitem.specificPrice.reduction_type != 'amount' || $catitem.specificPrice.reduction|floatval ==0} style="display:none"{/if}>{strip}
        									{if $catitem.specificPrice && $catitem.specificPrice.reduction_type == 'amount' && $catitem.specificPrice.reduction|floatval !=0}
                            -{Tools::displayPrice($catitem.productPriceWithoutReduction-$catitem.productPrice)}{l s=' Off' mod='dealsofthedaypro'}
        									{/if}
        								{/strip}</span>
                        {else}
                        {Tools::displayPrice($catitem.price)}
                        {*$catitem|@print_r*}
                        {/if}
                        <!--end price default data-->
                        {/if}
                        {/if}


                      </div>
                      <div class="deal_slr_item_extra">
                        {if $slider.showcase == 01 and isset($catitem.manufacturer_name)}
                            {$catitem.manufacturer_name|strip_tags:'UTF-8'|truncate:53:''|escape:'html':'UTF-8'}
                        {/if}
                        {if $slider.showcase == 02 and isset($catitem.supplier_name)}
                            {$catitem.supplier_name|strip_tags:'UTF-8'|truncate:53:''|escape:'html':'UTF-8'}
                        {/if}
                        {if $slider.showcase == 03 and isset($catitem.categorydefault)}
                            {$catitem.categorydefault|strip_tags:'UTF-8'|truncate:53:''|escape:'html':'UTF-8'}
                        {/if}
                      </div>
                      <div class="deal_slr_item_extra2">{if isset($catitem.description_short) and $slider.description}<p>{$catitem.description_short|strip_tags:'UTF-8'|truncate:53:'...'|escape:'html':'UTF-8'}</p>
                      {else}<p><br /></p>{/if}</div>
                    </a>
                </div>
                </li>
                {/if}
            {/foreach}
            </ul></div>
        </div>
        </div>
</div></div>
<div class="right_deal"></div>
</div>
</div></div></div></div>
{/if}
{/foreach}
{/if}
<!-- StorefrontSlider -->
{/function}

{if $sliders != ''}
{generateslider data=$sliders}
{/if}
