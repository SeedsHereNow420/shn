<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:42:11
         compiled from "modules/amazzingfilter/views/templates/hook/dynamic-loading.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16399953275c322fe38f36f8-88288912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c4e596c0718ac3770c06d3a72b56779fa6eb064' => 
    array (
      0 => 'modules/amazzingfilter/views/templates/hook/dynamic-loading.tpl',
      1 => 1513425263,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16399953275c322fe38f36f8-88288912',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hidden_inputs' => 0,
    'is_17' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c322fe38f5f47_79437575',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c322fe38f5f47_79437575')) {function content_5c322fe38f5f47_79437575($_smarty_tpl) {?>


<div class="af dynamic-loading<?php if ($_smarty_tpl->tpl_vars['hidden_inputs']->value['p_type']==3) {?> infinite-scroll<?php }?> hidden">
    <?php if ($_smarty_tpl->tpl_vars['is_17']->value) {?><span class="dynamic-product-count"></span><?php }?>
    <button class="loadMore button lnk_view btn btn-default">
        <span><?php echo smartyTranslate(array('s'=>'Load more','mod'=>'amazzingfilter'),$_smarty_tpl);?>
</span>
    </button>
    <span class="loading-indicator">...</span>
</div>

<?php }} ?>
