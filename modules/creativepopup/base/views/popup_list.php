<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

// Get screen options
$cpScreenOptions = cp_get_option('cp-screen-options', '0');
$cpScreenOptions = ($cpScreenOptions == 0) ? array() : $cpScreenOptions;
$cpScreenOptions = is_array($cpScreenOptions) ? $cpScreenOptions : unserialize($cpScreenOptions);

// Defaults
if (!isset($cpScreenOptions['showTooltips'])) {
    $cpScreenOptions['showTooltips'] = 'true';
}
if (!isset($cpScreenOptions['numberOfSliders'])) {
    $cpScreenOptions['numberOfSliders'] = '25';
}

// Get current page
$curPage = (!empty(${'_GET'}['paged']) && is_numeric(${'_GET'}['paged'])) ? (int) ${'_GET'}['paged'] : 1;

// Set filters
$userFilters = false;
$showAllSlider = false;

$urlParamFilter = 'published';
$urlParamOrder     = 'date_c';
$urlParamTerm     = '';

$filters = array(
    'orderby' => 'date_c',
    'order' => 'DESC',
    'page' => $curPage,
    'limit' => (int) $cpScreenOptions['numberOfSliders']
);

if (! empty(${'_GET'}['filter']) && ${'_GET'}['filter'] === 'all') {
    $showAllSlider = true;
    $urlParamFilter = htmlentities(${'_GET'}['filter']);
    $filters['exclude'] = array();
}

if (! empty(${'_GET'}['order'])) {
    $urlParamOrder = ${'_GET'}['order'];
    $filters['orderby'] = htmlentities(${'_GET'}['order']);

    if (${'_GET'}['order'] === 'name') {
        $filters['order'] = 'ASC';
    }
}

if (! empty(${'_GET'}['term'])) {
    $userFilters = true;
    $urlParamTerm = htmlentities(${'_GET'}['term']);
    $filters['where'] = "name LIKE '%".cp_esc_sql(${'_GET'}['term'])."%'";
}

// Find popups
$popups = CpInstances::find($filters);

// Pager
$maxItem = CpInstances::$count;
$maxPage = ceil($maxItem / (int) $cpScreenOptions['numberOfSliders']);
$maxPage = $maxPage ? $maxPage : 1;

$layout = cp_get_user_meta(cp_get_current_user_id(), 'cp-popups-layout');

// Custom capability
$custom_capability = $custom_role = cp_get_option('cp_custom_capability', 'manage_options');
$default_capabilities = array('manage_network', 'manage_options', 'publish_pages', 'publish_posts', 'edit_posts');

if (in_array($custom_capability, $default_capabilities)) {
    $custom_capability = '';
} else {
    $custom_role = 'custom';
}

// Google Fonts
$googleFonts = cp_get_option('cp-google-fonts', array());
$googleFontScripts = cp_get_option('cp-google-font-scripts', array('latin', 'latin-ext'));

$importSliderCount = !empty(${'_GET'}['popupCount']) ? (int)${'_GET'}['popupCount'] : 0;

// Notification messages
$notifications = array(

    'cacheEmpty' => cp__('Successfully emptied Creative Popup caches.'),
    'updateStore' => cp__('Successfully updated the Template Store library.'),

    'publishSelectError' => cp__('No popups were selected to publish.'),
    'publishSuccess' => cp__('The selected popups are published.'),

    'unpublishSelectError' => cp__('No popups were selected to unpublish.'),
    'unpublishSuccess' => cp__('The selected popups are unpublished.'),

    'removeSelectError' => cp__('No popups were selected to remove.'),
    'removeSuccess' => cp__('The selected popups were removed.'),

    'duplicateSuccess' => cp__('The selected popups were duplicated.'),

    'deleteSelectError' => cp__('No popups were selected.'),
    'deleteSuccess' => cp__('The selected popups were permanently deleted.'),
    'mergeSelectError' => cp__('You need to select at least 2 popups to merge them.'),
    'mergeSuccess' => cp__('The selected items were merged together as a new popup.'),
    'restoreSelectError' => cp__('No popups were selected.'),
    'restoreSuccess' => cp__('The selected popups were restored.'),

    'exportNotFound' => cp__('No popups were found to export.'),
    'exportSelectError' => cp__('No popups were selected to export.'),
    'exportZipError' => cp__('The PHP ZipArchive extension is required to import .zip files.'),

    'importSelectError' => cp__('Choose a file to import popups.'),
    'importFailed' => cp__('The import file seems to be invalid or corrupted.'),
    'importSuccess' => sprintf(cp_n('%d popup has been successfully imported.', '%d popups has been successfully imported.', $importSliderCount), $importSliderCount),

    'permissionError' => cp__('Your account does not have the necessary permission you have chosen, and your settings have not been saved in order to prevent locking yourself out of the plugin.'),
    'permissionSuccess' => cp__('Permission changes has been updated.'),
    'googleFontsUpdated' => cp__('Your Google Fonts library has been updated.'),
    'generalUpdated' => cp__('Your settings has been updated.')
);
?>

