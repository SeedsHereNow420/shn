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
include_once(dirname(__FILE__).'/../../classes/StProductCommentClass.php');

class StProductCommentsDefaultModuleFrontController extends ModuleFrontController
{
    private $_prefix_st = 'ST_PROD_C_';
	public function __construct()
	{
		parent::__construct();

		$this->context = Context::getContext();
	}

	public function initContent()
	{
		parent::initContent();

		if (Tools::isSubmit('action'))
		{
			switch(Tools::getValue('action'))
			{
				case 'add_comment':
					$this->ajaxProcessAddComment();
					break;
                case 'add_reply':
					$this->ajaxProcessAddReply();
					break;
                case 'upload_image':
					$this->ajaxProcessUploadImage();
					break;
                case 'report_abuse':
					$this->ajaxProcessReportAbuse();
					break;
				case 'comment_is_usefull':
					$this->ajaxProcessCommentIsUsefull();
					break;
			}
		}
	}
    protected function valideRecaptcha($response= '')
    {
        if (!Configuration::get($this->_prefix_st.'GOOGLE_RECAPTCHA')) {
            return true;
        }
        if (!($secret_key  = Configuration::get($this->_prefix_st.'RECAPTCHA_SECRET_KEY')) || !Configuration::get($this->_prefix_st.'RECAPTCHA_SITE_KEY')) {
            return $this->trans('Recaptcha site key and secret key required.', array(), 'Shop.Theme.Transformer');
        }
        if (!$response) {
            return $this->trans('Recaptcha validate failed.', array(), 'Shop.Theme.Transformer');
        }
        $api_url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = http_build_query(array('secret' => $secret_key, 'response' => $response));  
        $options = array(  
            'http' => array(  
                'method' => 'POST',  
                'header' => 'Content-type:application/x-www-form-urlencoded',  
                'content' => $data,  
                'timeout' => 60  
            )  
        );
        $context = stream_context_create($options);
        if ($result = Tools::file_get_contents($api_url, false, $context)) {
            $result = (array)json_decode($result);
            if (isset($result['success']) && $result['success']) {
                return true;
            } else {
                return $this->trans('Recaptcha validate failed.', array(), 'Shop.Theme.Transformer');
            }
        } else {
            return $this->trans('Recaptcha validate failed.', array(), 'Shop.Theme.Transformer');
        } 
    }
	protected function ajaxProcessAddComment()
	{
		$result = array(
            'r' => false,
            'm' => '',
        );
		$id_guest = 0;
		$id_customer = $this->context->customer->id;
		if (!$id_customer)
			$id_guest = $this->context->cookie->id_guest;

		$errors = array();
		// Validation
        if (($rs = $this->valideRecaptcha(Tools::getValue('g-recaptcha-response'))) !== true) {
            $errors[] = $rs;
        }
		if (!Validate::isInt(Tools::getValue('id_product')))
			$errors[] = $this->trans('Invalid  Product', array(), 'Shop.Theme.Transformer');
		if (!Tools::getValue('content') || !Validate::isMessage(Tools::getValue('content')))
			$errors[] = $this->trans('Your comment is too short. Please try again', array(), 'Shop.Theme.Transformer');
		if (!$id_customer && (!Tools::isSubmit('customer_name') || !Tools::getValue('customer_name') || !Validate::isGenericName(Tools::getValue('customer_name'))))
			$errors[] = $this->trans('Customer name is empty', array(), 'Shop.Theme.Transformer');
		if (!$this->context->customer->id && !Configuration::get($this->_prefix_st.'ALLOW_GUESTS'))
			$errors[] = $this->trans('Please login to post a comment', array(), 'Shop.Theme.Transformer');

		$product = new Product(Tools::getValue('id_product'));
		if (!$product->id)
			$errors[] = $this->trans('Product not found', array(), 'Shop.Theme.Transformer');

		if (!count($errors))
		{
			$customer_comment = StProductCommentClass::getByCustomerId((int)(Tools::getValue('id_product','0')), $id_customer, $this->context->shop->id, true, (int)$id_guest);
			if (!$customer_comment || ($customer_comment && (strtotime($customer_comment['date_add']) + Configuration::get($this->_prefix_st.'MINIMAL_TIME')) < time()))
			{
				$comment = new StProductCommentClass();
				$comment->content = strip_tags(Tools::getValue('content'));
				$comment->id_product = (int)Tools::getValue('id_product');
				$comment->id_parent = (int)Tools::getValue('id_parent');
                $comment->id_order_detail = (int)Tools::getValue('id_order_detail');
				$comment->id_customer = (int)$id_customer;
				$comment->id_guest = $id_guest;
				$comment->customer_name = Tools::getValue('customer_name');
				if (!$comment->customer_name)
					$comment->customer_name = pSQL($this->context->customer->firstname.' '.$this->context->customer->lastname);
				$comment->id_shop = $this->context->shop->id;
                $comment->validate = 0;
				$comment->save();
                
                $grade_sum = 0;
				foreach(Tools::getValue('criterion') as $id_st_product_comment_criterion => $grade)
				{
					$grade_sum += $grade;
					$product_comment_criterion = new StProductCommentCriterionClass($id_st_product_comment_criterion);
					if ($product_comment_criterion->id)
						$product_comment_criterion->addGrade($comment->id, $grade);
				}

				if (count(Tools::getValue('criterion')) >= 1)
				{
					$comment->grade = round($grade_sum / count(Tools::getValue('criterion')), 2);
					// Update Grade average of comment
					$comment->save();
				}
                
                if ($st_prodcut_comment_tags = Tools::getValue('st_prodcut_comment_tags')) {
                    StProductCommentClass::addTags($st_prodcut_comment_tags, $comment->id_product, $comment->id);
                }
                
                if ($image = Tools::getValue('image')) {
                    $image_arr = explode(',',$image);
                    $st_pc_max_images = Configuration::get($this->_prefix_st.'MAX_IMAGES') ? Configuration::get($this->_prefix_st.'MAX_IMAGES') : 6;
                    if(count($image_arr)>$st_pc_max_images)
                        $image_arr = array_slice($image_arr,0,$st_pc_max_images);
                    $pc_image_arr = array();
                    foreach ($image_arr as $img) {
                        $pc_image_arr[] = array('id_st_product_comment'=>$comment->id, 'image' => pSQL($img));
                    }
                    Db::getInstance()->insert(
                        'st_product_comment_image',
                        $pc_image_arr
                    );
                }
                
                $result['r'] = true;
                $result['thank'] = $this->trans('Thank you for your comment.', array(), 'Shop.Theme.Transformer');
                $result['moderation'] = Configuration::get($this->_prefix_st.'MODERATE') ? '<br/>'.$this->trans('Your comment may be awaiting moderation before being published.', array(), 'Shop.Theme.Transformer') :  '';
			}
			else
			{
                $minimal_time = Configuration::get($this->_prefix_st.'MINIMAL_TIME');
                $result['m'] = $this->trans('You should wait %seconds% seconds before posting a new comment.', array('%seconds%'=>$minimal_time), 'Shop.Theme.Transformer');
			}
		}
		else
            $result['m'] = implode('<br/>',$errors);

		die(Tools::jsonEncode($result));
	}
    protected function ajaxProcessAddReply()
	{
		$result = array(
            'r' => false,
            'm' => '',
        );
		$id_guest = 0;
		$id_customer = $this->context->customer->id;
		if (!$id_customer)
			$id_guest = $this->context->cookie->id_guest;

		$errors = array();
		// Validation
        if (($rs = $this->valideRecaptcha(Tools::getValue('g-recaptcha-response'))) !== true) {
            $errors[] = $rs;
        }
        $id_parent = Tools::getValue('id_parent');
        $comment = new StProductCommentClass((int)$id_parent);
		if (!$comment->id)
			$errors[] = $this->trans('Invalid parameter ', array(), 'Shop.Theme.Transformer');
		if (!Tools::getValue('content') || !Validate::isMessage(Tools::getValue('content')))
			$errors[] = $this->trans('Your comment is too short. Please try again', array(), 'Shop.Theme.Transformer');
        $customer_name = Tools::getValue('customer_name');
        if (!Validate::isGenericName($customer_name))
            $errors[] = $this->trans('Invalid name', array(), 'Shop.Theme.Transformer');

		if (!count($errors))
		{
			$comment->id = 0;
            $comment->id_st_product_comment = 0;
			$comment->content = strip_tags(Tools::getValue('content'));
			$comment->id_parent = (int)$id_parent;
			$comment->id_customer = (int)$id_customer;
			$comment->id_guest = $id_guest;
            $comment->is_admin = 0;
            $comment->customer_name = pSQL($customer_name);
            $comment->validate = 0;
            $comment->is_admin = 0;
            $comment->date_add = null;
			$comment->save();
            
            $result['r'] = true;
            $result['thank'] = $this->trans('Thank you for your reply.', array(), 'Shop.Theme.Transformer');
            $result['moderation'] = Configuration::get($this->_prefix_st.'MODERATE') ? '<br/>'.$this->trans('Your comment may be awaiting moderation before being published.', array(), 'Shop.Theme.Transformer') :  '';
		}
		else
            $result['m'] = implode('<br/>',$errors);

		die(Tools::jsonEncode($result));
	}
    protected function ajaxProcessUploadImage($item='file')
    {
        $result = array(
            'error' => false,
            'image' => '',
        );
        if (isset($_FILES[$item]) && isset($_FILES[$item]['tmp_name']) && !empty($_FILES[$item]['tmp_name']))
		{
			$type = strtolower(substr(strrchr($_FILES[$item]['name'], '.'), 1));
			$imagesize = array();
			$imagesize = @getimagesize($_FILES[$item]['tmp_name']);
			if (!empty($imagesize) &&
				in_array(strtolower(substr(strrchr($imagesize['mime'], '/'), 1)), array('jpg', 'gif', 'jpeg', 'png')) &&
				in_array($type, array('jpg', 'gif', 'jpeg', 'png')))
			{
				$temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');
				$salt = sha1(microtime());
                $c_name = $salt;
				if ($upload_error = ImageManager::validateUpload($_FILES[$item]))
					$result['error'] = $upload_error;
				elseif (!$temp_name || !move_uploaded_file($_FILES[$item]['tmp_name'], $temp_name))
					$result['error'] = $this->trans('An error occurred during the image upload.', array(), 'Shop.Theme.Transformer');
				else{
				   $infos = getimagesize($temp_name);
                   if(!ImageManager::resize($temp_name, _PS_UPLOAD_DIR_.'stproductcomments/'.$c_name.'.'.$type, null, null, $type))
				       $result['error'] = $this->trans('An error occurred during the image upload.', array(), 'Shop.Theme.Transformer');
				} 
				if (isset($temp_name))
					@unlink($temp_name);
                    
                if(!$result['error'])
                {
                    $result['image'] = 'stproductcomments/'.$c_name.'.'.$type;
                    $result['width'] = $imagesize[0];
                    $result['height'] = $imagesize[1];
                }
			}
        }
        else {
            $result['error'] = $this->trans('Please upload an image.', array(), 'Shop.Theme.Transformer');
        }
        die(Tools::jsonEncode($result));
    }
    protected function ajaxProcessReportAbuse()
	{
		if (!Tools::isSubmit('id_st_product_comment'))
			die('0');
        if (!$this->context->customer->isLogged(true))
            die('-1');

		if (StProductCommentClass::isAlreadyReport(Tools::getValue('id_st_product_comment'), $this->context->cookie->id_customer))
			die('0');

		if (StProductCommentClass::reportComment((int)Tools::getValue('id_st_product_comment'), $this->context->cookie->id_customer))
			die('1');

		die('0');
	}
	protected function ajaxProcessCommentIsUsefull()
	{
        if (!Tools::isSubmit('id_st_product_comment') || !Tools::isSubmit('value'))
            die('0');
		if (!$this->context->customer->isLogged(true))
			die('-1');

		if (StProductCommentClass::isAlreadyUsefulness(Tools::getValue('id_st_product_comment'), $this->context->cookie->id_customer))
			die('0');
		if (StProductCommentClass::setCommentUsefulness((int)Tools::getValue('id_st_product_comment'), (bool)Tools::getValue('value'), $this->context->cookie->id_customer))
        {
            $count = StProductCommentClass::countUsefulness((int)Tools::getValue('id_st_product_comment'), (bool)Tools::getValue('value'));
			die((string)$count);//die int 1, wei kong
        }

		die('0');
	}
}
