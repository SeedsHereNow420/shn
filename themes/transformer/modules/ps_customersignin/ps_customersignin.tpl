{if $logged}
  <a class="logout top_bar_item" href="{$logout_url}" rel="nofollow" title="{l s='Sign out' d='Shop.Theme.Actions'}">
    <span class="header_item"><i class="icon-logout icon-large"></i>{l s='Sign out' d='Shop.Theme.Actions'}</span>
  </a>
  <a class="account top_bar_item" href="{$my_account_url}" rel="nofollow" title="{l s='View my customer account' d='Shop.Theme.Actions'}">
    <span class="header_item"><i class="icon-user-1 icon-mar-lr2 icon-large"></i>{$customerName}</span>
  </a>
{else}
  <a class="login top_bar_item" href="{$my_account_url}" rel="nofollow" title="{l s='Log in to your customer account' d='Shop.Theme.Actions'}">
    <span class="header_item"><i class="icon-user-1 icon-mar-lr2 icon-large"></i>{l s='Sign in' d='Shop.Theme.Actions'}</span>
  </a>
{/if}

