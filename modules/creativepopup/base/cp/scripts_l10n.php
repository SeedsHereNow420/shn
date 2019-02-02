<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

$cp_l10n = array(
    // General
    'save' => cp__('Save changes'),
    'saving' => cp__('Saving ...'),
    'saved' => cp__('Saved'),
    'error' => cp__('ERROR'),
    'untitled' => cp__('Untitled'),
    'working' => cp__('Working ...'),
    'stop' => cp__('Stop'),

    'slideNoun' => cp_x('Page', 'noun'),
    'slideVerb' => cp_x('Slide', 'verb'),
    'layer' => cp__('Layer', 'Layer'),

    'selectAll' => cp__('Select all'),
    'deselectAll' => cp__('Deselect all'),

    // Notify OSD
    'notifyPopupSaved' => cp__('Popup saved successfully'),
    'notifyCaptureSlide' => cp__('Capturing page. This might take a moment ...'),

    // Sliders list
    'SLRemoveSlider' => cp__('Are you sure you want to remove this popup?'),
    'SLUploadSlider' => cp__('Uploading, please wait ...'),
    'SLEnterCode' => cp__('Please enter a valid Item Purchase Code. For more information, please click on the “Where’s my purchase code?” button.'),
    'SLDeactivate' => cp__('Are you sure you want to deactivate this site?'),
    'SLPermissions' => cp__('WARNING: This option controls who can access to this plugin, you can easily lock out yourself by accident. Please, make sure that you have entered a valid capability without whitespaces or other invalid characters. Do you want to proceed?'),
    'SLJQueryConfirm' => cp__("Do not enable this option unless you're  experiencing issues with jQuery on your site. This option can easily cause unexpected issues when used incorrectly. Do you want to proceed?"),
    'SLJQueryReminder' => cp__('Do not forget to disable this option later on if it does not help, or if you experience unexpected issues. This includes your entire site, not just Creative Popup.'),

    'SLImporting' => cp__('Importing, please wait...'),
    'SLImportError' => cp__('It seems there is a server issue that prevented Creative Popup from importing your selected popup. Try to temporarily disable modules to rule out incompatibility issues or contact your hosting provider to resolve server configuration problems. In many cases retrying to import the same popup can help.'),
    'SLImportHTTPError' => cp__('It seems there is a server issue that prevented Creative Popup from importing your selected popup. Try to temporarily disable modules to rule out incompatibility issues or contact your hosting provider to resolve server configuration problems. In many cases retrying to import the same popup can help. Your HTTP server thrown the following error: \n\n %s'),

    // Google Fonts
    'GFEmptyList' => cp__("You haven't added any Google Font to your collection yet."),
    'GFEmptyCharset' => cp__('You need to have at least one character set added. Please select another item before removing this one.'),
    'GFFontFamily' => cp__('Choose a font family'),
    'GFFontVariant' => cp__('Select %s font variants'),

    // Slider Builder
    'SBSlideTitle' => cp__('Page #%d'),
    'SBSlideCopyTitle' => cp__('Page #%d copy'),
    'SBLayerTitle' => cp__('Layer #%d'),
    'SBLayerCopyTitle' => cp__('Layer #%d copy'),
    'SBUndoLayer' => cp__('Layer settings'),
    'SBUndoSlide' => cp__('Page settings'),
    'SBUndoNewLayer' => cp__('New layer'),
    'SBUndoNewLayers' => cp__('New layers'),
    'SBUndoVideoPoster' => cp__('Video poster'),
    'SBUndoRemoveVideoPoster' => cp__('Remove video poster'),
    'SBUndoLayerPosition' => cp__('Layer position'),
    'SBUndoRemoveLayer' => cp__('Remove layer(s)'),
    'SBUndoHideLayer' => cp__('Hide layer'),
    'SBUndoLockLayer' => cp__('Lock layer'),
    'SBUndoPasteSettings' => cp__('Paste layer settings'),
    'SBUndoSlideImage' => cp__('Page image'),
    'SBUndoLayerImage' => cp__('Layer image'),
    'SBUndoSortLayers' => cp__('Sort layers'),
    'SBUndoLayerType' => cp__('Layer type'),
    'SBUndoLayerMedia' => cp__('Layer media'),
    'SBUndoLayerResize' => cp__('Layer resize'),
    'SBUndoAlignLayer' => cp__('Align layer(s)'),
    'SBUndoRemoveSlideImage' => cp__('Remove page image'),
    'SBUndoRemoveLayerImage' => cp__('Remove layer image'),
    'SBDragMe' => cp__('Drag me :)'),
    'SBPreviewSlide' => cp__('Preview Page'),
    'SBLayerPreviewMultiSelect' => cp__('Layer Preview is not available in Multiple Selection Mode. Select only one layer to use this feature. '),
    'SBStaticUntil' => cp__('Animate out on Page #%d'),
    'SBPasteLayerError' => cp__("There's nothing to paste. Copy a layer first!"),
    'SBPasteError' => cp__('There is nothing to paste!'),
    'SBRemoveSlide' => cp__('Are you sure you want to remove this page?'),
    'SBRemoveLayer' => cp__('Are you sure you want to remove this layer?'),
    'SBMediaLibraryImage' => cp__('Pick an image to use it in Creative Popup'),
    'SBUploadError' => cp__('Upload error'),
    'SBUploadErrorMessage' => cp__('Upload error: %s'),
    'SBInvalidFormat' => cp__('Invalid format'),
    'SBEnterImageURL' => cp__('Enter an image URL'),
    'SBTransitionApplyOthers' => cp__('Are you sure you want to apply the currently selected transitions and effects on the other pages?'),
    'SBPostFilterWarning' => cp__('No posts were found with the current filters.'),
    'SBSaveError' => cp__('It seems there is a server issue that prevented Creative Popup from saving your work. Try to temporarily disable modules to rule out incompatibility issues or contact your hosting provider to resolve server configuration problems. Your HTTP server thrown the following error: \n\n %s'),
    'SBUnsavedChanges' => cp__('You have unsaved changes on this page. Do you want to leave and discard the changes made since your last save?'),
    'SBLinkTextPage' => cp__('Linked to WP Page: %s'),
    'SBLinkTextPost' => cp__('Linked to WP Post: %s'),
    'SBLinkTextAttachment' => cp__('Linked to WP Attachment: %s'),
    'SBLinkPostDynURL' => cp__('Linked to: Post URL from Dynamic content'),


    // Transition Builder
    'TBTransitionName' => cp__('Type transition name'),
    'TBRemoveTransition' => cp__('Remove transition'),
    'TBRemoveConfirmation' => cp__('Are you sure you want to remove this transition?'),
);
