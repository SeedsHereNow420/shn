<?php /* Smarty version Smarty-3.1.19, created on 2019-01-08 16:15:48
         compiled from "/var/www/html/SHN/modules/elasticsearchconnector/views/templates/admin/configure.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4187229645c353d34c06341-51780593%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35d9884d9d579a1c8e5afdfbcd79d6b25eceab8b' => 
    array (
      0 => '/var/www/html/SHN/modules/elasticsearchconnector/views/templates/admin/configure.tpl',
      1 => 1512425371,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4187229645c353d34c06341-51780593',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'escFirstTime' => 0,
    'indexedNbProducts' => 0,
    'totalNbProducts' => 0,
    'cronUrl' => 0,
    'cronSearchFullUrl' => 0,
    'cronSearchMissingUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c353d34c32349_10332019',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c353d34c32349_10332019')) {function content_5c353d34c32349_10332019($_smarty_tpl) {?>

<div class="not-first-time" <?php if ($_smarty_tpl->tpl_vars['escFirstTime']->value) {?>style="display: none;"<?php }?>>
	<p>
		<?php echo smartyTranslate(array('s'=>'The "indexed" products have been analyzed by ElasticSearch and will appear in the results of a front office search','mod'=>'elasticsearchconnector'),$_smarty_tpl);?>

		<br />
		<?php echo smartyTranslate(array('s'=>'Indexed products','mod'=>'elasticsearchconnector'),$_smarty_tpl);?>

		<strong>
			<span id="indexed-nb-products"><?php echo intval($_smarty_tpl->tpl_vars['indexedNbProducts']->value);?>
</span> / <span id="total-nb-products"><?php echo intval($_smarty_tpl->tpl_vars['totalNbProducts']->value);?>
</span>
		</strong>
	</p>
	<p>
		<a class="ajaxcall btn btn-default btn-lg" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['cronUrl']->value,'htmlall','UTF-8');?>
&full=1">
			<?php echo smartyTranslate(array('s'=>'Re-build the entire index now','mod'=>'elasticsearchconnector'),$_smarty_tpl);?>

			&nbsp;&nbsp;
			<i class="icon icon-angle-right icon-lg"></i>
		</a>

		<?php if ($_smarty_tpl->tpl_vars['indexedNbProducts']->value<$_smarty_tpl->tpl_vars['totalNbProducts']->value) {?>
		<a class="ajaxcall btn btn-default btn-lg" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['cronUrl']->value,'htmlall','UTF-8');?>
&full=0">
			<?php echo smartyTranslate(array('s'=>'Add missing products to the index now','mod'=>'elasticsearchconnector'),$_smarty_tpl);?>

			&nbsp;&nbsp;
			<i class="icon icon-angle-right icon-lg"></i>
		</a>
		<?php }?>
	</p>
	<br />
	<p>
		<?php echo smartyTranslate(array('s'=>'You can set a cron job that will rebuild your index using the following URL:','mod'=>'elasticsearchconnector'),$_smarty_tpl);?>

		<br />
		<?php echo smartyTranslate(array('s'=>'Re-build the entire index:','mod'=>'elasticsearchconnector'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['cronSearchFullUrl']->value,'htmlall','UTF-8');?>

		<br />
		<?php echo smartyTranslate(array('s'=>'Add missing products to the index:','mod'=>'elasticsearchconnector'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['cronSearchMissingUrl']->value,'htmlall','UTF-8');?>

	</p>
</div>

<div class="first-time" <?php if (!$_smarty_tpl->tpl_vars['escFirstTime']->value) {?>style="display: none;"<?php }?>>
	<p>
		<?php echo smartyTranslate(array('s'=>'The products have not been analyzed by ElasticSearch and will not appear in the results of a front office search','mod'=>'elasticsearchconnector'),$_smarty_tpl);?>

	</p>
	<p>
		<a class="ajaxcall btn btn-default btn-lg" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['cronUrl']->value,'htmlall','UTF-8');?>
&full=1">
			<?php echo smartyTranslate(array('s'=>'Re-build the entire index now','mod'=>'elasticsearchconnector'),$_smarty_tpl);?>

			&nbsp;&nbsp;
			<i class="icon icon-angle-right icon-lg"></i>
		</a>
	</p>
</div>

<script type="text/javascript">
	var escFirstTime = '<?php echo intval($_smarty_tpl->tpl_vars['escFirstTime']->value);?>
';
	var translations = new Array();

	translations['in_progress'] = '<?php echo smartyTranslate(array('s'=>'(in progress)','js'=>1,'mod'=>'elasticsearchconnector'),$_smarty_tpl);?>
';
	translations['in_progress_continue'] = '<?php echo smartyTranslate(array('s'=>'(in progress, [count] products left)','js'=>1,'mod'=>'elasticsearchconnector'),$_smarty_tpl);?>
';
	translations['regenerate_finished'] = '<?php echo smartyTranslate(array('s'=>'Regenerate finished','js'=>1,'mod'=>'elasticsearchconnector'),$_smarty_tpl);?>
';
	translations['regenerate_failed'] = '<?php echo smartyTranslate(array('s'=>'Regenerate failed','js'=>1,'mod'=>'elasticsearchconnector'),$_smarty_tpl);?>
';
</script><?php }} ?>
