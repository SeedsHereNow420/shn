<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:10:05
         compiled from "modules/amazzingfilter/views/templates/hook/dynamic-loading.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9585461025c31a9cd87c961-59045736%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '9585461025c31a9cd87c961-59045736',
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
  'unifunc' => 'content_5c31a9cd87f147_39989838',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a9cd87f147_39989838')) {function content_5c31a9cd87f147_39989838($_smarty_tpl) {?>


<div class="af dynamic-loading<?php if ($_smarty_tpl->tpl_vars['hidden_inputs']->value['p_type']==3) {?> infinite-scroll<?php }?> hidden">
    <?php if ($_smarty_tpl->tpl_vars['is_17']->value) {?><span class="dynamic-product-count"></span><?php }?>
    <button class="loadMore button lnk_view btn btn-default">
        <span><?php echo smartyTranslate(array('s'=>'Load more','mod'=>'amazzingfilter'),$_smarty_tpl);?>
</span>
    </button>
    <span class="loading-indicator">...</span>
</div>

<?php }} ?>
