<div class="overlay_fags"></div>
<div class="form_new_question">
    <div class="background_form"></div>
    <div class="new_question">
        <div class="new_question_header">
            <span class="title">{l s='Ask a question'  mod='faqs'}</span>
            <span class="close" onclick=""><i class="material-icons">close</i></span>
        </div>
        <div class="new_question_content">

            <div class="one_field">
                <div class="label_field">{l s='Name'  mod='faqs'}</div>
                <input type="text" name="name_customer" class="name_customer">
            </div>
            <div class="one_field">
                <div class="label_field">{l s='Email'  mod='faqs'}</div>
                <input type="text" name="email_customer" class="email_customer">
            </div>
            <div class="one_field">
                <div class="label_field">{l s='Select Topic'  mod='faqs'}</div>
                <select name="category_question">
                    {foreach $faqCategories as $category}
                        <option value="{$category['id_gomakoil_faq_category']|escape:'htmlall':'UTF-8'}">{$category['name']|escape:'htmlall':'UTF-8'}</option>
                    {/foreach}
                </select>
            </div>
            <div class="one_field">
                <div class="label_field">{l s='Question'  mod='faqs'}</div>
                <textarea name="question_customer" class="question_customer"></textarea>
            </div>
            {if (isset($captcha_url)) && $captcha_url != false}
                <div class="one_field">
                    <div class="label_field">{l s='Captcha'  mod='faqs'}</div>

                    <div class="captcha_block">
                        <div class="captcha_img">
                            <img src="{$captcha_url|escape:'htmlall':'UTF-8'}">
                        </div>
                        <div class="captcha_input">
                            <input type="text" class="captcha_res" name="captcha_res">
                        </div>
                        <div style="clear: both"></div>
                    </div>
                </div>
            {/if}

        </div>
        <div class="new_question_footer">
            <button type="submit" class="button btn-primary button-new-question">
                <span>{l s='Ask a question'  mod='faqs'}</span>
                <input type="hidden" name="basePath" value="{$base_url|escape:'htmlall':'UTF-8'}">
                <input type="hidden" name="id_lang" value="{$id_lang|escape:'htmlall':'UTF-8'}">
                <input type="hidden" name="id_shop" value="{$id_shop|escape:'htmlall':'UTF-8'}">
            </button>
        </div>
    </div>
</div>