<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

class_exists('BlockNewsletter') or require_once _PS_MODULE_DIR_.'blocknewsletter/blocknewsletter.php';

class CpBlocknewsletter extends BlockNewsletter
{
    public function submitNewsletter()
    {
        $res = $this->newsletterRegistration();
        return array(
            'success' => empty($this->valid) ? '' : $this->valid,
            'errors' => empty($this->error) ? array() : array($this->error)
        );
    }
}
