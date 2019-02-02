<div class="col-lg-4 links">
  <div class="row">
  {foreach $linkBlocks as $linkBlock}
    <div class="col-lg-6 block">
      <div class="title_block">
          <div class="title_block_inner">{$linkBlock.title}</div>
          <div class="opener dlm"><i class="fto-plus"></i><i class="fto-minus-2"></i></div>
      </div>
      <ul class="footer_sub_menu bullet footer_block_content">
        {foreach $linkBlock.links as $link}
          <li>
            <a
                id="{$link.id}-{$linkBlock.id}"
                class="{$link.class}"
                href="{$link.url}"
                title="{$link.description}"
                {if !empty($link.target)} target="{$link.target}" {/if}>
              {$link.title}
            </a>
          </li>
        {/foreach}
      </ul>
    </div>
  {/foreach}
  </div>
</div>
