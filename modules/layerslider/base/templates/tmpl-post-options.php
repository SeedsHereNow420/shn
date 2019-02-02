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
    $slider = null;
    $postTypes = $postCategories = $postTags = $postTaxonomies = null;
    $lsDefaults = null;
}

$queryArgs = array(
    'post_status' => 'publish',
    'limit' => 100,
    'posts_per_page' => 100,
    'suppress_filters' => false
);

if (!empty($slider['properties']['post_orderby'])) {
    $queryArgs['orderby'] = $slider['properties']['post_orderby'];
}
if (!empty($slider['properties']['post_order'])) {
    $queryArgs['order'] = $slider['properties']['post_order'];
}
if (!empty($slider['properties']['post_type'])) {
    $queryArgs['post_type'] = $slider['properties']['post_type'];
}
if (!empty($slider['properties']['post_categories'][0])) {
    $queryArgs['category__in'] = $slider['properties']['post_categories'];
}
if (!empty($slider['properties'][0])) {
    $queryArgs['tag__in'] = $slider['properties']['post_tags'];
}
if (!empty($slider['properties']['post_taxonomy']) && !empty($slider['properties']['post_tax_terms'])) {
    $queryArgs['tax_query'][] = array(
        'taxonomy' => $slider['properties']['post_taxonomy'],
        'field' => 'id',
        'terms' => $slider['properties']['post_tax_terms']
    );
}

$posts = LsPosts::find($queryArgs)->getParsedObject();
?>
<script type="text/javascript" class="ls-hidden" id="ls-posts-json">window.lsPostsJSON = <?php echo $posts ? Tools::jsonEncode($posts) : '[]' ?>;</script>
<div id="ls-post-options">
    <div class="ls-box ls-modal ls-configure-posts-modal">
        <h2 class="header">
            <?php ls_e('Find products with the filters below', 'LayerSlider') ?>
            <a href="#" class="dashicons dashicons-no"></a>
        </h2>
        <div style="text-align: right; padding: 5px;">
            <label><?php ls_e('Advanced', 'LayerSlider') ?></label><input type="checkbox" id="ls-post-settings-adv">
        </div>
        <div class="ls-post-basic" style="width: 140px; margin: 0 auto 10px;">
            <label><input type="radio" name="post_basic" value="date_add"> <?php ls_e('New Arrivals', 'LayerSlider') ?></label><br>
            <label><input type="radio" name="post_basic" value="position"> <?php ls_e('Popular', 'LayerSlider') ?></label><br>
            <label><input type="radio" name="post_basic" value="quantity"> <?php ls_e('Best Sellers', 'LayerSlider') ?></label><br>
            <label><input type="radio" name="post_basic" value="reduction"> <?php ls_e('Special', 'LayerSlider') ?></label>
        </div>
        <div class="ls-post-advanced">
            <div class="inner clearfix">
                <div class="ls-post-filters clearfix">

                    <!-- Post types -->
                    <select data-param="post_type" name="post_type" class="multiple" multiple="multiple">
                    <?php foreach ($postTypes as $item) : ?>
                        <?php if (isset($slider['properties']['post_type']) &&  in_array($item['slug'], $slider['properties']['post_type'])) : ?>
                            <option value="<?php echo $item['slug'] ?>" selected="selected"><?php echo Tools::ucfirst($item['name']) ?></option>
                        <?php else : ?>
                            <option value="<?php echo $item['slug'] ?>"><?php echo Tools::ucfirst($item['name']) ?></option>
                        <?php endif ?>
                    <?php endforeach; ?>
                    </select>

                    <!-- Post categories -->
                    <select data-param="post_categories" name="post_categories" class="multiple" multiple="multiple">
                        <option value="0"><?php ls_e("Don't filter categories", "LayerSlider") ?></option>
                    <?php foreach ($postCategories as $item) : ?>
                        <?php if (isset($slider['properties']['post_categories']) && in_array($item->term_id, $slider['properties']['post_categories'])) : ?>
                            <option value="<?php echo $item->term_id ?>" selected="selected"><?php echo $item->name ?></option>
                        <?php else : ?>
                            <option value="<?php echo $item->term_id ?>"><?php echo $item->name ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                    </select>

                    <!-- Post tags -->
                    <select data-param="post_tags" name="post_tags" class="multiple" multiple="multiple">
                        <option value="0"><?php ls_e("Don't filter tags", "LayerSlider") ?></option>
                    <?php foreach ($postTags as $item) : ?>
                        <?php if (isset($slider['properties']['post_tags']) && in_array($item->term_id, $slider['properties']['post_tags'])) : ?>
                            <option value="<?php echo $item->term_id ?>" selected="selected"><?php echo Tools::ucfirst($item->name) ?></option>
                        <?php else : ?>
                            <option value="<?php echo $item->term_id ?>"><?php echo Tools::ucfirst($item->name) ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                    </select>

                    <!-- Post taxonomies -->
                    <select data-param="post_taxonomy" name="post_taxonomy" class="ls-post-taxonomy">
                        <option value="0"><?php ls_e("Don't filter taxonomies", "LayerSlider") ?></option>
                    <?php foreach ($postTaxonomies as $key => $item) : ?>
                        <?php if (isset($slider['properties']['post_taxonomy']) && $slider['properties']['post_taxonomy'] == $key) : ?>
                            <option value="<?php echo $item->name ?>" selected="selected"><?php echo $item->labels->name ?></option>
                        <?php else : ?>
                            <option value="<?php echo $item->name ?>"><?php echo $item->labels->name ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                    </select>

                    <!-- Taxonomy terms -->
                    <select data-param="post_tax_terms" name="post_tax_terms" class="multiple" multiple="multiple">
                    </select>
                </div>
            </div>
            <h3 class="subheader clearfix">
                <div class="half"><?php echo ls_e('Order results by', 'LayerSlider') ?></div>
                <div class="half"><?php echo ls_e('On this slide', 'LayerSlider') ?></div>
            </h3>
            <div class="ls-post-adv-settings clearfix">

                <!-- Order  -->
                <div class="half">
                    <?php lsGetSelect($lsDefaults['slider']['postOrderBy'], $slider['properties'], array('data-param' => $lsDefaults['slider']['postOrderBy']['keys'])) ?>
                    <?php lsGetSelect($lsDefaults['slider']['postOrder'], $slider['properties'], array('data-param' => $lsDefaults['slider']['postOrder']['keys'])) ?>
                </div>

                <!-- Post offset -->
                <div class="half">
                    <?php ls_e('Get the ', 'LayerSlider') ?>
                    <select data-param="post_offset" name="post_offset" class="offset">
                        <option value="-1"><?php ls_e('following', 'LayerSlider') ?></option>
                    <?php for ($c = 0; $c < 50; $c++) : ?>
                        <option value="<?php echo $c ?>"><?php echo ls_ordinal_number($c+1) ?></option>
                    <?php endfor ?>
                    </select>
                </div>
            </div>
        </div>
        <h3 class="subheader preview-subheader"><?php ls_e('Preview from currenty matched elements', 'LayerSlider') ?></h3>
        <div class="ls-post-previews"><ul></ul></div>
    </div>
</div>
