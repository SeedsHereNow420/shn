{if ((isset($faqs)) && $faqs) || (isset($button_on_product_page) && $button_on_product_page !== false)}
    <div class="page-product-box gomakoil_faq_page" >

        <div class="association_faqs rte">
            {if isset($faqs) && $faqs}
                <ul class="block_faq_product_page">
                    {assign var='count_most' value=0}
                    {foreach from=$faqs item=faq}
                        {$count_most = $count_most + 1}
                        <a class="questions change_item{if $faq['as_url']} as_url{/if}" >
                            <i class="material-icons">&#xE315;</i>
                            {$count_most|escape:'htmlall':'UTF-8'}. {strip_tags($faq['question'], '<span>')|escape:'htmlall':'UTF-8' nofilter}
                        </a>
                        <a href="{$faqUrl|escape:'htmlall':'UTF-8'}{$faq['link_rewrite_cat']|escape:'htmlall':'UTF-8'}/{$faq['link_rewrite']|escape:'htmlall':'UTF-8'}.html" class="icon_fag"><i class="material-icons">&#xE157;</i></a><div style="clear: both"></div>
                        <div class="answer_faq">
                            {$faq['answer']|escape:'htmlall':'UTF-8' nofilter}
                        </div>
                    {/foreach}
                </ul>
            {/if}
        </div>


        <div class="block-faq-product-page">
            {if isset($button_on_product_page) && $button_on_product_page !== false}
                <button type="submit" class="button btn-primary button-ask-question">
                    <span>{l s='Ask a question'  mod='faqs'}</span>
                </button>
            {/if}
            <input type="hidden" name="basePath" class="basePath" value="{$basePath|escape:'htmlall':'UTF-8'}">
            <input type="hidden" name="id_shop" class="id_shop" value="{$id_shop|escape:'htmlall':'UTF-8'}">
            <input type="hidden" name="id_lang" class="id_lang" value="{$id_lang|escape:'htmlall':'UTF-8'}">
        </div>
    </div>
{/if}