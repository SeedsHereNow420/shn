<?php
/**
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
*  @author    Presta-Module
*  @author    202 ecommerce
*  @copyright 2009-2016 Presta-Module
*  @copyright 2017-2018 202 ecommerce
*  @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
*/

class AdminZendeskController extends ModuleAdminController
{
    /**
     * Construct
     *
     */
    public function __construct()
    {
        $this->bootstrap = true;

        $this->table = 'ticket';

        $this->addRowAction('view');

        $this->module = Module::getInstanceByName('zendesk');

        $this->fields_list = array(
            'id_ticket' => array(
                'title' => $this->module->l('ID'),
                'search' => false
            ),
            'type' => array(
                'title' => $this->module->l('Type'),
                'color' => 'type_color',
                'search' => false
            ),
            'priority' => array(
                'title' => $this->module->l('Priority'),
                'color' => 'priority_color',
                'search' => false
            ),
            'status' => array(
                'title' => $this->module->l('Status'),
                'color' => 'status_color',
                'search' => false
            ),
            'subject' => array(
                'title' => $this->module->l('Subject'),
                'search' => false
            ),
            'created_at' => array(
                'title' => $this->module->l('Created at'),
                'search' => false,
                'callback' => 'convertDate',
            ),
            'updated_at' => array(
                'title' => $this->module->l('Updated at'),
                'search' => false,
                'callback' => 'convertDate',
            ),
        );

        parent::__construct();
    }
    
    /**
     * Convert a Zendesk date to PrestaShop date
     *
     * @param string $value Zendesk date
     * @return PrestaShop date
     */
    public function convertDate($value)
    {
        return $this->module->api->convertDate($value);
    }

    /**
     * Get List
     *
     * @see AdminController::getList()
     */
    public function getList($id_lang, $order_by = null, $order_way = null, $start = 0, $limit = null, $id_lang_shop = false)
    {
        $this->_default_pagination = 20;

        $colors = array(
            'priority' => array(
                'low' => '#ffffff',
                'normal' => '#ffffff',
                'high' => '#FF8C00',
                'urgent' => '#DC143C',
                '' => '#ffffff'
            ),
            'type' => array(
                'question' => '#ffffff',
                'incident' => '#FF8C00',
                'problem' => '#DC143C',
                'task' => '#ecf6fb',
                '' => '#ffffff'
            ),
            'status' => array(
                'new' => '#ffffff',
                'open' => '#108510',
                'pending' => '#FF8C00',
                'solved' => '#ecf6fb',
                'hold' => '#FF8C00',
                'closed' => '#ffffff',
                '' => ''
            )
        );

        $tickets = array();
        $total_tickets = 0;

        $result = $this->module->api->getTickets((int)Tools::getValue('submitFilterticket', 1), (int)Tools::getValue($this->list_id.'_pagination', $this->_default_pagination));
        if (isset($result->error)) {
            $this->displayWarning($result->error);
        } else {
            $total_tickets = $this->module->api->getTotalTickets();
            if ((int)$total_tickets) {
                foreach ($result->results as $t => $ticket) {
                    $tickets[$t]['id_ticket'] = (int)$ticket->id;
                    $tickets[$t]['type'] = $ticket->type;
                    $tickets[$t]['priority'] = $ticket->priority;
                    $tickets[$t]['status'] = $ticket->status;
                    $tickets[$t]['subject'] = $ticket->subject;
                    $tickets[$t]['created_at'] = $ticket->created_at;
                    $tickets[$t]['updated_at'] = $ticket->updated_at;

                    $tickets[$t]['type_color'] = $colors['type'][$ticket->type];
                    $tickets[$t]['priority_color'] = $colors['priority'][$ticket->priority];
                    $tickets[$t]['status_color'] = $colors['status'][$ticket->status];
                }
            }
        }

        $this->_list = $tickets;
        $this->_listTotal = (int)$total_tickets;
    }

