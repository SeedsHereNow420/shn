<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:27:59
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/search/helpers/view/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4409394095c322c8f5d3106-48736909%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93b78ee26d64a479b07a5a205e61a5fbb649b518' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/search/helpers/view/view.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4409394095c322c8f5d3106-48736909',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'query' => 0,
    'nb_results' => 0,
    'features' => 0,
    'feature' => 0,
    'val' => 0,
    'key' => 0,
    'modules' => 0,
    'module' => 0,
    'categories' => 0,
    'category' => 0,
    'products' => 0,
    'customers' => 0,
    'customerCount' => 0,
    'orders' => 0,
    'addons' => 0,
    'addon' => 0,
    'lang_iso' => 0,
    'host_mode' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c322c8f7185c1_63610281',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c322c8f7185c1_63610281')) {function content_5c322c8f7185c1_63610281($_smarty_tpl) {?>

<script type="text/javascript">
$(function() {
	$('#content .panel').highlight('<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
');
});
</script>

<?php if ($_smarty_tpl->tpl_vars['query']->value) {?>
	<h2>
	<?php if (isset($_smarty_tpl->tpl_vars['nb_results']->value)&&$_smarty_tpl->tpl_vars['nb_results']->value==0) {?>
		<h2><?php echo smartyTranslate(array('s'=>'There are no results matching your query "%s".','sprintf'=>array($_smarty_tpl->tpl_vars['query']->value),'html'=>1,'d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>
</h2>
	<?php } elseif (isset($_smarty_tpl->tpl_vars['nb_results']->value)&&$_smarty_tpl->tpl_vars['nb_results']->value==1) {?>
		<?php echo smartyTranslate(array('s'=>'1 result matches your query "%s".','sprintf'=>array($_smarty_tpl->tpl_vars['query']->value),'html'=>1,'d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>

	<?php } elseif (isset($_smarty_tpl->tpl_vars['nb_results']->value)) {?>
		<?php echo smartyTranslate(array('s'=>'%d results match your query "%s".','sprintf'=>array(intval($_smarty_tpl->tpl_vars['nb_results']->value),$_smarty_tpl->tpl_vars['query']->value),'html'=>1,'d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>

	<?php }?>
	</h2>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['query']->value&&isset($_smarty_tpl->tpl_vars['nb_results']->value)&&$_smarty_tpl->tpl_vars['nb_results']->value) {?>

	<?php if (isset($_smarty_tpl->tpl_vars['features']->value)) {?>
	<div class="panel">
		<h3>
			<?php if (count($_smarty_tpl->tpl_vars['features']->value)==1) {?>
				<?php echo smartyTranslate(array('s'=>'1 feature','d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>

			<?php } else { ?>
				<?php echo smartyTranslate(array('s'=>'%d features','sprintf'=>array(count($_smarty_tpl->tpl_vars['features']->value)),'d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>

			<?php }?>
		</h3>
		<table class="table">
			<tbody>
			<?php  $_smarty_tpl->tpl_vars['feature'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['feature']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->key => $_smarty_tpl->tpl_vars['feature']->value) {
$_smarty_tpl->tpl_vars['feature']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['feature']->key;
?>
				<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['feature']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['val']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
 $_smarty_tpl->tpl_vars['val']->index++;
 $_smarty_tpl->tpl_vars['val']->first = $_smarty_tpl->tpl_vars['val']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['feature_list']['first'] = $_smarty_tpl->tpl_vars['val']->first;
?>
					<tr>
						<td><a href="<?php echo $_smarty_tpl->tpl_vars['val']->value['link'];?>
"<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['feature_list']['first']) {?>><strong><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</strong><?php }?></a></td>
						<td><a href="<?php echo $_smarty_tpl->tpl_vars['val']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['value'];?>
</a></td>
					</tr>
				<?php } ?>
			<?php } ?>
			</tbody>
		</table>
	</div>
	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['modules']->value)&&$_smarty_tpl->tpl_vars['modules']->value) {?>
	<div class="panel">
		<h3>
			<?php if (count($_smarty_tpl->tpl_vars['modules']->value)==1) {?>
				<?php echo smartyTranslate(array('s'=>'1 module','d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>

			<?php } else { ?>
				<?php echo smartyTranslate(array('s'=>'%d modules','sprintf'=>array(count($_smarty_tpl->tpl_vars['modules']->value)),'d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>

			<?php }?>
		</h3>
		<table class="table">
			<tbody>
			<?php  $_smarty_tpl->tpl_vars['module'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['module']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['modules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['module']->key => $_smarty_tpl->tpl_vars['module']->value) {
$_smarty_tpl->tpl_vars['module']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['module']->key;
?>
				<tr>
					<td><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['module']->value->linkto,'html','UTF-8');?>
"><strong><?php echo $_smarty_tpl->tpl_vars['module']->value->displayName;?>
</strong></a></td>
					<td><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['module']->value->linkto,'html','UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['module']->value->description;?>
</a></td>
				</tr>
			<?php } ?>
		</tbody>
		</table>
	</div>
	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['categories']->value)&&$_smarty_tpl->tpl_vars['categories']->value) {?>
	<div class="panel">
		<h3>
			<?php if (count($_smarty_tpl->tpl_vars['categories']->value)==1) {?>
				<?php echo smartyTranslate(array('s'=>'1 category','d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>

			<?php } else { ?>
				<?php echo smartyTranslate(array('s'=>'%d categories','sprintf'=>array(count($_smarty_tpl->tpl_vars['categories']->value)),'d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>

			<?php }?>
		</h3>
		<table class="table" style="border-spacing : 0; border-collapse : collapse;">
			<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['category']->key;
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['category']->value;?>
</td>
				</tr>
			<?php } ?>
		</table>
	</div>
	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['products']->value)&&$_smarty_tpl->tpl_vars['products']->value) {?>
	<div class="panel">
		<h3>
			<?php if (count($_smarty_tpl->tpl_vars['products']->value)==1) {?>
				<?php echo smartyTranslate(array('s'=>'1 product','d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>

			<?php } else { ?>
				<?php echo smartyTranslate(array('s'=>'%d products','sprintf'=>array(count($_smarty_tpl->tpl_vars['products']->value)),'d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>

			<?php }?>
		</h3>
		<?php echo $_smarty_tpl->tpl_vars['products']->value;?>

	</div>
	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['customers']->value)&&$_smarty_tpl->tpl_vars['customers']->value&&isset($_smarty_tpl->tpl_vars['customerCount']->value)&&$_smarty_tpl->tpl_vars['customerCount']->value) {?>
	<div class="panel">
		<h3>
			<?php if ($_smarty_tpl->tpl_vars['customerCount']->value==1) {?>
				<?php echo smartyTranslate(array('s'=>'1 customer','d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>

			<?php } else { ?>
				<?php echo smartyTranslate(array('s'=>'%d customers','sprintf'=>array($_smarty_tpl->tpl_vars['customerCount']->value),'d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>

			<?php }?>
		</h3>
		<?php echo $_smarty_tpl->tpl_vars['customers']->value;?>

	</div>
	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['orders']->value)&&$_smarty_tpl->tpl_vars['orders']->value) {?>
	<div class="panel">
		<h3>
			<?php if (count($_smarty_tpl->tpl_vars['orders']->value)==1) {?>
				<?php echo smartyTranslate(array('s'=>'1 order','d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>

			<?php } else { ?>
				<?php echo smartyTranslate(array('s'=>'%d orders','sprintf'=>array(count($_smarty_tpl->tpl_vars['orders']->value)),'d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>

			<?php }?>
		</h3>
		<?php echo $_smarty_tpl->tpl_vars['orders']->value;?>

	</div>
	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['addons']->value)&&$_smarty_tpl->tpl_vars['addons']->value) {?>
	<div class="panel">
		<h3>
			<?php if (count($_smarty_tpl->tpl_vars['addons']->value)==1) {?>
				<?php echo smartyTranslate(array('s'=>'1 addon','d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>

			<?php } else { ?>
				<?php echo smartyTranslate(array('s'=>'%d addons','sprintf'=>array(count($_smarty_tpl->tpl_vars['addons']->value)),'d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>

			<?php }?>
		</h3>
		<table class="table">
			<tbody>
			<?php  $_smarty_tpl->tpl_vars['addon'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['addon']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['addons']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['addon']->key => $_smarty_tpl->tpl_vars['addon']->value) {
$_smarty_tpl->tpl_vars['addon']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['addon']->key;
?>
				<tr>
					<td><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['addon']->value['href'],'html','UTF-8');?>
&amp;utm_source=back-office&amp;utm_medium=search&amp;utm_campaign=back-office-<?php echo mb_strtoupper($_smarty_tpl->tpl_vars['lang_iso']->value, 'UTF-8');?>
&amp;utm_content=<?php if ($_smarty_tpl->tpl_vars['host_mode']->value) {?>cloud<?php } else { ?>download<?php }?>" class="_blank"><strong><i class="icon-external-link-sign"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['addon']->value['title'],'html','UTF-8');?>
</strong></a></td>
					<td><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['addon']->value['href'],'html','UTF-8');?>
&amp;utm_source=back-office&amp;utm_medium=search&amp;utm_campaign=back-office-<?php echo mb_strtoupper($_smarty_tpl->tpl_vars['lang_iso']->value, 'UTF-8');?>
&amp;utm_content=<?php if ($_smarty_tpl->tpl_vars['host_mode']->value) {?>cloud<?php } else { ?>download<?php }?>" class="_blank"><?php if (is_string($_smarty_tpl->tpl_vars['addon']->value['description'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['addon']->value['description'],256,'...'),'html','UTF-8');?>
<?php }?></a></td>
				</tr>
			<?php } ?>
		</tbody>
			<tfoot>
				<tr>
					<td colspan="2" class="text-center"><a href="http://addons.prestashop.com/search.php?search_query=<?php echo urlencode($_smarty_tpl->tpl_vars['query']->value);?>
&amp;utm_source=back-office&amp;utm_medium=search&amp;utm_campaign=back-office-<?php echo mb_strtoupper($_smarty_tpl->tpl_vars['lang_iso']->value, 'UTF-8');?>
&amp;utm_content=<?php if ($_smarty_tpl->tpl_vars['host_mode']->value) {?>cloud<?php } else { ?>download<?php }?>" class="_blank"><strong><?php echo smartyTranslate(array('s'=>'Show more results...','d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>
</strong></a></td>
				</tr>
			</tfoot>
		</table>
	</div>
	<?php }?>

<?php }?>
<div class="row">
	<div class="col-lg-4">
		<div class="panel">
			<h3><?php echo smartyTranslate(array('s'=>'Search doc.prestashop.com','d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>
</h3>
			<a href="http://doc.prestashop.com/dosearchsite.action?spaceSearch=true&amp;queryString=<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
&amp;utm_source=back-office&amp;utm_medium=search&amp;utm_campaign=back-office-<?php echo mb_strtoupper($_smarty_tpl->tpl_vars['lang_iso']->value, 'UTF-8');?>
&amp;utm_content=<?php if ($_smarty_tpl->tpl_vars['host_mode']->value) {?>cloud<?php } else { ?>download<?php }?>" class="btn btn-default _blank"><?php echo smartyTranslate(array('s'=>'Go to the documentation','d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>
</a>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="panel">
			<h3><?php echo smartyTranslate(array('s'=>'Search addons.prestashop.com','d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>
</h3>
			<a href="http://addons.prestashop.com/search.php?search_query=<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
&amp;utm_source=back-office&amp;utm_medium=search&amp;utm_campaign=back-office-<?php echo mb_strtoupper($_smarty_tpl->tpl_vars['lang_iso']->value, 'UTF-8');?>
&amp;utm_content=<?php if ($_smarty_tpl->tpl_vars['host_mode']->value) {?>cloud<?php } else { ?>download<?php }?>" class="btn btn-default _blank"><?php echo smartyTranslate(array('s'=>'Go to Addons','d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>
</a>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="panel">
			<h3><?php echo smartyTranslate(array('s'=>'Search prestashop.com forum','d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>
</h3>
			<a href="https://www.google.fr/search?q=site%3Aprestashop.com%2Fforums%2F+<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
" class="btn btn-default _blank"><?php echo smartyTranslate(array('s'=>'Go to the Forum','d'=>'Admin.Navigation.Search'),$_smarty_tpl);?>
</a>
		</div>
	</div>
</div>




<?php }} ?>
