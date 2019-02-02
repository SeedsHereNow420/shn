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
<script type="text/html" id="tmpl-upload-sliders">
    <div id="cp-upload-modal-window">
        <header>
            <h1><?php cp_e('Upload Popup') ?></h1>
            <b class="dashicons dashicons-no"></b>
        </header>
        <form method="post" enctype="multipart/form-data" class="km-ui-modal-scrollable">
            <p><?php cp_e('Here you can upload your previously exported popups. To import them to your site, you just need to choose and select the appropriate export file (files with .zip extensions), then press the Import Popups button.') ?></p><br>
            <input type="hidden" name="cp-import" value="1">
            <p class="centered center file">
                <input type="file" name="import_file" accept=".zip">
            </p>
            <button class="button button-primary button-hero"><?php cp_e('Import Popups') ?></button><br>
        </form>
    </div>
</script>