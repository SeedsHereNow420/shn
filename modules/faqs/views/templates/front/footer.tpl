<div class="col-md-2 links links_blog">
    <h3 class="h3 hidden-sm-down">{l s='Featured FAQs'  mod='faqs'}</h3>
    <div class="title clearfix hidden-md-up" data-target="#footer_sub_menu_blog" data-toggle="collapse">
        <span class="h3">{l s='Featured FAQs'  mod='faqs'}</span>
        <span class="pull-xs-right">
          <span class="navbar-toggler collapse-icons">
            <i class="material-icons add"></i>
            <i class="material-icons remove"></i>
          </span>
        </span>
    </div>
    <ul id="footer_sub_menu_blog" class="collapse">
        {foreach from=$faqs item=value}
            <li>
                <a id="link-blog" class="cms-page-link" href="{$blogUrl|escape:'htmlall':'UTF-8'}{$value['link_rewrite_cat']|escape:'htmlall':'UTF-8'}/{$value['link_rewrite']|escape:'htmlall':'UTF-8'}.html" >

                    {strip_tags($value['question'], '')|escape:'htmlall':'UTF-8' nofilter}
                </a>
            </li>
        {/foreach}
    </ul>
</div>