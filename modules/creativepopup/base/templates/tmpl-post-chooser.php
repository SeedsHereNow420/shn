<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;
?>
<script type="text/html" id="tmpl-post-chooser">
    <div id="cp-post-chooser-modal-window">
        <header>
            <h1><?php cp_e('Select the Post, Page or Attachment you want to use') ?></h1>
            <b class="dashicons dashicons-no"></b>
        </header>
        <div class="km-ui-modal-scrollable">
            <form method="post">
                <input type="hidden" name="action" value="cp_get_search_posts">
                <div class="search-holder">
                    <input type="search" name="s" placeholder="<?php cp_e('Type here to search ...') ?>">
                </div>
                <select name="post_type">
                    <option value="page"><?php cp_e('Pages') ?></option>
                    <option value="post"><?php cp_e('Posts') ?></option>
                    <option value="attachment"><?php cp_e('Attachments') ?></option>
                </select>
            </form>

            <div class="results cp-post-previews">
                <ul>

                </ul>
            </div>

        </div>
    </div>
</script>
