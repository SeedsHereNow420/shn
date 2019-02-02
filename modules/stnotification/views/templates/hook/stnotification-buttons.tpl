{if $ec.more_info && ($ec.more_info_link || $ec.more_info_link_custom)}
	<a href="{if $ec.more_info_link_custom}{$ec.more_info_link_custom}{else}{$ec.more_info_link}{/if}" title="{$ec.more_info}" class="btn btn-default mar_r4">{$ec.more_info}</a>
{/if}
{if $ec.accept_button}
	<a href="javascript:;" title="{$ec.accept_button}" class="notification_accept btn btn-default">{$ec.accept_button}</a>
{/if}