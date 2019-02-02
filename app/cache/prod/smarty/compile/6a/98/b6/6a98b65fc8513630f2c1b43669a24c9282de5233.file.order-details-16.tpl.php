<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:34:18
         compiled from "/var/www/html/SHN/modules/ordersplusplus/views/templates/hook/order-details-16.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3207950905c338d9a57e925-85294104%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a98b65fc8513630f2c1b43669a24c9282de5233' => 
    array (
      0 => '/var/www/html/SHN/modules/ordersplusplus/views/templates/hook/order-details-16.tpl',
      1 => 1519199329,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3207950905c338d9a57e925-85294104',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'bookmark_a_name' => 0,
    'opp_id_order' => 0,
    'bookmark_a_value' => 0,
    'bookmark_b_name' => 0,
    'bookmark_b_value' => 0,
    'opp_notes' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c338d9a5a5398_88439996',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c338d9a5a5398_88439996')) {function content_5c338d9a5a5398_88439996($_smarty_tpl) {?>

<div class="col-lg-6">
    <div class="panel">
        <div class="panel-heading">
            <i class="icon-bookmark"></i>&nbsp;<?php echo smartyTranslate(array('s'=>'Bookmarks and notes','mod'=>'ordersplusplus'),$_smarty_tpl);?>

        </div>
        <div id="oppData" class="well">
            <div class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-lg-3"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['bookmark_a_name']->value,'htmlall','UTF-8');?>
</label>
                    <div class="col-lg-9">
                        <?php echo $_smarty_tpl->getSubTemplate ('../admin/list-bookmark.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id_order'=>$_smarty_tpl->tpl_vars['opp_id_order']->value,'bookmark'=>'a','bookmark_value'=>$_smarty_tpl->tpl_vars['bookmark_a_value']->value), 0);?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['bookmark_b_name']->value,'htmlall','UTF-8');?>
</label>
                    <div class="col-lg-9">
                        <?php echo $_smarty_tpl->getSubTemplate ('../admin/list-bookmark.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id_order'=>$_smarty_tpl->tpl_vars['opp_id_order']->value,'bookmark'=>'b','bookmark_value'=>$_smarty_tpl->tpl_vars['bookmark_b_value']->value), 0);?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Notes','mod'=>'ordersplusplus'),$_smarty_tpl);?>
</label>
                    <div class="col-lg-9">
                        <textarea id="oppNotes" class="textarea-autosize"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['opp_notes']->value,'htmlall','UTF-8');?>
</textarea>
                    </div>
                </div>
                <div class="row">
                    <button class="btn btn-primary pull-right" onclick="oppSaveNotes(<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['opp_id_order']->value,'htmlall','UTF-8');?>
, '<?php echo smartyTranslate(array('s'=>'Notes updated','mod'=>'ordersplusplus'),$_smarty_tpl);?>
', '<?php echo smartyTranslate(array('s'=>'Error','mod'=>'ordersplusplus'),$_smarty_tpl);?>
')">
                        <i class="icon-save"></i>
                        <?php echo smartyTranslate(array('s'=>'Save notes','mod'=>'ordersplusplus'),$_smarty_tpl);?>

                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }} ?>
