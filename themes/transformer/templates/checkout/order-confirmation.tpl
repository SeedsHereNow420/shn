{extends file='page.tpl'}

{block name='page_content_container' prepend}
    <section id="content-hook_order_confirmation" class="card card_trans mb-3">
      <div class="card-block">
        <div class="row">
          <div class="col-md-12">
            {block name='order_confirmation_header'}
            <h5 class="page_heading">
              <i class="fto-ok-1 done mar_r4"></i>{l s='Your order is confirmed' d='Shop.Theme.Checkout'}
            </h5>
            {/block}
            <div>
              {l s='An email has been sent to your mail address %email%.' d='Shop.Theme.Checkout' sprintf=['%email%' => $customer.email]}
              {if $order.details.invoice_url}
                {* [1][/1] is for a HTML tag. *}
                {l
                  s='You can also [1]download your invoice[/1]'
                  d='Shop.Theme.Checkout'
                  sprintf=[
                    '[1]' => "<a href='{$order.details.invoice_url}'>",
                    '[/1]' => "</a>"
                  ]
                }
              {/if}
            </div>
            {block name='hook_order_confirmation'}
              {$HOOK_ORDER_CONFIRMATION nofilter}
            {/block}
          </div>
        </div>
      </div>
    </section>
{/block}

{block name='page_content_container'}
  <section id="content" class="page-content page-order-confirmation card card_trans mb-3">
    <div class="card-block">
      <div class="row">
        {block name='order_confirmation_table'}
        <div id="order-items" class="col-md-8">
          {include
            file='checkout/_partials/order-confirmation-table.tpl'
            products=$order.products
            subtotals=$order.subtotals
            totals=$order.totals
            labels=$order.labels
            add_product_link=false
          }
        </div>
        {/block}
        {block name='order_details'}
        <div id="order-details" class="col-md-4">
          <h5 class="page_heading">{l s='Order details' d='Shop.Theme.Checkout'}:</h5>
          <ul>
            <li class="heading_color">{l s='Order reference: %reference%' d='Shop.Theme.Checkout' sprintf=['%reference%' => $order.details.reference]}</li>
            <li>{l s='Payment method: %method%' d='Shop.Theme.Checkout' sprintf=['%method%' => $order.details.payment]}</li>
            {if !$order.details.is_virtual}
              <li>
                {l s='Shipping method: %method%' d='Shop.Theme.Checkout' sprintf=['%method%' => $order.carrier.name]}<br>
                <em>{$order.carrier.delay}</em>
              </li>
            {/if}
          </ul>
        </div>
        {/block}
      </div>
    </div>
  </section>

  {block name='hook_payment_return'}
  {if ! empty($HOOK_PAYMENT_RETURN)}
  <section id="content-hook_payment_return" class="card card_trans definition-list mb-3">
    <div class="card-block">
      <div class="row">
        <div class="col-md-12">
          {$HOOK_PAYMENT_RETURN nofilter}
        </div>
      </div>
    </div>
  </section>
  {/if}
  {/block}
  {block name='customer_registration_form'}
  {if $customer.is_guest}
    <div id="registration-form" class="card card_trans mb-3">
      <div class="card-block">
        <h4 class="h4">{l s='Save time on your next order, sign up now' d='Shop.Theme.Checkout'}</h4>
        {render file='customer/_partials/customer-form.tpl' ui=$register_form}
      </div>
    </div>
  {/if}
  {/block}

  {block name='hook_order_confirmation_1'}
    {hook h='displayOrderConfirmation1'}
  {/block}

  {block name='hook_order_confirmation_2'}
    <section id="content-hook-order-confirmation-footer mb-3">
      {hook h='displayOrderConfirmation2'}
    </section>
  {/block}
{/block}