<script type="text/javascript">
    window.lsSiteActivation = true;
</script>

<div id="cp-screen-options" class="metabox-prefs hidden">
    <div id="screen-options-wrap" class="hidden">
        <form id="cp-screen-options-form" method="post" novalidate>
            <h5><?php cp_e('Show on screen') ?></h5>
            <label><input type="checkbox" name="showTooltips"<?php echo $cpScreenOptions['showTooltips'] == 'true' ? ' checked="checked"' : ''?>> <?php cp_e('Tooltips') ?></label><br>
            <label><input type="checkbox" id="showAllSlider"<?php echo $showAllSlider ? ' checked="checked"' : ''?>> <?php cp_e('Show all popups (including removed)') ?></label><br><br>

            <?php cp_e('Show me') ?> <input type="number" name="numberOfSliders" min="8" step="4" value="<?php echo $cpScreenOptions['numberOfSliders'] ?>"> <?php cp_e('popups per page') ?>
            <button class="button"><?php cp_e('Apply') ?></button>
        </form>
    </div>
    <div id="screen-options-link-wrap" class="hide-if-no-js screen-meta-toggle">
        <button type="button" id="show-settings-link" class="button show-settings" aria-controls="screen-options-wrap" aria-expanded="false"><?php cp_e('Screen Options') ?></button>
    </div>
</div>

<!-- PS hack to place notification at the top of page -->
<div class="wrap cp-ps-hack">
    <h2></h2>

    <!-- Error messages -->
    <?php if (isset(${'_GET'}['message'])) : ?>
        <div class="cp-notification large <?php echo isset(${'_GET'}['error']) ? 'error' : 'updated' ?>">
            <div><?php echo $notifications[ ${'_GET'}['message'] ] ?></div>
        </div>
    <?php endif; ?>
    <!-- End of error messages -->
</div>

