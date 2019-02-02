<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 */
class Mail extends MailCore
{
    /*
    * module: customnumber
    * date: 2017-12-19 10:31:39
    * version: 1.8.6
    */
    public static function Send(
        $id_lang,
        $template,
        $subject,
        $template_vars,
        $to,
        $to_name = null,
        $from = null,
        $from_name = null,
        $file_attachment = null,
        $mode_smtp = null,
        $template_path = _PS_MAIL_DIR_,
        $die = false,
        $id_shop = null,
        $bcc = null,
        $reply_to = null,
        $replyToName = null
    ) {
        if ($template === 'order_conf' || $template === 'payment') {
            if (!empty($file_attachment)) {
                require_once _PS_MODULE_DIR_ . 'customnumber/helpers/CustomNumberHelper.php';
                if (isset($file_attachment['invoice']) && isset($file_attachment['invoice']['name'])) {
                    $file_attachment['invoice']['name'] = CustomNumberHelper::formatInvoiceFileName(
                        $file_attachment['invoice']['name'],
                        $id_lang,
                        $id_shop
                    );
                    if (isset($file_attachment['delivery']) && isset($file_attachment['delivery']['name'])) {
                        $file_attachment['delivery']['name'] = CustomNumberHelper::formatDeliveryFileName(
                            $file_attachment['invoice']['name'],
                            $id_lang,
                            $id_shop
                        );
                    }
                }
                if (isset($file_attachment['name'])) {
                    $file_attachment['name'] = CustomNumberHelper::formatInvoiceFileName(
                        $file_attachment['name'],
                        $id_lang,
                        $id_shop
                    );
                }
            }
        }
        return parent::Send(
            $id_lang,
            $template,
            $subject,
            $template_vars,
            $to,
            $to_name,
            $from,
            $from_name,
            $file_attachment,
            $mode_smtp,
            $template_path,
            $die,
            $id_shop,
            $bcc,
            $reply_to,
            $replyToName
        );
    }
}
