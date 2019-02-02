<ul class="st_mega_menu clearfix mu_level_0">
	{if isset($stvertical) && count($stvertical) && isset($is_mega_menu_main) && $is_mega_menu_main}
		{assign var='responsive_max' value=Configuration::get('STSN_RESPONSIVE_MAX')}
		<li id="st_menu_0" class="ml_level_0 {if Configuration::get('STSN_MENU_VER_OPEN')}menu_ver_open_{if $responsive_max==1}lg{elseif $responsive_max==2}xl{elseif $responsive_max==3}xxl{else}md{/if}{/if}">
			<a id="st_ma_0" href="javascript:;" class="ma_level_0" title="{l s='Categories' d='Shop.Theme.Transformer'}" rel="nofollow"><i class="fto-menu"></i>{l s='Categories' d='Shop.Theme.Transformer'}</a>
			<ul class="stmenu_sub stmenu_vertical col-md-3 {if Configuration::get('STSN_MENU_VER_SUB_STYLE')} stmenu_vertical_box {/if}">
				{foreach $stvertical as $mm}
					<li id="st_menu_{$mm.id_st_mega_menu}" class="mv_level_1"><a id="st_ma_{$mm.id_st_mega_menu}" href="{if $mm.m_link}{$mm.m_link}{else}javascript:;{/if}" class="mv_item{if isset($mm.column) && count($mm.column)} is_parent{/if}"{if !$menu_title} title="{$mm.m_title}"{/if}{if $mm.nofollow} rel="nofollow"{/if}{if $mm.new_window} target="_blank"{/if}>{if $mm.icon_class}<i class="{$mm.icon_class}"></i>{/if}{$mm.m_name}{if $mm.cate_label}<span class="cate_label">{$mm.cate_label}</span>{/if}</a>
						{if isset($mm.column) && count($mm.column)}
							{include file="./stmegamenu-sub.tpl" is_mega_menu_vertical=1}
						{/if}
					</li>
				{/foreach}
			</ul>
		</li>
	{/if}
	{foreach $stmenu as $mm}
		{if $mm.hide_on_mobile == 2}{continue}{/if}
		<li id="st_menu_{$mm.id_st_mega_menu}" class="ml_level_0 m_alignment_{$mm.alignment}">
			<a id="st_ma_{$mm.id_st_mega_menu}" href="{if $mm.m_link}{$mm.m_link}{else}javascript:;{/if}" class="ma_level_0{if isset($mm.column) && count($mm.column)} is_parent{/if}{if $mm.m_icon} ma_icon{/if}"{if !$menu_title} title="{$mm.m_title}"{/if}{if $mm.nofollow} rel="nofollow"{/if}{if $mm.new_window} target="_blank"{/if}>{if $mm.m_icon}{$mm.m_icon nofilter}{else}{if $mm.icon_class}<i class="{$mm.icon_class}"></i>{/if}{$mm.m_name}{/if}{if $mm.cate_label}<span class="cate_label">{$mm.cate_label}</span>{/if}</a>
			{if isset($mm.column) && count($mm.column)}
				{include file="./stmegamenu-sub.tpl"}
			{/if}
		</li>
	{/foreach}
</ul>