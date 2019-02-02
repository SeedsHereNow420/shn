{if isset($banner) && $banner}
<div id="{if $banner}page_banner_container_{$banner.id_st_page_banner}{/if}" class="breadcrumb_wrapper {if $sttheme.responsive_max!=3 && $breadcrumb_width} wide_container {/if}" {if $banner['image_multi_lang']} style="background-image:url({$banner['image_multi_lang']});" {/if}>
{if !$banner.hide_breadcrumb || $banner.description}
  <div class="{if $sttheme.responsive_max!=3}container{else}container-fluid{/if}"><div class="row">
        <div class="col-12 {if $banner.text_align==2} text-2 {elseif $banner.text_align==3} text-3 {else} text-1 {/if}">
            {if $banner.description}
            <div class="style_content">
                {$banner.description nofilter}
            </div>
            {/if}
          {if !$banner.hide_breadcrumb}
          <nav data-depth="{$breadcrumb.count}" class="breadcrumb_nav">
            <ul itemscope itemtype="http://schema.org/BreadcrumbList">
              {foreach from=$breadcrumb.links item=path name=breadcrumb}
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                  <a itemprop="item" href="{$path.url}" class="text_color" title="{$path.title}">
                    <span itemprop="name">{$path.title}</span>
                  </a>
                  <meta itemprop="position" content="{$smarty.foreach.breadcrumb.iteration}">
                </li>
                {if !$smarty.foreach.breadcrumb.last}<li class="navigation-pipe">{$sttheme.navigation_pipe|default:'>' nofilter}</li>{/if}
              {/foreach}
            </ul>
          </nav>
          {/if}
        </div>
  </div></div>
{/if}
</div>
{/if}