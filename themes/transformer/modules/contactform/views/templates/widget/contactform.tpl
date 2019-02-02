<section class="contact-form mb-3">
  <form action="{$urls.pages.contact}" method="post" {if $contact.allow_file_upload}enctype="multipart/form-data"{/if}>

    {if $notifications}
      <div class="col-12 alert {if $notifications.nw_error}alert-danger{else}alert-success{/if}">
        <ul>
          {foreach $notifications.messages as $notif}
            <li>{$notif}</li>
          {/foreach}
        </ul>
      </div>
    {/if}
    <div class="title_block flex_container title_align_0 title_style_{(int)$sttheme.heading_style}">
        <div class="flex_child title_flex_left"></div>
        <div class="title_block_inner">{l s='Contact us' d='Shop.Theme.Global'}</div>
        <div class="flex_child title_flex_right"></div>
    </div>
    {if !$notifications || $notifications.nw_error}
    <section class="form-fields">

      <div class="form-group">
        <label class="form-control-label">{l s='Subject' d='Shop.Forms.Labels'}</label>
        <div class="">
          <select name="id_contact" class="form-control form-control-select">
            {foreach from=$contact.contacts item=contact_elt}
              <option value="{$contact_elt.id_contact}">{$contact_elt.name}</option>
            {/foreach}
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="form-control-label">{l s='Email address' d='Shop.Forms.Labels'}</label>
        <div class="">
          <input
            class="form-control"
            name="from"
            type="email"
            value="{$contact.email}"
            placeholder="{l s='your@email.com' d='Shop.Forms.Help'}"
          />
        </div>
      </div>

      {if $contact.orders}
        <div class="form-group">
          <label class="form-control-label">{l s='Order reference' d='Shop.Forms.Labels'} {l s='(Optional)' d='Shop.Forms.Help'}</label>
          <div class="">
            <select name="id_order" class="form-control form-control-select">
              <option value="">{l s='Select reference' d='Shop.Forms.Help'}</option>
              {foreach from=$contact.orders item=order}
                <option value="{$order.id_order}">{$order.reference}</option>
              {/foreach}
            </select>
          </div>
        </div>
      {/if}

      {if $contact.allow_file_upload}
        <div class="form-group">
          <label class="form-control-label">{l s='Attachment' d='Shop.Forms.Labels'} {l s='(Optional)' d='Shop.Forms.Help'}</label>
          <div class="">
            <input type="file" name="fileUpload" class="filestyle" data-buttonText="{l s='Choose file' d='Shop.Theme.Actions'}">
          </div>
        </div>
      {/if}

      <div class="form-group">
        <label class="form-control-label">{l s='Message' d='Shop.Forms.Labels'}</label>
        <div class="">
          <textarea
            class="form-control"
            name="message"
            placeholder="{l s='How can we help?' d='Shop.Forms.Help'}"
            rows="3"
          >{if $contact.message}{$contact.message}{/if}</textarea>
        </div>
      </div>

    </section>

    <footer class="form-footer">
      <input class="btn btn-primary btn-more-padding" type="submit" name="submitMessage" value="{l s='Send' d='Shop.Theme.Actions'}" />
    </footer>
    {/if}
  </form>
</section>
