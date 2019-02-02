<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

$l10n_ls = array(
    // General
    'save' => ls__('Save changes', 'LayerSlider'),
    'saving' => ls__('Saving ...', 'LayerSlider'),
    'saved' => ls__('Saved', 'LayerSlider'),
    'error' => ls__('ERROR', 'LayerSlider'),
    'untitled' => ls__('Untitled', 'LayerSlider'),
    'working' => ls__('Working ...', 'LayerSlider'),
    'stop' => ls__('Stop', 'LayerSlider'),

    'slideNoun' => ls_x('Slide', 'noun', 'LayerSlider'),
    'slideVerb' => ls_x('Slide', 'verb', 'LayerSlider'),
    'layer' => ls__('Layer', 'Layer'),

    'selectAll' => ls__('Select all', 'LayerSlider'),
    'deselectAll' => ls__('Deselect all', 'LayerSlider'),

    // Notify OSD
    'notifySliderSaved' => ls__('Slider saved successfully'),
    'notifyCaptureSlide' => ls__('Capturing page. This might take a moment ...'),

    // Sliders list
    'SLRemoveSlider' => ls__('Are you sure you want to remove this slider?', 'LayerSlider'),
    'SLUploadSlider' => ls__('Uploading, please wait ...', 'LayerSlider'),
    'SLEnterCode' => ls__('Please enter a valid Item Purchase Code. For more information, please click on the “Where’s my purchase code?” button.', 'LayerSlider'),
    'SLDeactivate' => ls__('Are you sure you want to deactivate this site?', 'LayerSlider'),
    'SLPermissions' => ls__('WARNING: This option controls who can access to this plugin, you can easily lock out yourself by accident. Please, make sure that you have entered a valid capability without whitespaces or other invalid characters. Do you want to proceed?', 'LayerSlider'),
    'SLJQueryConfirm' => ls__("Do not enable this option unless you're  experiencing issues with jQuery on your site. This option can easily cause unexpected issues when used incorrectly. Do you want to proceed?", 'LayerSlider'),
    'SLJQueryReminder' => ls__('Do not forget to disable this option later on if it does not help, or if you experience unexpected issues. This includes your entire site, not just LayerSlider.', 'LayerSlider'),

    'SLImporting' => ls__('Importing, please wait...', 'LayerSlider'),
    'SLImportError' => ls__('It seems there is a server issue that prevented LayerSlider from importing your selected slider. Please check LayerSlider -> System Status for potential errors, try to temporarily disable themes/plugins to rule out incompatibility issues or contact your hosting provider to resolve server configuration problems. In many cases retrying to import the same slider can help.', 'LayerSlider'),
    'SLImportHTTPError' => ls__('It seems there is a server issue that prevented LayerSlider from importing your selected slider. Please check LayerSlider -> System Status for potential errors, try to temporarily disable themes/plugins to rule out incompatibility issues or contact your hosting provider to resolve server configuration problems. In many cases retrying to import the same slider can help. Your HTTP server thrown the following error: \n\n %s', 'LayerSlider'),

    // Template Store
    'TSImportWarningTitle' => ls__('Activate your site to access premium templates.', 'LayerSlider'),
    'TSImportWarningContent' => sprintf(ls__('This template is only available for activated sites. Please review the PRODUCT ACTIVATION section on the main LayerSlider screen or %sclick here%s for more information.', 'LayerSlider'), '<a href=\"https://support.kreaturamedia.com/docs/layersliderwp/documentation.html#activation\" target=\"_blank\">', '</a>'),
    'TSVersionWarningTitle' => ls__('Plugin update required', 'LayerSlider'),
    'TSVersionWarningContent' => sprintf(ls__('This slider template requires a newer version of LayerSlider in order to work properly. This is due to additional features introduced in a later version than you have. For updating instructions, please refer to our %sonline documentation%s.', 'LayerSlider'), '<a href="https://support.kreaturamedia.com/docs/layersliderwp/documentation.html#updating" target="_blank">', '</a>'),

    // Google Fonts
    'GFEmptyList' => ls__("You haven't added any Google Font to your collection yet.", 'LayerSlider'),
    'GFEmptyCharset' => ls__('You need to have at least one character set added. Please select another item before removing this one.', 'LayerSlider'),
    'GFFontFamily' => ls__('Choose a font family', 'LayerSlider'),
    'GFFontVariant' => ls__('Select %s font variants', 'LayerSlider'),

    // Slider Builder
    'SBSlideTitle' => ls__('Slide #%d', 'LayerSlider'),
    'SBSlideCopyTitle' => ls__('Slide #%d copy', 'LayerSlider'),
    'SBLayerTitle' => ls__('Layer #%d', 'LayerSlider'),
    'SBLayerCopyTitle' => ls__('Layer #%d copy', 'LayerSlider'),
    'SBUndoLayer' => ls__('Layer settings', 'LayerSlider'),
    'SBUndoSlide' => ls__('Slide settings', 'LayerSlider'),
    'SBUndoNewLayer' => ls__('New layer', 'LayerSlider'),
    'SBUndoNewLayers' => ls__('New layers', 'LayerSlider'),
    'SBUndoVideoPoster' => ls__('Video poster', 'LayerSlider'),
    'SBUndoRemoveVideoPoster' => ls__('Remove video poster', 'LayerSlider'),
    'SBUndoLayerPosition' => ls__('Layer position', 'LayerSlider'),
    'SBUndoRemoveLayer' => ls__('Remove layer(s)', 'LayerSlider'),
    'SBUndoHideLayer' => ls__('Hide layer', 'LayerSlider'),
    'SBUndoLockLayer' => ls__('Lock layer', 'LayerSlider'),
    'SBUndoPasteSettings' => ls__('Paste layer settings', 'LayerSlider'),
    'SBUndoSlideImage' => ls__('Slide image', 'LayerSlider'),
    'SBUndoLayerImage' => ls__('Layer image', 'LayerSlider'),
    'SBUndoSortLayers' => ls__('Sort layers', 'LayerSlider'),
    'SBUndoLayerType' => ls__('Layer type', 'LayerSlider'),
    'SBUndoLayerMedia' => ls__('Layer media', 'LayerSlider'),
    'SBUndoLayerResize' => ls__('Layer resize', 'LayerSlider'),
    'SBUndoAlignLayer' => ls__('Align layer(s)', 'LayerSlider'),
    'SBUndoRemoveSlideImage' => ls__('Remove slide image', 'LayerSlider'),
    'SBUndoRemoveLayerImage' => ls__('Remove layer image', 'LayerSlider'),
    'SBDragMe' => ls__('Drag me :)', 'LayerSlider'),
    'SBPreviewSlide' => ls__('Preview Slide', 'LayerSlider'),
    'SBLayerPreviewMultiSelect' => ls__('Layer Preview is not available in Multiple Selection Mode. Select only one layer to use this feature. ', 'LayerSlider'),
    'SBStaticUntil' => ls__('Until the end of Slide #%d', 'LayerSlider'),
    'SBPasteLayerError' => ls__("There's nothing to paste. Copy a layer first!", 'LayerSlider'),
    'SBPasteError' => ls__('There is nothing to paste!', 'LayerSlider'),
    'SBRemoveSlide' => ls__('Are you sure you want to remove this slide?', 'LayerSlider'),
    'SBRemoveLayer' => ls__('Are you sure you want to remove this layer?', 'LayerSlider'),
    'SBMediaLibraryImage' => ls__('Pick an image to use it in LayerSlider WP', 'LayerSlider'),
    'SBUploadError' => ls__('Upload error', 'LayerSlider'),
    'SBUploadErrorMessage' => ls__('Upload error: %s', 'LayerSlider'),
    'SBInvalidFormat' => ls__('Invalid format', 'LayerSlider'),
    'SBEnterImageURL' => ls__('Enter an image URL', 'LayerSlider'),
    'SBTransitionApplyOthers' => ls__('Are you sure you want to apply the currently selected transitions and effects on the other slides?', 'LayerSlider'),
    'SBPostFilterWarning' => ls__('No posts were found with the current filters.', 'LayerSlider'),
    'SBSaveError' => ls__('It seems there is a server issue that prevented LayerSlider from saving your work. Please check LayerSlider -> System Status for potential errors, try to temporarily disable themes/plugins to rule out incompatibility issues or contact your hosting provider to resolve server configuration problems. Your HTTP server thrown the following error: \n\n %s', 'LayerSlider'),
    'SBUnsavedChanges' => ls__('You have unsaved changes on this page. Do you want to leave and discard the changes made since your last save?', 'LayerSlider'),
    'SBLinkTextPage' => ls__('Linked to WP Page: %s', 'LayerSlider'),
    'SBLinkTextPost' => ls__('Linked to WP Post: %s', 'LayerSlider'),
    'SBLinkTextAttachment' => ls__('Linked to WP Attachment: %s', 'LayerSlider'),
    'SBLinkPostDynURL' => ls__('Linked to: Post URL from Dynamic content', 'LayerSlider'),


    // Transition Builder
    'TBTransitionName' => ls__('Type transition name', 'LayerSlider'),
    'TBRemoveTransition' => ls__('Remove transition', 'LayerSlider'),
    'TBRemoveConfirmation' => ls__('Are you sure you want to remove this transition?', 'LayerSlider'),
);
