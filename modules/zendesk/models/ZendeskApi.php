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

require_once(_PS_MODULE_DIR_ . 'zendesk/models/ZendeskCoreApi.php');

class ZendeskApi extends ZendeskCoreApi
{
    /**
     * @since 1.0.0
     * @var bool Settings done and owner verified ?
     */
    private static $valid;

    /**
     * Check if settings are done and if owner is verified
     *
     * @param bool $noApiCall We may not always want to query the API for performance reason; set this to true to get last validity state from DB
     * @since 1.0.0
     * @return bool
     */
    public function isValid($noApiCall = false)
    {
        if (!isset(self::$valid)) {
            // Check fields
            $conf = Configuration::getMultiple(array('ZENDESK_SUBDOMAIN', 'ZENDESK_USERNAME', 'ZENDESK_APIKEY'));
            if ($conf['ZENDESK_SUBDOMAIN'] == '' && $conf['ZENDESK_USERNAME'] == '' && $conf['ZENDESK_APIKEY'] == '') {
                self::$valid = false;
                Configuration::updateValue('ZENDESK_VALID_API', false);
            } elseif($noApiCall) {
                // We shouldn't make a call on every FO page; use a value in DB
                self::$valid = (bool)Configuration::get('ZENDESK_VALID_API', false);
            } else {
                // This shouldn't happen on FO; only when configuring the module
                if ($this->verifySubdomainOwner()) {
                    self::$valid = true;
                } else {
                    self::$valid = false;
                }
                Configuration::updateValue('ZENDESK_VALID_API', self::$valid);
            }
        }

        return self::$valid;
    }

    /**
     * Verify the email and token for a given subdomain
     *
     * @category Accounts
     * @since 1.0.0
     * @return bool
     */
    public function verifySubdomainOwner()
    {
        $datas = $this->getMe();

        // Maybe do something with the errors ?...
        if (is_object($datas) && isset($datas->error)) {
            return false;
        }

        if (is_array($datas) && isset($datas['error'])) {
            return false;
        }

        if (!$datas->user->id) {
            return false;
        }

        return true;
    }

    /**
     *  Add ticket
     *
     * @category Tickets
     * @since 1.0.0
     * @return bool
     */
    public function addTicket($ticket)
    {
        if (!is_array($ticket)) {
            return false;
        }

        $params = array(
            'item' => 'tickets',
            'action' => 'POST',
            'data' => array( 'ticket' => $ticket )
        );

        return $this->sendRequest($params);
    }

    /**
     *  Get total tickets
     *
     * @category Tickets
     * @since 1.0.0
     * @return int
     */
    public function getTotalTickets()
    {
        $return = $this->getTickets(1, 1, true);
        return (isset($return->count) ? (int)$return->count : 0);
    }

    /**
     *  Get all tickets
     *
     * @category Tickets
     * @since 1.0.0
     */
    public function getTickets($page = 1, $per_page = 20, $count = false)
    {
        if (!Validate::isUnsignedInt($page)) {
            return $this->returnError('getTickets.page', sprintf($this->l('The attribute "%s" has to be a %s value'), 'page', 'integer'));
        } elseif (!Validate::isUnsignedInt($per_page)) {
            return $this->returnError('getTickets.per_page', sprintf($this->l('The attribute "%s" has to be a %s value'), 'per_page', 'integer'));
        }

        if ($count) {
            $params = array(
                'item' => 'tickets',
                'action' => 'GET',
                'data' => array(
                    'type' => 'tickets'
                )
            );
        } else {
            $params = array(
                'item' => 'search',
                'action' => 'GET',
                'data' => array(
                    'type' => 'ticket',
                    'sort_by' => 'created_at',
                    'sort_order' => 'desc',
                    'per_page' => (int)$per_page,
                    'page' => (int)$page
                )
            );
        }

        return $this->sendRequest($params);
    }

    /**
     *  Get ticket
     *
     * @category Tickets
     * @since 1.0.0
     */
    public function getTicket($id_ticket, $full = false)
    {
        if (!Validate::isUnsignedInt($id_ticket)) {
            return false;
        } elseif (!Validate::isBool($full)) {
            return false;
        }

        $params = array(
            'item' => 'tickets',
            'action' => 'GET',
            'id' => (int)$id_ticket
        );

        $datas = $this->sendRequest($params);

        if (!isset($datas->error)) {
            if ($full) {
                $author = $this->getUser((int)$datas->ticket->requester_id);
                if (isset($author->user)) {
                    $datas->ticket->author = $author->user;
                } else {
                    $datas->ticket->author = array();
                }
            }
        }

        return $datas;
    }

