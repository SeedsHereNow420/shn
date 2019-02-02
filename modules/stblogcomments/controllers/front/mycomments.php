<?php
/*
* 2007-2014 PrestaShop
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
include_once(dirname(__FILE__).'/../../stblogcomments.php');
include_once(dirname(__FILE__).'/../../classes/StBlogCommentClass.php');
include_once _PS_MODULE_DIR_.'/stblog/classes/controller/FrontController.php';
class StBlogCommentsMyCommentsModuleFrontController extends StblogModuleFrontController
{
	public $nbr_comments;
    
    public $ssl = true;

	public function initContent()
	{
		parent::initContent();
        $this->assign();
	}
    /**
	 * Assign blog comment template
	 */
	public function assign()
	{
		$errors = array();
        $message = '';

		if ($this->context->customer->isLogged())
		{
			if (Tools::isSubmit('submitAvatar'))
			{
				if (Configuration::get('PS_TOKEN_ACTIVATED') == 1 && strcmp(Tools::getToken(), Tools::getValue('token')))
					$errors[] = $this->trans('Please refresh the page and try again', array(), 'Shop.Theme.Transformer');
				if (!count($errors))
				{
					$comment = new StBlogCommentClass();
                    $rs = $comment->uploadAvatar('avatar');
                    if (true === $rs)
                        $message = $this->trans('Avatar uploaded successfully', array(), 'Shop.Theme.Transformer');
					elseif(false === $rs)
                        $errors[] = $this->trans('Failed to upload avatar', array(), 'Shop.Theme.Transformer');
                    elseif (-1 === $rs)
                        $errors[] = $this->trans('This image is too large to be uploaded.', array(), 'Shop.Theme.Transformer');
                    elseif(-2 === $rs)
                        $errors[] = $this->trans('Unable to upload this image, upload folder is not writable.', array(), 'Shop.Theme.Transformer');
				}
			}
            elseif(Tools::getValue('act') == 'delavatar')
            {
                $comment = new StBlogCommentClass();
                if($comment->deleteImage($comment->getAvatarPathForCreation(false)))
                {
                    $message = $this->trans('Avatar deleted successfully', array(), 'Shop.Theme.Transformer');
                    Tools::redirect($this->context->link->getModuleLink('stblogcomments','mycomments'));
                }
                else
                    $errors[] = $this->trans('Failed to delete avatar', array(), 'Shop.Theme.Transformer');
            }
		}
		else
			Tools::redirect('index.php?controller=authentication&back='.urlencode($this->context->link->getModuleLink('stblogcomments','mycomments')));
            
        $comment = new StBlogCommentClass();
            
        $this->nbr_comments = StBlogCommentClass::getByCustomer($this->context->customer->id,null,null,$this->context->language->id,$this->context->shop->id,true);                         
        $comments = StBlogCommentClass::getByCustomer($this->context->customer->id,(int)$this->page, (int)$this->resultsPerPage,$this->context->language->id,$this->context->shop->id);
                
		$avatar  = StBlogCommentClass::getAvatar('large');
        $avatar  = StBlogCommentClass::getAvatar($this->context->customer->id,'large');
		$this->context->smarty->assign(array(
			'avatar'     => $avatar,
			'errors'     => $errors,
            'message'    => $message,
            'comments'    => $comments,
            'pagination' => $this->getTemplateVarPagination($this->nbr_comments),
		));

		$this->setTemplate('module:stblogcomments/views/templates/front/mycomments.tpl');
	}
    
    public function getBreadcrumbLinks()
    {
        $breadcrumb = parent::getBreadcrumbLinks();
        $breadcrumb['links'][] = $this->addMyAccountToBreadcrumb();
        $breadcrumb['links'][] = array(
            'title' => $this->trans('My comments of blog', array(), 'Shop.Theme.Transformer'),
            'url' => $this->context->link->getModuleLink('stblogcomments','mycomments'),
        );

        return $breadcrumb;
    }
}
