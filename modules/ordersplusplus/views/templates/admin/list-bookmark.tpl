{*
*  Copyright (C) Prestalia - All Rights Reserved
*
*  Unauthorized copying of this file, via any medium is strictly prohibited
*  Proprietary and confidential
*
*  @author    Prestalia <prestalia.it>
*  @copyright 2015-2016 Prestalia
*  @license   Closed source, proprietary software
*}
<a class="opp-bookmark-container btn btn-default" onclick="updateBookmark({$id_order|escape:'htmlall':'UTF-8'}, '{$bookmark|escape:'htmlall':'UTF-8'}', '{l s='Bookmark updated' mod='ordersplusplus'}', '{l s='Error' mod='ordersplusplus'}')">
    <i id="book{$bookmark|escape:'htmlall':'UTF-8'}{$id_order|escape:'htmlall':'UTF-8'}enabled" class="opp-bookmark-enabled icon icon-check{if $bookmark_value == 0} hiddenBook{/if}"></i>
    <i id="book{$bookmark|escape:'htmlall':'UTF-8'}{$id_order|escape:'htmlall':'UTF-8'}disabled" class="opp-bookmark-disabled icon icon-times{if $bookmark_value == 1} hiddenBook{/if}"></i>
</a>
