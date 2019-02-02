<?php
/**
 *  2017 ModuleFactory.co
 *
 *  @author    ModuleFactory.co <info@modulefactory.co>
 *  @copyright 2017 ModuleFactory.co
 *  @license   ModuleFactory.co Commercial License
 */

class FsAdvancedUrlMessenger
{
    private static $messages = array();
    private static $readed_from_file = false;
    private static $module_name = 'fsadvancedurl';
    private static $messages_file = 'messages.json';

    public static function getMessagesHtml()
    {
        return self::getErrorMessages(true).self::getSuccessMessages(true);
    }

    public static function addSuccessMessage($message)
    {
        self::addMessage('success', $message);
    }

    public static function getSuccessMessages($html = false)
    {
        $return_messages = array();

        self::readFromFile();

        if (self::$messages) {
            foreach (self::$messages as $message) {
                if ($message['type'] == 'success') {
                    $return_messages[] = $message['message'];
                }
            }
        }

        if ($html) {
            if ($return_messages) {
                $module = Module::getInstanceByName(self::$module_name);
                return $module->displayConfirmation(implode('<br />', $return_messages));
            }
            return '';
        }

        return $return_messages;
    }

    public static function addErrorMessage($message)
    {
        self::addMessage('error', $message);
    }

    public static function getErrorMessages($html = false)
    {
        $return_messages = array();

        self::readFromFile();

        if (self::$messages) {
            foreach (self::$messages as $message) {
                if ($message['type'] == 'error') {
                    $return_messages[] = $message['message'];
                }
            }
        }

        if ($html) {
            if ($return_messages) {
                $module = Module::getInstanceByName(self::$module_name);
                if (count($return_messages) < 2) {
                    $return_messages = implode('', $return_messages);
                }
                return $module->displayError($return_messages);
            }
            return '';
        }

        return $return_messages;
    }

    private static function addMessage($type, $message)
    {
        self::$messages[] = array('type' => $type, 'message' => $message);
        self::saveToFile();
    }

    private static function readFromFile()
    {
        $messages_file = _PS_MODULE_DIR_.self::$module_name.'/'.self::$messages_file;
        if (!self::$readed_from_file) {
            if (file_exists($messages_file)) {
                self::$messages = FsAdvancedUrlModule::jsonDecodeStatic(Tools::file_get_contents($messages_file), true);
                unlink($messages_file);
            }

            self::$readed_from_file = true;
        }
    }

    private static function saveToFile()
    {
        $messages_file = _PS_MODULE_DIR_.self::$module_name.'/'.self::$messages_file;
        $file = fopen($messages_file, 'w');
        fwrite($file, FsAdvancedUrlModule::jsonEncodeStatic(self::$messages));
        fclose($file);
    }
}
