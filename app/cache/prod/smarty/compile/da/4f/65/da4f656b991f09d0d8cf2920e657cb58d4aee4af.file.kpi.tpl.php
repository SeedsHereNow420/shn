<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:03:16
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/helpers/kpi/kpi.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8401183565c338654443161-71510617%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da4f656b991f09d0d8cf2920e657cb58d4aee4af' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/helpers/kpi/kpi.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8401183565c338654443161-71510617',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'id' => 0,
    'color' => 0,
    'tooltip' => 0,
    'icon' => 0,
    'chart' => 0,
    'title' => 0,
    'subtitle' => 0,
    'value' => 0,
    'source' => 0,
    'refresh' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c3386545721d7_61355114',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3386545721d7_61355114')) {function content_5c3386545721d7_61355114($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
?>

<<?php if (isset($_smarty_tpl->tpl_vars['href']->value)&&$_smarty_tpl->tpl_vars['href']->value) {?>a style="display:block" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['href']->value,'html','UTF-8');?>
"<?php } else { ?>div<?php }?> id="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['id']->value,'html','UTF-8');?>
" data-toggle="tooltip" class="box-stats label-tooltip <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['color']->value);?>
" data-original-title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tooltip']->value);?>
">
	<div class="kpi-content">
	<?php if (isset($_smarty_tpl->tpl_vars['icon']->value)&&$_smarty_tpl->tpl_vars['icon']->value) {?>
		<i class="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['icon']->value);?>
"></i>
	<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['chart']->value)&&$_smarty_tpl->tpl_vars['chart']->value) {?>
		<div class="boxchart-overlay">
			<div class="boxchart">
			</div>
		</div>
	<?php }?>
		<span class="title"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['title']->value);?>
</span>
		<span cLass="subtitle"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['subtitle']->value);?>
</span>
		<span class="value"><?php echo smarty_modifier_replace($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['value']->value),'&amp;','&');?>
</span>
	</div>

</<?php if (isset($_smarty_tpl->tpl_vars['href']->value)&&$_smarty_tpl->tpl_vars['href']->value) {?>a<?php } else { ?>div<?php }?>>

<script>
	function refresh_<?php echo addslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['id']->value,'-','_'));?>
()
	{
		<?php if (!isset($_smarty_tpl->tpl_vars['source']->value)||$_smarty_tpl->tpl_vars['source']->value==''||!isset($_smarty_tpl->tpl_vars['refresh']->value)||$_smarty_tpl->tpl_vars['refresh']->value=='') {?>
			if (arguments.length < 1 || arguments[0] != true) {
				// refresh kpis only if force mode is true (pass true as first argument of this function).
				return;
			}
		<?php }?>
		$.ajax({
			url: '<?php echo addslashes($_smarty_tpl->tpl_vars['source']->value);?>
' + '&rand=' + new Date().getTime(),
			dataType: 'json',
			type: 'GET',
			cache: false,
			headers: { 'cache-control': 'no-cache' },
			success: function(jsonData){
				if (!jsonData.has_errors)
				{
					if (jsonData.value != undefined)
					{
						$('#<?php echo addslashes($_smarty_tpl->tpl_vars['id']->value);?>
 .value').html(jsonData.value);
						$('#<?php echo addslashes($_smarty_tpl->tpl_vars['id']->value);?>
').attr('data-original-title', jsonData.tooltip);
					}
					if (jsonData.data != undefined)
					{
						$("#<?php echo addslashes($_smarty_tpl->tpl_vars['id']->value);?>
 .boxchart svg").remove();
						set_d3_<?php echo addslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['id']->value,'-','_'));?>
(jsonData.data);
					}
				}
			}
		});
	}
</script>

<?php if ($_smarty_tpl->tpl_vars['chart']->value) {?>
<script>
	function set_d3_<?php echo addslashes(str_replace($_smarty_tpl->tpl_vars['id']->value,'-','_'));?>
(jsonObject)
	{
		var data = new Array;
		$.each(jsonObject, function (index, value) {
			data.push(value);
		});
		var data_max = d3.max(data);

		var chart = d3.select("#<?php echo addslashes($_smarty_tpl->tpl_vars['id']->value);?>
 .boxchart").append("svg")
			.attr("class", "data_chart")
			.attr("width", data.length * 6)
			.attr("height", 45);

		var y = d3.scale.linear()
			.domain([0, data_max])
			.range([0, data_max * 45]);

		chart.selectAll("rect")
			.data(data)
			.enter().append("rect")
			.attr("y", function(d) { return 45 - d * 45 / data_max; })
			.attr("x", function(d, i) { return i * 6; })
			.attr("width", 4)
			.attr("height", y);
	}

	<?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
		set_d3_<?php echo addslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['id']->value,'-','_'));?>
($.parseJSON("<?php echo addslashes($_smarty_tpl->tpl_vars['data']->value);?>
"));
	<?php }?>
</script>
<?php }?>
<?php }} ?>
