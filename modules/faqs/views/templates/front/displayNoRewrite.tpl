{extends file='page.tpl'}

{block name='left_column'}
    {if $faq || $questions || $search_val}
        {if $layout == 'layouts/layout-left-column.tpl' || $layout == 'layouts/layout-both-columns.tpl'}
            <div id="left-column" class="col-xs-12 col-sm-3">
                {widget name="faqs" hook='displayLeftColumn'}
            </div>
        {/if}
    {/if}
{/block}

{block name='page_content'}

    {if !$faq && !$questions && !$search_val}
      <div class="gomakoil_faq_page">
        {if isset($mostFaq) && $mostFaq}
          <div class="most_faqs">
            <div class="title_home_page_fag">{l s='Featured Frequently Asked Questions'  mod='faqs'}</div>
            <div class="content_home_page_fag">
              {assign var='count_most' value=0}
              {foreach from=$mostFaq item=most}
                {if ($most['association'] && !$most['hide_faq']) || !$most['association']}
                {$count_most = $count_most + 1}
                <a class="questions change_item{if $most['as_url']} as_url{/if}" >
                  <i class="material-icons">&#xE315;</i>
                  {$count_most|escape:'htmlall':'UTF-8'}. {strip_tags($most['question'], '<span>')|escape:'htmlall':'UTF-8' nofilter}

                </a><a href="{$faqUrl|escape:'htmlall':'UTF-8'}&category={$most['link_rewrite_cat']|escape:'htmlall':'UTF-8'}&question={$most['link_rewrite']|escape:'htmlall':'UTF-8'}" class="icon_fag"><i class="material-icons">&#xE157;</i></a><div style="clear: both"></div>
                <div class="answer_faq">
                  {$most['answer']|escape:'htmlall':'UTF-8' nofilter}
                </div>
                {/if}
              {/foreach}

            </div>
          </div>
        {/if}
        <div class="search_faqs">
          <input type="text" class="search_fag_input" placeholder="{l s='Search'  mod='faqs'}">
          <button type="submit" onclick="searchFags($('.search_fag_input').val(), '{$faqUrl|escape:'htmlall':'UTF-8'}&search='); return false;"  class="button search_fag_submit btn-primary"><span>{l s='Search'  mod='faqs'}</span></button>
        </div>
        <div class="topic_faqs">
          <div class="title_home_page_fag">{l s='Faq topics'  mod='faqs'}</div>
          <div class="content_home_page_cat">
              {foreach from=$faqCategories item=faqCategory}
                <div class="category_block">
                  <a class="category_name_home_page name_{$faqCategory['id_gomakoil_faq_category']|escape:'htmlall':'UTF-8'} change_item" style="color: {$faqCategory['color']|escape:'htmlall':'UTF-8'}"  href="{$faqUrl|escape:'htmlall':'UTF-8'}&category={$faqCategory['link_rewrite']|escape:'htmlall':'UTF-8'}">{$faqCategory['name']|escape:'htmlall':'UTF-8'}</a>
                  <div class="all_questions">
                    {if $faqCategory['faqs']}
                      {assign var='count_fag_in_cat' value=0}
                      {foreach from=$faqCategory['faqs'] item=question}
                        {if ($question['association'] && !$question['hide_faq']) || !$question['association']}
                        {$count_fag_in_cat = $count_fag_in_cat + 1}
                        {if count($faqCategory['faqs'])>3}
                          {if $count_fag_in_cat<=3}
                          <a class="questions change_item{if $question['as_url']} as_url{/if}"  >
                            <i class="material-icons">&#xE315;</i>
                            {$count_fag_in_cat|escape:'htmlall':'UTF-8'}. {strip_tags($question['question'], '<span>')|escape:'htmlall':'UTF-8' nofilter}
                          </a>
                          <a href="{$faqUrl|escape:'htmlall':'UTF-8'}&category={$faqCategory['link_rewrite']|escape:'htmlall':'UTF-8'}&question={$question['link_rewrite']|escape:'htmlall':'UTF-8'}" class="icon_fag"><i class="material-icons">&#xE157;</i></a><div style="clear: both"></div>
                          <div class="answer_faq">
                            {$question['answer']|escape:'htmlall':'UTF-8' nofilter}
                          </div>
                          {if $count_fag_in_cat == '3'}
                            <a class="more_faq_cat" href="{$faqUrl|escape:'htmlall':'UTF-8'}&category={$faqCategory['link_rewrite']|escape:'htmlall':'UTF-8'}" style="color: {$faqCategory['color']|escape:'htmlall':'UTF-8'}" >{l s='show more'  mod='faqs'}</a>
                          {/if}
                          {/if}
                        {else}
                          <a class="questions change_item{if $question['as_url']} as_url{/if}" >
                            <i class="material-icons">&#xE315;</i>
                            {$count_fag_in_cat|escape:'htmlall':'UTF-8'}. {strip_tags($question['question'], '<span>')|escape:'htmlall':'UTF-8' nofilter}
                          </a>
                          <a href="{$faqUrl|escape:'htmlall':'UTF-8'}&category={$faqCategory['link_rewrite']|escape:'htmlall':'UTF-8'}&question={$question['link_rewrite']|escape:'htmlall':'UTF-8'}" class="icon_fag"><i class="material-icons">&#xE157;</i></a><div style="clear: both"></div>
                          <div class="answer_faq">
                            {$question['answer']|escape:'htmlall':'UTF-8' nofilter}
                          </div>
                        {/if}
                        {/if}
                      {/foreach}
                    {/if}
                  </div>
                </div>
              {/foreach}
            <div style="clear: both"></div>
          </div>
        </div>
      </div>
    {else}
      <div id="center_column_fag" class="center_column_fag" >
        <div class="gomakoil_faq_page">
          {if $questions['content']}

            <div class="faq faq_cat">
              <h1 class="title_category_page" style="color: {$questions['color']|escape:'htmlall':'UTF-8'}" > {$questions['name']|escape:'htmlall':'UTF-8' nofilter} </h1>
              <div class="search_faqs">
                <input type="text" class="search_fag_input" placeholder="{l s='Search'  mod='faqs'}">
                <button type="submit" onclick="searchFags($('.search_fag_input').val(), '{$faqUrl|escape:'htmlall':'UTF-8'}&search='); return false;"  class="button search_fag_submit btn-primary"><span>{l s='Search'  mod='faqs'}</span></button>
              </div>
              {assign var='count_question' value=0}
              {foreach from=$questions['content'] item=question}
                {if ($question['association'] && !$question['hide_faq']) || !$question['association']}
                {$count_question = $count_question + 1}
                <a class="questions change_item{if $question['as_url']} as_url{/if}"  >
                  <i class="material-icons">&#xE315;</i>
                  {$count_question|escape:'htmlall':'UTF-8'}. {strip_tags($question['question'], '<span>')|escape:'htmlall':'UTF-8' nofilter}
                </a>
                <a href="{$faqUrl|escape:'htmlall':'UTF-8'}&category={$smarty.get.category|escape:'htmlall':'UTF-8'}&question={$question['link_rewrite']|escape:'htmlall':'UTF-8'}" class="icon_fag"><i class="material-icons">&#xE157;</i></a><div style="clear: both"></div>
                <div class="answer_faq">
                  {$question['answer']|escape:'htmlall':'UTF-8' nofilter}
                </div>
                {/if}
              {/foreach}
            </div>
          {/if}
          {if $search_val}
            <div class="title_category_page">{l s='Search'  mod='faqs'} "{$search_val|escape:'htmlall':'UTF-8'}"</div>
            <div class="search_faqs">
              <input type="text" class="search_fag_input" placeholder="{l s='Search'  mod='faqs'}" value="{$search_val|escape:'htmlall':'UTF-8'}">
              <button type="submit"  onclick="searchFags($('.search_fag_input').val(), '{$faqUrl|escape:'htmlall':'UTF-8'}&search='); return false;"  class="button search_fag_submit btn-primary"><span>{l s='Search'  mod='faqs'}</span></button>
            </div>
              {if $search}
                {assign var='count_question' value=0}
                {foreach from=$search item=question}
                  {if ($question['association'] && !$question['hide_faq']) || !$question['association']}
                  {$count_question = $count_question + 1}
                  <a class="questions change_item{if $question['as_url']} as_url{/if}"  >
                    <i class="material-icons">&#xE315;</i>
                    {$count_question|escape:'htmlall':'UTF-8'}. {strip_tags($question['question'], '<span>')|escape:'htmlall':'UTF-8' nofilter}
                  </a>
                  <a href="{$faqUrl|escape:'htmlall':'UTF-8'}&category={$question['link_rewrite_cat']|escape:'htmlall':'UTF-8'}&question={$question['link_rewrite']|escape:'htmlall':'UTF-8'}" class="icon_fag"><i class="material-icons">&#xE157;</i></a><div style="clear: both"></div>
                  <div class="answer_faq">
                    {$question['answer']|escape:'htmlall':'UTF-8' nofilter}
                  </div>
                  {/if}
                {/foreach}
              {else}
                <div class="no_questions">{l s='No results were found for your search'  mod='faqs'} "{$search_val|escape:'htmlall':'UTF-8'}"</div>
              {/if}

          {/if}
          {if $faq}
              {if ($faq['association'] && !$faq['hide_faq']) || !$faq['association']}
                <div class="faq ">
                  <div class="title_faq_page"> {strip_tags($faq['question'])|escape:'htmlall':'UTF-8' nofilter} </div>
                  <div class="answer">
                       {$faq['answer']|escape:'htmlall':'UTF-8' nofilter}
                  </div>
                </div>
              {/if}
          {/if}
        </div>
     </div>
    {/if}
{/block}

{block name="right_column"}
    {if $faq || $questions || $search_val}
        {if $layout == 'layouts/layout-right-column.tpl'}
            <div id="right-column" class="col-xs-12 col-sm-4 col-md-3">
                {widget name="faqs" hook='displayRightColumn'}
            </div>
        {/if}
    {/if}
{/block}