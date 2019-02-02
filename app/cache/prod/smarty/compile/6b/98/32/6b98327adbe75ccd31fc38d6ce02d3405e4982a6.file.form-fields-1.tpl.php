<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:27:35
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/form-fields-1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18695749725c32ff67d38588-66270848%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b98327adbe75ccd31fc38d6ce02d3405e4982a6' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/_partials/form-fields-1.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18695749725c32ff67d38588-66270848',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'field' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c32ff67e706b7_65811335',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c32ff67e706b7_65811335')) {function content_5c32ff67e706b7_65811335($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['field']->value['type']=='hidden') {?>
  
  <input type="hidden" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['value'], ENT_QUOTES, 'UTF-8');?>
">
  
<?php } else { ?>

  <div class="form-group form-group-small <?php if (!empty($_smarty_tpl->tpl_vars['field']->value['errors'])) {?>has-error<?php }?>">
    <?php if ($_smarty_tpl->tpl_vars['field']->value['required']||$_smarty_tpl->tpl_vars['field']->value['type']!=='checkbox') {?>
    <label class="<?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?> required<?php }?>">
        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['label'], ENT_QUOTES, 'UTF-8');?>

        
          <?php if ((!$_smarty_tpl->tpl_vars['field']->value['required']&&!in_array($_smarty_tpl->tpl_vars['field']->value['type'],array('radio-buttons','checkbox')))) {?>
           <?php echo smartyTranslate(array('s'=>'(Optional)','d'=>'Shop.Forms.Labels'),$_smarty_tpl);?>

          <?php }?>
        
    </label>
    <?php }?>
    <div class="<?php if (($_smarty_tpl->tpl_vars['field']->value['type']==='radio-buttons')) {?> form-control-valign<?php }?>">

    <?php echo $_smarty_tpl->getSubTemplate ('_partials/form-fields-list.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    </div>
    
    
  </div>
  
<?php }?>
<?php }} ?>