    /**
     *  Update ticket
     *
     * @category Tickets
     * @since 1.0.0
     */
    public function updateTicket($id_ticket, $ticket)
    {
        if (!Validate::isUnsignedInt($id_ticket)) {
            return false;
        } elseif (!is_array($ticket)) {
            return false;
        }

        $params = array(
            'item' => 'tickets',
            'action' => 'PUT',
            'id' => (int)$id_ticket,
            'data' => array(
                'ticket' => $ticket
            )
        );

        return $this->sendRequest($params);
    }

    /**
     *  Get comments
     *
     * @category Comments
     * @since 1.0.0
     */
    public function getComments($id_ticket, $full = false)
    {
        if (!Validate::isUnsignedInt($id_ticket)) {
            return false;
        } elseif (!Validate::isBool($full)) {
            return false;
        }


        $params = array(
            'item' => 'tickets',
            'endpoint' => 'comments',
            'action' => 'GET',
            'id' => (int)$id_ticket
        );

        $datas = $this->sendRequest($params);

        if (!isset($datas->error)) {
            foreach ($datas->comments as $k => $comment) {
                $datas->comments[$k]->created_at = $this->convertDate($datas->comments[$k]->created_at);

                if ($full) {
                    $author = $this->getUser((int)$comment->author_id);
                    if (isset($author->user)) {
                        $datas->comments[$k]->author = $author->user;
                    } else {
                        $datas->comments[$k]->author = array();
                    }
                }
            }
        } else {
            $datas = array();
        }

        return $datas;
    }

    /**
     *  Get user
     *
     * @category Users
     * @since 1.0.0
     */
    public function getMe()
    {
        $params = array(
            'item' => 'users',
            'action' => 'GET',
            'endpoint' => 'me',
        );

        return $this->sendRequest($params);
    }

    /**
     *  Get users
     *
     * @category Users
     * @since 1.0.0
     */
    public function getUser($user_id)
    {

        if (!Validate::isInt($user_id)) {
            return false;
        }

        $params = array(
            'item' => 'users',
            'action' => 'GET',
            'id' => (int)$user_id
        );

        return $this->sendRequest($params);
    }

    /**
     *  Upload file
     *
     * @category Attachments
     * @since 1.0.0
     */
    public function uploadFile($filename, $filepath)
    {
        if (!Validate::isFileName($filename)) {
            return false;
        } elseif (!Validate::isUrl($filepath)) {
            return false;
        }

        $params = array(
            'item' => 'uploads',
            'action' => 'POST',
            'data' => array(
                'content_type' => 'Content-Type: application/binary',
                'filename' => $filename,
                'file' => $filepath
            )
        );

        return $this->sendRequest($params);
    }

    /**
     *  App information
     *
     * @category Apps
     * @since 1.0.0
     */
    public function appInformation($app_id)
    {
        $params = array(
            'item' => 'apps',
            'action' => 'GET',
            'id' => (int)$app_id
        );

        return $this->sendRequest($params);
    }

    /**
     *  Listing the app installations
     *
     * @category Apps
     * @since 1.0.0
     */
    public function listAppInstallations()
    {
        $params = array(
            'item' => 'apps/installations',
            'action' => 'GET'
        );

        return $this->sendRequest($params);
    }

    /**
     *  Install app
     *
     * @category Apps
     * @since 1.0.0
     */
    public function installApp($app_id, $order_id_field_id)
    {
        if (!Validate::isUnsignedInt($app_id)) {
            return false;
        } elseif (!ctype_digit($order_id_field_id)) {
            return false;
        }

        $params = array(
            'item' => 'apps/installations',
            'action' => 'POST',
            'data' => array(
                'app_id' => (int)$app_id,
                'settings' => array(
                    'name' => 'PrestaShop',
                    'url' => Context::getContext()->shop->getBaseURL(),
                    'access_token' => Configuration::get('ZENDESK_CONNECTOR_KEY'),
                    'order_id_field_id' => $order_id_field_id
                )
            )
        );

        return $this->sendRequest($params);
    }

    /**
     *  Update app
     *
     * @category Apps
     * @since 1.0.0
     */
    public function updateApp($app_id, $settings)
    {
        if (!ctype_digit($app_id)) {
            return false;
        } elseif (!is_array($settings)) {
            return false;
        }

        $params = array(
            'item' => 'apps/installations',
            'action' => 'PUT',
            'id' => (int)$app_id,
            'data' => array(
                'settings' => $settings
            )
        );

        return $this->sendRequest($params);
    }

    /**
     *  Create the ticket field
     *
     * @category Ticket Fields
     * @since 1.0.0
     */
    public function createTicketField($ticket_field)
    {
        if (!is_array($ticket_field)) {
            return false;
        }

        if (!isset($ticket_field['type'])) {
            $ticket_field['type'] = 'text ';
        }

        $params = array(
            'item' => 'ticket_fields',
            'action' => 'POST',
            'data' => array(
                'ticket_field' => $ticket_field
            )
        );

        return $this->sendRequest($params);
    }
}
