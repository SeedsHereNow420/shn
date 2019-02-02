<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:13:22
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/slider/script.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14495396375c31aa92b4d583-64449646%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19934f49ed6a0c5fb1bb657c34cf0fd16e4a9894' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/catalog/slider/script.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14495396375c31aa92b4d583-64449646',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'slider_slideshow' => 0,
    'slider_s_speed' => 0,
    'slider_a_speed' => 0,
    'slider_pause_on_hover' => 0,
    'rewind_nav' => 0,
    'lazy_load' => 0,
    'sttheme' => 0,
    'is_product_slider' => 0,
    'column_slider' => 0,
    'slider_move' => 0,
    'pro_per_fw' => 0,
    'pro_per_xxl' => 0,
    'pro_per_xl' => 0,
    'pro_per_lg' => 0,
    'pro_per_md' => 0,
    'pro_per_sm' => 0,
    'pro_per_xs' => 0,
    'direction_nav' => 0,
    'block_name' => 0,
    'control_nav' => 0,
    'spacing_between' => 0,
    'homeverybottom' => 0,
    'slidesPerView' => 0,
    'autoHeight' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31aa92b87769_39628233',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31aa92b87769_39628233')) {function content_5c31aa92b87769_39628233($_smarty_tpl) {?>    <script type="text/javascript">
    //<![CDATA[
        
        if(typeof(swiper_options) ==='undefined')
        var swiper_options = [];
        
        
        swiper_options.push({
            
            <?php if ($_smarty_tpl->tpl_vars['slider_slideshow']->value) {?>
                autoplay: <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['slider_s_speed']->value)===null||$tmp==='' ? 5000 : $tmp), ENT_QUOTES, 'UTF-8');?>
,
                <?php if ($_smarty_tpl->tpl_vars['slider_slideshow']->value==2) {?>autoplayStopOnLast: true,<?php }?>
            <?php }?>
            speed: <?php if ($_smarty_tpl->tpl_vars['slider_a_speed']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_a_speed']->value, ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>400<?php }?>,
            autoplayDisableOnInteraction: <?php if ($_smarty_tpl->tpl_vars['slider_pause_on_hover']->value) {?>true<?php } else { ?>false<?php }?>,
            loop: <?php if ($_smarty_tpl->tpl_vars['rewind_nav']->value) {?>true<?php } else { ?>false<?php }?>,
            <?php if ($_smarty_tpl->tpl_vars['lazy_load']->value&&(!$_smarty_tpl->tpl_vars['sttheme']->value['pro_tm_slider']||(isset($_smarty_tpl->tpl_vars['is_product_slider']->value)&&!$_smarty_tpl->tpl_vars['is_product_slider']->value))) {?>
                lazyLoading: true,
                onLazyImageReady: function(swiper, slide, image){
                    if($(image).hasClass('front-image'))
                        $(image).parent().removeClass('is_lazy');//also in pro-lazy.js
                },
                lazyLoadingOnTransitionStart: true,
                lazyLoadingInPrevNext: true,
                lazyLoadingInPrevNextAmount: <?php if ((isset($_smarty_tpl->tpl_vars['column_slider']->value)&&$_smarty_tpl->tpl_vars['column_slider']->value)||$_smarty_tpl->tpl_vars['slider_move']->value!=1) {?>1<?php } else { ?><?php echo htmlspecialchars(max($_smarty_tpl->tpl_vars['pro_per_fw']->value,$_smarty_tpl->tpl_vars['pro_per_xxl']->value,$_smarty_tpl->tpl_vars['pro_per_xl']->value,$_smarty_tpl->tpl_vars['pro_per_lg']->value,$_smarty_tpl->tpl_vars['pro_per_md']->value,$_smarty_tpl->tpl_vars['pro_per_sm']->value,$_smarty_tpl->tpl_vars['pro_per_xs']->value), ENT_QUOTES, 'UTF-8');?>
<?php }?>,
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['direction_nav']->value) {?>
                nextButton: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block_name']->value, ENT_QUOTES, 'UTF-8');?>
 .swiper-button-outer.swiper-button-next',
                prevButton: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block_name']->value, ENT_QUOTES, 'UTF-8');?>
 .swiper-button-outer.swiper-button-prev',
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['control_nav']->value) {?>
            pagination: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block_name']->value, ENT_QUOTES, 'UTF-8');?>
 .swiper-pagination',
            paginationType: <?php if ($_smarty_tpl->tpl_vars['control_nav']->value==2) {?>'bullets'<?php } elseif ($_smarty_tpl->tpl_vars['control_nav']->value==3) {?>'progress'<?php } else { ?>'bullets'<?php }?>, //A bug of swiper, this should be 'custom' when nav==2
                <?php if ($_smarty_tpl->tpl_vars['control_nav']->value==2) {?>
                
                paginationBulletRender: function (swiper, index, className) {
                    return '<span class="' + className + '">' + (index + 1) + '</span>';
                },
                
                <?php }?>
            <?php }?>

            <?php if (isset($_smarty_tpl->tpl_vars['column_slider']->value)&&$_smarty_tpl->tpl_vars['column_slider']->value) {?>

                slidesPerView : 1,
                observer : true,
                observeParents : true,

            <?php } else { ?>

                freeMode: <?php if ($_smarty_tpl->tpl_vars['slider_move']->value==2) {?>true<?php } else { ?>false<?php }?>,
                spaceBetween: <?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['spacing_between']->value, ENT_QUOTES, 'UTF-8');?>
, //new
                    <?php if (((isset($_smarty_tpl->tpl_vars['homeverybottom']->value)&&$_smarty_tpl->tpl_vars['homeverybottom']->value)||$_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==3)&&$_smarty_tpl->tpl_vars['pro_per_fw']->value) {?>
                        <?php $_smarty_tpl->tpl_vars['slidesPerView'] = new Smarty_variable($_smarty_tpl->tpl_vars['pro_per_fw']->value, null, 0);?>
                    <?php } else { ?>
                        <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==2) {?>
                            <?php $_smarty_tpl->tpl_vars['slidesPerView'] = new Smarty_variable($_smarty_tpl->tpl_vars['pro_per_xxl']->value, null, 0);?>
                        <?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']>=1) {?>
                            <?php $_smarty_tpl->tpl_vars['slidesPerView'] = new Smarty_variable($_smarty_tpl->tpl_vars['pro_per_xl']->value, null, 0);?>
                        <?php } else { ?>
                            <?php $_smarty_tpl->tpl_vars['slidesPerView'] = new Smarty_variable($_smarty_tpl->tpl_vars['pro_per_lg']->value, null, 0);?>
                        <?php }?>
                    <?php }?>
                slidesPerView: <?php if ($_smarty_tpl->tpl_vars['slidesPerView']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slidesPerView']->value, ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>1<?php }?>,
                <?php if ($_smarty_tpl->tpl_vars['slider_move']->value==1) {?>slidesPerGroup: <?php if ($_smarty_tpl->tpl_vars['slidesPerView']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slidesPerView']->value, ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>1<?php }?>,<?php }?>
                <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive']&&!$_smarty_tpl->tpl_vars['sttheme']->value['version_switching']) {?>
                
                breakpoints: {
                    
                    <?php if (((isset($_smarty_tpl->tpl_vars['homeverybottom']->value)&&$_smarty_tpl->tpl_vars['homeverybottom']->value)||$_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==3)&&$_smarty_tpl->tpl_vars['pro_per_fw']->value) {?>
                    <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==2) {?>1600<?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==1) {?>1440<?php } else { ?>1200<?php }?>: {slidesPerView: <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['pro_per_xxl']->value)===null||$tmp==='' ? 3 : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['slider_move']->value==1) {?>, slidesPerGroup: <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['pro_per_xxl']->value)===null||$tmp==='' ? 3 : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php }?> },
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==2) {?>1440: {slidesPerView: <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['pro_per_xl']->value)===null||$tmp==='' ? 3 : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['slider_move']->value==1) {?>, slidesPerGroup: <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['pro_per_xl']->value)===null||$tmp==='' ? 3 : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php }?> },<?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']>=1) {?>1200: {slidesPerView: <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['pro_per_lg']->value)===null||$tmp==='' ? 2 : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['slider_move']->value==1) {?>, slidesPerGroup: <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['pro_per_lg']->value)===null||$tmp==='' ? 2 : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php }?> },<?php }?>
                    992: {slidesPerView: <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['pro_per_md']->value)===null||$tmp==='' ? 4 : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['slider_move']->value==1) {?>, slidesPerGroup: <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['pro_per_md']->value)===null||$tmp==='' ? 4 : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php }?> },
                    768: {slidesPerView: <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['pro_per_sm']->value)===null||$tmp==='' ? 3 : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['slider_move']->value==1) {?>, slidesPerGroup: <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['pro_per_sm']->value)===null||$tmp==='' ? 3 : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php }?> },
                    480: {slidesPerView: <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['pro_per_xs']->value)===null||$tmp==='' ? 2 : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['slider_move']->value==1) {?>, slidesPerGroup: <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['pro_per_xs']->value)===null||$tmp==='' ? 2 : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php }?> }
                },
                
                <?php }?>

            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['autoHeight']->value)&&$_smarty_tpl->tpl_vars['autoHeight']->value) {?>autoHeight:true,<?php }?>
            watchSlidesProgress: true,
            watchSlidesVisibility: true,
            
            onInit : function (swiper) {
                $(swiper.container).removeClass('swiper_loading').addClass('swiper_loaded');
                
                <?php if ($_smarty_tpl->tpl_vars['direction_nav']->value) {?>
                
                if($(swiper.slides).length==$(swiper.slides).filter('.swiper-slide-visible').length)
                {
                    $(swiper.params.nextButton).hide();
                    $(swiper.params.prevButton).hide();
                }
                else
                {
                    $(swiper.params.nextButton).show();
                    $(swiper.params.prevButton).show();
                }
                
                <?php }?>
                
            },
            
            //temp fix, loop breaks when roundlenghts and autoplay
            <?php if (!$_smarty_tpl->tpl_vars['slider_slideshow']->value) {?>roundLengths: true,<?php }?>
            id_st: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block_name']->value, ENT_QUOTES, 'UTF-8');?>
 .products_sldier_swiper'

        
        });
         

    //]]>
    </script><?php }} ?>
