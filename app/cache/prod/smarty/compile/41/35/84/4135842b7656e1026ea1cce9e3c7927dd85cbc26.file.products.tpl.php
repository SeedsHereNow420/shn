<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:40:55
         compiled from "/var/www/html/SHN/modules/masseditproduct/views/templates/admin/mass_edit_product/helpers/form/products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1799124495c338f27be0448-67004281%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4135842b7656e1026ea1cce9e3c7927dd85cbc26' => 
    array (
      0 => '/var/www/html/SHN/modules/masseditproduct/views/templates/admin/mass_edit_product/helpers/form/products.tpl',
      1 => 1519199317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1799124495c338f27be0448-67004281',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'attribures_groups' => 0,
    'attribute_group' => 0,
    'products' => 0,
    'without_product' => 0,
    'product' => 0,
    'p' => 0,
    'start' => 0,
    'stop' => 0,
    'p_previous' => 0,
    'pages_nb' => 0,
    'p_next' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c338f27c2a9f9_25300248',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c338f27c2a9f9_25300248')) {function content_5c338f27c2a9f9_25300248($_smarty_tpl) {?>

<table class="table">
	<thead>
		<tr class="table_head">
			<th>
				<span class="title_box active" data-orderby="id_product"><?php echo smartyTranslate(array('s'=>'ID','mod'=>'masseditproduct'),$_smarty_tpl);?>

					<a href="#" data-orderway="DESC">
						<i class="icon-caret-down"></i>
					</a>
					<a class="active" href="#"  data-orderway="ASC">
						<i class="icon-caret-up"></i>
					</a>
				</span>
			</th>
			<th><?php echo smartyTranslate(array('s'=>'Image','mod'=>'masseditproduct'),$_smarty_tpl);?>
</th>
			<th><?php echo smartyTranslate(array('s'=>'Name','mod'=>'masseditproduct'),$_smarty_tpl);?>
</th>
			<th>
				<span class="title_box active" data-orderby="reference"><?php echo smartyTranslate(array('s'=>'Reference','mod'=>'masseditproduct'),$_smarty_tpl);?>

					<a href="#" data-orderway="DESC">
						<i class="icon-caret-down"></i>
					</a>
					<a class="active" href="#"  data-orderway="ASC">
						<i class="icon-caret-up"></i>
					</a>
				</span>
			</th>
			<th><?php echo smartyTranslate(array('s'=>'Category default','mod'=>'masseditproduct'),$_smarty_tpl);?>
</th>
			<th>
				<span class="title_box active" data-orderby="price"><?php echo smartyTranslate(array('s'=>'Price','mod'=>'masseditproduct'),$_smarty_tpl);?>

					<a href="#" data-orderway="DESC">
						<i class="icon-caret-down"></i>
					</a>
					<a class="active" href="#"  data-orderway="ASC">
						<i class="icon-caret-up"></i>
					</a>
				</span>
			</th>
			<th><?php echo smartyTranslate(array('s'=>'Price final','mod'=>'masseditproduct'),$_smarty_tpl);?>
</th>
			<th><?php echo smartyTranslate(array('s'=>'Manufacturer','mod'=>'masseditproduct'),$_smarty_tpl);?>
</th>
			<th><?php echo smartyTranslate(array('s'=>'Supplier','mod'=>'masseditproduct'),$_smarty_tpl);?>
</th>
			<th>
				<span class="title_box active" data-orderby="quantity"><?php echo smartyTranslate(array('s'=>'Quantity','mod'=>'masseditproduct'),$_smarty_tpl);?>

					<a href="#" data-orderway="DESC">
						<i class="icon-caret-down"></i>
					</a>
					<a class="active" href="#"  data-orderway="ASC">
						<i class="icon-caret-up"></i>
					</a>
				</span>
			</th>
			<th><?php echo smartyTranslate(array('s'=>'Stock management','mod'=>'masseditproduct'),$_smarty_tpl);?>
</th>
			<th><?php echo smartyTranslate(array('s'=>'Active','mod'=>'masseditproduct'),$_smarty_tpl);?>
</th>
			<th data-combinations><?php echo smartyTranslate(array('s'=>'Combinations','mod'=>'masseditproduct'),$_smarty_tpl);?>
 <a href="#"><?php echo smartyTranslate(array('s'=>'Select','mod'=>'masseditproduct'),$_smarty_tpl);?>
</a>
				<div class="selector_item select_combinations">
					<a class="check_all_combinations btn btn-default button" href="#">
						<i class="icon-check-sign"></i>
                        <?php echo smartyTranslate(array('s'=>'Check all','mod'=>'masseditproduct'),$_smarty_tpl);?>

					</a>
					<a class="uncheck_all_combinations btn btn-default button" href="#">
						<i class="icon-check-empty"></i>
                        <?php echo smartyTranslate(array('s'=>'Uncheck all','mod'=>'masseditproduct'),$_smarty_tpl);?>

					</a>
					<a class="check_attribute_combinations btn btn-default button" href="#">
						<i class="icon-list"></i>
                        <?php echo smartyTranslate(array('s'=>'Select attribute','mod'=>'masseditproduct'),$_smarty_tpl);?>

					</a>
					<div id="attributes_select">
						<div class="attribute_group_block">
							<div>
								<?php echo smartyTranslate(array('s'=>'Attribute','mod'=>'masseditproduct'),$_smarty_tpl);?>

								<select class="select_attribute">
									<option value="0">--</option>
									<?php  $_smarty_tpl->tpl_vars['attribute_group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attribute_group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attribures_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['attribute_group']->key => $_smarty_tpl->tpl_vars['attribute_group']->value) {
$_smarty_tpl->tpl_vars['attribute_group']->_loop = true;
?>
										<option value="<?php echo intval($_smarty_tpl->tpl_vars['attribute_group']->value['id_attribute_group']);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['attribute_group']->value['name'],'html','UTF-8');?>
</option>
									<?php } ?>
								</select>
							</div>
							<div>
								<?php echo smartyTranslate(array('s'=>'Value','mod'=>'masseditproduct'),$_smarty_tpl);?>

								<select class="select_attribute_value">
								</select>
							</div>
						</div>
						<a class="start_select_combinations btn btn-default button" href="#">
                            <?php echo smartyTranslate(array('s'=>'Select','mod'=>'masseditproduct'),$_smarty_tpl);?>

						</a>
					</div>
				</div>
			</th>
		</tr>
	</thead>
	<tbody>
	<?php if (isset($_smarty_tpl->tpl_vars['products']->value)&&(!isset($_smarty_tpl->tpl_vars['without_product']->value)||(isset($_smarty_tpl->tpl_vars['without_product']->value)&&!$_smarty_tpl->tpl_vars['without_product']->value))) {?>
		<?php if (count($_smarty_tpl->tpl_vars['products']->value)) {?>
			<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
				<?php echo $_smarty_tpl->getSubTemplate ("./product_line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0);?>

			<?php } ?>
		<?php } else { ?>
			<tr class="no_products text-center">
				<td colspan="11"><?php echo smartyTranslate(array('s'=>'No products','mod'=>'masseditproduct'),$_smarty_tpl);?>
</td>
			</tr>
		<?php }?>
	<?php }?>
	</tbody>
</table>
<?php if (isset($_smarty_tpl->tpl_vars['products']->value)&&(!isset($_smarty_tpl->tpl_vars['without_product']->value)||(isset($_smarty_tpl->tpl_vars['without_product']->value)&&!$_smarty_tpl->tpl_vars['without_product']->value))&&isset($_smarty_tpl->tpl_vars['p']->value)) {?>
	<div class="pagination clearfix">
		<?php if ($_smarty_tpl->tpl_vars['start']->value!=$_smarty_tpl->tpl_vars['stop']->value) {?>
			<ul class="pagination">
				<?php if ($_smarty_tpl->tpl_vars['p']->value!=1) {?>
					<?php $_smarty_tpl->tpl_vars['p_previous'] = new Smarty_variable($_smarty_tpl->tpl_vars['p']->value-1, null, 0);?>
					<li class="pagination_previous">
						<a onclick="setPage('<?php echo intval($_smarty_tpl->tpl_vars['p_previous']->value);?>
'); return false;" href="#">
							<i class="icon-chevron-left"></i> <b><?php echo smartyTranslate(array('s'=>'Previous','mod'=>'masseditproduct'),$_smarty_tpl);?>
</b>
						</a>
					</li>
				<?php } else { ?>
					<li class="disabled pagination_previous">
						<span>
							<i class="icon-chevron-left"></i> <b><?php echo smartyTranslate(array('s'=>'Previous','mod'=>'masseditproduct'),$_smarty_tpl);?>
</b>
						</span>
					</li>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['start']->value==3) {?>
					<li>
						<a onclick="setPage('1'); return false;" href="#"">
							<span>1</span>
						</a>
					</li>
					<li>
						<a onclick="setPage('2'); return false;" href="#">
							<span>2</span>
						</a>
					</li>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['start']->value==2) {?>
					<li>
						<a onclick="setPage('1'); return false;" href="#">
							<span>1</span>
						</a>
					</li>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['start']->value>3) {?>
					<li>
						<a onclick="setPage('1'); return false;" href="#">
							<span>1</span>
						</a>
					</li>
					<li class="truncate">
						<span>
							<span>...</span>
						</span>
					</li>
				<?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['name'] = 'pagination';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start'] = (int) $_smarty_tpl->tpl_vars['start']->value;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['stop']->value+1) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'] = ((int) 1) == 0 ? 1 : (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['total']);
?>
					<?php if ($_smarty_tpl->tpl_vars['p']->value==$_smarty_tpl->getVariable('smarty')->value['section']['pagination']['index']) {?>
						<li class="active current">
							<span>
								<span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['p']->value,'html','UTF-8');?>
</span>
							</span>
						</li>
					<?php } else { ?>
						<li>
							<a onclick="setPage('<?php echo intval($_smarty_tpl->getVariable('smarty')->value['section']['pagination']['index']);?>
'); return false;" href="#">
								<span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['pagination']['index'],'html','UTF-8');?>
</span>
							</a>
						</li>
					<?php }?>
				<?php endfor; endif; ?>
				<?php if ($_smarty_tpl->tpl_vars['pages_nb']->value>$_smarty_tpl->tpl_vars['stop']->value+2) {?>
					<li class="truncate">
						<span>
							<span>...</span>
						</span>
					</li>
					<li>
						<a onclick="setPage('<?php echo intval($_smarty_tpl->tpl_vars['pages_nb']->value);?>
'); return false;" href="#">
							<span><?php echo intval($_smarty_tpl->tpl_vars['pages_nb']->value);?>
</span>
						</a>
					</li>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['pages_nb']->value==$_smarty_tpl->tpl_vars['stop']->value+1) {?>
					<li>
						<a onclick="setPage('<?php echo intval($_smarty_tpl->tpl_vars['pages_nb']->value);?>
'); return false;" href="#">
							<span><?php echo intval($_smarty_tpl->tpl_vars['pages_nb']->value);?>
</span>
						</a>
					</li>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['pages_nb']->value==$_smarty_tpl->tpl_vars['stop']->value+2) {?>
					<li>
						<a onclick="setPage('<?php echo $_smarty_tpl->tpl_vars['pages_nb']->value-intval(1);?>
'); return false;" href="#">
							<span><?php echo $_smarty_tpl->tpl_vars['pages_nb']->value-intval(1);?>
</span>
						</a>
					</li>
					<li>
						<a onclick="setPage('<?php echo intval($_smarty_tpl->tpl_vars['pages_nb']->value);?>
'); return false;" href="#">
							<span><?php echo intval($_smarty_tpl->tpl_vars['pages_nb']->value);?>
</span>
						</a>
					</li>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['pages_nb']->value>1&&$_smarty_tpl->tpl_vars['p']->value!=$_smarty_tpl->tpl_vars['pages_nb']->value) {?>
					<?php $_smarty_tpl->tpl_vars['p_next'] = new Smarty_variable($_smarty_tpl->tpl_vars['p']->value+1, null, 0);?>
					<li class="pagination_next">
						<a onclick="setPage('<?php echo intval($_smarty_tpl->tpl_vars['p_next']->value);?>
'); return false;" href="#">
							<b><?php echo smartyTranslate(array('s'=>'Next','mod'=>'masseditproduct'),$_smarty_tpl);?>
</b> <i class="icon-chevron-right"></i>
						</a>
					</li>
				<?php } else { ?>
					<li class="disabled pagination_next">
						<span>
							<b><?php echo smartyTranslate(array('s'=>'Next','mod'=>'masseditproduct'),$_smarty_tpl);?>
</b> <i class="icon-chevron-right"></i>
						</span>
					</li>
				<?php }?>
			</ul>
		<?php }?>
	</div>
<?php }?><?php }} ?>
