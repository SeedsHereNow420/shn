<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:20
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/steps/unreachable.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2924604175c32fdb42e8528-75756540%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1659f3440a2ea0ef2def2f35902509bed0b6db83' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/steps/unreachable.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2924604175c32fdb42e8528-75756540',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'identifier' => 0,
    'position' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c32fdb42ea750_57169019',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c32fdb42ea750_57169019')) {function content_5c32fdb42ea750_57169019($_smarty_tpl) {?>

  <section class="checkout-step -unreachable" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['identifier']->value, ENT_QUOTES, 'UTF-8');?>
">
    <div class="step-title">
        <div class="heading_color fs_lg font-weight-bold">
          <span class="step-number"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['position']->value, ENT_QUOTES, 'UTF-8');?>
</span>
          <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8');?>

        </div>
      </div>
  </section>

<?php }} ?>
