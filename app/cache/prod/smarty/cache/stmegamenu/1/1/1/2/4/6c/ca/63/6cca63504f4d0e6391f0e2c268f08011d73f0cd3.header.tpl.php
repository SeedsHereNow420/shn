<?php /*%%SmartyHeaderCode:18048620205c32fda2c433f4-95583229%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cca63504f4d0e6391f0e2c268f08011d73f0cd3' => 
    array (
      0 => 'modules/stmegamenu/views/templates/hook/header.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18048620205c32fda2c433f4-95583229',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c37f70841ac22_40939925',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c37f70841ac22_40939925')) {function content_5c37f70841ac22_40939925($_smarty_tpl) {?><style type="text/css">
#st_mega_menu_wrap #st_ma_6,#st_mega_menu_column_block #st_ma_6,#st_mega_menu_wrap #st_menu_block_6,#st_mega_menu_wrap #st_menu_block_6 a,#st_mega_menu_column_block #st_menu_block_6,#st_mega_menu_column_block #st_menu_block_6 a{color:#ffffff;}#st_mega_menu_wrap #st_ma_6:hover, #st_mega_menu_wrap #st_menu_6.current .ma_level_0,#st_mega_menu_column_block #st_ma_6:hover, #st_mega_menu_column_block #st_menu_6.current .ma_level_0,#st_mega_menu_wrap #st_menu_block_6 a:hover,#st_mega_menu_column_block #st_menu_block_6 a:hover{color:#32B838;}#st_mega_menu_wrap #st_ma_6,#st_mega_menu_column_block #st_ma_6{background-color:#000000;}#st_mega_menu_wrap #st_ma_6:hover, #st_mega_menu_wrap #st_menu_6.current .ma_level_0,#st_mega_menu_column_block #st_ma_6:hover, #st_mega_menu_column_block #st_menu_6.current .ma_level_0{background-color:#000000;}#st_mega_menu_wrap #st_menu_6 .stmenu_sub, #st_mega_menu_wrap #st_menu_6 .stmenu_multi_level ul, #st_mega_menu_wrap #st_menu_6 .mu_level_2 ul,#st_mega_menu_column_block #st_menu_6 .stmenu_sub, #st_mega_menu_column_block #st_menu_6 .stmenu_multi_level ul, #st_mega_menu_column_block #st_menu_6 .mu_level_2 ul,#st_mega_menu_wrap #st_menu_6 .stmenu_vs{background-color:#000000;}#st_mega_menu_wrap #st_ma_7,#st_mega_menu_column_block #st_ma_7,#st_mega_menu_wrap #st_menu_block_7,#st_mega_menu_wrap #st_menu_block_7 a,#st_mega_menu_column_block #st_menu_block_7,#st_mega_menu_column_block #st_menu_block_7 a{color:#ffffff;}#st_mega_menu_wrap #st_ma_7:hover, #st_mega_menu_wrap #st_menu_7.current .ma_level_0,#st_mega_menu_column_block #st_ma_7:hover, #st_mega_menu_column_block #st_menu_7.current .ma_level_0,#st_mega_menu_wrap #st_menu_block_7 a:hover,#st_mega_menu_column_block #st_menu_block_7 a:hover{color:#32B838;}#st_mega_menu_wrap #st_ma_7,#st_mega_menu_column_block #st_ma_7{background-color:#000000;}#st_mega_menu_wrap #st_ma_7:hover, #st_mega_menu_wrap #st_menu_7.current .ma_level_0,#st_mega_menu_column_block #st_ma_7:hover, #st_mega_menu_column_block #st_menu_7.current .ma_level_0{background-color:#000000;}#st_mega_menu_wrap #st_menu_7 .stmenu_sub, #st_mega_menu_wrap #st_menu_7 .stmenu_multi_level ul, #st_mega_menu_wrap #st_menu_7 .mu_level_2 ul,#st_mega_menu_column_block #st_menu_7 .stmenu_sub, #st_mega_menu_column_block #st_menu_7 .stmenu_multi_level ul, #st_mega_menu_column_block #st_menu_7 .mu_level_2 ul,#st_mega_menu_wrap #st_menu_7 .stmenu_vs{background-color:#000000;}#st_mega_menu_wrap #st_ma_58,#st_mega_menu_column_block #st_ma_58,#st_mega_menu_wrap #st_menu_block_58,#st_mega_menu_wrap #st_menu_block_58 a,#st_mega_menu_column_block #st_menu_block_58,#st_mega_menu_column_block #st_menu_block_58 a{color:#ffffff;}#st_mega_menu_wrap #st_ma_58:hover, #st_mega_menu_wrap #st_menu_58.current .ma_level_0,#st_mega_menu_column_block #st_ma_58:hover, #st_mega_menu_column_block #st_menu_58.current .ma_level_0,#st_mega_menu_wrap #st_menu_block_58 a:hover,#st_mega_menu_column_block #st_menu_block_58 a:hover{color:#32B838;}#st_mega_menu_wrap #st_ma_58,#st_mega_menu_column_block #st_ma_58{background-color:#000000;}#st_mega_menu_wrap #st_ma_58:hover, #st_mega_menu_wrap #st_menu_58.current .ma_level_0,#st_mega_menu_column_block #st_ma_58:hover, #st_mega_menu_column_block #st_menu_58.current .ma_level_0{background-color:#000000;}#st_mega_menu_wrap #st_menu_58 .stmenu_sub, #st_mega_menu_wrap #st_menu_58 .stmenu_multi_level ul, #st_mega_menu_wrap #st_menu_58 .mu_level_2 ul,#st_mega_menu_column_block #st_menu_58 .stmenu_sub, #st_mega_menu_column_block #st_menu_58 .stmenu_multi_level ul, #st_mega_menu_column_block #st_menu_58 .mu_level_2 ul,#st_mega_menu_wrap #st_menu_58 .stmenu_vs{background-color:#000000;}#st_mega_menu_wrap #st_ma_59,#st_mega_menu_column_block #st_ma_59,#st_mega_menu_wrap #st_menu_block_59,#st_mega_menu_wrap #st_menu_block_59 a,#st_mega_menu_column_block #st_menu_block_59,#st_mega_menu_column_block #st_menu_block_59 a{color:#ffffff;}#st_mega_menu_wrap #st_ma_59:hover, #st_mega_menu_wrap #st_menu_59.current .ma_level_0,#st_mega_menu_column_block #st_ma_59:hover, #st_mega_menu_column_block #st_menu_59.current .ma_level_0,#st_mega_menu_wrap #st_menu_block_59 a:hover,#st_mega_menu_column_block #st_menu_block_59 a:hover{color:#32B838;}#st_mega_menu_wrap #st_ma_59,#st_mega_menu_column_block #st_ma_59{background-color:#000000;}#st_mega_menu_wrap #st_ma_59:hover, #st_mega_menu_wrap #st_menu_59.current .ma_level_0,#st_mega_menu_column_block #st_ma_59:hover, #st_mega_menu_column_block #st_menu_59.current .ma_level_0{background-color:#000000;}#st_mega_menu_wrap #st_menu_59 .stmenu_sub, #st_mega_menu_wrap #st_menu_59 .stmenu_multi_level ul, #st_mega_menu_wrap #st_menu_59 .mu_level_2 ul,#st_mega_menu_column_block #st_menu_59 .stmenu_sub, #st_mega_menu_column_block #st_menu_59 .stmenu_multi_level ul, #st_mega_menu_column_block #st_menu_59 .mu_level_2 ul,#st_mega_menu_wrap #st_menu_59 .stmenu_vs{background-color:#000000;}#st_mega_menu_wrap #st_ma_64,#st_mega_menu_column_block #st_ma_64,#st_mega_menu_wrap #st_menu_block_64,#st_mega_menu_wrap #st_menu_block_64 a,#st_mega_menu_column_block #st_menu_block_64,#st_mega_menu_column_block #st_menu_block_64 a{color:#ffffff;}#st_mega_menu_wrap #st_ma_64:hover, #st_mega_menu_wrap #st_menu_64.current .ma_level_0,#st_mega_menu_column_block #st_ma_64:hover, #st_mega_menu_column_block #st_menu_64.current .ma_level_0,#st_mega_menu_wrap #st_menu_block_64 a:hover,#st_mega_menu_column_block #st_menu_block_64 a:hover{color:#32B838;}#st_mega_menu_wrap #st_ma_64,#st_mega_menu_column_block #st_ma_64{background-color:#000000;}#st_mega_menu_wrap #st_ma_64:hover, #st_mega_menu_wrap #st_menu_64.current .ma_level_0,#st_mega_menu_column_block #st_ma_64:hover, #st_mega_menu_column_block #st_menu_64.current .ma_level_0{background-color:#000000;}#st_mega_menu_wrap #st_menu_64 .stmenu_sub, #st_mega_menu_wrap #st_menu_64 .stmenu_multi_level ul, #st_mega_menu_wrap #st_menu_64 .mu_level_2 ul,#st_mega_menu_column_block #st_menu_64 .stmenu_sub, #st_mega_menu_column_block #st_menu_64 .stmenu_multi_level ul, #st_mega_menu_column_block #st_menu_64 .mu_level_2 ul,#st_mega_menu_wrap #st_menu_64 .stmenu_vs{background-color:#000000;}#st_mega_menu_wrap #st_ma_78,#st_mega_menu_column_block #st_ma_78,#st_mega_menu_wrap #st_menu_block_78,#st_mega_menu_wrap #st_menu_block_78 a,#st_mega_menu_column_block #st_menu_block_78,#st_mega_menu_column_block #st_menu_block_78 a{color:#ffff00;}#st_mega_menu_wrap #st_ma_78:hover, #st_mega_menu_wrap #st_menu_78.current .ma_level_0,#st_mega_menu_column_block #st_ma_78:hover, #st_mega_menu_column_block #st_menu_78.current .ma_level_0,#st_mega_menu_wrap #st_menu_block_78 a:hover,#st_mega_menu_column_block #st_menu_block_78 a:hover{color:#000000;}#st_mega_menu_wrap #st_ma_78:hover, #st_mega_menu_wrap #st_menu_78.current .ma_level_0,#st_mega_menu_column_block #st_ma_78:hover, #st_mega_menu_column_block #st_menu_78.current .ma_level_0{background-color:#ffffff;}#st_mega_menu_wrap #st_menu_78 .stmenu_sub, #st_mega_menu_wrap #st_menu_78 .stmenu_multi_level ul, #st_mega_menu_wrap #st_menu_78 .mu_level_2 ul,#st_mega_menu_column_block #st_menu_78 .stmenu_sub, #st_mega_menu_column_block #st_menu_78 .stmenu_multi_level ul, #st_mega_menu_column_block #st_menu_78 .mu_level_2 ul,#st_mega_menu_wrap #st_menu_78 .stmenu_vs{background-color:#000000;}#st_ma_78 .cate_label,#st_mo_ma_78 .cate_label{color:#ffff00;}#st_ma_78 .cate_label,#st_mo_ma_78 .cate_label{background-color:#000000;}
</style>
<?php }} ?>
