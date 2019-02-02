<?php
class FrontController extends FrontControllerCore
{
    public function initContent()
    {
        parent::initContent();
        
        $this->context->smarty->assign(array(
            'HOOK_HEADER_LEFT' => Hook::exec('displayHeaderLeft'),
            'HOOK_HEADER_CENTER' => Hook::exec('displayHeaderCenter'),
            'HOOK_HEADER_BOTTOM' => Hook::exec('displayHeaderBottom'),
            'HOOK_STACKED_FOOTER_1' => (Configuration::get('STSN_STACKED_FOOTER_COLUMN_1') ? Hook::exec('displayStackedFooter1') : ''),
            'HOOK_STACKED_FOOTER_2' => (Configuration::get('STSN_STACKED_FOOTER_COLUMN_2') ? Hook::exec('displayStackedFooter2') : ''),
            'HOOK_STACKED_FOOTER_3' => (Configuration::get('STSN_STACKED_FOOTER_COLUMN_3') ? Hook::exec('displayStackedFooter3') : ''),
            'HOOK_STACKED_FOOTER_4' => (Configuration::get('STSN_STACKED_FOOTER_COLUMN_4') ? Hook::exec('displayStackedFooter4') : ''),
            'HOOK_STACKED_FOOTER_5' => (Configuration::get('STSN_STACKED_FOOTER_COLUMN_5') ? Hook::exec('displayStackedFooter5') : ''),
            'HOOK_STACKED_FOOTER_6' => (Configuration::get('STSN_STACKED_FOOTER_COLUMN_6') ? Hook::exec('displayStackedFooter6') : ''),
        ));
    }
}