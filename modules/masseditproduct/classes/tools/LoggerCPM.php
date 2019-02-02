<?php
/**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    SeoSA <885588@bk.ru>
 * @copyright 2012-2017 SeoSA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

/**
 * Class LoggerCPM
 */
class LoggerCPM
{
    const LOG_ERROR = 'error';
    const LOG_SUCCESS = 'success';
    const LOG_MESSAGE = 'message';
    protected $messages = array();
    protected $has_error = false;

    /**
     * @var LoggerCPM
     */
    protected static $instance = null;

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @param $message
     * @param $type
     */
    public function log($message, $type)
    {
        $this->messages[] = array(
            'message' => $message,
            'type' => $type
        );
    }

    /**
     * @param $message
     */
    public function error($message)
    {
        $this->has_error = true;
        $this->log($message, self::LOG_ERROR);
    }

    /**
     * @param $message
     */
    public function success($message)
    {
        $this->log($message, self::LOG_SUCCESS);
    }

    /**
     * @param $message
     */
    public function message($message)
    {
        $this->log($message, self::LOG_MESSAGE);
    }

    public function getMessages()
    {
        return $this->messages;
    }

    public function exception(Exception $e)
    {
        $this->error($e->getMessage());
        if (_PS_MODE_DEV_) {
            $this->message($e->getTraceAsString());
        }
    }

    public function hasError()
    {
        return $this->has_error;
    }
}
