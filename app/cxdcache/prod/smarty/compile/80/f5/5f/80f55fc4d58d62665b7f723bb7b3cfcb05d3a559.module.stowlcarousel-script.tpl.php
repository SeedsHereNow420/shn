<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:08:50
         compiled from "module:stowlcarousel/views/templates/hook/stowlcarousel-script.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8062367465c31a982c39876-37728927%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80f55fc4d58d62665b7f723bb7b3cfcb05d3a559' => 
    array (
      0 => 'module:stowlcarousel/views/templates/hook/stowlcarousel-script.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '8062367465c31a982c39876-37728927',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'js_data' => 0,
    'sttheme' => 0,
    'transition_style' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a982d9d017_83696794',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a982d9d017_83696794')) {function content_5c31a982d9d017_83696794($_smarty_tpl) {?><script type="text/javascript">
//<![CDATA[
    
    if(typeof(stowlcarousel_array) ==='undefined')
    var stowlcarousel_array = [];
    
        <?php if (count($_smarty_tpl->tpl_vars['js_data']->value['slide'])>1) {?>
        stowlcarousel_array[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js_data']->value['id_st_owl_carousel_group'], ENT_QUOTES, 'UTF-8');?>
] = {
            
            autoPlay : <?php if ($_smarty_tpl->tpl_vars['js_data']->value['auto_advance']&&!$_smarty_tpl->tpl_vars['js_data']->value['progress_bar']) {?><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['js_data']->value['time'])===null||$tmp==='' ? 7000 : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>false<?php }?>,
            navigation: <?php if ($_smarty_tpl->tpl_vars['js_data']->value['prev_next']) {?>true<?php } else { ?>false<?php }?>,
            pagination: <?php if ($_smarty_tpl->tpl_vars['js_data']->value['pag_nav']) {?>true<?php } else { ?>false<?php }?>,
            paginationSpeed : 1000,
            goToFirstSpeed : 2000,
            rewindNav: <?php if ($_smarty_tpl->tpl_vars['js_data']->value['rewind_nav']) {?>true<?php } else { ?>false<?php }?>,
            singleItem : <?php if ($_smarty_tpl->tpl_vars['js_data']->value['templates']!=3) {?>true<?php } else { ?>false<?php }?>,
            <?php if ($_smarty_tpl->tpl_vars['js_data']->value['templates']==3) {?>
              
              itemsCustom : [
                <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive']&&!$_smarty_tpl->tpl_vars['sttheme']->value['version_switching']) {?>
                [0,<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js_data']->value['items_xxs'], ENT_QUOTES, 'UTF-8');?>
]
                ,[460,<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js_data']->value['items_xs'], ENT_QUOTES, 'UTF-8');?>
]
                ,[748,<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js_data']->value['items_sm'], ENT_QUOTES, 'UTF-8');?>
]
                ,[972,<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js_data']->value['items_md'], ENT_QUOTES, 'UTF-8');?>
]
                ,[1180,<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js_data']->value['items_lg'], ENT_QUOTES, 'UTF-8');?>
]
                ,[1420,<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js_data']->value['items_xlg'], ENT_QUOTES, 'UTF-8');?>
]
                <?php } else { ?>
                [0,<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==2) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js_data']->value['items_xlg'], ENT_QUOTES, 'UTF-8');?>
<?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==1) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js_data']->value['items_lg'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js_data']->value['items_md'], ENT_QUOTES, 'UTF-8');?>
<?php }?>]
                
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['js_data']->value['is_full_width']) {?>
                
                ,[1600,<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js_data']->value['items_xxlg'], ENT_QUOTES, 'UTF-8');?>
]
                ,[1900,<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js_data']->value['items_huge'], ENT_QUOTES, 'UTF-8');?>
]
                <?php }?>
              ],
              
            <?php }?>
            autoHeight : <?php if ($_smarty_tpl->tpl_vars['js_data']->value['auto_height']) {?>true<?php } else { ?>false<?php }?>,
            slideSpeed: <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['js_data']->value['trans_period'])===null||$tmp==='' ? 400 : $tmp), ENT_QUOTES, 'UTF-8');?>
,
            stopOnHover: <?php if ($_smarty_tpl->tpl_vars['js_data']->value['pause']) {?>true<?php } else { ?>false<?php }?>,
            mouseDrag: <?php if ($_smarty_tpl->tpl_vars['js_data']->value['mouse_drag']) {?>true<?php } else { ?>false<?php }?>,
            <?php if ($_smarty_tpl->tpl_vars['js_data']->value['progress_bar']) {?>
            progress_bar: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js_data']->value['progress_bar'], ENT_QUOTES, 'UTF-8');?>
,
            bar_time : <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['js_data']->value['time'])===null||$tmp==='' ? 7000 : $tmp), ENT_QUOTES, 'UTF-8');?>
,
            <?php }?>
            transitionStyle: "<?php if (array_key_exists($_smarty_tpl->tpl_vars['js_data']->value['transition_style'],$_smarty_tpl->tpl_vars['transition_style']->value)) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['transition_style']->value[$_smarty_tpl->tpl_vars['js_data']->value['transition_style']]['name'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fade<?php }?>"
            
        };
        <?php }?>
//]]>
</script><?php }} ?>
