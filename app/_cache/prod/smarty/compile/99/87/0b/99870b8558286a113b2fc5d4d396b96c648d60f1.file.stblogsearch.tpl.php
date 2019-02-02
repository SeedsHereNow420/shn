<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 09:11:22
         compiled from "modules/stblogsearch/views/templates/hook/stblogsearch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20536705205c2f93ba5006f8-27781023%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99870b8558286a113b2fc5d4d396b96c648d60f1' => 
    array (
      0 => 'modules/stblogsearch/views/templates/hook/stblogsearch.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20536705205c2f93ba5006f8-27781023',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'stblog' => 0,
    'search_query' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2f93ba5054a5_97330268',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2f93ba5054a5_97330268')) {function content_5c2f93ba5054a5_97330268($_smarty_tpl) {?>
<div id="stb_search_block_left" class="block column_block">
	<div class="title_block flex_container title_align_0 title_style_<?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['stblog']->value['heading_style'], ENT_QUOTES, 'UTF-8');?>
">
        <div class="flex_child title_flex_left"></div>
        <div class="title_block_inner"><?php echo smartyTranslate(array('s'=>'Blog search','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</div>
        <div class="flex_child title_flex_right"></div>
    </div>
    <div class="block_content">
		<form method="get" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'module','name'=>'stblogsearch','controller'=>'default'),$_smarty_tpl);?>
" id="stb_searchbox">
			<input type="hidden" name="orderby" value="position" />
			<input type="hidden" name="orderway" value="desc" />
			<div class="input-group round_item js-parent-focus input-group-with-border">
		      <input type="text" class="form-control search_query js-child-focus" id="stb_search_query_block" name="stb_search_query" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search_query']->value, ENT_QUOTES, 'UTF-8');?>
" placeholder="<?php echo smartyTranslate(array('s'=>'Search','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
">
		      <span class="input-group-btn">
		        <button class="btn btn-less-padding btn-spin link_color icon_btn search_widget_btn" id="stb_search_button"  type="submit"><i class="fto-search-1"></i></button>
		      </span>
		    </div>
		</form>
	</div>
</div><?php }} ?>
