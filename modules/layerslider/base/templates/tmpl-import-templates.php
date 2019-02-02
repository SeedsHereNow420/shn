<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;
if (defined('LS_INCLUDE')) {
    $lsStoreHasUpdate = null;
    $validity = null;
    $slider = null;
    $lsDefaults = null;
    $lsStoreUpdate = null;
    $lsStoreData = null;
    $postTypes = $postCategories = $postTags = $postTaxonomies = null;
    $repoUrl = null;
    $root = null;
    $version = null;
    $itemID = 0;
    $codeKey = 0;
    $authKey = 0;
    $channelKey = 0;
}

$demoSliders = LsSources::getDemoSliders(); ?>
<script>
    window.lsImportNonce = '<?php echo ls_create_nonce('ls-import-demos'); ?>';
</script>
<script type="text/html" id="tmpl-import-sliders">
    <div id="ls-import-modal-window" class="ls-modal fullpage ls-box <?php echo $lsStoreHasUpdate ? 'has-updates' : '' ?>">
        <header class="header">
            <div class="layerslider-logo"></div>
            <h1>
                <?php ls_e('LayerSlider', 'LayerSlider') ?>
                <span><?php ls_e('Templates', 'LayerSlider') ?></span>
            </h1>
<!--             <nav>
                <ul>
                    <li class="active"><span><?php ls_e('Sliders', 'LayerSlider') ?></span></li>
                    <li><span><?php ls_e('Plugins', 'LayerSlider') ?></span></li>
                    <li><span><?php ls_e('Skins', 'LayerSlider') ?></span></li>
                </ul>
            </nav>
 -->
            <div class="last-update">
                <strong><?php ls_e('Last updated: ', 'LayerSlider') ?></strong>
                <span>
                    <?php
                    if ($lsStoreUpdate) {
                        echo ls_human_time_diff($lsStoreUpdate), ls__(' ago', 'LayerSlider');
                    } else {
                        ls_e('Just now', 'LayerSlider');
                    }
                    ?>
                </span>
                <a href="<?php echo ls_nonce_url('?page=layerslider&action=update_store', 'update_store') ?>" class="button"><?php ls_e('Force Library Update', 'LayerSlider') ?></a>
            </div>
             <b class="dashicons dashicons-no"></b>
        </header>
        <div class="inner">
            <nav>
                <ul>
                    <li class="uppercase active" data-group="all"><?php ls_e('All', 'LayerSlider') ?></li>
                    <li class="uppercase" data-group="free"><?php ls_e('All free', 'LayerSlider') ?></li>
                    <li class="uppercase" data-group="premium"><?php ls_e('All Premium', 'LayerSlider') ?></li>
                    <?php if (count($demoSliders)) : ?>
                        <li class="uppercase" data-group="bundled"><?php ls_e('Bundled', 'LayerSlider') ?></li>
                    <?php endif; ?>
                    <li class="uppercase separator" data-group="packs"><?php ls_e('SLIDER PACKS', 'LayerSlider') ?></li>

                    <li data-group="fullwidth"><?php ls_e('Full-width', 'LayerSlider') ?></li>
                    <li data-group="fullsize"><?php ls_e('Full-size', 'LayerSlider') ?></li>

                    <li data-group="landing"><?php ls_e('Landing Page', 'LayerSlider') ?></li>
                    <li data-group="parallax"><?php ls_e('Parallax', 'LayerSlider') ?></li>
                    <li data-group="loop"><?php ls_e('Loop', 'LayerSlider') ?></li>
                    <li data-group="text"><?php ls_e('Text Transition', 'LayerSlider') ?></li>
                    <li data-group="kenburns"><?php ls_e('Ken Burns', 'LayerSlider') ?></li>
                    <li data-group="playbyscroll"><?php ls_e('Play By Scroll', 'LayerSlider') ?></li>
                    <li data-group="filter"><?php ls_e('Filter Transition', 'LayerSlider') ?></li>
                    <li data-group="blendmode"><?php ls_e('Blend Modes', 'LayerSlider') ?></li>
                    <li data-group="carousel"><?php ls_e('Carousel', 'LayerSlider') ?></li>
                    <li data-group="media"><?php ls_e('Media', 'LayerSlider') ?></li>

                    <li data-group="experiments"><?php ls_e('Experimental', 'LayerSlider') ?></li>
                    <li data-group="specialeffects"><?php ls_e('Special Effects', 'LayerSlider') ?></li>

                    <li data-group="3dtransition"><?php ls_e('3D Transition', 'LayerSlider') ?></li>
                    <li data-group="api"><?php ls_e('API', 'LayerSlider') ?></li>
                </ul>
            </nav>

            <div class="items">
                <?php
                if (! empty($lsStoreData) && ! empty($lsStoreData['sliders'])) {
                    $demoSliders = array_merge($demoSliders, $lsStoreData['sliders']);
                }
                $now = time();
                foreach ($demoSliders as $handle => $item) : ?>
                    <figure class="item" data-groups="<?php echo $item['groups'] ?>" data-handle="<?php echo $handle; ?>" data-bundled="<?php echo ! empty($item['bundled']) ? 'true' : 'false' ?>" data-premium-warning="<?php echo (! $validity && ! empty($item['premium'])) ? 'true' : 'false' ?>" data-version-warning="<?php echo version_compare($item['requires'], LS_PLUGIN_VERSION, '>') ? 'true' : 'false' ?>">
                        <div class="aspect">
                            <div class="item-picture" style="background: url(<?php echo $item['preview'] ?>);">
                            </div>
                            <figcaption>
                                <span><?php echo $item['name'] ?></span>
                            </figcaption>
                            <a class="item-preview" target="_blank" href="<?php echo ! empty($item['url']) ? $item['url'] : '#' ?>" ><b class="dashicons dashicons-format-image"></b><?php ls_e('preview', 'LayerSlider') ?></a>
                            <a class="item-import" href="#"><?php ls_e('import', 'LayerSlider') ?><b class="dashicons dashicons-download"></b></a>

                            <?php if (! empty($item['released'])) : ?>
                                <?php if (strtotime($item['released']) + MONTH_IN_SECONDS > $now) :  ?>
                                <span class="badge-new"><?php ls_ex('NEW', 'Template Store', 'LayerSlider') ?>
                                <?php endif ?>
                            <?php endif ?>
                        </div>
                    </figure>
                <?php
                endforeach; ?>
                <figure class="coming-soon">
                    <div class="aspect">
                        <table class="absolute-wrapper">
                            <tr>
                                <td>
                                    <span><?php ls_e('Coming soon,<br>stay tuned!', 'LayerSlider') ?></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </figure>
            </div>
        </div>
    </div>
</script>