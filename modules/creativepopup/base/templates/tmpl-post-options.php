<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;
if (defined('CP_INCLUDE')) {
    $popup = null;
    $postTypes = $postCategories = $postTags = $postTaxonomies = null;
    $cpDefaults = null;
}

$queryArgs = array(
    'post_status' => 'publish',
    'limit' => 100,
    'posts_per_page' => 100,
    'suppress_filters' => false
);

if (!empty($popup['properties']['post_orderby'])) {
    $queryArgs['orderby'] = $popup['properties']['post_orderby'];
}
if (!empty($popup['properties']['post_order'])) {
    $queryArgs['order'] = $popup['properties']['post_order'];
}
if (!empty($popup['properties']['post_type'])) {
    $queryArgs['post_type'] = $popup['properties']['post_type'];
}
if (!empty($popup['properties']['post_categories'][0])) {
    $queryArgs['category__in'] = $popup['properties']['post_categories'];
}
if (!empty($popup['properties'][0])) {
    $queryArgs['tag__in'] = $popup['properties']['post_tags'];
}
if (!empty($popup['properties']['post_taxonomy']) && !empty($popup['properties']['post_tax_terms'])) {
    $queryArgs['tax_query'][] = array(
        'taxonomy' => $popup['properties']['post_taxonomy'],
        'field' => 'id',
        'terms' => $popup['properties']['post_tax_terms']
    );
}

$posts = CpPosts::find($queryArgs)->getParsedObject();
?>
<script type="text/javascript" class="cp-hidden" id="cp-posts-json">window.lsPostsJSON = <?php echo $posts ? Tools::jsonEncode($posts) : '[]' ?>;</script>
<div id="cp-post-options">
    <div class="cp-box cp-modal cp-configure-posts-modal">
        <h2 class="header">
            <?php cp_e('Find products with the filters below') ?>
            <a href="#" class="dashicons dashicons-no"></a>
        </h2>
        <div style="text-align: right; padding: 5px;">
            <label><?php cp_e('Advanced') ?></label><input type="checkbox" id="cp-post-settings-adv">
        </div>
        <div class="cp-post-basic" style="width: 140px; margin: 0 auto 10px;">
            <label><input type="radio" name="post_basic" value="date_add"> <?php cp_e('New Arrivals') ?></label><br>
            <label><input type="radio" name="post_basic" value="position"> <?php cp_e('Popular') ?></label><br>
            <label><input type="radio" name="post_basic" value="quantity"> <?php cp_e('Best Sellers') ?></label><br>
            <label><input type="radio" name="post_basic" value="reduction"> <?php cp_e('Special') ?></label>
        </div>
        <div class="cp-post-advanced">
            <div class="inner clearfix">
                <div class="cp-post-filters clearfix">

                    <!-- Post types -->
                    <select data-param="post_type" name="post_type" class="multiple" multiple="multiple">
                    <?php foreach ($postTypes as $item) : ?>
                        <?php if (isset($popup['properties']['post_type']) &&  in_array($item['slug'], $popup['properties']['post_type'])) : ?>
                            <option value="<?php echo $item['slug'] ?>" selected="selected"><?php echo Tools::ucfirst($item['name']) ?></option>
                        <?php else : ?>
                            <option value="<?php echo $item['slug'] ?>"><?php echo Tools::ucfirst($item['name']) ?></option>
                        <?php endif ?>
                    <?php endforeach; ?>
                    </select>

                    <!-- Post categories -->
                    <select data-param="post_categories" name="post_categories" class="multiple" multiple="multiple">
                        <option value="0"><?php cp_e("Don't filter categories") ?></option>
                    <?php foreach ($postCategories as $item) : ?>
                        <?php if (isset($popup['properties']['post_categories']) && in_array($item->term_id, $popup['properties']['post_categories'])) : ?>
                            <option value="<?php echo $item->term_id ?>" selected="selected"><?php echo $item->name ?></option>
                        <?php else : ?>
                            <option value="<?php echo $item->term_id ?>"><?php echo $item->name ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                    </select>

                    <!-- Post tags -->
                    <select data-param="post_tags" name="post_tags" class="multiple" multiple="multiple">
                        <option value="0"><?php cp_e("Don't filter tags") ?></option>
                    <?php foreach ($postTags as $item) : ?>
                        <?php if (isset($popup['properties']['post_tags']) && in_array($item->term_id, $popup['properties']['post_tags'])) : ?>
                            <option value="<?php echo $item->term_id ?>" selected="selected"><?php echo Tools::ucfirst($item->name) ?></option>
                        <?php else : ?>
                            <option value="<?php echo $item->term_id ?>"><?php echo Tools::ucfirst($item->name) ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                    </select>

                    <!-- Post taxonomies -->
                    <select data-param="post_taxonomy" name="post_taxonomy" class="cp-post-taxonomy">
                        <option value="0"><?php cp_e("Don't filter taxonomies") ?></option>
                    <?php foreach ($postTaxonomies as $key => $item) : ?>
                        <?php if (isset($popup['properties']['post_taxonomy']) && $popup['properties']['post_taxonomy'] == $key) : ?>
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
                <div class="half"><?php echo cp_e('Order results by') ?></div>
                <div class="half"><?php echo cp_e('On this page') ?></div>
            </h3>
            <div class="cp-post-adv-settings clearfix">

                <!-- Order  -->
                <div class="half">
                    <?php cp_get_select($cpDefaults['slider']['postOrderBy'], $popup['properties'], array('data-param' => $cpDefaults['slider']['postOrderBy']['keys'])) ?>
                    <?php cp_get_select($cpDefaults['slider']['postOrder'], $popup['properties'], array('data-param' => $cpDefaults['slider']['postOrder']['keys'])) ?>
                </div>

                <!-- Post offset -->
                <div class="half">
                    <?php cp_e('Get the ') ?>
                    <select data-param="post_offset" name="post_offset" class="offset">
                        <option value="-1"><?php cp_e('following') ?></option>
                    <?php for ($c = 0; $c < 50; $c++) : ?>
                        <option value="<?php echo $c ?>"><?php echo cp_ordinal_number($c+1) ?></option>
                    <?php endfor ?>
                    </select>
                </div>
            </div>
        </div>
        <h3 class="subheader preview-subheader"><?php cp_e('Preview from currenty matched elements') ?></h3>
        <div class="cp-post-previews"><ul></ul></div>
    </div>
</div>