<div class="wrap" id="cp-list-page">
    <br>

    <!-- Add popup template -->
    <?php include CP_ROOT_PATH . '/templates/tmpl-add-slider-list.php'; ?>
    <?php include CP_ROOT_PATH . '/templates/tmpl-add-slider-grid.php'; ?>

    <!-- Importing template -->
    <?php include CP_ROOT_PATH . '/templates/tmpl-importing.php'; ?>

    <!-- Import sample popups template -->
    <?php include CP_ROOT_PATH . '/templates/tmpl-upload-sliders.php'; ?>

    <!-- Share sheet template -->
    <?php include CP_ROOT_PATH . '/templates/tmpl-share-sheet.php'; ?>



    <!-- Popup Filters -->
    <form method="get" id="cp-slider-filters">
        <div class="logo">
            <img src="../modules/creativepopup/logo.png" width="42" height="42" alt="logo">
            <h2><?php cp_e('Creative Popup') ?></h2>
            <span style="letter-spacing: 4px;">&nbsp;|&nbsp;</span>
            <span><?php cp_e('Your popups') ?></span>
        </div>

        <div class="right">
            <a class="button cp-green-button" href="#" id="cp-add-slider-button">
                <i class="add dashicons dashicons-plus"></i>
                <span><?php cp_e('Add New Popup') ?></span>
            </a>
        </div>

        <div class="right">
            <a class="button cp-blue-button" href="#" id="cp-import-button" title="<?php cp_e('Import Popups') ?>">
                <i class="import dashicons dashicons-upload" style="margin-right:0"></i>
            </a>
        </div>

        <div class="right" style="position:relative">
            <input type="search" name="term" placeholder="<?php cp_e('Filter by name') ?>" value="<?php echo ! empty(${'_GET'}['term']) ? htmlentities(${'_GET'}['term']) : '' ?>">
            <button class="dashicons dashicons-search"></button>
        </div>

        <input type="hidden" name="filter" value="<?php echo $showAllSlider ? 'all' : '' ?>">
        <input type="hidden" name="order" value="<?php echo $filters['orderby'] ?>">
    </form>

    <form method="post" class="cp-slider-list-form">
        <input type="hidden" name="cp-bulk-action" value="1">

        <div>

        <!-- List View -->
        <?php if ($layout !== 'grid') : ?>
            <div class="cp-sliders-list">
                <a class="button import-templates" href="#" id="cp-import-samples-button" style="display:none">
                    <i class="import dashicons dashicons-star-filled"></i>
                    <span><?php cp_e('Template Store') ?></span>
                </a>

                <?php if (! empty($popups)) : ?>
                    <div class="cp-box">
                        <table>
                            <thead class="header">
                                <tr>
                                    <td></td>
                                    <td data-orderby="id" class="<?php echo $filters['orderby'] == 'id' ? $filters['order'] : '' ?>"><?php cp_e('ID') ?></td>
                                    <td class="preview-td"><?php cp_e('Popup preview') ?></td>
                                    <td data-orderby="name" class="<?php echo $filters['orderby'] == 'name' ? $filters['order'] : '' ?>"><?php cp_e('Name') ?></td>
                                    <td><?php cp_e('Published') ?></td>
                                    <td><?php cp_e('Status') ?></td>
                                    <td data-orderby="schedule_start" class="<?php echo $filters['orderby'] == 'schedule_start' ? $filters['order'] : '' ?>"><?php cp_e('Start on') ?></td>
                                    <td data-orderby="schedule_end" class="<?php echo $filters['orderby'] == 'schedule_end' ? $filters['order'] : '' ?>"><?php cp_e('Stop on') ?></td>
                                    <td><?php cp_e('Pages') ?></td>
                                    <td data-orderby="date_c" class="<?php echo $filters['orderby'] == 'date_c' ? $filters['order'] : '' ?>"><?php cp_e('Created') ?></td>
                                    <td data-orderby="date_m" class="<?php echo $filters['orderby'] == 'date_m' ? $filters['order'] : '' ?>"><?php cp_e('Modified') ?></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $time = time() ?>
                            <?php foreach ($popups as $key => $item) :
                                $class = $item['flag_deleted'] == '1' ? ' dimmed' : ($item['flag_hidden'] ? '' : ' published');
                                $color = !empty($item['schedule_start']) && $item['schedule_start'] > $time ? 'orange' : (
                                    !empty($item['schedule_end']) && $item['schedule_end'] < $time ? 'red' : 'green'
                                );
                                $preview = cp_apply_filters('cp_preview_for_popup', $item); ?>
                                <tr class="slider-item<?php echo $class ?>" data-id="<?php echo $item['id'] ?>">
                                    <td><input type="checkbox" name="sliders[]" value="<?php echo $item['id'] ?>"></td>
                                    <td><span><?php echo $item['id'] ?></span></td>
                                    <td class="preview-td">
                                        <a class="preview" style="background-image: url(<?php echo  ! empty($preview) ? $preview : CP_VIEWS_URL . 'img/admin/blank.gif' ?>);" href="<?php echo cp_admin_url('?controller=AdminCreativePopup&action=edit&id='.$item['id']) ?>">

                                        </a>
                                    </td>
                                    <td class="name">
                                        <a href="<?php echo cp_admin_url('?controller=AdminCreativePopup&action=edit&id='.$item['id']) ?>">
                                            <?php echo cp_apply_filters('cp_popup_title', cp_ss($item['name']), 40) ?>
                                        </a>
                                    </td>
                                    <td><input type="checkbox" <?php echo $item['flag_hidden'] ? '' : 'checked' ?> class="cp-publish-checkbox hidden"></td>
                                    <td><i class="cp-state" style="background:<?php echo $color ?>"></i></td>
                                    <td><span><?php echo empty($item['schedule_start']) ? '' : date('d/m/Y H:i', $item['schedule_start']) ?></span></td>
                                    <td><span><?php echo empty($item['schedule_end']) ? '' : date('d/m/Y H:i', $item['schedule_end']) ?></span></td>
                                    <td><span><?php echo isset($item['data']['layers']) ? count($item['data']['layers']) : 0 ?></span></td>
                                    <td><span><?php echo date('d/m/Y', $item['date_c']) ?></span></td>
                                    <td><span title="<?php echo date('d/m/Y H:i', $item['date_m']) ?>"><?php echo cp_human_time_diff($item['date_m']) ?> <?php cp_e('ago') ?></span></td>
                                    <td class="center">
                                    <?php if (!$item['flag_deleted']) : ?>
                                        <span class="slider-actions dashicons dashicons-arrow-down-alt2"
                                            data-id="<?php echo $item['id'] ?>"
                                            data-export-url="<?php echo cp_admin_url('?controller=AdminCreativePopup&action=export&id='.$item['id'], 'export-sliders') ?>"
                                            data-duplicate-url="<?php echo cp_admin_url('?controller=AdminCreativePopup&action=duplicate&id='.$item['id'], 'duplicate_'.$item['id']) ?>"
                                            data-revisions-url="<?php echo cp_admin_url('?controller=AdminCreativePopupRevisions&id='.$item['id']) ?>"
                                            data-remove-url="<?php echo cp_admin_url('?controller=AdminCreativePopup&action=remove&id='.$item['id'], 'remove_'.$item['id']) ?>">
                                        </span>
                                    <?php else : ?>
                                        <a href="<?php echo cp_admin_url('?controller=AdminCreativePopup&action=restore&id='.$item['id'], 'restore_'.$item['id']) ?>">
                                            <span class="dashicons dashicons-backup" data-help="<?php cp_e('Restore removed popup') ?>"></span>
                                        </a>
                                    <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>

                        <!-- Popup actions template -->
                        <div id="cp-slider-actions-template" class="cp-pointer cp-box cp-hidden">
                            <span class="cp-mce-arrow"></span>
                            <ul class="inner">
                                <li>
                                    <a href="#">
                                        <i class="dashicons dashicons-share-alt2"></i>
                                        <?php cp_e('Export') ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="dashicons dashicons-admin-page"></i>
                                        <?php cp_e('Duplicate') ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="dashicons dashicons-backup"></i>
                                        <?php cp_e('Revisions') ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="remove">
                                        <i class="dashicons dashicons-trash"></i>
                                        <?php cp_e('Remove') ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End of Popup actions template -->
                    </div>
                <?php endif ?>
            </div>
        <?php else : ?>
            <!-- Popup List -->
            <div class="cp-sliders-grid clearfix">

                <div class="slider-item hero import-templates">
                    <div class="slider-item-wrapper">
                        <a href="#" id="cp-import-samples-button" class="preview import-templates">
                            <i class="import dashicons dashicons-star-filled"></i>
                            <span><?php cp_e('Template Store') ?></span>
                        </a>
                    </div>
                </div>
                <div class="slider-item hero">
                    <div class="slider-item-wrapper">
                        <a href="#" id="cp-import-button" class="preview">
                            <i class="import dashicons dashicons-upload"></i>
                            <span><?php cp_e('Import Popups') ?></span>
                        </a>
                    </div>
                </div>
                <div class="slider-item hero">
                    <div class="slider-item-wrapper">
                        <a href="#" id="cp-add-slider-button" class="preview">
                            <i class="add dashicons dashicons-plus"></i>
                            <span><?php cp_e('Add New Popup') ?></span>
                        </a>
                    </div>
                </div>
                <?php if (! empty($popups)) : ?>
                    <?php foreach ($popups as $key => $item) :
                        $class = ($item['flag_deleted'] == '1') ? 'dimmed' : '';
                        $preview = cp_apply_filters('cp_preview_for_popup', $item); ?>
                        <div class="slider-item <?php echo $class ?>">
                            <div class="slider-item-wrapper">
                                <input type="checkbox" name="sliders[]" class="checkbox cp-hover" value="<?php echo $item['id'] ?>">
                                <?php if (!$item['flag_deleted']) : ?>
                                    <span class="cp-hover slider-actions dashicons dashicons-arrow-down-alt2"></span>
                                <?php else : ?>
                                    <a href="<?php echo cp_admin_url('?controller=AdminCreativePopup&action=restore&id='.$item['id'], 'restore_'.$item['id']) ?>">
                                        <span class="cp-hover dashicons dashicons-backup" data-help="<?php cp_e('Restore removed popup') ?>"></span>
                                    </a>
                                <?php endif; ?>
                                <a class="preview" style="background-image: url(<?php echo  ! empty($preview) ? $preview : CP_VIEWS_URL . 'img/admin/blank.gif' ?>);" href="<?php echo cp_admin_url('?controller=AdminCreativePopup&action=edit&id='.$item['id']) ?>">
                                <?php if (empty($preview)) : ?>
                                    <div class="no-preview">
                                        <h5><?php cp_e('No Preview') ?></h5>
                                        <small><?php cp_e('Previews are automatically generated from page images in popups.') ?></small>
                                    </div>
                                <?php endif ?>
                                </a>
                                <div class="info">
                                    <div class="name">
                                        <?php echo cp_apply_filters('cp_popup_title', cp_ss($item['name']), 40) ?>
                                    </div>
                                </div>

                                <ul class="slider-actions-sheet cp-hidden">
                                    <li>
                                        <a href="<?php echo cp_admin_url('?controller=AdminCreativePopup&action=export&id='.$item['id'], 'export-sliders') ?>">
                                            <i class="dashicons dashicons-share-alt2"></i>
                                            <?php cp_e('Export') ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo cp_admin_url('?controller=AdminCreativePopup&action=duplicate&id='.$item['id'], 'duplicate_'.$item['id']) ?>">
                                            <i class="dashicons dashicons-admin-page"></i>
                                            <?php cp_e('Duplicate') ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo cp_admin_url('?controller=AdminCreativePopupRevisions&id='.$item['id']) ?>">
                                            <i class="dashicons dashicons-backup"></i>
                                            <?php cp_e('Revisions') ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo cp_admin_url('?controller=AdminCreativePopup&action=remove&id='.$item['id'], 'remove_'.$item['id']) ?>" class="remove">
                                            <i class="dashicons dashicons-trash"></i>
                                            <?php cp_e('Remove') ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif ?>
            </div>
        <?php endif ?>

        <!-- No Popups Notification -->
        <?php if (empty($popups)) : ?>
            <div id="cp-no-sliders">
            <?php if ($userFilters) : ?>
                <div class="cp-notification-info">
                    <i class="dashicons dashicons-info"></i>
                    <span><?php echo sprintf(cp__('No popups found with the current filters set. %sClick here%s to reset filters.'), '<a href="'.cp_admin_url('?controller=AdminCreativePopup').'">', '</a>') ?></span>
                </div>
            <?php else : ?>
                <img src="../modules/creativepopup/views/img/admin/tools.png" alt="Icon">
                <h3><?php cp_e('Create your first popup') ?></h3>
                <p><?php cp_e('Build a newsletter popup to increase your  subscribers. Lunch a discount campaign to improve your conversions rate. Or create login, register, contact forms.') ?></p>
                <a class="button cp-green-button cp-add-slider-button"><?php cp_e('Create Popup') ?></a>
            <?php endif ?>
            </div>
        <?php endif ?>
        </div>



        <?php if (! empty($popups)) : ?>
            <div>
                <div class="cp-bulk-actions">
                    <select name="action">
                        <option value="0"><?php cp_e('- Bulk Actions -') ?></option>
                        <?php if ($showAllSlider) : ?>
                            <option value="restore"><?php cp_e('Restore selected') ?></option>
                        <?php else : ?>
                            <option value="publish"><?php cp_e('Publish selected') ?></option>
                            <option value="unpublish"><?php cp_e('Unpublish selected') ?></option>
                        <?php endif; ?>
                        <option value="export"><?php cp_e('Export selected') ?></option>
                        <option value="remove"><?php cp_e('Remove selected') ?></option>
                        <option value="delete"><?php cp_e('Delete permanently') ?></option>
                        <option value="merge"><?php cp_e('Merge selected as new') ?></option>
                    </select>
                    <button class="button"><?php cp_e('Apply') ?></button>
                </div>
                <div class="cp-pagination bottom">
                    <div class="tablenav-pages">
                        <span class="displaying-num"><?php echo sprintf(cp_n('%d popup', '%d popups', $maxItem), $maxItem) ?></span>
                        <span class="pagination-links">
                            <a class="button first-page<?php echo ($curPage <= 1) ? ' disabled' : ''; ?>" title="Go to the first page" href="<?php echo cp_admin_url("?controller=AdminCreativePopup&filter=$urlParamFilter&term=$urlParamTerm&order=$urlParamOrder") ?>">«</a>
                            <a class="button prev-page <?php echo ($curPage <= 1) ? ' disabled' : ''; ?>" title="Go to the previous page" href="<?php echo cp_admin_url("?controller=AdminCreativePopup&paged=".($curPage-1)."&filter=$urlParamFilter&term=$urlParamTerm&order=$urlParamOrder") ?>">‹</a>

                            <span class="total-pages"><?php echo sprintf(cp__('%1$d of %2$d'), $curPage, $maxPage) ?> </span>

                            <a class="button next-page <?php echo ($curPage >= $maxPage) ? ' disabled' : ''; ?>" title="Go to the next page" href="<?php echo cp_admin_url("?controller=AdminCreativePopup&paged=".($curPage+1)."&filter=$urlParamFilter&term=$urlParamTerm&order=$urlParamOrder") ?>">›</a>
                            <a class="button last-page <?php echo ($curPage >= $maxPage) ? ' disabled' : ''; ?>" title="Go to the last page" href="<?php echo cp_admin_url("?controller=AdminCreativePopup&paged=$maxPage&filter=$urlParamFilter&term=$urlParamTerm&order=$urlParamOrder") ?>">»</a>
                        </span>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </form>


    <div class="km-tabs cp-plugin-settings-tabs">
        <a href="#" class="active"><?php cp_e('Google Fonts') ?></a>
        <a href="#"><?php cp_e('Advanced') ?></a>
    </div>
    <div class="km-tabs-content cp-plugin-settings">

        <!-- Google Fonts -->
        <div class="active">
            <figure><?php cp_e('Choose from hundreds of custom fonts faces provided by Google Fonts') ?></figure>
            <form method="post" class="cp-box km-tabs-inner cp-google-fonts">
                <input type="hidden" name="cp-save-google-fonts" value="1">

                <!-- Google Fonts list -->
                <div class="inner">
                    <ul class="cp-font-list">
                        <li class="cp-hidden">
                            <a href="#" class="remove dashicons dashicons-dismiss" title="Remove this font"></a>
                            <input type="text" data-name="urlParams" readonly>
                            <input type="checkbox" data-name="onlyOnAdmin">
                            <?php cp_e('Load only on admin interface') ?>
                        </li>
                        <?php if (is_array($googleFonts) && !empty($googleFonts)) : ?>
                            <?php foreach ($googleFonts as $item) : ?>
                                <li>
                                    <a href="#" class="remove dashicons dashicons-dismiss" title="Remove this font"></a>
                                    <input type="text" data-name="urlParams" value="<?php echo htmlspecialchars($item['param']) ?>" readonly>
                                    <input type="checkbox" data-name="onlyOnAdmin" <?php echo $item['admin'] ? ' checked="checked"' : '' ?>>
                                    <?php cp_e('Load only on admin interface') ?>
                                </li>
                            <?php endforeach ?>
                        <?php else : ?>
                            <li class="cp-notice"><?php cp_e("You haven't added any Google font to your library yet.") ?></li>
                        <?php endif ?>
                    </ul>
                </div>
                <div class="inner cp-font-search">

                    <input type="text" placeholder="<?php cp_e('Enter a font name to add to your collection') ?>">
                    <button class="button"><?php cp_e('Search') ?></button>

                    <!-- Google Fonts search pointer -->
                    <div class="cp-box cp-pointer">
                        <h3 class="header"><?php cp_e('Choose a font family') ?></h3>
                        <div class="fonts">
                            <ul class="inner"></ul>
                        </div>
                        <div class="variants">
                            <ul class="inner"></ul>
                            <div class="inner">
                                <button class="button add-font"><?php cp_e('Add font') ?></button>
                                <button class="button right"><?php cp_e('Back to results') ?></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Google Fonts search bar -->
                <div class="inner footer">
                    <button type="submit" class="button"><?php cp_e('Save changes') ?></button>
                    <?php
                    $scripts = array(
                        'arabic' => cp__('Arabic'),
                        'bengali' => cp__('Bengali'),
                        'cyrillic' => cp__('Cyrillic'),
                        'cyrillic-ext' => cp__('Cyrillic Extended'),
                        'devanagari' => cp__('Devanagari'),
                        'greek' => cp__('Greek'),
                        'greek-ext' => cp__('Greek Extended'),
                        'gujarati' => cp__('Gujarati'),
                        'gurmukhi' => cp__('Gurmukhi'),
                        'hebrew' => cp__('Hebrew'),
                        'kannada' => cp__('Kannada'),
                        'khmer' => cp__('Khmer'),
                        'latin' => cp__('Latin'),
                        'latin-ext' => cp__('Latin Extended'),
                        'malayalam' => cp__('Malayalam'),
                        'myanmar' => cp__('Myanmar'),
                        'oriya' => cp__('Oriya'),
                        'sinhala' => cp__('Sinhala'),
                        'tamil' => cp__('Tamil'),
                        'telugu' => cp__('Telugu'),
                        'thai' => cp__('Thai'),
                        'vietnamese' => cp__('Vietnamese')
                    );
                    ?>
                    <div class="right">
                        <div>
                            <select>
                                <option><?php cp_e('Select new') ?></option>
                                <?php foreach ($scripts as $key => $val) : ?>
                                    <option value="<?php echo $key ?>"><?php echo $val ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <ul class="cp-google-font-scripts">
                            <li class="cp-hidden">
                                <span></span>
                                <a href="#" class="dashicons dashicons-dismiss" title="<?php cp_e('Remove character set') ?>"></a>
                                <input type="hidden" name="scripts[]" value="">
                            </li>
                            <?php if (!empty($googleFontScripts) && is_array($googleFontScripts)) : ?>
                                <?php foreach ($googleFontScripts as $item) : ?>
                                    <li>
                                        <span><?php echo $scripts[$item] ?></span>
                                        <a href="#" class="dashicons dashicons-dismiss" title="<?php cp_e('Remove character set') ?>"></a>
                                        <input type="hidden" name="scripts[]" value="<?php echo $item ?>">
                                    </li>
                                <?php endforeach ?>
                            <?php else : ?>
                                <li>
                                    <span>Latin</span>
                                    <a href="#" class="dashicons dashicons-dismiss" title="<?php cp_e('Remove character set') ?>"></a>
                                    <input type="hidden" name="scripts[]" value="latin">
                                </li>
                            <?php endif ?>
                        </ul>
                        <div><?php cp_e('Use character sets:') ?></div>
                    </div>
                </div>

            </form>
        </div>

        <!-- Advanced -->
        <div class="cp-global-settings">
            <figure>
                <?php cp_e('Troubleshooting &amp; Advanced Settings') ?>
                <span class="warning"><?php cp_e("Don't change these options without experience, incorrect settings might break your site.") ?></span>
            </figure>
            <form method="post" class="cp-box km-tabs-inner">
                <input type="hidden" name="cp-save-advanced-settings">

                <table>
                    <tr class="cp-cache-options">
                        <td><?php cp_e('Use popup markup caching') ?></td>
                        <td><input type="checkbox" name="use_cache" <?php echo cp_get_option('cp_use_cache', true) ? 'checked="checked"' : '' ?>></td>
                        <td class="desc">
                            <?php cp_e('Enabled caching can drastically increase the plugin performance and spare your server from unnecessary load.') ?>
                            <a href="<?php echo cp_admin_url('?controller=AdminCreativePopup&action=empty_caches', 'empty_caches') ?>" class="button button-small"><?php cp_e('Empty caches') ?></a>
                        </td>
                    </tr>
                    <tr>
                        <td><?php cp_e('Load uncompressed JS files') ?></td>
                        <td><input type="checkbox" name="load_unpacked" <?php echo cp_get_option('cp_load_unpacked', false) ? 'checked="checked"' : '' ?>></td>
                        <td class="desc"><?php cp_e('Switch this option on if you want to debug the code.') ?></td>
                    </tr>
                    <tr>
                        <td><?php cp_e('Use GreenSock (GSAP) sandboxing') ?></td>
                        <td><input type="checkbox" name="gsap_sandboxing" <?php echo cp_get_option('ls_gsap_sandboxing', false) ? 'checked="checked"' : '' ?>></td>
                        <td class="desc"><?php cp_e('Enabling GreenSock sandboxing can solve issues when other plugins are using multiple/outdated versions of this library.') ?></td>
                    </tr>
                    <tr>
                        <td><?php cp_e('Force load Origami plugin') ?></td>
                        <td><input type="checkbox" name="force_load_origami" <?php echo cp_get_option('cp_force_load_origami', false) ? 'checked="checked"' : '' ?>></td>
                        <td class="desc"><?php cp_e('Enable this option if your theme does not load the Origami effect.') ?></td>
                    </tr>
                    <tr>
                        <td><?php cp_e('Scripts priority') ?></td>
                        <td><input name="scripts_priority" value="<?php echo cp_get_option('cp_scripts_priority', 50) ?>" placeholder="50"></td>
                        <td class="desc"><?php cp_e('Used to specify the order in which scripts are loaded. Lower numbers correspond with earlier execution.') ?></td>
                    </tr>
                </table>
                <div class="footer">
                    <button type="submit" class="button"><?php cp_e('Save changes') ?></button>
                </div>
            </form>
        </div>

    </div>

    <div class="columns clearfix">
        <!-- Suggested Modules -->
        <div class="third">
            <h2>
                <?php cp_e('Suggested modules for your store') ?>
                <a class="button dashicons-arrow-right"></a>
                <a class="button dashicons-arrow-left"></a>
            </h2>
            <div class="cp-box cp-product-banner cp-suggested-modules">
                <div class="inner active no-offer" style="display:none">
                    <img src="../modules/creativepopup/views/img/admin/handshake.png" alt="Icon">
                    <h3><?php cp_e('Congratulations!') ?></h3>
                    <span class="dev"><?php cp_e('You have all of our suggested modules!') ?></span>
                </div>
            </div>
        </div>
        <!-- WebshopWorks Newsletter -->
        <div class="third">
            <h2><?php cp_e('Subscribe to our newsletter') ?></h2>
            <div class="cp-box cp-product-banner cp-newsletter">
                <div class="inner">
                    <ul>
                        <li>
                            <i class="dashicons dashicons-megaphone"></i>
                            <strong><?php cp_e('Stay Updated') ?></strong>
                            <small><?php cp_e('News about the latest features and other product info.') ?></small>
                        </li>
                        <li>
                            <i class="dashicons dashicons-heart"></i>
                            <strong><?php cp_e('Sneak Peak on Product Updates') ?></strong>
                            <small><?php cp_e('Access to all the cool new features before anyone else.') ?></small>
                        </li>
                        <li>
                            <i class="dashicons dashicons-smiley"></i>
                            <strong><?php cp_e('Provide Feedback') ?></strong>
                            <small><?php cp_e('Participate in various programs and help us improving Creative Popup.') ?></small>
                        </li>
                    </ul>
                    <form method="post" action="https://creativepopup.webshopworks.com/#footer" target="_blank">
                        <input type="hidden" name="submitNewsletter" value="Subscribe">
                        <div class="email">
                            <input type="text" name="email" placeholder="<?php cp_e('Enter your email address') ?>">
                            <button class="button"><?php cp_e('Subscribe') ?></button>
                        </div>
                        <input type="hidden" name="action" value="0">
                    </form>
                </div>
            </div>
        </div>
        <!-- Product Support  -->
        <div class="third">
            <h2><?php cp_e('Product Support') ?></h2>
            <div class="cp-box cp-product-banner cp-product-support">
                <div class="inner">
                    <ul>
                        <li>
                            <i class="dashicons dashicons-book"></i>
                            <strong><?php cp_e('Read the documentation') ?></strong>
                            <small><?php cp_e('Get started with using Creative Popup.') ?></small>
                        </li>
                        <li>
                            <i class="dashicons dashicons-sos"></i>
                            <strong><?php cp_e('Browse the FAQs') ?></strong>
                            <small><?php cp_e('Find answers for common questions.') ?></small>
                        </li>
                        <li>
                            <i class="dashicons dashicons-groups"></i>
                            <strong><?php cp_e('Direct Support') ?></strong>
                            <small><?php cp_e('Get in touch with our Support Team.') ?></small>
                        </li>
                    </ul>
                    <a href="https://addons.prestashop.com/en/contact-us?id_product=39348" target="_blank" class="button"><?php cp_e('Contact the developer') ?></a>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    var lsScreenOptions = <?php echo Tools::jsonEncode($cpScreenOptions) ?>;
</script>
