<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;
?>
<script type="text/html" id="tmpl-post-chooser">
    <div id="ls-post-chooser-modal-window">
        <header>
            <h1><?php ls_e('Select the Post, Page or Attachment you want to use', 'LayerSlider') ?></h1>
            <b class="dashicons dashicons-no"></b>
        </header>
        <div class="km-ui-modal-scrollable">
            <form method="post">
                <?php ls_nonce_field('ls_get_search_posts') ?>
                <input type="hidden" name="action" value="ls_get_search_posts">
                <div class="search-holder">
                    <input type="search" name="s" placeholder="<?php ls_e('Type here to search ...', 'LayerSlider') ?>">
                </div>
                <select name="post_type">
                    <option value="page"><?php ls_e('Pages', 'LayerSlider') ?></option>
                    <option value="post"><?php ls_e('Posts', 'LayerSlider') ?></option>
                    <option value="attachment"><?php ls_e('Attachments', 'LayerSlider') ?></option>
                </select>
            </form>

            <div class="results ls-post-previews">
                <ul>

                </ul>
            </div>

        </div>
    </div>
</script>
