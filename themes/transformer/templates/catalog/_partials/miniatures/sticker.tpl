{strip}
{assign var="has_sticker_static" value=0}
{if isset($stickers) && $stickers}
  {foreach $stickers as $ststicker}
    {if in_array($ststicker.sticker_position, $sticker_position)}
      {if !$has_sticker_static}<div class="st_sticker_block">{$has_sticker_static=1}{/if}
      <div class="st_sticker layer_btn flag_{(int)$ststicker.is_flag} {if in_array(10,$sticker_position) || in_array(11,$sticker_position)} st_sticker_static {/if} st_sticker_{$ststicker.id_st_sticker} {if $ststicker.type} st_sticker_type_{$ststicker.type} {/if} {if $ststicker.image_multi_lang} st_sticker_img {/if}">{if $ststicker.image_multi_lang}<img src="{$ststicker.image_multi_lang}" alt="{$ststicker.text}" title="{$ststicker.text}" width="{$ststicker.width}" height="{$ststicker.height}">{else}<span>{$ststicker.text}</span>{/if}</div>
    {/if}
  {/foreach}
{/if}
{if isset($ststickers) && $ststickers}
  {foreach $product.flags as $flag}
  	{foreach $ststickers as $ststicker}
	    {if in_array($ststicker.sticker_position, $sticker_position) && ( ($flag.type=='new' &&  $ststicker.type==1) || ($flag.type=='on-sale' &&  $ststicker.type==2) || ($flag.type=='discount' &&  $ststicker.type==3) || ($flag.type=='online-only' &&  $ststicker.type==5) || ($flag.type=='pack' &&  $ststicker.type==6) )}
	      {if !$has_sticker_static}<div class="st_sticker_block">{$has_sticker_static=1}{/if}
	      <div class="st_sticker layer_btn flag_{(int)$ststicker.is_flag} {if in_array(10,$sticker_position) || in_array(11,$sticker_position)} st_sticker_static {/if} st_sticker_{$ststicker.id_st_sticker} {if $ststicker.type} st_sticker_type_{$ststicker.type} {/if} {if $ststicker.image_multi_lang} st_sticker_img {/if}">{if $ststicker.image_multi_lang}<img src="{$ststicker.image_multi_lang}" alt="{$ststicker.text}" title="{$ststicker.text}"  width="{$ststicker.width}" height="{$ststicker.height}">{else}<span>{$ststicker.text}</span>{/if}</div>
	    {/if}
  	{/foreach}
  {/foreach}
  	{foreach $ststickers as $ststicker}
      {if in_array($ststicker.sticker_position, $sticker_position) && (($ststicker.type==4 && $sticker_sold_out) || ($ststicker.type==7 && !$sticker_sold_out))}
	      {if !$has_sticker_static}<div class="st_sticker_block">{$has_sticker_static=1}{/if}
	      <div class="st_sticker layer_btn flag_{(int)$ststicker.is_flag} {if in_array(10,$sticker_position) || in_array(11,$sticker_position)} st_sticker_static {/if} st_sticker_{$ststicker.id_st_sticker} {if $ststicker.type} st_sticker_type_{$ststicker.type} {/if} {if $ststicker.image_multi_lang} st_sticker_img {/if}">{if $ststicker.image_multi_lang}<img src="{$ststicker.image_multi_lang}" alt="{$ststicker.text}" title="{$ststicker.text}"  width="{$ststicker.width}" height="{$ststicker.height}">{else}<span>{$ststicker.text}</span>{/if}</div>
	    {/if}
  	{/foreach}
{/if}
{if $has_sticker_static}</div>{/if}
{/strip}