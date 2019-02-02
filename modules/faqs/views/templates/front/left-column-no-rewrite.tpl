{if $layout == 'layouts/layout-both-columns.tpl' && $infos['hookName'] == 'displayRightColumn'} {else}

  {if isset($infos['button']) && $infos['button']}
    <div class="block block-faq-left-column">
      <h4 class="title_block">{l s='Ask a question'  mod='faqs'}</h4>
      <div class="block_content list-block">
        <button type="submit" class="button btn-primary button-ask-question">
          <span>{l s='Ask a question'  mod='faqs'}</span>
          <input type="hidden" name="basePath" class="basePath" value="{$basePath|escape:'htmlall':'UTF-8'}">
          <input type="hidden" name="id_shop" class="id_shop" value="{$id_shop|escape:'htmlall':'UTF-8'}">
          <input type="hidden" name="id_lang" class="id_lang" value="{$id_lang|escape:'htmlall':'UTF-8'}">
        </button>
      </div>
    </div>
  {/if}

  {if isset($infos['faqCategories']) && $infos['faqCategories']}
    <div class="block block-faq-left-column">
      <h4 class="title_block">{l s='Faq categories'  mod='faqs'}</h4>
      <div class="block_content list-block">
        <ul class="categories">
          {foreach from=$infos['faqCategories'] item=faqCategory}
            <li>
              <a class="category_name name_{$faqCategory['id_gomakoil_faq_category']|escape:'htmlall':'UTF-8'} change_item"  href="{$infos['faqUrl']|escape:'htmlall':'UTF-8'}&category={$faqCategory['link_rewrite']|escape:'htmlall':'UTF-8'}">{$faqCategory['name']|escape:'htmlall':'UTF-8'}</a>
            </li>
          {/foreach}
        </ul>
      </div>
    </div>
  {/if}
  {if isset($infos['mostFaq']) && $infos['mostFaq']}
    <div class="block block-faq-left-column">
      <h4 class="title_block">{l s='Featured FAQs'  mod='faqs'}</h4>
      <div class="block_content list-block">
        <ul class="categories">
          {foreach from=$infos['mostFaq'] item=most}
            {if ($most['association'] && !$most['hide_faq']) || !$most['association']}
              <li>
                <a class="questions change_item" href="{$infos['faqUrl']|escape:'htmlall':'UTF-8'}&category={$most['link_rewrite_cat']|escape:'htmlall':'UTF-8'}&question={$most['link_rewrite']|escape:'htmlall':'UTF-8'}">
                  <i class="material-icons">&#xE315;</i>
                  {strip_tags($most['question'], '<span>')|escape:'htmlall':'UTF-8' nofilter}
                </a>
              </li>
            {/if}
          {/foreach}
        </ul>
      </div>
    </div>
  {/if}
{/if}

{if isset($product_category_assoc_faqs) && $product_category_assoc_faqs != false}
  <div class="block block-faq-left-column">
    <h4 class="title_block">{l s='Product category FAQs'  mod='faqs'}</h4>
    <div class="block_content list-block">
      <ul class="categories">
          {foreach from=$product_category_assoc_faqs item=faq}
            <li>
              <a class="questions change_item"
                 href="{$infos['faqUrl']|escape:'htmlall':'UTF-8'}{$faq['link_rewrite_cat']|escape:'htmlall':'UTF-8'}/{$faq['link_rewrite']|escape:'htmlall':'UTF-8'}.html">
                <i class="material-icons">&#xE315;</i>{strip_tags($faq['question']|escape:'htmlall':'UTF-8', '<span>')}
              </a>
            </li>
          {/foreach}
      </ul>
    </div>
  </div>
{/if}