    /**
     * Render View
     *
     * @see AdminController::renderView()
     */
    public function renderView()
    {
        if (version_compare(_PS_VERSION_, '1.6.0.1', '>=')) {
            $this->template = 'form.tpl';
        } else {
            $this->template = 'form_backward.tpl';
        }

        $id_ticket = (int)Tools::getValue('id_ticket', 0);

        if (Tools::isSubmit('submitUpdateType')) {
            $this->module->api->updateTicket((int)$id_ticket, array('type' => Tools::getValue('type', '')));
        } elseif (Tools::isSubmit('submitUpdatePriority')) {
            $this->module->api->updateTicket((int)$id_ticket, array('priority' => Tools::getValue('priority', '')));
        } elseif (Tools::isSubmit('submitUpdateStatus')) {
            $this->module->api->updateTicket((int)$id_ticket, array('status' => Tools::getValue('status', '')));
        } elseif (Tools::isSubmit('submitMessage')) {
            $extension = array('.txt', '.rtf', '.doc', '.docx', '.pdf', '.zip', '.png', '.jpeg', '.gif', '.jpg');
            $file_attachment = $this->fileAttachment('fileUpload');
            $message = Tools::getValue('message'); // Html entities is not usefull, iscleanHtml check there is no bad html tags.
            if (!Validate::isInt($id_ticket)) {
                $this->errors[] = Tools::displayError('Invalid ticket.');
            } elseif (!$message) {
                $this->errors[] = Tools::displayError('The message cannot be blank.');
            } elseif (!Validate::isCleanHtml($message)) {
                $this->errors[] = Tools::displayError('Invalid message');
            } elseif (!empty($file_attachment['name']) && $file_attachment['error'] != 0) {
                $this->errors[] = Tools::displayError('An error occurred during the file-upload process.');
            } elseif (!empty($file_attachment['name']) && !in_array(Tools::strtolower(Tools::substr($file_attachment['name'], -4)), $extension) && !in_array(Tools::strtolower(Tools::substr($file_attachment['name'], -5)), $extension)) {
                $this->errors[] = Tools::displayError('Bad file extension');
            } else {
                $ticket = array(
                    'comment' => array(
                        'public' => (bool)Tools::getValue('internal', 0),
                        'body' => Tools::getValue('message')
                    )
                );
                
                if (isset($file_attachment['rename']) && !empty($file_attachment['rename']) && rename($file_attachment['tmp_name'], _PS_UPLOAD_DIR_.basename($file_attachment['rename']))) {
                    if (is_readable(_PS_UPLOAD_DIR_.basename($file_attachment['rename']))) {
                        $ret = $this->module->api->uploadFile($file_attachment['name'], _PS_UPLOAD_DIR_.basename($file_attachment['rename']));
                        if (!isset($ret->error)) {
                            $ticket['comment']['uploads'] = $ret->upload->token;
                        }
                    }
                }

                $this->module->api->updateTicket((int)$id_ticket, $ticket);
            }
        }

        $return = $this->module->api->getTicket((int)$id_ticket, true);
        if (isset($return->ticket)) {
            $this->context->smarty->assign('ticket', $return->ticket);

            $messages = $this->module->api->getComments($return->ticket->id, true);
            $this->context->smarty->assign('messages', $messages->comments);

            $this->context->smarty->assign('orderMessages', OrderMessage::getOrderMessages((int)$this->context->language->id));
            $this->context->smarty->assign('file_upload_form', $this->renderUploadForm());

            $me = $this->module->api->getMe();
            $this->context->smarty->assign('signature', (isset($me->user->signature) ? $me->user->signature : ''));
        } else {
            $this->context->smarty->assign('error', true);
        }

        return parent::renderForm();
    }

    public function initPageHeaderToolbar()
    {
        if ($this->display == 'view') {
            $this->page_header_toolbar_btn['export_cart'] = array(
                'href' => self::$currentIndex.'&token='.$this->token,
                'desc' => $this->l('Back to list', null, null, false),
                'icon' => 'process-icon-reply icon-reply'
            );
        }
        
        parent::initPageHeaderToolbar();
    }

    /**
     * Render upload form for file attachment
     *
     */
    private function renderUploadForm()
    {
        if (version_compare(_PS_VERSION_, '1.6.0.1', '>=')) {
            $params = array();
            $params['id'] = 'fileUpload';
            $params['name'] = 'fileUpload';

            $uploader = new HelperUploader();
            $uploader->setId(isset($params['id'])?$params['id']:null);
            $uploader->setName($params['name']);
            $uploader->setUrl(isset($params['url'])?$params['url']:null);
            $uploader->setMultiple(isset($params['multiple'])?$params['multiple']:false);
            $uploader->setUseAjax(isset($params['ajax'])?$params['ajax']:false);
            $uploader->setMaxFiles(isset($params['max_files'])?$params['max_files']:null);
            if (isset($params['files']) && $params['files']) {
                $uploader->setFiles($params['files']);
            } elseif (isset($params['image']) && $params['image']) {
                $uploader->setFiles(array(
                    0 => array(
                        'type'       => HelperUploader::TYPE_IMAGE,
                        'image'      => isset($params['image'])?$params['image']:null,
                        'size'       => isset($params['size'])?$params['size']:null,
                        'delete_url' => isset($params['delete_url'])?$params['delete_url']:null
                    )
                ));
            }
            if (isset($params['file']) && $params['file']) {
                $uploader->setFiles(array(
                    0 => array(
                        'type'       => HelperUploader::TYPE_FILE,
                        'size'       => isset($params['size'])?$params['size']:null,
                        'delete_url' => isset($params['delete_url'])?$params['delete_url']:null,
                        'download_url' => isset($params['file'])?$params['file']:null
                    )
                ));
            }
            if (isset($params['thumb']) && $params['thumb']) {
                $uploader->setFiles(array(
                    0 => array(
                        'type'  => HelperUploader::TYPE_IMAGE,
                        'image' => isset($params['thumb'])?'<img src="'.$params['thumb'].'" alt="'.(isset($params['title']) ? $params['title'] : '').'" title="'.(isset($params['title']) ? $params['title'] : '').'" />':null,
                    )
                ));
            }
            $uploader->setTitle(isset($params['title'])?$params['title']:null);
            return $uploader->render();
        } else {
            return 'renderUploadForm-prestashop-1.5';
        }
    }

    /**
     * From Tools.php in a newer PS version
     * Returns an array containing information about
     * HTTP file upload variable ($_FILES)
     *
     * @param string $input          File upload field name
     * @param bool   $return_content If true, returns uploaded file contents
     *
     * @return array|null
     */
    public function fileAttachment($input = 'fileUpload', $return_content = true)
    {
        $file_attachment = null;
        if (isset($_FILES[$input]['name']) && !empty($_FILES[$input]['name']) && !empty($_FILES[$input]['tmp_name'])) {
            $file_attachment['rename'] = uniqid().Tools::strtolower(Tools::substr($_FILES[$input]['name'], -5));
            if ($return_content) {
                $file_attachment['content'] = Tools::file_get_contents($_FILES[$input]['tmp_name']);
            }
            $file_attachment['tmp_name'] = $_FILES[$input]['tmp_name'];
            $file_attachment['name']     = $_FILES[$input]['name'];
            $file_attachment['mime']     = $_FILES[$input]['type'];
            $file_attachment['error']    = $_FILES[$input]['error'];
            $file_attachment['size']     = $_FILES[$input]['size'];
        }

        return $file_attachment;
    }
}
